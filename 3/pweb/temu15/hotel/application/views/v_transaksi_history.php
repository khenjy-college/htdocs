<h1><?= $title ?><?= $phase ?></h1>
<hr>
<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel10_field1_alias ?></th>
        <th>Id history</th>
        <th><?= $tabel10_field5_alias ?></th>
        <th><?= $tabel10_field6_alias ?></th>
        <th><?= $tabel10_field7_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tabel10 as $tl10) : ?>
        <tr>
          <td><?= $tl10->id_transaksi ?></td>
          <td><?= $tl10->id_history ?></td>
          <td><?= $tl10->metode ?></td>
          <td><?= $tl10->bayar ?></td>
          <td><?= $tl10->tgl_transaksi ?></td>
          <td><a class="btn btn-light text-info" data-toggle="modal" data-target="#lihat<?= $tl10->id_transaksi ?>">
              <i class="fas fa-eye"></i></a>

            <a class="btn btn-light text-info" href="<?= site_url('transaksi/receipt/' . $tl10->id_transaksi) ?>" target="_blank">
              <i class="fas fa-receipt"></i></a>


          </td>
        </tr>
      <?php endforeach ?>
    </tbody>

    <tfoot>
      <tr>
        <th><?= $tabel10_field1_alias ?></th>
        <th>Id history</th>
        <th><?= $tabel10_field5_alias ?></th>
        <th><?= $tabel10_field6_alias ?></th>
        <th><?= $tabel10_field7_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>

<!-- modal lihat -->
<!-- Tabel transaksi dan tabel history literally sudah bergabung
Jadi tidak perlu menambahkan foreach hitory lagi -->
<?php foreach ($tabel10 as $tl10) : ?>
  <?php foreach ($tabel6 as $tl6) : ?>
    <?php if ($tl6->id_tipe === $tl10->id_tipe) { ?>
      <div id="lihat<?= $tl10->id_transaksi ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel10_alias ?> <?= $tl10->id_transaksi ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel10_field1_alias ?></label>
                    <p><?= $tl10->id_transaksi ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Id history</label>
                    <p><?= $tl10->id_history ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel10_field5_alias ?></label>
                    <p><?= $tl10->metode ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel10_field6_alias ?></label>
                    <p><?= $tl10->bayar ?></p>
                  </div>
                </div>

                <!-- Di sini adalah bagian menampilkan data history -->



                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel8_field6_alias ?></label>
                    <p><?= $tl10->tamu ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel6_field2_alias ?></label>
                    <p><?= $tl6->tipe ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field10_alias ?></label>
                    <p><?= $tl10->cek_in ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field11_alias ?></label>
                    <p><?= $tl10->cek_out ?></p>
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