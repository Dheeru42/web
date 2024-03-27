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
        $sql = "INSERT INTO `message` (`content`) VALUES ('$satisfaction')";
        $result = mysqli_query($conn, $sql);
        echo "Thank you for your feedback! Your satisfaction rating is: $satisfaction";
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
    <title>User Satisfaction Page</title>
</head>
<body>
    <h1>User Satisfaction Page</h1>

    <p>Please rate your satisfaction on a scale of 1 to 5:</p>

    <form method="post">
        <label for="satisfaction">Satisfaction:</label>
        <select name="satisfaction" id="satisfaction">
            <option value="1">1 (Lowest)</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5 (Highest)</option>
        </select>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
