<?php switch ($this->session->userdata($tabel9_field6)) {
    // case $tabel9_field6_value3:
  case $tabel9_field6_value5:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<?php foreach ($tbl7 as $tl7): ?>
  <img src="img/tabel7/<?= $tl7->$tabel7_field5 ?>" class="img-fluid rounded">
<?php endforeach; ?>

<form action="<?= site_url('tabel8/tambah') ?>" method="post">

  <!-- form ini berisi data yang sudah diinput sebelumnya dari halaman home -->
  <div class="row justify-content-center align-items-end mt-2">
    <div class="col-md-2">
      <div class="form-group">
        <label><?= $tabel8_field10_alias ?></label>
        <input class="form-control" type="date" required name="<?= $tabel8_field10_input ?>" value="<?= $tabel8_field10_value ?>" min="<?= date('Y-m-d'); ?>">
      </div>
    </div>

    <!-- Seperti di bawah bentuk input array ke depannya cman itu perlu dipending dulu -->
    <!-- <div class="col-md-2">
      <div class="form-group">
        <label>Tanggal Cek Out</label>
        <input class="form-control" type="date" required name="<?= $tabel8_field11_input ?>" value=" $cek_out ?>">
      </div>
    </div> -->

    <div class="col-md-2">
      <div class="form-group">
        <label><?= $tabel8_field11_alias ?></label>
        <input class="form-control" type="date" required name="<?= $tabel8_field11_input ?>" value="<?= $tabel8_field11_value ?>" min="<?= date('Y-m-d', strtotime("+1 day")); ?>">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label><?= $tabel8_field8_alias ?></label>
        <input class="form-control" readonly type="number" required name="<?= $tabel8_field8_input ?>" min="1" max="10" value="<?= $tabel8_field8_value ?>">
      </div>
    </div>


    <div class="col-md-1">
      <div class="form-group">
        <a class="btn btn-primary" type="button" data-toggle="modal" data-target="#ubah">
          Ubah</a>
      </div>
    </div>


  </div>

  <h2>Pesan <?= $tabel5_alias ?> Anda</h2>


  <hr>

  <!-- Di bawah ini adalah fitur yang ditetapkan sebagai unfinished, yakni fitur untuk mengelola array dari jumlah pesanan yang telah dilakukan. -->
  <!-- Dengan fitur ini, tamu dapat memesan lebih dari satu kamar  -->
  <!-- dan mendapatkan pesanan yang terpisah masing-masing -->
  <!-- Sebenarnya lebih baik jika menggunakan tabel pesanan dan tabel detail pesanan -->
  <!-- Namun hal itu hanya akan mempersulit masalah yang sudah ada -->
  <!-- Fitur ini akan diselesaikan ketika sudah ada pemahaman mengenai cara kerja array -->
  <!-- 
  $i = 1;
  do { ?> -->
  <!-- <h2>Pesanan  $i ?></h2> -->
  <div class="row justify-content-start mt-4">
    <hr>


    <div class="col-md-6">

      <!-- menentukan id_user jika user sudah membuat akun atau belum -->
      <div class="form-group">
        <label><?= $tabel8_field3_alias ?></label>
        <input class="form-control" type="text" required name="<?= $tabel8_field3_input ?>" placeholder="Masukkan <?= $tabel8_field3_alias ?>" value="<?= $this->session->userdata($tabel9_field2) ?>">
        <?php if ($this->session->userdata($tabel9_field1)) { ?>
          <input type="hidden" name="<?= $tabel9_field1_input ?>" value="<?= $this->session->userdata($tabel9_field1) ?>">
        <?php } else { ?>

          <!-- value 0 di id_user untuk pengguna tanpa akun -->
          <input type="hidden" name="<?= $tabel9_field1_input ?>" value="0">

        <?php } ?>
      </div>

      <!-- keterangan * di bawah -->
      <div class="form-group">
        <label><?= $tabel8_field4_alias ?>*</label>
        <input class="form-control" type="email" required name="<?= $tabel8_field4_input ?>" placeholder="Masukkan <?= $tabel8_field4_alias ?>" value="<?= $this->session->userdata($tabel9_field3) ?>">
      </div>

      <div class="form-group">
        <label><?= $tabel8_field5_alias ?></label>
        <input class="form-control" type="text" required name="<?= $tabel8_field5_input ?>" placeholder="Masukkan <?= $tabel8_field5_alias ?>" value="<?= $this->session->userdata($tabel9_field5) ?>">
      </div>

      <div class="form-group">
        <label><?= $tabel8_field6_alias ?></label>
        <input class="form-control" type="text" required name="<?= $tabel8_field6_input ?>" placeholder="Masukkan <?= $tabel8_field6_alias ?>">
      </div>

      <div class="form-group">
        <label><?= $tabel6_field2_alias ?></label>
        <select class="form-control" required name="<?= $tabel6_field1_input ?>">
          <option selected hidden value="">Pilih <?= $tabel6_field2_alias ?>...</option>
          <?php foreach ($tbl6 as $tl6) : ?>
            <option value="<?= $tl6->$tabel6_field1; ?>"><?= $tl6->$tabel6_field2 ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <!-- keterangan * -->
      <small>*<?= $tabel8_field4_alias ?> dibutuhkan untuk melakukan <?= $tabel8_alias ?> dan <?= $tabel10_alias ?></small>

    </div>
    <div class="col-md-6">
    <?php foreach ($dekor as $dk): ?>
  <img src="img/tabel12/<?= $dk->$tabel12_field3 ?>" class="img-fluid rounded">
<?php endforeach ?>
    </div>

  </div>


  <hr>

  <!-- $i++;
  } while ($i <= $jlh) ?> -->



  <div class="row justify-content-start mt-4">
    <div class="col-md6">


      <div class="form-group">
        <button class="btn btn-success" onclick="return confirm('Apakah Anda Ingin Memesan <?= $tabel5_alias ?>?')" type="submit">Konfirmasi <?= $tabel8_alias ?></button>
        <a class="btn btn-danger" type="button" href="<?= site_url('welcome') ?>">Batal</a>
      </div>
    </div>
  </div>
</form>



<!-- modal edit -->
<div id="ubah" class="modal fade ubah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah <?= $tabel8_field8_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('tabel8') ?>" method="get">
        <div class="modal-body">
          <div class="form-group">
            <label><?= $tabel8_field8_alias ?></label>
            <input class="form-control" type="number" value="<?= $tabel8_field8_value ?>" required name="<?= $tabel8_field8_input ?>" min="1" max="10" value="1">
            <input type="hidden" name="<?= $tabel8_field10_input ?>" value="<?= $tabel8_field10_value ?>">
            <input type="hidden" name="<?= $tabel8_field11_input ?>" value="<?= $tabel8_field11_value ?>">

          </div>


        </div>

        <!-- memunculkan notifikasi modal -->
        <p id="p_ubah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>