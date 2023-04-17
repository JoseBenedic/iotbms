<html>
<body>

<?php

$dbname = 'iot_db';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

echo "Connection Success!<br><br>";

$pH = $_GET["pH_value"];
$temp = $_GET["temperature"];
$gas = $_GET["MQ4_value"];
$psi = $_GET["pressure_psi"];
$pa = $_GET["pressure_pa"];


$query = "IINSERT INTO iot_tbl (pH, temp, gas, psi, pa) VALUES ('$pH','$temp','$gas','$psi','$pa')";
$result = mysqli_query($connect,$query);

echo "Insertion Success!<br>";

?>
</body>
</html>
