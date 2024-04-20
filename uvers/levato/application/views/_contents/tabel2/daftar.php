<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value3:
    // case $tabel9_field6_value4:
    break;
  case $tabel9_field6_value5:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<!-- method get supaya nilai dari filter bisa tampil nanti -->
<!-- tabel fiter history -->
<form action="<?= site_url('tabel2/filter_tabel4/admin') ?>" method="get">

  <div class="row">
    <div class="col-md-auto">
      <table class="mb-4">
        <!-- Mengecek data menggunakan tanggal cek in -->
        <tr>
          <td class="pr-2"><?= $tabel2_field11_alias ?></td>
          <td class="pr-2">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text">Dari</span>
              </div>
              <input type="date" class="form-control" name="<?= $tabel2_field11_filter1 ?>" value="<?= $tabel2_field11_filter1_value ?>">
            </div>
          </td>
          <td class="pr-2">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text">Ke</span>
              </div>
              <input type="date" class="form-control" name="<?= $tabel2_field11_filter2 ?>" value="<?= $tabel2_field11_filter2_value ?>">
            </div>
          </td>
        </tr>

        <!-- Mengecek data menggunakan tanggal cek out -->
        <!-- method get supaya nilai dari filter bisa tampil nanti -->
        <tr>

          <td class="pr-2"><?= $tabel2_field12_alias ?></td>
          <td class="pr-2">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text">Dari</span>
              </div>
              <input type="date" class="form-control" name="<?= $tabel2_field12_filter1 ?>" value="<?= $tabel2_field12_filter1_value ?>">

            </div>
          </td>
          <td class="pr-2">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text">Ke</span>
              </div>
              <input type="date" class="form-control" name="<?= $tabel2_field12_filter2 ?>" value="<?= $tabel2_field12_filter2_value ?>">
            </div>
          </td>
        </tr>
      </table>
    </div>
    <div class="col-md-auto">
      <div class="row">
        <div class="col-auto">
          <div class="input-group">
            <button class="btn btn-success text-light" type="submit">
              <a type="submit"><i class="fas fa-search"></i></a>
            </button>
          </div>
        </div>
        <div class="col-auto">
          <div class="input-group">
            <a class="btn btn-danger text-light" type="button" href="<?= site_url('tabel2/daftar') ?>">
              <i class="fas fa-redo"></i></a>
          </div>
        </div>
      </div>

    </div>

  </div>

</form>


<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel2_field2_alias ?></th>
        <th><?= $tabel2_field3_alias ?></th>
        <th><?= $tabel2_field4_alias ?></th>
        <th><?= $tabel2_field5_alias ?></th>
        <th><?= $tabel2_field6_alias ?></th>
        <th><?= $tabel2_field7_alias ?></th>
        <th><?= $tabel2_field8_alias ?></th>
        <th><?= $tabel2_field9_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tbl2 as $tl2) : ?>
        <?php foreach ($tbl6 as $tl6) : ?>
          <?php if ($tl6->$tabel6_field1 === $tl2->$tabel6_field1) { ?>
            <tr>
              <td></td>
              <td><?= $tl2->$tabel2_field2 ?></td>
              <td><?= $tl2->$tabel2_field3 ?></td>
              <td><?= $tl2->$tabel2_field4 ?></td>
              <td><?= $tl2->$tabel2_field5 ?></td>
              <td><?= $tl2->$tabel2_field6 ?></td>
              <td><?= $tl2->$tabel2_field7 ?></td>
              <td><?= $tl2->$tabel2_field8 ?></td>
              <td><?= $tl2->$tabel2_field9?></td>
              <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl2->$tabel2_field1 ?>">
                  <i class="fas fa-eye"></i></a>
              </td>
            </tr>
          <?php } ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>

<!-- modal lihat -->
<?php foreach ($tbl2 as $tl2) : ?>
  <?php foreach ($tbl6 as $tl6) : ?>
    <?php if ($tl6->$tabel6_field1 == $tl2->$tabel6_field1) { ?>
      <div id="lihat<?= $tl2->$tabel2_field1 ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel2_alias ?> <?= $tl2->$tabel2_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel2_field2_alias ?></label>
                    <p><?= $tl2->$tabel2_field2 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field4_alias ?></label>
                    <p><?= $tl2->$tabel2_field4 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field5_alias ?></label>
                    <p><?= $tl2->$tabel2_field5 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field6_alias ?></label>
                    <p><?= $tl2->$tabel2_field6 ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel2_field7_alias ?></label>
                    <p><?= $tl2->$tabel2_field7 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel6_field2_alias ?></label>
                    <p><?= $tl6->$tabel6_field2 ?></p>

                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field11_alias ?></label>
                    <p><?= $tl2->$tabel2_field11 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field12_alias ?></label>
                    <p><?= $tl2->$tabel2_field12 ?></p>
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
    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>