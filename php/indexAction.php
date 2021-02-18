<?php
    require 'DBconfig.php';
    session_start();


    //PHP code goes here 
   
    
    /*login code*/
         if(isset($_POST['loginBtn']))
            {    
                $EmailID=$_POST['pubEmail'];
                $Password=$_POST['pubpswd'];
               // echo '<script type="text/javascript">alert("user Clicked the Login Button");</script>';
                    $query="select * from public_table where email_ID='$EmailID' AND password='$Password'"; 
                    $result=mysqli_query($con,$query);
                    $result_1=mysqli_num_rows($result);
                     
                    if($result_1 > 0)
                    {
                        $data=mysqli_fetch_assoc($result);
                        $_SESSION['pubUser_id_no']=$data['pubUserID'];
                        $_SESSION['loggedPubUser_Pro_img']=$data['profile_photo_link'];
                        echo '<script type="text/javascript">alert("Login Success");
                        location.href="publicHomepageHTML1P.php?FRAME=Profile&ShowDrop=false";</script>';
                        $_SESSION['still_loging_in'] ="false";
                        $_SESSION['still_signing_Up'] ="false";
                        $_SESSION['stillRecoveringPswd']="false";
                        die ();
                    }
                    else{
                        echo '<script type="text/javascript">alert("Login Failed,Incorrect EmailId or Password");
                        location.href="index.php"</script>';
                        $_SESSION['still_loging_in'] ="true";
                        $_SESSION['still_signing_Up'] ="false";
                        $_SESSION['stillRecoveringPswd']="false";
                        die ();
                    }
                }
               
          /* end of login code for public user login */          

             /*sign up code starts here public user*/                                                                                                                                        
             if(isset($_POST['Pub-Sign-Up']))
             {    
                $UserNametxt=$_POST['PubSignUpName']; 
                $emailtxt=$_POST['PubSignUpEmailId'];
                $Phonetxt=$_POST['PubSignUpPhno'];
                $genderTxt=$_POST['PubSignUpGender'];
                $DOBtxt=$_POST['PubSignUpDOB'];
                $pswd=$_POST['PubSignUpPswd'];
                $cpswd=$_POST['PubSignUpCnPswd'];
                $secP=$_POST['PubSignUpSecCode'];      

                 $pro_img_name=$_FILES['PubProImg']['name'];
                 $pro_img_size=$_FILES['PubProImg']['size'];
                 $pro_img_temp_name=$_FILES['PubProImg']['tmp_name'];

                 $directory='public_user_profile_img/';
                 $target_File=$directory.$pro_img_name;
                 
                if($pswd == $cpswd)
                {
                 
                 if(file_exists($target_File))
                 {
                     echo '<script type="text/javascript">alert("Image file alreasy used.select any ohter images");
                     location.href="index.php"</script>';
                     $_SESSION['still_signing_Up'] ="true";
                     $_SESSION['still_loging_in']="false";
                     $_SESSION['stillRecoveringPswd']="false";
                     die();

                 }

                 if($pro_img_size > 2097152 || $pro_img_size == 0) // 2MB size
                 {
                    echo '<script type="text/javascript">alert("Invalid Image Size Pls select Image whose size is less than 2MB");
                    location.href="index.php"</script>';
                    $_SESSION['still_signing_Up'] ="true";
                    $_SESSION['still_loging_in']="false";
                    $_SESSION['stillRecoveringPswd']="false";
                    die();

                 }
                 
                 //moving the image file to upload folder.
                  move_uploaded_file($pro_img_temp_name,$target_File);

                 //fin
                 $run_query_check_email=mysqli_query($con,"select * from public_table where email_ID='$emailtxt'");
                 if(mysqli_num_rows($run_query_check_email) > 0)
                 {
                     echo '<script type="text/javascript">alert("Email Id already exists.Pls Enter different email id");
                     location.href="index.php";
                    </script>'; 
                    $_SESSION['still_signing_Up'] ="true";
                    $_SESSION['still_loging_in']="false";
                    $_SESSION['stillRecoveringPswd']="false";
                    die ();
                 }
                 
                 
                 
                 
                 
                 
                 //genrating uniqueID for each public user signing up for o.s.p
                 
                 
                 $query="insert into public_table values('','','$UserNametxt','$emailtxt','$Phonetxt','$genderTxt','$DOBtxt','$cpswd','$secP','$target_File')";
                 $query_run_result=mysqli_query($con,$query);

                 $last_id=mysqli_insert_id($con);//return inserted auto id in the previous insert query
                 $Pubid="PUB_".$last_id;
                     $queryUID="update public_table SET pubUserID='$Pubid' where id='$last_id'";
                $confirmUIDupdate=mysqli_query($con,$queryUID);
                 //end of generating unique id using auto increement id and insert the row
                     if($query_run_result &&  $confirmUIDupdate)
                     {
                          echo '<script type="text/javascript">alert("sign up successfull");
                          location.href="index.php";
                         </script>'; 
                         $_SESSION['still_signing_Up'] ="false";
                         $_SESSION['still_loging_in']="false";
                         $_SESSION['stillRecoveringPswd']="false";
                         die ();
                     }
                     else
                     {
                         echo '<script type="text/javascript">alert("sign up failed");
                         location.href="index.php";
                         </script>';
                         $_SESSION['still_signing_Up'] ="true";
                         $_SESSION['still_loging_in']="false";
                         $_SESSION['stillRecoveringPswd']="false";
                         die (); 
                     }
                 }
                 else 
                 {    
                     echo '<script type="text/javascript">alert("password and confirm password does not match");
                     location.href="index.php";
                         </script>'; 
                         $_SESSION['still_signing_Up'] ="true";
                         $_SESSION['still_loging_in']="false";
                         $_SESSION['stillRecoveringPswd']="false";
                         die();
                 } 
                
               
             } 

/* forgot password code starts here*/         
    if(isset($_POST['RPswdSETBtn']))
    {
    $phno=$_POST['RPswdPhno'];
    $emailId=$_POST['RPswdEmailID'];
    $NewPswd=$_POST['RPswdNewPswd'];
    $SecCode=$_POST['RPswdSecurityCode'];
    
    $queryCheck="select * from public_table where email_ID='$emailId'";
    $query_run=mysqli_query($con,$queryCheck);
    if(mysqli_num_rows($query_run)>0)
    {   
        $dataRow=mysqli_fetch_assoc($query_run);
       /* if($dataRow['phno'] == $phno)
        {
            alert("true comparision");
        }
        */  
        if(($phno == $dataRow['phno']) && ($SecCode == $dataRow['security_code']))
         {
            $query1="update public_table SET password='$NewPswd' where email_ID='$emailId'";
            $result1=mysqli_query($con,$query1);
            if($result1)
            {
            echo '<script type="text/javascript">alert("Password Has Been Updated Sucessfully");
            location.href="index.php"</script>'; 
                $_SESSION['stillRecoveringPswd']="false";
                $_SESSION['still_signing_Up'] ="false";
                $_SESSION['still_loging_in']="false";
            die();
            }
        }
        else
        {
        echo '<script type="text/javascript">alert("Unable to Update Password,Incorrect Credentials!!");
        location.href="index.php"</script>';
        $_SESSION['stillRecoveringPswd']="true";
        $_SESSION['still_signing_Up'] ="false";
        $_SESSION['still_loging_in']="false";
         die();
        }
    }
    else 
    {
        echo '<script type="text/javascript">alert("Unable to Update Password,Incorrect Credentials!!,No such Account Exists.");
        location.href="BussinessMODHTML1.php"</script>';
        $_SESSION['stillRecoveringPswd']="true";
        $_SESSION['still_signing_Up'] ="false";
        $_SESSION['still_loging_in']="false";
         die();
    }
    

}

/*end of forgot password*/







































?>
