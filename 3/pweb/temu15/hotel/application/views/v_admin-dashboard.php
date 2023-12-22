<!-- mengarahkan ke no_level jika user tidak memiliki level -->
<?php if (!$this->session->userdata('level')) {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>
<div class="row">

  <!-- menampilkan data untuk administrator -->
  <?php if ($this->session->userdata('level') == 'administrator') { ?>
    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel6_alias ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $tipe_kamar ?></p>
          <a class="text-white" href="<?= site_url('tipe_kamar') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-secondary">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel1_alias ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $faskamar ?></p>
          <a class="text-white" href="<?= site_url('faskamar') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel3_alias ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $fashotel ?></p>
          <a class="text-white" href="<?= site_url('fashotel') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-danger">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel9_alias ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $user ?></p>
          <a class="text-white" href="<?= site_url('user') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-danger">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel4_alias ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $petugas ?></p>
          <a class="text-white" href="<?= site_url('petugas') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

    <!-- menampilkan data untuk resepsionis -->
  <?php } elseif (($this->session->userdata('level') == 'resepsionis')) { ?>
    <div class="col-lg-2 mt-2">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel8_alias ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $pesanan ?></p>
          <a class="text-white" href="<?= site_url('pesanan') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

  <?php } elseif (($this->session->userdata('level') == 'accounting')) { ?>
    <div class="col-lg-2 mt-2">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel10_alias ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $transaksi ?></p>
          <a class="text-white" href="<?= site_url('transaksi') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

  <?php } ?>

</div>

<h2 class="mt-4">Detail Website</h2>
<hr>
<?php foreach ($pengaturan as $p) : ?>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label><?= $tabel7_field2_alias ?> : </label>
        <p><?= $p->nama; ?></p>
      </div>

      <div class="form-group">
        <label><?= $tabel7_field6_alias ?> : </label>
        <p><?= $p->alamat; ?></p>
      </div>

      <div class="form-group">
        <label><?= $tabel7_field7_alias ?> : </label>
        <p><?= $p->email; ?></p>
      </div>

      <div class="form-group">
        <label><?= $tabel7_field8_alias ?> : </label>
        <p><?= $p->hp; ?></p>
      </div>

      <div class="form-group">
        <a class="text-decoration-none text-primary" href="<?= $p->fb; ?>" target="_blank"><?= $tabel7_field10_alias ?></a>
      </div>

      <div class="form-group">
        <a class="text-decoration-none text-danger" href="<?= $p->ig; ?>" target="_blank"><?= $tabel7_field11_alias ?></a>
      </div>
    </div>

    <div class="col-md-6">
      <img class="img-thumbnail rounded" src="img/<?= $p->foto ?>">
    </div>
  </div>
<?php endforeach; ?>