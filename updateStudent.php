<?php

$conn = mysqli_connect("localhost", "root", "", "schoolproject");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['updateStudent'])) {
    $id = $_POST['id'];  // Get student ID from the POST request
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    
    // Update the student data
    $update = "UPDATE user SET userName='$userName', email='$email', phonNo='$phone', pass='$pass' WHERE id='$id'";

    if (mysqli_query($conn, $update)) {
       ?>
         <script> window.location.href='view_student.php';</script>";
       
       <?php
          
    } else {
        echo "<script>alert('Update failed, please try again.'); window.location.href='view_student.php';</script>";
    }
} else {
    echo "No data received!";
}

?>
