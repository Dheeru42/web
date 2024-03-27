<?php
 session_start();
 if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true)
 {
  header("location:index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="x-icon" href="pen.png">
  <title>academicpluss - Your Gateway to Lifelong Learning</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <style>
    .container
    {
      background-color: aliceblue;
    }
  </style>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6505851856459439"
     crossorigin="anonymous"></script>
</head>

<body>
  
<?php
    require 'partial/_navh.php';
    ?>
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
  <h1 style="text-align:center;color:grey;"><u>About Us</u></h1>
  <hr>
  <br>
  <div class="container">
    <main>
      <section>
        <h2>Welcome to our tutoring and solution authoring website!</h2>

        <p>We are a team of experienced tutors and authors who are passionate about helping students achieve their
          academic goals. Our mission is to provide high-quality, affordable, and accessible tutoring and solution
          authoring services to students of all ages and backgrounds.</p>
      </section>

      <section>
        <h2>Our Story</h2>

        <p>Our company was founded in 2023 by a group of educators who recognized the need for personalized, one-on-one
          tutoring services. Since then, we have helped thousands of students improve their grades, boost their
          confidence, and achieve academic success.</p>
      </section>

      <section>
        <h2>Our Services</h2>

        <p>We offer a wide range of tutoring and solution authoring services to meet the needs of our students. Our
          services include:</p>

        <ul>
          <li>One-on-one tutoring</li>
          <li>Group tutoring</li>
          <li>Online tutoring</li>
          <li>Homework help</li>
          <li>Test preparation</li>
          <li>Solution authoring</li>
        </ul>
      </section>

      <section>
        <h2>Our Tutors</h2>

        <p>Our tutors are highly qualified and experienced educators who are passionate about teaching. They have
          advanced degrees in their respective fields and are committed to helping students succeed.</p>
      </section>

      <section>
        <h2>Our Authors</h2>

        <p>Our authors are experts in their fields who have years of experience creating high-quality educational
          content. They work closely with our tutors to create custom solutions that meet the unique needs of each
          student.</p>
      </section>
    </main>
  </div>
</div>
  <hr>

  <?php
  require '_footer2.php';
  ?>

  <!-- java script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>