<!-- setting setiap src di assets -->
<base href="<?= base_url('assets/') ?>">

<!DOCTYPE html>
<html lang="en">

<!-- header -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- menampilkan data pengaturan sebagai p -->
  <!-- <?php foreach ($tabel7 as $p) : ?> -->
  <!-- <title><?= $title ?> - <?= $p->nama ?></title> -->

  <!-- menampilkan favicon -->
  <link rel="icon" href="img/<?= $p->favicon ?>" type="image/gif">

  <!-- <?php endforeach; ?> -->

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">

  <!-- css untuk datatables bertema bootstrap -->
  <link rel="stylesheet" href="datatables/datatables/css/dataTables.bootstrap4.min.css">

  <!-- css pribadi -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>


  <!-- toast -->
  <div class="toast fade" id="element" style="position: absolute; top: 80; right: 15; z-index: 1000" data-delay="5000">
    <div class="toast-header">
      <img class="rounded mr-2" src="img/<?= $p->favicon ?>" width="15px" draggable="false">
      <strong class="mr-auto"><?= $p->nama ?></strong>
      <button type="button" class="close" data-dismiss="toast">
        <span>&times;</span>
      </button>
    </div>

    <div class="toast-body">
      <?= $this->session->flashdata($this->v_flashdata1) ?>
    </div>
  </div>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
    <a class="navbar-brand font-weight-bold" href="<?= site_url('welcome') ?>">
      <img src="img/<?= $p->logo; ?>" height="50">
    </a>

    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarku">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- menu navbar berdasarkan akses user -->
    <div class="collapse navbar-collapse" id="navbarku">
      <!-- menu navigasi untuk pengguna tanpa akun/umum -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('user/login') ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome/kamar') ?>">Kamar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome/fasilitas') ?>">Fasilitas</a>
        </li>

        <li class="nav-item">

          <!-- tombol untuk memunculkan modal cari -->
          <a class="nav-link text-decoration-none font-weight-bold" data-toggle="modal" data-target="#cari" href="#">Cari</a>

        </li>
      </ul>
    </div>

  </nav>

  <!-- komponen berada tengah halaman -->
  <div class="container" id="konten">

    <!-- modal cari data reservasi -->
    <div id="cari" class="modal fade cari">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cari daftar reservasi Anda</h5>

            <button class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>

          <!-- form mencari data reservasi, method get utk menampilkan apa yg diinput pengguna di halaman tujuan -->
          <form action="<?= site_url('pesanan/cari') ?>" method="get">
            <div class="modal-body">
              <div class="form-group">
                <label>Id Pesanan</label>
                <input class="form-control" type="text" required name="id_pesanan" placeholder="Masukkan id pesanan">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" required name="email" placeholder="Masukkan email Anda">
              </div>
            </div>

            <!-- memunculkan notifikasi modal -->
            <p id="p_cari" class="small text-center text-danger"><?= $this->session->flashdata('pesan_cari') ?></p>

            <div class="modal-footer">
              <button class="btn btn-success" type="submit">Cari</button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <div class="konten" style="margin-top: 100px;">
      <!-- konten sesuai controller -->
      <?php foreach ($tabel7 as $p) : ?>
        <!-- <img src="img/<?= $p->foto ?>" class="img-fluid rounded"> -->
      <?php endforeach; ?>


      <!-- method get supaya nilai dari form bisa tampil nanti (tidak langsung masuk ke database) -->
      <form action="<?= site_url('welcome/pemesanan') ?>" method="get">
        <div class="row justify-content-center align-items-end mt-2">
          <div class="col-md-1">
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Get Offer</button>
            </div>
          </div>
        </div>
      </form>

      <?php foreach ($tabel7 as $p) : ?>
        <h1 class="text-center">Tentang Kami</h1>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <p><?= $p->metadesc ?></p>
          </div>

          <div class="col-md-6">
            <img class="img-fluid rounded" src="img/mark.png">
          </div>
        </div>
      <?php endforeach ?>
    </div>

  </div>


  <!-- footer -->
  <div class="container-fluid bg-light border" style="bottom: 0; margin-top: 20px">
    <div class="container">

      <!-- menampilkan footer untuk umum  -->
      <?php if ($this->session->userdata('akses') <> 'administrator' && $this->session->userdata('akses') <> 'resepsionis') { ?>
        <div class="row justify-content-center">
          <div class="col-lg-4 pt-3">
            <img src="img/<?= $p->logo; ?>" height="50">
            <p class="small pt-2">@2017-2022 <?= $p->nama ?>. All Rights Reserved.</p>
          </div>

          <div class="col-lg-3 pt-3">
            <h3>Jelajahi</h3>
            <ul class="list-unstyled">
              <li>
                <a class="text-decoration-none text-dark" href="<?= site_url('welcome/kamar') ?>">Kamar</a><br>
              </li>
              <li>
                <a class="text-decoration-none text-dark" href="<?= site_url('welcome/fasilitas') ?>">Fasilitas</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 pt-3">
            <h3>Alamat</h3>
            <ul class="list-unstyled">
              <li>
                <?= $p->hp ?>
              </li>
              <li>
                <?= $p->email ?>
              </li>
              <li>
                <?= $p->alamat ?>
              </li>
            </ul>
          </div>

          <div class="col-lg-2 pt-3">
            <h3>Ikuti</h3>
            <ul class="list-unstyled">
              <li>
                <a class="text-decoration-none text-primary" href="<?= $p->fb ?>" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
              </li>
              <li>
                <a class="text-decoration-none text-danger" href="<?= $p->ig ?>" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
              </li>
            </ul>
          </div>
        </div>

        <!-- menampilkan footer khusus jika akses adalah resepsionis dan admin  -->
      <?php } else { ?>

        <div class="row justify-content-center align-content-center">
          <p class="pt-2">@2017-2022 | <?= $p->nama ?></p>
        </div>
      <?php } ?>

    </div>
  </div>

  <!-- javascript untuk semua halaman (sesuai kebutuhan) -->
  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.min.js"></script>
  <script src="popper.min.js"></script>

  <!-- javascript untuk datatables bertema bootstrap -->
  <script src="datatables/datatables/js/jquery.dataTables.min.js"></script>
  <script src="datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

  <!-- fungsi datatables (wajib ada) -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#data').DataTable();

      <?= $this->session->flashdata('panggil') ?>
    });
  </script>

</body>

</html>