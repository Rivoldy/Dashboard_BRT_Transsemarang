<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST['year'];
    $total_annual_passengers = $_POST['total_annual_passengers'];
    $average_daily_passengers = $_POST['average_daily_passengers'];

    $sql = "INSERT INTO passenger_statistics (year, total_annual_passengers, average_daily_passengers) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $year, $total_annual_passengers, $average_daily_passengers);

    if ($stmt->execute()) {
        echo "Record added successfully";
    } else {
        echo "Error adding record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
