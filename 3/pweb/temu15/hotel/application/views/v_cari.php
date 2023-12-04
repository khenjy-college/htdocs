<h1>Daftar Reservasi</h1>
Fitur sedang tahap pengembangan
<hr>

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

                <div class="form-group">
                  <label>Pemesan</label>
                  <p><?= $ps->pemesan ?></p>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <p><?= $ps->email ?></p>

                  <!-- Email ini digunakan untuk menambahkan sesi temporer untuk konfirmasi transaksi -->
                  <input type="hidden" name="email" value="<?= $ps->email ?>">
                </div>

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


              <!-- Input metode pembayaran -->

              <div class="col-md-12">


                <div class="form-group">
                  <label>Harga Total</label>
                  <p><?= $ps->harga_total ?></p>
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
                  <input class="form-control" type="number" required name="bayar" placeholder="Masukkan jumlah bayar" value="<?= $ps->harga_total ?>">
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
<?php foreach ($pesanan as $ps) : ?>
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

              <div class="form-group">
                <label>Pemesan</label>
                <p><?= $ps->pemesan ?></p>
              </div>

              <div class="form-group">
                <label>Email</label>
                <p><?= $ps->email ?></p>
              </div>

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
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>