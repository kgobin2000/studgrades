<?php
session_start();

if ( isset( $_SESSION['stud_id']) && isset( $_SESSION['f_name']) && isset( $_SESSION['l_name']))
{
  $stud_id=$_SESSION['stud_id'];
}
else
{
echo "<script>window.location.replace('studentlogin.php');</script>";
}
$mysqli = new mysqli('localhost', 'root', 'password', 'regis');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){


      /*foreach($course as $key =>$value)
      {
      $sql.="SELECT * FROM stud_rec WHERE course='$course[$key]'";
    }*/

    //finish


      $result = $mysqli->query("SELECT * FROM stud_rec WHERE stud_id='$stud_id'");
      while($row = $result->fetch_assoc()){
              $newresult = $mysqli->query("SELECT * FROM stud_info WHERE stud_id=".$row['stud_id']."");
              $row1=$newresult->fetch_assoc();
          ?>
          <tr>
              <td><?php echo $row['id'] ?></td>

    
              <td><?php echo $row['course'] ?></td>
              <td><?php echo $row['coursework1'] ?></td>
            <td><?php echo $row['exam1'] ?></td>
              <td><?php echo $row['final1'] ?></td>
              <td><?php echo $row['coursework2'] ?></td>
            <td><?php echo $row['exam2'] ?></td>
              <td><?php echo $row['final2'] ?></td>
              <td><?php echo $row['coursework3'] ?></td>
            <td><?php echo $row['exam3'] ?></td>
              <td><?php echo $row['final3'] ?></td>
          </tr>
          <?php
      }

  }




?>
