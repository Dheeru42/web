<!-- Php -->

<?php
 session_start();
 if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true)
 {
  header("location:index.php");
  exit();
}
?>

<?php
$insert=false;
$update=false;
$delete=false;
$servername="localhost";
$username="dheeraj";
$password="Aligarh9@";
$database="notes";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("Sorry We failed to connect:".mysqli_connect_error());
}

if (isset($_GET['delete']))
{
  $sno=$_GET['delete'];
  $sql="DELETE FROM `notes` WHERE `notes`.`S.No` = '$sno' ";
$result=mysqli_query($conn,$sql);
if ($result) 
{
    $delete=true;
}
else 
{
    $err=mysqli_error($conn);
   echo "Not deleted due to this error ---> $err"; 
}
}

if($_SERVER['REQUEST_METHOD']=='POST')
{

  if(isset($_POST['snoEdit']))
  {
    //UPDATE THE record
  $title=$_POST['titleEdit'];
  $desc=$_POST['descEdit'];
  $sno=$_POST['snoEdit'];
  $sql="UPDATE `notes` SET `description` = '$desc' , `title` = '$title'  WHERE `S.No` = $sno";
  $result=mysqli_query($conn,$sql);
  if($result)
{
    $update=true;
}
else {
    echo "not updated";
}
  }
  else 
  {
  $title=$_POST['title'];
  $desc=$_POST['desc'];
  $sql="INSERT INTO `notes` (`title`, `description`, `tstamp`) VALUES ('$title', '$desc', current_timestamp())";
  $result=mysqli_query($conn,$sql);
  if ($result) 
  {
    $insert=true;
  }
  else 
  {
   echo "The Record Was Not Successfully Created because of this error --->". mysqli_error($conn);
  }
}
}
?>
<!-- HTML -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Gateway to Lifelong Learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- css for table -->
    <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- jquery for table -->
    <script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
  <!-- jquery for data Table -->
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> 
    <script>$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6505851856459439"
     crossorigin="anonymous"></script>
</head>
  <body>


  <?php
    require 'partial/_navh.php';
    ?>
<!-- For Badge display -->
<?php
    if($insert)
    {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Title <strong>$title</strong> and Description <strong>$desc</strong> is Saved.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    }
    ?>
    <!-- For badge update -->
    <?php
    if($update)
    {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Title <strong>$title</strong> and Description <strong>$desc</strong> is Updated.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    }
    ?>
    <!-- For badge delete -->
    <?php
    if($delete)
    {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong><b>Deleted!</b></strong> <strong>Your Note  is Deleted.</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  ?>
<!-- Display Form  -->
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0"> 
</div>
<b><u><h2 style="text-align: center;">Ask The Expert</h2></b></u>
<hr>
<div class="container mt-4">
<form method="post">
  <div class="mb-3 mt-4">
    <label for="title" class="form-label">Notes Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="text">
  </div>
  <div class="mb-3">
  <label for="desc" class="form-label">Notes Description</label>
  <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
</div>
  <button type="submit" class="btn btn-outline-secondary">Ask Question</button>
</form>
</div>
<br>
<hr>
<!-- Table data -->
<div class="container my-4">
    <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql="SELECT * FROM `notes`";
    $result=mysqli_query($conn,$sql);
    $SNo=0;
    while ($row=mysqli_fetch_assoc($result))
{
  // line 165 **** class
$SNo =$SNo+1;
   echo "<tr>
    <th scope='row'>".$SNo."</th>
    <td>".$row['title']."</td>
    <td>".$row['description']."</td> 
    <td><button class='edit btn btn-sm btn-primary' id=".$row['S.No'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['S.No'].">Delete</button></td> 
  </tr>";
}
    ?>
  </tbody>
</table>
</div>
</div>
<!-- For modal javscript -->
<script>
  // For edits
  edits=document.getElementsByClassName('edit');
  Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        desc = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, desc);
        titleEdit.value=title;
        descEdit.value=desc;
        snoEdit.value=e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
})
      })
      //For deletes
      deletes=document.getElementsByClassName('delete');
  Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno=e.target.id.substr(1,);
        if(confirm("Are You Sure To Delete This!"))
        {
          console.log("yes")
         window.location =`/read/crud_app.php?delete=${sno}`;
        }
        else
        {
          console.log("no")
        }
      })
})
  </script>

<?php
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<hr>';
require '_footer.php';
?>

<!-- java script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>  
</body>
</html>