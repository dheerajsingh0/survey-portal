window.onload=function()
{
  
    document.getElementById("busSurvey").onclick=function()
    {
        location.href="BussinessModHTML1.php";
    }

    function hideSome()
    {
        document.getElementById("theFrontDP").style.display="none";
        document.getElementById("How_it_works_cont").style.display="none";
        document.getElementById("About_us").style.display="none";
        
    }

    document.getElementById("homeBTN").onclick=function()
    {
        document.getElementById("theFrontDP").style.display="block";
        document.getElementById("How_it_works_cont").style.display="none";
    }

    document.getElementById("HwItBTN").onclick=function()
    {
        document.getElementById("theFrontDP").style.display="none";
        document.getElementById("How_it_works_cont").style.display="block";
    }

    //onclick of sign button on homepage
    document.getElementById("pubSignNavBtn").onclick=function()
    {
        document.getElementById("loginFRMPublic").style.display="block";
        document.getElementById("collageContainer1").style.display="none";

    }
    //onlclick take survey now
    document.getElementById("THEbtn").onclick=function()
    {
        if(document.getElementById("publicSignUpContainer").style.display != "block")
        {
        document.getElementById("loginFRMPublic").style.display="block";
        document.getElementById("collageContainer1").style.display="none";
        }    
    }
    //onclick dont have an Accont.
    document.getElementById("NoAccountBtn").onclick=function()
    {
        document.getElementById("loginFRMPublic").style.display="none";
        document.getElementById("publicSignUpContainer").style.display="block";

    }
    //onclick already have an account.
    document.getElementById("HaveAccountBtn").onclick=function()
    {
        document.getElementById("loginFRMPublic").style.display="block";
        document.getElementById("publicSignUpContainer").style.display="none";

    }
    //reset image to default when reset is clicked.
    document.getElementById("ResetSignUp").onclick=function()
    {
      
         document.getElementById("proImg").src="ProDemo.jpg";  
    }

    //change the image
    document.getElementById("PubProImgBtn").onchange=function()
    {
    var OutputFileReader=new FileReader;  //create a file reader object
    OutputFileReader.readAsDataURL(document.getElementById("PubProImgBtn").files[0]);//use readAsDataURl method to read the image selected by file input type.
    OutputFileReader.onload=function(OutputFileREvent) //event onload generate target event 
        {
            //alert(OutputFileREvent.target.result);
            document.getElementById("proImg").src=OutputFileREvent.target.result;
        };
    };
    //onclick forgot password
    document.getElementById("pswdRecoveryBtn").onclick=function()
    {
        document.getElementById("loginFRMPublic").style.display="none";
        document.getElementById("PasswordRecoveryContainerID").style.display="block";
    }
    //onclick cancel in forgot password.
    document.getElementById("RPswdCancelBtn1").onclick=function()
    {
        document.getElementById("loginFRMPublic").style.display="block";
        document.getElementById("PasswordRecoveryContainerID").style.display="none";
    }

    //about us
    document.getElementById("SpecBtn").onclick=function()
    {
        hideSome();
        document.getElementById("About_us").style.display="block";
    }

    


}
