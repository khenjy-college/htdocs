<?php if ($this->session->userdata('level') <> 'accounting') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<!-- Fitur filter di bawah saat ini akan kuhilangkan sementara -->
<!-- Tabel filter tanggal transaksi -->
<!-- <table class="mb-4">
   method get supaya nilai dari filter bisa tampil nanti 
  Mengecek data menggunakan tanggal cek in
  <form action="< site_url('transaksi/filter') ?>" method="get">
    <tr>
      <td class="pr-2">Tanggal Transaksi</td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Dari</span>
          </div>
          <input type="date" class="form-control" name="tgl_transaksi_min" value="<?= $tgl_transaksi_min ?>">
        </div>
      </td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Ke</span>
          </div>
          <input type="date" class="form-control" name="tgl_transaksi_max" value="<?= $tgl_transaksi_max ?>">
        </div>
      </td>

      <td>
        <button class="btn btn-light text-info" type="submit">
          <a type="submit"><i class="fas fa-search"></i></a>
        </button>
        <a class="btn btn-light text-info" type="button" href="< site_url('transaksi') ?>">
          <i class="fas fa-redo"></i></a>
      </td>
    </tr>
  </form>
</table> -->

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel10_field1_alias ?></th>
        <th><?= $tabel10_field4_alias ?></th>
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
          <td><?= $tl10->id_pesanan ?></td>
          <td><?= $tl10->metode ?></td>
          <td>Rp <?= number_format($tl10->bayar, '2', ',', '.') ?></td>
          <td><?= $tl10->tgl_transaksi ?></td>
          <td>
            <a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl10->id_transaksi ?>">
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
        <th><?= $tabel10_field4_alias ?></th>
        <th><?= $tabel10_field5_alias ?></th>
        <th><?= $tabel10_field6_alias ?></th>
        <th><?= $tabel10_field7_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot>


  </table>
</div>

<!-- modal lihat -->
<!-- Tabel transaksi dan tabel pesanan literally sudah bergabung
Jadi tidak perlu menambahkan foreach pesanan lagi -->
<?php foreach ($tabel10 as $tl10) : ?>
  <div id="lihat<?= $tl10->id_transaksi ?>" class="modal fade lihat" role="dialog">
    <?php foreach ($tabel6 as $tl6) : ?>
      <?php if ($tl6->id_tipe === $tl10->id_tipe) { ?>
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
                    <label><?= $tabel10_field4_alias ?></label>
                    <p><?= $tl10->id_pesanan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel10_field5_alias ?></label>
                    <p><?= $tl10->metode ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel10_field6_alias ?></label>
                    <p>Rp <?= number_format($tl10->bayar, '2', ',', '.') ?></p>
                  </div>
                </div>

                <!-- Di sini adalah bagian menampilkan data pesanan -->



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
      <?php } ?>
    <?php endforeach ?>
  </div>
<?php endforeach ?>