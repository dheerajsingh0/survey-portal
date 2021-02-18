<?php
    if(isset($_POST['loginBtn']))
            {    
                $EmailID=$_POST['uniqueIDtxt'];
                $Password=$_POST['passwordtxt'];
               // echo '<script type="text/javascript">alert("user Clicked the Login Button");</script>';
                    $query="select * from bussinesstable where email_ID='$EmailID' AND password='$Password'"; 
                    $result=mysqli_query($con,$query);
                    $result=mysqli_num_rows($result);
                     
                    if($result > 0)
                    {
                        echo '<script type="text/javascript">alert("Login Success");
                        /*location.href="BussinessMODHTML1.php";*/</script>';
                    }
                    else{
                        echo '<script type="text/javascript">alert("Login Failed,Incorrect EmailId or Password");
                        /*location.href="BussinessMODHTML1.php*/</script>';
                    }
                    header('location:homeBussinessHTML2.html');
                }
                ?>