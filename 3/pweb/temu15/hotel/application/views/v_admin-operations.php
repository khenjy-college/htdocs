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
        <th>Id Operations</th>
        <th>No Kamar</th>
        <th>Id User</th>
        <th>Id Petugas</th>
        <th>Keterangan</th>
        <th>Tanggal Perubahan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($operations as $o) : ?>
        <tr>
          <td><?= $o->id_operations ?></td>
          <td><?= $o->no_kamar ?></td>
          <td><?= $o->id_user ?></td>
          <td><?= $o->id_petugas ?></td>
          <td><?= $o->keterangan ?></td>
          <td><?= $o->tgl_perubahan ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-danger" onclick="return confirm('Hapus data operations?')" href="<?= site_url('operations/hapus/' . $o->id_operations) ?>">
              <i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Id Operations</th>
        <th>No Kamar</th>
        <th>Id User</th>
        <th>Id Petugas</th>
        <th>Keterangan</th>
        <th>Tanggal Perubahan</th>
        <th>Aksi</th>
      </tr>
    </tfoot>


  </table>
</div>

<!-- modal lihat -->
<?php foreach ($operations as $o) : ?>
  <div id="lihat<?= $o->id_operations ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Operations <?= $o->id_operations ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Id Operasi</label>
                <p><?= $o->id_operations ?></p>
              </div>
              <hr>

              <div class="form-group">
                <label>No Kamar</label>
                <p><?= $o->no_kamar ?></p>
              </div>
              <hr>

              <div class="form-group">
                <label>Id User</label>
                <p><?= $o->id_user ?></p>
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Id Petugas</label>
                <p><?= $o->id_petugas ?></p>
              </div>
              <hr>

              <div class="form-group">
                <label>Keterangan</label>
                <p><?= $o->keterangan ?></p>
              </div>
              <hr>

              <div class="form-group">
                <label>Tanggal Perubahan</label>
                <p><?= $o->tgl_perubahan ?></p>
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