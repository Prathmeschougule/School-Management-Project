<?php 
$conn=mysqli_connect("localhost","root","","schoolproject");

if($conn ->connect_error){
    die("connection not established " . $conn->connect_error);
}

if (isset($_POST['addstudent'])) {
    $userName=$_POST['name'];
    $phonNo=$_POST['phone'];
    $Email=$_POST['email'];
    $pass=$_POST['pass'];
    $userType="student";
   
    $query="INSERT INTO user(userName,phonNo,Email,pass,userType) VALUES ('$userName','$phonNo',' $Email',' $pass','$userType')";

    $data=mysqli_query($conn,$query);
   
      

    if($data){
        
      ?>
      <script>alert("Student Data Stored")
          window.open("http://localhost/php%20code/School/add_Student.php","_self")
      </script>
      <?php
       
    }else{
        echo"Apply Failed";
    }   
}
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
   
</head>
<body>
   <?php

        include 'admin_side_bar.php';

   ?>
   
<div  class="tableheadingone addstudentform" >
  
    <div class=" addStudenetHeading ">
            <h1>Add Student</h1>
     </div>
     
     <div>
        <form class="" action="#" method="post">
            <div>
                <label class="studentlab" for="">Username</label>
                <input type="text" class="name" name="name" required>
           </div>
           <div>

                <label class="studentlab" for="">Email</label>
                <input type="text" class="email" name="email" required>

           </div>
           <div>
                <label class="studentlab" for="">Phone No</label>
                <input type="text" class="phone" name="phone" required>
           </div>
           <div>
                <label class="studentlab" for="">Password</label>
                <input type="text" class="password" name="pass" required>
           </div>
           <div class="add-student-btn">
                 <!-- <input type="submit" value=""> -->
                 <button  name="addstudent"  type="submit" class="btn btn-success addstudent " >Add Student</button>
           </div>
        </form>
     </div>
</div>

</body>
</html>