<?php
require 'DBconfig.php';
    session_start();
    
 ?>
<?php 
    /*php code for delete account */
    if(isset($_POST['ans_Yes_btn']))
    {
        $ID=$_SESSION['company_id_no'];
        $delete_runned=mysqli_query($con,"delete from bussinesstable where cmpny_ID='$ID'");
       if($delete_runned)
        {
            unlink($_SESSION['loggedUser_Pro_img']);
            session_destroy();
            echo '<script type="text/javascript">alert("profile deleted you will be automatically logged out");
            location.href="BussinessModHTML1.php"</script>';
            die();
        }
    }

?>

<?php
/* logout code for indian opinion */
        if(isset($_POST['ans_Yes_btnLOGUT']))
        {
            
            session_destroy();
            header('location:BussinessModHTML1.php');
              die();  


        }



?>

<?php
    /* edit profile code */
    if(isset($_POST['edit_btn']))
    {
        $cmpName=$_POST['cmpnyName'];
        $phno=$_POST['cmpnyNumber'];
        $aboutCmp1=$_POST['cmpnyAbt'];
        $loggedCmpnyId=$_SESSION['company_id_no'];
        $emailtxt=$_POST['cmpnyEmail'];
        
        $pro_img_name=$_FILES['ImageUpload']['name'];
        $pro_img_size=$_FILES['ImageUpload']['size'];
        $pro_img_temp_name=$_FILES['ImageUpload']['tmp_name'];
        
        
        $directory='ProfileImgUploads/';
        $target_File=$directory.$pro_img_name;
        
        $queryStr="select * from bussinesstable where email_ID='$emailtxt'";
        $query_run=mysqli_query($con,$queryStr);
        //*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        //image file validation

        if($pro_img_name == "")
        {
           $target_File=$_SESSION['loggedUser_Pro_img']; 
            
        }
        else {
               
               if(file_exists($target_File) &&  $_SESSION['loggedUser_Pro_img'] != $target_File)
                {
                    echo '<script type="text/javascript">alert("Image file alreasy used.select any other images");
                    location.href="homeBusinessHTML2.php"</script>';
                    die();

                }
            
               if($pro_img_size > 2097152 || $pro_img_size == 0) {
               
                echo '<script type="text/javascript">alert("Invalid image Pls select image whose size is 2MB");
                location.href="homeBusinessHTML2.php"</script>';
                die();


               }
                //delete the image file.
                $_SESSION['OLD_IMG']=$_SESSION['loggedUser_Pro_img'];
                
                  //moving the image file to upload folder.
                move_uploaded_file($pro_img_temp_name,$target_File);
                
                //new target file assignment.
                $_SESSION['loggedUser_Pro_img']=$target_File;

                unlink($_SESSION['OLD_IMG']);
        
        //end of image validation
        
            }
        
        
        
        if(mysqli_num_rows($query_run) > 0)
        {   
            $data=mysqli_fetch_assoc($query_run);
            if($data['cmpny_ID'] != $_SESSION['company_id_no'])
            {
               echo '<script type="text/javascript">alert("Email Id Already Used by Another Account holder!!");
                      location.href="homeBusinessHTML2.php"</script>';

                    die ();
           }
         else {

                //unlink($_SESSION['OLD_IMG']);
                $queryStr="update bussinesstable SET cmpName='$cmpName',email_ID='$emailtxt',phno='$phno',about_Cmpny='$aboutCmp1',ProFileImgLink='$target_File' where cmpny_ID='$loggedCmpnyId'";
                $query_run=mysqli_query($con,$queryStr);
                    if($query_run)
                    {
                        echo '<script type="text/javascript">alert("Company or Bussiness Info updated");
                        location.href="homeBusinessHTML2.php"</script>';
                        $nameCmp=$cmpName;
                        $emailCmp=$emailtxt;
                        $phnoCmp=$phno;
                        $aboutCmp=$aboutCmp1;
                        $_SESSION['loggedUser_Pro_img']=$target_File;
                        
                        die ();
                    }
                    else{
                        echo '<script type="text/javascript">alert("failed to update");
                        location.href="homeBusinessHTML2.php"</script>';
            
                        die ();
                    }

                }
        }

    }   
  ?>

<?php 
    /* php code for priliminary data input to the survey table */
    if(isset($_POST['PrimarySry_Btn']))
    {
        $Title=$_POST['titleTxt'];
        $description=$_POST['Desctxt'];
        $FromDate=$_POST['FromDate'];
        $ToDate=$_POST['ToDate'];
        $cmpny_Id=$_SESSION['company_id_no'];

        if(empty($Title) || empty($description) || empty($FromDate) || empty($ToDate) )
        {
            echo '<script type="text/javscript"> alert("Please enter all the values");
                        location.href="homeBussinessHTML2.php";
                        </script>';
                        die();
        }

        $_SESSION['progress_status']="true";
        $_SESSION['counterOfQuestion']=0;
            
                 
        $query_run_status=mysqli_query($con,"insert into primary_survey_details_table values('','','$cmpny_Id','$Title','$description','$FromDate','$ToDate')");
        
        $last_id=mysqli_insert_id($con);/*return inserted auto id in the previous insert query*/
        $survey_id="SURVY_".$last_id;
            $querySuvID="update primary_survey_details_table SET Survey_ID='$survey_id' where id='$last_id'";
       $confirmSuvIDupdate=mysqli_query($con,$querySuvID);
            $_SESSION['sur_ID']=$survey_id;
        if($query_run_status && $confirmSuvIDupdate)
        {
            $_SESSION['titleOf_suvry']=$Title;
            echo '<script type="text/javascript">alert("Preliminary Data Uploaded");
                        location.href="homeBusinessHTML2.php"</script>';
            
                        die ();
        }
        else {
            echo '<script type="text/javascript">alert("Preliminaey Data Upload failed");
            location.href="homeBusinessHTML2.php"</script>';

            die ();    
        }
    }



?>

<?php   

if(isset($_POST['secModsubmit_btn']))
{
    $companyID=$_SESSION['company_id_no'];
    $pswd=$_POST['OldPswd'];
    $newPswd=$_POST['NewPswd'];
    $newSecurityCode=$_POST['New_Sec_code'];

    $SecurityQuery="select * from bussinesstable where cmpny_ID='$companyID' AND password='$pswd'";
    $resultOfSQ=mysqli_query($con,$SecurityQuery);
    if(mysqli_num_rows($resultOfSQ) > 0)
    {
        $SecurityQuery="update bussinesstable SET password='$newPswd',securityCode='$newSecurityCode' where cmpny_ID='$companyID'";
        $checkSuccess=mysqli_query($con,$SecurityQuery);
        if($checkSuccess)
        {
            echo '<script type="text/javascript">alert("Security parameters successfully saved");
            location.href="homeBusinessHTML2.php"</script>';
            
            die ();
        }
        else {
            echo '<script type="text/javascript">alert("failed to update/save the new security settings");
            location.href="homeBusinessHTML2.php"</script>';
            
            die ();
        } 
    }
    else {
        echo '<script type="text/javascript">alert("Incorrect Password");
            location.href="homeBusinessHTML2.php"
            
             </script>';
            
           die();
    }


}

?>

<?php
    /* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*- */
        //for multiplechoice..

        if(isset($_POST['submitMultipleChoiceBtn']))
        {
            //echo '<script type="text/javascript">alert("submit");</script>';
            //name="Choice_text_1";
            $qutxt=$_POST['Uni_question_txt'];
            $typetxt="multipleChoice";
            survey_question_Uni($qutxt,$typetxt,$con);
            
            
            $temp_index_txt="Choice_text_";

            if($_POST['otherTXTVal'] == "Enabled")
            {
                $otherText="true";
            }
            else {
                $otherText="false";
            }

            $temp_i=1;
            $choice_values=array();
                for($i = 0;$i < 30 ; $i++)
                {

                    $temp_index_txt=$temp_index_txt.$temp_i;
                    $choice_values[$i]=$_POST[$temp_index_txt];
                        if(empty($choice_values[$i]))
                        {
                            $choice_values[$i]="null";
                        }


                    $temp_index_txt="Choice_text_";
                    $temp_i++;
                }
                for($i=0;$i<30;$i++) {
                   echo $choice_values[$i].'<br>';
                }
                
                $qID=$_SESSION['question_ID_no'];
                $sID=$_SESSION['sur_ID'];
                $cID=$_SESSION['company_id_no'];
                /* inserting into the database */
               $choice_query="INSERT INTO survey_option_box_table 
                  VALUES('','$cID','$sID','$qID','$choice_values[0]','$choice_values[1]','$choice_values[2]','$choice_values[3]','$choice_values[4]',
               '$choice_values[5]','$choice_values[6]','$choice_values[7]','$choice_values[8]','$choice_values[9]','$choice_values[10]',
               '$choice_values[11]','$choice_values[12]','$choice_values[13]','$choice_values[14]','$choice_values[15]','$choice_values[16]',
               '$choice_values[17]','$choice_values[18]','$choice_values[19]','$choice_values[20]','$choice_values[21]','$choice_values[22]',
               '$choice_values[23]','$choice_values[24]','$choice_values[25]','$choice_values[26]','$choice_values[27]','$choice_values[28]','$choice_values[29]','$otherText')";
            
                
                $choice_query_run=mysqli_query($con,$choice_query);
                echo $choice_query;
                echo $choice_query_run;


                if($choice_query_run)
                {
                    $_SESSION['counterOfQuestion']=$_SESSION['counterOfQuestion'] + 1 ;
                    echo '<script type="text/javascript">alert("successfully multiple choice inserted");
                           location.href="homeBusinessHTML2.php"; </script>';
                        die();
                }
                else {
                    echo '<script type="text/javascript">alert("failed to insert multiple choice ");
                    location.href="homeBusinessHTML2.php"; </script>';
                 die();
                }
        
        
        }

?>

<?php 
/* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
//for checkBox
        if(isset($_POST['submitCheckBoxBtn']))
        {
            
           //name="Choice_text_1";
            $qutxt=$_POST['Uni_question_txt'];
            $typetxt="checkBox";
            survey_question_Uni($qutxt,$typetxt,$con);


            $temp_index_txt="CheckBoxTXT_";
            
            
            $temp_i=1;
            $choice_values=array();
                for($i = 0;$i < 30 ; $i++)
                {

                    $temp_index_txt=$temp_index_txt.$temp_i;
                    $choice_values[$i]=$_POST[$temp_index_txt];
                        if(empty($choice_values[$i]))
                        {
                            $choice_values[$i]="null";
                        }


                    $temp_index_txt="CheckBoxTXT_";
                    $temp_i++;
                }
                for($i=0;$i<30;$i++) {
                   echo $choice_values[$i].'<br>';
                }
                
                $qID=$_SESSION['question_ID_no'];
                $sID=$_SESSION['sur_ID'];
                $cID=$_SESSION['company_id_no'];

          
                /* inserting into the database */
               $choice_query="INSERT INTO survey_check_box_table  
               VALUES('','$cID','$sID','$qID','$choice_values[0]','$choice_values[1]','$choice_values[2]','$choice_values[3]','$choice_values[4]',
               '$choice_values[5]','$choice_values[6]','$choice_values[7]','$choice_values[8]','$choice_values[9]','$choice_values[10]',
               '$choice_values[11]','$choice_values[12]','$choice_values[13]','$choice_values[14]','$choice_values[15]','$choice_values[16]',
               '$choice_values[17]','$choice_values[18]','$choice_values[19]','$choice_values[20]','$choice_values[21]','$choice_values[22]',
               '$choice_values[23]','$choice_values[24]','$choice_values[25]','$choice_values[26]','$choice_values[27]','$choice_values[28]','$choice_values[29]')";
            
                
                $choice_query_run=mysqli_query($con,$choice_query);
                echo $choice_query;
                echo $choice_query_run;


                if($choice_query_run)
                {
                    $_SESSION['counterOfQuestion']=$_SESSION['counterOfQuestion'] + 1 ;
                    echo '<script type="text/javascript">alert("successfully checkbox values inserted");
                           location.href="homeBusinessHTML2.php"; </script>';
                        die();
                }
                else {
                    echo '<script type="text/javascript">alert("failed check box values to insert");
                    location.href="homeBusinessHTML2.php"; </script>';
                 die();
                }
        
        
        }

        








?>
<?php  
/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
// for inserting dropdown boxes 


    if(isset($_POST['submitDrpDownBtn']))
    {
    
   //name="Choice_text_1";
    $qutxt=$_POST['Uni_question_txt'];
    $typetxt="DropDownBox";
    survey_question_Uni($qutxt,$typetxt,$con);


    $temp_index_txt="drpOptTxt_";
    
    
    $temp_i=1;
    $choice_values=array();
        for($i = 0;$i < 30 ; $i++)
        {

            $temp_index_txt=$temp_index_txt.$temp_i;
            $choice_values[$i]=$_POST[$temp_index_txt];
                if(empty($choice_values[$i]))
                {
                    $choice_values[$i]="null";
                }


            $temp_index_txt="drpOptTxt_";
            $temp_i++;
        }
        for($i=0;$i<30;$i++) {
           echo $choice_values[$i].'<br>';
        }
        
        $qID=$_SESSION['question_ID_no'];
        $sID=$_SESSION['sur_ID'];
        $cID=$_SESSION['company_id_no'];

  
        /* inserting into the database */
       $choice_query="INSERT INTO survey_dropdown_box_table 
       VALUES('','$cID','$sID','$qID','$choice_values[0]','$choice_values[1]','$choice_values[2]','$choice_values[3]','$choice_values[4]',
       '$choice_values[5]','$choice_values[6]','$choice_values[7]','$choice_values[8]','$choice_values[9]','$choice_values[10]',
       '$choice_values[11]','$choice_values[12]','$choice_values[13]','$choice_values[14]','$choice_values[15]','$choice_values[16]',
       '$choice_values[17]','$choice_values[18]','$choice_values[19]','$choice_values[20]','$choice_values[21]','$choice_values[22]',
       '$choice_values[23]','$choice_values[24]','$choice_values[25]','$choice_values[26]','$choice_values[27]','$choice_values[28]','$choice_values[29]')";
    
        
        $choice_query_run=mysqli_query($con,$choice_query);
        echo $choice_query;
        echo $choice_query_run;


        if($choice_query_run)
        {
            $_SESSION['counterOfQuestion']=$_SESSION['counterOfQuestion'] + 1 ;
            echo '<script type="text/javascript">alert("successfully dropdown values inserted");
                   location.href="homeBusinessHTML2.php"; </script>';
                die();
        }
        else {
            echo '<script type="text/javascript">alert("failed to insert dropdown values");
            location.href="homeBusinessHTML2.php"; </script>';
         die();
        }


}




/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*/
?>

<?php

    function survey_question_Uni($qutxt,$typetxt,$con)
        {
            $cmp_ID=$_SESSION['company_id_no'];
            $suv_ID=$_SESSION['sur_ID'];
            $query="insert into survey_questions_table (id,cmpny_ID,survey_ID,question_ID,type_of_answer,question_txt) values('','$cmp_ID','$suv_ID','','$typetxt','$qutxt')";
            $query_run=mysqli_query($con,$query);
            $last_id=mysqli_insert_id($con);
            $latest_question_id="question_".$last_id;

            $_SESSION['question_ID_no']=$latest_question_id;

            $queryqueID="update survey_questions_table SET question_ID='$latest_question_id' where id='$last_id'";
            $confrimQueIDupdate=mysqli_query($con,$queryqueID);
            $_SESSION['status_que_insert']=$confrimQueIDupdate;
        }
?>

<?php 
/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
//for paragraph type
    if(isset($_POST['submitCommentBtn']))
    {

    $qutxt=$_POST['Uni_question_txt'];
    $typetxt="paragraph";
    survey_question_Uni($qutxt,$typetxt,$con);
        if(isset($_SESSION['status_que_insert']))
        {
            $_SESSION['counterOfQuestion']=$_SESSION['counterOfQuestion'] + 1 ;
            unset($_SESSION['status_que_insert']);
             echo '<script type="text/javascript">alert("paragraph type question successfully saved ");
                  location.href="homeBusinessHTML2.php"; </script>';
               die();
        }
        else {
           echo '<script type="text/javascript">alert("paragraph type question not saved ");
             location.href="homeBusinessHTML2.php"; </script>';
            die();
        }

    }

?>
<?php 
/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
//for date

if(isset($_POST['submitDateBtn']))
{

    $qutxt=$_POST['Uni_question_txt'];
    $typetxt="Date";
    survey_question_Uni($qutxt,$typetxt,$con);
    if(isset($_SESSION['status_que_insert']))
    {   
        $_SESSION['counterOfQuestion']=$_SESSION['counterOfQuestion'] + 1 ;
        unset($_SESSION['status_que_insert']);
         echo '<script type="text/javascript">alert("Date type question successfully saved ");
              location.href="homeBusinessHTML2.php"; </script>';
           die();
    }
    else {
       echo '<script type="text/javascript">alert("Date type question not saved");
         location.href="homeBusinessHTML2.php"; </script>';
        die();
    }

}

?>

<?php
/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
if(isset($_POST['TheCompleter']))
{
    $TEMP_cid=$_SESSION['company_id_no'];
    $TEMP_sid=$_SESSION['sur_ID'];
    $queryLast=mysqli_query($con,"SELECT * FROM survey_questions_table WHERE cmpny_ID='$TEMP_cid' AND survey_ID='$TEMP_sid'");
    if(!mysqli_num_rows($queryLast))
    {
        //ob_start();
     //$ans=print '<script type="text/javascript">window.confirm("No questions has been uploaded for this survey,survey will be Disgraded,Carry out operation");location.href="homeBusinessHTML2.php"; </script>';
        //$ans=ob_get_contents();
        //ob_end_clean();
    
      $ans="true";
        if($ans == "true")
                    {       
                              $delete_query=mysqli_query($con,"DELETE FROM primary_survey_details_table WHERE Survey_ID='$TEMP_sid'");
                             if($delete_query)
                            {
                                 $_SESSION['progress_status']="false";
                                 $_SESSION['counterOfQuestion']=0;
                                 echo '<script type="text/javascript">alert("Survey Deleted..since it did not have any questions"); 
                                                location.href="homeBusinessHTML2.php";</script>';
                                  die();

                            }
                            else {
                                    echo '<script type="text/javascript">alert("Unable to delete");
                                    location.href="homeBusinessHTML2.php";</script>';
                                    die();
                                }
                            } 
                    else {
                            echo '<script type="text/javascript">location.href="homeBusinessHTML2.php";</script>';
                                die();
                         }
        }   
                       
                        $_SESSION['progress_status']="false";
                        $_SESSION['counterOfQuestion']=0;
                        echo '<script type="text/javascript">alert("Survey Upload Complete"); 
                            location.href="homeBusinessHTML2.php";</script>';
                                die();
}

?>











