<?php
    require 'DBconfig.php';
    session_start();


    //PHP code goes here 
   
    
    /*login code*/
         if(isset($_POST['loginBtn']))
            {    
                $EmailID=$_POST['uniqueIDtxt'];
                $Password=$_POST['passwordtxt'];
               // echo '<script type="text/javascript">alert("user Clicked the Login Button");</script>';
                    $query="select * from bussinesstable where email_ID='$EmailID' AND password='$Password'"; 
                    $result=mysqli_query($con,$query);
                    $result_1=mysqli_num_rows($result);
                     
                    if($result_1 > 0)
                    {
                        $data=mysqli_fetch_assoc($result);
                        $_SESSION['company_id_no']=$data['cmpny_ID'];
                        $_SESSION['loggedUser_Pro_img']=$data['ProFileImgLink'];
                        echo '<script type="text/javascript">alert("Login Success");
                        location.href="homeBusinessHTML2.php";</script>';
                        
                        die ();
                    }
                    else{
                        echo '<script type="text/javascript">alert("Login Failed,Incorrect EmailId or Password");
                        location.href="BussinessMODHTML1.php"</script>';

                        die ();
                    }
                }
               
          /* end of login code */          

       /* forgot password code starts here*/         
                if(isset($_POST['pswdRecSubmit_btn']))
                {
                    $phno=$_POST['PswdPhnotxt'];
                    $emailId=$_POST['PswdEmailtxt'];
                    $NewPswd=$_POST['PswdNewPswdtxt'];
                    $SecCode=$_POST['pswdSecCodetxt'];
                    
                    $queryCheck="select * from bussinesstable where email_ID='$emailId'";
                    $query_run=mysqli_query($con,$queryCheck);
                    if(mysqli_num_rows($query_run)>0)
                    {   
                        $dataRow=mysqli_fetch_assoc($query_run);
                       /* if($dataRow['phno'] == $phno)
                        {
                            alert("true comparision");
                        }
                        */  
                        if(($phno == $dataRow['phno']) && ($SecCode == $dataRow['securityCode']))
                         {
                            $query1="update bussinesstable SET password='$NewPswd' where email_ID='$emailId'";
                            $result1=mysqli_query($con,$query1);
                            if($result1)
                            {
                            echo '<script type="text/javascript">alert("Password Has Been Updated Sucessfully");
                            location.href="BussinessMODHTML1.php"</script>'; 
                        
                            die();
                            }
                        }
                        else
                        {
                        echo '<script type="text/javascript">alert("Unable to Update Password,Incorrect Credentials!!");
                        location.href="BussinessMODHTML1.php"</script>';
                         die();
                        }
                    }
                    else 
                    {
                        echo '<script type="text/javascript">alert("Unable to Update Password,Incorrect Credentials!!,No such Account Exists.");
                        location.href="BussinessMODHTML1.php"</script>';
                         die();
                    }
                    

                }

                /*end of forgot password*/
                /*sign up code starts here*/                                                                                                                                        
                if(isset($_POST['Sign_Up']))
                {    
                   $cmpnyNametxt=$_POST['cmpnyNametxt']; 
                   $emailtxt=$_POST['emailtxt'];
                   $Phonetxt=$_POST['Phonetxt'];
                   $aboutTxt=$_POST['aboutTxt'];
                   $pswd=$_POST['pswd'];
                   $cpswd=$_POST['cpswd'];
                   $secP=$_POST['Securitytxt'];      

                    $pro_img_name=$_FILES['ImageUpload']['name'];
                    $pro_img_size=$_FILES['ImageUpload']['size'];
                    $pro_img_temp_name=$_FILES['ImageUpload']['tmp_name'];

                    $directory='ProfileImgUploads/';
                    $target_File=$directory.$pro_img_name;
                    
                   if($pswd == $cpswd)
                   {
                    
                    if(file_exists($target_File))
                    {
                        echo '<script type="text/javascript">alert("Image file alreasy used.select any ohter images");
                        location.href="BussinessMODHTML1.php"</script>';
                        die();

                    }

                    if($pro_img_size > 2097152 || $pro_img_size == 0) // 2MB size
                    {
                        echo '<script type="text/javascript"> alert("Invalid Image Size,Select Image whose size is less than 2MB"); 
                        location.href="BussinessMODHTML1.php";
                        </script>';die();
                        
                    }
                    
                    //moving the image file to upload folder.
                     move_uploaded_file($pro_img_temp_name,$target_File);

                    //fin
                    $run_query_check_email=mysqli_query($con,"select * from bussinesstable where email_ID='$emailtxt'");
                    if(mysqli_num_rows($run_query_check_email) > 0)
                    {
                        echo '<script type="text/javascript">alert("Email Id already exists.Pls Enter different email id");
                        location.href="BussinessMODHTML1.php";
                       </script>'; 
                       
                       die ();
                    }
                    
                    
                    
                    
                    
                    
                    //genrating uniqueID for each company
                    
                    
                    $query="insert into bussinesstable values('','','$cmpnyNametxt','$emailtxt','$Phonetxt','$aboutTxt','$cpswd','$secP','$target_File')";
                    $query_run_result=mysqli_query($con,$query);

                    $last_id=mysqli_insert_id($con);//return inserted auto id in the previous insert query
                    $cmpid="CMP_".$last_id;
                        $queryUID="update bussinesstable SET cmpny_ID='$cmpid' where id='$last_id'";
                   $confirmUIDupdate=mysqli_query($con,$queryUID);
                    //end of generating unique id using auto increement id and insert the row
                        if($query_run_result &&  $confirmUIDupdate)
                        {
                             echo '<script type="text/javascript">alert("sign up successfull");
                             location.href="BussinessMODHTML1.php";
                            </script>'; 
                            
                            die ();
                        }
                        else
                        {
                            echo '<script type="text/javascript">alert("sign up failed");
                            location.href="BussinessMODHTML1.php";
                            </script>';
                            die (); 
                        }
                    }
                    else
                    {    
                        echo '<script type="text/javascript">alert("password and confirm password does not match");
                        location.href="BussinessMODHTML1.php";
                            </script>'; 
                            die();
                    } 
                   
                  
                } 



?>
