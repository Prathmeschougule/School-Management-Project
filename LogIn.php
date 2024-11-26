<?php
session_start(); // Start session at the top of the page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_file/style.css">
    <title>Login Page</title>
</head>
<body background="Assets/playground.jpg" class="imagbody">

<center>
    <div class="designform">
        <form action="login_check.php" method="post" class="formContent">
            <div class="Heading">
                <h1>Login User</h1>
            </div>

            <!-- Display session message if it exists -->
            <p class="Validationmsg">
                <?php
                    if (isset($_SESSION['loginmsg'])) {
                        echo $_SESSION['loginmsg'];  // Display session message
                        unset($_SESSION['loginmsg']); // Clear the message after it is displayed
                    }
                ?>
            </p>

            <div class="alignInfo">
                <div class="infoSpace">
                    <label for="">UserName</label>
                    <input class="inputstyle" name="userName" type="text">
                </div>
                <div class="infoSpace">
                    <label for="">Password</label>
                    <input class="inputstyle" name="pass" type="password">
                </div>
                <button class="btn btn-success" type="submit">SignIn</button>
            </div>
        </form>
    </div>
</center>

</body>
</html>
