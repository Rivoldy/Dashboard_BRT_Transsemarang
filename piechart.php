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
    <!-- /.navbar -->

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

  <!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Introduction Text -->
    <div class="row">
      <div class="col-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">Informasi Umum</h3>
          </div>
          <div class="card-body">
            <p>
              Berikut adalah hasil jawaban yang disajikan dan divisualisasikan ke dalam bentuk Pie Chart dengan menggunakan skala likert dari kuesioner yang diberikan kepada penumpang BRT Trans Semarang Koridor 1 mengenai Sistem Informasi didalam Bus dan Halte, jawaban terdiri dari 46 responden.
            </p>
          </div>
        </div>
      </div>
    </div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- Gender Distribution Pie Chart -->
      <div class="col-lg-6 col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Jenis Kelamin Penumpang</h3>
          </div>
          <div class="card-body">
            <canvas id="genderPieChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Occupation Distribution Pie Chart -->
      <div class="col-lg-6 col-md-12">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Pekerjaan Penumpang</h3>
          </div>
          <div class="card-body">
            <canvas id="occupationPieChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Application Usage Frequency Pie Chart -->
      <div class="col-lg-6 col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Seberapa sering Anda menggunakan aplikasi mobile "Trans Semarang" untuk memperoleh informasi terkait jadwal, rute, dan lokasi bus BRT secara real-time?</h3>
          </div>
          <div class="card-body">
            <canvas id="frequencyPieChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Real-time Information Reliability Pie Chart -->
      <div class="col-lg-6 col-md-12">
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Seberapa andal menurut Anda informasi real-time yang disediakan oleh sistem informasi BRT Trans Semarang?</h3>
          </div>
          <div class="card-body">
            <canvas id="reliabilityPieChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Schedule and Route Information Accuracy Pie Chart -->
      <div class="col-lg-6 col-md-12">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Seberapa akurat menurut Anda informasi terkait jadwal dan rute yang disediakan oleh sistem informasi BRT Trans Semarang?</h3>
          </div>
          <div class="card-body">
            <canvas id="schedule_accuracyPieChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Announcement Clarity Pie Chart -->
      <div class="col-lg-6 col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Seberapa jelas menurut Anda pengumuman suara dan visual di dalam bus terkait dengan informasi rute, halte, dan perhentian yang disediakan oleh sistem informasi BRT Trans Semarang?</h3>
          </div>
          <div class="card-body">
            <canvas id="announcement_clarityPieChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Performance Satisfaction Pie Chart -->
      <div class="col-lg-6 col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Seberapa puas Anda dengan kinerja sistem informasi BRT Trans Semarang secara keseluruhan?</h3>
          </div>
          <div class="card-body">
            <canvas id="performance_satisfactionPieChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Possibility of Reuse Pie Chart -->
      <div class="col-lg-6 col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Seberapa besar kemungkinan Anda akan menggunakan kembali layanan bus BRT Trans Semarang di Koridor 1 berdasarkan pengalaman Anda dengan sistem informasi saat ini?</h3>
          </div>
          <div class="card-body">
            <canvas id="reuse_possibilityPieChart"></canvas>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>    
        
<!-- footer -->
<?php include 'footer.php' ?>
</div>
<!-- JavaScript -->
<?php include 'js.php' ?>
</body>
</html>






