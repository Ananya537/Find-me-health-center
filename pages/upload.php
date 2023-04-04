<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image_name = $_POST["name"];
    $image_location = $_POST["location"];
    $image_tests = $_POST["tests"];

    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "health_center";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the last image number in the database
    $sql = "SELECT COUNT(name) as max_number FROM hospital";
    $result = mysqli_query($conn, $sql);

    if ($result) 
    {
        $row = mysqli_fetch_assoc($result);
        $image_number = $row["max_number"] + 1;
    } 
    else 
        {$image_number = 1;}


    // Upload image to "images" folder
    $target_dir = "images/";
    $target_file1 = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
    $target_file = $target_dir . 'img-' . $image_number. '.' . $imageFileType ;

    
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>alert("File is not an image")</script>';
        echo "<script> location.href='emp_addhospital.php'; </script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    /*if (file_exists($target_file)) {
        echo '<script>alert("Sorry, file already exists")</script>';
        echo "<script> location.href='emp_addhospital.php'; </script>"; 
        $uploadOk = 0;
    }*/

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo '<script>alert("Sorry, your file is too large")</script>';
        echo "<script> location.href='emp_addhospital.php'; </script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed")</script>';
        echo "<script> location.href='emp_addhospital.php'; </script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo '<script>alert("Sorry, your file was not uploaded")</script>';
        echo "<script> location.href='emp_addhospital.php'; </script>";

    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";

            // Insert the new image data into the database
            $sql = "INSERT INTO hospital (name, image_name, address, tests) VALUES ('$image_name', '$target_file','$image_location','$image_tests')";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("New image added successfully")</script>';
                echo "<script> location.href='emp_addhospital.php'; </script>";
            } else {
                echo '<script>alert("Error: please check connection")</script>';
                echo "<script> location.href='emp_addhospital.php'; </script>";
            }
        } else {
            echo '<script>alert("Sorry, there was an error uploading your file")</script>';
            echo "<script> location.href='emp_addhospital.php'; </script>";
        }
    }

    mysqli_close($conn);
}
?>
