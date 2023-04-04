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
  $user_email=$_SESSION['user_email'];
  $user_hospital = $_SESSION['hospital_name'];
  $name2 = $_POST['name2'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $sql_query = "SELECT * FROM user_info  WHERE hospital='$user_hospital' and date='$date' and time='$time' ";
  $result=mysqli_query($conn, $sql_query);
  if (mysqli_num_rows($result) > 0)
  {
      mysqli_close($conn);
      echo '<script>alert("Sorry, the time slot is already booked on this day")</script>';
      echo "<script> location.href='center_search2.php'; </script>";
      mysqli_close($conn);
      exit;  
  }

  $sql_query = "INSERT INTO user_info (username,name,hospital,date,time)
  VALUES ('$user_email','$name2','$user_hospital','$date','$time')";
  mysqli_query($conn, $sql_query);
  echo '<script>alert("Your appointment is booked")</script>';
  echo "<script> location.href='user_page.php'; </script>";
  

}
?>
</html>