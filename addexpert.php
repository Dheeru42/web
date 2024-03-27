<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:index.php");
    exit();
}
?>

<?php
$add = false;
$uadd = false;
$servername = "localhost";
$username = "dheeraj";
$password = "Aligarh9@";
$dbname = "acad_p";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    // Insert data into the 'experts' table
    $sql = "INSERT INTO `ex_log` (`username`,`email`,`password`,`date`) VALUES ('$name', '$email', '$hash',current_timestamp())";

    if ($conn->query($sql) === TRUE) {
        $add = true;
    } else {
        $uadd = true;
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6505851856459439"
     crossorigin="anonymous"></script>
</head>

<body>
    <!-- navbar -->
    <?php
    require 'partial/_nave.php';
    ?>


    <?php
    if ($add) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong><b>SUCCESS! </b></strong> Your Expert Are Added.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($uadd) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><b>ERROR! </b></strong> Your Expert Are Not Added.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

    <!-- body -->
    <br>
    <b><u>
            <h1 style="text-align: center;color:cornflowerblue">Add Expert</h1></b></u>
    <hr>
    <div class="container">
        <h2>Expert Add Form</h2>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Enter Name" id="name" required>

            <label for="name">Password:</label>
            <input type="password" name="pass" placeholder="Enter password" id="pass" required>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Enter email" required>

            <button class="btn btn-outline-secondary" type="submit">Add Expert</button>
        </form>
    </div>
    <hr>
    <!-- footer -->
    <?php
    require 'foote.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>