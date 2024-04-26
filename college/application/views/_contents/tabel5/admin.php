<?php switch ($this->session->userdata($base_url . $tabel9_field6)) {
  case $tabel9_field6_value3:
  case $tabel9_field6_value4:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('tabel5/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel5_field1_alias ?></th>
        <th><?= $tabel6_field2_alias ?></th>
        <th><?= $tabel5_field4_alias ?></th>
        <th><?= $tabel5_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl5 as $tl5) : ?>
        <?php foreach ($tbl6 as $tl6) : ?>
          <?php if ($tl6->$tabel5_field2 == $tl5->$tabel5_field2) { ?>
            <tr>
              <td></td>
              <td><?= $tl5->$tabel5_field1; ?></td>
              <td><?= $tl6->$tabel6_field2 ?></td>
              <td><?= $tl5->$tabel5_field4 ?></td>
              <td><?= $tl5->$tabel5_field5 ?></td>
              <td>
                <a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl5->$tabel5_field1; ?>">
                  <i class="fas fa-eye"></i>
                </a>
                <?php switch ($tl5->$tabel5_field4) {
                  case $tabel5_field4_value2:
                  case $tabel5_field4_value3: ?>
                    <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl5->$tabel5_field1; ?>">
                      <i class="fas fa-edit"></i>
                    </a>
                  <?php break;
                  case $tabel5_field4_value4: ?>
                    <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#<?= $tabel4_field6_value1 . $tl5->$tabel5_field1; ?>">
                      <i class="fas fa-broom"></i>
                    </a>
                  <?php break;
                  case $tabel5_field4_value5: ?>
                    <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#<?= $tabel4_field6_value2 . $tl5->$tabel5_field1; ?>">
                      <i class="fas fa-hammer"></i>
                    </a>
                <?php break;
                } ?>
              </td>
            </tr>
          <?php } ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </tbody>

    <!-- <tfoot>
      <tr>
        <th>No</th>
        <th><?= $tabel5_field1_alias ?></th>
        <th><?= $tabel5_field2_alias ?></th>
        <th><?= $tabel5_field4_alias ?></th>
        <th><?= $tabel5_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot> -->
  </table>
</div>



<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $tabel5_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('tabel5/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- memilih salah satu tipe kamar yang ada -->
          <div class="form-group">
            <label><?= $tabel6_field2_alias ?></label>
            <select class="form-control" required name="<?= $tabel6_field1_input ?>">
              <option selected hidden value="">Pilih <?= $tabel6_field2_alias ?>...</option>
              <?php foreach ($tbl6 as $tl6) : ?>

                <!-- mengambil nilai tipe dari tipe kamar -->
                <option value="<?= $tl6->$tabel5_field2 ?>"><?= $tl6->$tabel6_field2; ?></option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            <label><?= $tabel5_field4_alias ?></label>
            <select class="form-control" required name="<?= $tabel5_field4_input ?>">
              <option selected hidden value="">Pilih <?= $tabel5_field4_alias ?>...</option>

              <!-- memilih nilai status -->
              <option value="<?= $tabel5_field4_value2 ?>"><?= $tabel5_field4_value2_alias ?></option>
              <option value="<?= $tabel5_field4_value4 ?>"><?= $tabel5_field4_value4_alias ?></option>
              <option value="<?= $tabel5_field4_value5 ?>"><?= $tabel5_field4_value5_alias ?></option>

            </select>
          </div>

          <div class="form-group">
            <label><?= $tabel5_field5_alias ?></label>
            <textarea class="form-control" name="<?= $tabel5_field5_input ?>" placeholder="Masukkan <?= $tabel5_field5_alias ?>"></textarea>
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
<?php foreach ($tbl5 as $tl5) : ?>
  <?php foreach ($tbl6 as $tl6) : ?>
    <?php if ($tl6->$tabel5_field2 == $tl5->$tabel5_field2) { ?>
      <div id="ubah<?= $tl5->$tabel5_field1; ?>" class="modal fade ubah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit <?= $tabel5_alias ?> <?= $tl5->$tabel5_field1; ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <form action="<?= site_url('tabel5/update') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">

                  <!-- memilih salah satu tipe kamar yang ada -->
                  <label><?= $tabel6_field2_alias ?></label>
                  <input class="form-control" type="text" readonly name="<?= $tabel6_field2_input ?>" value="<?= $tl6->$tabel6_field2 ?>">
                  <input type="hidden" name="<?= $tabel6_field1_input ?>" value="<?= $tl6->$tabel5_field2 ?>">


                  <!-- Fitur di bawah ini masuk harus dibahas kembali
                  Apakah bisa mengubah id_tipe tipe kamar atau tidak
                  Mengingat pengalaman kerja di PT LSI dulu
                  Jika mengubah parent table, maka child tabel tidak akan terlalu berpengaruh  -->
                  <!-- <select class="form-control" required name="<?= $tabel6_field1_input ?>">

                     menampilkan nilai tipe kamar yang aktif
                    <option selected hidden value="< $tl6->$tabel5_field2 ?>">< $tl6->$tabel6_field2; ?></option>

                    < foreach ($tbl6 as $tl6) : ?>
                      <option value value="<$tl6->$tabel5_field2 ?>">< $tl6->$tabel6_field2; ?></option>
                    < endforeach ?>
                  </select> -->

                </div>

                <div class="form-group">
                  <label><?= $tabel5_field4_alias ?></label>
                  <select class="form-control" required name="<?= $tabel5_field4_input ?>">
                    <option selected hidden value="<?= $tl5->$tabel5_field4; ?>"><?= $tl5->$tabel5_field4; ?></option>

                    <!-- memilih nilai status -->
                    <option value="<?= $tabel5_field4_value4 ?>"><?= $tabel5_field4_value4_alias ?></option>
                    <option value="<?= $tabel5_field4_value5 ?>"><?= $tabel5_field4_value5_alias ?></option>

                  </select>
                  <input type="hidden" name="<?= $tabel5_field1_input ?>" value="<?= $tl5->$tabel5_field1; ?>">
                </div>

                <div class="form-group">
                  <label><?= $tabel5_field5_alias ?></label>
                  <textarea class="form-control" name="<?= $tabel5__field5_input ?>" rows="3"><?= $tl5->$tabel5_field5; ?></textarea>
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
<?php foreach ($tbl5 as $tl5) : ?>
  <?php foreach ($tbl6 as $tl6) : ?>
    <?php if ($tl6->$tabel5_field2 == $tl5->$tabel5_field2) { ?>

      <div id="lihat<?= $tl5->$tabel5_field1; ?>" class="modal fade lihat" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel5_alias ?> <?= $tl5->$tabel5_field1; ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <form>
              <div class="modal-body">
                <div class="form-group">
                  <label><?= $tabel6_field2_alias ?> : </label>
                  <p><?= $tl6->$tabel6_field2; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel5_field4_alias ?> : </label>
                  <p><?= $tl5->$tabel5_field4; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel5_field5_alias ?> : </label>
                  <p><?= $tl5->$tabel5_field5; ?></p>
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
<?php foreach ($tbl5 as $tl5) : ?>
  <?php foreach ($tbl6 as $tl6) : ?>
    <?php if ($tl6->$tabel5_field2 == $tl5->$tabel5_field2) { ?>
      <div id="<?= $tabel4_field6_value1 . $tl5->$tabel5_field1 ?>" class="modal fade clean">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Assign <?= $tabel4_alias ?> untuk <?= $tabel5_alias . " " . $tl5->$tabel5_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form untuk mengubah nilai status sebuah kamar -->
            <form action="<?= site_url('tabel11/tambah') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel5_field1_alias ?></label>
                      <p><?= $tl5->$tabel5_field1 ?></p>
                      <input type="hidden" name="<?= $tabel5_field1_input ?>" value="<?= $tl5->$tabel5_field1; ?>">
                      <input type="hidden" name="<?= $tabel9_field1_input ?>" value="<?= $this->session->userdata($base_url . $tabel9_field1) ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel6_field2_alias ?> : </label>
                      <p><?= $tl6->$tabel6_field2; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field4_alias ?> : </label>
                      <p><?= $tl5->$tabel5_field4; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <img src="img/tabel6/<?= $tl6->$tabel6_field3; ?>" width="200">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field5_alias ?> : </label>
                      <p><?= $tl5->$tabel5_field5; ?></p>
                    </div>

                    <!-- mengubah status kamar secara instan berdasarkan id_pesanan -->
                    <!-- jika id pesanan itu kosong, berarti belum ada yang pesan dan kamar menjadi <?= $tabel5_field4_value2_alias ?>
                jika sebaliknya, maka kamar akan menjadi <?= $tabel5_field4_value3_alias ?> -->
                    <?php if ($tl5->$tabel5_field3 <> 0) { ?>
                      <input type="hidden" name="<?= $tabel5_field4_input ?>" value="<?= $tabel5_field4_value3 ?>">
                    <?php } else { ?>
                      <input type="hidden" name="<?= $tabel5_field4_input ?>" value="<?= $tabel5_field4_value2 ?>">
                    <?php } ?>
                  </div>

                  <div class="col-md-6">
                    <!-- ini adalah fitur untuk assign petugas -->
                    <div class="form-group">
                      <label><?= $tabel4_field2_alias ?></label>
                      <select class="form-control" required name="<?= $tabel4_field1_input ?>">

                        <!-- menampilkan petugas buat assign -->
                        <option selected hidden>Pilih <?= $tabel4_alias ?>...</option>
                        <?php
                        foreach ($tbl4 as $tl4) :
                          if ($tl4->$tabel4_field6 == $tabel4_field6_value1) { ?>
                            <option value="<?= $tl4->$tabel4_field1; ?>"><?= $tl4->$tabel4_field2; ?> - <?= $tl4->$tabel4_field6; ?></option>
                        <?php }
                        endforeach ?>
                      </select>
                    </div>

                    <!-- Aku masih ada rencana untuk mengubah textbox keterangan ini dengan dropbox 
                  karena menurutku textarea masih kurang cukup
                dan aku juga membutuhkan bantuan ahli UI UX untuk menentukan keputusan terbaik -->
                    <div class="form-group">
                      <label><?= $tabel5_field5_alias ?></label>
                      <textarea class="form-control" required name="<?= $tabel5__field5_input ?>" rows="3" placeholder="Masukkan <?= $tabel5_field5_alias ?>"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p id="p_clean" class="small text-center text-danger"><?= $this->session->flashdata('pesan_clean') ?></p>

              <div class="modal-footer">
                <p>Proses <?= $tabel5_alias ?> <?= $tl5->$tabel5_field1; ?>?</p>
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
<?php foreach ($tbl5 as $tl5) : ?>
  <?php foreach ($tbl6 as $tl6) : ?>
    <?php if ($tl6->$tabel5_field2 == $tl5->$tabel5_field2) { ?>
      <div id="<?= $tabel4_field6_value2 . $tl5->$tabel5_field1 ?>" class="modal fade maintenance">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Assign <?= $tabel4_alias ?> untuk <?= $tabel5_alias . " " . $tl5->$tabel5_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form untuk mengubah nilai status sebuah kamar -->
            <form action="<?= site_url('tabel11/tambah') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel5_field1_alias ?></label>
                      <p><?= $tl5->$tabel5_field1 ?></p>
                      <input type="hidden" name="<?= $tabel5_field1_input ?>" value="<?= $tl5->$tabel5_field1; ?>">
                      <input type="hidden" name="<?= $tabel9_field1_input ?>" value="<?= $this->session->userdata($base_url . $tabel9_field1) ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel6_field2_alias ?> : </label>
                      <p><?= $tl6->$tabel6_field2; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field4_alias ?> : </label>
                      <p><?= $tl5->$tabel5_field4; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <img src="img/tabel6/<?= $tl6->$tabel6_field3; ?>" width="200">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field5_alias ?> : </label>
                      <p><?= $tl5->$tabel5_field5; ?></p>
                    </div>
                    <!-- mengubah status kamar secara instan berdasarkan id_pesanan -->
                    <!-- jika id pesanan itu kosong, berarti belum ada yang pesan dan kamar menjadi <?= $tabel5_field4_value2_alias ?>
                jika sebaliknya, maka kamar akan menjadi <?= $tabel5_field4_value3_alias ?> -->
                    <?php if ($tl5->$tabel5_field3 <> 0) { ?>
                      <input type="hidden" name="<?= $tabel5_field4_input ?>" value="<?= $tabel5_field4_value3 ?>">
                    <?php } else { ?>
                      <input type="hidden" name="<?= $tabel5_field4_input ?>" value="<?= $tabel5_field4_value2 ?>">
                    <?php } ?>



                  </div>

                  <div class="col-md-6">
                    <!-- ini adalah fitur untuk assign petugas -->
                    <div class="form-group">
                      <label><?= $tabel4_alias ?></label>
                      <select class="form-control" required name="<?= $tabel4_field1_input ?>">

                        <!-- menampilkan petugas buat assign -->
                        <option selected hidden>Pilih <?= $tabel4_alias ?>...</option>
                        <?php
                        foreach ($tbl4 as $tl4) :
                          if ($tl4->$tabel4_field6 == $tabel4_field6_value1) { ?>
                            <option value="<?= $tl4->$tabel4_field1; ?>"><?= $tl4->$tabel4_field2; ?> - <?= $tl4->$tabel4_field6; ?></option>
                        <?php }
                        endforeach ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label><?= $tabel5_field5 ?></label>
                      <textarea class="form-control" required name="<?= $tabel5__field5_input ?>" rows="3" placeholder="Masukkan <?= $tabel5_field5_alias ?>"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p id="p_maintenance" class="small text-center text-danger"><?= $this->session->flashdata('pesan_maintenance') ?></p>

              <div class="modal-footer">
                <p>Proses <?= $tabel5_alias ?> <?= $tl5->$tabel5_field1; ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>