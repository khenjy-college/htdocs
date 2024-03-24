<h1><?= $title ?><?= $phase ?></h1>
<hr>


<div class="table-responsive">
<table class="table table-light" id="data">
        <thead class="thead-light">
          <tr>
            <th><?= $tabel8_field1_alias ?></th>
            <th><?= $tabel8_field2_alias ?></th>
            <th><?= $tabel8_field3_alias ?></th>
            <th><?= $tabel8_field4_alias ?></th>
            <th><?= $tabel8_field5_alias ?></th>
            <th><?= $tabel8_field6_alias ?></th>
            <th><?= $tabel8_field7_alias ?></th>
            <th><?= $tabel8_field8_alias ?></th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

          <?php foreach ($tbl8 as $tl8) : ?>
            <tr>
              <td><?= $tl8->id_pembayaran ?></td>
              <td><?= $tl8->id_petugas ?></td>
              <td><?= $tl8->nisn ?></td>
              <td><?= $tl8->tgl_bayar ?></td>
              <td><?= $tl8->bulan_dibayar ?></td>
              <td><?= $tl8->tahun_dibayar ?></td>
              <td><?= $tl8->id_spp ?></td>
              <td>Rp <?= number_format($tl8->jumlah_bayar, '2', ',', '.') ?></td>

              <td>

                <!-- tombol yang akan muncul berdasarkan nilai dari status -->
                <!-- switch ($tl8->status) {
              case 'pending': ?>
                <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#book<?= $tl8->id_pembayaran ?>">
                  <i class="fas fa-bell-concierge"></i></a>
               break;

              case 'menungggu': ?>
                <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl8->id_pembayaran ?>">
                  <i class="fas fa-edit"></i></a>
               break;

              case 'cek in': ?>
                <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl8->id_pembayaran ?>">
                  <i class="fas fa-edit"></i></a>
               break;

              case 'cek out': ?>
                <a class="btn btn-light text-danger" onclick="return confirm('Hapus pembayaran?')" href="<?= site_url($tabel8.'/hapus/' . $tl8->id_pembayaran) ?>">
                  <i class="fas fa-trash"></i></a>
               break;

              default: ?>
             } ?> -->

                <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
                <a class="btn btn-light text-info" href="<?= site_url($tabel8.'/print/' . $tl8->id_pembayaran) ?>" target="_blank">
                  <i class="fas fa-print"></i></a>

              </td>

            </tr>
          <?php endforeach ?>
        </tbody>

        <tfoot>
          <tr>
            <th><?= $tabel8_field1_alias ?></th>
            <th><?= $tabel8_field2_alias ?></th>
            <th><?= $tabel8_field3_alias ?></th>
            <th><?= $tabel8_field4_alias ?></th>
            <th><?= $tabel8_field5_alias ?></th>
            <th><?= $tabel8_field6_alias ?></th>
            <th><?= $tabel8_field7_alias ?></th>
            <th><?= $tabel8_field8_alias ?></th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
</div>

<!-- modal bayar -->
<?php foreach ($tbl8 as $tl8) : ?>

  <div id="bayar<?= $tl8->id_pembayaran ?>" class="modal fade bayar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Transaksi untuk Pesanan <?= $tl8->id_pembayaran ?></h5>

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
                  <p><?= $tl8->id_pembayaran ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field3_alias ?></label>
                  <p><?= $tl8->pemesan ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field4_alias ?></label>
                  <p><?= $tl8->email ?></p>

                  <!-- Email ini digunakan untuk menambahkan sesi temporer untuk konfirmasi transaksi -->
                  <input type="hidden" name="email" value="<?= $tl8->email ?>">
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field5_alias ?></label>
                  <p><?= $tl8->hp ?></p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel8_field6_alias ?></label>
                  <p><?= $tl8->siswa ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel6_field2_alias ?></label>
                  <?php foreach ($tbl6 as $tl6) :
                    if ($tl6->id_spp === $tl8->id_spp) { ?>
                      <p><?= $tl6->tipe ?></p>
                    <?php } ?>
                  <?php endforeach ?>

                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field10_alias ?></label>
                  <p><?= $tl8->cek_in ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field11_alias ?></label>
                  <p><?= $tl8->cek_out ?></p>
                </div>
              </div>


              <!-- Input metode pembayaran -->

              <div class="col-md-12">


                <div class="form-group">
                  <label><?= $tabel8_field9_alias ?></label>
                  <p>Rp <?= number_format($tl8->harga_total, '2', ',', '.') ?></p>
                  <input type="hidden" name="id_pembayaran" value="<?= $tl8->id_pembayaran ?>">
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
                  <input class="form-control" readonly type="number" required name="bayar" placeholder="Masukkan jumlah bayar" value="<?= $tl8->harga_total ?>">
                  <input type="hidden" name="status" value="menunggu">

                </div>
              </div>

            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
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
<?php foreach ($tbl8 as $tl8) :
  foreach ($tbl6 as $tl6) :
    if ($tl6->id_spp == $tl8->id_spp) { ?>

      <div id="lihat<?= $tl8->id_pembayaran ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel8_alias ?> <?= $tl8->id_pembayaran ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel8_field1_alias ?></label>
                    <p><?= $tl8->id_pembayaran ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field3_alias ?></label>
                    <p><?= $tl8->pemesan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field4_alias ?></label>
                    <p><?= $tl8->email ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field5_alias ?></label>
                    <p><?= $tl8->hp ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel8_field6_alias ?></label>
                    <p><?= $tl8->siswa ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel6_field2_alias ?></label>
                    <p><?= $tl6->tipe ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field10_alias ?></label>
                    <p><?= $tl8->cek_in ?></p>
                  </div>
                  <hr>

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
<?php }
  endforeach;
endforeach ?>


<!-- modal lihat kelas -->
<!-- Aku ingin merubah modal ini menjadi modal yang memberikan informasi khusus mengenai kelas yang sudah dipesan -->
<!-- Aku mau yang ada di sini isinya bagus dan interaktif -->
<?php foreach ($tbl8 as $tl8) :
  foreach ($tbl6 as $tl6) :
    if ($tl6->id_spp == $tl8->id_spp) { ?>

      <div id="kelas<?= $tl8->id_pembayaran ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel8_alias ?> <?= $tl8->id_pembayaran ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel8_field1_alias ?></label>
                    <p><?= $tl8->id_pembayaran ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field3_alias ?></label>
                    <p><?= $tl8->pemesan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field4_alias ?></label>
                    <p><?= $tl8->email ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field5_alias ?></label>
                    <p><?= $tl8->hp ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field6_alias ?></label>
                    <p><?= $tl8->siswa ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel6_field2_alias ?></label>
                    <p><?= $tl6->tipe ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <?php foreach ($tbl5 as $tl5) : ?>
                    <?php if ($tl8->id_pembayaran == $tl5->id_pembayaran) { ?>

                      <div class="form-group">
                        <label><?= $tabel5_field1_alias ?></label>
                        <p><?= $tl5->id_kelas ?></p>
                      </div>
                      <hr>

                  <?php }
                  endforeach ?>

                  <div class="form-group">
                    <label><?= $tabel8_field10_alias ?></label>
                    <p><?= $tl8->cek_in ?></p>
                  </div>
                  <hr>

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
<?php }
  endforeach;
endforeach ?>