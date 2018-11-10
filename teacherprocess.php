<?php

$mysqli = new mysqli('localhost', 'root', 'password', 'regis');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM admin");
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['teach_id'] ?></td>
            <td><?php echo $row['firstname'] ?></td>
            <td><?php echo $row['lastname'] ?></td>
          <td><?php echo $row['courseid'] ?></td>
            <td><?php echo $row['password'] ?></td>
        </tr>
        <?php
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);

    if ($input['action'] == 'edit') {

      $mysqli->query("UPDATE admin SET teach_id='" . $input['teach_id'] . "',firstname='" . $input['firstname'] . "', lastname='" . $input['lastname'] . "', password='" . $input['password'] . "' WHERE id='" . $input['id'] . "' ");
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
