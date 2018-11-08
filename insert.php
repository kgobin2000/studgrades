<?php



  $stud_id = $_POST['stud_id'];
  $password = $_POST['password'];
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $class = $_POST['Class'];
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
    $test = "SELECT * FROM stud_info where stud_id = '$stud_id'";
    $res = mysqli_query($conn, $test);
    $count = mysqli_num_rows($res);
    if ($count == 1)
  {

      die ('1');
      console.log("falseeeeee");
    }
    else {


    $sql = "INSERT INTO stud_info (stud_id, f_name, l_name, Class, password) VALUES ('$stud_id','$f_name','$l_name','$class','$password');";
    $sql .= "INSERT INTO stud_rec (stud_id, course, t1, t2, t3) VALUES ('$stud_id','Mathematics','-','-','-');";
    $sql .= "INSERT INTO stud_rec (stud_id, course, t1, t2, t3) VALUES ('$stud_id','Integrated Science','-','-','-');";
    $sql .= "INSERT INTO stud_rec (stud_id, course, t1, t2, t3) VALUES ('$stud_id','Biology','-','-','-');";
    $sql .= "INSERT INTO stud_rec (stud_id, course, t1, t2, t3) VALUES ('$stud_id','Physics','-','-','-');";
    $sql .= "INSERT INTO stud_rec (stud_id, course, t1, t2, t3) VALUES ('$stud_id','Chemistry','-','-','-');";
    $sql .= "INSERT INTO stud_rec (stud_id, course, t1, t2, t3) VALUES ('$stud_id','Principles of Accounts','-','-','-');";
    $sql .= "INSERT INTO stud_rec (stud_id, course, t1, t2, t3) VALUES ('$stud_id','Principles of Business','-','-','-');";
    $sql .= "INSERT INTO stud_rec (stud_id, course, t1, t2, t3) VALUES ('$stud_id','Physical Education','-','-','-');";

    $result=mysqli_multi_query($conn,$sql);



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
