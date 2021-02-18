<?php 
    require 'DBconfig.php';
    session_start();
    
    ?>

<?php
/* code for edit public profile */
    if(isset($_POST['proEditBTN']))
    {
        $username=$_POST['uname'];
        $phno=$_POST['contactNo'];
        $emailID=$_POST['email_id'];
        $userID=$_SESSION['pubUser_id_no'];

        $image_name=$_FILES['public_img_pro']['name'];
        $image_size=$_FILES['public_img_pro']['size'];
        $image_tmp_name=$_FILES['public_img_pro']['tmp_name'];
        $directory="public_user_profile_img/";
        $target_File=$directory.$image_name;
        echo $image_name.$target_File;
        echo $image_size;
        /* basic validation */
            if($image_name == "")
            {
                $target_File=$_SESSION['PRO_IMG_pub'];
            }
            else 
            {
                if(file_exists($target_File) &&  $_SESSION['PRO_IMG_pub'] != $target_File)
                {
                    echo '<script type="text/javascript">alert("Image file alreasy used.select any other images");
                    location.href="publicHomepageHTML1P.php"</script>';
                    die();
                }
                if($image_size > 2097152 || $image_name == "0")
                {
                    echo '<script type="text/javascript">alert("Maximum capacity reached Image size should be 2MB or less");
                    location.href="publicHomepageHTML1P.php"</script>';
                    die();   
                }
                //delete the image file.
                

                
                
                $_SESSION['OLD_IMG_pub']=$_SESSION['PRO_IMG_pub'];
                
                  //moving the image file to upload folder.
                move_uploaded_file($image_tmp_name,$target_File);
                
                //new target file assignment.
                $_SESSION['PRO_IMG_pub']=$target_File;
                if($_SESSION['PRO_IMG_pub'] != $_SESSION['OLD_IMG_pub'])
                    {
                unlink($_SESSION['OLD_IMG_pub']);
                    }
        //end of image validation
            }
            
            $query="select * from public_table where email_ID='$emailID'";
            $query=mysqli_query($con,$query);
            if(mysqli_num_rows($query) > 0)
            {
                $data_row=mysqli_fetch_assoc($query);
                echo "loggedUserID".$_SESSION['pubUser_id_no'];
                echo "datarow value".$data_row['pubUserID'];
                if($data_row['pubUserID'] != $_SESSION['pubUser_id_no'])
                {
                        echo "loggedUserID".$_SESSION['pubUser_id_no'];
                        echo "datarow value".$data_row['pubUserID'];
                            
                    
                         echo '<script type="text/javascript">alert("Email ID Already Used,Enter any other EmailID");
                        location.href="publicHomepageHTML1P.php"</script>';
                         die();
                }

            
            }
            
               /* updateing the database */
            
            $update_query="UPDATE public_table SET username='$username',email_ID='$emailID',phno='$phno',profile_photo_link='$target_File' WHERE pubUserID='$userID'";
            $run_update=mysqli_query($con,$update_query);
            if($run_update)
            {
                echo '<script type="text/javascript">alert("Profile Updated successfully");
                location.href="publicHomepageHTML1P.php?FRAME=Profile&ShowDrop=true"</script>';
                die(); 
            }
            else {
                echo '<script type="text/javascript">alert("Unable to update Profile");
                location.href="publicHomepageHTML1P.php?FRAME=Profile&ShowDrop=true"</script>';
                die(); 
            }
        }

    

/* end of edit of profile */
?>

<?php 
/*    SEcurity settings code goes here */


        if(isset($_POST['setChngSec']))
        {

            $NEWsecCode=$_POST['newSecCode'];
            $pswd=$_POST['pswd'];
            $NewPswd=$_POST['newPswd'];
            $userID=$_SESSION['pubUser_id_no'];
            echo "I am here";
            $sec_query="SELECT * FROM public_table WHERE pubUserID='$userID' AND password='$pswd'";
            $query_run=mysqli_query($con,$sec_query);
            echo "i got executed";
            echo mysqli_num_rows($query_run);
            if(mysqli_num_rows($query_run) > 0)
            {
                echo "i am here";
                $query="UPDATE public_table SET password='$NewPswd',security_code='$NEWsecCode' WHERE pubUserID='$userID'";
                $query_run=mysqli_query($con,$query);
                if($query_run)
                {
                    echo '<script type="text/javascript">alert("Security settings updated succesfully");
                    location.href="publicHomepageHTML1P.php?FRAME=Profile&ShowDrop=true"</script>';
                    die();    
                }
                else {
                    echo '<script type="text/javascript">alert("Unable to update settings");
                     location.href="publicHomepageHTML1P.php?FRAME=Profile&ShowDrop=true"</script>';
                     die(); 
                }

            }
            else {
                echo '<script type="text/javascript">alert("Invalid password");
                location.href="publicHomepageHTML1P.php?FRAME=Profile&ShowDrop=true"</script>';
                die(); 
            }



        }


/* end of security settings*/
?>
<?php
    @$deleteID=$_GET['DELid'];
        if($deleteID != "")
        {
            //echo $deleteID;
            deleteAC($deleteID,$con);
          }

    function deleteAC($deleteID,$con)
    {
        $delete_ac="DELETE FROM public_table WHERE pubUserId='$deleteID'";
        $fire_query=mysqli_query($con,$delete_ac);
      if($fire_query)
        {
        echo '<script type="text/javascript">alert("Account has been deleted We bid you farewell");
         location.href="index.php"</script>';
         session_destroy();
        die(); 
        }
    }


?>
