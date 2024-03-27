<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:index.php");
    exit();
}
?>

<?php
$add = false;
$uadd = false;
$update = false;
// Assuming you have a MySQL database set up with a table named 'faqs'
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
    // Check if a file was uploaded
        $id = $_POST['sno'];
        $answ = $_POST['answer'];
        $size = $_POST['is'];
        $image1 = $_FILES["image1"]["tmp_name"];
        $image2 = $_FILES["image2"]["tmp_name"];
        $image3 = $_FILES["image3"]["tmp_name"];

        // Function to convert image to binary data
        function imageToBlob($image)
        {
            $data = file_get_contents($image);
            return $data;
        }
        // Insert image file names into database
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
            if($answ)
            {
            $sql1 = "UPDATE `q_db` SET `image1` = '$img1',`image2` = '$img2',
            `image3`= '$img3',`answer` = '$answ' WHERE `s.no` = $id";
            $conn->query($sql1);
            }
            else {
                $sql1 = "UPDATE `q_db` SET `image1` = '$img1',`image2` = '$img2',
            `image3`= '$img3',`answer` = NULL WHERE `s.no` = $id";
            $conn->query($sql1);
            }
            header("Location: addq&a.php");
        } else if ($size == 2) {
            if ($image1) {
                $img1 = addslashes(imageToBlob($image1));
            }
            if ($image2) {
                $img2 = addslashes(imageToBlob($image2));
            }
            if($answ){
                $sql1 = "UPDATE `q_db` SET `image1` = '$img1',`image2` = '$img2',`image3`= NULL,`answer` = '$answ' WHERE `s.no` = $id";
            $conn->query($sql1);
            }
            else{
                $sql1 = "UPDATE `q_db` SET `image1` = '$img1',`image2` = '$img2',`image3`= NULL,`answer` = NULL WHERE `s.no` = $id";
            $conn->query($sql1);
            }
            header("Location: addq&a.php");
        } elseif($size==1) {
            if ($image1) {
                $img1 = addslashes(imageToBlob($image1));
            }
            if($answ){
            $sql1 = "UPDATE `q_db` SET `image1` = '$img1',`image2` = NULL,
            `image3`= NULL,`answer` = '$answ' WHERE `s.no` = $id"; // Adjust the WHERE clause as needed
            $conn->query($sql1);
            }
            else
            {
                 $sql1 = "UPDATE `q_db` SET `image1` = '$img1',`image2` = NULL,
            `image3`= NULL,`answer` = NULL WHERE `s.no` = $id"; // Adjust the WHERE clause as needed
            $conn->query($sql1);
            }
            header("Location: addq&a.php");
        }
        else
        {
            $sql1 = "UPDATE `q_db` SET `image1` = NULL,`image2` = NULL,
            `image3`= NULL,`answer` = '$answ' WHERE `s.no` = $id"; // Adjust the WHERE clause as needed
            $conn->query($sql1);
            header("Location: addq&a.php");
        }
}


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>academicpluss - Your Gateway to Lifelong Learning</title>
    <link rel="shortcut icon" type="x-icon" href="pen.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }

        .contain {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input,
        textarea {
            padding: 8px;
            margin-bottom: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <!-- css for table -->
    <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- jquery for table -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- jquery for data Table -->
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6505851856459439" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require 'partial/_nave.php';
    ?>

    <?php
    if ($add) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong><b>SUCCESS! </b></strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($uadd) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong><b>Error!! </b></strong>Image Not Update.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Answer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="answ" class="form-label"><b>S.No:</b></label>
                        <input type="text" name="sno" id="sno" placeholder="Please Enter S.No Carefully">
                        <hr>
                        <div class="mb-3">
                            <label for="answ" class="form-label"><b>Solution:</b></label>
                            <br>
                            <textarea name="answer" rows="4" cols="50"placeholder="Solution Text Here"></textarea>
            <h6 style="text-align: center;">OR</h6>
            <h6 style="text-align: center;">Upload Answer Image (optional):</h6>
            <br>
            <h6 style="color:red"><b>No of answer image is (0/1/2/3): Please fill carefully</b></h6>
                            <input type="text" id="is" placeholder="No of answer image" name="is" required>
                           <input type="file" name="image1">
                           <input type="file" name="image2">
                           <input type="file" name="image3">
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" value ="Submit" class="btn btn-outline-secondary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <br>
    <b><u>
            <h1 style="text-align: center;color:#007bff">Add Q&A Answer</h1>
        </u></b>
    <hr>
    <div class="contain">
        <form method="post" enctype="multipart/form-data" action="addqe.php">
            <label for="title" class="form-label"><b>Topic:</b></label>
            <input type="text" class="form-control" id="topic" placeholder="Write Your Topic" name="topic" aria-describedby="text" required>
            <label for="title" class="form-label"><b>Class:</b></label>
            <input type="text" class="form-control" placeholder="Write Your Class" id="class" name="class" aria-describedby="text" required>
            <label for="question"><b>Question:</b></label>
            <textarea name="question" rows="4" cols="50"></textarea>
            <h6 style="text-align: center;">OR</h6>
            <input type="file" name="question_image">
            <hr>
            <label for="answer"><b>Answer:</b></label>
            <textarea name="answer" rows="4" cols="50"></textarea>
            <h6 style="text-align: center;">OR</h6>
            <label for="answer_image"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload Answer Image (optional):</b></label><br>
            <h6 style="text-align: center;color:red"><b>No of answer image is (0/1/2/3):</b></h6>
            <input type="answer_image" id="is" placeholder="No of answer image/Please fill carefully" name="is" required>
            <input type="file" name="image1">
            <input type="file" name="image2">
            <input type="file" name="image3">
            <hr>
            <input type="submit" class="btn btn-outline-primary" value="Submit">
        </form>

    </div>
    <hr>
    <!-- Table data -->
    <b><u>
            <h1 style="text-align: center;color:#007bff;">Q&A Data Table</h1>
        </u></b>
    <br>
    <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.NO</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Class</th>
                    <th scope="col">Ques_txt</th>
                    <th scope="col">Ques_Image</th>
                    <th scope="col">Sol_txt</th>
                    <th scope="col">Sol_Image</th>
                    <th scope="col">Add_Sol</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `q_db`";
                $result = mysqli_query($conn, $sql);
                $SNo = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    // line 165 **** class
                    $SNo = $SNo + 1;
                    echo "<tr>
    <th scope='row'>" . $SNo . "</th>
    <td>" . $row['topic'] . "</td>
    <td>" . $row['class'] . "</td> 
    <td>" . $row['question'] . "</td> 
    <td><form method='post' action = 'fetchp.php'>
    <button type='submit' class='btn btn-outline-primary' name='fetchImage' value='" . $row['s.no'] . "'>See Image</button>
</form></td>
<td>" . $row['answer'] . "</td>
<td><form method='post' action = 'fetchs.php'>
<button type='submit' class='btn btn-outline-primary' name='fetch' value='" . $row['s.no'] . "'>See Image</button>
</form></td>
    <td><button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
    Add Solution
    </button> 
  </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>

    <hr>

    <?php
    require 'foote.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>