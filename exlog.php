

<?php
$showalert = false;
$login = false;
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
$uname = $_POST['username'];
$pass = $_POST['password'];
 if($username and $pass)
  {
  $sql = "SELECT * FROM `ex_log` WHERE `username` ='$uname'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($pass, $row['password'])) //
      {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $uname;
        header("location:expertwel.php");
      } else {
          $showalert = true;
      }
    }
  }
  else
      {
          $pa = "Fill Carefully. Your <b>Username </b> and <b>Password </b>does not match.";
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
    require 'snav.php';
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
      <strong><b>ERROR! </b></strong> Password does not match.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    if ($pa) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><b>Please! </b></strong>' . $pa . '.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    
    ?>
    <br>
    <h1 style="text-align: center;color:chocolate"><b><u>Expert Login Section</u></b></h1>
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
        <u>Welcome Expert</u></header>
        <header>
    </div>
    <div class="form-column">
    <b><u>
                       
                        <h2 style="text-align: center ; background-color:powderblue;color:#4D5656"><b><u>Expert Login </u></b></h2>
                    
                    <form method="post">
                        <br>
                    <label for="username"><b>Username:</b></label>
                    <input type="text" id="username" placeholder="write your name" name="username" required>
<br>
<br>
                    <label for="password"><b>Password:</b></label>
                    <input type="password" id="password" placeholder="write your password" name="password" required>
                    <br>
                    <br>
                    <p style = "text-align:center"><a class="link-opacity-100-hover" href="forget_passE.php">Forget Password or Change Password ?</a></p>
                    <button class="btn btn-outline-info" type="submit">Login</button>
                </form>
    </div>
  </div>

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