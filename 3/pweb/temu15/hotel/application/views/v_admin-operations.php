<?php if ($this->session->userdata('level') <> 'resepsionis') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<a class="btn btn-info mb-4" href="<?= site_url('operations/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel11_field1_alias ?></th>
        <th><?= $tabel11_field2_alias ?></th>
        <th><?= $tabel11_field3_alias ?></th>
        <th><?= $tabel11_field4_alias ?></th>
        <th><?= $tabel11_field5_alias ?></th>
        <th><?= $tabel11_field6_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tabel11 as $tl11) : ?>
        <tr>
          <td><?= $tl11->id_operations ?></td>
          <td><?= $tl11->no_kamar ?></td>
          <td><?= $tl11->id_user ?></td>
          <td><?= $tl11->id_petugas ?></td>
          <td><?= $tl11->keterangan ?></td>
          <td><?= $tl11->tgl_perubahan ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl11->id_operations ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-danger" onclick="return confirm('Hapus data operations?')" href="<?= site_url('operations/hapus/' . $tl11->id_operations) ?>">
              <i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th><?= $tabel11_field1_alias ?></th>
        <th><?= $tabel11_field2_alias ?></th>
        <th><?= $tabel11_field3_alias ?></th>
        <th><?= $tabel11_field4_alias ?></th>
        <th><?= $tabel11_field5_alias ?></th>
        <th><?= $tabel11_field6_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot>


  </table>
</div>

<!-- modal lihat -->
<?php foreach ($tabel11 as $tl11) : ?>
  <div id="lihat<?= $tl11->id_operations ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel11_alias ?> <?= $tl11->id_operations ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><?= $tabel11_field1_alias ?></label>
                <p><?= $tl11->id_operations ?></p>
              </div>
              <hr>

              <div class="form-group">
                <label><?= $tabel11_field2_alias ?></label>
                <p><?= $tl11->no_kamar ?></p>
              </div>
              <hr>

              <div class="form-group">
                <label><?= $tabel11_field3_alias ?></label>
                <p><?= $tl11->id_user ?></p>
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><?= $tabel11_field4_alias ?></label>
                <p><?= $tl11->id_petugas ?></p>
              </div>
              <hr>

              <div class="form-group">
                <label><?= $tabel11_field5_alias ?></label>
                <p><?= $tl11->keterangan ?></p>
              </div>
              <hr>

              <div class="form-group">
                <label><?= $tabel11_field6_alias ?></label>
                <p><?= $tl11->tgl_perubahan ?></p>
              </div>
            </div>
          </div>
        </div>

        <!-- memunculkan notifikasi modal -->
        <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>