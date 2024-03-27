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
$show = false;
$e = false;
$q = false;
$servername = "localhost";
$username = "dheeraj";
$password = "Aligarh9@";
$database = "acad_p";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Error" . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['top'];
    $sql = "SELECT * from  `q_db` where `s.no` = '$search'";
    $result = $conn->query($sql);

    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>academicpluss - Your Gateway to Lifelong Learning</title>
    <link rel="shortcut icon" type="x-icon" href="pen.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    .center
    {
        display:block;
        margin-left:auto;
        margin-right:auto;
    }
    </style>
    </head>
<body>';
    require 'partial/_navh.php';

    echo '<br>';
    
    if ($search) {
        if ($result->num_rows > 0) {
            $show = '  For Choosing Our Platform. Hope you liked our platform.';
            if ($show) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><b>Thanks!</b></strong> ' . $show . '.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            echo '<br>';
            echo '<b><u><h1 style = "text-align:center;color:grey;">Your Solution</h1></u></b>';
            echo '<hr>';
            while ($row = $result->fetch_assoc()) {
                
                echo '<br>';
                // Display the image
                echo '<h2 style = "text-align:center;">Question:</h2>';
                 if(!empty($row["question_image"]))
                {
                $imageData = $row["question_image"];
                echo '<img src="data:image/' . ';base64,' . base64_encode($imageData) . '"  class = "center"  alt="image not found">';
                }
                 if(!empty($row["question"]))
                {
                    echo "<p style='text-align: center;'>" . $row["question"] . "</p>";
                }
                echo '<hr style="border: 2px; height: 2px; background-image: linear-gradient(to right, #ff8c00, #ff0080, #8a2be2, #4b0082);">';
                echo '<h2 style = "text-align:center;">Answer:</h2>';
                 if(!empty($row["answer"]))
                {
                    echo "<p style='text-align: center;'>" . $row["answer"] . "</p>";
                }
                $imageData1 = $row["image1"];
                $imageData2 = $row["image2"];
                $imageData3 = $row["image3"];
                // Display the image
                echo '<br>';
                if ($imageData1 or $imageData2 or $imageData2) {
                    if (!empty($row["image1"])) {
                        echo '<img src="data:image/' . ';base64,' . base64_encode($imageData1) . '" class = "center"  alt="image not found">';
                    }
                    echo '<br>';
                    if (!empty($row["image2"])) {
                        echo '<img src="data:image/' . ';base64,' . base64_encode($imageData2) . '" class = "center"  alt="image not found">';
                    }
                    echo '<br>';
                    if (!empty($row["image3"])) {
                        echo '<img src="data:image/' . ';base64,' . base64_encode($imageData3) . '"  class = "center"  alt="image not found">';
                    }
                    echo '<br>';
                   
                    echo '<hr>';
                    $e = false;
                    echo "<br>";
                    $q = true;
                } else {
                        $e = true;
                   
                }
                if(!empty($row["answer"]))
                {
                    echo '<hr>';
                    $e = false;
                    $q = true;
                }
            }
        } else {
            $showalert = "At this S.No No Question Found!!!";
        }
    }
}

if ($showalert) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><b>Error! </b></strong> ' .  '.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($e) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><b>Please Wait!!  Your Answer Is Shortly. </b></strong> ' . '.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($q) {
    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
  <h5 style = "text-align:center;"><b>Hope You Like The Answer, Share This Platform To Your Friend To Get Help?</b></h5> ' . '.
  <div class ="container">
  <br>
  <h1><b><u>Please Rate US</u></b></h1>

    <p><b>Please rate your satisfaction on a scale of 1 to 5:</b></p>

    <form action= "feedback.php" method="post">
        <label for="satisfaction"><b>Rate:</b></label>
        <select name="satisfaction" id="satisfaction">
            <option value="1">1 (Lowest)</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5 (Highest)</option>
        </select>
        <br>
        <br>
        <label for="satisfaction"><b>Suggestion:</b></label>
        <input type="text" id="sugg" name="sugg" placeholder="Any Suggestion??"> 
<br>
<br>
        <button class = "btn btn-outline-success" type="submit">Submit</button>
    </form>
  </div>
</div>';
}

echo '<br>';

echo '<br>';
echo '<br>';
echo '<br>';
echo '<hr>';
require '_footer2.php';
echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>';
echo '</div>';
echo '</body>
</html>';
?>

