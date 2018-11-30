<?php
session_start();

if ( isset( $_SESSION['stud_id']) && isset( $_SESSION['f_name']) && isset( $_SESSION['l_name']) )
{



}
else
{
echo "<script>window.location.replace('studentlogin.php');</script>";
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
        <script src="studwelcome.js"></script>
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
            <a class="navbar-brand" href="studwelcome.html">Student Krud</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <td><li ><a href="studwelcome.php">Home</a></li></td>
            <li><a href="#">Your Account</a></li>
            <li><a href="studlogout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
   <div class="well page-header">
     <blockquote class="blockquote">Welcome <?php echo $_SESSION['f_name'], ' ', $_SESSION['l_name'];?> !

 </blockquote>
   </div>

 </br></br>
 <div id="divtable" class="container"">
 <div class="panel panel-primary">
   <div class="panel-heading">
     <h3 class="panel-title">Records</h3>
   </div>
   <div class="panel-body">
 <table id="tabledit" class="table table-hover table-responsive  table-striped" >

     <thead>
<tr class="myHead">
             <th>#</th>

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
 </body>



</html>
