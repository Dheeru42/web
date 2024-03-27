<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>academicpluss - Get Your Homework Help</title>
    <link rel="shortcut icon" type="x-icon" href="pen.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .cen {
            text-align: center;
        }

        body {
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
           
        }

        .button {
            padding: 10px 20px;
            font-size: 20px;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: burlywood;
            color: white;
            text-align: center;
            padding: 2em;
        }

        .p {
            background-color:  #58D68D;
            color: white;
            text-align: center;
            padding: 2em;
        }

        main {
            background-color: #58D68D;
            color: #FBFCFC ;
            text-align: center;
            padding: 2em;
        }

        .features {
            display: flex;
            justify-content: center;
            margin-top: 2px;
        }
        .feature {
            text-align: center;
            margin: 0 20px;
        }
        .feature img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .feature h2 {
            font-size: 24px;
        }
        @media screen and (max-width: 600px) {
            /* Adjustments for mobile devices */
            .p {
                padding: 10px;
            }
        }
    </style>
    <style>
         .main-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
         .card {
            width: 30%;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .card-content {
            padding: 20px;
        }
        .card-content h2 {
            font-size: 1.5em;
            margin-top: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
       @media only screen and (max-width: 768px) {
            .card {
                width: 48%;
            }
        }
        @media only screen and (max-width: 480px) {
            .card {
                width: 100%;
            }
        }
        @media only screen and (max-width: 480px) {
            .container {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <?php
    require 'partial/_nav.php';
    ?>
    <br>
    <header>
        <h1><b><u>Welcome to academicpluss</u></b></h1>
        <p>Your Gateway to Lifelong Learning</p>
    </header>
    <hr>
    <div class="button-container">
        <form>
            <!-- studentlo.php -->
            <a href="studentlog.php" class="btn btn-outline-primary" aria-current="page">Student Login</a>
        </form>

        <form>
            <!-- exlog.php -->
            <a href="exlog.php" class="btn btn-outline-primary" aria-current="page">Expert Login</a>
        </form>
    </div>
    <hr>
    <!-- <div class="container">
        <p style="color: #7F8C8D;"><b>Welcome to academicpluss, where learning knows no boundaries and curiosity is celebrated! We are delighted to have you join our vibrant community of learners, educators, and knowledge enthusiasts. Our mission is to provide an inclusive and innovative platform that ignites a passion for lifelong learning.

                At academicpluss, we believe that education is a transformative journey that opens doors to new possibilities. Whether you're a student embarking on your academic adventure, a professional seeking to enhance your skills, or an individual driven by the joy of discovery, you've come to the right place.

                Explore a diverse range of courses crafted to inspire and challenge you. Our dedicated team of educators is committed to delivering high-quality content, fostering engaging discussions, and providing you with the tools to succeed. Through interactive lessons and collaborative learning experiences, we aim to make education not just a destination but a thrilling expedition.

                Feel the excitement of acquiring knowledge, honing skills, and connecting with like-minded learners from around the world. Together, let's embark on a journey of exploration, growth, and excellence. Welcome to academicpluss — where every question sparks a new discovery and every lesson is a step towards a brighter future.

            </b></p>
    </div>
    <hr> -->
    <div class="content">
        <main>
        <h1><b><u>Learn Anytime, Anywhere</u></b></h2>
        <h5>Get instant 24/7 study support</h5>
        <hr>
    </main>
    <div class="p">
    <div class="row">
      <div class="col-lg-4">
      <img src="tick.jpg" width="400px" height="200px">
      <br>
      <br>
                <h2><b><u>Credible Solution by Expert</u></b></h2>
                <p><b>Experts display student's questions in a simple manner.</b></p> 
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img src="step.jpg"  width="400px" height="200px">
      <br>
      <br>
                <h2><b><u>Step-Wise Explanation</u></b></h2>
                <p><b>Clarity and Simplicity of an expert's solution,crafted by an Expert.</b></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img src="bra.jpg"  width="400px" height="200px">
      <br>
      <br>
                <h2><b><u>Simple learning style</u></b></h2>
                <p><b>Student's can embark on a unlocking the full potential of your Brain.</b></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
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


<!-- 
    <section class="features">
        <div class="feature">
            <h3>Expert Instructors</h3>
            <p>Learn from industry experts who are passionate about teaching.</p>
        </div>
        <div class="feature">
            <h3>Flexible Learning</h3>
            <p>Study at your own pace, wherever and whenever you want.</p>
        </div>
        <div class="feature">
            <h3>Interactive Content</h3>
            <p>Engage with interactive Solution to their Question</p>
        </div>
    </section>
 -->