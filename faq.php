<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location:index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>academicpluss - Your Gateway to Lifelong Learning</title>
    <link rel="shortcut icon" type="x-icon" href="pen.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .ce
        {
            text-align: center;
        }

        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.search-container {
    text-align: center;
    background-color: #f2f2f2;
    color: #fff;
    padding: 20px;
}

h1 {
    font-size: 24px;
}

.search-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #fff;
    border-radius: 25px;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

input[type="text"] {
    border: none;
    outline: none;
    padding: 10px;
    border-radius: 25px;
    cursor: pointer;
    width: 80%;
}

button {
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 30px;
    padding: 10px 20px;
    transition: background-color 0.2s;
}

button:hover {
    background-color: #555;
}

/* Add FontAwesome for the search icon (you may need to include the FontAwesome library) */
.fa-search {
    font-size: 16px;
}


    </style>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6505851856459439"
     crossorigin="anonymous"></script>
</head>
<body>

<?php
require 'partial/_navh.php';
?>
    <br>
    <div class="ce">
    <h1 style="color: black;"><b><u>Frequently Asked Question</u></b></h1>
<div class="search-container">
        <form method="GET">
            <div class="search-bar">
                <input type="text" name="query" placeholder="Ask Your Question">
                <button type="submit" class="button-button:hover">Search</button>
            </div>
        </form>
    </div>
    <hr>
    
<br>
    <?php
    // Database configuration
    $dbHost = 'localhost';
    $dbUser = 'dheeraj';
    $dbPass = 'Aligarh9@';
    $dbName = 'acad_p';

    // Check if a query was submitted
    if (isset($_GET['query'])) {
        // Sanitize the input to prevent SQL injection (you should use prepared statements for production code)
        $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    $search = mysqli_real_escape_string($conn, $_GET['query']);

        // Create a database connection

        // Check the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve FAQ data
        $sql = "SELECT * from `faq` where `question` LIKE '%$search%'";
        $result = $conn->query($sql);

        // HTML structure for the FAQ page
        echo "<html>";
        echo "<head>";
        echo "<title>FAQ Page</title>";
        echo "<style>
    .faq-item { margin-bottom: 10px; }
    .question { font-weight: bold; cursor: pointer; }
    .answer { display: none;
          }
</style>";
        echo "</head>";
        echo "<body>";
        if($search){
        // Display FAQ items
        if (mysqli_num_rows($result) > 0) {
            echo "<h1><u><b>Recently Question Asked By Student's</b></u></h1>";
            echo "<br>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='faq-item'>";
                echo "<div class='question' onclick='toggleAnswer(this)'>  Que: "  . $row['question'] . "</div>";
                echo "<div class='answer'> Ans: " . $row['answer'] ."</div>";
                echo "</div>";
                
            }
        } else {
            echo "<h5>No Question found!!</h5>";
        }
    }
        echo "</body>";
        echo "</html>";

        // Close the database connection
        mysqli_close($conn);

        // JavaScript to toggle answers
        echo "<script>
    function toggleAnswer(element) {
        var answer = element.nextElementSibling;
        if (answer.style.display === 'block') {
            answer.style.display = 'none';
        } else {
            answer.style.display = 'block';
        }
    }
</script>";
echo '    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
';
echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>';
    }
echo '<br>';
echo '<hr>';
    require "_footer2.php";
    ?>
</div>
</body>

</html>




