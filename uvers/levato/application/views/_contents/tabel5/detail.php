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

<?php foreach ($tbl5 as $tl5):
  if ($tl5->$tabel5_field1 == '') { ?>   <?php } else { ?>

    <a class="btn btn-info mb-4" href="<?= site_url('tabel5/print/' . $tl5->$tabel5_field1) ?>" target="_blank">
      <i class="fas fa-print"></i> Print</a>
    <div class="table-responsive">
      <table class="table-light" id="data">
        <thead></thead>
        <tbody>
          <tr>
            <td class="table-secondary table-active"><?= $tabel5_field1_alias ?></td>
            <td class="table-light"><?= $tl5->$tabel5_field1 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel5_field2_alias ?></td>
            <td class="table-light"><?= $tl5->$tabel5_field2 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel5_field3_alias ?></td>
            <td class="table-light"><?= $tl5->$tabel5_field3 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel5_field4_alias ?></td>
            <td class="table-light"><?= $tl5->$tabel5_field4 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel5_field5_alias ?></td>
            <td class="table-light"><?= $tl5->$tabel5_field5 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel5_field6_alias ?></td>
            <td class="table-light"><?= $tl5->$tabel5_field6 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel5_field7_alias ?></td>
                        <td class="table-light"><?= $tl5->$tabel5_field7 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active">Jumlah <?= $tabel1_alias ?></td>
            <td class="table-light"><?= $count1 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active">Jumlah <?= $tabel8_alias ?></td>
            <td class="table-light"><?= $count8 ?></td>
          </tr>

        </tbody>
        <tfoot></tfoot>
      </table>
    </div>


    <?php switch ($tl5->$tabel5_field4) {
      case $tabel5_field4_value0:
      case $tabel5_field4_value1: ?>
        <br><br>
        <h1><?= $tabel3_alias ?><?= $phase ?></h1>
        <hr>

        <div class="table-responsive"><!-- proses di tabel 3 -->
          <table class="table table-light" id="data">
            <thead class="thead-light">
              <tr class="table-info text-center">
                <td colspan="9">
                  <?php if (!$tbl3) { ?>
                    <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#tabel3">
                      + Tambah Entri</a>
                  <?php } else { ?>

                  <?php } ?>


                </td>
              </tr>
              <tr>
                <th><?= $tabel3_field1_alias ?></th>
                <th><?= $tabel3_field2_alias ?></th>
                <th><?= $tabel3_field3_alias ?></th>
                <th><?= $tabel3_field4_alias ?></th>
                <th><?= $tabel3_field5_alias ?></th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>

              <?php foreach ($tbl3 as $tl3): ?>
                <tr>
                  <td><?= $tl3->$tabel3_field1 ?></td>
                  <td><?= $tl3->$tabel3_field2 ?></td>
                  <td><?= $tl3->$tabel3_field3 ?></td>
                  <td><?= $tl3->$tabel3_field4 ?></td>
                  <td><?= $tl3->$tabel3_field5 ?></td>

                  <td>
                    <?php switch ($tl5->$tabel5_field4) {
                      case $tabel5_field4_value0: ?>
                        <?php break;
                      case $tabel5_field4_value1: ?>

                        <a class="btn btn-light text-success" type="button" data-toggle="modal"
                          data-target="#ubah<?= $tl3->$tabel5_field1 ?>">
                          Setujui</a>


                        <?php break;
                      default: ?>
                        <?php break;
                    } ?>
                    <a class="btn btn-light text-info" href="<?= site_url('tabel3/print/' . $tl3->$tabel3_field1) ?>"
                      target="_blank">
                      <i class="fas fa-print"></i></a>

                  </td>

                </tr>
              <?php endforeach ?>
            </tbody>

          </table>
        </div>

        <?php break;
      case $tabel5_field4_value2: ?>
        <br><br>
        <h1><?= $tabel8_alias ?><?= $phase ?></h1>
        <hr>

        <div class="table-responsive"><!-- proses di tabel 8 -->
          <table class="table table-light" id="data">
            <thead class="thead-light">
              <tr class="table-info text-center">
                <td colspan="9">
                  <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#tabel8">
                    + Tambah Entri</a>
                </td>
              </tr>
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

              <?php foreach ($tbl8 as $tl8): ?>
                <tr>
                  <td><?= $tl8->$tabel8_field1 ?></td>
                  <td><?= $tl8->$tabel8_field2 ?></td>
                  <td><?= $tl8->$tabel8_field3 ?></td>
                  <td><?= $tl8->$tabel8_field4 ?></td>
                  <td><?= $tl8->$tabel8_field5 ?></td>
                  <td><?= $tl8->$tabel8_field6 ?></td>
                  <td><?= $tl8->$tabel8_field7 ?></td>
                  <td>Rp <?= number_format($tl8->$tabel8_field8, '2', ',', '.') ?></td>

                  <td>
                    <a class="btn btn-light text-info" href="<?= site_url('tabel8/print/' . $tl8->$tabel8_field1) ?>"
                      target="_blank">
                      <i class="fas fa-print"></i></a>

                  </td>

                </tr>
              <?php endforeach ?>
            </tbody>


          </table>
        </div>


        <?php break;
      case $tabel5_field4_value3: ?>
        <br><br>
        <h1><?= $tabel5_alias ?> Anda Sudah Aktif<?= $phase ?></h1>

        <?php break;
      case $tabel5_field4_value4: ?>
        <br><br>
        <h1>Butuh <?= $tabel1_alias ?><?= $phase ?></h1>
        <hr>

        <div class="table-responsive"><!-- proses di tabel 1 -->
          <table class="table table-light" id="data">
            <thead class="thead-light">
              <tr class="table-info text-center">
                <td colspan="9">
                  <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#tabel1">
                    + Tambah Entri</a>
                </td>
              </tr>
              <tr>
                <th><?= $tabel1_field1_alias ?></th>
                <th><?= $tabel1_field2_alias ?></th>
                <th><?= $tabel1_field3_alias ?></th>
                <th><?= $tabel1_field4_alias ?></th>
                <th><?= $tabel1_field5_alias ?></th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>

              <?php foreach ($tbl1 as $tl1): ?>
                <tr>
                  <td><?= $tl1->$tabel1_field1 ?></td>
                  <td><?= $tl1->$tabel1_field2 ?></td>
                  <td><?= $tl1->$tabel1_field3 ?></td>
                  <td><?= $tl1->$tabel1_field4 ?></td>
                  <td><?= $tl1->$tabel1_field5 ?></td>

                  <td>
                    <a class="btn btn-light text-info" href="<?= site_url('tabel1/print/' . $tl1->$tabel1_field1) ?>"
                      target="_blank">
                      <i class="fas fa-print"></i></a>

                  </td>

                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>


        <?php break;
      case $tabel5_field4_value5: ?>
        <br><br>
        <h1><?= $tabel8_alias ?><?= $phase ?></h1>
        <hr>

        <div class="table-responsive"><!-- proses di tabel 8 -->
          <table class="table table-light" id="data">
            <thead class="thead-light">
              <tr class="table-info text-center">
                <td colspan="9">
                  <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#tabel8baru">
                    + Tambah Entri</a>
                </td>
              </tr>
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

              <?php foreach ($tbl8 as $tl8): ?>
                <tr>
                  <td><?= $tl8->$tabel8_field1 ?></td>
                  <td><?= $tl8->$tabel8_field2 ?></td>
                  <td><?= $tl8->$tabel8_field3 ?></td>
                  <td><?= $tl8->$tabel8_field4 ?></td>
                  <td><?= $tl8->$tabel8_field5 ?></td>
                  <td><?= $tl8->$tabel8_field6 ?></td>
                  <td><?= $tl8->$tabel8_field7 ?></td>
                  <td>Rp <?= number_format($tl8->$tabel8_field8, '2', ',', '.') ?></td>

                  <td>
                    <a class="btn btn-light text-info" href="<?= site_url('tabel8/print/' . $tl8->$tabel8_field1) ?>"
                      target="_blank">
                      <i class="fas fa-print"></i></a>

                  </td>

                </tr>
              <?php endforeach ?>
            </tbody>


          </table>
        </div>


        <?php break;
      default: ?>
        <br><br>
        <h1><?= $tabel5_alias ?> Anda Tidak Valid<?= $phase ?></h1>

        <?php break;
    } ?>

  <?php } ?>



  <div id="tabel3" class="modal fade tabel3">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Entri</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('tabel3/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">

              <!-- Data siswa -->
              <div class="col-md-6">
                <input type="hidden" name="<?= $tabel3_field2_input ?>" value="<?= $tl5->$tabel5_field1 ?>">
                <?php foreach ($tbl4 as $tl4): ?>
                  <input type="hidden" name="<?= $tabel3_field3_input ?>" value="<?= $tl4->$tabel4_field1 ?>">
                <?php endforeach ?>

                <div class="form-group">
                  <label><?= $tabel3_field4_alias ?></label>
                  <textarea class="form-control" name="<?= $tabel3_field4_input ?>" rows="3"></textarea>
                </div>

                <input type="hidden" name="<?= $tabel5_field4_input ?>" value="<?= $tabel5_field4_value1 ?>">

              </div>

            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <p id="p_bayar" class="small text-center text-danger"><?= $this->session->flashdata('pesan_bayar') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Daftar</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <div id="tabel8" class="modal fade tabel8">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Entri</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('tabel8/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">

            <?php foreach ($tbl6 as $tl6): ?>
              <?php if ($tl6->$tabel6_field1 == $tl5->$tabel6_field1) { ?>
                <div class="row">

                  <!-- Data siswa -->

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel5_field1_alias ?></label>
                      <p><?= $tl5->$tabel5_field1 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field2_alias ?></label>
                      <p><?= $tl5->$tabel5_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field3_alias ?></label>
                      <p><?= $tl5->$tabel5_field3 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field5_alias ?></label>
                      <p><?= $tl5->$tabel5_field5 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel6_field2_alias ?></label>
                      <p><?= $tl6->$tabel6_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel6_field3_alias ?></label>
                      <p><?= $tl6->$tabel6_field3 ?></p>
                    </div>
                    <hr>


                  </div>


                  <!-- Data SPP -->

                  <div class="col-md-6">

                    <input type="hidden" name="<?= $tabel8_field2_input ?>"
                      value="<?= $this->session->userdata($base_url . $tabel9_field1) ?>">
                    <input type="hidden" name="<?= $tabel8_field3_input ?>" value="<?= $tl6->$tabel6_field1 ?>">


                    <input type="hidden" name="<?= $tabel8_field7_input ?>" value="<?= $tl5->$tabel5_field1 ?>">

                    <input id="tabel5_field6_input_date" type="hidden" name="<?= $tabel8_field6_input ?>"
                      value="<?= $tl5->$tabel5_field6 ?>">

                    <div class="form-group">
                      <label><?= $tabel5_field7_alias ?></label>
                      <input class="form-control" type="datetime-local" required name="<?= $tabel5_field7_input ?>"
                        id="tabel5_field7_input_date" value="<?= date("Y-m-d\TH:i:s", strtotime($tabel5_field7_limit2)) ?>"
                        min="<?= date("Y-m-d\TH:i:s", strtotime($tabel5_field7_limit2)) ?>">
                    </div>

                    <div class="form-group">
                      <label><?= $tabel8_field8_alias ?> </label>
                      <input id="tabel8_field8_input_cost" class="form-control" readonly type="text" required
                        name="<?= $tabel8_field8_input ?>" value="">
                    </div>
                  </div>

                <?php }
            endforeach; ?>
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

  <div id="tabel1" class="modal fade tabel1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Entri</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('tabel1/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">

              <!-- Data siswa -->
              <?php foreach ($tbl6 as $tl6): ?>
                <?php if ($tl6->$tabel6_field1 == $tl5->$tabel6_field1) { ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel5_field1_alias ?></label>
                      <p><?= $tl5->$tabel5_field1 ?></p>
                      <input type="hidden" name="<?= $tabel5_field1_input ?>" value="<?= $tl5->$tabel5_field1 ?>">
                      <input type="hidden" name="<?= $tabel9_field1_input ?>"
                        value="<?= $this->session->userdata($base_url . $tabel9_field1) ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field2_alias ?></label>
                      <p><?= $tl5->$tabel5_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field3_alias ?></label>
                      <p><?= $tl5->$tabel5_field3 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field5_alias ?></label>
                      <p><?= $tl5->$tabel5_field5 ?></p>
                    </div>
                    <hr>
                    
                    <div class="form-group">
                      <label><?= $tabel1_field3_alias ?></label>
                      <p><?= $tl6->$tabel6_field1 ?></p>
                    </div>
                    <hr>

                  </div>


                  <div class="col-md-6">

                    <input type="text" name="<?= $tabel1_field2_input ?>" value="<?= $tl5->$tabel5_field1 ?>">
                    <input type="text" name="<?= $tabel1_field3_input ?>" value="<?= $tl6->$tabel6_field1 ?>">
                    <input type="text" name="<?= $tabel5_field4_input ?>" value="<?= $tabel5_field4_value5 ?>">


                  </div>
                <?php }
              endforeach; ?>
            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <p id="p_bayar" class="small text-center text-danger"><?= $this->session->flashdata('pesan_bayar') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Perbaharui</button>
          </div>
        </form>

      </div>
    </div>
  </div>


  <div id="ubah<?= $tl5->$tabel5_field1 ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Lisensi <?= $tl5->$tabel5_field1 ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- form untuk mengubah nilai status sebuah pesanan -->
        <form action="<?= site_url('tabel5/update_status') ?>" method="post">
          <div class="modal-body">
            <input type="hidden" name="<?= $tabel5_field1_input ?>" value="<?= $tl5->$tabel5_field1 ?>">
            <input type="hidden" name="<?= $tabel5_field4_input ?>" value="<?= $tabel5_field4_value2 ?>">

          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_ubah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

          <div class="modal-footer">
            <!-- pesan yg muncul berdasarkan nilai status -->

            <p>Setujui Pendaftaran?</p>
            <button class="btn btn-success" type="submit">Ya</button>
          </div>

        </form>

      </div>
    </div>
  </div>


  <div id="tabel8baru" class="modal fade tabel8">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Entri Baru</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('tabel8/tambah_baru') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">

              <!-- Data siswa -->
              <?php foreach ($tbl6 as $tl6): ?>
                <?php if ($tl6->$tabel6_field1 == $tl5->$tabel6_field1) { ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel5_field1_alias ?></label>
                      <p><?= $tl5->$tabel5_field1 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field2_alias ?></label>
                      <p><?= $tl5->$tabel5_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field3_alias ?></label>
                      <p><?= $tl5->$tabel5_field3 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field5_alias ?></label>
                      <p><?= $tl5->$tabel5_field5 ?></p>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label><?= $tabel6_field2_alias ?></label>
                      <p><?= $tl6->$tabel6_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel6_field3_alias ?></label>
                      <p><?= $tl6->$tabel6_field3 ?></p>
                    </div>
                    <hr>


                  </div>


                  <!-- Data SPP -->

                  <div class="col-md-6">
                    <input type="hidden" name="<?= $tabel5_field7_input ?>" value="<?= $value2 ?>">

                    <input type="hidden" name="<?= $tabel8_field2_input ?>"
                      value="<?= $this->session->userdata($base_url . $tabel9_field1) ?>">
                    <input type="hidden" name="<?= $tabel8_field3_input ?>" value="<?= $tl6->$tabel6_field1 ?>">


                    <input type="hidden" name="<?= $tabel8_field7_input ?>" value="<?= $tl5->$tabel5_field1 ?>">

                    <input id="tabel5_field6_input2_date" type="text" name="<?= $tabel8_field6_input ?>"
                      value="<?= $tl5->$tabel5_field6 ?>">

                    <div class="form-group">
                      <label><?= $tabel5_field7_alias ?></label>
                      <input class="form-control" type="datetime-local" required name="<?= $tabel5_field7_input ?>"
                        id="tabel5_field7_input2_date" value="<?= date("Y-m-d\TH:i:s", strtotime($tabel5_field7_limit2)) ?>"
                        min="<?= date("Y-m-d\TH:i:s", strtotime($tabel5_field7_limit2)) ?>">
                    </div>

                    <div class="form-group">
                      <label><?= $tabel8_field8_alias ?> </label>
                      <input id="tabel8_field8_input2_cost" class="form-control" readonly type="text" required
                        name="<?= $tabel8_field8_input ?>" value="">
                    </div>
                  </div>
                <?php } ?>
              <?php endforeach; ?>
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
<?php endforeach; ?>


<script>
  // Trigger the calculation function on change of input values
  document.getElementById("tabel5_field6_input_date").addEventListener("change", calculateCost);
  document.getElementById("tabel5_field7_input_date").addEventListener("change", calculateCost);
  document.getElementById("tabel5_field6_input2_date").addEventListener("change", calculateCost2);
  document.getElementById("tabel5_field7_input2_date").addEventListener("change", calculateCost2);
</script>