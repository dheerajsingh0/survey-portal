<?php
        require 'DBconfig.php';
        session_start();
        if(!isset($_SESSION['company_id_no']))
        {
            header('location:BussinessModHTML1.php');
                die();
        }
        else {
                if( $_SESSION['company_id_no'] != $_GET['Cmpnyid'])
                {
                    echo '<script>alert("Invalid URL parameters");
                    location.href="BussinessModHTML1.php";</script>';
                    
                    die();
                }
        }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/homeBusinessCSS2.css">
    <title>Survey Report</title>
</head>
<body>
<?php             /*-*-*-*-*-* detailed generation of reports *-*-* -*-*-* -*-* -* -*- *- *-* -* -*- */?>
                <?php  
                    if(isset($_GET['Cmpnyid']) && isset($_GET['surveyid']))
                    {
                        if($_GET['Cmpnyid'] != "" && $_GET['surveyid'] != "" ) {
                        $getCmpid=$_GET['Cmpnyid'];
                        $getSurveyid=$_GET['surveyid'];
                        GENxGraphChart($con,$getCmpid,$getSurveyid); }
                    }
                    else
                    {
                        die("<h1> Invalid ID </h1>URL error invalid URL @errCode:101UDef");
                    }
                
                    function GENxGraphChart($con,$getCmpid,$getSurveyid)
                            {   
                                
                                /* getting questions from survey questions table */
                                $query="SELECT * FROM survey_questions_table WHERE survey_ID='$getSurveyid' AND cmpny_ID='$getCmpid'";
                                $query_execute=mysqli_query($con,$query);
                                /* getting survey information from the primary survey table for header information*/
                                $getHeaderInfo=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM primary_survey_details_table WHERE Survey_ID='$getSurveyid' AND Cmpny_ID='$getCmpid'"));
                                ?>
                                
                <section id="Report_of_a_survey">
                        <div  class="ACTIVEHB">
                            <!-- header information -->
                           <label>Survey:<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;".$getHeaderInfo['Title_Of_Survey']; ?></label>
                           </label>Started On:<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;".date('d-m-Y',strtotime($getHeaderInfo['from_Date'])); ?> </label>
                          <label>Ends On:<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;".date('d-m-Y',strtotime($getHeaderInfo['To_Date'])); ?> </label>
                        </div>
                        <hr>
                          <?php 

                                /* function call to calulate the percentage */
                             function findDrpDwnPercentage($con,$answer,$qid)
                            {
                               //echo $qid;
                               //echo $answer;
                            $query_exe=mysqli_query($con,"SELECT * FROM survey_report_for_dropdown_table WHERE question_ID='$qid' AND answer='$answer'");
                            $totalUsersTakenSurveyForThatQuestion=mysqli_num_rows(mysqli_query($con,"SELECT * FROM  survey_report_for_dropdown_table WHERE question_ID='$qid'"));
                                $TUTSFTQ=$totalUsersTakenSurveyForThatQuestion;
                                if($TUTSFTQ != 0) {
                            $DrpSELECTED=(mysqli_num_rows($query_exe) / $TUTSFTQ) * 100;
                                $DrpSELECTED=substr($DrpSELECTED,0,4);    
                                return $DrpSELECTED;
                                }
                                else {
                                    $DrpSELECTED=0;
                                    return $DrpSELECTED;
                                }
                             }

                             function findOptionPercentage($con,$answer,$qid)
                             {
                                //echo $qid;
                                //echo $answer;
                             $query_exe=mysqli_query($con,"SELECT * FROM  survey_report_for_optionbox_table WHERE Question_ID='$qid' AND answer='$answer'");
                             $totalUsersTakenSurveyForThatQuestion=mysqli_num_rows(mysqli_query($con,"SELECT * FROM  survey_report_for_optionbox_table WHERE Question_ID='$qid'"));
                                 $TUTSFTQ=$totalUsersTakenSurveyForThatQuestion;
                                 if($TUTSFTQ != 0) {
                             $opSELECTED=(mysqli_num_rows($query_exe) / $TUTSFTQ) * 100;
                                 $opSELECTED=substr($opSELECTED,0,4);    
                                 return $opSELECTED;
                                 }
                                 else {
                                     $opSELECTED=0;
                                     return $opSELECTED;
                                 }
                              }
                            
                              function findCheckPercentage($con,$answer,$row_index,$qid)
                              {
                                 // echo "survey_report_for_checkbox_table WHERE question_ID='$qid' AND ".$row_index."='$answer'";
                                  $query_exe=mysqli_query($con,"SELECT * FROM survey_report_for_checkbox_table WHERE question_ID='$qid' AND ".$row_index."='$answer'");
                                  $totalUsersTakenSurveyForThatQuestion=mysqli_num_rows(mysqli_query($con,"SELECT * FROM survey_report_for_checkbox_table WHERE question_ID='$qid'"));
                                  $TUTSFTQ=$totalUsersTakenSurveyForThatQuestion; 

                                  if($TUTSFTQ != 0) {
                                    $checkSELECTED=(mysqli_num_rows($query_exe) / $TUTSFTQ) * 100;
                                        $checkSELECTED=substr($checkSELECTED,0,4);    
                                        return $checkSELECTED;
                                        }
                                        else {
                                            $checkSELECTED=0;
                                            return $checkSELECTED;
                                        }
                              }






                            $QnumCounter=1;
                            while($data = mysqli_fetch_assoc($query_execute))
                             {
                          
                          ?>
                        <div class="EachQuestiions_report_container">
                            <!-- question and report goes here-->
                        <div style="padding: 1%;margin-bottom:3px;font-weight: bold;font-family: cambria;">
                        <?php echo $QnumCounter."&nbsp;.&nbsp;".$data['question_txt']."[type of  question is ".$data['type_of_answer']."]"; ?>
                        </div>
                    
                    <?php
                       if($data['type_of_answer'] == "multipleChoice")
                         {
                    
                            $question_Id=$data['question_ID'];
                            $optionBox_Exe_query=mysqli_query($con,"SELECT * FROM survey_option_box_table WHERE question_ID ='$question_Id'");
                            $index_rows=mysqli_fetch_assoc($optionBox_Exe_query);
                                ?>

                            <section class="graph_section">
                            <div id="<?php echo $question_Id; ?>" class="THEchart">








                      <?php     
                    
                                $optiontextDefault="option_";$setCount=1;$grid_temp="";
                            while ( $setCount <= 30 ) {        
                                $optiontextDefault=$optiontextDefault . $setCount;
                                if($index_rows[$optiontextDefault] != "null") {

                                   /* CALCULATING THE OVERALL PERCENTAGE OF USERS WHO ANSWERED */
                                  $getPercentage=findOptionPercentage($con,$index_rows[$optiontextDefault],$question_Id);
                                    

                                    /* END OF CALCULATING */
                        ?>
                          
                          
                          <span class="columBar"> <div id="<?php echo $optiontextDefault ?>" style="height:<?php $getPercentageTemp=$getPercentage; ($getPercentageTemp == 0)?($getPercentageTemp="4"):($getPercentageTemp=$getPercentageTemp); echo $getPercentageTemp."%"; ?>" class="barDesign"> <?php echo $getPercentage."%"; //echo $index_rows[$optiontextDefault]; ?> </div></span>
                            
                            
                                <?php  $grid_temp=$grid_temp ."  ". "1fr"; }
                            
                                $setCount++; $optiontextDefault="option_";
                                
                                } ?>
                            </div>
                            <script type="text/javascript">
                                document.getElementById('<?php echo $question_Id; ?>').style.gridTemplateColumns="<?php echo $grid_temp; ?>";
                            </script>
                       <div id="horizontalAxis<?php echo $question_Id; ?>" class="horizontalAxis">
                
                          <?php  
                                $optiontextDefault="option_";$setCount=1;$grid_temp="";
                                  while($setCount <= 30 ) {      
                                         $optiontextDefault=$optiontextDefault . $setCount;
                                     if($index_rows[$optiontextDefault] != "null")
                                     {  ?>
                                     <label><?php echo $setCount; ?></label>
                                     <?php  $grid_temp=$grid_temp ."  ". "1fr"; 
                                    }
                                    $setCount++; $optiontextDefault="option_"; }
                                    ?>
                         </div>
                                <script type="text/javascript">
                                document.getElementById("horizontalAxis<?php echo $question_Id; ?>").style.gridTemplateColumns="<?php echo $grid_temp; ?>";
                                
                                </script>
                    
                                <!-- diplay all the options here -->
                                    <div class="optInfo">
                                        <?php
                                                $optiontextDefault="option_";$setCount=30;$grid_temp="";$labelC=1;
                                                while($setCount >= 1 ) {      
                                                       $optiontextDefault=$optiontextDefault . $setCount;
                                                   if($index_rows[$optiontextDefault] != "null")
                                                   {  ?>
                                                   <label><?php echo $labelC."&nbsp;.&nbsp;".$index_rows[$optiontextDefault]; ?></label>
                                                   <?php  $grid_temp=$grid_temp ."  ". "1fr";
                                                   $labelC++; 
                                                  }
                                                  $setCount--; $optiontextDefault="option_"; }
                                                  ?>
        
                                    </div>


                                    <!-- end of display Option -->
                         </section>
                        <?php } 
                /* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*- */
                           // <!-- for drop down box type question starts here -->
                           elseif ($data['type_of_answer'] == "DropDownBox") {

                            
                            $question_Id=$data['question_ID'];
                            $DrpDwnBox_Exe_query=mysqli_query($con,"SELECT * FROM survey_dropdown_box_table WHERE question_ID ='$question_Id'");
                            $index_rows=mysqli_fetch_assoc($DrpDwnBox_Exe_query);
                                ?>

                            <section class="graph_section">
                            <div id="<?php echo $question_Id; ?>" class="THEchart">

                            
                      <?php     
                           



                             $DroptextDefault="drpDown_";$setCount=1;$grid_temp="";
                             while ( $setCount <= 30 ) {        
                                 $DroptextDefault=$DroptextDefault . $setCount;
                                 if($index_rows[$DroptextDefault] != "null") {
 
                                    /* CALCULATING THE OVERALL PERCENTAGE OF USERS WHO ANSWERED */
                                   $getPercentage=findDrpDwnPercentage($con,$index_rows[$DroptextDefault],$question_Id);
                                     
 
                                     /* END OF CALCULATING */
                         ?>
                           
                           
                           <span class="columBar"> 
                            <div id="<?php echo $DroptextDefault ?>" style="height:<?php $getPercentageTemp=$getPercentage; ($getPercentageTemp == 0)?($getPercentageTemp="4"):($getPercentageTemp=$getPercentageTemp); echo $getPercentageTemp."%"; ?>" class="barDesign">
                             <?php echo $getPercentage."%"; ?> 
                            </div>
                           </span>
                             
                             
                                 <?php  $grid_temp=$grid_temp ."  ". "1fr"; }
                             
                                 $setCount++; $DroptextDefault="drpDown_";
                                 
                                 } ?>
                             </div>
                             <script type="text/javascript">
                                 document.getElementById('<?php echo $question_Id; ?>').style.gridTemplateColumns="<?php echo $grid_temp; ?>";
                             </script>

                              <div id="horizontalAxis<?php echo $question_Id; ?>" class="horizontalAxis">
                
                          <?php  
                                $DroptextDefault="drpDown_";$setCount=1;$grid_temp="";
                                  while($setCount <= 30 ) {      
                                         $DroptextDefault=$DroptextDefault . $setCount;
                                     if($index_rows[$DroptextDefault] != "null")
                                     {  ?>
                                     <label><?php echo $setCount; ?></label>
                                     <?php  $grid_temp=$grid_temp ."  ". "1fr"; 
                                    }
                                    $setCount++; $DroptextDefault="drpDown_"; }
                                    ?>
                              </div>
                                <script type="text/javascript">
                                document.getElementById("horizontalAxis<?php echo $question_Id; ?>").style.gridTemplateColumns="<?php echo $grid_temp; ?>";
                                
                                </script>

                                
                                <!-- diplay all the drop down options here -->
                                <div class="optInfo">
                                        <?php
                                                $DroptextDefault="drpDown_";$setCount=30;$grid_temp="";$labelC=1;
                                                while($setCount >= 1 ) {      
                                                       $DroptextDefault=$DroptextDefault . $setCount;
                                                   if($index_rows[$DroptextDefault] != "null")
                                                   {  ?>
                                                   <label><?php echo $labelC."&nbsp;.&nbsp;".$index_rows[$DroptextDefault]; ?></label>
                                                   <?php  $grid_temp=$grid_temp ."  ". "1fr";
                                                   $labelC++; 
                                                  }
                                                  $setCount--; $DroptextDefault="drpDown_"; }
                                                  ?>
        
                                    </div>


                                    <!-- end of display Option -->
                         </section>
                            <!--end of drop down type question -->
                        <?php
                            /* end of elseif */ 
                            }
                            
                            /* *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**/
                            elseif ( $data['type_of_answer'] == "paragraph" ) {

                                $question_Id=$data['question_ID'];
                                $paragraph_Exe_query=mysqli_query($con,"SELECT * FROM survey_report_for_paragraph_table WHERE question_ID ='$question_Id'");
                                    ?>
                                <section class="All_FeedBack_Container">
                                    <?php
                                        if(mysqli_num_rows($paragraph_Exe_query) > 0) {
                                            $setFeedBackCount=1;
                                        while($index_rows=mysqli_fetch_assoc($paragraph_Exe_query))
                                        {
                                        echo "<b>FeedBack".$setFeedBackCount."</b>";
                                        ?>
                                        
                                        <div class="comments">
                                              <?php
                                               echo $index_rows['feedback_comment'];                                        
                                               ?>

                                        </div>
    
                                        <?php
                                        $setFeedBackCount++;
                                        }//while close.
                                    }//if mysqli_num_rows close.
                                    else { ?>
                                        <div class="comments">
                                        <?php
                                         echo "No FeedBack for the question";                                        
                                         ?>

                                        </div>
                                   <?php
                                    }
                                    ?>
                                
                                </section>
                           <?php
                            }
                            /* end of paragraph type report*/

                            /* start of date report */
                            elseif ( $data['type_of_answer'] == "Date" ) {
                                $question_Id=$data['question_ID'];
                                
                                $Date_exe_query=mysqli_query($con,"SELECT * FROM survey_report_for_date_table WHERE question_ID='$question_Id'");
                                if(mysqli_num_rows($Date_exe_query) > 0) {
            
                               ?>
                                    <section class="dateClass">
                                          <div style="display: grid;grid-template-columns: 1fr 1fr;">  
                                              <label>Public User ID</label><label>Date selected</label> 
                                              </div>
                                <?php while($index_rows=mysqli_fetch_assoc($Date_exe_query)) { ?>
                                    <div class="DateReport">
                                  
                                        <?php 
                                        
                                        
                                        echo "<label>".$index_rows['public_user_ID']."</label><label>".date('d-m-Y',strtotime($index_rows['answer']))."</label>"; ?>

                                    </div>
                                              

                               <?php
                                     }
                                 ?> </section> <?php            
                                }
                                else { ?>

                                         <section class="dateClass">
                                            <div class="DateReport">
                                            <?php echo "No Public User has Responded To this survey question" ?>

                                            </div>
                                         </section>                    



                              <?php      
                                }
                            }//close of if type=date
                            /* end of date type report */

/* *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-+*-*-*-*-*-*-+*-*-*-*-*+-+*+-******-*/                            
                           elseif ( $data['type_of_answer'] == "checkBox") {
                            
                            $question_Id=$data['question_ID'];
                            $CheckBox_Exe_query=mysqli_query($con,"SELECT * FROM survey_check_box_table WHERE question_ID ='$question_Id'");
                            $index_rows=mysqli_fetch_assoc($CheckBox_Exe_query);
                                ?>


                            <section class="graph_section">
                            <div id="<?php echo $question_Id; ?>" class="THEchart">


                      <?php     
                    
                                $ChecktextDefault="check_box_";$setCount=1;$grid_temp="";
                            while ( $setCount <= 30 ) {        
                                $ChecktextDefault=$ChecktextDefault . $setCount;
                                if($index_rows[$ChecktextDefault] != "null") {

                                   /* CALCULATING THE OVERALL PERCENTAGE OF USERS WHO ANSWERED */
                                    $Rep_ChecktextDefault="checkbox_ans_" . $setCount;
                                  $getPercentage=findCheckPercentage($con,$index_rows[$ChecktextDefault],$Rep_ChecktextDefault,$question_Id);
                                    

                                    /* END OF CALCULATING */
                        ?>
                  <span class="columBar">
                   <div id="<?php echo $ChecktextDefault ?>" style="height:<?php $getPercentageTemp=$getPercentage; ($getPercentageTemp == 0)?($getPercentageTemp="4"):($getPercentageTemp=$getPercentageTemp); echo $getPercentageTemp."%"; ?>" class="barDesign"> <?php echo $getPercentage."%"; ?> 
                   </div>
                 </span>
                            
                            
                            <?php  $grid_temp=$grid_temp ."  ". "1fr"; }
                        
                            $setCount++; $ChecktextDefault="check_box_";
                            
                            } ?>
                        </div>
                        <script type="text/javascript">
                            document.getElementById('<?php echo $question_Id; ?>').style.gridTemplateColumns="<?php echo $grid_temp; ?>";
                        </script>
                
                    <div id="horizontalAxis<?php echo $question_Id; ?>" class="horizontalAxis">
                 <?php  
                      $ChecktextDefault="check_box_";$setCount=1;$grid_temp="";
                        while( $setCount <= 30 ) {      
                               $ChecktextDefault=$ChecktextDefault . $setCount;
                           if($index_rows[$ChecktextDefault] != "null")
                           {  ?>
                           <label><?php echo $setCount; ?></label>
                           <?php  $grid_temp=$grid_temp ."  ". "1fr"; 
                           }
                          $setCount++; $ChecktextDefault="check_box_"; }
                          ?>
                    </div>
                      <script type="text/javascript">
                      document.getElementById("horizontalAxis<?php echo $question_Id;?>").style.gridTemplateColumns="<?php echo $grid_temp; ?>";
                      
                      </script>
                           <!-- diplay all the checkbox options here -->
                           <div class="optInfo">
                                        <?php
                                                $ChecktextDefault="check_box_";$setCount=30;$grid_temp="";$labelC=1;
                                                while($setCount >= 1 ) {      
                                                       $ChecktextDefault=$ChecktextDefault . $setCount;
                                                   if($index_rows[$ChecktextDefault] != "null")
                                                   {  ?>
                                                   <label><?php echo $labelC."&nbsp;.&nbsp;".$index_rows[$ChecktextDefault]; ?></label>
                                                   <?php  $grid_temp=$grid_temp ."  ". "1fr";
                                                   $labelC++; 
                                                  }
                                                  $setCount--; $ChecktextDefault="check_box_"; }
                                                  ?>
        
                                    </div>


                                    <!-- end of display checkBox Option -->
                         </section>
                           <?php
                           }//end of checkbox type question.
                           ?>
                                                        








                <!-- super while loop -->
                        </div>
                        <hr>
                             <?php $QnumCounter++; } ?>
                </section>
                    <?php
                            }
                    ?>
 

</body>
</html>
