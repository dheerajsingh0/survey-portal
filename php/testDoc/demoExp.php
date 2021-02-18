<?php
require 'DBconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" onsubmit="return mess()">
  <!--  <input type="text" name="demoEntry" />-->
    <textarea name="demoEntry" id="" cols="30" rows="10"></textarea>
    <input type="submit" name="submit_btn" />

    </form>
   
 <?php 
    if(isset($_POST['submit_btn']))
    {
        $demoEntry=$_POST['demoEntry'];
        $query="insert into demotbl values('$demoEntry')";
        $query_run_result=mysqli_query($con,$query);
        if($query_run_result)
        {
       // echo '<script type="text/javascript">alert("Insert Success");</script>';
        echo $query_run_result;
        header('location:demoExp.php');
        die ();
        }
        else
        {
            echo '<script type="text/javascript">window.alert("Error in insertion");</script>';
            header('location:demoExp.php');
            die();
        }
    }
    
       
    if(isset($_POST['Sign_Up']))
    {    
      // $cmpnyNametxt=$_POST['cmpnyNametxt'];
       $emailtxt=$_POST['emailtxt'];
       $Phonetxt=$_POST['Phonetxt'];
       $aboutTxt=$_POST['aboutTxt'];
       $pswd=$_POST['pswd'];
       $cpswd=$_POST['cpswd'];
       $secP="nullnot";
       if($pswd == $cpswd)
       {
        $query2="insert into bitbl values('$emailtxt','$Phonetxt','$aboutTxt','$cpswd','$secP')";
        mysqli_query($con,$query2);
        
        echo '<script type="text/javascript">alert("insert success");</script>';
        die ();
       }
       else{
           echo "password mismatch";
        }
       
      
    } 

    
    
    
    
    ?>
</body>
<script type="text/javascript">
function mess()
{
    alert("insertion success yeah....");
    return true;
}
</script>
</html>