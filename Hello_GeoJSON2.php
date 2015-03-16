

<?php

$servername = "localhost";
$username = "testU";
$password = "test";
$dbname = "rdp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully <br>";


//$sql = "SELECT `pk`,`lat`,`lon`,`imageURL` FROM `dog_table`";
$sql = "SELECT * FROM `dog_table`";

$result = $conn->query($sql);

# Build GeoJSON feature collection array
$geojson = array(
   'type'      => 'FeatureCollection',
   'features'  => array()
);

# Loop through rows to build feature arrays

if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
$feature = array(
        'type' => 'Feature', 
        'geometry' => array(
            'type' => 'Point',
            # Pass Longitude and Latitude Columns here
            'coordinates' => array($row['lon'], $row['lat'])
        ),
        # Pass other attribute columns here
        'properties' => array(
            'Details' => $row['details'],
			'URL' => $row['imageURL']
       //     'description' => $row['Description'],
       //     'sector' => $row['Sector'],
        //    'country' => $row['Country'],
        //    'status' => $row['Status'],
        //    'start_date' => $row['Start Date'],
         //   'end_date' => $row['End Date'],
         //   'total_invest' => $row['Total Lifetime Investment'],
         //   'usg_invest' => $row['USG Investment'],
        //    'non_usg_invest' => $row['Non-USG Investment']
            )
        );
    # Add feature arrays to feature collection array
    array_push($geojson['features'], $feature);
}
}
header('Content-type: application/json');
echo json_encode($geojson, JSON_NUMERIC_CHECK);
$conn->close();

?>
