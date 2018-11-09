
<!DOCTYPE html>
<html lang="en">
<head>

  <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  <script src="js/jquery.tabledit.js"></script>
  <script src="jquery.sortElements.js"></script>
  <script src="teacheredit.js"></script>
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
      <a class="navbar-brand" href="index.html">Dashboard</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <td><li ><a href="index.html">Home</a></li></td>
      <li><a href="records.php">Student Records</a></li>
      <li><a href="addteacher.php">Teachers</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>

  </div>
</nav>

<div class="main">

<div class="well page-header">
  <blockquote class="blockquote">This page allows you to add, remove and delete teachers</blockquote>
</div>
</div>
</br>
</br>
</br>
</br>
<div id="divtable" class="container"">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Teachers</h3>
  </div>
  <div class="panel-body">
        <table id="tabledit" class="table table-hover table-responsive  table-striped" >

            <thead>
                <tr class="myHead">
                    <th>#</th>
                    <th>Teacher ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Course</th>
                    <th>Password</th>


                </tr>
            </thead>
            <tbody id='tablebody'>
              <script>
              viewData();
              </script>

            </tbody>
        </table>

</div>



<div class="panel-footer">
       <!-- Trigger the modal with a button -->
<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button></center>
</div>
</div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form method='POST' id="insert_form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Teacher</h4>
      </div>
      <div class="modal-body">

            <div class="form-group">
              <label for="studentid">Teacher ID</label>
              <input  class="form-control" id="studentid" name="stud_id" aria-describedby="emailHelp" placeholder="Enter Student ID" required>
              <small id="emailHelp" class="form-text text-muted">This is the unique identifier for the teachert</small>
            </div>
            <div class="form-group">
              <label for="firstname">First Name</label>
              <input class="form-control" id="firstname" name="f_name" placeholder="First Name" required>
            </div>
            <div class="form-group">
              <label for="lastname">Last Name</label>
              <input class="form-control" id="lastname" name="l_name" placeholder="Last Name"required>
            </div>
            <div class="form-group">
              <label for="class">Course</label>
              <input class="form-control" id="course" name="course" placeholder="course"required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>



      </div>
      <div class="modal-footer" >
        <button type="submit" class="btn btn-primary" name="submit" id="submit">Add Teacher</button></div>
    </div>

  </div>
</div>


    </div>



</body>
</html>
