<?php
    require 'DBConfig.php'; 
    session_start();
    $SURVEY_ID = $_SESSION['take_survey_survey_id'];
    $CMP_ID = $_SESSION['take_survey_company_id'];
    $PUBLIC_USER_ID = $_SESSION['take_pubUser_id_no'];
?>

<?php
        if(isset($_POST['SurveyComplete'])) {
           
            
           //geting the all questions realted to the survey

                $query="SELECT * FROM survey_questions_table WHERE cmpny_ID='$CMP_ID' AND survey_ID='$SURVEY_ID'";
                $query_run=mysqli_query($con,$query);
               


            //uploading for each entry
                while ($survey_data=mysqli_fetch_assoc($query_run)) {
                        $count_question_id=$survey_data['question_ID'];
                        $count_question_type=$survey_data['type_of_answer'];    
                        
                        switch ($count_question_type) {
                                case 'multipleChoice':
                                     upload_primary($con,$count_question_id,$count_question_type);
                                        upload_Multiple_Choice_ans($con,$count_question_id);

                                break;
                                case 'DropDownBox':
                                        upload_primary($con,$count_question_id,$count_question_type);
                                        upload_DropDown_ans($con,$count_question_id);

                                break;

                                case 'Date':
                                        upload_primary($con,$count_question_id,$count_question_type);
                                        upload_Date_ans($con,$count_question_id);

                                break;
                                
                                case 'paragraph':
                                        upload_primary($con,$count_question_id,$count_question_type);
                                        upload_paragraph_ans($con,$count_question_id);

                                break;

                                case 'checkBox':
                                        upload_primary($con,$count_question_id,$count_question_type);
                                        upload_checkbox_ans($con,$count_question_id);

                                break;
                            
                            }


                }
                /* uploading to the report database for public user */
                    $get_company_name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM bussinesstable WHERE cmpny_ID='$CMP_ID'"));
                    $get_company_name=$get_company_name['cmpName'];

                    $get_Survey_name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM primary_survey_details_table WHERE Survey_ID='$SURVEY_ID'"));
                    $get_Survey_name=$get_Survey_name['Title_Of_Survey'];
                    $todaydate=date('d-m-Y');
                $report_query_public="INSERT INTO public_survey_completed_report VALUES('','$PUBLIC_USER_ID ','$SURVEY_ID','$get_Survey_name','$get_company_name','$todaydate')";    
                $report_query_public_run=mysqli_query($con,$report_query_public);
                /* end of uploading for public report */



                echo '<script type="text/javascript"> alert("Survey Successfully completed");
                location.href="publicHomepageHTML1P.php?FRAME=Take_Survey_Now";
                </script>';




        }

?>
<?php

        function upload_primary($con,$count_question_id,$count_question_type)
        {
            $SURVEY_ID = $_SESSION['take_survey_survey_id'];
            $CMP_ID = $_SESSION['take_survey_company_id'];
             $PUBLIC_USER_ID = $_SESSION['take_pubUser_id_no'];


            $query="INSERT INTO survey_report_primary_table VALUES('','$CMP_ID','$SURVEY_ID','$PUBLIC_USER_ID','$count_question_id','$count_question_type')";
            $query_run=mysqli_query($con,$query);
               if($query_run) {
                //echo '<script type="text/javascript"> alert("primary data uploaded");</script>';

            }
        }

        
        function upload_Multiple_Choice_ans($con,$count_question_id)
        {
             $PUBLIC_USER_ID = $_SESSION['take_pubUser_id_no'];
                    
                $tempStr=$count_question_id."_optionBox";
                $get_ans=$_POST[$tempStr];
               // echo $get_ans;

                    $query="INSERT INTO survey_report_for_optionbox_table VALUES('','$count_question_id','$PUBLIC_USER_ID','$get_ans')";
                    $query_run=mysqli_query($con,$query);
        
        }

        function  upload_DropDown_ans($con,$count_question_id)
        {
            $PUBLIC_USER_ID = $_SESSION['take_pubUser_id_no'];

            $tempStr=$count_question_id."_dropdownSel";
            $get_ans=$_POST[$tempStr];
            //echo $get_ans;

                $query="INSERT INTO survey_report_for_dropdown_table VALUES('','$count_question_id','$PUBLIC_USER_ID','$get_ans')";
                $query_run=mysqli_query($con,$query);
        }

        function  upload_Date_ans($con,$count_question_id)
        {
            $PUBLIC_USER_ID = $_SESSION['take_pubUser_id_no'];

            $tempStr=$count_question_id."_Date";
            $get_ans=$_POST[$tempStr];
           // echo $get_ans;  

            $query="INSERT INTO survey_report_for_date_table VALUES('','$count_question_id','$PUBLIC_USER_ID','$get_ans')";
            $query_run=mysqli_query($con,$query);
        } 
    
        function upload_paragraph_ans($con,$count_question_id)
        {
            $PUBLIC_USER_ID = $_SESSION['take_pubUser_id_no'];

            $tempStr="comment_paragraph_".$count_question_id;
            $get_ans=$_POST[$tempStr];
           // echo $get_ans;

            $query="INSERT INTO survey_report_for_paragraph_table VALUES('','$count_question_id','$PUBLIC_USER_ID','$get_ans')";
            $query_run=mysqli_query($con,$query);
        }

        function  upload_checkbox_ans($con,$count_question_id)
        {
            $PUBLIC_USER_ID = $_SESSION['take_pubUser_id_no'];
                $checkbox_array=array();

            $i=1;$j=0;
            while ($i <= 30) {
                
                
                $tempStr=$count_question_id."_CheckBox_".$i;
                
                if(isset($_POST[$tempStr]))
                {
                $get_ans=$_POST[$tempStr];
             //   echo $get_ans.$i;
                }
                else {
                    $get_ans="null";
               //     echo $get_ans.$i;
                }   
                $checkbox_array[$j] = $get_ans;
                $i++;$j++;
            }
            $query="INSERT INTO survey_report_for_checkbox_table VALUES('','$count_question_id','$PUBLIC_USER_ID',
            '$checkbox_array[0]','$checkbox_array[1]','$checkbox_array[2]','$checkbox_array[3]','$checkbox_array[4]',
            '$checkbox_array[5]','$checkbox_array[6]','$checkbox_array[7]','$checkbox_array[8]','$checkbox_array[9]',
            '$checkbox_array[10]','$checkbox_array[11]','$checkbox_array[12]','$checkbox_array[13]','$checkbox_array[14]',
            '$checkbox_array[15]','$checkbox_array[16]','$checkbox_array[17]','$checkbox_array[18]','$checkbox_array[19]',
            '$checkbox_array[20]','$checkbox_array[21]','$checkbox_array[22]','$checkbox_array[23]','$checkbox_array[24]',
            '$checkbox_array[25]','$checkbox_array[26]','$checkbox_array[27]','$checkbox_array[28]','$checkbox_array[29]')";
            $query_run=mysqli_query($con,$query);
        }













?>