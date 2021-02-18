<?php
   require 'DBconfig.php';
    $want_primary="";
    //$_SESSION['']
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/EditTheSurvey.css">
    
    <title>Edit Survey</title>
</head>
<body>
    
    <div style="width: 65%;margin: auto;border: 0.5px solid;height:-webkit-fill-available">
    <label style="font-size:34px">Editing Survey</label>
        <div class="actionNavBtns">
            <button onclick="Primary_edit()">Edit primary data</button>
            <button>Edit Survey Questions</button>
            <button>Go back</button>
            <button>Complete Editing</button>

        </div>
        <?php
                //$_SESSION['survey_id_to_edit']=$_GET['survey_id_edit'];
                //$surveyID=$_
                $want_primary=$_GET['survey_id_edit'];
               //echo '<script type="text/javsscript">alert("the passed id is:" + '.$_GET['survey_id_edit'].' + );</script>';
                 if($want_primary == "true")
               {
                        edit_primary_info($con);
               }
                function edit_primary_info($con)
                {
                    $query="SELECT * FROM primary_survey_details_table WHERE Survey_ID='".$_GET['survey_id_edit']."'";
                     $run_query=mysqli_query($con,$query);
                     if(mysqli_num_rows($run_query) > 0)
                     {
                         $data=mysqli_fetch_assoc($run_query);
                    
                        }   
            
            
                   ?>           
            <div id="edit_primary">
                <div>
                    <label>Survey Title</label><input type="text" name="" value="<?php echo $data['Title_Of_Survey']; ?>" id="" />
                </div>
                <div>
                   <label>description</label>
                   <textarea name="" id=""  cols="30" rows="10" ><?php echo $data['description']; ?></textarea>         
                </div>    
                <div>
                    <label>From Date</label><input type="date" name="" value="<?php echo $data['from_Date']; ?>" id="" />
                    <label>To Date</label><input type="date" name="" value="<?php echo $data['To_Date']; ?>" id="" />
                </div>
                    <div style="display: grid;grid-template-columns: 1fr 1fr;grid-column-gap: 12px;">
                        <input type="submit" value="save changes" />
                        
                        <input type="reset" value="reset" />
                    </div>
            </div>



                <?php
                }
                ?>







    </div>
    <script type="text/javascript">
        function Primary_edit()
        {
            alert("working");
            
            location.href="EditTheSurvey.php?want_primary=true";
           
            return true;
        }
        window.onReload=function()
        {
            location.href="EditTheSurvey.php";
        }
    </script>

</body>
</html>

