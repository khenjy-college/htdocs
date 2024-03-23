<?php switch ($this->session->userdata('level')) {
    // case 'administrator':
    // case 'petugas':
  case 'siswa':
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

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
      <?php foreach ($tbl5 as $tl5) : ?>
        <?php foreach ($tbl6 as $tl6) : ?>
          <?php if ($tl5->id_spp == $tl6->id_spp) { ?>
            <tr>
              <td><?= $tl5->id_pembayaran ?></td>
              <td><?= $tl5->tipe ?></td>
              <td><?= $tl5->status ?></td>
              <td><?= $tl5->keterangan ?></td>
              <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl5->id_kelas; ?>">
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
<?php foreach ($tbl5 as $tl5) : ?>
  <div id="lihat<?= $tl5->id_kelas; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Kamar <?= $tl5->id_kelas; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Tipe Kamar : </label>
              <p><?= $tl5->tipe; ?></p>
            </div>

            <div class="form-group">
              <label>Nama Kamar : </label>
              <p><?= $tl5->nama; ?></p>
            </div>

            <img src="img/kelas/<?= $tl5->img; ?>" width="450">
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