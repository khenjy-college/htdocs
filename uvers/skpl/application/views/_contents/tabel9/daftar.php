<h1><?= $title ?><?= $phase ?></h1>
<hr>
<div class="row">
  <div class="col-md-6">
    <?php foreach ($tbl9 as $tl9): ?>

      <!-- tombol untuk memunculkan modal memperbaiki password -->
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#password<?= $tl9->$tabel9_field1 ?>">
        <i class="fas fa-edit"></i> Ubah <?= $tabel9_field4_alias ?></a>

      <!-- form ini terpisah dengan form ubah password untuk keamanan sesama :) -->
      <form action="<?= site_url('tabel9/update_profil') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label><?= $tabel9_field2_alias ?></label>
          <input class="form-control tabel7" type="text" name="<?= $tabel9_field2_input ?>"
            value="<?= $tl9->$tabel9_field2; ?>">
          <input type="hidden" name="<?= $tabel9_field1_input ?>" value="<?= $tl9->$tabel9_field1; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel9_field3_alias ?>*</label>
          <input class="form-control tabel7" type="text" name="<?= $tabel9_field3_input ?>"
            value="<?= $tl9->$tabel9_field3; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel9_field5_alias ?></label>
          <input class="form-control tabel7" type="text" name="<?= $tabel9_field5_input ?>"
            value="<?= $tl9->$tabel9_field5; ?>">
        </div>

        <div class="form-group">
          <button class="btn btn-success" onclick="return confirm('Ubah data profil?')" type="submit">Simpan
            Perubahan</button>
        </div>
        <small>*Merubah <?= $tabel9_field3_alias ?> ini tidak akan merubah <?= $tabel9_field3_alias ?> yang ada di
          <?= $tabel8_alias ?></small>
      </form>
    <?php endforeach; ?>
  </div>

  <div class="col-md-6">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/tabel12/<?= $dk->$tabel12_field3 ?>" class="img-fluid">
    <?php endforeach ?>
  </div>
</div>


<!-- modal edit password-->
<?php foreach ($tbl9 as $tl9): ?>
  <div id="password<?= $tl9->$tabel9_field1 ?>" class="modal fade password">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah <?= $tabel9_field4_alias ?> Anda</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <form action="<?= site_url('tabel9/update_tabel9_field4') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" type="password" required name="<?= $tabel9_field4_old ?>"
                placeholder="Masukkan <?= $tabel9_field4_alias ?> lama">
              <input type="hidden" name="<?= $tabel9_field1_input ?>" value="<?= $tl9->$tabel9_field1_input; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" type="password" required name="<?= $tabel9_field4_input ?>"
                placeholder="Masukkan <?= $tabel9_field4_alias ?> baru">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" type="password" required name="konfirm"
                placeholder="Konfirmasi <?= $tabel9_field4_alias ?> baru">
            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <!-- untuk bagian ini akan kuubah nanti -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('notifikasi') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel9_field4_alias ?>?')"
              type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>