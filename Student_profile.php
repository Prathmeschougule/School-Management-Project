<?php
session_start();

// Check if the user is logged in by verifying the session
if (!isset($_SESSION['id'])) {
    // If the user is not logged in, redirect to login page
    header("location: LogIn.php");
    exit();
}

// Get the user ID from the session
$userID = $_SESSION['id'];

$conn = mysqli_connect("localhost", "root", "", "schoolproject");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM user WHERE id = '$userID'";
$data = mysqli_query($conn, $query);

// Fetch the data as an associative array
$result = mysqli_fetch_assoc($data); // Using mysqli_fetch_assoc() to fetch the row as an associative array

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
    <?php include 'student_side_bar.php'; ?>

    <div class="tableheadingone addstudentform  parent ">
        
         <div>
         <div class="child">
                 <button type="sybmit" class="btn student-profile-edit btn-success">Edit</button>
         </div>
            <h1 class="addStudenetHeading">Add Student</h1>
        </div>
        
        <div>
            <div class="container bootstrap snippets bootdey">
                <div class="panel-body inf-content">
                    <div class="row">
                        <div class="col-md-4">
                            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario">

                        </div>
                        <div class="col-md-6">
                            <strong>Information</strong><br>
                            <div class="table-responsive">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    Id
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                <p><?php echo $result['id']; ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-user  text-primary"></span>
                                                    Student Name
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                <p><?php echo $result['userName']; ?></p>
                                        </tr>


                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-bookmark text-primary"></span>
                                                    Emal Id
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                <p><?php echo $result['Email']; ?></p>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                                    Role
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                User
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                                                    Password
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                <p><?php echo $result['pass']; ?></p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            
        </div>


    </div>


</body>

</html>