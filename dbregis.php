<?php
// Database configuration
$host = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'db_brt'; 

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'])) {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mengenkripsi password

  // Membuat query untuk memasukkan data user baru
  $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);
  if ($stmt->execute()) {
    echo "<script>alert('User berhasil terdaftar. Silakan login.'); window.location.href='TransSemarang.php';</script>";
  } else {
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
  $conn->close();
}
?>
