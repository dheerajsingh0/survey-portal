<?php
    
    require 'DBconfig.php';
    session_start();
    if($_SESSION['pubUser_id_no'] == "")
    {
    
        header('location:index.php');
        die();
    }
   $TheID = $_SESSION['pubUser_id_no'];
   $query_uni="SELECT * FROM public_table WHERE PubUserID='$TheID'";
    $quer_uni_run=mysqli_fetch_assoc(mysqli_query($con,$query_uni));
    $uname=$quer_uni_run['username'];
    $e_mailID=$quer_uni_run['email_ID'];
    $contactNo=$quer_uni_run['phno'];
    $proImg=$quer_uni_run['profile_photo_link'];
    $_SESSION['PRO_IMG_pub']=$proImg;
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/publicHomepageCSS1P.css">
    <!--<link rel="stylesheet" href="fontawesome-free-5.8.1-web\css\all.css">-->
  

    <title>Public Homepage functionality</title>
</head>
<body>
        <div class="sideMainBar">
                <div class="logo">
                    <label>Indian Opinion</label><br>
                    <label>(Online Survey Portal)</label>
                </div><br/><br/>
                
                <div class="sideButtons">
                        <button class="sMBbtns" id="proSideBTN">Profile</button>
                            <div class="dwnMnuBTN" id="dwnMnuID" style="display:none;">
                            <button class="dwnbtns" id="viewProBTN">View</button>
                            <button class="dwnbtns" onClick="DeleteMyPublicAcc('<?php echo $TheID; ?>')" id="deleteProBTN">Delete</button>
                            <button class="dwnbtns" id="editProBTN">Edit</button>
                            <button class="dwnbtns" id="securityProBTN">Security Settings</button>
                            <button class="dwnbtns" id="logOutBTNS">Logout</button>
                         </div>
            
               
                <button class="sMBbtns" id="SurveyKitBtn">Take a survey</button>
                <button class="sMBbtns" id="His&R">History & Report</button>
                
               <!-- <button class="sMBbtns" id="SK_op2" ></button>-->
              
                </div>   
        
        
            </div>
<div class="SuperMain"> 
<?php

if(isset($_GET['FRAME'])) {
    $FrameOperator=$_GET['FRAME'];
        FrameOpertorFunction($con,$FrameOperator,$uname,$e_mailID,$contactNo,$proImg,$TheID);
    }
function FrameOpertorFunction($con,$FrameOperator,$uname,$e_mailID,$contactNo,$proImg,$TheID)
    {

        switch ($FrameOperator) {
            case 'Profile':
            profileContainer($con,$uname,$e_mailID,$contactNo,$proImg);
                break;
            case 'Take_Survey_Now':
            TakeSurveyContainer($con,$TheID);
                break;
            case 'History_Report':
            publicHistory($con,$TheID);
                break;
                
        }



    }

?>


    <?php
    function profileContainer($con,$uname,$e_mailID,$contactNo,$proImg) {

    
    ?>


    <div id="profileContainer" style="display:block;">
    
    <!--profile view-->
    <div id="ProfileView" class="profileContainerDip" style="display:block;">
        <img src="<?php echo $proImg; ?>" class="profileImgcls" />
        <form action="#" id="profileFrm">
            <div id="ProfileDataContainer">
                
                <label>Username</label>
                <input type="text" value="<?php echo $uname; ?>" name="" id="" disabled>
               
                <label>e-mailID</label>
                <input type="text" value="<?php echo $e_mailID; ?>" name="" id="" disabled>
                
                
                <label>Contact Number</label>
                
                <input type="text" value="<?php echo $contactNo; ?>" name="" id="" disabled>
                

            </div>

        </form>    
    </div>
    <!-- profile edit -->
    <div id="ProfileEdit" class="profileContainerDip" style="display:none;">
        <img src="<?php echo $proImg; ?>" id="profileImg" class="profileImgcls" />
        <form action="publicHomepageAction1p.php" method="POST" id="profileFrm" enctype="multipart/form-data">
            <div id="ProfileDataContainer">
                
                <label>Username</label>
                <input type="text" value="<?php echo $uname; ?>" name="uname" required>
               
                <label>e-mailID</label>
                <input type="text" value="<?php echo $e_mailID; ?>" name="email_id" required>
                
                
                <label>Contact Number</label>
                <input type="text" value="<?php echo $contactNo; ?>" name="contactNo" required>
               
               <label>Profile Image</label>
                <input type="file" name="public_img_pro" style="margin-top:4px;" accept=".jpg,.jpeg,.png" id="public_img_proID">

            </div>
                <div id="editBTNs">
                    <input class="editBTN" type="submit" name="proEditBTN" value="Save Changes" />
                    <input class="editBTN" type="reset" value="Reset" />

                </div>
        </form>    
    </div>
 <!-- security settings-->
 <div id="ProfileSecuritySettings" style="display:none;">
    <form action="publicHomepageAction1P.php" method="POST">
        <div id="SecDataContainer">
            
            <label>Current Password</label>
            <input type="password" name="pswd" class="secPswdStyle" required="true" />
           
            <label>New Password</label>
            <input type="password" name="newPswd" class="secPswdStyle" required="true" />
            
            
            <label>New Security Code</label>
            
            <input type="number" style="border: none;box-shadow: 0px 0px 5px rgba(0,0,0,0.45);padding: 2%;" name="newSecCode" required="true" />
            

        </div>
            <div id="secBTNs">
                <input class="secActBtns" type="submit" name="setChngSec" value="Update Settings" />
                <input class="secActBtns" type="reset" value="Reset" />

            </div>
    </form>    
</div>


</div>
<?php 
    }
?>

<!-- end of profile container-->

<!-- take survey is here -->

<?php 
        function TakeSurveyContainer($con,$TheID)
        {
?>




<section id="TakeSurveyContainer" style="display:block;">
    <!-- default survey cells for structure -->
    <div></div>
    <table class="surveyTbl" style="width:100%;">
    <tr style="visibility:hidden;">
           
                    <td class="outercellS">
                    <div class="InnerContentCellS">I am A cell</div>
                    </td>

                    <td class="outercellS">
                    <div class="InnerContentCellS">I am A cell</div>
                    </td>

                    <td class="outercellS">
                    <div class="InnerContentCellS">I am A cell</div>
                    </td>

                    <td class="outercellS">
                    <div class="InnerContentCellS">I am A cell</div>
                    </td>


               
    </tr>
    <tr>

    <?php
    /* Performing basic retrival of data form the database */
    
    
    function GetDataFromSurveyTbl($con,$TheID)
    {
        $query="SELECT * FROM primary_survey_details_table";
        $run_query=mysqli_query($con,$query);
        $count=1;
            if(mysqli_num_rows($run_query) > 0)
            {

            
            $allComplete="true";
        //$noSurvey="true";
        while ($fetch_Row_Content=mysqli_fetch_assoc($run_query)) 
        {
            $checkID=$fetch_Row_Content['Survey_ID'];
        /* checking if the user already completed a survey */
        $comp_query="SELECT * FROM survey_report_primary_table WHERE survey_ID='$checkID' AND public_user_ID='$TheID'";
            $res=mysqli_num_rows(mysqli_query($con,$comp_query));
        
            if($res == 0)//public has not taken the survey.
            {
                $allComplete="false";
     ?>       
            <!-- each data row -->  
            <td class="outercellS">
                    <div class="InnerContentCellS">
                        <div class="justCells"><img src="<?php echo "" ;?>" alt=""></div>
                    <div class="MainInfo">
                                             <div class="titleHeader">
                                                <?php echo $fetch_Row_Content['Title_Of_Survey']; ?>
                                            </div>
                     </div>
                     <div class="survey_timing">
                     <label>Survey Started On:<?php  $sd=$fetch_Row_Content['from_Date']; $sd=strtotime($sd); echo date("d-m-Y",$sd); ?></label>
                     <label>Survey Ends On:<?php $sd=$fetch_Row_Content['To_Date']; $sd=strtotime($sd); echo date("d-m-Y",$sd);  ?></label>
                     </div>
                    <div class="ActBtns">
                        <input type="button" class="TheActBtns" onClick="showKnowMore('<?php echo $fetch_Row_Content['Survey_ID']; ?>')" value="Know More">
                        <input type="Button" class="TheActBtns" onClick="TakeSurveyNow('<?php echo $fetch_Row_Content['Survey_ID']; ?>','<?php echo $fetch_Row_Content['Cmpny_ID']; ?>')" value="Take Survey">
                    </div>
                    
                                    
                    
                <?php //echo $fetch_Row_Content['id']; ?>
                </div>
            </td>
            <?php
            if($count % 4 == 0)
            {
            ?>
                 </tr><tr>
             <?php       
             }
            ?>
            <!-- end of fetch data-->
     <?php
            
     $count++;}       
        }
        
            if($allComplete == "true") {
                ?>

                    <td colspan="4"><label class="UhUhoo">No surveys available Now,Check again later</label></td>

        <?php
            }
        }
        else {
            ?>
            <td colspan="4"><label class="UhUhoo">No surveys available Now,Check again later</label></td>
      <?php  }
    }
    GetDataFromSurveyTbl($con,$TheID);
    
    ?>
    </tr>
    </table>


   <!-- know more of the survey details starts here --> 
   <?php
    @$url_survey_ID=$_GET['SurveyID'];
    
    

    function KMDetails($con,$url_survey_ID) {
        $query="SELECT * FROM primary_survey_details_table WHERE Survey_ID='$url_survey_ID'";
        $query_run=mysqli_query($con,$query);
        $data=mysqli_fetch_assoc($query_run);
    ?>
    <div id="CoverOfShow">
    <div id="ShowAboutSurvey">
        <div class="tile"></div>
        <div class="Details">
            <label>Survey Name:</label><div><?php echo $data['Title_Of_Survey']; ?></div>
            <label>Description:</label><p><?php echo $data['description']; ?> </p>
            <label>Survey Start Date:</label><input style="border:none;outline:none;" type="Date" value="<?php echo $data['from_Date']; ?>" readonly/>
            <label>Survey End Date:</label><input style="border:none;outline:none" type="Date" value="<?php echo $data['To_Date']; ?>" readonly/>

        </div>    
        <div class="closeBtns">
            <input type="button" onClick="onCloseShowNoM()" id="closeButton" value="close" />
        </div>
    </div>
    </div>
    <?php 
    }
    if($url_survey_ID != "") {
        KMDetails($con,$url_survey_ID);
    }
    ?>

    <!-- know more ends here -->
</section>

    <?php
        }
        ?>


<?php function publicHistory($con,$TheID)
        {  
        ?>  
<!-- public history and report -->
    <section id="His_Report" style="display:block;">
        <!-- for recent surveys completed i.e today-->
        <section class="recent_completed">
            <?php
            $keepCountSI=1;
                $rep_query=mysqli_query($con,"SELECT * FROM public_survey_completed_report WHERE public_user_id='$TheID'");
                if(mysqli_num_rows($rep_query) > 0) {
                        ?>
                <label>Yours Completed Survey</label>
                    <hr>
                    <table class="RecentTbl">
                     <tr>
                        <th>
                                SI.No
                        </th>
                        <th>Survey Name</th>
                        <th>Uploaded By</th>
                        <th>Completed on</th>
                     </tr>

                        <?php

                while ($rep_query_data = mysqli_fetch_assoc($rep_query)) {
                        ?>
                         <tr>
                            <td><?php echo $keepCountSI; ?></td>
                            <td><?php echo $rep_query_data['survey_name']; ?></td>
                            <td><?php echo $rep_query_data['company_name']; ?></td>
                            <td><?php echo $rep_query_data['completed_date']; ?></td>
                         </tr>


                    <?php
                    $keepCountSI++;
                }
                ?>
                       </table>
                <?php


            }
            else {
                ?>
                    <label id="clearlbl">Your History is empty</label>
                    <script type="text/javascript"> window.onload=function() { 
                        document.getElementById("clrBtn").style.display="none";
                    }</script>
                <?php
            }
            ?>

        

        </section>
            
                <input type="button" onClick="clearMyHistory('<?php echo $TheID; ?>')" id="clrBtn" class="TheClearItAll" value="Clear Survey History">
                 <?php 
                 //clearing the history.
               

                    function clearTHEhistoryRep($con,$pubID)
                    {
                        $del_clr=mysqli_query($con,"DELETE FROM public_survey_completed_report WHERE public_user_id='$pubID'");
                        if($del_clr)
                        {
                            echo '<script type="text/javascript"> alert("Survey History cleared successfully");
                            window.location.href="publicHomepageHTML1P.php?FRAME=History_Report";
                            </script>';
                            die();
                        }
                        else {
                            echo '<script type="text/javascript"> alert("Survey History cannot be cleared");
                            window.location.href="publicHomepageHTML1P.php?FRAME=History_Report";
                            </script>';
                            die();
                        }
                    }
                    if(isset($_GET['CLR']))
                    {
                       $pubID=$_GET['CLR'];
                       clearTHEhistoryRep($con,$pubID);
                    }
                 ?>

    
    </section>
<?php
        }
?>




</div><!-- supermain closes here -->

</body>

<script type="text/javascript" src="../javascript/publicHomepageJS1P.js"></script>
<script type="text/javascript">
    var clickProChk="false";

    <?php
        if(isset($_GET['ShowDrop']))
        {
            $toggle=$_GET['ShowDrop'];
        }
        else {
            $toggle="false";
        } 
    ?>

     var toggleLink=<?php echo json_encode($toggle); ?>;

        if (toggleLink == "true") {
            //hideProfileSubOpt();
            //document.getElementById("profileContainer").style.display="block";
            document.getElementById("dwnMnuID").style.display="grid";
        }
        else if (toggleLink == "false") {
            //hideProfileSubOpt();
            //document.getElementById("profileContainer").style.display="block";
            document.getElementById("dwnMnuID").style.display="none";
        }



  document.getElementById("proSideBTN").onclick=function()
  {
       
        if(toggleLink == "false")
        {
      window.location.href="publicHomepageHTML1P.php?FRAME=Profile&ShowDrop=true";
            
        }
        else if(toggleLink == "true") {

      window.location.href="publicHomepageHTML1P.php?FRAME=Profile&ShowDrop=false";      

        }
    }
    //hideInnerContentAll();
    
      // 
   
    //document.getElementById("ProfileView").style.display="block";   
   /* if(clickProChk == "false") {
      document.getElementById("dwnMnuID").style.display="grid";
        clickProChk="true";
        }
    else if(clickProChk == "true") {
        document.getElementById("dwnMnuID").style.display="none";
        clickProChk="false";
    }
    
  }*/

  document.getElementById("logOutBTNS").onclick=function() {
      if(confirm("Confirm Logout Indian Opinion")) {
        window.location.href="publicHomepageHTML1P.php?getOut=true";
      }
    }
         
</script>
<?php 
    if(isset($_GET['getOut']) && $_GET['getOut'] == "true")
    {   
      
        header('location:index.php');
        session_destroy();
    }

?>


</html>