<h1>Daftar Reservasi</h1>
<hr>


<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Tamu</th>
      <th>Tanggal Cek In</th>
      <th>Tanggal Cek Out</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($pesanan as $ps) : ?>
      <tr>
        <td><?= $ps->tamu ?></td>
        <td><?= $ps->cek_in ?></td>
        <td><?= $ps->cek_out ?></td>
        <td><?= $ps->status ?></td>
        <td>
          <a class="btn btn-light text-info" data-toggle="modal" data-target="#lihat<?= $ps->id_pesanan ?>" href="#">
            <i class="fas fa-eye"></i></a>
          <?php if ($ps->status == 'belum bayar') { ?>
            <a class="btn btn-danger text-light" data-toggle="modal" data-target="#bayar<?= $ps->id_pesanan ?>" href="#">
              <i class="fas fa-shopping-cart"></i></a>
          <?php } elseif (
            $ps->status == 'menunggu'
            || $ps->status == 'cek in'
          ) { ?>
            <a class="btn btn-light text-info" href="<?= site_url('pesanan/print/' . $ps->id_pesanan) ?>" target="_blank">
              <i class="fas fa-print"></i></a>

          <?php } ?>

        </td>
      </tr>
    <?php endforeach ?>
  </tbody>

  <tfoot>
    <tr>
      <th>Tamu</th>
      <th>Tanggal Cek In</th>
      <th>Tanggal Cek Out</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </tfoot>
</table>


<!-- modal bayar -->
<?php foreach ($pesanan as $ps) : ?>

  <div id="bayar<?= $ps->id_pesanan ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Transaksi untuk Pesanan <?= $ps->id_pesanan ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('transaksi/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Id Pesanan</label>
                  <p><?= $ps->id_pesanan ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label>Pemesan</label>
                  <p><?= $ps->pemesan ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label>Email</label>
                  <p><?= $ps->email ?></p>

                  <!-- Email ini digunakan untuk menambahkan sesi temporer untuk konfirmasi transaksi -->
                  <input type="hidden" name="email" value="<?= $ps->email ?>">
                </div>
                <hr>

                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <p><?= $ps->hp ?></p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Tamu</label>
                  <p><?= $ps->tamu ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label>Tipe Kamar</label>
                  <?php foreach ($tipe_kamar as $tk) :
                    if ($tk->id_tipe === $ps->id_tipe) { ?>
                      <p><?= $tk->tipe ?></p>
                    <?php } ?>
                  <?php endforeach ?>

                </div>
                <hr>

                <div class="form-group">
                  <label>Tanggal Cek In</label>
                  <p><?= $ps->cek_in ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label>Tanggal Cek Out</label>
                  <p><?= $ps->cek_out ?></p>
                </div>
              </div>


              <!-- Input metode pembayaran -->

              <div class="col-md-12">


                <div class="form-group">
                  <label>Harga Total</label>
                  <p>Rp <?= number_format($ps->harga_total, '2', ',', '.') ?></p>
                  <input type="hidden" name="id_pesanan" value="<?= $ps->id_pesanan ?>">
                </div>

                <div class="form-group">
                  <label>Metode Pembayaran</label>
                  <select class="form-control" required name="metode">
                    <option selected hidden value="">Pilih Metode Pembayaran...</option>
                    <option>debit</option>
                    <option>ewallet</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Jumlah Bayar</label>
                  <input class="form-control" readonly type="number" required name="bayar" placeholder="Masukkan jumlah bayar" value="<?= $ps->harga_total ?>">
                  <input type="hidden" name="status" value="menunggu">

                </div>
              </div>

            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Bayar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach ?>

<!-- modal lihat -->
<?php foreach ($pesanan as $ps) :
  foreach ($tipe_kamar as $tk) :
    if ($tk->id_tipe == $ps->id_tipe) { ?>
      <div id="lihat<?= $ps->id_pesanan ?>" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Pesanan <?= $ps->id_pesanan ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Id Pesanan</label>
                    <p><?= $ps->id_pesanan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Pemesan</label>
                    <p><?= $ps->pemesan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Email</label>
                    <p><?= $ps->email ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Nomor Telepon</label>
                    <p><?= $ps->hp ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Tamu</label>
                    <p><?= $ps->tamu ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Tipe Kamar</label>
                    <p><?= $tk->tipe ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Tanggal Cek In</label>
                    <p><?= $ps->cek_in ?></p>
                  </div>
                  <hr>

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
      </div>
<?php }
  endforeach;
endforeach ?>