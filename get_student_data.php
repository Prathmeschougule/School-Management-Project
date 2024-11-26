<?php
    $conn = mysqli_connect("localhost", "root", "", "schoolproject");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_GET['id'];
    $query = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    }

   

    
          
    
    ?>

