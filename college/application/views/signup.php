<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<!-- signup dan login memiliki style yg sama -->

<body class="login">

  <div class="container">

    <!-- membuat konten berada tepat di tengah2 halaman  -->
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-5 login">

        <!-- link kembali -->
        <a class="text-decoration-none" href="<?= site_url('welcome') ?>">Kembali ke beranda</a>

        <h1 class="text-center"><?= $title ?><?= $phase ?></h1>

        <!-- form signup -->
        <form action="<?= site_url('tabel9/tambah') ?>" method="post">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="<?= $tabel9_field2_input ?>" placeholder="Masukkan <?= $tabel9_field2_alias ?>">
            <input type="hidden" name="<?= $tabel9_field6_input ?>" value="<?= $tabel9_field6_value5 ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input class="form-control" type="email" required name="<?= $tabel9_field3_input ?>" placeholder="Masukkan <?= $tabel9_field3_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="<?= $tabel9_field4_input ?>" placeholder="Masukkan <?= $tabel9_field4_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="konfirm" placeholder="Konfirmasi <?= $tabel9_field4_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <input class="form-control" type="text" required name="<?= $tabel9_field5_input ?>" placeholder="Masukkan <?= $tabel9_field5_alias ?>">
          </div>

          <!-- pesan untuk pengguna yang signup -->
          <p class="small text-center text-danger"><?= $this->session->flashdata($this->flashdatas['v_flashdata1']) ?></p>

          <!-- tombol signup dan login -->
          <div class="form-group d-flex justify-content-around">
            <button class="btn btn-success login" type="submit">Sign Up</button>
            <a class="btn btn-secondary login" type="button" href="<?= site_url('tabel9/login') ?>">Login</a>
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