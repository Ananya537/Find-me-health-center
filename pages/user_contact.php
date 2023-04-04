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
    <style>
        .data {
			background-color:rgb(198, 218, 213) ;
			/*box-shadow: 10px 10px 20px black;*/
			font-family: Verdana, Geneva, Tahoma, sans-serif;
			padding: 2px 80px;
			margin: 105px auto 20px auto;
			color: black;
            float: center;
            width: 95%;
            border-radius: 20px;
            text-align:justify;
		}

        .data h1{
            text-align: center;
            color: #e84393;
            line-height: 1.5;
            font-size: 50px;
        }

        .data h3{
            color: #662d4a;
            padding: 0px 50px;
            font-weight: 100;
            line-height: 1.5;
            font-size: 15px;
        }
    </style>
</head>
<body>

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

<!-- header section starts  -->
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

<div class = "data">
    
    <section class="contact" id="contact">

        <h1 class="heading"> <span> contact </span> us </h1>
    
        <div class="row">
    
            <form action="mailto:dassiananya@gmail.com" method="post" enctype="text/plain">
                <input type="text" name="name" value="<?php echo $user_name ?>" placeholder="<?php echo $user_name ?>" class="box" readonly>
                <input type="email" name="email" value="<?php echo $user_email ?>" placeholder="<?php echo $user_email ?>" class="box" readonly>
                <input type="number" name="number" placeholder="number" class="box" required>
                <textarea name="message" class="box" placeholder="message" id="" cols="30" rows="10" required></textarea>
                <input type="submit" value="send message" class="btn">
            </form>
    
    
        </div>
    
    </section>
    
    <!-- contact section ends -->
    
    <!-- footer section starts  -->
    <hr size="3px" color="green";>
    <section class="footer">
    
        <div class="box-container">
    
            <div class="box" style="margin-left: 65px;">
                <h3>quick links</h3>
                <a href="user_page.php">Home</a>
                <a href="center_search2.php">New Booking</a>
                <a href="update_delete.php">Update Booking</a>
                <a href="user_contact.php">contact</a>
            </div>
    
            <!--<div class="box">
                <h3>extra links</h3>
                <a href="pages/stu_login.html">my account</a>
                <a href="pages/sign_up.html">new account</a>
                <a href="pages/emp_login.html">employee login</a>
            </div>-->
    
            <div class="box">
                <h3>locations in bangalore</h3>
                <a href="#">yelahanka</a>
                <a href="#">old airport road</a>
                <a href="#">bellandur</a>
                <a href="#">yeshwanthpur</a>
    
            </div>
    
            <div class="box" style="margin-left: 80px;">
                <h3>contact info</h3>
                <a href="#">+123-456-7890</a>
                <a href="#">dassiananya@gmail.com</a>
                <a href="#">bangalore, india - 560064</a>
                <img src="../images/payment.png" alt="">
            </div>
    
        </div>
    
       
    
    </section>
    
</div>

<script>
    let subMenu = document.getElementById("subMenu");
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>

</body>
</html>