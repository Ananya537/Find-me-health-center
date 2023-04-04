<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Get list of Best hospitals according to your priorities here</title>
    <link rel="icon" href= "../images/logo.jpeg"  >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="search_filter.css">

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
    /*echo $user_name . " is currently logged in.";*/
?>


    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">Healthtastic<span>.</span></a>

        <nav class="navbar">
            <a href="user_page.php">home</a>
            <a href="#profile">Profile</a>
            <a href="new_booking.php">New Booking</a>
            <a href="#contact">contact</a>
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
                    <a href="#profile" class="sub-menu-link">
                        <img src="../images/old_user_login.png">
                        <p>Profile</p>
                        <span></span>
                    <!--<a href="stu_login.html" class="sub-menu-link">-->
                    <a href="#" class="sub-menu-link" onclick="signout()">
                        <img src="../images/old_user_login.png">
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
    let subMenu = document.getElementById("subMenu");
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>


<div class="input-container">
    <input type="text" name="text" id="searchBar" class="input" placeholder="Search hospitals...">
    <span class="icon"> 
      <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    </span>
  </div>
	
	<!-- The hospital list -->
	<ul id="hospitalList">

		<li>
            <div class="item">
              <img src="../images/img-1.jpeg" alt="Item 1">
              <div class="text">
                <h3>Manipal Hospital</h3><br><p>98, HAL Old Airport Rd, Kodihalli, Bengaluru, Karnataka 560017</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li>

          <li>
            <div class="item">
              <img src="../images/img-2.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Apollo Hospital</h3><br><p>154, IIM, 11, Bannerghatta Main Rd, opposite Krishnaraju Layout, Krishnaraju Layout, Amalodbhavi Nagar, Naga, Bengaluru, Karnataka 560076</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-3.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Sagar Hospital</h3><br><p>9/A, Swagath Rd, SR Krishnappa Garden, Hombegowda Nagar, Bengaluru, Karnataka 560041</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-4.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Fortis Hospital</h3><br><p>154/9, Bannerghatta Main Rd, opposite IIM-B, Sahyadri Layout, Panduranga Nagar, Bengaluru, Karnataka 560076</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-5.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Sakra World Hospital</h3><br><p>SY NO 52/2 & 52/3, Devarabeesanahalli, Varthur Hobli Opp Intel, Outer Ring Rd, Marathahalli, Bengaluru, Karnataka 560103</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-6.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Columbia Asia Hospital</h3><br><p>2H74+M95, 1st Main Rd, Rajajinagar, Yeshwanthpur, Bengaluru, Karnataka 560055</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-7.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Navachethana Hospital</h3><br><p>17/A2, 3rd B Cross Road, Opposite RWF Rail Wheel Factory GM Admin Office, A Sector, RWF West Colony, Yelahanka New Town, Bengaluru, Karnataka 560064</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-8.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>K K Hospital</h3><br><p>9, A-1, A-2, 9th A Cross Rd, opposite M.E.C School, Sector A, Yelahanka Satellite Town, Yelahanka New Town, Bengaluru, Karnataka 560106</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-9.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Omega Multispeciality Hospital</h3><br><p>NO.1236, WARD NO:4, B SECTOR, HIG 1&2 PHASE, Yelahanka New Town, Bengaluru, Karnataka 560064</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-10.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Pavan Hospital</h3><br><p>10, J J Towers, 3rd MAIN Road,, GANDHI NAGAR, YELAHANKA OLD TOWN, Bengaluru, Karnataka 560064</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-11.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Anupamaa Hospital</h3><br><p> 80 Feet Road, 377/V, Major Akshay Girish Kumar Rd, Yelahanka Satellite Town, Yelahanka New Town, Bengaluru, Karnataka 560064</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-12.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Motherhood Hospital</h3><br><p>8312/164, Survey 164, Neeladri Rd, Karuna Nagar, Electronics City Phase 1, Electronic City, Bengaluru, Karnataka 560100</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-13.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Arka Hospital</h3><br><p>HIG 804, 3rd floor major unnikrishnan road 3 rd phase, Yelahanka New Town, Bengaluru, Karnataka 560064</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-14.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Mallige Hospital</h3><br><p>31/32, Crescent Rd, Madhava Nagar, Gandhi Nagar, Bengaluru, Karnataka 560001</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-15.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Zion Hospital</h3><br><p>2nd Cross Road, 83/1, Kammanahalli Main Rd, behind Doctors Diagnostic Centre, Keerthi Layout, St Thomas Town, Bengaluru, Karnataka 560084</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-16.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Shathayu Ayurveda Clinic</h3><br><p>578, 4th G Cross, Sai baba temple road, CBI Road, HMT Layout, RT Nagar, Bengaluru, Karnataka 560032</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-17.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Aveksha Hospital</h3><br><p>Varadarajaswamy Layout, 122, M.S. Palya Rd, Singapura, Bengaluru, Karnataka 560097</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-18.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>Om Shakthi Hospital</h3><br><p>Bagalur Main Rd, Vinayak Nagar, Kattigenahalli, Bengaluru, Karnataka 560063</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-19.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>North Bangalore Hospital</h3><br><p>Kalyananagara, SY No.104, 4th, G Street, 125/1, 125/2, Kalyan Residency Road, Bengaluru, Karnataka 560043</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

          <li>
            <div class="item">
              <img src="../images/img-20.jpeg" alt="Item 2" width="50rem">
              <div class="text">
                <h3>SLV Prasad Hospital</h3><br><p>Industrial Area, 4/38, 1st Main Rd, 4th Phase, Yelahanka New Town, Bengaluru, Karnataka 560064</p>
                <a href="sign_up.html"><button></button></a>
              </div>
            </div>
          </li> 

	</ul>
	
	<!-- The script to filter the hospital list as you type -->
	<script>
		// Get the search bar and hospital list
		var searchBar = document.getElementById("searchBar");
		var hospitalList = document.getElementById("hospitalList");
		var hospitals = hospitalList.getElementsByTagName("li");

		// Add an event listener to the search bar
		searchBar.addEventListener("input", function() {
			// Get the search query
			var query = searchBar.value.toLowerCase();

			// Loop through the hospital list items
			for (var i = 0; i < hospitals.length; i++) {
				var hospital = hospitals[i];

				// Check if the hospital name contains the search query
				if (hospital.textContent.toLowerCase().indexOf(query) > -1) {
					hospital.classList.remove("hidden");
				} else {
					hospital.classList.add("hidden");
				}
			}
		});
	</script>

</body>
</html>