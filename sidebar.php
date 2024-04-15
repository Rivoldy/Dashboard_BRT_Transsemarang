<?php
// Mendapatkan nama file dari URL saat ini
$current_page = basename($_SERVER['PHP_SELF']);
?>
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="dist/img/logo.png" alt="Logo Trans Semarang" class="brand-image img-circle elevation-5">
    <span class="brand-text font-light">Trans Semarang</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
        <li class="nav-item">
          <a href="index.php" class="nav-link <?php if($current_page == 'index.php'){echo 'active';} ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="analisis.php" class="nav-link <?php if($current_page == 'analisis.php'){echo 'active';} ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Analisis</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>