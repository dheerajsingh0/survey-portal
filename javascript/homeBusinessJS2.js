//window.onload=function(){
   var mnuProSettingClicked="false";
   var checkSecurityMnuBtn="false";
   document.getElementById("SK_op1").style.display="none";
   document.getElementById("SK_op2").style.display="none";
  // document.getElementById("SK_op1_ANDSK_op2ID").style.display="none";
   
   var SK_op1=document.getElementById("SK_op1");
   var SK_op2=document.getElementById("SK_op2");
   //var SK_op1_ANDSK_op2ID=document.getElementById("SK_op1_ANDSK_op2ID");
   var clickCheck="false";

   //alert("message from external javascript");
  

   document.getElementById("SurveyKitBtn").onclick=function()
   {    
      if(clickCheck == "false")
      {
       // SK_op1_ANDSK_op2ID.style.display="block";
       SK_op1.style.display="block";
       SK_op2.style.display="block";
        clickCheck="true";
        
      }
     else{
        //SK_op1_ANDSK_op2ID.style.display="none";
       SK_op1.style.display="none";
        SK_op2.style.display="none";
         clickCheck="false";
       }
   }

      //profile nav button javascript code hide and show(edit,delete,view profile)
      document.getElementById("EDIT_nav_btn1").onclick=function()
      {
         document.getElementById("edit_pro_frame").style.visibility="visible";
         document.getElementById("profileviewContainer").style.visibility="hidden";
      }

      document.getElementById("View_Profile1").onclick=function()
      {
         document.getElementById("edit_pro_frame").style.visibility="hidden";
         document.getElementById("profileviewContainer").style.visibility="visible";
      }

      document.getElementById("delete_profile1").onclick=function()
      {
        document.getElementById("modalContainerDelAC").style.display="block";
      }
      //delete pop up no button onclick
      document.getElementById("ans_No_btn1").onclick=function()
      {
        document.getElementById("modalContainerDelAC").style.display="none";
         alert("working you clicked no button");
         
      }

      //new surevy onclick
      document.getElementById("SK_op1").onclick=function()
      {
         hideAll();
      document.getElementById("SURVEYcontainer").style.display="block";            
      /*document.getElementById("profileviewContainer").style.display="none";
      document.getElementById("edit_pro_frame").style.display="none";
      document.getElementById("btnNavBtnsID").style.visibility="hidden";
         */
      }

      document.getElementById("Side_profileBtn").onclick=function()
      {
      /*document.getElementById("SURVEYcontainer").style.display="none";*/
      hideAll();            
      document.getElementById("profileviewContainer").style.display="block";
      document.getElementById("edit_pro_frame").style.display="block";
      
      document.getElementById("btnNavBtnsID").style.visibility="visible";

      }
      document.getElementById("proButton").onclick=function()
      {
            if(mnuProSettingClicked == "false")
            {
            document.getElementById("QuickMnu").style.visibility="visible";
            document.getElementById("QuickMnu").style.height="270%";   
               mnuProSettingClicked = "true";
            }  
         else{
               document.getElementById("QuickMnu").style.height="0%";  
             // document.getElementById("QuickMnu").style.visibility="visible"; 
                  mnuProSettingClicked = "false";
            }
            document.getElementById("securityContainer").style.display="none";
            checkSecurityMnuBtn="false";
      }


//Image change

      document.getElementById("BproImgUpload").onchange=function()
      {
         var OutputFileReader=new FileReader;  //create a file reader object
         OutputFileReader.readAsDataURL(document.getElementById("BproImgUpload").files[0]);//use readAsDataURl method to read the image selected by file input type.
         OutputFileReader.onload=function(OutputFileREvent) //event onload generate target event 
         {
            document.getElementById("ImageOfBPro").src=OutputFileREvent.target.result;
         };
      };

//image change javascript ends here very important code.

document.getElementById("logoutBTNS").onclick=function()
   {
   alert("working you clicked no button");
  document.getElementById("modalContainerLogout").style.display="block";
   }
//delete pop up no button onclick
document.getElementById("ans_No_btn2").onclick=function()
   {
  document.getElementById("modalContainerLogout").style.display="none";
   alert("working you clicked no button");
   
   }

   document.getElementById("securityContainer").style.display="none";
   
   document.getElementById("QSecurityBtn").onclick=function()
   {
      if(checkSecurityMnuBtn == "false")
      {
      document.getElementById("securityContainer").style.display="block";
     
        checkSecurityMnuBtn="true"; 
        
      }
      else
      {
         document.getElementById("securityContainer").style.display="none";
         checkSecurityMnuBtn="false";
      }
   }

   /* main code do not modify (p.s:modification clearence level should be 98) */
   /* The creators button  javascript code */
   
   var divID="multiple_";
   var i=2;
   var lastVisibleNo=""; 
   document.getElementById("addOptionMore").onclick=function()
   { 
    
            if(i == 30)
             {
             alert("maximum multiple choice reached.");
             return;
             }
             var nextDIVid=divID + i;
            lastVisibleNo=i;
            nextTXT="Choice_text_" + i; 
              document.getElementById(nextDIVid).style.display="block";
             
              i++;
          }
   

   document.getElementById("RemoveOption").onclick=function()
   {
      
      if(i != 2)
      {
      var divHide = divID + lastVisibleNo;
      var textClear = "Choice_text_" + lastVisibleNo;
      
      document.getElementById(textClear).value="";
   
      document.getElementById(divHide).style.display="none";
         i=i-1;
         lastVisibleNo=lastVisibleNo - 1;

      } 
   }       
  
document.getElementById("AddOtherBtn").onclick=function()
{
   document.getElementById("otherTXT").value="Enabled";
   document.getElementById("otherContainer").style.display="block";
   document.getElementById("AddOtherBtn").style.display="none";
   document.getElementById("removeOther").style.display="inline";
}

document.getElementById("removeOther").onclick=function()
{
   document.getElementById("otherTXT").value="";
   document.getElementById("otherContainer").style.display="none";
   document.getElementById("AddOtherBtn").style.display="inline";
   document.getElementById("removeOther").style.display="none";
}



 /* code for adding more checkboxes*/
 var divID1="CheckBox_";
 var i1=2;
 var lastVisibleNo1="";

 document.getElementById("addCheckBoxMore").onclick=function()
 {
    if(i1 == 30)
    {
    alert("maximum checkboxes reached reached.");
    return;
    }
    var nextDIVid1=divID1 + i1;
   lastVisibleNo1=i1;
   console.log(nextDIVid1);
     document.getElementById(nextDIVid1).style.display="block";
     i1++;
       
      alert("working");
 }
 document.getElementById("RemoveCheckBox").onclick=function()
 {
    if(i1 != 2)
    {
    var divHide1 = divID1 + lastVisibleNo1;
    var textClear1 = "CheckBoxTXT_" + lastVisibleNo1;
    
    document.getElementById(textClear1).value="";
    document.getElementById(divHide1).style.display="none";
       i1 = i1 - 1;
       lastVisibleNo1=lastVisibleNo1 - 1;

    } 

 }
    /* end of removing checkboxes   */

/* drop down box code starts here */
txtCounter=1;
document.getElementById("insertBtn").onclick=function()
{  
     // alert(txtCounter);
      var txtValueToInsert=document.getElementById("drptxt").value;
      if(txtValueToInsert == "")
      {
         alert("pls enter some text value..");
         document.getElementById("drptxt").focus();
         return;
      }
         //duplocate value validation
      var i=1;   
      while(i <= 30)
      {

         if(document.getElementById("drpOptTxt_" + i).value == txtValueToInsert)
         {
            alert("duplicate entry not allowed,enter some other values");
            document.getElementById("drptxt").value="";
            document.getElementById("drptxt").focus();
            return;
         }
         i++;
      }

      if(txtCounter == 31)
      {
         alert("maximum capacity reached for drop downbox.");
         return;
      }
      document.getElementById("DropDownBox").options[txtCounter].text=txtValueToInsert;
      document.getElementById("DropDownBox").options[txtCounter].style.display="block";
     // alert("drpOptTxt_" + txtCounter);
      document.getElementById("drpOptTxt_"+ txtCounter).value=txtValueToInsert;
      document.getElementById("drptxt").value="";
      document.getElementById("drptxt").focus();
      txtCounter++;


   }

   document.getElementById("resetBtn").onclick=function()
   {
      iR=1;
      alert("working");
      txtCounter=1;
      while(i <= 30)
      {
          document.getElementById("DropDownBox").options[iR].text="";
          document.getElementById("DropDownBox").options[iR].style.display="none";  
            iR++;
      }

   }

   function chooseOneTypeAnswer()
   {
      document.getElementById("displayDefaultHere").style.display="none";
      document.getElementById("multipleChoiceContainer").style.display="none";
      document.getElementById("checkboxContainer").style.display="none";
      document.getElementById("comment_or_paragraph_container").style.display="none";
      document.getElementById("Date_container").style.display="none";
      document.getElementById("dropDownContainer").style.display="none";
      return;
   }




   document.getElementById("selectCheckBox").onclick=function()
   {
      chooseOneTypeAnswer();
      document.getElementById("checkboxContainer").style.display="block";
   }

   
   document.getElementById("selectDropDown").onclick=function()
   {
      chooseOneTypeAnswer();
      document.getElementById("dropDownContainer").style.display="block";
   }

   
   document.getElementById("selectMultipleChoice").onclick=function()
   {
      chooseOneTypeAnswer();
      document.getElementById("multipleChoiceContainer").style.display="block";
   }

   
   document.getElementById("selectParagraphBox").onclick=function()
   {
      chooseOneTypeAnswer();
      document.getElementById("comment_or_paragraph_container").style.display="block";
   }

   
   document.getElementById("SelectDate").onclick=function()
   {
      chooseOneTypeAnswer();
      document.getElementById("Date_container").style.display="block";
   }

   var primaryOk="false";
   
   
   /*  primary data upload and next   */
   document.getElementById("PrimarySry_Btn1").onclick=function()
   {
      var title=document.primaryForm.titleTxt.value;
      var descrption=document.primaryForm.Desctxt.value;
      var Fdate=document.primaryForm.FromDate.value;
      var ToDate=document.primaryForm.ToDate.value;
      //if((title != "") && (descrption != "") && (Fdate !="" && ToDate) && (ToDate != "" ))
      if(primaryOk =="true")
      {
      document.getElementById("PriData").style.display="none";
      document.getElementById("mainFrameSuvey").style.display="block";
      document.getElementById("viewBox").style.display="none";
      }
    
   }


   function validate()
   {
      var title=document.primaryForm.titleTxt.value;
      var descrption=document.primaryForm.Desctxt.value;
      var Fdate=document.primaryForm.FromDate.value;
      var ToDate=document.primaryForm.ToDate.value;
      if((title != "") && (descrption != "") && (Fdate !="" && ToDate) && (ToDate != "" ))
      {
         primaryOk="true";
         return true;
         
      }
      else
      {
         primaryOk="false";
         return false;
      } 
   }
   
   
  
  




// survey validation starts here THAT is  for Builder
   var ItsCheckBox="false";
   var ItsMultipleChoice="false";
   var ItsDropDown="false";
   var ItsDate="false";
   var ItsParagraph="false";

   document.getElementById("ChkBxSubmitBTN").onclick=function()
   {
      ItsCheckBox = "true";
   }

   document.getElementById("multipleChoiceSubmitBTN").onclick=function()
   {
      ItsMultipleChoice = "true";
   }

   document.getElementById("DropdwnSubmitBTN").onclick=function()
   {
      ItsDropDown="true";      
   }
   function SuperValidate()
   {
        //check empty validation for checkBoxes.
        if(ItsCheckBox == "true")
        {
           //alert("Its check box");
           var temp_str_txt="CheckBoxTXT_";
           var temp_str_div="CheckBox_";
           var i1=1;
          // alert(temp_str_div + temp_str_txt);
           console.log(temp_str_div,temp_str_txt);
           while(i1 <= 30)
           {       
                  temp_str_div=temp_str_div + i1;
                  temp_str_txt=temp_str_txt + i1;
                  //alert(temp_str_div + temp_str_txt);
                  //alert(document.getElementById(temp_str_div).style.display);
                  //alert(document.getElementById(temp_str_txt).value);
                  if((document.getElementById(temp_str_div).style.display == "block") && (document.getElementById(temp_str_txt).value == ""))
                  {
                     alert("Empty fields not allowed,Pls Enter All fields");
                     document.getElementById(temp_str_txt).focus();
                     ItsCheckBox="false";   
                     return false;
                  }
                      temp_str_txt="CheckBoxTXT_";
                      temp_str_div="CheckBox_";
                  i1++;
            }
            return true;
        }
        //check empty validation for dropDown
        
        if(ItsMultipleChoice == "true")
        {
           //alert("Its check box");
           var temp_str_txt="Choice_text_";
           var temp_str_div="multiple_";
           var i2=1;
           alert(temp_str_div + temp_str_txt);
           console.log(temp_str_div,temp_str_txt);
           while(i2 <= 30)
           {       
                  temp_str_div=temp_str_div + i2;
                  temp_str_txt=temp_str_txt + i2;
                  //alert(temp_str_div + temp_str_txt);
                  //alert(document.getElementById(temp_str_div).style.display);
                  //alert(document.getElementById(temp_str_txt).value);
                  if((document.getElementById(temp_str_div).style.display == "block") && (document.getElementById(temp_str_txt).value == ""))
                  {
                     alert("Empty fields not allowed,Pls Enter All fields");
                     document.getElementById(temp_str_txt).focus();
                     ItsMultipleChoice="false";   
                     return false;
                  }
                   temp_str_txt="Choice_text_";
                   temp_str_div="multiple_";
                  i2++;
            }
            return true;
        }
           //check empty validation for es.
        
           
           if(ItsDropDown == "true")
           {
               if(document.getElementById("drpOptTxt_1").value == "")
               {
                  alert("Input atleast one value into the drop down box");
                     ItsDropDown="false";
                     document.getElementById("drptxt").focus();
                  return false;
               }
           }

   }


   document.getElementById("SK_op2").onclick=function()
   {
      hideAll();
      document.getElementById("ManageSurveyContainer").style.display="block";
      
   }

   function hideAll()
   {
      document.getElementById("ManageSurveyContainer").style.display="none";
      document.getElementById("SURVEYcontainer").style.display="none";            
      document.getElementById("profileviewContainer").style.display="none";
      document.getElementById("edit_pro_frame").style.display="none";
      document.getElementById("btnNavBtnsID").style.visibility="hidden";
      document.getElementById("survey_report").style.display="none";
   }

   function deleteSurvey(get_id)
   {
      if(window.confirm("Do yo want to delete this survey"))
      {
         window.location.href="deleteThisSurveyAction.php?survey_id_del=" + get_id ;
         return true;
      }
   }

  function editSurvey(get_id_sur)
  {
     window.location.href="EditTheSurvey.php?survey_id_edit=" + get_id_sur;
     return true;

  }

document.getElementById("reportOnSurveyBtn").onclick=function()
{
   hideAll();
   document.getElementById("survey_report").style.display="block";
}

   function GenXReport(sid,cid)
   {
      window.location.href="Generated_Report.php?Cmpnyid=" + cid + "&surveyid=" + sid;
   }










//}
window.onclick=function(event)
{
   var modalFrame=document.getElementById("modalContainerDelAC");
   if(event.target == modalFrame)
   {
      modalFrame.style.display="none";
   }
   var modalFrame2=document.getElementById("modalContainerLogout");
   if(event.target == modalFrame2)
   {
      modalFrame2.style.display="none";
   }

}