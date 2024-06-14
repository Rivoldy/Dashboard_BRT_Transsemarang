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

      <!-- Per Tahun dan Hari -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Jumlah Penumpang BRT Trans Semarang Koridor 1</h3>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span class="text text-lg"><b>3.916.225</b> <i>Penumpang pada 2019</i></span>
                <span>Jumlah Penumpang Per Tahun Tertinggi Periode 2017-2023</span>
              </p>
            </div>
            <!-- /.d-flex -->

            <div class="position-relative mb-4">
              <canvas id="passengersChart" height="300"></canvas>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#passengerModal">Tabel Data Penumpang</button>
            <div class="d-flex flex-row justify-content-end">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="passengerModal" tabindex="-1" aria-labelledby="passengerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passengerModalLabel">Tabel Data Penumpang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="passengerTable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Tahun</th>
              <th>Jumlah Penumpang Tahunan</th>
              <th>Rata-rata Penumpang Harian</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($statsData)) : ?>
              <?php foreach ($statsData as $row) : ?>
                <tr>
                  <td><?php echo $row['year']; ?></td>
                  <td><?php echo $row['total_annual_passengers']; ?></td>
                  <td><?php echo $row['average_daily_passengers']; ?></td>
                  <td>
                    <button class="btn btn-info btn-sm editBtn"><i class="fas fa-edit"></i> Edit</button>
                    <button class="btn btn-danger btn-sm deleteBtn"><i class="fas fa-trash-alt"></i> Hapus</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
        <!-- Hapus Data Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Data Penumpang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                <form id="deleteForm">
                  <input type="hidden" id="deleteYear" name="year">
                  <button type="button" class="btn btn-danger" onclick="submitDelete()">Hapus</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Penumpang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="editForm">
                  <input type="hidden" id="editId" name="id">
                  <div class="form-group">
                    <label for="editYear">Tahun</label>
                    <input type="text" class="form-control" id="editYear" name="year">
                  </div>
                  <div class="form-group">
                    <label for="editTotal">Jumlah Penumpang Tahunan</label>
                    <input type="number" class="form-control" id="editTotal" name="total_annual_passengers">
                  </div>
                  <div class="form-group">
                    <label for="editAverage">Rata-rata Penumpang Harian</label>
                    <input type="number" class="form-control" id="editAverage" name="average_daily_passengers">
                  </div>
                  <button type="button" class="btn btn-primary" onclick="submitEdit()">Simpan Perubahan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Add Data Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data Penumpang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="addForm">
                  <div class="form-group">
                    <label for="addYear">Tahun</label>
                    <input type="text" class="form-control" id="addYear" name="year">
                  </div>
                  <div class="form-group">
                    <label for="addTotal">Jumlah Penumpang Tahunan</label>
                    <input type="number" class="form-control" id="addTotal" name="total_annual_passengers">
                  </div>
                  <div class="form-group">
                    <label for="addAverage">Rata-rata Penumpang Harian</label>
                    <input type="number" class="form-control" id="addAverage" name="average_daily_passengers">
                  </div>
                  <button type="button" class="btn btn-primary" onclick="submitAdd()">Tambahkan Data</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Button to open Add Modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Data Penumpang</button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>  
<!-- footer -->
<?php include 'footer.php' ?>
</div>
<!-- JavaScript -->
<?php include 'js.php' ?>
</body>
</html>
