<?php
session_start();
// Hancurkan semua session
session_destroy();

// Redirect ke halaman login
header("Location: TransSemarang.php");
exit;
?>
