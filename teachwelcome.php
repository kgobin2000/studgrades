<?php
session_start();

if ( isset( $_SESSION['teach_id']) && isset( $_SESSION['firstname']) && isset( $_SESSION['lastname']) && isset( $_SESSION['course']) )
{

  $course=unserialize($_SESSION['course']);
  $formteacher=unserialize($_SESSION['formteacher']);

}
else
{
echo "<script>window.location.replace('teacherlogin.php');</script>";
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
    <link rel="shortcut icon" href="">
      <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
      <script src="js/jquery.tabledit.js"></script>
      <script src="jquery.sortElements.js"></script>
        <script src="teachwelcome.js"></script>
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
   <div class="well page-header">
     <blockquote class="blockquote">Welcome <?php echo $_SESSION['firstname'], ' ', $_SESSION['lastname'];?> !   Subjects:
       <?php
       if (is_array($course)){

     foreach($course as $key =>$value)
     {
       echo " $value ";
     }
    }
    else
   {
     echo $_SESSION['course'];
   }
   ?>
   Form Teacher:
   <?php
   if (is_array($formteacher)){

 foreach($formteacher as $key =>$value)
 {
   echo " $value ";
 }
}
else
{
 echo $formteacher;
}
?>
 </blockquote>
   </div>
   <div class="btn-group btn-group-lg col-md-4 ">
   <div id="grades" style="visibility:visible;position:absolute;z-index: 1;" >
      <button id="toggle" type="button" class="btn btn-primary">Grades</button>
   </div>
   <div id="ratings"  style="visibility:hidden;position:absolute;z-index:2;" >
      <button id="toggle1" type="button" class="btn btn-primary">Ratings</button>
   </div>
 </div>

 </br></br>
 <div id="divtable" class="container" >
 <div class="panel panel-primary">
   <div class="panel-heading">
     <h3 class="panel-title">Grades</h3>
   </div>
   <div class="panel-body">
 <table id="tabledit" class="table table-hover table-responsive  table-striped" >

     <thead>
<tr class="myHead">
             <th>#</th>
             <th>Student ID</th>
              <th>First Name</th>
              <th>Last Name</th>
             <th>Class</th>
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
     <tbody id='tablebody'>
       <script>
       viewData();
       </script>

     </tbody>
 </table>
</div>
</div>
</div>

<div id="resultstable" class="container" >
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Ratings</h3>
  </div>
  <div class="panel-body">
<table id="resultsedit" class="table table-hover table-responsive  table-striped" >

    <thead>
<tr class="myHead">
            <th>#</th>
            <th>Student ID</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Class</th>
             <th>Course</th>
            <th>Ability</th>
            <th>Effort</th>
            <th>Result</th>
            <th>Ability</th>
            <th>Effort</th>
            <th>Result</th>
            <th>Ability</th>
            <th>Effort</th>
            <th>Result</th>


</tr>
    </thead>
    <tbody id='resultsbody'>
      <script>
      viewresultsData();
      </script>

    </tbody>
</table>
</div>
</div>
</div>
 </body>



</html>
