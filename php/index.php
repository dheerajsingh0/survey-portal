<?php
    require 'DBconfig.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage-Indian Opinion(Online Survey Portal)</title>
    <link rel="stylesheet" href="../css/index.css">
    <script type="text/javascript" src="../javascript/index.js"></script>
</head>
<body>
    
    <header>
        <div id="logo">
            <label>Indian Opinion</label>
            <label>(Online Survey Portal)</label>
        </div>
        <button  id="homeBTN" class="navBarBtn">Home</button>
        <button id="HwItBTN" class="navBarBtn">How it works</button>
        <button id="SpecBtn" class="navBarBtn">About</button>
        <button id="busSurvey" class="navBarBtn">Survey</button>
        <button id="pubSignNavBtn" class="navBarBtn">Sign In</button>

    </header>
    <section id="theFrontDP">
        
        <div class="ActionInfo_btn">
            <label id="heading">Where Surveys Are Made.</label><br>
            <p id="infoContent">Making Your opinion heard,analyzed,Helpfull and more over applied via
                Indian Opinion a platform for All things Surveys. 
            </p>
            <div>
                <button id="THEbtn" class="actionBtn">Take Survey Now</button>
            </div>
            
        </div>
        <div id="collageContainer1" style="display:block;" class="collageContainer">
            <img class="displaySide" id="Image1" src="../resources/picsAndImages/2.jpg"  alt="">
            <img class="displaySide" id="Image2" src="../resources/picsAndImages/3.jpg" alt="">
            <img class="displaySide" id="Image3" src="../resources/picsAndImages/4.jpg"  alt="">
            <img class="displaySide" id="Image4" src="../resources/picsAndImages/5.jpg" alt="">
            <img class="displaySide" id="Image5" src="../resources/picsAndImages/6.jpg" alt="">
            <img class="displaySide" id="Image6" src="../resources/picsAndImages/7.jpg" alt="">
            <img class="displaySide" id="Image7" src="../resources/picsAndImages/8.jpg" alt="">
        </div>
        
        
        <!--LOGIN FOR PUBLIC STARTS HERE-->
        
        <div id="loginFRMPublic" class="LoginFormPublic">
            <form name="publicLoginFrm" action="indexAction.php" method="POST">
                <label class="headingLbl">Sign-In</label>
                    <img src="" alt="">
                <div class="loginFrame">
                    <label>E-mailID</label>
                    <input type="email" class="loginInput" name="pubEmail" required="true" /> 
                    
                    <label>Password</label>
                    <input type="password" class="loginInput" name="pubpswd" style="margin-bottom:7%;" required="true" />
                    <input type="submit" class="LoginsubmitBtn" name="loginBtn" value="login" />
                    <label class="otherOption">Don't have An Account?<button id="NoAccountBtn" class="clickHere">Click here</button></label>
                    <label class="otherOption">Forgot Your Password?<button id="pswdRecoveryBtn" class="clickHere">Click here</button></label>
                </div>

            </form>

        </div>
        <!-- login ends here-->
        <!--Sign Up code starts here-->
       
        
        <div id="publicSignUpContainer">
            <form name="signFORM" action="indexAction.php" method="POST" enctype="multipart/form-data">
                <div class="PubSignUpFrame">
                    <div>
                    <img id="proImg" src="../resources/picsAndImages/ProDemo.jpg"  alt="No Image set">                 
                    <input type="file" accept=".jpg,.png,.jpeg" name="PubProImg" id="PubProImgBtn" required="true"/>
                    </div>
                    
                    <label class="SignUpHeadingLbl">Sign-Up</label>
                    <label>Name:</label>
                    <input type="text" class="PubsignUpTxt" name="PubSignUpName" required="true">
                    
                    <label>E-mailID</label>
                    <input type="email" class="PubsignUpTxt" name="PubSignUpEmailId" required="true">

                    <label>Phone Number</label>
                    <input type="number" class="PubsignUpTxt" name="PubSignUpPhno" required="true">
                    
                    
                    
                    
                    <div class="subContainer">
                        <div style="display:grid;">
                    <label>Gender</label>
                    <div>
                        <input type="radio" name="PubSignUpGender" value="Male" checked="true" required="true">Male
                        <input type="radio" name="PubSignUpGender" value="Female" required="true">Female
                    </div>
                        </div>

                        <div style="display:grid;">
                    <label>Date of birth</label>
                    <input type="date" class="PubsignUpTxt" name="PubSignUpDOB" required="true">
                        </div> 
                    </div>


                    <div class="pswdContainer">
                        <div>
                                <label>Password</label>
                                <input style="width: 92%;" type="password" class="PubsignUpTxt" name="PubSignUpPswd" required="true">
                        </div>
                        <div>
                                <label>Confirm Password</label>
                                <input type="password" class="PubsignUpTxt" name="PubSignUpCnPswd"  required="true">
                        </div>
                    </div>


                    <label>Security Code(Required for Password recovery & Security settings)</label>   
                    <input type="number" class="PubsignUpTxt" name="PubSignUpSecCode" id="">
                    
                    
                    <div style="display: grid;grid-template-columns: 1fr 1fr;">
                        <input type="submit" class="signActionBtns" name="Pub-Sign-Up" value="Sign Up"><input id="ResetSignUp" class="signActionBtns" type="reset" value="Reset">
                    </div>
                    
                </div>
                
            </form>
            <label id="HaveAccountBtnCont" class="otherOption">Already have An Account?<button style="border:none;background-color:inherit;cursor: pointer;;" id="HaveAccountBtn">Click here</button></label>
        </div>
    <!-- end of public sign up form-->
    <!--Forgot password recovery starts here -->
    <div id="PasswordRecoveryContainerID" class="PasswordRecoveryContainer">

        <form action="indexAction.php" name="passowrdRecoveryPub" method="POST">
            <div class="inputFieldsContainer">
            <label>E-mailID</label>
            <input type="email" class="RPswdtxt" name="RPswdEmailID" required="true">

            <label>Phone number</label>
            <input type="number" class="RPswdtxt" name="RPswdPhno" required="true">
            
            <label>Security code</label>
            <input type="number" class="RPswdtxt" name="RPswdSecurityCode" required="true">

            <label>New Password</label> 
            <input type="password" class="RPswdtxt" name="RPswdNewPswd" required="true">
            </div>
            <input type="submit" name="RPswdSETBtn" id="RPswdSETBtn1" value="SET">
            <input type="reset" name="RPswdCancelBtn" id="RPswdCancelBtn1" value="cancel">
        </form>


    </div>
        
    <!--Forgot password ends here-->
    
    </section>
   

    <section id="How_it_works_cont">
        
        
        <div id="thePublic">
            
            <div id="step_1" style="color:black">
           Online Surveys are filled by the General public users of
                Indian Opinion(O.S.P).
            </div>

        </div>


        <div id="mid">
            Indian Opinion          
        </div>
        <div id="theLine1"></div>
        <div id="theLine2"></div>
        <div id="theLine3" class="basicLine"></div>
        <div id="theLine4" class="basicLine"></div>
        <div id="theLine5" class="basicLine"></div>
        <div id="BussinessReport">
            Survey reports are viewed by companies. 
        </div>
        
            
        <div id="Bussiness">
            Many Bussiness/brands uploads a custom built Survey.
        </div>

        
    </section>
    <section id="About_us">
        <h2 style="text-align: center;"><b style="color: #1d1919;padding: 9px;box-shadow: 0 0 13px rgba(0,0,0);border-radius: 5px;" >About Information</b></h2>
        <div class="BriefInfo">
            <p>
            Indian Opinion is an Online Survey Portal by now you might have figured that much.Thus Like Some Other Online Survey Portal in functionality
            Indian Opinion is also similar but what makes it different than other Survey Portals is its automagical ability to form a survey questionnaire from its 
            easy survey creating algorithm And Survey Kit. 
            </p> 
            <p>
            Unlike the traditional approach of having a formal meeting with the Client and setting up the protocols of the clients required survey.
            Indian Opinion Provide direct interface for the client to create their own Custom built survey.
            </p>    
            <p>
            Indian Opinion is one Stop solution for Online Survey.Major Players in our portals are the public and the Business Industries(i.e.,Clients).
            In laymans tongue Public users plays role of source of Opinion that is worth a lot for a Business,Brand,Firm,Manufacturer etc.

            </p>
            
            <P>
            Indian Opinion bridges the gap between the Public and business by providing real time reports of each survey and Instant access to various surveys to the public.
            Time taken to Upload once own custom survey to the portal and Getting back response is very less.since the process is easy and fast.
            </p>    
        </div>
    </section>
   
    
    <script type="text/javascript">
         //displaying the containers if user failed to sign ip or login since it reloads every time to start point
         var stillSigningUp = <?php echo json_encode($_SESSION['still_signing_Up']); ?>; 
         var stillLoging = <?php echo json_encode($_SESSION['still_loging_in']); ?>;
         var stillRecoveringPSWD = <?php echo json_encode($_SESSION['stillRecoveringPswd']); ?>; 
         if(stillSigningUp == "true")
          {
            //alert("still signing up" + stillSigningUp);
            document.getElementById("publicSignUpContainer").style.display="block";
            document.getElementById("collageContainer1").style.display="none";
          }

          if(stillLoging == "true")
          {
            document.getElementById("loginFRMPublic").style.display="block";
            document.getElementById("collageContainer1").style.display="none";
          }
          if(stillRecoveringPSWD == "true")
          {
            document.getElementById("PasswordRecoveryContainerID").style.display="block";
            document.getElementById("collageContainer1").style.display="none";
          }

          //after confirming that password is updated
          if(stillRecoveringPSWD == "false" && stillLoging =="false" && stillSigningUp == "false")
          {
            document.getElementById("loginFRMPublic").style.display="block";
            document.getElementById("collageContainer1").style.display="none";
          }

        
          
        </script>





</body>
</html>