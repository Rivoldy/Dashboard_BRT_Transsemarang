<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php' ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  
  <!-- Navbar -->
  <?php include 'navbar.php'?>
  <!-- /.navbar -->

  <!-- Sidebar -->
  <?php include 'sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard Trans Semarang</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- Main content -->
    <section class="content">
    <?php include 'smallbox.php'?>
    
    <!-- MAP & BOX PANE -->
  <div class="card">
  <div class="card-header">
    <h3 class="card-title">BRT Trans Semarang Koridor 1</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <div class="d-md-flex">
      <div class="p-1 flex-fill" style="overflow: hidden">
        <!-- Map will be created here -->
        <?php include 'map.php'?>
          <!-- Twitter Update Section -->
        <div class="col-lg-6">
          <div class="card bg-gradient-info">
            <div class="card-header border-0">  
              <h3 class="card-title text-white">Informasi</h3>
               </div>
             <div class="card-body">
               <a class="twitter-timeline" data-lang="id" data-width="800" data-height="600" data-theme="light" href="https://twitter.com/Transsemarang?ref_src=twsrc%5Etfw">Tweets by Transsemarang</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
             </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <?php include 'footer.php'?>
</div>
<!-- contentscript -->
  <?php include 'contentscript.php'?>
<!-- JavaScript -->
<?php include 'js.php' ?>
</body>
</html>
