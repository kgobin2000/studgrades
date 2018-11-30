<?php
session_start();

if ( isset( $_SESSION['teach_id']) && isset( $_SESSION['firstname']) && isset( $_SESSION['lastname']) && isset( $_SESSION['course']) )
{

  $course=unserialize($_SESSION['course']);

}
else
{
echo "<script>window.location.replace('teachlogin.php');</script>";
}
?>

<?php
  $host = "127.0.0.1";
  $dbusername = "root";
  $dbpassword = "password";
  $dbname = "regis";
  $connect = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

  if (mysqli_connect_error())
  {
    die('Connect error('.mysqli_connect_errno().')'
    .mysqli_connect_error());
  }


 ?>
<!DOCTYPE html>
<html>
  <head>
    <style>
    .panel{
      width:500px;
      margin: auto;
      text-align: center;
      opacity:0.9;

  }

  .panel-heading{
    font-size: 18px;
  }

input{
    text-align: center;

  }
.glyphicon {
  font-size: 25px;
}

    </style>
    <link rel="shortcut icon" href="">
      <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
      <script src="js/jquery.tabledit.js"></script>
      <script src="jquery.sortElements.js"></script>
        <script src="teachaccounts.js"></script>
      <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="css/font-awesome.css" rel="stylesheet"/>
    <title>Welcome!</title>

  </head>
  <body>


      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="index.html">Student Krud</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <td><li ><a href="teachwelcome.php">Home</a></li></td>
            <li><a href="teachaccount.php">Your Account</a></li>
              <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
      </br></br></br></br></br></br></br></br></br>

      <div class="panel panel-primary">
  <div class="panel-heading">Change Password</div>
  <div class="panel-body">
    <form method="POST" id="changepass">
</br>
</br>
  <div class="form-group">
    <label for="currentpassword">Current Password:</label>
    <input type="password" class="form-control" id="password">
  </div>
</br>
</br>
  <div class="form-group">
    <label for="pwd">New Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
</br>
  <input type="checkbox" onclick="showpass()">  Show Password
</br>
</br>
</div>
<div class="panel-footer">
  <button type="submit" class=" glyphicon glyphicon-floppy-saved"></button>
</form>
  </div>
</div>
    </body>
    </html>
