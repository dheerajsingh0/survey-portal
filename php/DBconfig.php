<?php
    
    $con=mysqli_connect("localhost","root","") or die("unable to connect to database error in connecting");    
    $check=mysqli_select_db($con,"test");
    //echo $check;
   /* if($check == 1 )
    {
      echo '<script type="text/javascript">alert(" Connection Established");</script>';
    }*/
?>