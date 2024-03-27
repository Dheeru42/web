<!DOCTYPE html>
<html>

<head>
    <title>academicpluss - Get Your Homework Help</title>
    <link rel="shortcut icon" type="x-icon" href="pen.png">
    <script>
        // Check for browser support
        if ('webkitSpeechRecognition' in window) {
            const recognition = new webkitSpeechRecognition();

            recognition.lang = 'en-US';
            recognition.continuous = false;
            recognition.interimResults = false;

            recognition.onresult = function(event) {
                const result = event.results[0][0].transcript;
                document.getElementById('search-input').value = result;
            };

            recognition.onerror = function(event) {
                console.error('Speech recognition error:', event.error);
            };

            function startVoiceRecognition() {
                recognition.start();
            }
        } else {
            alert('Web Speech API is not supported in this browser. Please use a supported browser.');
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .ce {
            text-align: center;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        #voice-sign {
            font-size: 24px;
            color: #4285f4;
            /* You can customize the color */
            cursor: pointer;
            padding-right: 10px;
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
</head>

<body>

    <?php
    require 'partial/_nav.php';
    ?>
    
    <br>
    <div class="ce">
        <h1 style="color: black;"><b><u>Search Your Question</u></b></h1>
        <div class="search-container">
            <form method="GET">
                <div class="search-bar">
                    <input type="text" name="query" id="search-input" placeholder="Enter Your Question">
                    <i id="voice-sign" class="fas fa-microphone" onclick="startVoiceRecognition()"></i>
                    <button type="submit" class="button-button:hover">Search</button>
                </div>
            </form>
        </div>
        <hr>
        <?php
// Your PHP logic here

// Assuming you have some condition to trigger the popover
$showPopover = true;

// Popover content
$popoverMessage = "Please Login.";

?>
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
            $search = $_GET['query'];

            // Create a database connection
            $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

            // Check the connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve FAQ data
            $sql = "SELECT * from qa where question LIKE '%" . $search . "%'";
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
          .glass
          {
            filter: blur(3px);
          }
        
</style>";
echo "<style>
/* Blur effect */
.blurred {
    filter: blur(20px); /* Adjust the blur strength as needed */
}
</style>";
            echo "</head>";
            echo "<body>";
            if ($search) {
                // Display FAQ items
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<h3><b><u><font size='+4'>Question:</font></u></b></h3>";
                        if (!empty($row["question"])) {
                            echo "<b><font size ='+2'><p style='text-align: center;'>" . $row["question"] . "</p></font></b>";
                        }
                        echo '<br>';
                        if (!empty($row["question_image"])) {
                            // Display image if the answer is an image
                            $imageData = base64_encode($row["question_image"]);
                            echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Question Image">';
                        }
                        echo '<hr>';
                        echo "<h3><b><u><font size='+4'>Answer:</font></u></b></h3>";
                        if (!empty($row["answer"])) {
                            echo "<b><font size ='+2'><p style='filter: blur(5px);'>" . $row["answer"] . "</p></font></b>";
                        }
                        echo '<br>';
                        if (!empty($row["image1"])) {
                            // Display image if the answer is an image
                            $imageData = base64_encode($row["image1"]);
                            echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Answer Image" class = "blurred">';
                            echo '<br>';
                            echo '<br>';
                        }
                        if (!empty($row["image2"])) {
                            // Display image if the answer is an image
                            $imageData = base64_encode($row["image2"]);
                            echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Answer Image" class = "blurred">';
                            echo '<br>';
                            echo '<br>';
                        }
                        if (!empty($row["image3"])) {
                            // Display image if the answer is an image
                            $imageData = base64_encode($row["image3"]);
                            echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Answer Image" class = "blurred">';
                            echo '<br>';
                            echo '<br>';
                        }
                        echo '<br>';
                         echo '  <a href="studentlog.php" class="btn btn-outline-danger">Please login</a>
                            ';
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<hr>';
                        echo '<hr>';
                    }
                }  else {
                    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <img src="ca.png" alt="" srcset="" width="50px">
            <div>
            <h6 style = "text-align:center;">No Question found.</h6>
           
            </div>
          </div>
          <a href="q1.php" class="btn btn-outline-danger"><b>Ask Expert </b></a>';
          echo '<br>';
          echo '<br>';
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
     
        require "_footer1.php";
        ?>



    </div>
</body>

</html>