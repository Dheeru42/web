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
    $sql = "SELECT `image1`,`image2`,`image3` FROM `qa` WHERE `id` = '$image_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output image data
        while($row = $result->fetch_assoc()) {
        $image1 = $row['image1'];
        $image2 = $row['image2'];
        $image3 = $row['image3'];
        
        // Display the image
           if (!empty($row["image1"])) {
            echo "<img src='data:image/jpeg;base64," . base64_encode($image1) . "' />";
        }        
            echo '<br>';
            echo '<br>';
           if (!empty($row["image2"])) {
            echo "<img src='data:image/jpeg;base64," . base64_encode($image2) . "' />";
        }        
            echo '<br>';
            echo '<br>';
           if (!empty($row["image3"])) {
            echo "<img src='data:image/jpeg;base64," . base64_encode($image3) . "' />";
        }        
            echo '<br>';
            echo '<br>';
        
        echo '<br>';

    }
    } else {
        $err = true;
        header("location:addqa.php");
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
    <?php
    if ($showalert) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong><b>ERROR! </b></strong> '.$showalert.'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      if ($err) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong><b>ERROR! </b></strong> No Answer Image Found .
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
</body>
</html>