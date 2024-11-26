<?php
session_start(); // Start session at the top of the page

$conn = mysqli_connect("localhost", "root", "", "schoolproject");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['userName'];
    $pass = $_POST['pass'];

    // Prepare query to prevent SQL injection
    $query = "SELECT * FROM user WHERE userName = ? AND pass = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $userName, $pass);  // 'ss' means both parameters are strings

    $stmt->execute();
    $data = $stmt->get_result();
    $result = $data->fetch_array();

    if ($result) {
        // Store user data in session
        $_SESSION['id'] = $result['id'];
        $_SESSION['userName'] = $result['userName']; 

        // Redirect based on user type
        if ($result["userType"] === "student") {
            header("location: Student_profile.php");
        } elseif ($result["userType"] === "admin") {
            header("location: adminHome.php");
        }
    } else {
        // Invalid username/password
        $_SESSION['loginmsg'] = "<div class='error-message'>Wrong Username or Password</div>";
        header("location: LogIn.php");
    }
}
?>
