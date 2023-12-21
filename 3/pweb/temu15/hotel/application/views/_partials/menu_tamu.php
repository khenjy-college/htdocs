<!-- menu navigasi untuk pengguna dgn level tamu -->
<ul id="tour2" class="navbar-nav ml-auto">
  <li class="nav-item">
    <!-- tombol untuk memunculkan modal cari -->
    <a class="nav-link text-decoration-none font-weight-bold" data-toggle="modal" data-target="#cari" href="#"><i class="nav-link fas fa-search"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome') ?>">Home</a>
  </li>
  <li id="" class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome/tipe_kamar') ?>"><?= $tabel6_alias ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome/fasilitas') ?>"><?= $tabel3_alias ?></a>
  </li>

  <li class="nav-item">
    <div class="dropdown">
      <a type="button" id="tour2" class="nav-link dropdown-tgl text-decoration-none font-weight-bold" data-toggle="dropdown">
        <h4><?= $this->session->userdata('nama') ?> <i class="fas fa-caret-down"></i></h4>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <h6 class="dropdown-header">Reservasi</h6>
        <a class="dropdown-item" href="<?= site_url('pesanan/daftar') ?>">Daftar Reservasi</a>
        <a class="dropdown-item" href="<?= site_url('transaksi/daftar') ?>">Transaksi</a>

        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">History</h6>
        <a class="dropdown-item" href="<?= site_url('history/daftar') ?>">History Reservasi</a>
        <a class="dropdown-item" href="<?= site_url('transaksi/daftar_history') ?>">History Transaksi</a>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= site_url('user/profil') ?>">Profil</a>
        <!-- <a id="introBaru" type="button" class="dropdown-item">Quick Tour</a> -->
        <a class="dropdown-item" href="<?= site_url('user/logout') ?>">Logout</a>
      </div>
    </div>
  </li>

</ul>