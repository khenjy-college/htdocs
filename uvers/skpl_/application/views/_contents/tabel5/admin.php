<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value3:
  case $tabel9_field6_value4:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('tabel5/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel5_field1_alias ?></th>
        <th><?= $tabel5_field4_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl5 as $tl5) : ?>
            <tr>
              <td></td>
              <td><?= $tl5->$tabel5_field1; ?></td>
              <td><?= $tl5->$tabel5_field4 ?></td>
              <td>
                <a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl5->$tabel5_field1; ?>">
                  <i class="fas fa-eye"></i>
                </a>
              </td>
            </tr>
      <?php endforeach; ?>
    </tbody>

    <!-- <tfoot>
      <tr>
        <th>No</th>
        <th><?= $tabel5_field1_alias ?></th>
        <th><?= $tabel5_field2_alias ?></th>
        <th><?= $tabel5_field4_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot> -->
  </table>
</div>



<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $tabel5_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('tabel5/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

         <div class="form-group">
            <label><?= $tabel5_field4_alias ?></label>
            <select class="form-control" required name="<?= $tabel5_field4_input ?>">
              <option selected hidden value="">Pilih <?= $tabel5_field4_alias ?>...</option>

              <!-- memilih nilai status -->
              <option value="<?= $tabel5_field4_value2 ?>"><?= $tabel5_field4_value2_alias ?></option>
              <option value="<?= $tabel5_field4_value4 ?>"><?= $tabel5_field4_value4_alias ?></option>
              <option value="<?= $tabel5_field4_value5 ?>"><?= $tabel5_field4_value5_alias ?></option>

            </select>
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

<!-- modal edit -->
<?php foreach ($tbl5 as $tl5) : ?>
  <?php foreach ($tbl6 as $tl6) : ?>
    <?php if ($tl6->$tabel5_field2 == $tl5->$tabel5_field2) { ?>
      <div id="ubah<?= $tl5->$tabel5_field1; ?>" class="modal fade ubah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit <?= $tabel5_alias ?> <?= $tl5->$tabel5_field1; ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <form action="<?= site_url('tabel5/update') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">

                  
                </div>

                <div class="form-group">
                  <label><?= $tabel5_field4_alias ?></label>
                  <select class="form-control" required name="<?= $tabel5_field4_input ?>">
                    <option selected hidden value="<?= $tl5->$tabel5_field4; ?>"><?= $tl5->$tabel5_field4; ?></option>

                    <!-- memilih nilai status -->
                    <option value="<?= $tabel5_field4_value4 ?>"><?= $tabel5_field4_value4_alias ?></option>
                    <option value="<?= $tabel5_field4_value5 ?>"><?= $tabel5_field4_value5_alias ?></option>

                  </select>
                  <input type="hidden" name="<?= $tabel5_field1_input ?>" value="<?= $tl5->$tabel5_field1; ?>">
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
    <?php } ?>
  <?php endforeach; ?>
<?php endforeach; ?>

<!-- Modal Lihat -->
<?php foreach ($tbl5 as $tl5) : ?>
  <?php foreach ($tbl6 as $tl6) : ?>
    <?php if ($tl6->$tabel5_field2 == $tl5->$tabel5_field2) { ?>

      <div id="lihat<?= $tl5->$tabel5_field1; ?>" class="modal fade lihat" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel5_alias ?> <?= $tl5->$tabel5_field1; ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <form>
              <div class="modal-body">

                <div class="form-group">
                  <label><?= $tabel5_field4_alias ?> : </label>
                  <p><?= $tl5->$tabel5_field4; ?></p>
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
    <?php } ?>
  <?php endforeach; ?>
<?php endforeach; ?>
