<?php switch ($this->session->userdata($tabel_c2_field6)) {
    // case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>


<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_f2_field6_alias ?></th>
        <th><?= $tabel_f2_field10_alias ?></th>
        <th><?= $tabel_f2_field11_alias ?></th>
        <th><?= $tabel_f2_field12_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f2 as $tl_f2) : ?>
        <tr>
          <td></td>
          <td><?= $tl_f2->$tabel_f2_field6 ?></td>
          <td><?= $tl_f2->$tabel_f2_field10 ?></td>
          <td><?= $tl_f2->$tabel_f2_field11 ?></td>
          <td><?= $tl_f2->$tabel_f2_field12 ?></td>
          <td>
            <a class="btn btn-light text-info" data-toggle="modal" data-target="#lihat<?= $tl_f2->$tabel_f2_field1 ?>" href="#">
              <i class="fas fa-eye"></i>
            </a>

            <?php foreach ($tbl_e3 as $tl_e3) : ?>
              <?php if ($tl_f2->$tabel_f2_field1 == $tl_e3->$tabel_f2_field1) { ?>
                <a class="btn btn-light text-info" data-toggle="modal" data-target="#<?= $tabel_e3 . $tl_f2->$tabel_f2_field1 ?>" href="#">
                  <i class="fas fa-bed"></i>
                </a>
                <?php break; } endforeach ?>

            <?php switch ($tl_f2->$tabel_f2_field12) {
              case $tabel_f2_field12_value2: ?>
                <a class="btn btn-danger text-light" data-toggle="modal" data-target="#<?= $tabel_f3_field6 . $tl_f2->$tabel_f2_field1 ?>" href="#">
                  <i class="fas fa-shopping-cart"></i>
                </a>
              <?php break;
              case $tabel_f2_field12_value3:
              case $tabel_f2_field12_value4: ?>
                <a class="btn btn-light text-info" href="<?= site_url($tabel_f2 . '/print/' . $tl_f2->$tabel_f2_field1) ?>" target="_blank">
                  <i class="fas fa-print"></i>
                </a>
            <?php break;
            } ?>
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</div>

<!-- modal bayar -->
<?php foreach ($tbl_f2 as $tl_f2) : ?>

  <div id="<?= $tabel_f3_field6 . $tl_f2->$tabel_f2_field1 ?>" class="modal fade <?= $tabel_f3_field6 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel_f3_alias ?> untuk <?= $tabel_f2_alias ?> <?= $tl_f2->$tabel_f2_field1 ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_f3 . '/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel_f2_field1_alias ?></label>
                  <p><?= $tl_f2->$tabel_f2_field1 ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_f2_field3_alias ?></label>
                  <p><?= $tl_f2->$tabel_f2_field3 ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_f2_field4_alias ?></label>
                  <p><?= $tl_f2->$tabel_f2_field4 ?></p>

                  <!-- Email ini digunakan untuk menambahkan sesi temporer untuk konfirmasi transaksi -->
                  <input type="hidden" name="<?= $tabel_f2_field4_input ?>" value="<?= $tl_f2->$tabel_f2_field4 ?>">
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_f2_field5_alias ?></label>
                  <p><?= $tl_f2->$tabel_f2_field5 ?></p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel_f2_field6_alias ?></label>
                  <p><?= $tl_f2->$tabel_f2_field6 ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_e4_field2_alias ?></label>
                  <?php foreach ($tbl_e4 as $tl_e4) :
                    if ($tl_e4->$tabel_e4_field1 === $tl_f2->$tabel_e4_field1) { ?>
                      <p><?= $tl_e4->$tabel_e4_field2 ?></p>
                    <?php } ?>
                  <?php endforeach ?>

                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_f2_field10_alias ?></label>
                  <p><?= $tl_f2->$tabel_f2_field10 ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_f2_field11_alias ?></label>
                  <p><?= $tl_f2->$tabel_f2_field11 ?></p>
                </div>
              </div>


              <!-- Input metode pembayaran -->

              <div class="col-md-12">


                <div class="form-group">
                  <label><?= $tabel_f2_field9_alias ?></label>
                  <p>Rp <?= number_format($tl_f2->$tabel_f2_field9, '2', ',', '.') ?></p>
                  <input type="hidden" name="<?= $tabel_f2_field1_input ?>" value="<?= $tl_f2->$tabel_f2_field1 ?>">
                </div>

                <div class="form-group">
                  <label><?= $tabel_f3_field5_alias ?></label>
                  <select class="form-control" required name="<?= $tabel_f3_field5_input ?>">
                    <option selected hidden value="">Pilih <?= $tabel_f3_field5_alias ?>...</option>
                    <option value="<?= $tabel_f3_field5_value1 ?>"><?= $tabel_f3_field5_value1_alias ?></option>
                    <option value="<?= $tabel_f3_field5_value2 ?>"><?= $tabel_f3_field5_value2_alias ?></option>
                  </select>
                </div>

                <div class="form-group">
                  <label><?= $tabel_f3_field6_alias ?></label>
                  <input class="form-control" readonly type="number" required name="<?= $tabel_f3_field6_input ?>" placeholder="Masukkan <?= $tabel_f3_field6_alias ?>" value="<?= $tl_f2->$tabel_f2_field9 ?>">
                  <input type="hidden" name="<?= $tabel_f2_field12_input ?>" value="<?= $tabel_f2_field12_value3 ?>">

                </div>
              </div>

            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_'.$tabel_f3_field6) ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Bayar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach ?>

<!-- modal lihat -->
<?php foreach ($tbl_f2 as $tl_f2) :
  foreach ($tbl_e4 as $tl_e4) :
    if ($tl_e4->$tabel_e4_field1 == $tl_f2->$tabel_e4_field1) { ?>

      <div id="lihat<?= $tl_f2->$tabel_f2_field1 ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel_f2_alias ?> <?= $tl_f2->$tabel_f2_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel_f2_field1_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field1 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field3_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field3 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field4_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field4 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field5_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field5 ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel_f2_field6_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field6 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_e4_field2_alias ?></label>
                    <p><?= $tl_e4->$tabel_e4_field2 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field10_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field10 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field11_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field11 ?></p>
                  </div>
                </div>
              </div>
            </div>

            <!-- memunculkan notifikasi modal -->
            <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
<?php }
  endforeach;
endforeach ?>


<!-- modal lihat kamar -->
<!-- Aku ingin merubah modal ini menjadi modal yang memberikan informasi khusus mengenai kamar yang sudah dipesan -->
<!-- Aku mau yang ada di sini isinya bagus dan interaktif -->
<?php foreach ($tbl_f2 as $tl_f2) :
  foreach ($tbl_e4 as $tl_e4) :
    if ($tl_e4->$tabel_e4_field1 == $tl_f2->$tabel_e4_field1) { ?>

      <div id="<?= $tabel_e3 . $tl_f2->$tabel_f2_field1 ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel_f2_alias ?> <?= $tl_f2->$tabel_f2_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel_f2_field1_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field1 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field3_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field3 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field4_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field4 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field5_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field5 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field6_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field6 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_e4_field2_alias ?></label>
                    <p><?= $tl_e4->$tabel_e4_field2 ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <?php foreach ($tbl_e3 as $tl_e3) : ?>
                    <?php if ($tl_f2->$tabel_f2_field1 == $tl_e3->$tabel_f2_field1) { ?>

                      <div class="form-group">
                        <label><?= $tabel_e3_field1_alias ?></label>
                        <p><?= $tl_e3->$tabel_e3_field1 ?></p>
                      </div>
                      <hr>

                  <?php }
                  endforeach ?>

                  <div class="form-group">
                    <label><?= $tabel_f2_field10_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field10 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field11_alias ?></label>
                    <p><?= $tl_f2->$tabel_f2_field11 ?></p>
                  </div>
                </div>
              </div>
            </div>

            <!-- memunculkan notifikasi modal -->
            <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
<?php }
  endforeach;
endforeach ?>