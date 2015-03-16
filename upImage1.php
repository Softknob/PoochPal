<?php
$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . "kitten1.jpg";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$servername = 
$username = 
$password = 
$dbname = 

/// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO dog_table (lat, lon, userName, timeStamp, details, incidentType)
VALUES (".$_POST["lat"].", ".$_POST["lon"].", '".$_POST["user"]."', '".$_POST["time"]."', '".$_POST["message"]."', '".$_POST["type"]."')"; 

if ($conn->query($sql) === TRUE) {
	$last_pk = $conn->insert_id;
    echo "New record created successfully Insert pk is: ".$last_pk. "<br>";
	$target_file = $target_dir . "dog" .$last_pk.".".$imageFileType;
	$imageURL = "dog" .$last_pk.".".$imageFileType;
	echo "New file URL: ".$target_file. "<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/* $sql ="SELECT pk FROM dog_table where timeStamp ='".$_POST["time"]."'";
	echo $sql; */


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".". "<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.". "<br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.". "<br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large (size limit 500kb).". "<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.". "<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.". "<br>";
// update database with url
		
		$sql = "UPDATE dog_table SET imageURL ='".$imageURL."' WHERE pk = ".$last_pk;
		echo $sql. "<br>";
		if ($conn->query($sql) === TRUE) {
			echo "image URL updated successfully". "<br>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
    } else {
        echo "Sorry, there was an error uploading your file.". "<br>";
    }
}
 $conn->close(); 
 echo "<script>window.opener.location.reload();
 window.close();</script>";
?>