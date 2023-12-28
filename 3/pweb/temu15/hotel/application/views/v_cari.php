<!-- Website ini masih belum digunakan -->

<h1><?= $title ?><?= $phase ?></h1>
Fitur sedang tahap pengembangan
<hr>

<!-- modal bayar -->
<?php foreach ($tabel8 as $tl8) : ?>
  <div id="bayar<?= $tl8->id_pesanan ?>" class="modal fade bayar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Transaksi untuk Pesanan <?= $tl8->id_pesanan ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('transaksi/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel8_field1_alias ?></label>
                  <p><?= $tl8->id_pesanan ?></p>
                </div>

                <div class="form-group">
                  <label><?= $tabel8_field3_alias ?></label>
                  <p><?= $tl8->pemesan ?></p>
                </div>

                <div class="form-group">
                  <label><?= $tabel8_field4_alias ?></label>
                  <p><?= $tl8->email ?></p>

                  <!-- Email ini digunakan untuk menambahkan sesi temporer untuk konfirmasi transaksi -->
                  <input type="hidden" name="email" value="<?= $tl8->email ?>">
                </div>

                <div class="form-group">
                  <label><?= $tabel8_field5_alias ?></label>
                  <p><?= $tl8->hp ?></p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel8_field6_alias ?></label>
                  <p><?= $tl8->tamu ?></p>
                </div>

                <div class="form-group">
                  <label>Tipe Kamar</label>
                  <p><?= $tl8->tipe ?></p>
                </div>

                <div class="form-group">
                  <label><?= $tabel8_field10_alias ?></label>
                  <p><?= $tl8->cek_in ?></p>
                </div>

                <div class="form-group">
                  <label><?= $tabel8_field11_alias ?></label>
                  <p><?= $tl8->cek_out ?></p>
                </div>
              </div>


              <!-- Input metode pembayaran -->

              <div class="col-md-12">


                <div class="form-group">
                  <label><?= $tabel8_field9_alias ?></label>
                  <p><?= $tl8->harga_total ?></p>
                  <input type="hidden" name="id_pesanan" value="<?= $tl8->id_pesanan ?>">
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
                  <input class="form-control" type="number" required name="bayar" placeholder="Masukkan jumlah bayar" value="<?= $tl8->harga_total ?>">
                  <input type="hidden" name="status" value="menunggu">

                </div>
              </div>

            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_bayar" class="small text-center text-danger"><?= $this->session->flashdata('pesan_bayar') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Bayar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach ?>

<!-- modal lihat -->
<?php foreach ($tabel8 as $tl8) : ?>
  <div id="lihat<?= $tl8->id_pesanan ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel8_alias ?> <?= $tl8->id_pesanan ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><?= $tabel8_field1_alias ?></label>
                <p><?= $tl8->id_pesanan ?></p>
              </div>

              <div class="form-group">
                <label><?= $tabel8_field3_alias ?></label>
                <p><?= $tl8->pemesan ?></p>
              </div>

              <div class="form-group">
                <label><?= $tabel8_field4_alias ?></label>
                <p><?= $tl8->email ?></p>
              </div>

              <div class="form-group">
                <label><?= $tabel8_field5_alias ?></label>
                <p><?= $tl8->hp ?></p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><?= $tabel8_field6_alias ?></label>
                <p><?= $tl8->tamu ?></p>
              </div>

              <div class="form-group">
                <label><?= $tabel6_field2_alias ?></label>
                <p><?= $tl8->tipe ?></p>
              </div>

              <div class="form-group">
                <label><?= $tabel8_field10_alias ?></label>
                <p><?= $tl8->cek_in ?></p>
              </div>

              <div class="form-group">
                <label><?= $tabel8_field11_alias ?></label>
                <p><?= $tl8->cek_out ?></p>
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
<?php endforeach ?>