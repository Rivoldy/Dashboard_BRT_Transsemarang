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
                <h1>Analisis BRT Trans Semarang Koridor 1</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Analisis</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

      <!-- Konten Utama -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Jumlah Penumpang BRT Trans Semarang Koridor 1</h3>
              <!-- Ubah untuk memicu fungsi cetak dan ubah teks menjadi Bahasa Indonesia -->
              <a href="javascript:void(0);" onclick="printReport()">Cetak Laporan</a>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span class="text-bold text-lg">1,588,135</span>
                <span>Penumpang pada tahun 2021</span>
              </p>
            </div>
            <!-- /.d-flex -->

            <div class="position-relative mb-4">
              <canvas id="passengers-chart" height="200"></canvas>
            </div>

            <div class="d-flex flex-row justify-content-end">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Pie chart -->
<?php include 'piechart.php' ?>
<!-- footer -->
<?php include 'footer.php' ?>
</div>
<!-- JavaScript -->
<?php include 'js.php' ?>
</body>
</html>
