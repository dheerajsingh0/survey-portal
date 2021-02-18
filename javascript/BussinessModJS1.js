window.onload=function(){



    document.getElementById("busHomepage").onclick=function()
    {
      location.href="index.php";
    }
    //show and hide for sign up and login via their respective windows
    document.getElementById("hideMe").onclick=function(){
      //  alert("working");
        document.getElementById("form2").style.display="block";
        document.getElementById("form1").style.display="none";
    }

   document.getElementById("GotoLoginBtn").onclick=function(){
     //  alert("working");
       document.getElementById("form1").style.display="block";
       document.getElementById("form2").style.display="none";
   }

    //show and hide using nav buttons
        //   id="navSignupbtn"
          //  id="navLoginBtn"    
   document.getElementById("navSignupbtn").onclick=function(){
    
    document.getElementById("form2").style.display="block";
    document.getElementById("form1").style.display="none";
    document.getElementById("form3-forgotPassword").style.display="none";
   }

   document.getElementById("navLoginBtn").onclick=function(){
    document.getElementById("form1").style.display="block";
    document.getElementById("form2").style.display="none";
    document.getElementById("form3-forgotPassword").style.display="none";
   }

document.getElementById("cancelPswdChange").onclick=function(){
  document.getElementById("PswdPhnotxt1").value="";
  document.getElementById("PswdEmailtxt1").value="";
  document.getElementById("pswdSecCodetxt1").value="";
  document.getElementById("PswdNewPswdtxt1").value=""; 
   
  
  document.getElementById("form3-forgotPassword").style.display="none";
   document.getElementById("form1").style.display="block";
 
}

document.getElementById("signUpBtnReset").onclick=function()
{
  
  document.getElementById("ImageOfBPro").src="ProDemo.jpg";
}

document.getElementById("ForgotPSwdBtn").onclick=function(){
    document.getElementById("form1").style.display="none";
    document.getElementById("form3-forgotPassword").style.display="block";
}

document.getElementById("BproImgUpload").onchange=function()
{
  var OutputFileReader=new FileReader;  //create a file reader object
  OutputFileReader.readAsDataURL(document.getElementById("BproImgUpload").files[0]);//use readAsDataURl method to read the image selected by file input type.
  OutputFileReader.onload=function(OutputFileREvent) //event onload generate target event 
  {
      document.getElementById("ImageOfBPro").src=OutputFileREvent.target.result;
  };


};



function clearTXTvalues()
{
  
   document.getElementsByName("PswdPhnotxt").value="";
   document.getElementsByName("PswdEmailtxt").values="";
   document.getElementsByName("pswdSecCodetxt").values="";
   document.getElementsByName("PswdNewPswdtxt").values="";

}

  function loginValidate()
  {
    var inputBoxEmail=document.loginForm.uniqueIDtxt.value;
    var inputBoxPswd=document.loginForm.passwordtxt.value;

    if(len(inputBoxPswd) < 8)
    {
      alert("minium length is 8 for password");
      return false;
    } 
  
  
  }

  function validate()
  {
    var a=document.loginFORM.uniqueIDtxt.value;
    if(NaN(a))
    {
      alert("Not a number..");
      return false;

    }
  }

}