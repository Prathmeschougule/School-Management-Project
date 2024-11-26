<?php
// session_start();
// if(!isset($_SESSION['userName']))
// {
//      header("location:LogIn.php");
// }
// elseif($_SESSION['userType'] == 'student')
// {
//      header("location:LogIn.php");
// }

     include 'connection.php';

if (isset($_POST['addteacher'])) {

    $tname = $_POST['tname'];
    $tdescription = $_POST['tdescription'];
    $img = $_FILES['img']['name'];
    $dist = "Assets/" . $img;
//     $dist_db = "./Assets/" . $img;

    // Corrected the file upload handling
    move_uploaded_file($_FILES['img']['tmp_name'], $dist);

    // Corrected the query
    $query = "INSERT INTO teacher (tname, tdescription, img) VALUES ('$tname', '$tdescription', '$dist')";

    $data = mysqli_query($conn, $query);
    
    // Check if the query executed successfully
    if ($data) {
     //    echo "Teacher added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
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
    <title>Add Teacher</title>
</head>
<body>
<?php 
          include  'admin_side_bar.php'

?>
<div class="tableheadingone addstudentform">
    <div class="addStudenetHeading">
        <h1>Add Teacher</h1>
    </div>
    <div>
        <form action="#" method="post" enctype="multipart/form-data">
            <div>
                <label class="studentlab" for="tname">Teacher Name</label>
                <input type="text" class="name" name="tname" required>
            </div>
            <div>
                <label class="studentlab" for="description">Description</label>
                <textarea name="tdescription" required></textarea>
            </div>
            <div>
                <label class="studentlab" for="img">Photo</label>
                <input type="file" class="phone" name="img" required>
            </div>
            <div class="add-student-btn">
                <button name="addteacher" type="submit" class="btn btn-success addteacher">Add Teacher</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
