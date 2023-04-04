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
    <link rel="stylesheet" href="confirm_booking.css">
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
        $info=$_POST['update'];
        $user_email=$_SESSION['user_email'];
        $_SESSION['user_info'] = $info;
        $sql_query = "SELECT * FROM user_id WHERE username = '$user_email'";
        $result = mysqli_query($conn, $sql_query);
        $row = mysqli_fetch_assoc($result);
        $user_name = $row["name"];
        
    ?>



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


    <form action="update2.php" method="post">
      <h1>Sign Up</h1>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name2" required>
      <label for="name">Hospital:</label>
      <select type="text" name="hospital" value="hospital">
      <option value="">Select hospital</option>
        <option value="Manipal Hospital">Manipal Hospital</option>
        <option value="Apollo Hospital">Apollo Hospital</option>
        <option value="Sagar Hospital">Sagar Hospital</option>
        <option value="Fortis Hospital">Fortis Hospital</option>
        <option value="Sakra World Hospital">Sakra World Hospital</option>
        <option value="Columbia Asia Hospital">Columbia Asia Hospital</option>
        <option value="Navachethana Hospital">Navachethana Hospital</option>
        <option value="K K Hospital">K K Hospital</option>
        <option value="Omega Multispeciality Hospital">Omega Multispeciality Hospital</option>
        <option value="Pavan Hospital">Pavan Hospital</option>
        <option value="Anupamaa Hospital">Anupamaa Hospital</option>
        <option value="Motherhood Hospital">Motherhood Hospital</option>
        <option value="Arka Hospital">Arka Hospital</option>
        <option value="Mallige Hospital">Mallige Hospital</option>
        <option value="Zion Hospital">Zion Hospital</option>
        <option value="Shathayu Ayurveda Clinic">Shathayu Ayurveda Clinic</option>
        <option value="Aveksha Hospital">Aveksha Hospital</option>
        <option value="Om Shakthi Hospital">Om Shakthi Hospital</option>
        <option value="North Bangalore Hospital">North Bangalore Hospital</option>
        <option value="SLV Prasad Hospital">SLV Prasad Hospital</option>
      </select>

      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required>
      <script>
        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        var maxDate = new Date();
        maxDate.setDate(maxDate.getDate() + 30);
        document.getElementById("date").setAttribute('min', tomorrow.toISOString().split('T')[0]);
        document.getElementById("date").setAttribute('max', maxDate.toISOString().split('T')[0]);
      </script>
      <label for="time">Time:</label>
      <select id="time" name="time" required>
        <option value="">Select an hour</option>
        <option value="09:00">09:00 AM</option>
        <option value="10:00">10:00 AM</option>
        <option value="11:00">11:00 AM</option>
        <option value="12:00">12:00 PM</option>
        <option value="13:00">01:00 PM</option>
        <option value="14:00">02:00 PM</option>
        <option value="15:00">03:00 PM</option>
        <option value="16:00">04:00 PM</option>
        <option value="17:00">05:00 PM</option>
      </select>
      <!--type="submit"-->
      <button type="submit" onclick="printfun()" name="update">Sign Up</button>
    </form>


  </body>
</html>
