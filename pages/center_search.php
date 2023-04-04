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
    <link rel="stylesheet" href="center_search.css">

</head>
<body>

<!-- header section starts  -->
<header>

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="../index.html" class="logo">Healthtastic<span>.</span></a>

    <nav class="navbar">
        <a href="../index.html#home">home</a>
        <a href="../index.html#about">about</a>
        <a href="../index.html#products">health centers</a>
        <a href="../index.html#review">review</a>
        <a href="../index.html#contact">contact</a>
    </nav>

    <div class="icons">   
        <!---<a href="#" class="fas fa-user" onclick="toggleMenu()"-->
        <img src="../images/user_dropdown.png" class="user-pic" onclick="toggleMenu()">
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="../images/user_dropdown.png">
                    <h3>LOGIN</h3>
                </div>
                <hr>
                <a href="stu_login.html" class="sub-menu-link">
                    <img src="../images/old_user_login.png">
                    <p>User Login</p>
                    <span></span>
                </a>
                <a href="sign_up.html" class="sub-menu-link">
                    <img src="../images/new_user_login1.png">
                    <p>User Sign up</p>
                    <span></span>
                </a>
                <a href="emp_login.html" class="sub-menu-link">
                    <img src="../images/employee_login.png">
                    <p>Employee Login</p>
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



<!--<input type="text" id="searchBar" placeholder="Search hospitals...">-->
<div class="input-container">
    <input type="text" name="text" id="searchBar" class="input" placeholder="Search hospitals...">
    <span class="icon"> 
      <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    </span>
  </div>
	
	<!-- The hospital list -->
	<ul id="hospitalList">
    <?php
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
        $sql_query = "SELECT * FROM hospital";
        $result = mysqli_query($conn, $sql_query);
        
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<div class='item'>";
          
          $image_path = $row['image_name'];
          echo "<img src='$image_path' alt='Item Image'>";
          echo "<div class='text'>";
          
          $button_value = $row['name'];
          echo "<h3>$button_value</h3><br><p>". $row['address'] ."</p>";
          echo "<br><p>". $row['tests'] ."</p>";
          echo "<a href='sign_up.html'><button></button></a>";
          echo "</div>";
          echo "</div>";
          echo "</li>";
    }
    ?>

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