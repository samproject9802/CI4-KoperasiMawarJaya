<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-dark">Koperasi Mawar Jaya</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Administrator</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item <?= ($pages == "Beranda") ? 'menu-open' : ''; ?>">
          <a href="/" class="nav-link <?= ($pages == "Beranda") ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Beranda
            </p>
          </a>
        </li>
        <li class="nav-item <?= ($pages == "Pegawai" || $pages == "Tambah Data Pegawai" || $pages == "Ubah Data Pegawai") ? 'menu-open' : ''; ?>">
          <a href="/pegawai" class="nav-link <?= ($pages == "Pegawai" || $pages == "Tambah Data Pegawai" || $pages == "Ubah Data Pegawai") ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Pegawai
            </p>
          </a>
        </li>
        <li class="nav-item <?= ($pages == "Anggota" || $pages == "Tambah Data Anggota" || $pages == "Ubah Data Anggota" || $pages == "Detail Anggota") ? 'menu-open' : ''; ?>">
          <a href="/anggota" class="nav-link <?= ($pages == "Anggota" || $pages == "Tambah Data Anggota" || $pages == "Ubah Data Anggota" || $pages == "Detail Anggota") ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Anggota
            </p>
          </a>
        </li>
        <li class="nav-item <?= ($pages == "Pinjaman" || $pages == "Tambah Data Pinjaman" || $pages == "Ubah Data Pinjaman") ? 'menu-open' : ''; ?>">
          <a href="/pinjaman" class="nav-link <?= ($pages == "Pinjaman" || $pages == "Tambah Data Pinjaman" || $pages == "Ubah Data Pinjaman") ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Pinjaman
            </p>
          </a>
        </li>
        <li class="nav-item <?= ($pages == "Angsuran") ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= ($pages == "Angsuran") ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-ticket-alt"></i>
            <p>
              Angsuran
            </p>
          </a>
        </li>
        <li class="nav-item <?= ($pages == "Laporan") ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= ($pages == "Laporan") ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>
              Laporan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('logout'); ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>