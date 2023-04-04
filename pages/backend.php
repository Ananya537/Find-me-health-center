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

if(!$conn)
{
 die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{ 
  $name = $_POST['name'];
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $sql_query = "SELECT * FROM user_id WHERE username = '$user' ";
  $result = mysqli_query($conn, $sql_query);
    
  if (mysqli_num_rows($result) > 0)
  {
      mysqli_close($conn);
      echo '<script>alert("You are already registered")</script>';
      echo "<script> location.href='sign_up.html'; </script>";
      mysqli_close($conn);
      exit;  
  }

  else 
  {
      $sql_query = "INSERT INTO user_id (username,name,password)
      VALUES ('$user','$name','$pass')";

      if (mysqli_query($conn, $sql_query)) 
      {
        $_SESSION['user_name'] = $user;
        echo '<script>alert("New Details inserted successfully !")</script>';
        echo "<script> location.href='stu_login.html'; </script>";
        exit;
      } 
      else
        {
        echo '<script>alert("Error: Please try again later")</script>';
        echo "<script> location.href='sign_up.html'; </script>";
        mysqli_close($conn);
        exit;
      }  
  }
}
?>
</html>