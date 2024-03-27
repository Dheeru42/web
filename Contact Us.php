<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:index.php");
    exit();
}
?>

<?php
// alerts
$showalert = false;
$pa = false;
// data base
$servername = "localhost";
$username = "dheeraj";
$password = "Aligarh9@";
$database = "acad_p";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Error" . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    //check whether the username is exist:
    $existsql = "SELECT * FROM `cou` WHERE `name`='$name'";
    $result = mysqli_query($conn, $existsql);
    $numExistsRows = mysqli_num_rows($result);
    if ($numExistsRows > 0) {
        $pa = "$name Already Exists";
    } else {
        if ($name and $email and $subject and $message) {
            $sql = "INSERT INTO `cou` (`name`, `email`, `subject`, `message`, `date`) VALUES ('$name', '$email', '$subject', '$message', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showalert = "Your Contact Will We Shortly";
            }
        } else {
            $pa = "Please Enter a Valid Details";
        }
    }
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
        /* Add CSS styles for visual design, colors, and effects here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .contain {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .contact-info {
            margin-top: 20px;
        }

        .contact-info p {
            margin: 5px 0;
        }

        .contact-info a {
            color: #0077b5;
            text-decoration: none;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        /* Contact Form Styles */
        .contact-form {
            margin-top: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .contact-form button {
            background-color: #0077b5;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #005580;
        }

        /* Get Started Button Styles */
        .get-started-button {
            text-align: center;
            margin-top: 20px;
        }

        .get-started-button a {
            background-color: #0077b5;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }

        .get-started-button a:hover {
            background-color: #005580;
        }
    </style>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6505851856459439"
     crossorigin="anonymous"></script>
</head>

<body>


    <?php
    require 'partial/_navh.php';
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

    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">

        <div class="contain">
            <h1><u>Contact Us</u></h1>
            <hr>
            <div class="contact-info">
                <p>Email: <a href="https://www.gmail.com">academicpluss.global@gmail.com</a></p>
                <p>Instagram: <a href="https://instagram.com/academicpluss.global?igshid=OGQ5ZDc2ODk2ZA==" target="_blank">academicpluss.global</a></p>
                <p>Facebook: <a href="https://www.facebook.com/academicpluss.global?mibextid=ZbWKwL" target="_blank">academicpluss.global</a></p>
            </div>

            <p>We're always happy to hear from you! Whether you have a question, feedback, or just want to say hello, please don't hesitate to get in touch.</p>

            <div class="contact-form">
                <h2 style="text-align: center;"><u>Contact Form</u></h2>
                <form method="post">
                    <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
                    <input type="email" id="email" name="email" placeholder="Enter Your Valid Email" required>
                    <input type="text" id="subject" name="subject" placeholder="Subject" required>
                    <textarea name="message" id="message" placeholder="Your Message" rows="4"></textarea required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<hr>';
    require '_footer2.php';
    ?>
    <!-- java script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>