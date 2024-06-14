<?php
header('Content-Type: application/json');

$host = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'db_brt'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT year, total_annual_passengers, average_daily_passengers FROM passenger_statistics ORDER BY year";
$result = $conn->query($query);

$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>
