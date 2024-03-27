<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location:index.php");
  exit();
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
    .col {
      background: aliceblue;
    }
  </style>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6505851856459439"
     crossorigin="anonymous"></script>
</head>

<body>
  <?php
  require 'partial/_nave.php';
  ?>
  <br>

  <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <h1 style="-webkit-text-fill-color: blue;">Hi..  &nbsp<b><u><?php echo $_SESSION['username']; ?></u></b> &nbspSir , Welcome to</h1>
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="wl.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3"><u><b>academicpluss</b></u></h1>
          <p class="lead"><b>“The more that you read, the more things you will know, the more that you learn, the more places you'll go.”</b></p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="addfaq.php" class="btn btn-outline-info"><b>ADD FAQ</b></a>
            <a href="addq&a.php" class="btn btn-outline-secondary"><b>ADD Answer</b></a>
            <a href="addexpert.php" class="btn btn-outline-primary"><b>ADD Expert</b></a>
          </div>
          <br>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <a href="addqa.php" class="btn btn-outline-warning"><b>Add Q&A</b></a>
          <a href="review.php" class="btn btn-outline-success"><b>See Review</b></a>
          <a href="conr.php" class="btn btn-outline-dark"><b>See Contact Us</b></a>
        </div>
        </div>
      </div>
    </div>


  </div>
  </div>

  <?php
  require 'foote.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>