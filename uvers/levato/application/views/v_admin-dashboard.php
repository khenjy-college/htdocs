<!-- mengarahkan ke no_level jika user tidak memiliki level -->
<?php switch ($this->session->userdata('level')) {
  case 'administrator':
  case 'petugas':
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>
<div class="row">

  <!-- menampilkan data untuk administrator -->

  <?php switch ($this->session->userdata('level')) {
    case 'administrator': ?>
      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-primary">
          <div class="card-body">
            <h5 class="card-title"><?= $this->aliases['tabel6_alias'] ?></h5>
            <p class="card-text" style="font-size: 32;"><?= $tbl6 ?></p>
            <a class="text-white" href="<?= site_url($tabel6) ?>">Lihat Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title"><?= $tabel9_alias ?></h5>
            <p class="card-text" style="font-size: 32;"><?= $tbl9 ?></p>
            <a class="text-white" href="<?= site_url($tabel9) ?>">Lihat Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title"><?= $tabel4_alias ?></h5>
            <p class="card-text" style="font-size: 32;"><?= $tbl4 ?></p>
            <a class="text-white" href="<?= site_url($tabel4) ?>">Lihat Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title"><?= $tabel5_alias ?></h5>
            <p class="card-text" style="font-size: 32;"><?= $tbl5 ?></p>
            <a class="text-white" href="<?= site_url($tabel5) ?>">Lihat Detail >></a>
          </div>
        </div>
      </div>
    <?php break;

    case 'petugas': ?>
      <div class="col-lg-2 mt-2">
        <div class="card text-white bg-primary">
          <div class="card-body">
            <h5 class="card-title"><?= $tabel8_alias ?></h5>
            <p class="card-text" style="font-size: 32;"><?= $tbl8 ?></p>
            <a class="text-white" href="<?= site_url($tabel8) ?>">Lihat Detail >></a>
          </div>
        </div>
      </div>
    <?php break;

    case 'accounting': ?>
      <div class="col-lg-2 mt-2">
        <div class="card text-white bg-success">
          <div class="card-body">
            <h5 class="card-title"><?= $tabel10_alias ?></h5>
            <p class="card-text" style="font-size: 32;"><?= $tbl10 ?></p>
            <a class="text-white" href="<?= site_url($tabel410) ?>">Lihat Detail >></a>
          </div>
        </div>
      </div>
    <?php break;


    default: ?>


  <?php } ?>


</div>

<h2 class="mt-4">Detail Website</h2>
<hr>
<?php foreach ($tbl7 as $tl7) : ?>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label><?= $tabel7_field2_alias ?> : </label>
        <p><?= $tl7->nama; ?></p>
      </div>

      <div class="form-group">
        <label><?= $tabel7_field6_alias ?> : </label>
        <p><?= $tl7->alamat; ?></p>
      </div>

      <div class="form-group">
        <label><?= $tabel7_field7_alias ?> : </label>
        <p><?= $tl7->email; ?></p>
      </div>

      <div class="form-group">
        <label><?= $tabel7_field8_alias ?> : </label>
        <p><?= $tl7->hp; ?></p>
      </div>

      <div class="form-group">
        <a class="text-decoration-none text-primary" href="<?= $tl7->fb; ?>" target="_blank"><?= $tabel7_field10_alias ?></a>
      </div>

      <div class="form-group">
        <a class="text-decoration-none text-danger" href="<?= $tl7->ig; ?>" target="_blank"><?= $tabel7_field11_alias ?></a>
      </div>
    </div>

    <div class="col-md-6">
      <img class="img-thumbnail rounded" src="img/<?= $tl7->foto ?>">
    </div>
  </div>
<?php endforeach; ?>