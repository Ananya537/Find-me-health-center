

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
        exit;
    }
    if(isset($_POST['delete']))
    { 

        $info=$_POST['delete'];
        $user_email=$_SESSION['user_email'];
        $info2 = explode(';', $info);
        
        
        $sql_query = "delete FROM user_info WHERE username = '$user_email' and name='$info2[0]' and hospital='$info2[1]' and date='$info2[2]' and time='$info2[3]' ";
        mysqli_query($conn, $sql_query);
        
        echo '<script>alert("Your appointment has been deleted")</script>';
        echo "<script> location.href='update_delete.php'; </script>";
    }
    if(isset($_POST['emp_delete']))
    { 

        $info=$_POST['emp_delete'];
        $info2 = explode(';', $info);
        
        
        $sql_query = "delete FROM user_info WHERE username = '$info2[4]' and name='$info2[0]' and hospital='$info2[1]' and date='$info2[2]' and time='$info2[3]' ";
        mysqli_query($conn, $sql_query);
        
        echo '<script>alert("Appointment has been deleted")</script>';
        echo "<script> location.href='emp_delete.php'; </script>";
    }
?>