<?php
$showalert = false;
$pa = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include 'partial/_dbconnect.php';
  $username = $_POST['uname'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  $email = $_POST['email'];
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
        $showalert = "Your account is created. Now You can login";
      }
    } else {
      $pa = "Password do not match";
    }
  }
  else
    {
      $pa = "Please Enter a Valid Details"; 
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>academicpluss - Your Gateway to Lifelong Learning</title>
  <link rel="shortcut icon" type="x-icon" href="pen.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
      .cen {
            text-align: center;
        }

        body {
            margin: 0;
            padding: 0;
            height: 60vh;
        }

        .login-container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        .left-login {
            flex: 1;
            margin-left: 30px;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 10px solid white;
        }

        .right-login {
            flex: 1;
            background-color: #e0e0e0;
            margin-right: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form {
            width: 500px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
        }

        /* Additional styling for better presentation */
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .vl {
            border-left: 6px solid blue;
            height: 500px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6505851856459439"
     crossorigin="anonymous"></script>
</head>

<body>
  <?php
  require 'partial/_nav.php';
  ?>
  <?php
  if ($showalert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><b>SUCCESS!</b></strong> ' . $showalert . '.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  if ($pa) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><b>ERROR! </b></strong>' . $pa . '.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>
  <br>
  <h1 style="color: SlateBlue;" class="text-center"><u>Create a account to Join academicpluss</u></h1>
  <hr>
  <div class="login-container">
        <div class="left-login">
  <div class="login-form">
                <br>
                <form action="signup.php" method="post">
                    <label for="username"><b>Username:</b></label>
                    <input type="text" id="uname" placeholder="write your name" name="uname" required>

                    <label for="email"><b>Email Address:</b></label>
                    <input type="email" id="email" placeholder="write your email" name="email" required>
                    
                    <label for="password"><b>Password:</b></label>
                    <input type="password" id="pass" placeholder="write your password" name="pass" required>
                    
                    <label for="password"><b>Confirm Password:</b></label>
                    <input type="password" id="cpass" placeholder="write your password" name="cpass" required>
                    
                    <button class="btn btn-outline-info" type="submit">SignUp</button>
                </form>
            </div>
            </div>
            </div>
            <br>
            <?php
            echo '<hr>';
  require '_footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>


