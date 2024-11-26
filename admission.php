<?php 

 
    $conn=mysqli_connect("localhost","root","","schoolproject");

    if($conn ->connect_error){
        die("connection not established " . $conn->connect_error);
    }

    $query="SELECT * FROM admission";

    $result=mysqli_query($conn,$query);

    $data=mysqli_num_rows($result);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
    <style>
        table,th,tr,td{
            border: 1px  solid black
        }
    </style>
</head>
<body>
   <?php

        include 'admin_side_bar.php';
   ?>

    <div  class="tableheadingone" >
        <div class="admisionheading">
            <h1> Applied for The Admission</h1>
        </div>
       
    
       <table style="margin-top:40px;" border="1px">
        <tr  class="admsiontable">
            <th class="tableheading" style="padding: 20px; font-size: 15px;">Name</th>
            <th  class="tableheading" style="padding: 20px; font-size: 15px;">Email</th>
            <th class="tableheading" style="padding: 20px; font-size: 15px;">Phone</th>
            <th class="tableheading"style="padding: 20px; font-size: 15px;">Message</th>
        </tr>
        <?php 
        if ($data) {
        while ($row=mysqli_fetch_array($result)){
            ?>

       
        <tr>
            <td style="padding: 20px;" ><?php echo $row['username'];?></td>
            <td style="padding: 20px;"><?php echo $row['email'];?></td>
            <td style="padding: 20px;"><?php echo $row['phon'];?></td>
            <td style="padding: 20px;" ><?php echo $row['masage'];?></td>
            
        </tr>
       <?php
        }
    }else{
        ?>
        <tr>
            <td style="padding: 20px;" >demo</td>
        </tr>
        <?php
    }
       ?>
    </table>

    </div>
 
  
    
   
</body>
</html>