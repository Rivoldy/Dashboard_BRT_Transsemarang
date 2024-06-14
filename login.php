<?php
session_start();
include 'db.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Membuat query untuk memeriksa username dan password
    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);  

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Jika password benar, set session dan redirect ke index.php
                $_SESSION['user_id'] = $user['id'];
                header("Location: index.php");
                exit;
            } else {
                echo "Password Anda salah.";
            }
        } else {
            echo "Username Anda salah.";
        }
        $stmt->close();  
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close(); 
} else {
    echo "Invalid request or data not provided.";
}
?>
