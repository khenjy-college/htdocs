<?php switch ($this->session->userdata($tabel9_field6)) {
  // case $tabel9_field6_value3:
  case $tabel9_field6_value4:
    // case $tabel9_field6_value5:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <div class="container">
    <div class="row justify-content-center align-items-center h-100">

      <!-- mengecek apakah ada transaksi yang telah dilakukan -->
      <?php if (isset($tbl8)) { ?>
        <!-- 
        $i = 1;
        do { s?> -->

        <div class="col-md">
          <h1 class="text-center"><?= $tabel8_alias ?> Berhasil</h1>
          <p class="text-center"><?= $tabel8_field1_alias ?> Anda adalah <?= $tbl8->$tabel8_field1 ?></p>
          <div class="d-flex justify-content-center">
            <a class="btn btn-success text-light" href="<?= site_url('tabel8/print/' . $tbl8->$tabel8_field1) ?>"
              target="_blank">
              Cetak Bukti <?= $tabel8_alias ?></i></a>
          </div>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('tabel5/detail/' . $tbl8->$tabel8_field7) ?>">
              Kembali ke Halaman Sebelumnya
            </a>

          </div>
        </div>

        <!--  $i++;
        } while ($i <= $jlh) ?> -->


      <?php } else { ?>
        <!-- anda mengakses halaman konfirmasi tapi tidak memiliki pesanan apapun -->
        <div class="col-md">
          <h1 class="text-center">Anda tidak melakukan <?= $tabel8_alias ?> apapun</h1>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('welcome') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script src="fontawesome/js/all.js"></script>

</body>

</html>