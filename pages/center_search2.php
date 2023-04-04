<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Get list of Best hospitals according to your priorities here</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href= "../images/logo.jpeg"  >

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="center_search2.css">

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


<script>
    let subMenu = document.getElementById("subMenu");
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>



<!--<input type="text" id="searchBar" placeholder="Search hospitals...">-->
<div class="input-container">
    <input type="text" name="text" id="searchBar" class="input" placeholder="Search hospitals...">
    <button class="button_top" onclick="toggleCheckboxList()">Filter</button>
    <div id="checkboxes" class="checkbox-list">
      <label>
        <input type="checkbox" id="option1" value="Diabetes"> Diabetes
      </label>
      <br>
      <label>
        <input type="checkbox" id="option2" value="Blood Pressure"> Blood Pressure
      </label>
      <br>
      <label>
        <input type="checkbox" id="option3" value="ECG"> ECG
      </label>
      <br>
      <label>
        <input type="checkbox" id="option4" value="CT Scan"> CT Scan
      </label>
      <br>
      <label>
        <input type="checkbox" id="option5" value="MRI Scan"> MRI Scan
      </label>
      <br>
      <label>
        <input type="checkbox" id="option6" value="Eye Test"> Eye Test
      </label>
      <br>
      <label>
        <input type="checkbox" id="option7" value="Ultrasound"> Ultrasound
      </label>
      <br>
      <label>
        <input type="checkbox" id="option8" value="Pregnancy Test"> Pregnancy Test
      </label>
      <br>
      <label>
        <input type="checkbox" id="option9" value="X-Ray"> X-Ray
      </label>
      <br>
      <label>
        <input type="checkbox" id="option10" value="RT PCR Test"> RT PCR Test
      </label>
      <br>
      <label>
        <button id="applyButton" class="apply" onclick="togglebuttonList()">Apply</button>
      </label>
    </div>
    
    <span class="icon"> 
      <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    </span>
  </div>
  <form action="confirm_booking.php" method="post">
	<!-- The hospital list -->
	<ul id="hospitalList">
    <?php
    $sql_query = "SELECT * FROM hospital";
    $result = mysqli_query($conn, $sql_query);
    
    while ($row = $result->fetch_assoc()) {
      echo "<li>";
      echo "<div class='item'>";
      // Get the image path from the database
      $image_path = $row['image_name'];
      echo "<img src='$image_path' alt='Item Image'>";
      echo "<div class='text'>";
      // Set the button value to the name row
      $button_value = $row['name'];
      echo "<h3>$button_value</h3><br><p>". $row['address'] ."</p>";
      echo "<br><p>". $row['tests'] ."</p>";
      echo "<button type='submit' name='button_value' value='$button_value'></button>";
      echo "</div>";
      echo "</div>";
      echo "</li>";
  }
      ?>      
	</ul>
  </form>
	
	<!-- The script to filter the hospital list as you type -->
	<script>

        function toggleCheckboxList() 
        {
            var checkboxList = document.getElementById("checkboxes");
            if (checkboxList.style.display === "none") {
            checkboxList.style.display = "block";
            } else {
            checkboxList.style.display = "none";
            }
        }

        function toggleregister() 
        {
            var checkboxList = document.getElementById("checkboxes");
            if (checkboxList.style.display === "none") {
            checkboxList.style.display = "block";
            } else {
            checkboxList.style.display = "none";
            }
        }



		const option1 = document.getElementById("option1");
		const option2 = document.getElementById("option2");
		const option3 = document.getElementById("option3");
        const option4 = document.getElementById("option4");
        const option5 = document.getElementById("option5");
        const option6 = document.getElementById("option6");
        const option7 = document.getElementById("option7");
        const option8 = document.getElementById("option8");
        const option9 = document.getElementById("option9");
        const option10 = document.getElementById("option10");
        const applyButton = document.getElementById("applyButton");
		var searchBar = document.getElementById("searchBar");
		var hospitalList = document.getElementById("hospitalList");
		var hospitals = hospitalList.getElementsByTagName("li");

    var i=0;
		searchBar.addEventListener("input", function() 
    {
			var query = searchBar.value.toLowerCase();
			for (i = 0; i < hospitals.length; i++) 
      {
				var hospital = hospitals[i];
				if (hospital.textContent.toLowerCase().indexOf(query) > -1) 
           {hospital.classList.remove("hidden");}
		    else 
            {hospital.classList.add("hidden");}
			}
		});


    



        function togglebuttonList()
        {
            let checkedWords = [];
            if (option1.checked) 
                {checkedWords.push(option1.value);}
            if (option2.checked) 
                {checkedWords.push(option2.value); }
            if (option3.checked) 
                {checkedWords.push(option3.value);}
            if (option4.checked) 
                {checkedWords.push(option4.value);}
            if (option5.checked) 
                {checkedWords.push(option5.value);}
            if (option6.checked) 
                {checkedWords.push(option6.value);}
            if (option7.checked) 
                {checkedWords.push(option7.value);}
            if (option8.checked) 
                {checkedWords.push(option8.value);}
            if (option9.checked) 
                {checkedWords.push(option9.value);}
            if (option10.checked) 
                {checkedWords.push(option10.value);}
            l=checkedWords.length
            if (l > 0) 
            {
                for (i = 0; i < hospitals.length; i++) 
                {
                    var hospital = hospitals[i];
                    wordsFound = [];
                    for (let i = 0; i < l; i++) 
                    {
                        if (hospital.textContent.indexOf(checkedWords[i]) > -1) 
                        {
                            wordsFound.push(checkedWords[i]);
                        }
                    }
                    if (wordsFound.length==l)
                        {hospital.classList.remove("hidden");}  
                        
                    else 
                        {hospital.classList.add("hidden");}  
                }
            } 
        }
	</script>

</body>
</html>