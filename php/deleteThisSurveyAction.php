<?php

    require 'DBconfig.php';
    
    $query="DELETE FROM primary_survey_details_table WHERE Survey_ID='".$_GET['survey_id_del']."'";
    $run_query=mysqli_query($con,$query);
    
    header('location:homeBusinessHTML2.php');
    die();
    
    ?>