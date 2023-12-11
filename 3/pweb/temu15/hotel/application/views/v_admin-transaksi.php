<?php if ($this->session->userdata('level') <> 'accounting') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1>Daftar Transaksi</h1>
<hr>

<!-- Tabel filter tanggal transaksi -->
<table class="mb-4">
  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <!-- Mengecek data menggunakan tanggal cek in -->
  <form action="<?= site_url('transaksi/filter') ?>" method="get">
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
        <a class="btn btn-light text-info" type="button" href="<?= site_url('transaksi') ?>">
          <i class="fas fa-redo"></i></a>
      </td>
    </tr>
  </form>
</table>

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
        <td>Rp <?= number_format($tr->bayar, '2', ',', '.') ?></td>
        <td><?= $tr->tgl_transaksi ?></td>
        <td>
          <a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tr->id_transaksi ?>">
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
      <th>Id Pesanan</th>
      <th>Metode</th>
      <th>Bayar</th>
      <th>Tanggal Transaksi</th>
      <th>Aksi</th>
    </tr>
  </tfoot>


</table>

<!-- modal lihat -->
<?php foreach ($transaksi as $tr) : ?>
  <div id="lihat<?= $tr->id_transaksi ?>" class="modal fade" role="dialog">
    <?php foreach ($pesanan as $ps) : ?>
      <?php foreach ($tipe_kamar as $tk) : ?>
        <?php if ($tr->id_pesanan === $ps->id_pesanan || $tk->id_tipe === $ps->id_tipe) { ?>
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
                      <p>Rp <?= number_format($tr->bayar, '2', ',', '.') ?></p>
                    </div>
                  </div>

                  <!-- Di sini adalah bagian menampilkan data pesanan -->



                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Tamu</label>
                      <p><?= $ps->tamu ?></p>
                    </div>

                    <div class="form-group">
                      <label>Tipe Kamar</label>
                      <p><?= $tk->tipe ?></p>
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

                </div>
              </div>

              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php endforeach ?>
    <?php endforeach ?>
  </div>
<?php endforeach ?>