<h1>Daftar Transaksi</h1>
Fitur sedang tahap pengembangan
<hr>
<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Id Transaksi</th>
      <th>Id Pesanan</th>
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
        <td><?= $tr->id_pesanan ?></td>
        <td><?= $tr->metode ?></td>
        <td><?= $tr->bayar ?></td>
        <td><?= $tr->tgl_transaksi ?></td>
        <td><a class="btn btn-light text-info" data-toggle="modal" data-target="#lihat<?= $tr->id_transaksi ?>" href="#">
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
      <th>Bayar</th>
      <th>Tanggal Transaksi</th>
      <th>Aksi</th>
    </tr>
  </tfoot>
</table>

<!-- modal lihat -->
<?php foreach ($transaksi as $tr) : ?>
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

              <div class="form-group">
                <label>Id Pesanan</label>
                <p><?= $tr->id_pesanan ?></p>
              </div>

              <div class="form-group">
                <label>Metode</label>
                <p><?= $tr->metode ?></p>
              </div>

              <div class="form-group">
                <label>Bayar</label>
                <p><?= $tr->bayar ?></p>
              </div>
            </div>

            <!-- Di sini adalah bagian menampilkan data pesanan -->

            <?php foreach ($pesanan as $ps) : ?>
              <?php if ($tr->id_pesanan === $ps->id_pesanan) { ?>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Tamu</label>
                    <p><?= $ps->tamu ?></p>
                  </div>

                  <div class="form-group">
                    <label>Tipe Kamar</label>
                    <p><?= $ps->tipe ?></p>
                  </div>

                  <div class="form-group">
                    <label>Tanggal Cek In</label>
                    <p><?= $ps->cek_in ?></p>
                  </div>

                  <div class="form-group">
                    <label>Tanggal Cek Out</label>
                    <p><?= $ps->cek_out ?></p>
                  </div>
                </div>
              <?php } ?>

            <?php endforeach ?>
          </div>
        </div>

        <div class="modal-footer">

          <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>