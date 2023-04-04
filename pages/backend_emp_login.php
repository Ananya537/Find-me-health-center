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

}

if(isset($_POST['save']))
{ 
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $sql_query = "SELECT * FROM emp_id WHERE username = '$user' AND password = '$pass' ";
  $result = mysqli_query($conn, $sql_query);
    
  if (mysqli_num_rows($result) > 0)
  {
        $_SESSION['emp_email'] = $user;
        echo "<script> window.open('emp_page.php', '_blank');
        </script>";
        mysqli_close($conn);
        exit;   
  }

  else 
  {
      mysqli_close($conn);
      echo '<script>alert("Wrong Email id or Password")</script>';
      echo "<script> location.href='emp_login.html'; </script>";
      mysqli_close($conn);
      exit;    
  }
}
?>
</html>