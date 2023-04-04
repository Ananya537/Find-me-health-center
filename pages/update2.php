<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
</body>
<?php
session_start();
$server_name="localhost";
$username="root";
$password="";
$database_name="health_center";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
 die("Connection Failed:" . mysqli_connect_error());
 exit;

}

else
{ 
  if(isset($_POST['update']))
  { 

      $user_email=$_SESSION['user_email'];
      $user_info1=$_SESSION['user_info'];
      $user_info=explode(';', $user_info1);
      $hospital = $_POST['hospital'];
      $name2 = $_POST['name2'];
      $date = $_POST['date'];
      $time = $_POST['time'];
      $sql_query = "SELECT * FROM user_info  WHERE hospital='$hospital' and date='$date' and time='$time' ";
      $result=mysqli_query($conn, $sql_query);
      if (mysqli_num_rows($result) > 0)
      {
          mysqli_close($conn);
          echo '<script>alert("Sorry, the time slot is already booked on this day")</script>';
          echo "<script> location.href='update1.php'; </script>";
          mysqli_close($conn);
          exit;  
      }
      $sql_query = "UPDATE user_info SET name='$name2' , hospital='$hospital',date='$date',time='$time' WHERE username='$user_email' and name='$user_info[0]' and hospital='$user_info[1]' and date='$user_info[2]' and time='$user_info[3]' ";
      mysqli_query($conn, $sql_query);
      echo '<script>alert("Your appointment is booked")</script>';
      echo "<script> location.href='update_delete.php'; </script>";
    }

    if(isset($_POST['emp_update']))
   { 
      $emp_info1=$_SESSION['emp_info'];
      $emp_info=explode(';', $emp_info1);
      $hospital = $_POST['hospital'];
      $name2 = $_POST['name2'];
      $date = $_POST['date'];
      $time = $_POST['time'];
      $sql_query = "SELECT * FROM user_info  WHERE hospital='$hospital' and date='$date' and time='$time' ";
      $result=mysqli_query($conn, $sql_query);
      if (mysqli_num_rows($result) > 0)
      {
          mysqli_close($conn);
          echo '<script>alert("Sorry, the time slot is already booked on this day")</script>';
          echo "<script> location.href='update1.php'; </script>";
          mysqli_close($conn);
          exit;  
      }
      $sql_query = "UPDATE user_info SET name='$name2' , hospital='$hospital',date='$date',time='$time' WHERE username='$emp_info[4]' and name='$emp_info[0]' and hospital='$emp_info[1]' and date='$emp_info[2]' and time='$emp_info[3]' ";
      mysqli_query($conn, $sql_query);
      echo '<script>alert("Your appointment is booked")</script>';
      echo "<script> location.href='emp_update.php'; </script>";
    }
  

}
?>
</html>