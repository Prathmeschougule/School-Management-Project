<?php 


session_start();
$conn=mysqli_connect("localhost","root","","schoolproject");

if($conn ->connect_error){
    die("connection not established " . $conn->connect_error);
}


if (isset($_POST['apply'])) {
  
    $username=$_POST['username'];
    $phon=$_POST['phon'];
    $email=$_POST['email'];
    $masage=$_POST['masage'];
   
    $query="INSERT INTO admission( username	,phon,email,masage) VALUES ('$username','$phon',' $email',' $masage')";
    
    $data=mysqli_query($conn,$query);
   
    if($data){
    
        $_SESSION['message']="Your application Send Succefully";
        header("location:Index.php");


    }else{
        echo"Apply Failed";
    }   
}
?>