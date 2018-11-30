<?php
  session_start();

  $stud_id = $_POST['stud_id'];
  $password = $_POST['password'];


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
      else
      {

         $sql = "SELECT * FROM stud_info WHERE stud_id ='$stud_id' AND password='$password'";
         $res = mysqli_query($connect, $sql);
         $count = mysqli_num_rows($res);
         $row = mysqli_fetch_array($res);
         if($count == 1)
         {
              $l_name = $row['l_name'];
              $f_name = $row['f_name'];
              $course=$row['courseid'];
             $_SESSION['stud_id'] = $stud_id;
             $_SESSION['l_name'] = $l_name;
             $_SESSION['f_name'] = $f_name;

              die("1");
           }
           else
            {
          die();
           }


         }

?>
