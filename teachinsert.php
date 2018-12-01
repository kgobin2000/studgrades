<?php



  $teacherid = $_POST['teacherid'];
  $password = $_POST['password'];
  $formteach = $_POST['formteach'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $course = $_POST['course'];
  $course=serialize($course);
  $formteach=serialize($formteach);
  $host = "127.0.0.1";
  $dbusername = "root";
  $dbpassword = "password";
  $dbname = "regis";
  $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

  if (mysqli_connect_error())
  {
    die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
  }
  else
  {
    $test = "SELECT * FROM admin where teach_id = '$teacherid'";
    $res = mysqli_query($conn, $test);
    $count = mysqli_num_rows($res);
    if ($count == 1)
  {

      die ('1');
      console.log("falseeeeee");
    }
    else {



    $sql =  "INSERT INTO admin (teach_id, firstname, lastname, courseid, password,formteacher) VALUES ('$teacherid','$firstname','$lastname','$course','$password','$formteach');";

    $result=mysqli_query($conn,$sql);



    if ($result === TRUE) {
          die("insert successful");
        }
        else {

              die(mysqli_error($conn));

        }




         }


       die();
     }
?>
