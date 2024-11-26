<?php  
$conn = mysqli_connect("localhost", "root", "", "schoolproject");

if ($conn->connect_error) {
    die("Connection not established: " . $conn->connect_error);
}

?>