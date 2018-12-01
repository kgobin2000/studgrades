<?php
  session_start();

  $teach_id = $_POST['teach_id'];
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

         $sql = "SELECT * FROM admin WHERE teach_id ='$teach_id' AND password='$password'";
         $res = mysqli_query($connect, $sql);
         $count = mysqli_num_rows($res);
         $row = mysqli_fetch_array($res);
         if($count == 1)
         {
              $lastname = $row['lastname'];
              $firstname = $row['firstname'];
              $course=$row['courseid'];
             $_SESSION['teach_id'] = $teach_id;
             $_SESSION['lastname'] = $lastname;
             $_SESSION['firstname'] = $firstname;
             $_SESSION['course'] = $course;
             $_SESSION['formteacher'] = $row['formteacher'];
              die("1");
           }
           else
            {
          die();
           }


         }

?>
