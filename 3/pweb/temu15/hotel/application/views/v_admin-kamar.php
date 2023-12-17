<?php if ($this->session->userdata('level') <> 'resepsionis') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('kamar/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No Kamar</th>
        <th>Tipe Kamar</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($kamar as $km) : ?>
        <?php foreach ($tipe_kamar as $tp) : ?>
          <?php if ($tp->id_tipe == $km->id_tipe) { ?>
            <tr>
              <td><?= $km->no_kamar; ?></td>
              <td><?= $tp->tipe ?></td>
              <td><?= $km->status ?></td>
              <td><?= $km->keterangan ?></td>
              <td>
                <a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $km->no_kamar; ?>">
                  <i class="fas fa-eye"></i></a>
                <?php if ($km->status == 'Available') { ?>
                  <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $km->no_kamar; ?>">
                    <i class="fas fa-edit"></i></a>
                <?php } elseif ($km->status == 'Unavailable') { ?>
                  <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $km->no_kamar; ?>">
                    <i class="fas fa-edit"></i></a>
                <?php } elseif ($km->status == 'Dirty') { ?>
                  <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#clean<?= $km->no_kamar; ?>">
                    <i class="fas fa-broom"></i></a>
                <?php } elseif ($km->status == 'Damaged') { ?>
                  <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#maintenance<?= $km->no_kamar; ?>">
                    <i class="fas fa-hammer"></i></a>

                <?php } ?>

                <!-- Saat ini tidak masuk akal untuk menambahkan fitur untuk menghapus kamar -->
                <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus data fasilitas?')" href="<?= site_url('kamar/hapus/' . $km->no_kamar) ?>">
            <i class="fas fa-trash"></i></a> -->
              </td>
            </tr>
          <?php } ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </tbody>

    <tfoot>
      <tr>
        <th>No Kamar</th>
        <th>Tipe Kamar</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>



<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kamar</h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('kamar/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- memilih salah satu tipe kamar yang ada -->
          <div class="form-group">
            <label>Tipe Kamar</label>
            <select class="form-control" required name="id_tipe">
              <option selected hidden value="">Pilih Tipe Kamar...</option>
              <?php foreach ($tipe_kamar as $tp) : ?>

                <!-- mengambil nilai tipe dari tipe kamar -->
                <option value="<?= $tp->id_tipe ?>"><?= $tp->tipe; ?></option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            <label>Status</label>
            <select class="form-control" required name="status">
              <option selected hidden value="">Pilih Status Kamar...</option>

              <!-- memilih nilai status -->
              <option value="Available">Available</option>
              <option value="Dirty">Dirty</option>
              <option value="Damaged">Damaged</option>

            </select>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" placeholder="Masukkan keterangan"></textarea>
          </div>

        </div>
          
          <!-- memunculkan notifikasi modal -->
          <p id="p_tambah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($kamar as $km) : ?>
  <?php foreach ($tipe_kamar as $tp) : ?>
    <?php if ($tp->id_tipe == $km->id_tipe) { ?>
      <div id="ubah<?= $km->no_kamar; ?>" class="modal fade ubah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Kamar <?= $km->no_kamar; ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <form action="<?= site_url('kamar/update') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">

                  <!-- memilih salah satu tipe kamar yang ada -->
                  <label>Tipe Kamar</label>
                  <input class="form-control" type="text" readonly name="tipe" value="<?= $tp->tipe ?>">
                  <input type="hidden" name="id_tipe" value="<?= $tp->id_tipe ?>">


                  <!-- Fitur di bawah ini masuk harus dibahas kembali
                  Apakah bisa mengubah id_tipe tipe kamar atau tidak
                  Mengingat pengalaman kerja di PT LSI dulu
                  Jika mengubah parent table, maka child tabel tidak akan terlalu berpengaruh  -->
                  <!-- <select class="form-control" required name="id_tipe">

                     menampilkan nilai tipe kamar yang aktif
                    <option selected hidden value="< $tp->id_tipe ?>">< $tp->tipe; ?></option>

                    < foreach ($tipe_kamar as $tp) : ?>
                      <option value value="<$tp->id_tipe ?>">< $tp->tipe; ?></option>
                    < endforeach ?>
                  </select> -->

                </div>

                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" required name="status">
                    <option selected hidden value="<?= $km->status; ?>"><?= $km->status; ?></option>

                    <!-- memilih nilai status -->
                    <option value="Dirty">Dirty</option>
                    <option value="Damaged">Damaged</option>

                  </select>
                  <input type="hidden" name="no_kamar" value="<?= $km->no_kamar; ?>">
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="keterangan" rows="3"><?= $km->keterangan; ?></textarea>
                </div>

              </div>
          
          <!-- memunculkan notifikasi modal -->
          <p id="p_ubah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

              <div class="modal-footer">
                <button class="btn btn-success" type="submit">Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach; ?>
<?php endforeach; ?>

<!-- Modal Lihat -->
<?php foreach ($kamar as $km) : ?>
  <?php foreach ($tipe_kamar as $tp) : ?>
    <?php if ($tp->id_tipe == $km->id_tipe) { ?>

      <div id="lihat<?= $km->no_kamar; ?>" class="modal fade lihat" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Kamar <?= $km->no_kamar; ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <form>
              <div class="modal-body">
                <div class="form-group">
                  <label>Tipe Kamar : </label>
                  <p><?= $tp->tipe; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label>Status : </label>
                  <p><?= $km->status; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label>Keterangan : </label>
                  <p><?= $km->keterangan; ?></p>
                </div>

              </div>
          
          <!-- memunculkan notifikasi modal -->
          <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach; ?>
<?php endforeach; ?>


<!-- modal clean -->
<?php foreach ($kamar as $km) : ?>
  <?php foreach ($tipe_kamar as $tp) : ?>
    <?php if ($tp->id_tipe == $km->id_tipe) { ?>
      <div id="clean<?= $km->no_kamar ?>" class=" clean">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Assign Petugas untuk Kamar <?= $km->no_kamar ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form untuk mengubah nilai status sebuah kamar -->
            <form action="<?= site_url('operations/tambah') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Id Kamar</label>
                      <p><?= $km->no_kamar ?></p>
                      <input type="hidden" name="no_kamar" value="<?= $km->no_kamar; ?>">
                      <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label>Tipe Kamar : </label>
                      <p><?= $tp->tipe; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label>Status : </label>
                      <p><?= $km->status; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <img src="img/tipe_kamar/<?= $tp->img; ?>" width="200">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label>Keterangan : </label>
                      <p><?= $km->keterangan; ?></p>
                    </div>

                    <!-- mengubah status kamar secara instan berdasarkan id_pesanan -->
                    <!-- jika id pesanan itu kosong, berarti belum ada yang pesan dan kamar menjadi Available
                jika sebaliknya, maka kamar akan menjadi Unavailable -->
                    <?php if ($km->id_pesanan <> 0) { ?>
                      <input type="hidden" name="status" value="Unavailable">
                    <?php } else { ?>
                      <input type="hidden" name="status" value="Available">
                    <?php } ?>
                  </div>

                  <div class="col-md-6">
                    <!-- ini adalah fitur untuk assign petugas -->
                    <div class="form-group">
                      <label>Petugas</label>
                      <select class="form-control" required name="id_petugas">

                        <!-- menampilkan petugas buat assign -->
                        <option selected hidden>Pilih petugas...</option>
                        <?php
                        foreach ($petugas as $pt) :
                          if ($pt->role == 'cleaning') { ?>
                            <option value="<?= $pt->id_petugas; ?>"><?= $pt->nama; ?> - <?= $pt->role; ?></option>
                        <?php }
                        endforeach ?>
                      </select>
                    </div>

                    <!-- Aku masih ada rencana untuk mengubah textbox keterangan ini dengan dropbox 
                  karena menurutku textarea masih kurang cukup
                dan aku juga membutuhkan bantuan ahli UI UX untuk menentukan keputusan terbaik -->
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" required name="keterangan" rows="3" placeholder="Masukkan keterangan"></textarea>
                    </div>
                  </div>
                </div>
              </div>
          
          <!-- memunculkan notifikasi modal -->
          <p id="p_clean" class="small text-center text-danger"><?= $this->session->flashdata('pesan_clean') ?></p>

              <div class="modal-footer">
                <p>Proses kamar <?= $km->no_kamar; ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>



<!-- modal maintenance -->
<?php foreach ($kamar as $km) : ?>
  <?php foreach ($tipe_kamar as $tp) : ?>
    <?php if ($tp->id_tipe == $km->id_tipe) { ?>
      <div id="maintenance<?= $km->no_kamar ?>" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Assign Petugas untuk Kamar <?= $km->no_kamar ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form untuk mengubah nilai status sebuah kamar -->
            <form action="<?= site_url('operations/tambah') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Id Kamar</label>
                      <p><?= $km->no_kamar ?></p>
                      <input type="hidden" name="no_kamar" value="<?= $km->no_kamar; ?>">
                      <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label>Tipe Kamar : </label>
                      <p><?= $tp->tipe; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label>Status : </label>
                      <p><?= $km->status; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <img src="img/tipe_kamar/<?= $tp->img; ?>" width="200">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label>Keterangan : </label>
                      <p><?= $km->keterangan; ?></p>
                    </div>
                    <!-- mengubah status kamar secara instan berdasarkan id_pesanan -->
                    <!-- jika id pesanan itu kosong, berarti belum ada yang pesan dan kamar menjadi Available
                jika sebaliknya, maka kamar akan menjadi Unavailable -->
                    <?php if ($km->id_pesanan <> 0) { ?>
                      <input type="hidden" name="status" value="Unavailable">
                    <?php } else { ?>
                      <input type="hidden" name="status" value="Available">
                    <?php } ?>



                  </div>

                  <div class="col-md-6">
                    <!-- ini adalah fitur untuk assign petugas -->
                    <div class="form-group">
                      <label>Petugas</label>
                      <select class="form-control" required name="id_petugas">

                        <!-- menampilkan petugas buat assign -->
                        <option selected hidden>Pilih petugas...</option>
                        <?php
                        foreach ($petugas as $pt) :
                          if ($pt->role == 'maintenance') { ?>
                            <option value="<?= $pt->id_petugas; ?>"><?= $pt->nama; ?> - <?= $pt->role; ?></option>
                        <?php }
                        endforeach ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" required name="keterangan" rows="3" placeholder="Masukkan keterangan"></textarea>
                    </div>
                  </div>
                </div>
              </div>
          
          <!-- memunculkan notifikasi modal -->
          <p id="p_maintenance" class="small text-center text-danger"><?= $this->session->flashdata('pesan_maintenance') ?></p>

              <div class="modal-footer">
                <p>Proses kamar <?= $km->no_kamar; ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>