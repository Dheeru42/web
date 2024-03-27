<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location:index.php");
  exit();
}
?>

<!-- HTML -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>academicpluss - Your Gateway to Lifelong Learning</title>
  <link rel="shortcut icon" type="x-icon" href="pen.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    .faq {
      text-align: center;
    }
  </style>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6505851856459439"
     crossorigin="anonymous"></script>
</head>

<body>

  <?php
  require 'partial/_navh.php';
  ?>

  <!-- Carsoal -->

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="c1.jpg" class="d-block w-100" alt="..." width="100px" height="500px">
        <div class="carousel-caption d-none d-md-block">

          <button class="btn btn-dark" type="submit">Learn</button>
          <button class="btn btn-dark" type="submit">Solution</button>
          <button class="btn btn-dark" type="submit">Q&A</button>
          <h5 style="color:#ffa07a;">The beautiful thing about learning is that no one can take it away from you.</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="c2.jpg" class="d-block w-100" alt="..." width="100px" height="500px">
        <div class="carousel-caption d-none d-md-block">
          <button class="btn btn-success" type="submit">Learn</button>
          <button class="btn btn-success" type="submit">Solution</button>
          <button class="btn btn-success" type="submit">Q&A</button>
          <h5 style="color:#5F6A6A;">Education is the foundation upon which we build our future.</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="c3.jpg" class="d-block w-100" alt="..." width="100px" height="500px">
        <div class="carousel-caption d-none d-md-block">
          <button class="btn btn-info" type="submit">Learn</button>
          <button class="btn btn-info" type="submit">Solution</button>
          <button class="btn btn-info" type="submit">Q&A</button>
          <h5 style="color:#808B96 ;">Education is not the learning of facts, but the training of the mind to think.</h5>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <hr>
  <!-- card -->
  <br>
  <div class="container marketing">
  <h1 style="text-align: center;color:#EB984E;"><q>Stay on top in your class Get our 24/7 student support and get answered within hours</q></h1>
<hr>
    <div class="row">
      <h1 style="text-align: center;color:#5F6A6A;"><B><u>Our Services</u></B></h1>
      <br>
      <br>
      <hr>
      <br>
      <div class="col-lg-4">
        <img src="phy.jpg" width="400px" height="200px" alt="" srcset="">
        <br>
        <br>
        <hr>
        <b>
          <p>Study of matter, energy, space, and time; explores fundamental laws governing the universe's behavior.Study of natural phenomena laws.</p>
        </b>
        <h4 style="text-align:center;"><a class="btn btn-outline-info" href="q1.php"> Ask Physics &raquo;</a></h4>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="chem.jpg" width="400px" height="200px" alt="" srcset="">
        <br>
        <br>
        <hr>
        <b>
          <p>Chemistry explores matter, its properties, composition, and reactions, influencing diverse fields like medicine and industry.</p>
        </b>
        <h4 style="text-align:center;"><a class="btn btn-outline-success" href="q1.php">Ask Chemistry &raquo;</a></h4>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="math.jpg" width="400px" height="200px" alt="" srcset="">
        <br>
        <br>
        <hr>
        <b>
          <p>PMathematics: Universal language, abstract concepts, precise logic, problem-solving tool, essential in various disciplines.</p>
        </b>
        <h4 style="text-align:center;"><a class="btn btn-outline-warning" href="q1.php">Ask Math &raquo;</a></h4>
        <br>
      </div><!-- /.col-lg-4 -->
      <hr>
      <br>
      <div class="col-lg-4">
        <img src="micr.jpeg" width="400px" height="200px" alt="" srcset="">
        <br>
        <br>
        <hr>
        <b>
          <p>Microprocessor: Central processing unit in computers, executes instructions, processes data, crucial for system functionality.</p>
        </b>
        <h4 style="text-align:center;"><a class="btn btn-outline-danger" href="q1.php">Ask Micro Processor &raquo;</a></h4>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="coa.jpeg" width="400px" height="200px" alt="" srcset="">
        <br>
        <br>
        <hr>
        <b>
          <p>Computer organization and architecture study hardware and design principles for efficient information processing and storage.</p>
        </b>
        <h4 style="text-align:center;"><a class="btn btn-outline-primary" href="q1.php">Ask Computer Oraganization And Architecture &raquo;</a></h4>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="faq.jpg" width="400px" height="200px" alt="" srcset="">
        <br>
        <br>
        <hr>
        <b>
          <p>Frequently Asked Questions: concise answers to common queries for efficient information dissemination and user assistance.</p>
        </b>
        <!-- <h2 style="text-align:center;">FAQ</h2> -->
        <h4 style="text-align:center;"><a class="btn btn-outline-secondary" href="faq.php">Ask Frequently Asked Question &raquo;</a></h4>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
    <br>
    <hr>
    
    <?php
    require '_footer2.php'
    ?>
    <!-- java script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>



</html>