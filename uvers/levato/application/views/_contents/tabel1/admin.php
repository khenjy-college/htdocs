<?php switch ($this->session->userdata($base_url . $tabel9_field6)) {
  case $tabel9_field6_value3:
    case $tabel9_field6_value4:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<a class="btn btn-info mb-4" href="<?= site_url('tabel1/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel1_field1_alias ?></th>
        <th><?= $tabel1_field2_alias ?></th>
        <th><?= $tabel1_field3_alias ?></th>
        <th><?= $tabel1_field4_alias ?></th>
        <th><?= $tabel1_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl1 as $tl1) : ?>
        <tr>
          <td></td>
          <td><?= $tl1->$tabel1_field1; ?></td>
          <td><?= $tl1->$tabel1_field2 ?></td>
          <td><?= $tl1->$tabel1_field3 ?></td>
          <td><?= $tl1->$tabel1_field4 ?></td>
          <td><?= $tl1->$tabel1_field5 ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl1->$tabel1_field1; ?>">
              <i class="fas fa-eye"></i></a>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>


<!-- modal lihat -->
<?php foreach ($tbl1 as $tl1) : ?>
  <div id="lihat<?= $tl1->$tabel1_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel1_alias ?> <?= $tl1->$tabel1_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel1_field1_alias ?> : </label>
              <p><?= $tl1->$tabel1_field1; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel1_field2_alias ?> : </label>
              <p><?= $tl1->$tabel1_field2; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel1_field3_alias ?> : </label>
              <p><?= $tl1->$tabel1_field3; ?></p>
            </div>

            <div class="form-group">
              <label><?= $tabel1_field4_alias ?> : </label>
              <p><?= $tl1->$tabel1_field4; ?></p>
            </div>

            <div class="form-group">
              <label><?= $tabel1_field5_alias ?> : </label>
              <p><?= $tl1->$tabel1_field5; ?></p>
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