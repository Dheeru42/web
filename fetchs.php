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

if(isset($_POST['fetch'])) {
    // Get the image ID from the pressed button
    $imageId = $_POST['fetch'];

    // Fetch image data from the database
    $sql = "SELECT `image1`,`image2`,`image3` FROM `q_db` WHERE `s.no` = '$imageId'";
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
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>academicpluss - Your Gateway to Lifelong Learning</title>
    <link rel="shortcut icon" type="x-icon" href="pen.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
  
</body>
</html>