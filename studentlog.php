<?php
$showalert = false;
$showalert1 = false;
$showalert2 = false;
$login = false;
$pa = false;
$pa1 = false;
if(isset($_POST['form1_submit'])){
    include 'partial/_dbconnect.php';
    $username = $_POST['uname'];
    $pass = $_POST['pass'];
    if ($username and $pass) {
        $sql = "SELECT * FROM `students_log` WHERE `username` ='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($pass, $row['password'])) //
                {
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("location:welcome.php");
                } else {
                    $showalert = true;
                }
            }
        } else {
             $showalert2 = true;
        }
    } else {
        $pa = 'Please Enter a Valid Details';
    }
}

if(isset($_POST['form2_submit'])){
    include 'partial/_dbconnect.php';
    $username = $_POST['u'];
    $pass = $_POST['p'];
    $cpass = $_POST['c'];
    $email = $_POST['em'];
    $exists = false;
    //check whether the username is exist:
    $existsql = "SELECT * FROM `students_log` WHERE `username`='$username'";
    $result = mysqli_query($conn, $existsql);
    $numExistsRows = mysqli_num_rows($result);
    if ($numExistsRows > 0) {
      $pa = "Username Already Exists";
    } else {
      if (($pass == $cpass)) {
        $hash = password_hash($pass, PASSWORD_DEFAULT); //
        if($username and $pass and $cpass)
        {
        $sql = "INSERT INTO `students_log` (`username`, `password`,`email`,`date`) VALUES ('$username', '$hash','$email' ,current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          $showalert1 = "Your account is created. Now You can login";
        }
      } else {
        $pa1 = "Password do not match";
      }
    }
    else
      {
        $pa1 = "Please Enter a Valid Details"; 
      }
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
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      display: flex;
      flex-wrap: wrap;
    }

    .form-column {
      flex: 1;
      min-width: 300px;
      margin: 10px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 767px) {
      .form-column {
        flex: 1 100%;
      }
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    input,
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
 header {
            background-color:#D0D3D4 ;
            color:#6C3483;
            font-weight: bold;
            font-size: 30px;
            text-align: center;
            padding: 20px;
        }
    button {
      background-color: #4caf50;
      color: white;
      padding: 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>

    <?php
    require 'ssnav.php';
    ?>
    <?php
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><b>SUCCESS! </b></strong> You are loggedin.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($showalert) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><b>ERROR! </b></strong> Your Password does not match.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    
    if ($showalert2) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><b>ERROR! </b></strong> Your <b>Username</b> and <b>Password </b>does not match.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    if ($pa) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><b>ERROR! </b></strong>' . $pa . '.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($showalert1) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><b>SUCCESS!</b></strong> ' . $showalert1 . '.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
      }
      if ($pa1) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong><b>ERROR! </b></strong>' . $pa1 . '.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    ?>

    <h1 style="text-align: center;color:chocolate"><b><u>Student Login Section</u></b></h1>

    <hr>
 <div class="container">
    <div class="form-column">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    <header>
       
        <br>
        <u>Welcome Student</u></header>
        <header>
    </div>
    <div class="form-column">
                        <h2 style="text-align: center ; background-color:powderblue;color:#4D5656"> 
                        <b><u>
                           First Time - Create Account</u></b></h2>
                    
                <form method="post">
                    <br>
                    <label for="username"><b>Username:</b></label>
                    <input type="text" id="u" placeholder="write your name" name="u" required>

                    <label for="email"><b>Email Address:</b></label>
                    <input type="email" id="em" placeholder="write your email" name="em" required>
                    
                    <label for="password"><b>Password:</b></label>
                    <input type="password" id="p" placeholder="write your password" name="p" required>
                    
                    <label for="password"><b>Confirm Password:</b></label>
                    <input type="password" id="c" placeholder="write your password" name="c" required>
                    <br>
                    <br>
                    <button class="btn btn-outline-info" name="form2_submit" type="submit">SignUp</button>
                </form>
    </div>
  </div>
    <hr>
    <?php
    require '_footer1.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>