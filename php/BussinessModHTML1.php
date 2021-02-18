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
    <link rel="stylesheet" href="../css/BussinessModCSS1.css">
    <link rel="stylesheet" href="">
    <script src="../javascript/BussinessModJS1.js"></script>
    <title>Online Survey Portal Bussiness page</title>
</head>
<body>
    <header>
        <div class="navBar">
           <div style="font-size: 17px;position: relative;left: -26%;"><label>Indian Opinion</label><br><label>(Online Survey Portal)</label></div>
           <button class="navBtn" id="busHomepage">Home</button> 
           <button class="navBtn" id="navSignupbtn">Sign Up</button>
           <button class="navBtn" id="navLoginBtn">Login</button>
        </div>    
              
            
    </header>
   
  <!--login form starts here-->
    <div id="form1">
        <form name="loginFORM" id="loginFrame" action="BussinessModAction1.php" onsubmit="return validate()" method="POST">
            <h4 style="border-left:solid;padding-left:1em;"><label>LOGIN</label></h4>
            <label>Email ID</label>
            <input type="email" name="uniqueIDtxt" required="true" maxlength="50"/>   
            <label>Password</label>
            <input type="password" name="passwordtxt" />    
            <input type="submit" name="loginBtn" id="loginBtn" value="Login" required="true" minlength="8" maxlength="30" /> 
        </form>
        <br>
        <div style="text-align:center">
       <label>Don't have an Account?</label> <button id="hideMe">Click here</button><br>  
       <label>Forgot Your password?</label> <button id="ForgotPSwdBtn">Click here</button>
         </div>   
    </div>
  <!--login form ends here-->      
  <!--*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*--->          
   <!--Registrantion Starts here-->     
<div id="form2">
        <form name="regFORM" id="RegFrame" action="BussinessModAction1.php" method="POST" enctype="multipart/form-data">
                <h4 style="border-left:solid;padding-left:1em;"><label>SIGN UP</label></h4>
                
                <label>Name of the Company or firm or brand</label>
                <input type="text" class="signUptxt" name="cmpnyNametxt" required="true" minlength="5" maxlength="50"/>
                
                <div class="contactContainer">
                
                <div style="display: inherit; grid-template-columns: 95%;"><label>EmailID</label>
                <input type="text" class="signUptxt" name="emailtxt" required="true" minlength="10" maxlength="50"/>
                </div>
                
                <div style="display: inherit;grid-template-columns:100%;">
                <label>Phone Number</label>
                <input type="number" class="signUptxt" name="Phonetxt" required="true" minlength="10" maxlength="10" />
                </div>
                
                </div>        
                
                <label>Description or About</label>
                <textarea name="aboutTxt" rows="4"></textarea>
                <label>Security Code(Note:this will be used to recover your password):</label>
                <input type="number" name="Securitytxt" class="signUptxt" required="true" minlength="5" maxlength="5" />

                <div class="contactContainer">
                 
                <div style="display: inherit; grid-template-columns: 95%;"> 
                 <label>Password</label>
                 <input type="password" name="pswd" required="true" minlength="8" maxlength="30"/>            
                 </div>

                 <div style="display: inherit; grid-template-columns:1fr;">
                 <label >Confirm Password</label> 
                 <input type="password" name="cpswd" required="true" minlength="8" maxlength="30"/>
                </div>
                </div>

                 <div style="display:grid;grid-template-columns: 1fr 1fr;grid-column-gap:1%;">
                 <input type="submit" name="Sign_Up" id="signUpBtn" value="sign up" class="signUPbtns" />
                 <input type="reset" value="Reset" id="signUpBtnReset" value="reset" class="signUPbtns" />  
                 </div>
                 <br>
                  <!-- profile Image -->
                  <div class="ImageContainer">
                  <img src="ProDemo.jpg" id="ImageOfBPro" alt="profile image">
                  <input type="file" name="ImageUpload" id="BproImgUpload" accept=".jpg,.png,.jpeg" required="true" />
                  </div>      
        </form> 
        <div style="text-align: center;"><label >Already Signed Up<button id="GotoLoginBtn" style="border:none;cursor: pointer;">click here</button></label></div>
        
    </div>
        <!--registration form ends here-->
        <!--**********************************************************************--> 
        
        <!-- forgot password starts here --->
    <div id="form3-forgotPassword">
            <form name="PswdRecoveryFORM" id="PswdRecFrame" action="BussinessModAction1.php" method="POST">
                    <h4 style="border-left:solid;padding-left:1em;"><label>Password Recovery</label></h4>
                    <label>Phone Number:</label>
                    <input type="number" name="PswdPhnotxt" id="PswdPhnotxt1" required="true" minlength="10" maxlength="10"/>
                    <label>EmailID:</label>
                    <input type="email" name="PswdEmailtxt" id="PswdEmailtxt1" required="true" minlength="10" maxlength="50" />
                    <label>Security Code(<i>the code you that you set when you Signed up</i>):</label>
                    <input type="text" name="pswdSecCodetxt" id="pswdSecCodetxt1" required="true"  minlength="5" maxlength="5"/>
                    <label>New Password:</label>
                    <input type="password" name="PswdNewPswdtxt" id="PswdNewPswdtxt1" required="true" minlength="8" maxlength="30"/>
                    <input type="submit" name="pswdRecSubmit_btn" id="setBtn" value="SET"/>
                    <input type="reset" id="cancelPswdChange" value="cancel"/>    
             </form> 
               <!-- <button id="cancelPswdChange">cancel</button> -->   
    </div>
        <!-- forgot password ends here -->



            
</body>


</html>