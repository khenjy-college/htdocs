<?php if ($this->session->userdata('level') <> 'resepsionis') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url('pesanan/filter') ?>" method="get">
    <tr>

      <td class="pr-2">Cek In</td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Dari</span>
          </div>
          <input type="date" class="form-control" name="cek_in_min" value="<?= $cek_in_min ?>">
        </div>
      </td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Ke</span>
          </div>
          <input type="date" class="form-control" name="cek_in_max" value="<?= $cek_in_max ?>">
        </div>
      </td>

      <td>
        <button class="btn btn-success" type="submit">
          <a type="submit"><i class="fas fa-search"></i></a>
        </button>
        <a class="btn btn-danger" type="button" href="<?= site_url('pesanan') ?>">
          <i class="fas fa-redo"></i></a>
      </td>

    </tr>


    <!-- Mengecek data menggunakan tanggal cek out -->
    <!-- method get supaya nilai dari filter bisa tampil nanti -->
    <tr>

      <td class="pr-2">Cek Out</td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Dari</span>
          </div>
          <input type="date" class="form-control" name="cek_out_min" value="<?= $cek_out_min ?>">

        </div>
      </td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Ke</span>
          </div>
          <input type="date" class="form-control" name="cek_out_max" value="<?= $cek_out_max ?>">
        </div>

      </td>


    </tr>
  </form>
</table>

<div class="table-responsive">
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

            <!-- tombol yang akan muncul berdasarkan nilai dari status -->
            <?php if ($ps->status == 'pending') { ?>
              <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#book">
                <i class="fas fa-bell-concierge"></i></a>
            <?php } elseif ($ps->status == 'menunggu') { ?>
              <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah">
                <i class="fas fa-edit"></i></a>
            <?php } elseif ($ps->status == 'cek in') { ?>
              <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah">
                <i class="fas fa-edit"></i></a>

            <?php } elseif ($ps->status == 'cek out') { ?>
              <a class="btn btn-light text-danger" onclick="return confirm('Hapus pesanan?')" href="<?= site_url('pesanan/hapus/' . $ps->id_pesanan) ?>">
                <i class="fas fa-trash"></i></a>
            <?php } ?>

            <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
            <a class="btn btn-light text-info" href="<?= site_url('pesanan/print/' . $ps->id_pesanan) ?>" target="_blank">
              <i class="fas fa-print"></i></a>

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
</div>

<!-- modal ubah -->
<?php foreach ($pesanan as $ps) : ?>
  <div id="ubah<?= $ps->id_pesanan ?>" class="modal fade">
    <?php foreach ($tipe_kamar as $tk) : ?>
      <?php if ($tk->id_tipe === $ps->id_tipe) { ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Pesanan <?= $ps->id_pesanan ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form untuk mengubah nilai status sebuah pesanan -->
            <form action="<?= site_url('pesanan/update_status') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Id Pesanan</label>
                      <p><?= $ps->id_pesanan ?></p>
                      <input type="hidden" name="id_pesanan" value="<?= $ps->id_pesanan; ?>">
                      <input type="hidden" name="id_tipe" value="<?= $ps->id_tipe; ?>">

                      <!-- input status berdasarkan nilai status -->
                      <!-- seharusnya jika status masih belum bayar, resepsionis tidak bisa melakukan apa-apa terhadap pesanan -->
                      <?php if ($ps->status == 'belum bayar') { ?>
                        <input type="hidden" name="status" value="menunggu">
                      <?php } elseif ($ps->status == 'menunggu') { ?>
                        <input type="hidden" name="status" value="cek in">
                      <?php } elseif ($ps->status == 'cek in') { ?>
                        <input type="hidden" name="status" value="cek out">
                      <?php } ?>

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
          
          <!-- memunculkan notifikasi modal -->
          <p id="p_ubah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

              <div class="modal-footer">

                <!-- pesan yg muncul berdasarkan nilai status -->
                <?php if ($ps->status == 'belum bayar') { ?>
                  <p>Selesaikan Dulu Transaksi</p>
                <?php } elseif ($ps->status == 'menunggu') { ?>
                  <p>Ubah Status Menjadi Cek In?</p>
                  <button class="btn btn-success" type="submit">Ya</button>
                <?php } elseif ($ps->status == 'cek in') { ?>
                  <p>Ubah Status Menjadi Cek Out?</p>
                  <button class="btn btn-success" type="submit">Ya</button>
                <?php } ?>

              </div>
            </form>

          </div>
        </div>
    <?php }
    endforeach; ?>
  </div>
<?php endforeach ?>

<!-- modal book -->
<?php foreach ($pesanan as $ps) : ?>
  <div id="book<?= $ps->id_pesanan ?>" class="modal fade">
    <?php foreach ($tipe_kamar as $tk) : ?>
      <?php if ($tk->id_tipe === $ps->id_tipe) { ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Pesanan <?= $ps->id_pesanan ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form untuk mengubah nilai status sebuah pesanan -->
            <form action="<?= site_url('pesanan/book') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Id Pesanan</label>
                      <p><?= $ps->id_pesanan ?></p>
                      <input type="hidden" name="id_pesanan" value="<?= $ps->id_pesanan; ?>">
                      <input type="hidden" name="id_tipe" value="<?= $ps->id_tipe; ?>">

                      <!-- input status berdasarkan nilai status -->
                      <!-- seharusnya jika status masih belum bayar, resepsionis tidak bisa melakukan apa-apa terhadap pesanan -->
                      <?php if ($ps->status == 'belum bayar') { ?>
                        <input type="hidden" name="status" value="menunggu">
                      <?php } elseif ($ps->status == 'menunggu') { ?>
                        <input type="hidden" name="status" value="cek in">
                      <?php } elseif ($ps->status == 'cek in') { ?>
                        <input type="hidden" name="status" value="cek out">
                      <?php } ?>

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
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Pilih kamar</label>
                      <select class="form-control" required name="no_kamar">

                        <!-- menampilkan nilai id_tipe kamar yang aktif -->
                        <option selected hidden value="">Pilih no kamar:</option>

                        <?php foreach ($kamar as $km) :
                          if ($ps->id_tipe == $km->id_tipe) {
                            if ($km->id_tipe == $tk->id_tipe) {
                              if ($km->status == 'Available') { ?>

                                <option value="<?= $km->no_kamar ?>"><?= $km->no_kamar; ?> - <?= $tk->tipe ?></option>

                        <?php }
                            }
                          }
                        endforeach; ?>

                      </select>
                      <p>*Jika tidak ada, berarti semua kamar full</p>
                      <input type="hidden" name="status" value="belum bayar">
                    </div>
                  </div>
                </div>

              </div>
          
          <!-- memunculkan notifikasi modal -->
          <p id="p_book" class="small text-center text-danger"><?= $this->session->flashdata('pesan_book') ?></p>

              <div class="modal-footer">

                <p>Pesan kamar?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>

    <?php }
    endforeach ?>
  </div>
<?php endforeach ?>