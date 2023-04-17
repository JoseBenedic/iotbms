<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// retrieve data from the database
$sql = "SELECT pH, created_at FROM iot_tbl";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // add data to the array
        $data[] = array(
            "pH" => $row["pH"],
            "created_at" => $row["created_at"]
        );
    }
}

// encode data in JSON format
$json_data = json_encode($data);

// close connection
$conn->close();

// output data as JSON
header('Content-Type: application/json');
echo $json_data;
?>
