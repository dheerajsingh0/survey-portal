<?php
    require 'DBconfig.php';
    session_start();
    //$SURVEY_ID=$_GET[''];
    $SURVEY_ID=$_GET['Survey_ID'];
    $CMP_ID=$_GET['Company_ID'];
    $_SESSION['take_survey_survey_id']=$SURVEY_ID;
    $_SESSION['take_survey_company_id']=$CMP_ID;
    $_SESSION['take_pubUser_id_no']=$_SESSION['pubUser_id_no'];
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/TakeSurvey.css">
    <title>Survey Intialized</title>
</head>
<body>
    <header>
            <div class="logo">
                <label>Indian Opinion</label><br>
                <label>(Online Survey Portal)</label>
            </div>
           
    </header>
    <div class="status"><label>Survey In Progress</label> </div>
    
    <form name="TakeSurveyForm" action="TakeSurveyAction.php" method="POST">
<!-- Body of the survey question starts here-->    
<section id="ALLQuestionsContainer">
    
    
    
    <?php
        /*  generating the answer  */    

        function  generateParagraphBox($con,$question_id)
        {
            ?>
            <div class="commentBoxContainer" style="padding:1%;"> 
            
                <textarea name="<?php echo "comment_paragraph_".$question_id; ?>" id="" cols="70" maxlength="250" placeholder="Maximum 250 characters" style="font-family: sans-serif;"  rows="10"></textarea>
            
             </div>
            <?php
        }
        
        function generateDateBox($con,$question_id)
        {
            $uni_name=$question_id."_Date";
            ?>
            <div class="DateBox" style="padding:1%;">

            <input type="date" class="datetype"  name="<?php echo $uni_name; ?>" id="" required="true"/>
            
            </div>
            <?php


        }

        function generateOptionBox($con,$question_id)
        {
            $query="SELECT * FROM survey_option_box_table WHERE question_ID='$question_id'";
            $query_run=mysqli_query($con,$query);
           // echo mysqli_num_rows($query_run);
            
            $cell_option=mysqli_fetch_assoc($query_run);
            $i=1;
            
            $uniName = $question_id."_optionBox";
            $optxt="option_";
            
            $disStatus="block";
            while($i <= 30)
            {
                $optxt=$optxt.$i;
                if($cell_option[$optxt] != "null")
                {
                    ?>
                        <div class="optionBox">
                        <input type="radio" name="<?php echo $uniName ?>" value="<?php echo $cell_option[$optxt]; ?>" required="true"> <?php echo $cell_option[$optxt];?> 

                        </div>
                    <?php
                }
                $optxt="option_";
                $i++;
            }


            //if the other is set true
            if($cell_option['otherTXT'] == "true")
            {
                ?>
                <div class="other">
                    <input type="radio" name="<?php echo $uniName; ?>"  value="" id="otherRadio">
                    <textarea name="" id="otherTXT" cols="30" rows="4" placeholder="maximum 100 characters" readonly="false" maxlength="100"></textarea>
                </div>
         <?php   }

        }
    

           function generateCheckBox($con,$question_id)
            {
                  $query="SELECT * FROM survey_check_box_table WHERE question_ID='$question_id'";
                  $query_run=mysqli_query($con,$query);  
                  $cell_chkBox=mysqli_fetch_assoc($query_run);
                    $chkBox_Index="check_box_";
                    $checkBox_name=$question_id."_CheckBox_";
                    $i=1;
                    while($i <= 30)
                    {
                        $chkBox_Index=$chkBox_Index.$i;
                        $checkBox_name=$checkBox_name.$i;
                        if($cell_chkBox[$chkBox_Index] != "null") {
                        ?>
                           <div class="CheckBoxCont">
                            <input type="checkbox" name="<?php echo $checkBox_name; ?>" value="<?php echo $cell_chkBox[$chkBox_Index]; ?>"><?php echo $cell_chkBox[$chkBox_Index];?>
                           
                           </div>
                    
                            <?php
                        }

                      elseif($cell_chkBox[$chkBox_Index] == "null") {
                        ?>
                        
                        <div class="CheckBoxCont" style="display:none;">
                        <input type="checkbox" name="<?php echo $checkBox_name; ?>" id="" value="<?php echo $cell_chkBox[$chkBox_Index]; ?>"><?php echo $cell_chkBox[$chkBox_Index];?>
                       
                       </div>
                        <?php

                        }
                    $chkBox_Index="check_box_";
                    $checkBox_name=$question_id."_CheckBox_";
                      $i++;  
                    }


            }
            
           
        function generateDropDownBox($con,$questionId)
        {
            $query="SELECT * FROM survey_dropdown_box_table WHERE question_ID='$questionId'";
            $query_run=mysqli_query($con,$query);
            $cell_drop_value=mysqli_fetch_assoc($query_run);  
            $i=1;
            $cell_drop_index="drpDown_"; 
            $drop_name=$questionId."_dropdownSel"; 
      ?>      
            <div style="padding:1%;">
            <select name="<?php echo $drop_name; ?>" style="font-size: 18px;width: 24%;" >
                     <option value="Choose" text="Choose">Choose</option>
       <?php 
           while($i <=30)
           {   
               $cell_drop_index=$cell_drop_index.$i;
              if($cell_drop_value[$cell_drop_index] != "null")
              {
              
              ?>
               <option value="<?php echo $cell_drop_value[$cell_drop_index]; ?>"> <?php echo $cell_drop_value[$cell_drop_index]; ?> </option>
               <?php
              }
               $cell_drop_index="drpDown_";
               $i++;
           }
               ?>
       </select></div>
           <?php

        }


       
    
    
 
        /* generating the answer */
    ?>



    <?php
        $query="SELECT * FROM survey_questions_table WHERE survey_ID='$SURVEY_ID' AND cmpny_ID='$CMP_ID'";
        $query_run=mysqli_query($con,$query);
        $count=1;
       while ($Survey_data=mysqli_fetch_assoc($query_run)) {
       
    ?>
        <div class="superContainer">

            <!-- THe question comes first-->
                <section class="questionIsHere"> 
                    <div id="TheQuestion">
                  <?php echo $count.".".$Survey_data['question_txt']; ?>
                    </div>

                </section>   
        <!-- Question Ends Here-->
                <?php
                $type=$Survey_data['type_of_answer'];
                $qId=$Survey_data['question_ID'];
               // echo $type;
                
                switch ($type) {
                    case 'multipleChoice':
                        
                        generateOptionBox($con,$qId);


                        break;
                    case 'paragraph':

                        generateParagraphBox($con,$qId);

                    break;

                    case 'checkBox':
                         generateCheckBox($con,$qId);
                    
                     break;

                    case 'Date':
                        generateDateBox($con,$qId);

                    break;

                    case 'DropDownBox':
                        generateDropDownBox($con,$qId);
                    break;
                }




                ?>
            </div>       

        <?php
          $count++;   }
            ?>

        </section>
<!-- body of the Survey Question ends here-->
    <section class="SUBMITcls">
                <div class="ActionButton">
                <input class="Survey_Button"  name="SurveyComplete" type="submit" value="Submit">
                <input class="Survey_Button" type="reset" value="Reset">
                </div>


    </section>

</form>


















    
</body>
<script type="text/javascript" src="../javascript/TakeSurvey.js"></script>
</html>