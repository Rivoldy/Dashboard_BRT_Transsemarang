<?php
session_start();  // Memulai sesi

// Periksa apakah sesi 'user_id' belum di-set atau kosong
if (!isset($_SESSION['user_id'])) {
    // Jika tidak ada sesi 'user_id', redirect ke halaman login
    header("Location: TransSemarang.php");
    exit;  
}
?>
<?php include 'koneksi.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php' ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <?php include 'navbar.php' ?>
    <!-- Main Sidebar Container -->
    <?php include 'sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>BRT Trans Semarang Koridor 1</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Hasil Analisis</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        
        <!-- Chart Section -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Jumlah Penumpang di Halte BRT Trans Semarang Koridor 1 Per Hari</h3>
                            </div>
                            <div class="card-body">
                                <span>Jumlah Rata-rata Penumpang di Halte BRT Trans Semarang Koridor 1 dalam sehari</span>
                                <div class="position-relative mb-4">
                                    <canvas id="halteChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include 'footer.php' ?>
    </div>
    <!-- JavaScript -->
    <?php include 'js.php' ?>
</body>
</html>
