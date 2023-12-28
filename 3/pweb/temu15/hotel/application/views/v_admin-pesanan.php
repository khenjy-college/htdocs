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

      <td class="pr-2"><?= $tabel8_field10_alias ?></td>
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

      <td class="pr-2"><?= $tabel8_field11_alias ?></td>
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
        <th><?= $tabel8_field6_alias ?></th>
        <th><?= $tabel8_field10_alias ?></th>
        <th><?= $tabel8_field11_alias ?></th>
        <th><?= $tabel8_field12_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tabel8 as $tl8) : ?>
        <tr>
          <td><?= $tl8->tamu ?></td>
          <td><?= $tl8->cek_in ?></td>
          <td><?= $tl8->cek_out ?></td>
          <td><?= $tl8->status ?></td>

          <td>

            <!-- tombol yang akan muncul berdasarkan nilai dari status -->
            <?php if ($tl8->status == 'pending') { ?>
              <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#book<?= $tl8->id_pesanan ?>">
                <i class="fas fa-bell-concierge"></i></a>
            <?php } elseif ($tl8->status == 'menunggu') { ?>
              <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl8->id_pesanan ?>">
                <i class="fas fa-edit"></i></a>
            <?php } elseif ($tl8->status == 'cek in') { ?>
              <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl8->id_pesanan ?>">
                <i class="fas fa-edit"></i></a>

            <?php } elseif ($tl8->status == 'cek out') { ?>
              <a class="btn btn-light text-danger" onclick="return confirm('Hapus pesanan?')" href="<?= site_url('pesanan/hapus/' . $tl8->id_pesanan) ?>">
                <i class="fas fa-trash"></i></a>
            <?php } ?>

            <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
            <a class="btn btn-light text-info" href="<?= site_url('pesanan/print/' . $tl8->id_pesanan) ?>" target="_blank">
              <i class="fas fa-print"></i></a>

          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

    <tfoot>
      <tr>
        <th><?= $tabel8_field6_alias ?></th>
        <th><?= $tabel8_field10_alias ?></th>
        <th><?= $tabel8_field11_alias ?></th>
        <th><?= $tabel8_field12_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>

<!-- modal ubah -->
<?php foreach ($tabel8 as $tl8) : ?>
  <div id="ubah<?= $tl8->id_pesanan ?>" class="modal fade ubah">
    <?php foreach ($tabel6 as $tl6) : ?>
      <?php if ($tl6->id_tipe === $tl8->id_tipe) { ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Pesanan <?= $tl8->id_pesanan ?></h5>

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
                      <label><?= $tabel8_field1_alias ?></label>
                      <p><?= $tl8->id_pesanan ?></p>
                      <input type="hidden" name="id_pesanan" value="<?= $tl8->id_pesanan; ?>">
                      <input type="hidden" name="id_tipe" value="<?= $tl8->id_tipe; ?>">

                      <!-- input status berdasarkan nilai status -->
                      <!-- seharusnya jika status masih belum bayar, resepsionis tidak bisa melakukan apa-apa terhadap pesanan -->
                      <?php if ($tl8->status == 'belum bayar') { ?>
                        <input type="hidden" name="status" value="menunggu">
                      <?php } elseif ($tl8->status == 'menunggu') { ?>
                        <input type="hidden" name="status" value="cek in">
                      <?php } elseif ($tl8->status == 'cek in') { ?>
                        <input type="hidden" name="status" value="cek out">
                      <?php } ?>

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
                      <p><?= $tl8->tamu ?></p>
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
              <p id="p_ubah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

              <div class="modal-footer">

                <!-- pesan yg muncul berdasarkan nilai status -->
                <?php if ($tl8->status == 'belum bayar') { ?>
                  <p>Selesaikan Dulu Transaksi</p>
                <?php } elseif ($tl8->status == 'menunggu') { ?>
                  <p>Ubah Status Menjadi Cek In?</p>
                  <button class="btn btn-success" type="submit">Ya</button>
                <?php } elseif ($tl8->status == 'cek in') { ?>
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
<?php foreach ($tabel8 as $tl8) : ?>
  <div id="book<?= $tl8->id_pesanan ?>" class="modal fade book">
    <?php foreach ($tabel6 as $tl6) : ?>
      <?php if ($tl6->id_tipe === $tl8->id_tipe) { ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel8_alias ?> <?= $tl8->id_pesanan ?></h5>

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
                      <label><?= $tabel8_field1_alias ?></label>
                      <p><?= $tl8->id_pesanan ?></p>
                      <input type="hidden" name="id_pesanan" value="<?= $tl8->id_pesanan; ?>">
                      <input type="hidden" name="id_tipe" value="<?= $tl8->id_tipe; ?>">

                      <!-- input status berdasarkan nilai status -->
                      <!-- seharusnya jika status masih belum bayar, resepsionis tidak bisa melakukan apa-apa terhadap pesanan -->
                      <?php if ($tl8->status == 'belum bayar') { ?>
                        <input type="hidden" name="status" value="menunggu">
                      <?php } elseif ($tl8->status == 'menunggu') { ?>
                        <input type="hidden" name="status" value="cek in">
                      <?php } elseif ($tl8->status == 'cek in') { ?>
                        <input type="hidden" name="status" value="cek out">
                      <?php } ?>

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
                      <p><?= $tl8->tamu ?></p>
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
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Pilih <?= $tabel5_field1_alias ?></label>

                      <div class="row">

                        <!-- <select class="form-control" required name="no_kamar"> -->
                        <!-- menampilkan nilai id_tipe kamar yang aktif -->
                        <!-- <option selected hidden value="">Pilih No Kamar:</option> -->
                        <!-- <option value="<?= $tl5->no_kamar ?>"><?= $tl5->no_kamar; ?> - <?= $tl6->tipe ?></option> -->
                        <!-- </select> -->

                        <?php foreach ($tabel5 as $tl5) :
                          if ($tl8->id_tipe == $tl5->id_tipe) {
                            if ($tl5->id_tipe == $tl6->id_tipe) {
                              if ($tl5->status == 'Available') { ?>

                                <div class="col-md-3 mb-4">

                                  <div class="card bg-light">
                                    <div class="card-body text-center">

                                      <div class="checkbox-group">
                                        <p class="card-text"><?= $tl5->no_kamar; ?></p>

                                        <div class="btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-primary">

                                            <input type="checkbox" name="no_kamar" id="option1" class="checkbox-option" value="<?= $tl5->no_kamar ?>" required>


                                          </label>
                                        </div>
                                      </div>

                                      <!-- <div style="margin-bottom: 20px;" class="form-check d-flex justify-content-center">
                                        <input class="custom-radio form-check-input" type="radio" id="radio_1" name="no_kamar" value="<?= $tl5->no_kamar ?>" required>
                                      </div> -->

                                    </div>
                                  </div>

                                </div>


                        <?php }
                            }
                          }
                        endforeach; ?>

                      </div>


                      <p>*Jika tidak ada, berarti semua <?= $tabel5_alias ?> full</p>
                      <input type="hidden" name="status" value="belum bayar">
                    </div>
                  </div>
                </div>

              </div>

              <!-- memunculkan notifikasi modal -->
              <p id="p_book" class="small text-center text-danger"><?= $this->session->flashdata('pesan_book') ?></p>

              <div class="modal-footer">

                <p>Pesan <?= $tabel5_alias ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>

    <?php }
    endforeach ?>
  </div>
<?php endforeach ?>