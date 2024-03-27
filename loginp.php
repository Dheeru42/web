<?php
$showalert = false;
$login = false;
$pa = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include 'partial/_dbconnect.php';
  $username = $_POST['uname'];
  $pass = $_POST['pass'];
  if($username and $pass)
  {
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
    $showalert = true;
  }
}
else
{
  $pa = 'Please Enter a Valid Details'; 
}
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>academicpluss - Your Gateway to Lifelong Learning</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
.cen
{
  text-align: center;
}
</style>
</head>

<body>
  <?php
  require 'partial/_nav.php';
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
      <strong><b>ERROR! </b></strong> Invalid ceredential.
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
  <h1 class="text-center"><u>Login To Join academicPLUS</u></h1>
  <hr>
  <div class="container">
    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="username" class="form-control" id="username" name="uname" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <div class="col-auto">
          <label for="password" class="col-form-label">Password</label>
        </div>
        <div class="col-auto">
          <input type="password" id="password" name="pass" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Must be 8-20 characters long.
          </span>
        </div>
        
      </div>
      <button type="submit" class="btn btn-primary">login</button>
    </form>
    <br>
    <br>
    <hr>
  </div>
  <?php
  require '_footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>