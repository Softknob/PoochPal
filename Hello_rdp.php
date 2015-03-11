<html>

<head>

<title></title>

</head>

<body>
<!--<h1>My first PHP page</h1>-->

<?php
//echo "Hello World!";
?>

<?php
$servername = 
$username = 
$password = 
$dbname = 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully <br>";


//$sql = "SELECT `pk`,`lat`,`lon` FROM `dog_table`";
$sql = "SELECT * FROM `dog_table`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //headers
	 echo  "pk, lat,     lon       , timestamp, imageURL, Details, Incident_type <br>";
	
	// output data of each row
    while($row = $result->fetch_assoc()) {
        echo  $row["pk"].", "
		.$row["lat"]. ", "
		.$row["lon"]. ", "
		.$row["timestamp"]. ", "
		.$row["imageURL"]. ", "
		.$row["Details"]. ", "
		.$row["Incident_type"]. "<br>";
        //echo "dogs ". "<br>";
    }
}else {
    //echo "0 results";
}
$conn->close();
?>
</body>

</html>
