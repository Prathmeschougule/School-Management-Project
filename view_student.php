<?php
$conn = mysqli_connect("localhost", "root", "", "schoolproject");

if ($conn->connect_error) {
    die("connection not established " . $conn->connect_error);
}

$query = "SELECT * FROM user WHERE userType='student'";

$result = mysqli_query($conn, $query);

$data = mysqli_num_rows($result);
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
        table,
        th,
        tr,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    include 'admin_side_bar.php';
    ?>

    <div class="tableheadingone">
        <div class="admisionheading">
            <div class="studentinfoheading">
                     <h1>Student Information</h1>
            </div>
        
            <div class="searchstudenta">
                <input class="SearchInput" type="search">
                <button class="btn btn-success  serachbtn" type="submit"> search</button>
            </div>
        </div>

        <table style="margin-top:40px;" border="1px">
            <tr class="admsiontable">
                <th class="tableheading" style="padding: 20px; font-size: 15px;">Name</th>
                <th class="tableheading" style="padding: 20px; font-size: 15px;">Phone No</th>
                <th class="tableheading" style="padding: 20px; font-size: 15px;">E-mail</th>
                <th class="tableheading" style="padding: 20px; font-size: 15px;">Password</th>
                <th class="tableheading" style="padding: 20px; font-size: 15px;">Action</th>
            </tr>
            <?php
            if ($data) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td style="padding: 20px;"><?php echo $row['userName']; ?></td>
                        <td style="padding: 20px;"><?php echo $row['phonNo']; ?></td>
                        <td style="padding: 20px;"><?php echo $row['Email']; ?></td>
                        <td style="padding: 20px;"><?php echo $row['pass']; ?></td>
                        <td style="padding: 20px;">
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            <!-- Updated Update button to pass the student ID -->
                            <a class="btn btn-success" href="view_student.php?id=<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" onclick="loadStudentData(<?php echo $row['id']; ?>)">Update</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5" style="padding: 20px;">Data Not Found</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Student Data </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="updateStudent.php" method="POST">
                        <input type="hidden" name="id" id="studentId"> <!-- Pass the student id here -->
                        <div>
                            <label class="studentlab" for="userName">Username</label>
                            <input type="text" class="name" name="userName" id="userName" required>
                        </div>
                        <div>
                            <label class="studentlab" for="email">Email</label>
                            <input type="email" class="email" name="email" id="email" required>
                        </div>
                        <div>
                            <label class="studentlab" for="phone">Phone No</label>
                            <input type="text" class="phone" name="phone" id="phone" required>
                        </div>
                        <div>
                            <label class="studentlab" for="pass">Password</label>
                            <input type="password" class="password" name="pass" id="pass" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="updateForm" class="btn btn-primary" name="updateStudent">Save</button> <!-- Corrected submit button -->
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>




    <script>
        function loadStudentData(id) {
            // Fetch student data from the server using the id (AJAX or PHP)
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_student_data.php?id=' + id, true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    var student = JSON.parse(xhr.responseText);
                    document.getElementById('studentId').value = student.id; // Pass student ID to hidden field
                    document.getElementById('userName').value = student.userName;
                    document.getElementById('email').value = student.Email;
                    document.getElementById('phone').value = student.phonNo;
                    document.getElementById('pass').value = student.pass;
                }
            };
            xhr.send();
        }
    </script>



</body>

</html>