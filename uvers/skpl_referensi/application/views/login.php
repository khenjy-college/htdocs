<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body class="login">

  <div class="container">

    <!-- membuat konten berada tepat di tengah2 halaman  -->
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-5 login">

        <!-- link kembali -->
        <a class="text-decoration-none" href="<?= site_url('welcome') ?>">Kembali ke beranda</a>

        <h1 class="text-center"><?= $title ?><?= $phase ?></h1>

        <!-- form login -->
        <form action="<?= site_url('tabel9/ceklogin') ?>" method="post">
          <!-- <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input class="form-control" type="email" name="email" placeholder="Masukkan email">
          </div> -->

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" name="<?= $tabel9_field3_input ?>" placeholder="Masukkan <?= $tabel9_field3_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" name="<?= $tabel9_field4_input ?>" placeholder="Masukkan <?= $tabel9_field4_alias ?>">
          </div>

          <!-- <p class="text-center"><a class="text-decoration-none" href="<?= site_url('tabel4/login') ?>">Login sebagai <?= $tabel4_alias ?></a></p> -->
          
          <!-- pesan untuk pengguna yang login -->
          <p class="small text-center text-danger"><?= $this->session->flashdata($this->flashdatas['v_flashdata1']) ?></p>
          
          <!-- tombol login dan signup -->
          <div class="form-group d-flex justify-content-around">
            <button class="btn btn-success login" type="submit">Login</button>
            <a class="btn btn-secondary login" type="button" href="<?= site_url('tabel9/signup') ?>">Sign Up</a>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>
</body>

</html>