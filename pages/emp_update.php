<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Get list of Best hospitals according to your priorities here</title>
    <link rel="icon" href= "../images/logo.jpeg"  >

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="update_delete.css">
</head>

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
    $emp_email=$_SESSION['emp_email']

?>

<body>

    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="" class="logo">Healthtastic<span>.</span></a>

        <nav class="navbar">
            <a href="emp_page.php">home</a>
            <a href="emp_addhospital.php">Add Hospital</a>
            <a href="emp_delete.php">Delete Booking</a>
            <a href="emp_update.php">Update Booking</a>
            <a href="emp_info.php">User info</a>
        </nav>

        <div class="icons">   
            <!---<a href="#" class="fas fa-user" onclick="toggleMenu()"-->
            <img src="../images/employee_login.png" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../images/employee_login.png">
                        <?php  echo "<b>$emp_email</b>";  ?>
                    </div>
                    <hr>
                    <!--<a href="stu_login.html" class="sub-menu-link">-->
                    <a href="#" class="sub-menu-link" onclick="signout()">
                        <img src="../images/user_signout.png">
                        <p>Sign out</p>
                        <span></span>
                    </a>
                    </hr>
                </div>
            </div>    
            </a>
        </div>

    </header>

    <script>
        function signout() {
        let text;
        if (confirm("SIGNOUT\nAre u sure ?") == true) {
            window.location.href = "emp_login.html";
        } 
        document.getElementById("demo").innerHTML = text;
        }
    </script>

    <script>
        let subMenu = document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>

<section class="new_reg">
    <?php
        echo "<br>";
        echo "<center> <h2> Upcoming Appointments </h2> </center>";
        $sql = "SELECT * FROM user_info";
        $result = $conn->query($sql);
        echo "<table border='2'>";
        echo "<tr>";
        echo "<th>Email</th><th>Name</th><th>Hospital</th><th>Date</th><th>Time</th><th>Delete</th></tr>";
        $tmr = date('Y-m-d');
        $count=0;
        if ($result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                if($tmr<$row["date"])
                {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["hospital"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["time"] . "</td>";
                    $list=array($row["name"],$row["hospital"],$row["date"],$row["time"],$row["username"]);
                    $var1=implode(';', $list);
                    echo "<td>";
                    echo "<form method='post' action='emp_update2.php'>";
                    echo "<input type='hidden' name='update' value='$var1'>";
                    echo "<button type='submit'>Update</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                    $count=$count+1;
                }                 
            }
            if($count===0)  
            {echo "<center>No upcoming Appointment</center>";}
        } 
        else 
        {
            echo "<center>No upcoming Appointment</center>";
        }
        echo "</table>";
    ?>
</section>

</body>
</html>