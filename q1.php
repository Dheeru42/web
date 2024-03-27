<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location:index.php");
  exit();
}
?>

<?php
$insert = false;
$inserti = false;
$e = false;
$r = false;
// Database connection parameters
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


// Initialize variables
$text = $imagePath = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if text is entered
  if (!empty($_POST["que"])) {
    $top = $_POST["topic"];
    $class = $_POST["class"];
    $que = $_POST["que"];

    // Store text in MySQL
    $sql = "INSERT INTO `q_db` (topic,class,question) VALUES ('$top','$class','$que')";

    if ($conn->query($sql) === TRUE) {
      $insert = true;
          header('location:q1.php');
    } else {
      $e = true;
          header('location:q1.php');
    }
  }

  // Check if image is uploaded
  elseif (!empty($_FILES["image"]["name"])) {
      if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
          $imageData = file_get_contents($_FILES['image']['tmp_name']);
          $imageData = $conn->real_escape_string($imageData);
          $top = $_POST["topic"];
          $class = $_POST["class"];
          // Save the image data in the database
          $sql = "INSERT INTO `q_db` (topic,class,question_image) VALUES ('$top','$class','$imageData')";
          $conn->query($sql);
          $inserti = true;
              header('location:q1.php');
      } else {
        $e = true;
            header('location:q1.php');
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
</head>

<body>
  <?php
  require 'partial/_navh.php';
  ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Solution</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="sol.php" method="post">
      <div class="modal-body">
           <div class="mb-3 mt-4">
        <label for="title" class="form-label"><b>S.No:</b></label>
        <input type="top" class="form-control" id="top" placeholder="Please Enter S.No Of Question........" name="top" required>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-outline-primary">Search</button>
    </div>
  </form>
    </div>
  </div>
</div>


  

  <!-- For Badge display -->
  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Topic <strong>: $top</strong> and Question <strong>: $que</strong> is Saved.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }

  if ($inserti) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Topic <strong>: $top</strong> and Image <strong>: $imagePath</strong> is Saved.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
  ?>

  <!-- For badge error -->
  <?php
  if ($e) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong><b>Deleted!</b></strong>Your Topic <strong>: $top</strong> and Question <strong>: $que</strong> is not Saved. <strong></strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  if ($r) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong><b>Error! </b></strong>Your Topic <strong>: .$r. <strong></strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  ?>

  <!-- Display Form  -->
  <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
  </div>
  <b><u>
      <h1 style="text-align: center;color:SlateBlue;">Ask The Expert</h1></b></u>
  <hr>
  <div class ="contain">
          <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    
        <label for="title" class="form-label"><b>Topic:</b></label>
        <input type="text" class="form-control" id="topic" placeholder="Write Your Topic" name="topic" aria-describedby="text" required>
    
      
        <label for="title" class="form-label"><b>Class:</b></label>
        <input type="text" class="form-control" placeholder="Write Your Class" id="class" name="class" aria-describedby="text" required>
    
        <label for="desc" class="form-label"><b>Question:</b></label>
                <textarea id="que" name="que" rows="4" placeholder="Write Your Question Here OR Upload Question Image Below Tab" cols="50"></textarea>
                <h6 style='text-align:center'>OR</h6>  
        <input type="file" id="image" name="image">
      <input type="submit" class="btn btn-outline-secondary" value="Ask Expert" name="submit">
    </form>
  </div>
  <hr>
  <b><u>
      <h1 style="text-align: center;color:SlateBlue;">Recently Question Ask To Expert</h6></b></u>
  <hr>
  <!-- Table data -->
  <div class="container my-4">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Topic</th>
          <th scope="col">Class</th>
          <th scope="col">Question</th>
          <th scope="col">Que_img</th>
          <th scope="col">Solution</th>
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
    <td><form method='post' action = 'fetchi.php'>
    <button type='submit' class='btn btn-outline-primary' name='fetchImage' value='" . $row['s.no'] . "'>See Image</button>
</form></td> 
<td><button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
See Solution</button></td>    
  </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  </div>
  </td>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <hr>
  <?php
  require '_footer2.php';
  ?>

</body>

</html>
