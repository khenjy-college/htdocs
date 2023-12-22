<?php if ($this->session->userdata('level') <> 'tamu') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th><?= $tabel5_field1_alias ?></th>
      <th>Tipe Kamar</th>
      <th><?= $tabel5_field4_alias ?></th>
      <th><?= $tabel5_field5_alias ?></th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <form action="" method="get">
      <?php foreach ($kamar as $km) : ?>
        <?php foreach ($tipe_kamar as $tp) : ?>
          <?php if ($km->id_tipe == $tp->id_tipe) { ?>
            <tr>
              <td><?= $km->id_pesanan ?></td>
              <td><?= $km->tipe ?></td>
              <td><?= $km->status ?></td>
              <td><?= $km->keterangan ?></td>
              <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $km->no_kamar; ?>">
                  <i class="fas fa-eye"></i></a>
              </td>
            </tr>
          <?php } ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </form>
  </tbody>
  <tfoot>
    <tr>
      <th><?= $tabel5_field1_alias ?></th>
      <th>Tipe Kamar</th>
      <th><?= $tabel5_field4_alias ?></th>
      <th><?= $tabel5_field5_alias ?></th>
      <th>Aksi</th>
    </tr>
  </tfoot>


</table>

<!-- Modal Lihat -->
<?php foreach ($kamar as $km) : ?>
  <div id="lihat<?= $km->no_kamar; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Kamar <?= $km->no_kamar; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Tipe Kamar : </label>
              <p><?= $km->tipe; ?></p>
            </div>

            <div class="form-group">
              <label>Nama Kamar : </label>
              <p><?= $km->nama; ?></p>
            </div>

            <img src="img/kamar/<?= $km->img; ?>" width="450">
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