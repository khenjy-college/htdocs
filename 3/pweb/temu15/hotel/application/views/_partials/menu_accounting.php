<!-- menu navigasi untuk pengguna dgn level resepsionis -->
<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <div class="dropdown">
      <a class="nav-link text-decoration-none font-weight-bold" data-toggle="dropdown" href="#">
        <h4>Accounting</h4>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= site_url('user/profil') ?>">Profil</a>
        <a class="dropdown-item" href="<?= site_url('user/logout') ?>">Logout</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome/dashboard') ?>">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('transaksi') ?>">Daftar Transaksi</a>
  </li>

</ul>