<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}
echo '
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="class fluid">
            <img src="pen.png" height="60px">
            </div>
  <div class="container-fluid">
    <a class="navbar-brand" href="welcome.php"><b>academicpluss</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>';


echo '</ul>
<form class="d-flex" role="search">
<a href="searchre.php" class="btn btn-outline-info"><b>Search</b></a>
</form>
    </div>
  </div>';




if (!$loggedin) {
  echo  '<a href="studentlog.php" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-current="page">Login</a>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Student Login</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post">
        <label for="username"><b>Username:</b></label>
        <input type="text" id="uname" placeholder="write your name" name="uname" required>
        <br>
        <br>
        <label for="password"><b>Password:</b></label>
        <input type="password" id="pass" placeholder="write your password" name="pass" required>
        <br>
        <br>
        <p style = "text-align:center"><a class="link-opacity-100-hover" href="forget_passS.php">Forget Password or Change Password ?</a></p>
        <div class="modal-footer">
          <button type="submit" name="form1_submit" class="btn btn-outline-primary">login</button>
        </div>
    </form>
        </div>
        
      </div>
    </div>
  </div>';
}

if ($loggedin) {
  echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
          <a class="nav-link" href="logout.php">LogOut</a>
        </li>
        </ul>';
}

echo '</nav>';
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>