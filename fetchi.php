<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:index.php");
    exit();
}
?>
<?php
    $login = false;
$showalert = false;
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

if(isset($_POST['fetchImage'])) {
    // Get the image ID from the pressed button
    $imageId = $_POST['fetchImage'];

    // Fetch image data from the database
    $sql = "SELECT `question_image` FROM `q_db` WHERE `s.no` = '$imageId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
if (!empty($row["question_image"])) {
        // Display the image
        header("Content-type: image/JPEG,image/PNG,image/JPG"); // Adjust based on your image type (JPEG, PNG, etc.)
        echo $row['question_image'];
        exit(); // Stop further execution to prevent HTML rendering
}
    } else {
        header("location:q1.php");
    }
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>academicpluss - Your Gateway to Lifelong Learning</title>
    <link rel='shortcut icon' type='x-icon' href='pen.png'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>

</head>
<body>
<br>
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <h3 style = 'text-align:center'><strong>ERROR!</strong> No Image Found.</h3>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
 <div style = 'text-align:center'>
 <a class='btn btn-outline-danger btn-lg' href='https://www.academicpluss.com/q1.php' role='button'>Back to Page</a>
    </div>
</div>
</body>
</html>

