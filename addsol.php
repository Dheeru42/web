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
    $sql = "SELECT `image_s` FROM `q_db` WHERE `s.no` = '$imageId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display the image
        header("Content-type: image/JPEG,image/PNG,image/JPG"); // Adjust based on your image type (JPEG, PNG, etc.)
        echo $row['image_s'];
        exit(); // Stop further execution to prevent HTML rendering
    } else {
       $login = true;
        session_start();
    $_SESSION['loggedin'] = true;
    header("Location: addq&a.php");
    }
}

?>
