<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:index.php");
    exit();
}
?>
<?php
$err = false;
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

// Get the image ID from the URL (assuming it's passed as a parameter)
if (isset($_POST['fetchImage'])) {
    $image_id = $_POST['fetchImage'];

    // Fetch the image data from the database based on the image ID
    $sql = "SELECT `question_image` FROM `qa` WHERE `id` = '$image_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output image data
        $row = $result->fetch_assoc();
        $image_data = $row['question_image'];

        // Output appropriate content-type header
        header('Content-Type: image/jpeg'); // Adjust content type based on your image type

        // Output the image data
        echo $image_data;
    } else {
        echo "Image not found.";
    }
} else {
    echo "Image ID not provided.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>academicpluss - Get Your Homework Help</title>
    <link rel="shortcut icon" type="x-icon" href="pen.png">
</head>
<body>
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <h3 style = 'text-align:center'><strong>ERROR!</strong> No Image Found.</h3>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
 <div style = 'text-align:center'>
 <a class='btn btn-outline-danger btn-lg' href='https://www.academicpluss.com/addqa.php' role='button'>Back to Page</a>
    </div>
</div>
</body>
</body>
</html>