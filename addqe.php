<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $size = $_POST['is'];
    $top = $_POST['topic'];
    $class = $_POST['class'];
    $answer = $_POST['answer'];
    $question = $_POST['question'];
    $qi = $_FILES["question_image"]["tmp_name"];
    $image1 = $_FILES["image1"]["tmp_name"];
    $image2 = $_FILES["image2"]["tmp_name"];
    $image3 = $_FILES["image3"]["tmp_name"];

    // Function to convert image to binary data
    function imageToBlob($image)
    {
        $data = file_get_contents($image);
        return $data;
    }
    // Insert image file1 names into database
    if ($size == 3) {
        if ($image1) {
            $img1 = addslashes(imageToBlob($image1));
        }
        if ($image2) {
            $img2 = addslashes(imageToBlob($image2));
        }
        if ($image3) {
            $img3 = addslashes(imageToBlob($image3));
        }
        if($qi)
        {
            $qm = addslashes(imageToBlob($qi));
            $sql = "INSERT INTO `q_db` (`topic`,`class`,`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$top','$class','$question','$qm','$answer','$img1', '$img2', '$img3')";
            $conn->query($sql);
            header("Location: addq&a.php");
        }
        else
        {
            $sql = "INSERT INTO `q_db` (`topic`,`class`,`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$top','$class','$question',NULL,'$answer','$img1', '$img2', '$img3')";
            $conn->query($sql);
header("Location: addq&a.php");        }
    } 
        // Insert image file2 names into database
    else if ($size == 2) {
        if ($image1) {
            $img1 = addslashes(imageToBlob($image1));
        }
        if ($image2) {
            $img2 = addslashes(imageToBlob($image2));
        }
        if($qi)
        {
            $qm = addslashes(imageToBlob($qi));
            $sql = "INSERT INTO `q_db` (`topic`,`class`,`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$top','$class','$question','$qm','$answer','$img1', '$img2', NULL)";
            $conn->query($sql);
header("Location: addq&a.php");        }
        else
        {
            $sql = "INSERT INTO `q_db` (`topic`,`class`,`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$top','$class','$question',NULL,'$answer','$img1', '$img2', NULL)";
            $conn->query($sql);
header("Location: addq&a.php");        }
    } 
        // Insert image file3 names into database
    else if($size==1) {
        if ($image1) {
            $img1 = addslashes(imageToBlob($image1));
        }
        if($qi)
        {
            $qm = addslashes(imageToBlob($qi));
            $sql = "INSERT INTO `q_db` (`topic`,`class`,`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$top','$class','$question','$qm','$answer','$img1',NULL,NULL)";
            $conn->query($sql);
header("Location: addq&a.php");        }
        else
        {
            $sql = "INSERT INTO `q_db` (`topic`,`class`,`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$top','$class','$question',NULL,'$answer','$img1', NULL,NULL)";
            $conn->query($sql);
header("Location: addq&a.php");        }
    }
        // Insert image file0 names into database
    else {
        if($qi)
        {
            $qm = addslashes(imageToBlob($qi));
            $sql = "INSERT INTO `q_db` (`topic`,`class`,`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$top','$class','$question','$qm','$answer',NULL,NULL,NULL)";
            $conn->query($sql);
header("Location: addq&a.php");        }
        else
        {
            $sql = "INSERT INTO `q_db` (`topic`,`class`,`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$top','$class','$question',NULL,'$answer',NULL,NULL,NULL)";
            $conn->query($sql);
            header("Location: addq&a.php");
        }
    }
}

?>