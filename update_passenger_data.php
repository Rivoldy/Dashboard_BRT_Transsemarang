<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST['year'];
    $total_annual_passengers = $_POST['total_annual_passengers'];
    $average_daily_passengers = $_POST['average_daily_passengers'];

    $sql = "UPDATE passenger_statistics SET total_annual_passengers = ?, average_daily_passengers = ? WHERE year = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $total_annual_passengers, $average_daily_passengers, $year);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
