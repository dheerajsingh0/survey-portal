window.onload=function()
{
   var welcomeLbl=document.getElementById("container");
   var msg1txtP=document.getElementById("msg1"); 
   var msg2txtP=document.getElementById("msg3");
   var msg3txtP=document.getElementById("msg4");
   var msg4txtP=document.getElementById("msg5");
   var msg5txtP=document.getElementById("msg6");
 

   var i1=0,i2=0,i3=0,i4=0;i5=0,i6=0;i7=0;
   var start1=setInterval(msg1,1000);
   var start2=setInterval(msg2,1000);
   var start3=setInterval(msg3,1000);
   var start4=setInterval(msg4,1000);
   var start5=setInterval(msg5,1000);
   var start6=setInterval(msg6,1000);
    function msg1()
    {
    i1++;
    console.log(i1 + "first");
        if(i1 > 4)
        {
         //alert("hello");
         welcomeLbl.style.opacity="0";
          //msg1txtP.style.opacity="0.9";  
         clearInterval(start1);
        }
        else{
            welcomeLbl.style.opacity="0.9";
        }
    }
    
    function msg2()
    {
        
        if(welcomeLbl.style.opacity == "0" && i1 > 4)
        {
           i2++;
            console.log(i2 +"second");
            if(i2 > 15)
            {
                msg1txtP.style.opacity="0";
                clearInterval(start2);
            }
            else{
                msg1txtP.style.opacity="0.9";
            }
        }
        
        

    }
    function msg3()
    {
        if(msg1txtP.style.opacity == "0" && i2 > 15)
        {
           i3++;
            console.log(i3 + "third");
            if(i3 > 7)
            {
                msg2txtP.style.opacity="0";
                clearInterval(start3);
            }
            else{
                msg2txtP.style.opacity="0.9";
            }
        }
        



    }

    function msg4()
    {
        if(msg2txtP.style.opacity == "0" && i3 > 7)
        {
           i4++;
            console.log(i4 + "fourth");
            if(i4 > 7)
            {
                msg3txtP.style.opacity="0";
                clearInterval(start4);
            }
            else{
                msg3txtP.style.opacity="0.9";
            }
        }
        



    }

    function msg5()
    {
        if(msg3txtP.style.opacity == "0" && i4 > 7)
        {
           i5++;
            console.log(i5 + "fifth");
            if(i5 > 7)
            {
                msg4txtP.style.opacity="0";
                clearInterval(start5);
            }
            else{
                msg4txtP.style.opacity="0.9";
            }
        }
        
    }

    function msg6()
    {
        if(msg4txtP.style.opacity == "0" && i5 > 7)
        {
           i6++;
            console.log(i6 + "sixth");
            if(i6 > 7)
            {
                msg5txtP.style.opacity="0";
                clearInterval(start6);
            }
            else{
                msg5txtP.style.opacity="0.9";
            }
        }
    }

   


}
