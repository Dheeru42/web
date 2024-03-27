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
$un = false;
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
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $size = $_POST['is'];
    $qi = $_FILES["question_image"]["tmp_name"];
    $image1 = $_FILES["image1"]["tmp_name"];
    $image2 = $_FILES["image2"]["tmp_name"];
    $image3 = $_FILES["image3"]["tmp_name"];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

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
            $sql = "INSERT INTO `qa` (`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$question','$qm','$answer','$img1', '$img2', '$img3')";
            $conn->query($sql);
            $add = true;
             header("location:addqa.php");
        }
        else
        {
            $sql = "INSERT INTO `qa` (`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$question',NULL,'$answer','$img1', '$img2', '$img3')";
            $conn->query($sql);
            $add = true;
             header("location:addqa.php");
        }
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
            $sql = "INSERT INTO `qa` (`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$question','$qm','$answer','$img1', '$img2', NULL)";
            $conn->query($sql);
            $add = true;
             header("location:addqa.php");
        }
        else
        {
            $sql = "INSERT INTO `qa` (`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$question',NULL,'$answer','$img1', '$img2', NULL)";
            $conn->query($sql);
            $add = true;
             header("location:addqa.php");
        }
    } 
        // Insert image file3 names into database
    else if($size==1) {
        if ($image1) {
            $img1 = addslashes(imageToBlob($image1));
        }
        if($qi)
        {
            $qm = addslashes(imageToBlob($qi));
            $sql = "INSERT INTO `qa` (`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$question','$qm','$answer','$img1',NULL,NULL)";
            $conn->query($sql);
            $add = true;
             header("location:addqa.php");
        }
        else
        {
            $sql = "INSERT INTO `qa` (`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$question',NULL,'$answer','$img1', NULL,NULL)";
            $conn->query($sql);
            $add = true;
             header("location:addqa.php");
        }
    }
        // Insert image file0 names into database
    else {
        if($qi)
        {
            $qm = addslashes(imageToBlob($qi));
            $sql = "INSERT INTO `qa` (`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$question','$qm','$answer',NULL,NULL,NULL)";
            $conn->query($sql);
            $add = true;
             header("location:addqa.php");
        }
        else
        {
            $sql = "INSERT INTO `qa` (`question`,`question_image`,`answer`,`image1`, `image2`, `image3`) VALUES ('$question',NULL,'$answer',NULL,NULL,NULL)";
            $conn->query($sql);
            $add = true;
             header("location:addqa.php");
        }
    }
}
// for delete faq
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `qa` WHERE `qa`.`id` = '$sno' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:addqa.php");
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="x-icon" href="pen.png">
    <title>academicpluss - Your Gateway to Lifelong Learning</title>
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
<strong><b>SUCCESS! </b></strong> Your Question Are Added.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        header("location:addqa.php");
    }

    if ($update) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong><b>SUCCESS! </b></strong> Your FAQ Are Update.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($uadd) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><b>ERROR! </b></strong> Your FAQ Are Not Add.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        header("location:addqa.php");
    }
    if ($un) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><b>ERROR! </b></strong> Your FAQ Are Not Update.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit FAQ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="editaddqa.php" method="post">
                    <div class="modal-body">
                        <input type="text" name="snoEdit" id="snoEdit">
                        <div class="mb-3 mt-4">
                            <label for="que" class="form-label">Question:</label>
                            <input type="text" class="form-control" id="que" name="que" aria-describedby="text">
                        </div>
                        <div class="mb-3 mt-4">
                            <input type="file" id="queEditi" name="queEditi">
                        </div>
                        <div class="mb-3">
                            <label for="answ" class="form-label">Answer:</label>
                            <textarea class="form-control" id="answ" name="answ" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" id="answEditi" name="answEditi">
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-secondary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <br>
    <b><u>
            <h1 style="text-align: center;color:#007bff">Add Question and Answer</h1>
        </u></b>
    <hr>
    <div class="contain">
        <form method="post" enctype="multipart/form-data">
            <label for="question"><b>Question:</b></label>
            <textarea name="question" rows="4" cols="50"></textarea>
            <h6 style="text-align: center;">OR</h6>
            <label for="question_image"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload Question Image (optional):</b></label>
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
            <h1 style="text-align: center;color:#007bff;">Question and Answer Data Table</h1>
        </u></b>
    <br>
    <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.NO</th>
                    <th scope="col">Que_txt</th>
                    <th scope="col">Que_img</th>
                    <th scope="col">Ans_txt</th>
                    <th scope="col">Ans_img</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `qa`";
                $result = mysqli_query($conn, $sql);
                $SNo = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    // line 165 **** class
                    $SNo = $SNo + 1;
                    echo "<tr>
    <th scope='row'>" . $SNo . "</th>
    <td>" . $row['question'] . "</td>
    <td><form method='post' action = 'fetchiq.php'>
    <button type='submit' class='btn btn-outline-primary' name='fetchImage' value='" . $row['id'] . "'>See Image</button>
</form></td>
    <td>" . $row['answer'] . "</td> 
    <td><form method='post' action = 'fetchia.php'>
    <button type='submit' class='btn btn-outline-primary' name='fetchImage' value='" . $row['id'] . "'>See Image</button>
</form></td>
    <td>
     <button class='delete btn btn-sm btn-outline-primary' id=d" . $row['id'] . ">Delete</button></td> 
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
    <script>
        // For edits
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                que = tr.getElementsByTagName("td")[0].innerText;
                answ = tr.getElementsByTagName("td")[2].innerText;
                console.log(que, answ);
                queEdit.value = que;
                answEdit.value = answ;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })
        //For deletes
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                sno = e.target.id.substr(1, );
                if (confirm("Are You Sure To Delete This!")) {
                    console.log("yes")
                    window.location = `addqa.php?delete=${sno}`;
                } else {
                    console.log("no")
                }
            })
        })
    </script>
</body>

</html>