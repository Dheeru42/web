<?php
 session_start();
 if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true)
 {
  header("location:index.php");
  exit();
}
?>

<?php
$servername = "localhost";
$username = "dheeraj";
$password = "Aligarh9@";
$database = "acad_p";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Error" . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'satisfaction' parameter is set
    if (isset($_POST['satisfaction'])) {
        $satisfaction = $_POST['satisfaction'];
        $sugg = $_POST['sugg'];
        $sql = "INSERT INTO `message` (`rate`,`suggestion`) VALUES ('$satisfaction','$sugg')";
        $result = mysqli_query($conn, $sql);
        echo "Thank you for your feedback! Your satisfaction rating is: $satisfaction";
        session_start();
        $_SESSION['loggedin'] = true;
        header("Location: q1.php");
    } else {
        echo "Invalid satisfaction data";
    }
} else {
    echo "Invalid request method";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>academicpluss - Your Gateway to Lifelong Learning</title>
    <link rel="shortcut icon" type="x-icon" href="pen.png">
</head>
<body>
    
</body>
</html>