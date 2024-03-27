<?php
$pa = false;
$servername = "localhost";
$username = "dheeraj";
$password = "Aligarh9@";
$dbname = "acad_p";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Retrieve user input
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    // SQL query to check if the provided username and password exist in the database
    $existsql = "SELECT * FROM `students_log` WHERE `username`='$uname'";
    $result = mysqli_query($conn, $existsql);
    $numExistsRows = mysqli_num_rows($result);
    if ($numExistsRows > 0) {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "UPDATE `students_log` SET `password` = '$hash' where `username` = '$uname'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $pa1 = "Your Password is Sucessfully Changed.";
            }
        }
        else
        {
            $pa = "Password do not match";
        }
    } else {
        $pa = "No Username Exist";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>academicpluss - Your Gateway to Lifelong Learning</title>
    <link rel="shortcut icon" type="x-icon" href="pen.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .bo {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
    </style>
</head>

<body>

    <?php
    require 'partial/_nav.php';
    ?>
    <?php

    if ($pa) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><b>ERROR! </b></strong>' . $pa . '.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($pa1) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><b>SUCCESS! </b></strong>' . $pa1 . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <br>
    <h2 style="text-align: center;color:aquamarine"><u><b>Forget Password Or Change Password</b></u></h2>
    <hr>
    <br>
    <br>
    <div class="bo">
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label"><b>Username:</b></label>
                <input type="username" class="form-control" placeholder="enter username" required name="uname" id="uname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="enter password" required name="pass" id="pass">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><b>Confirm Password</b></label>
                <input type="password" class="form-control" placeholder="confirm password" required name="cpass" id="cpass">
            </div>
            <button type="submit" class="btn btn-outline-primary">Change Password</button>
        </form>
    </div>
    <br>
    <br>
    <br>
    <hr>
    <?php
    require '_footer1.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>