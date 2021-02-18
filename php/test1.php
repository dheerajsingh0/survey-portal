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
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    
    <input type="file" name="ImageUpload" id="BproImgUpload" accept=".jpg,.png,.jpeg" />
    
    <input type="submit" name="upload" value="upload image" />
    </form>
   <?php
   if(isset($_POST['upload']))
   {
    /*    $ImageName=$_FILES['imageToUpload']['name'];
        
        
        $pro_img_name=$_FILES['ImageUpload']['name'];
        $pro_img_size=$_FILES['ImageUpload']['size'];
        $pro_img_temp_name=$_FILES['ImageUpload']['tmp_name'];

        $directory='ProfileImgUploads/';
        $target_File=$directory.$pro_img_name;
        */
        $ImageName=$_FILES['ImageUpload']['name'];
        $imagesize=$_FILES['ImageUpload']['size'];
        echo $ImageName;
        
       // echo $imagesize;
   }
        ?>  


</body>
</html>