<?php
session_start();

if ( isset( $_SESSION['teach_id']) && isset( $_SESSION['firstname']) && isset( $_SESSION['lastname']) && isset( $_SESSION['course']) )
{
  $course= $_SESSION['course'];
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
    $result = $mysqli->query("SELECT * FROM stud_rec WHERE course='$course'");
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['stud_id'] ?></td>
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
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);

    if ($input['action'] == 'edit') {

      $mysqli->query("UPDATE stud_rec SET coursework1='" . $input['coursework1'] . "',exam1='" . $input['exam1'] . "', final1='" . $input['final1'] . "',
        coursework2='" . $input['coursework2'] . "',exam2='" . $input['exam2'] . "', final2='" . $input['final2'] . "',
        coursework3='" . $input['coursework3'] . "',exam3='" . $input['exam3'] . "', final3='" . $input['final3'] . "' WHERE id='" . $input['id']. "' ");

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
?>
