<?php
session_start();

if ( isset( $_SESSION['teach_id']) && isset( $_SESSION['firstname']) && isset( $_SESSION['lastname']) && isset( $_SESSION['course']) )
{
  $course=unserialize($_SESSION['course']);
  $course1=$_SESSION['course'];
}
else
{
echo "<script>window.location.replace('teachlogin.php');</script>";
}
$mysqli = new mysqli('localhost', 'root', 'password', 'regis');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    if(is_array($course))
    {

      /*foreach($course as $key =>$value)
      {
      $sql.="SELECT * FROM stud_rec WHERE course='$course[$key]'";
    }*/

    //finish
    $size=sizeof($course);
    for ($i=0;$i<$size;$i++)
    {
      $result = $mysqli->query("SELECT * FROM stud_ratings WHERE course='$course[$i]'");
      while($row = $result->fetch_assoc()){
        $studid=$row['stud_id'];
          $newresult = $mysqli->query("SELECT * FROM `stud_info` WHERE stud_id='$studid'");


              $row1=$newresult->fetch_assoc();
          ?>
          <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['stud_id'] ?></td>
              <td><?php echo $row1['f_name'] ?></td>
                <td><?php echo $row1['l_name'] ?></td>
                  <td><?php echo $row1['Class'] ?></td>
              <td><?php echo $row['course'] ?></td>
              <td><?php echo $row['ab1'] ?></td>
            <td><?php echo $row['ef1'] ?></td>
              <td><?php echo $row['res1'] ?></td>
              <td><?php echo $row['ab2'] ?></td>
            <td><?php echo $row['ef2'] ?></td>
              <td><?php echo $row['res2'] ?></td>
              <td><?php echo $row['ab3'] ?></td>
            <td><?php echo $row['ef3'] ?></td>
              <td><?php echo $row['res3'] ?></td>
          </tr>
          <?php
      }
    }
  }



 else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);

    if ($input['action'] == 'edit') {

      $mysqli->query("UPDATE stud_ratings SET ab1='" . $input['ab1'] . "',ef1='" . $input['ef11'] . "', res1='" . $input['res1'] . "',
        ab2='" . $input['ab2'] . "',ef2='" . $input['ef2'] . "', res2='" . $input['res2'] . "',
        ab3='" . $input['ab3'] . "',ef3='" . $input['ef3'] . "', res3='" . $input['res3'] . "' WHERE id='" . $input['id']. "' ");

      //$mysqli->query("INSERT INTO stud_info (teach_id, firstname, lastname,password,deleted) VALUES ('" . $input['teach_id'] . "','" . $input['firstname'] . "','" . $input['lastname'] . "','" . $input['password'] . "','0')");

        } else if ($input['action'] == 'delete') {
        $sql = "DELETE FROM admin WHERE id='" . $input['id'] . "';";

          $result=mysqli_query($mysqli,$sql);
        //$mysqli->query("DELETE FROM stud_info WHERE id='" . $input['id'] . "'");
        //$mysqli->query("DELETE FROM stud_rec WHERE teach_id='" . $input['teach_id'] . "'");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE stud_info SET deleted=0 WHERE id='" . $input['id'] . "'");
    } else if ($input['action'] === 'add') {
      $a=$input['teach_id'];
      $b=$input['firstname'];
      $c=$input['lastname'];
      $d=$input['password'];
    $mysqli->query("INSERT INTO stud_info (teach_id, firstname, lastname,password,deleted) VALUES ('a','b','c','d','0')");
}

    mysqli_close($mysqli);

    echo json_encode($input);

}
}
?>
