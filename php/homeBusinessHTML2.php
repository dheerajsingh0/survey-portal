<?php 
    require 'DBconfig.php';
    session_start();
    
   // $CmpName="";
    //$Aboutcmp="";
    //$phno="";
    //$email="";
    
    if(@$_SESSION['company_id_no'] == "")
    {
        header('location:BussinessModHTML1.php');
        die();
    }

    $nameCmp="";
    $emailCmp="";
    $phnoCmp="";
    $aboutCmp="";
   

    //function cmpnyPortfolio()
    
        $ID=$_SESSION['company_id_no'];
        $query="select * from bussinesstable where cmpny_ID='$ID'";
        $result=mysqli_query($con,$query);
        
        $rowData=mysqli_fetch_assoc($result);
       
        $CmpName=$rowData['cmpName'];
        $Aboutcmp=$rowData['about_Cmpny'];
        $phno=$rowData['phno'];
        $email=$rowData['email_ID'];
        
        $id1=$_SESSION['company_id_no'];
        $queryString="select * from bussinesstable where cmpny_ID='$id1'";
        $queryProfile=mysqli_query($con,$queryString);
        
        $profileDataRow=mysqli_fetch_assoc($queryProfile);
        $nameCmp=$profileDataRow['cmpName'];
        $emailCmp=$profileDataRow['email_ID'];
        $phnoCmp=$profileDataRow['phno'];
        $aboutCmp=$profileDataRow['about_Cmpny'];
         
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/homeBusinessCSS2.css">
    <link rel="stylesheet" href="fontawesome-free-5.8.1-web\css\all.css">
    

   
    <title>Bussiness Function page</title>
</head>
<body>
  
    
    
    
    
    
    
    <div class="sideMainBar">
        <div class="logo">
            <label>Indian Opinion</label><br>
            <label>(Online Survey Portal)</label>
            </button>
        </div><br/><br/>
        
        <!--<img src="" alt="" style="border: solid;
        width: 100%;
        padding: 34%;
        padding-right: 63%;"><br/>-->
        <div class="sideButtons">
            
        <button class="sMBbtns" id="Side_profileBtn"><i style="font-size: 15px;" class="fa fa-user"></i>&nbsp;&nbsp;Profile </button>
        <button class="sMBbtns" id="SurveyKitBtn"><i style="font-size: 15px;" class="fa fa-list-alt"></i>&nbsp;&nbsp;survey Kit </button>
                <button class="sMBbtns" id="SK_op1"><i style="font-size: 15px;" class="fa fa-th-large"></i>&nbsp;&nbsp;New Survey</button>
                <button class="sMBbtns" id="SK_op2" ><i style="font-size: 15px;" class="fa fa-ellipsis-h"></i>&nbsp;&nbsp;Manage Survey</button>
        <button class="sMBbtns" id="reportOnSurveyBtn"><i style="font-size: 15px;" class="fa fa-chevron-circle-right "></i>&nbsp;&nbsp;Report & Response </button>
        </div>   


    </div>
    <div id="AccountMnu">
        <img src="<?php echo $_SESSION['loggedUser_Pro_img']; ?>" alt="profile image" style="height: 35px;width: 26%;border-radius: 21px;border: solid;margin-left: 3px;">
        <button id="proButton"><?php echo @$nameCmp;?>&nbsp;<i class="fa fa-chevron-circle-down"></i></button>
           
        <div id="QuickMnu">
        
           <button class="QuickMnuBtns" id="QprofileBtn"><i class="fa fa-user"></i>&nbsp;&nbsp;Profile</button>
           <button class="QuickMnuBtns" id="QSecurityBtn" >Security</button>
           <button class="QuickMnuBtns" id="logoutBTNS"><i class="fa fa-sign-out"></i>LogOut</button>
           
           
           </div>      
    </div>

    <!-- New Survey -->
<div class="survey" id="SURVEYcontainer">

    <div class="view-box" id="viewBox" style="display:block;">
            <div id="headingMsg">
            <label></label>Welcome to Survey Builder
            <br> <i>(Your one stop solution to designing your own online survey)</i>
        </div>
    </div>
    <!-- creating a new survey -->


    <div class="PrimaryDetails" id="PriData" style="display:block;" >
      
      
      
        <form action="homeBusinessAction2.php" name="primaryForm" method="POST" onsubmit="return validate()">
      
      
      
      
        <h3 style="border-left: 9px solid;padding-left:1em;"><label>Preliminary Survey Details</label></h3>    
        <div id="fieldsContainer">
        <label>Title of the Survey</label><br>
        <input type="text" name="titleTxt" class="PrimaryDataInput" required="true"/><br>

        <label>Description of the Survey</label>
        <textarea name="Desctxt" cols="30" rows="10" required="true" maxlength="250" placeholder="maximum 250 characters" ></textarea><br>


        <label>Duration of the Survey:</label><br>
            <div id="durationSurvey">
             <label>From Date:</label>
             <input type="date" name="FromDate" class="PrimaryDataInputDate" value="<?php echo date('Y-m-d'); ?>" />
        
             <label style="margin-left: 6%;">To Date:</label>
             <input type="date" name="ToDate" class="PrimaryDataInputDate" required="true" />
            </div>
        </div>
        <div id="nextAndSave">
            <input type="submit" name="PrimarySry_Btn" id="PrimarySry_Btn1"  value="Next" />
        </div>
        </form>

    </div>
<!-- end of primary data upload -->

        <!-- mainFrame survey builder-->
    <div id="mainFrameSuvey" style="display:none;">
        <div class="surveyContainer">
            <div id="titleOfSurvey">
            <!-- title of the survey is displayed here -->
            <label style="font-size: 21px;display: grid;place-items: center;">Title Of Suvery:<?php echo $_SESSION['titleOf_suvry']; ?></label><hr>
            </div>

            <div id="NumOfQ">
                <label>Total Questions uploaded :<?php echo $_SESSION['counterOfQuestion']; ?></label>
            </div>





            <form name="surveyUploadForm" action="homeBusinessAction2.php" onsubmit="return SuperValidate()" method="POST">
    
    
    
    
    
    
    
    
    
    
            <div id="SuperContainer">
            <!-- question container -->
                <div class="questionsContainer">
                <label>Question number:<?php echo $_SESSION['counterOfQuestion'] + 1 ;?></label>
                <input type="text" name="Uni_question_txt" style="width: 95%;padding: 3px;" placeholder="Enter your question here." required="true" />
                </div>

               

<!-- *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*- -->
            <!-- all choice,dropdown,checkbox container -->    
                <div id="multipleChoiceContainer" class="AnswerContainer" style="display:none">            

                    <div class="AnsMultiple" style="display:block;" id="multiple_1">
                        <input type="radio" name="multipleChoice" value="">
                        <input type="text" style="width: 87%;" name="Choice_text_1" id="Choice_text_1" placeholder="Enter option text here" value="" />
                   
                    </div>
               <!-- starting the remaining choice boxes -->
                <?php
                    $txtIdvalue="Choice_text_";
                    $idValue="multiple_";
                    $i=2;
                    while($i <= 30)
                    {
                        $idValue=$idValue.$i;
                        $txtIdvalue=$txtIdvalue.$i;
                ?>
                <div class="AnsMultiple" id="<?php echo $idValue; ?>" style="display:none;">
                  <input type="radio" name="multipleChoice">
                  <input type="text" style="width: 87%;" name="<?php echo $txtIdvalue; ?>" id="<?php echo $txtIdvalue; ?>" placeholder="Enter option text here" value=""/>
                   
                 </div>
                
                
                <?php
                    $i++;
                    $idValue="multiple_";
                    $txtIdvalue="Choice_text_";
                }
                ?>
                 <div class="AnsMultiple" id="otherContainer" style="display:none;padding-left: 3%;width: 97%;">
                 <input type="radio" name="multipleChoice"><input type="text" name="otherTXTVal" style="width: 90%;" id="otherTXT" placeholder="other Answers" value="" readonly="true"/>
                   
                 </div>

                 
                 <!--the creator -->   
                <div id="multipleCreator">
                <input type="radio" disabled="true"><input type="button" id="addOptionMore" value="Add Option" /> or <input type="button" id="RemoveOption" value="Remove option" /> <!--or--> <input type="button" id="AddOtherBtn" value="Add 'Other'" style="display:none;"/>  <input type="button" id="removeOther" style="display:none" value="remove other" />
                  

                </div>
                <!-- the creator end here -->
                    <div id="saveMultipleContainer2" class="theSaveClass" style="display:block;">
                    <input class="saveSubmitClass" type="submit" value="Save & Submit" id="multipleChoiceSubmitBTN" name="submitMultipleChoiceBtn"/>
                    </div>
                </div>
<!-- *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*- -->
            <!-- multiple choice ends here -->
                <!-- check box container starts here -->                
                <div id="checkboxContainer" class="AnswerContainer" style="display:none">
                        <div class="AnsCheckBox" style="display:block;" id="CheckBox_1">
                          <input type="checkbox" name="CheckBoxDis" value=""><input type="text" style="width: 87%;" name="CheckBoxTXT_1" id="CheckBoxTXT_1" placeholder="Enter checkbox text here" value=""/>
                        </div>

                     <!-- starting the remaining choice boxes -->
                <?php
                    $txtIdvalue="CheckBoxTXT_";
                    $idValue="CheckBox_";
                    $i=2;
                    while($i <= 30)
                    {
                        $idValue=$idValue.$i;
                        $txtIdvalue=$txtIdvalue.$i;
                ?>
                <div class="AnsCheckBox" id="<?php echo $idValue; ?>" style="display:none;">
                <input type="checkbox" name="CheckBoxDis" value="" disabled="true"><input type="text" style="width: 87%;" name="<?php echo $txtIdvalue; ?>" id="<?php echo $txtIdvalue; ?>" placeholder="Enter checkbox text here" value=""/>
                   
                 </div>
                
                
                <?php
                    $i++;
                    $txtIdvalue="CheckBoxTXT_";
                    $idValue="CheckBox_";
                }
                ?>

                    <!--the creator of checkBox-->   
                    <div id="multipleCreator">
                    <input type="checkbox" disabled="true"><input type="button" id="addCheckBoxMore" value="Add CheckBox" /> or <input type="button" id="RemoveCheckBox" value="Remove CheckBox" /> 
                    </div>
                    <!-- the creator end here and -->
                   
                   
                   <div id="saveCheckBoxContainer" class="theSaveClass" style="display:block;">
                    <input class="saveSubmitClass" type="submit" value="Save & Submit" id="ChkBxSubmitBTN" name="submitCheckBoxBtn"/>
                    </div>



                    </div>
                <!-- the choice box ends here -->
<!-- *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*- -->
                <!-- paragraph starts here -->
                  <div id="comment_or_paragraph_container" style="display:none;">
                
                    <div>
                    <label>paragraph</label><br>
                    <textarea name="commentTxt" id="" cols="95" rows="10" placeholder="comment or feedback maximum 250 characters" maxlength="250"></textarea>
                     <input type="reset" value="clear" />    
                    
                    
                    </div>  


                    <div id="saveParagraphContainer" class="theSaveClass" style="display:block;">
                    <input class="saveSubmitClass" type="submit" value="Save & Submit" name="submitCommentBtn"/>
                    </div>


                  </div>   
                  <!-- paragraph ends here -->
<!-- *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*- -->
                  <!-- date type starts here -->
                  <div id="Date_container" style="display:none;">
                
                   <div>
                    <label>select date</label><br>
                    <input type="date" name="dateAns" style="border:0.5px solid;padding:1%;"/>
                     <input type="reset" value="reset" />    

                    
                    </div> 

                    <div id="saveCheckBoxContainer" class="theSaveClass" style="display:block;">
                    <input class="saveSubmitClass" type="submit" value="Save & Submit" name="submitDateBtn"/>
                    </div>


                  </div>   
                    <!-- date type ends here -->
<!-- *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*- -->
                  <!-- default label -->
                  
                    <div id="displayDefaultHere">
                    <label>select answer type</label>
                    </div>
                  
                 <!-- default label --> 
                  
<!-- *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*- -->
                <!-- drop down starts here -->
                <div id="dropDownContainer" style="display:none;">
                
                    <div>
                        <input id="drptxt" type="text"/ placeholder="Enter text here to insert into dropdown box">
                        <input type="button" id="insertBtn" value="Insert">
                        <input type="reset" value="reset" id="resetBtn" />
                    </div>
                
                    <div>
                        <select name="" id="DropDownBox">
                            <option value="">Select</option> 
                        <?php
                            $i=1;
                            $idValue="drpOption_";
                            $InnertxtId="drpOptTxt_";
                            while ($i <= 30) {
                        ?>
                            <option id="<?php echo $idValue.$i; ?>" style="display:none;"><?php echo "data".$i; ?>
                            </option>
                         <?php
                            $i++;
                            }
                         ?>        
                         </select>
                      
                      
                      
                      
                       <div id="optiontxtContainer">

                       <?php
                       $i=1;
                            while($i <= 30)
                            {

                         ?>

                       <input type="text" name="<?php echo $InnertxtId.$i; ?>" id="<?php echo $InnertxtId.$i; ?>" />
                       <?php
                            $i++;
                            }
                       ?>


                       </div>         
                       <div id="saveCheckBoxContainer" class="theSaveClass" style="display:block;">
                          <input class="saveSubmitClass" type="submit" value="Save & Submit" id="DropdwnSubmitBTN" name="submitDrpDownBtn"/>
                         </div>
                    </div>
       
                </div>
                <!-- drop down end here -->
          
<!-- *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*- -->
            
               <!-- all choice,option ands here -->    
            </div>
            
                <!--  -->
                <div>
                   

                </div>                


            
            </form>
             <!-- selection for type of answer for survey -->
             <div id="TypeOfAnswerContainer">
                <button class="AnswerWaysBtn" id="selectCheckBox">CheckBox</button>
                <button class="AnswerWaysBtn" id="selectDropDown">DropDownBox</button>
                <button class="AnswerWaysBtn" id="selectMultipleChoice">MultipleChoice</button>
                <button class="AnswerWaysBtn" id="selectParagraphBox">Paragraph(comment text box)</button>
                <button class="AnswerWaysBtn" id="SelectDate" >Date</button>
                
              </div>

           <div id="endSurvey">
                <form action="homeBusinessAction2.php" method="POST">
                <input type="submit" name="TheCompleter" id="TheCompleter" value="Complete Survey">
                </form>
           </div>                  

        </div>
       
    </div>
   

</div>
<!-- end of primary data upload -->

    

    <div id="profileviewContainer" class="profileviewContainerCLS">
        <div id="companyData" class="companyDataCLS">
            <div class="headingName">
                <label><?php echo $CmpName; ?></label>
            </div>
            <br/>
            <br/>

            <div class="aboutCmpnyDetails" style="padding:1.5%;">
                <b>About Us</b><br>
                <p style="text-align:justify;">
                <?php echo $Aboutcmp; ?>
                </p>
            </div>
            <br>
            
            <div class="contactInfo" style="padding: 1.5%">
                <b>Contact info</b><br><br>
                <label>Email Id:</label> <?php echo $email; ?><hr>
                <label>Contact Number:</label><?php echo $phno; ?><hr>
            </div>
            
            
        </div> 
        <div class="THEbox"></div>
    </div>
    <div class="btmNavBtns" id="btnNavBtnsID">
                <button class="btmBtns" name="EDIT_nav_btn" id="EDIT_nav_btn1">Edit profile</button>
                <button class="btmBtns" name="View_Profile" id="View_Profile1">view profile</button>
                <button class="btmBtns" name="delete_profile" id="delete_profile1">Delete</button>   
    </div>
    <!-- EDIT profile forms -->

    <div id="edit_pro_frame" class="edit_proFrameContainer">

    <form id="editForm" action="homeBusinessAction2.php" method="post" enctype="multipart/form-data">
    <h4 style="border-left:solid;padding-left:1em;"><label>Edit Profile</label></h4>
    <div class="txtfieldsOF_edit_pro">
    <label>Name:</label><input type="text" name="cmpnyName" required="true" value="<?php echo @$nameCmp; ?>" />
    </div>
    
    
    
    <div class="txtfieldsOF_edit_pro">
    <label>Email ID:</label><input type="email" name="cmpnyEmail" required="true" value="<?php echo @$emailCmp; ?>" />
    </div>
    
    

    <div class="txtfieldsOF_edit_pro">
    <label>Contact Number:</label><input type="number" name="cmpnyNumber" required="true" value="<?php echo @$phnoCmp; ?>" />
    </div>       
 



    <div class="txtfieldsOF_edit_pro">
    <label>About Us:</label><textarea placeholder="Maximum 250 characters" rows="5" name="cmpnyAbt" maxlength="250" required="true"><?php echo @$aboutCmp; ?>
    </textarea>
    </div> 
    
    

    <div class="txtfieldsOF_edit_pro1">
    <input class="editBTNS" type="submit" name="edit_btn" value="save changes"  />
    <input type="reset"  value="cancel" class="editBTNS" />
    </div> 

    <div class="ImageContainer">
        <img src="<?php echo $_SESSION['loggedUser_Pro_img'] ?>" id="ImageOfBPro" alt="profile image">
        <input type="file" name="ImageUpload" id="BproImgUpload" accept=".jpg,.png,.jpeg" />
    </div> 

    <form>
    </div>
<!-- end of edit profile design code -->


<!-- starting delete profile code -->
<div class="modalContainer" id="modalContainerDelAC">
<div id="delProContainer">
    <div id="msgContents"><label>Are You sure You want to delete your profile?(note:this will delete your entire data)</label></div>
    
    <form action="homeBusinessAction2.php" name="deleteAC" method="post">
        <div id="actionBtnsContainer">
            <input type="submit" class="AnsBtns" name="ans_Yes_btn" id="ans_Yes_btn1" value="Yes" />
            <input type="button" class="AnsBtns" name="ans_No_btn" id="ans_No_btn1" value="No" />
        </div>   
   </form> 
    </div>
</div>


<!-- security code starts here -->

<div id="securityContainer">
    <form action="homeBusinessAction2.php" method="post">
    <h3 style="border-left: 3px solid;padding-left:1em;"><label>Security Settings</label></h3>    
        <div id="SecDataFields">
            
            <label>Password:</label>
            <input type="password" name="OldPswd" required="true">
            <label>New Password:</label>
            <input type="password" name="NewPswd" required="true">
            <label>New Security code:</label>
           <input type="number" name="New_Sec_code" required="true">
            <input type="submit" name="secModsubmit_btn" id="TheSaveBtn" value="Save">
        </div>
    </form>
</div>


<!-- manage survey starts here -->
<section id="ManageSurveyContainer" style="display:none;">
        <form name="survey_mng" action="homeBusinessHTML2.php" method="POST"></form>
        <!--<table style="position: absolute;left: 5%;border: none;">
        <tr>-->     
            <?php
            //function that creates one rows at a filled with 5 td
                         $survey_mng_cid = $_SESSION['company_id_no'];
                            //echo $survey_mng_cid;
                        $survey_mng_query="SELECT * FROM primary_survey_details_table WHERE Cmpny_ID='$survey_mng_cid'";    
                         $run_query=mysqli_query($con,$survey_mng_query);   
                          $Total_rows=mysqli_num_rows($run_query);
                         $sur_cell="cell_id_";
                          //echo $Total_rows;
                            if($Total_rows == "0")
                            {
                               ?>
                              <div id="noSurvey">

                                <label id="msgNoSurvey">No Surveys Uploaded</label>

                              </div>
            <?php
                                    
                            } 
                         else {   
               ?>
                        <label>Your Surveys</label><hr>
                     <table id="AllSurveys"> 
                        <tr>       
                            <td>
                                <div class="divCellsH">
                                    Title:Indian Opinion
                                    <p>Something something blah blah.</p>
                                </div>
                            </td>
                            
                            <td>
                                <div class="divCellsH">
                                    Title:Indian Opinion
                                    <p>Something something blah blah.</p>
                                </div>
                            </td>
                            <td>
                                <div class="divCellsH">
                                    Title:Indian Opinion
                                    <p>Something something blah blah.</p>
                                </div>
                            </td>
                            <td>
                                <div class="divCellsH">
                                    Title:Indian Opinion
                                    <p>Something something blah blah.</p>
                                </div>
                            </td>
                            <td>
                                <div class="divCellsH">
                                    Title:Indian Opinion
                                    <p>Something something blah blah.</p>
                                </div>
                            </td>
                          
                        </tr>
                            
                           

                <tr>
           <?php 
                   
                    $iTH=1;         
                     while ($data_survey = mysqli_fetch_assoc($run_query)) 
                     {    

            ?>
                     <td>
                                <div id="infosml" class="divCells">
                                    
                                  <p class="TitlePara"> <?php echo $data_survey['Title_Of_Survey']; ?></p>
                                  <hr>  
                                  
                                  <p class="litInfo">
                                  <?php echo $data_survey['description']; ?>
                               
                                </p>
                                    <label>From Date:<br>


                                <input style="border:none;" type="date" value="<?php echo $data_survey['from_Date']; ?>" readonly />
                                </label>
                                <br>

                              <label>To date:<br><input style="border:none;" type="date" value="<?php echo $data_survey['To_Date']; ?>"  readonly />
                                        </label>
                            
                                        
                                  <div class="actbtns">
                                  <input type="button" onClick="deleteSurvey('<?php echo $data_survey['Survey_ID']; ?>')" VALUE="Delete" />
                                  <input type="button" value="Preview" onClick="PreviewSurvey('<?php echo $data_survey['Survey_ID']; ?>','<?php echo $ID; ?>')" />
                                   
                                  </div>    

                                 </div>
                                 
                                 
                               
                               

                    </td>

                    <?php
                            $res=$iTH % 5;
                            if($res == 0)
                            {
                        ?>
                                </tr>
                                <tr>
                       <?php             
                            }
                        ?>
                        
                    <?php
                        
                            if($iTH <= $Total_rows)
                            {
                                $iTH++;
                            }
                
                        }

                    ?>
                    </tr>
                    </table>
                    <?php } ?>
</section>

<!-- manage survey ends here -->


<!-- *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* -->
<!-- SURVEY REPORT FOR ALL SURVEY OF THE LOGGED COMPANY STARTS HERE -->

        <section id="survey_report" style="display:none;">
                        
                <section id="all_survey_container">
                        <div class="surveysFrame">



                        <?php

                            $report_query_run=mysqli_query($con,"SELECT * FROM primary_survey_details_table WHERE Cmpny_ID='$ID'");
                            if( mysqli_num_rows($report_query_run) > 0 )
                            {
                        ?>
                        <table class="reportSurveyTable">
                            <!-- base for the table -->
                            <tr style="visibility: hidden;">
                                <td>
                                <div class="contentsSurveyReport">
                                
                                I am a survey
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam ipsa at inventore quia. Impedit obcaecati sunt velit aperiam ducimus vel quis ex laboriosam aut doloremque odio, recusandae sit. Culpa, numquam?
                                </div>
                                </td>
                
                                <td>
                                <div class="contentsSurveyReport">
                                
                                I am a survey
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione ipsum velit blanditiis similique distinctio, voluptate, voluptates nihil aspernatur debitis temporibus beatae culpa aperiam natus quis ullam doloremque asperiores id quisquam.
                                </div>
                                </td>

                                <td>
                                <div class="contentsSurveyReport">
                                
                                I am a survey
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo sapiente libero eius quia exercitationem optio, eaque odit, facilis excepturi tempora vero suscipit reprehenderit accusamus molestiae neque hic quaerat harum itaque?
                                </div>
                                </td>

                                <td>
                                <div class="contentsSurveyReport">
                                
                                I am a survey
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia voluptates voluptatem aliquam alias totam architecto, obcaecati vel similique enim nihil. Iure ipsum quisquam inventore animi facere vero voluptas odio molestiae!
                                
                                </div>
                                </td>
                            </tr>
                        
                            <tr>
                            <?php

                                 
                                    $cells_count_report=1;
                                    while($each_survey_data=mysqli_fetch_assoc($report_query_run))
                                    {
                                     
                            ?> 
                            
                            <td>
                            <div class="contentsSurveyReport">
                                <div class="RhearderTitle">
                                <!-- header tile  -->

                                </div>
                                <div class="RtitleOfsurvey">
                                  <!-- survey name -->      
                               <?php echo $each_survey_data['Title_Of_Survey']; ?>
                                </div>   
                                <div class="Rtiming">
                                    Survey start Date:<?php echo date("d-m-Y",strtotime($each_survey_data['from_Date'])); ?><br>
                                    Survey End Date:<?php echo  date("d-m-Y",strtotime($each_survey_data['To_Date'])); ?>
                                </div>     
                                <div class="RPBtn">
                                   <!-- action button-->
                                   <input type="button" class="TheREPORTbtn" onClick="GenXReport('<?php echo $each_survey_data['Survey_ID']; ?>','<?php echo $each_survey_data['Cmpny_ID']; ?>')" value="Show Report" />
                                   
                                   
                                </div>

                            </div>
                            </td>
                            
                            <?php
                                   if($cells_count_report % 4 == 0) { ?> </tr><tr> <?php }
                                  $cells_count_report++;  }
                            ?>
                        </tr>
                        </table>
                        <?php

                            }
                            ?>
                                    
                        </div>
                </section>
                </section>            


<!-- end of survey report -->
<!-- logout html code goes here -->
<div class="modalContainer" id="modalContainerLogout">
<div id="delProContainer">
    <div id="msgContents"><label>Confirm LogOut From Indian Opinion?</label></div>
    
    <form action="homeBusinessAction2.php" name="LogoutAC" method="post">
    <div id="actionBtnsContainer">
    <input type="submit" class="AnsBtns" name="ans_Yes_btnLOGUT" id="ans_Yes_btn2" value="Yes" />
    <input type="button" class="AnsBtns" name="ans_No_btn" id="ans_No_btn2" value="No" />
    <div>   
   </form> 
    </div>
</div>
<!-- end of logout code -->

<!-- important javascript goes here -->
<script type="text/javascript">
   
   
   
   var emptiedChoice = new Array(30);
   
   

   // alert(THElostDiv);
    function clearAndCut(getIdnum)
    {
     alert("working the id is" + getIdnum);
        var divID ="multiple_" + getIdnum ;
        var textID ="Choice_text_" + getIdnum;
     document.getElementById(textID).value="";
     document.getElementById(divID).style.display="none";
     emptiedChoice[getIdnum]=divID;
     alert("array contents are" + emptiedChoice[getIdnum]);
     i=i-1;
    }

</script>

<!-- super javascript file -->
 <script type="text/javascript" src="../javascript/homeBusinessJS2.js"></script>
<!-- next js -->

<script type="text/javascript">
        
            var StillCreating=<?php echo json_encode(@$_SESSION['progress_status'])  ?>;
            if(StillCreating == "true")
            {
            SK_op1.style.display="block";
            SK_op2.style.display="block";
            clickCheck="true";
            
                document.getElementById("mainFrameSuvey").style.display="block";
             
                document.getElementById("PriData").style.display="none";
                document.getElementById("viewBox").style.display="none";
                document.getElementById("SURVEYcontainer").style.display="block";            
                document.getElementById("profileviewContainer").style.display="none";
                document.getElementById("edit_pro_frame").style.display="none";
                document.getElementById("btnNavBtnsID").style.visibility="hidden";
            }
           
            if(StillCreating == "false")
            {
                /*SK_op1.style.display="block";
                SK_op2.style.display="block";
                clickCheck="true";
                */
                /*document.getElementById("mainFrameSuvey").style.display="none";
             
                document.getElementById("PriData").style.display="block";
                document.getElementById("SURVEYcontainer").style.display="block";            
                document.getElementById("profileviewContainer").style.display="none";
                document.getElementById("edit_pro_frame").style.display="none";
                document.getElementById("btnNavBtnsID").style.visibility="hidden";
                    */

            }
            function  confirmTheComplete()
               {
                
                 var totalQ=<?php echo json_encode(@$_SESSION['counterOfQuestion']) ?>;   
                    if(totalQ == 0)
                    {
                        var ans=window.confirm("No questions has been uploaded for this survey,survey will be Disgraded,Carry out operation");
                        if(ans == "true")
                        {
                            alert("ans" + ans);
                            return true;
                        }
                        else
                        {
                            alert("ans" + ans);
                            return false;
                        }
                    }
                }

           function PreviewSurvey(survey_id,cmp_id) {
               
                window.location.href="PreviewSurvey.php?Survey_ID=" + survey_id +"&Company_ID=" + cmp_id;


           }
           

        
        </script>






    <body>
</html>