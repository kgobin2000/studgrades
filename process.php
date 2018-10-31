<?php

$mysqli = new mysqli('localhost', 'root', 'password', 'regis');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM stud_info");
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['stud_id'] ?></td>
            <td><?php echo $row['f_name'] ?></td>
            <td><?php echo $row['l_name'] ?></td>
            <td><?php echo $row['Class'] ?></td>
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

      $mysqli->query("UPDATE stud_info SET stud_id='" . $input['stud_id'] . "',f_name='" . $input['f_name'] . "', l_name='" . $input['l_name'] . "', password='" . $input['password'] . "', class='" . $input['class'] . "' WHERE id='" . $input['id'] . "' ");
      //$mysqli->query("INSERT INTO stud_info (stud_id, f_name, l_name,password,deleted) VALUES ('" . $input['stud_id'] . "','" . $input['f_name'] . "','" . $input['l_name'] . "','" . $input['password'] . "','0')");

        } else if ($input['action'] == 'delete') {
        $mysqli->query("DELETE FROM stud_info WHERE id='" . $input['id'] . "'");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE stud_info SET deleted=0 WHERE id='" . $input['id'] . "'");
    } else if ($input['action'] === 'add') {
      $a=$input['stud_id'];
      $b=$input['f_name'];
      $c=$input['l_name'];
      $d=$input['password'];
    $mysqli->query("INSERT INTO stud_info (stud_id, f_name, l_name,password,deleted) VALUES ('a','b','c','d','0')");
}

    mysqli_close($mysqli);

    echo json_encode($input);

}
?>
