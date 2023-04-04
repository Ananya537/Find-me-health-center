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
    <link rel="stylesheet" href="user_page.css">
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

    $user_email=$_SESSION['user_email'];
    $sql_query = "SELECT * FROM user_id WHERE username = '$user_email'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_assoc($result);
    $user_name = $row["name"];

?>

<body>

    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="" class="logo">Healthtastic<span>.</span></a>

        <nav class="navbar">
            <a href="user_page.php">home</a>
            <a href="center_search2.php">New Booking</a>
            <a href="update_delete.php">Update Booking</a>
            <a href="user_contact.php">contact</a>
        </nav>

        <div class="icons">   
            <!---<a href="#" class="fas fa-user" onclick="toggleMenu()"-->
            <img src="../images/user_dropdown.png" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../images/user_dropdown.png">
                        <?php  echo "<h3>Welcome $user_name!</h3>";  ?>
                    </div>
                    <hr>
                    <a href="user_page.php" class="sub-menu-link">
                        <img src="../images/user_home.png">
                        <p>Home</p>
                        <span></span>
                    <a href="user_contact.php" class="sub-menu-link">
                        <img src="../images/user_contact.png">
                        <p>Contact</p>
                        <span></span>
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
            window.location.href = "stu_login.html";
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


    <div class="info">
        <?php
            echo "<h1>Welcome $user_name!</h1>"; 
            echo "<h3>Email: $user_email<br></h3>";   
        ?>
        <hr>
    </div>

    <section class="new_reg">
        <?php
            echo "<br>";
            echo "<center> <h2> Upcoming Appointments </h2> </center>";
            $sql = "SELECT * FROM user_info WHERE username='$user_email'";
            $result = $conn->query($sql);
            echo "<table border='2'>";
            echo "<tr>";
            echo "<th>Name</th><th>Hospital</th><th>Date</th><th>Time</th> </tr>";
            $tmr = date('Y-m-d', strtotime('-1 day'));
            $count=0;
            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) 
                {
                    if($tmr<$row["date"])
                    {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["hospital"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";
                        echo "<td>" . $row["time"] . "</td></tr>"; 
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

    <section class="old_reg">
        <?php
            echo "<br>";
            echo "<center> <h2> Old Appointments </h2> </center>";
            $sql = "SELECT * FROM user_info WHERE username='$user_email'";
            $result = $conn->query($sql);
            echo "<table border='2'>";
            echo "<tr>";
            echo "<th>Name</th><th>Hospital</th><th>Date</th><th>Time</th> </tr>";
            $tmr = date('Y-m-d', strtotime('-1 day'));
            $count=0;
            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) 
                {
                    if($tmr>$row["date"])
                    {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["hospital"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";
                        echo "<td>" . $row["time"] . "</td></tr>"; 
                        $count=$count+1;
                    }                 
                }
                if($count===0)  
                {echo "<center>No old Appointments</center>";}
            } 
            else 
            {
                echo "<center>No old Appointments</center>";
            }
            echo "</table>";
        ?>
    </section>
    <section id="user_contact">
        <hr>
    </section>

</body>
</html>


