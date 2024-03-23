<?php switch ($this->session->userdata('level')) {
  case 'administrator':
    // case 'petugas':
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url() . $tabel5 . '/laporan' ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel5_field1_alias ?></th>
        <th><?= $tabel5_field2_alias ?></th>
        <th><?= $tabel5_field3_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl5 as $tl5) : ?>
        <tr>
          <td><?= $tl5->id_kelas; ?></td>
          <td><?= $tl5->nama_kelas ?></td>
          <td><?= $tl5->kompetensi_keahlian ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl5->id_kelas; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl5->id_kelas; ?>">
              <i class="fas fa-edit"></i></a>
        </tr>
      <?php endforeach; ?>
    </tbody>

    <tfoot>
      <tr>
        <th><?= $tabel5_field1_alias ?></th>
        <th><?= $tabel5_field2_alias ?></th>
        <th><?= $tabel5_field3_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot>
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

      <form action="<?= site_url() . $tabel5 . '/tambah' ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label><?= $tabel5_field2_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel5_field2 ?>" placeholder="Masukkan <?= $tabel5_field2_alias ?>">
          </div>

          <div class="form-group">
            <label><?= $tabel5_field3_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel5_field3 ?>" placeholder="Masukkan <?= $tabel5_field3_alias ?>">
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
  <div id="ubah<?= $tl5->id_kelas; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel5_alias ?> <?= $tl5->id_kelas; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url() . $tabel5 . '/update' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel5_field2_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel5_field2 ?>" value="<?= $tl5->nama_kelas; ?>">
              <input type="hidden" name="<?= $tabel5_field1 ?>" value="<?= $tl5->id_kelas; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel5_field3_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel5_field3 ?>" value="<?= $tl5->kompetensi_keahlian; ?>">
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
<?php foreach ($tbl5 as $tl5) : ?>
  <div id="lihat<?= $tl5->id_kelas; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel5_alias ?> <?= $tl5->id_kelas; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel5_field1_alias ?> : </label>
              <p><?= $tl5->id_kelas; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel5_field2_alias ?> : </label>
              <p><?= $tl5->nama_kelas; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel5_field3_alias ?> : </label>
              <p><?= $tl5->kompetensi_keahlian; ?></p>
            </div>
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