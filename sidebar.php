<?php
// Mendapatkan nama file dari URL saat ini
$current_page = basename($_SERVER['PHP_SELF']);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="dist/img/logo.png" alt="Logo Trans Semarang" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">Trans Semarang</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Informasi Umum -->
        <li class="nav-item">
          <a href="index.php" class="nav-link <?php if($current_page == 'index.php'){echo 'active';} ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Informasi Umum</p>
          </a>
        </li>
        
        <!-- Analisis -->
        <li class="nav-item has-treeview <?php if(in_array($current_page, ['analisis.php', 'Penumpangperjam.php', 'Penumpanghalte.php'])){echo 'menu-open';} ?>">
          <a href="#" class="nav-link <?php if(in_array($current_page, ['analisis.php', 'Penumpangperjam.php', 'Penumpanghalte.php'])){echo 'active';} ?>">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>
              Analisis
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="analisis.php" class="nav-link <?php if($current_page == 'analisis.php'){echo 'active';} ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Penumpang Per Tahun</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="Penumpangperjam.php" class="nav-link <?php if($current_page == 'Penumpangperjam.php'){echo 'active';} ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Penumpang Per Jam</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="Penumpanghalte.php" class="nav-link <?php if($current_page == 'Penumpanghalte.php'){echo 'active';} ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Penumpang Per Halte</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Survey Kepuasan -->
        <li class="nav-item">
          <a href="piechart.php" class="nav-link <?php if($current_page == 'piechart.php'){echo 'active';} ?>">
            <i class="nav-icon fas fa-smile"></i>
            <p>Survey Kepuasan</p>
          </a>
        </li>
        
        <!-- Pengaturan -->
        <li class="nav-item has-treeview <?php if(in_array($current_page, ['settings.php', 'register.php'])){echo 'menu-open';} ?>">
          <a href="#" class="nav-link <?php if(in_array($current_page, ['settings.php', 'register.php'])){echo 'active';} ?>">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Pengaturan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="register.php" class="nav-link <?php if($current_page == 'register.php'){echo 'active';} ?>">
                  <i class="fas fa-user-plus nav-icon"></i>
                <p>Tambah User Baru</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
