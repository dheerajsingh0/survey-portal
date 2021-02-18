/* public main page javscript */
  

    function hideProfileSubOpt()
    {
        document.getElementById("ProfileView").style.display="none";
        document.getElementById("ProfileEdit").style.display="none";
        document.getElementById("ProfileSecuritySettings").style.display="none";
    }


    //view profile
    document.getElementById("viewProBTN").onclick=function()
    {
     
        hideProfileSubOpt();
        document.getElementById("ProfileView").style.display="block";
    }
    //edit profile
    document.getElementById("editProBTN").onclick=function()
    {
        hideProfileSubOpt();
        document.getElementById("ProfileEdit").style.display="block";
    }
    //security settings porifle
    document.getElementById("securityProBTN").onclick=function()
    {
        hideProfileSubOpt();
        document.getElementById("ProfileSecuritySettings").style.display="block";
    }

    
    
    //Supermain inner content
   /* function hideInnerContentAll()
    {
        document.getElementById("profileContainer").style.display="none";
        document.getElementById("dwnMnuID").style.display="none";
        document.getElementById("His_Report").style.display="none";
        document.getElementById("TakeSurveyContainer").style.display="none";
        //alert("hello");
    }
*/
   
    document.getElementById("SurveyKitBtn").onclick=function() {

       // hideInnerContentAll();
        window.location.href="publicHomepageHTML1P.php?FRAME=Take_Survey_Now";
      // document.getElementById("TakeSurveyContainer").style.display="block";

    }


 
  function DeleteMyPublicAcc(get_id)
  {
    if(confirm("Are your Sure you want to delete Your account"))
    {
        alert(get_id);
        window.location.href="publicHomepageAction1P.php?DELid=" + get_id;

    }
  }
/*
  var clickProChk="false";
  
  document.getElementById("proSideBTN").onclick=function()
  {
      window.location.href="publicHomepageHTML1P.php?FRAME=Profile";
   // hideInnerContentAll();
        document.getElementById("profileContainer").style.display="block";
    hideProfileSubOpt();
    document.getElementById("ProfileView").style.display="block";   
    if(clickProChk == "false") {
      document.getElementById("dwnMnuID").style.display="grid";
        clickProChk="true";
        }
    else if(clickProChk == "true") {
        document.getElementById("dwnMnuID").style.display="none";
        clickProChk="false";
    }

  }
*/
    document.getElementById("His&R").onclick=function() {
         //hideInnerContentAll();
       // document.getElementById("His_Report").style.display="block";
        window.location.href="publicHomepageHTML1P.php?FRAME=History_Report";
    }


    function showKnowMore(get_id) 
    {
        window.location.href="publicHomepageHTML1P.php?FRAME=Take_Survey_Now&SurveyID=" + get_id;
    }

    function onCloseShowNoM()
    {
        window.location.href="publicHomepageHTML1P.php?FRAME=Take_Survey_Now";
    }

    function TakeSurveyNow(get_id1,get_id2)
    {
        window.location.href="TakeSurvey.php?Survey_ID=" + get_id1 + "&Company_ID=" + get_id2;
    }

    function clearMyHistory(get_id)
    {
        window.location.href="publicHomepageHTML1P.php?FRAME=History_Report&CLR=" + get_id;
    }



     //change the image
  document.getElementById("public_img_proID").onchange=function()
  {
      alert("working");
  var OutputFileReader=new FileReader;  //create a file reader object
  OutputFileReader.readAsDataURL(document.getElementById("public_img_proID").files[0]);//use readAsDataURl method to read the image selected by file input type.
  OutputFileReader.onload=function(OutputFileREvent) //event onload generate target event 
      {
          alert(OutputFileREvent.target.result);
          document.getElementById("profileImg").src=OutputFileREvent.target.result;
      };
  };
