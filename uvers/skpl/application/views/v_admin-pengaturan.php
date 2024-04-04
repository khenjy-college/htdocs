<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value3:
    // case 'tabel9_field6_value4_alias':
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>
<div class="row">
  <div class="col-md-6">

    <!-- form edit favicon, logo, dan foto -->
    <?php foreach ($tbl7 as $tl7) : ?>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#<?= $tabel7_field3 . $tl7->id ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field3_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#<?= $tabel7_field4 . $tl7->id ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field4_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#<?= $tabel7_field5 . $tl7->id ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field5_alias ?></a>

      <form action="<?= site_url($tabel7.'/update') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label><?= $tabel7_field2_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="<?= $tabel7_field2 ?>" value="<?= $tl7->$tabel7_field2; ?>">
          <input type="hidden" name="<?= $tabel7_field1 ?>" value="<?= $tl7->id; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field6_alias ?></label>
          <textarea class="form-control pengaturan" required name="<?= $tabel7_field6 ?>" rows="3"><?= $tl7->$tabel7_field6; ?></textarea>
        </div>

        <div class="form-group">
          <label><?= $tabel7_field7_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="<?= $tabel7_field7 ?>" value="<?= $tl7->$tabel7_field7; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field8_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="<?= $tabel7_field8 ?>" value="<?= $tl7->$tabel7_field8; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field9_alias ?></label>
          <textarea class="form-control pengaturan" required name="<?= $tabel7_field9 ?>" rows="5"><?= $tl7->$tabel7_field9; ?></textarea>
        </div>

        <div class="form-group">
          <label><?= $tabel7_field10_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="<?= $tabel7_field10 ?>" placeholder="Masukkan <?= $tabel7_field10_alias ?>" value="<?= $tl7->$tabel7_field10; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field11_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="<?= $tabel7_field11 ?>" placeholder="Masukkan <?= $tabel7_field11_alias ?>" value="<?= $tl7->$tabel7_field11; ?>">
        </div>

        <div class="form-group">
          <button class="btn btn-success" onclick="return confirm('Ubah data website?')" type="submit">Simpan Perubahan</button>
        </div>
      </form>
    <?php endforeach; ?>
  </div>
  <div class="col-md-6">
    <img class="img-fluid" src="img/engineer.png">
  </div>
</div>


<!-- modal edit favicon-->
<?php foreach ($tbl7 as $tl7) : ?>
  <div id="<?= $tabel7_field3 . $tl7->id; ?>" class="modal fade favicon">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field3_alias ?> <?= $tl7->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel7.'/update_tabel7_field3') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $tl7->$tabel7_field3; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel7_field3_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel7_field3 ?>">
              <input type="hidden" name="<?= $tabel7_field1 ?>" value="<?= $tl7->id; ?>">
              <input type="hidden" name="txt<?= $tabel7_field3 ?>" value="<?= $tl7->$tabel7_field3; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_<?= $tabel7_field3 ?>" class="small text-center text-danger"><?= $this->session->flashdata('pesan_'.$tabel7_field3) ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel7_field3 ?>?')" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit logo-->
<?php foreach ($tbl7 as $tl7) : ?>
  <div id="<?= $tabel7_field4 . $tl7->id; ?>" class="modal fade logo">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field4_alias ?> <?= $tl7->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel7.'/update_tabel7_field4') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $tl7->$tabel7_field4; ?>" width="300">
            </div>
            <hr>


            <div class="form-group">
              <label>Ubah <?= $tabel7_field4_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel7_field4 ?>">
              <input type="hidden" name="<?= $tabel7_field1 ?>" value="<?= $tl7->id; ?>">
              <input type="hidden" name="txt<?= $tabel7_field4 ?>" value="<?= $tl7->$tabel7_field4; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_<?= $tabel7_field4 ?>" class="small text-center text-danger"><?= $this->session->flashdata('pesan_'.$tabel7_field4) ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah '.$tabel7_field4)" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit foto-->
<?php foreach ($tbl7 as $tl7) : ?>
  <div id="<?= $tabel7_field5 . $tl7->id; ?>" class="modal fade foto">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field5_alias ?> <?= $tl7->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel7.'/update_tabel7_field5') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $tl7->$tabel7_field5; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel7_field5_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel7_field5 ?>">
              <input type="hidden" name="<?= $tabel7_field1 ?>" value="<?= $tl7->id; ?>">
              <input type="hidden" name="txt<?= $tabel7_field5 ?>" value="<?= $tl7->$tabel7_field5; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_<?= $tabel7_field5 ?>" class="small text-center text-danger"><?= $this->session->flashdata('pesan_'.$tabel7_field5) ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah '.$tabel7_field5)" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>