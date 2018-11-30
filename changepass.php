<?php

session_start();

if ( isset( $_SESSION['teach_id']) && isset( $_SESSION['firstname']) && isset( $_SESSION['lastname']) && isset( $_SESSION['course'])  && isset( $_POST['oldpass']) && isset( $_POST['newpass']) )
{
  $oldpass = $_POST['oldpass'];
  $newpass = $_POST['newpass'];
  $teach_id=$_SESSION['teach_id'];
}
else
{
echo "<script>window.location.replace('teachlogin.php');</script>";
}




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

         $sql = "SELECT * FROM admin WHERE teach_id ='$teach_id' AND password='$oldpass'";
         $res = mysqli_query($connect, $sql);
         $count = mysqli_num_rows($res);
         $row = mysqli_fetch_array($res);
         if($count == 1)
         {
            $sql = "UPDATE admin SET password='$newpass' WHERE teach_id='$teach_id'";
            $res = mysqli_query($connect, $sql);

              die("1");
           }
           else
            {
          die();
           }


         }

?>
