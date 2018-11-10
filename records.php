<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="">
  <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  <script src="js/jquery.tabledit.js"></script>
  <script src="jquery.sortElements.js"></script>
  <script src="mainsub.js"></script>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet"/>
    <link href="css/font-awesome.css" rel="stylesheet"/>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Student Krud</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <td><li ><a href="index.html">Home</a></li></td>
      <li><a href="records.php">Student Records</a></li>
      <li><a href="addteacher.php">Teachers</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>

  </div>
</nav>


<div class="well page-header">
  <blockquote class="blockquote">This page allows you to view and edit records</blockquote>
</div>
</br>
</br>
</br>
</br>

<div id="divtable" class="container">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Student Records</h3>
  </div>
<div class="panel-body">
<table class="table table-hover table-responsive table-striped" id="overview">
<thead>
<tr>
    <th>ID</td>
    <th>Name</td>
    <th>Class</td>
    <th>Functions</th>
  </tr>
</thead>
<tbody>
<?php
  $host = "127.0.0.1";
  $dbusername = "root";
  $dbpassword = "password";
  $dbname = "regis";
  $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

  $sql = "SELECT * FROM stud_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr id=".$row["stud_id"]."><td> " . $row["stud_id"]. " </td> <td>" . $row["f_name"]. " " . $row["l_name"]. "   </td><td>  " . $row["Class"]. "</td><td>";?><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModalrec" onclick="viewData(this.parentNode.parentNode.id)">Open Records</button>
<?php echo"</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</tbody>
</table>
</div>
</div>
</div>
<div id="myModalrec" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Student Information</h4>
      </div>
      <div class="modal-body">
        <table id="tablerec" class="table table-hover table-responsive table-striped " >
        <thead>


            <tr>
              <th>#</th>
              <th>Student ID</th>
              <th>Course</th>
              <th>Coursework</th>
              <th>Exam</th>
              <th>Final</th>
              <th>Coursework</th>
              <th>Exam</th>
              <th>Final</th>
              <th>Coursework</th>
              <th>Exam</th>
              <th>Final</th>



            </tr>

        </thead>
        <tbody id='tablebodyrec'>
          <script>
          viewData();
          </script>

        </tbody>
    </table>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




</body>
