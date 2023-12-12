<h1><?= $title ?></h1>
Fitur sedang tahap pengembangan
<hr>
<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Id Transaksi</th>
      <th>Id history</th>
      <th>Metode</th>
      <th>Bayar</th>
      <th>Tanggal Transaksi</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($transaksi as $tr) : ?>
      <tr>
        <td><?= $tr->id_transaksi ?></td>
        <td><?= $tr->id_history ?></td>
        <td><?= $tr->metode ?></td>
        <td><?= $tr->bayar ?></td>
        <td><?= $tr->tgl_transaksi ?></td>
        <td><a class="btn btn-light text-info" data-toggle="modal" data-target="#lihat<?= $tr->id_transaksi ?>">
            <i class="fas fa-eye"></i></a>

          <a class="btn btn-light text-info" href="<?= site_url('transaksi/receipt/' . $tr->id_transaksi) ?>" target="_blank">
            <i class="fas fa-receipt"></i></a>


        </td>
      </tr>
    <?php endforeach ?>
  </tbody>

  <tfoot>
    <tr>
      <th>Id Transaksi</th>
      <th>Id Pemesan</th>
      <th>Metode</th>
      <th>Bayar</th>
      <th>Tanggal Transaksi</th>
      <th>Aksi</th>
    </tr>
  </tfoot>
</table>

<!-- modal lihat -->
<!-- Tabel transaksi dan tabel history literally sudah bergabung
Jadi tidak perlu menambahkan foreach hitory lagi -->
<?php foreach ($transaksi as $tr) : ?>
  <?php foreach ($tipe_kamar as $tk) : ?>
    <?php if ($tk->id_tipe === $tr->id_tipe) { ?>
      <div id="lihat<?= $tr->id_transaksi ?>" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Transaksi <?= $tr->id_transaksi ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Id Transaksi</label>
                    <p><?= $tr->id_transaksi ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Id history</label>
                    <p><?= $tr->id_history ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Metode</label>
                    <p><?= $tr->metode ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Bayar</label>
                    <p><?= $tr->bayar ?></p>
                  </div>
                </div>

                <!-- Di sini adalah bagian menampilkan data history -->



                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Tamu</label>
                    <p><?= $tr->tamu ?></p>
                  </div>
                    <hr>

                  <div class="form-group">
                    <label>Tipe Kamar</label>
                    <p><?= $tk->tipe ?></p>
                  </div>
                    <hr>

                  <div class="form-group">
                    <label>Tanggal Cek In</label>
                    <p><?= $tr->cek_in ?></p>
                  </div>
                    <hr>

                  <div class="form-group">
                    <label>Tanggal Cek Out</label>
                    <p><?= $tr->cek_out ?></p>
                  </div>
                </div>

              </div>
            </div>

            <div class="modal-footer">

              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>