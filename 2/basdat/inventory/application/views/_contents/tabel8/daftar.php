<?php switch ($this->session->userdata($tabel9_field6)) {
    // case $tabel9_field6_value3:
  case $tabel9_field6_value5:
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
        <th><?= $tabel8_field6_alias ?></th>
        <th><?= $tabel8_field10_alias ?></th>
        <th><?= $tabel8_field11_alias ?></th>
        <th><?= $tabel8_field12_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl8 as $tl8) : ?>
        <tr>
          <td></td>
          <td><?= $tl8->$tabel8_field6 ?></td>
          <td><?= $tl8->$tabel8_field10 ?></td>
          <td><?= $tl8->$tabel8_field11 ?></td>
          <td><?= $tl8->$tabel8_field12 ?></td>
          <td>
            <a class="btn btn-light text-info" data-toggle="modal" data-target="#lihat<?= $tl8->$tabel8_field1 ?>" href="#">
              <i class="fas fa-eye"></i>
            </a>

            <?php foreach ($tbl5 as $tl5) : ?>
              <?php if ($tl8->$tabel8_field1 == $tl5->$tabel8_field1) { ?>
                <a class="btn btn-light text-info" data-toggle="modal" data-target="#<?= $tabel5 . $tl8->$tabel8_field1 ?>" href="#">
                  <i class="fas fa-bed"></i>
                </a>
                <?php break; } endforeach ?>

            <?php switch ($tl8->$tabel8_field12) {
              case $tabel8_field12_value2: ?>
                <a class="btn btn-danger text-light" data-toggle="modal" data-target="#<?= $tabel10_field6 . $tl8->$tabel8_field1 ?>" href="#">
                  <i class="fas fa-shopping-cart"></i>
                </a>
              <?php break;
              case $tabel8_field12_value3:
              case $tabel8_field12_value4: ?>
                <a class="btn btn-light text-info" href="<?= site_url('tabel8/print/' . $tl8->$tabel8_field1) ?>" target="_blank">
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
<?php foreach ($tbl8 as $tl8) : ?>

  <div id="<?= $tabel10_field6 . $tl8->$tabel8_field1 ?>" class="modal fade tabel10_field6">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel10_alias ?> untuk <?= $tabel8_alias ?> <?= $tl8->$tabel8_field1 ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('tabel10/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel8_field1_alias ?></label>
                  <p><?= $tl8->$tabel8_field1 ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field3_alias ?></label>
                  <p><?= $tl8->$tabel8_field3 ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field4_alias ?></label>
                  <p><?= $tl8->$tabel8_field4 ?></p>

                  <!-- Email ini digunakan untuk menambahkan sesi temporer untuk konfirmasi transaksi -->
                  <input type="hidden" name="<?= $tabel8_field4_input ?>" value="<?= $tl8->$tabel8_field4 ?>">
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field5_alias ?></label>
                  <p><?= $tl8->$tabel8_field5 ?></p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel8_field6_alias ?></label>
                  <p><?= $tl8->$tabel8_field6 ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel6_field2_alias ?></label>
                  <?php foreach ($tbl6 as $tl6) :
                    if ($tl6->$tabel6_field1 === $tl8->$tabel6_field1) { ?>
                      <p><?= $tl6->$tabel6_field2 ?></p>
                    <?php } ?>
                  <?php endforeach ?>

                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field10_alias ?></label>
                  <p><?= $tl8->$tabel8_field10 ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field11_alias ?></label>
                  <p><?= $tl8->$tabel8_field11 ?></p>
                </div>
              </div>


              <!-- Input metode pembayaran -->

              <div class="col-md-12">


                <div class="form-group">
                  <label><?= $tabel8_field9_alias ?></label>
                  <p>Rp <?= number_format($tl8->$tabel8_field9, '2', ',', '.') ?></p>
                  <input type="hidden" name="<?= $tabel8_field1_input ?>" value="<?= $tl8->$tabel8_field1 ?>">
                </div>

                <div class="form-group">
                  <label><?= $tabel10_field5_alias ?></label>
                  <select class="form-control" required name="<?= $tabel10_field5_input ?>">
                    <option selected hidden value="">Pilih <?= $tabel10_field5_alias ?>...</option>
                    <option value="<?= $tabel10_field5_value1 ?>"><?= $tabel10_field5_value1_alias ?></option>
                    <option value="<?= $tabel10_field5_value2 ?>"><?= $tabel10_field5_value2_alias ?></option>
                  </select>
                </div>

                <div class="form-group">
                  <label><?= $tabel10_field6_alias ?></label>
                  <input class="form-control" readonly type="number" required name="<?= $tabel10_field6_input ?>" placeholder="Masukkan <?= $tabel10_field6_alias ?>" value="<?= $tl8->$tabel8_field9 ?>">
                  <input type="hidden" name="<?= $tabel8_field12_input ?>" value="<?= $tabel8_field12_value3 ?>">

                </div>
              </div>

            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <p id="p_<?= $tabel10_field6 ?>" class="small text-center text-danger"><?= $this->session->flashdata('pesan_'.$tabel10_field6) ?></p>

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
    if ($tl6->$tabel6_field1 == $tl8->$tabel6_field1) { ?>

      <div id="lihat<?= $tl8->$tabel8_field1 ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel8_alias ?> <?= $tl8->$tabel8_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel8_field1_alias ?></label>
                    <p><?= $tl8->$tabel8_field1 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field3_alias ?></label>
                    <p><?= $tl8->$tabel8_field3 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field4_alias ?></label>
                    <p><?= $tl8->$tabel8_field4 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field5_alias ?></label>
                    <p><?= $tl8->$tabel8_field5 ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel8_field6_alias ?></label>
                    <p><?= $tl8->$tabel8_field6 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel6_field2_alias ?></label>
                    <p><?= $tl6->$tabel6_field2 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field10_alias ?></label>
                    <p><?= $tl8->$tabel8_field10 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field11_alias ?></label>
                    <p><?= $tl8->$tabel8_field11 ?></p>
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


<!-- modal lihat kamar -->
<!-- Aku ingin merubah modal ini menjadi modal yang memberikan informasi khusus mengenai kamar yang sudah dipesan -->
<!-- Aku mau yang ada di sini isinya bagus dan interaktif -->
<?php foreach ($tbl8 as $tl8) :
  foreach ($tbl6 as $tl6) :
    if ($tl6->$tabel6_field1 == $tl8->$tabel6_field1) { ?>

      <div id="<?= $tabel5 . $tl8->$tabel8_field1 ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel8_alias ?> <?= $tl8->$tabel8_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel8_field1_alias ?></label>
                    <p><?= $tl8->$tabel8_field1 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field3_alias ?></label>
                    <p><?= $tl8->$tabel8_field3 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field4_alias ?></label>
                    <p><?= $tl8->$tabel8_field4 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field5_alias ?></label>
                    <p><?= $tl8->$tabel8_field5 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field6_alias ?></label>
                    <p><?= $tl8->$tabel8_field6 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel6_field2_alias ?></label>
                    <p><?= $tl6->$tabel6_field2 ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <?php foreach ($tbl5 as $tl5) : ?>
                    <?php if ($tl8->$tabel8_field1 == $tl5->$tabel8_field1) { ?>

                      <div class="form-group">
                        <label><?= $tabel5_field1_alias ?></label>
                        <p><?= $tl5->$tabel5_field1 ?></p>
                      </div>
                      <hr>

                  <?php }
                  endforeach ?>

                  <div class="form-group">
                    <label><?= $tabel8_field10_alias ?></label>
                    <p><?= $tl8->$tabel8_field10 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field11_alias ?></label>
                    <p><?= $tl8->$tabel8_field11 ?></p>
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