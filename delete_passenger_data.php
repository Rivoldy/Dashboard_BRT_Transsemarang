<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST['year'];

    $sql = "DELETE FROM passenger_statistics WHERE year = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $year);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
