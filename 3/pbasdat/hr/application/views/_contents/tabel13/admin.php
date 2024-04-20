<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value3:
    // case $tabel9_field6_value4:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>
<p class="">Beberapa gambar tidak akan langsung berubah, perlu menghapus cache terlebih dahulu.</p>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('tabel13/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<?php foreach ($dekor as $dk): ?>
  <img src="img/tabel12/<?= $dk->$tabel12_field3 ?>" width="200">
<?php endforeach ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel13_field1_alias ?></th>
        <th><?= $tabel13_field2_alias ?></th>
        <th><?= $tabel13_field3_alias ?></th>
        <th><?= $tabel13_field4_alias ?></th>
        <th><?= $tabel13_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl13 as $tl13): ?>
        <tr>
          <td></td>
          <td><?= $tl13->$tabel13_field1; ?></td>
          <td><?= $tl13->$tabel13_field2 ?></td>
          <td><?= $tl13->$tabel13_field3 ?></td>
          <td><img src="img/tabel13/<?= $tl13->$tabel13_field4 ?>" width="100"></td>
          <td><?= $tl13->$tabel13_field5 ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal"
              data-target="#lihat<?= $tl13->$tabel13_field1; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal"
              data-target="#ubah<?= $tl13->$tabel13_field1; ?>">
              <i class="fas fa-edit"></i></a>
            <a class="btn btn-light text-danger" onclick="return confirm('Hapus data <?= $tabel13 ?>?')"
              href="<?= site_url('tabel13/hapus/' . $tl13->$tabel13_field1) ?>">
              <i class="fas fa-trash"></i></a>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $tabel13_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('tabel13/tambah') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label><?= $tabel13_field2_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel13_field2_input ?>"
              placeholder="Masukkan <?= $tabel13_field2_alias ?>">
          </div>

          <div class="form-group">
            <label><?= $tabel13_field3_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel13_field3_input ?>"
              placeholder="Masukkan <?= $tabel13_field3_alias ?>">
          </div>

          <div class="form-group">
            <label><?= $tabel13_field4_alias ?></label>
            <input class="form-control-file" required type="file" name="<?= $tabel13_field4_input ?>">

          </div>

          <div class="form-group">
            <label><?= $tabel13_field5_alias ?></label>
            <textarea class="form-control" name="<?= $tabel13_field5_input ?>" placeholder="Masukkan <?= $tabel13_field5_alias ?>" required cols="30" rows="10"></textarea>
          </div>

        </div>

        <!-- memunculkan notifikasi modal -->
        <p id="p_tambah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- modal edit foto-->
<?php foreach ($tbl13 as $tl13): ?>
  <div id="ubah<?= $tl13->$tabel13_field1; ?>" class="modal fade foto">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tl13->$tabel13_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('tabel13/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label><?= $tabel13_field2_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel13_field2_input ?>"
                value="<?= $tl13->$tabel13_field2; ?>">
              <input type="hidden" name="<?= $tabel13_field1_input ?>" value="<?= $tl13->$tabel13_field1; ?>">
              * Meski ingin mengubah <?= $tabel13_field2_alias ?> saja, tetap harus mengupload ulang
              <?= $tabel13_field3_alias ?> juga
            </div>

            <div class="form-group">
              <label><?= $tabel13_field3_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel13_field3_input ?>"
                value="<?= $tl13->$tabel13_field3; ?>">
            </div>

            <div class="form-group">
              <img src="img/tabel13/<?= $tl13->$tabel13_field4; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel13_field4_alias ?></label>
              <input class="form-control-file" type="file" name="<?= $tabel13_field4_input ?>">
              <input type="hidden" name="<?= $tabel13_field4_alt ?>" value="<?= $tl13->$tabel13_field4; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel13_field3_alias ?></label>
              <textarea class="form-control" name="<?= $tabel13_field5_input ?>" placeholder="Masukkan <?= $tabel13_field5_alias ?>" required cols="30"
                rows="10"><?= $tl13->$tabel13_field5; ?></textarea>
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
<?php endforeach; ?>


<!-- modal lihat -->
<?php foreach ($tbl13 as $tl13): ?>
  <div id="lihat<?= $tl13->$tabel13_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel13_alias ?>   <?= $tl13->$tabel13_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel13_field1_alias ?> : </label>
              <p><?= $tl13->$tabel13_field1; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel13_field2_alias ?> : </label>
              <p><?= $tl13->$tabel13_field2; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel13_field3_alias ?> : </label>
              <p><?= $tl13->$tabel13_field3; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel13_field4_alias ?> : </label>
            </div>
            <div class="form-group">
              <img src="img/tabel13/<?= $tl13->$tabel13_field4; ?>" width="450">
            </div>

            <div class="form-group">
              <label><?= $tabel13_field5_alias ?> : </label>
              <p><?= $tl13->$tabel13_field5; ?></p>
            </div>
            <hr>


          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>