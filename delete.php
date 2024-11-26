<?php 
 
 $conn=mysqli_connect("localhost","root","","schoolproject");

 if($conn ->connect_error){
     die("connection not established " . $conn->connect_error);
 }

    $id=$_GET['id'];
    $query="DELETE FROM user Where id='$id' ";
    $data=mysqli_query($conn,$query);

    if ($data) {
        ?>
        <script>
            alert("Deleted Succefully")
            window.open("http://localhost/php%20code/School/view_student.php","_self")
        </script>
        <?php
    }else{

    ?>
        <script>
            alert("Try Agin ")
        </script>
    
    <?php
    }

?>