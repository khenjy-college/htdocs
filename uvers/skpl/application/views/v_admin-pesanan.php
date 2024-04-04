<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value3:
  case $tabel9_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<!-- tabel fiter history -->
<table class="mb-8">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <!-- Mengecek data menggunakan tanggal cek in -->
  <form action="<?= site_url($tabel8.'') ?>" method="get">
    <tr>

      <td class="pr-2"><?= $tabel8_field3_alias ?></td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Masukkan</span>
          </div>
          <input type="text" class="form-control" name="<?= $tabel8_field3 ?>" value="<?= $tabel8_v_input3 ?>">
        </div>
      </td>
      <td>
        <button class="btn btn-success" type="submit">
          <a type="submit"><i class="fas fa-search"></i></a>
        </button>
        <a class="btn btn-danger" type="button" href="<?= site_url($tabel8.'') ?>">
          <i class="fas fa-redo"></i></a>
      </td>

    </tr>

    <!-- Mengecek data menggunakan tanggal cek out -->
    <!-- method get supaya nilai dari filter bisa tampil nanti -->
  </form>
</table>

<?php foreach ($tbl4 as $tl4) :
  if ($tl4->$tabel4_field1 == '') { ?> <?php } else { ?>

    <h1>Biodata <?= $tabel4_alias ?><?= $phase ?></h1>
    <hr>

    <div class="table-responsive">
      <table class="table table-light" id="data">
        <thead></thead>
        <tbody>
          <?php foreach ($tbl4 as $tl4) : ?>
            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field1_alias ?></td>
              <td class="table-light"><?= $tl4->$tabel4_field1 ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field2_alias ?></td>
              <td class="table-light"><?= $tl4->$tabel4_field2 ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field3_alias ?></td>
              <td class="table-light"><?= $tl4->$tabel4_field3 ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field4_alias ?></td>
              <td class="table-light"><?= $tl4->$tabel4_field4 ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field5_alias ?></td>
              <td class="table-light"><?= $tl4->$tabel4_field5 ?></td>
            </tr>

          <?php endforeach ?>
        </tbody>
        <tfoot></tfoot>
      </table>
    </div>

    <br><br>
    <h1>Pesanan SPP<?= $phase ?></h1>
    <hr>

    <div class="table-responsive">
      <table class="table table-light" id="data">
        <thead class="thead-light">
          <tr class="table-info text-center">
            <td colspan="9">
              <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#entri">
                + Tambah Entri</a>
            </td>
          </tr>
          <tr>
            <th><?= $tabel8_field1_alias ?></th>
            <th><?= $tabel8_field2_alias ?></th>
            <th><?= $tabel8_field3_alias ?></th>
            <th><?= $tabel8_field4_alias ?></th>
            <th><?= $tabel8_field5_alias ?></th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

          <?php foreach ($tbl8 as $tl8) : ?>
            <tr>
              <td><?= $tl8->$tabel8_field1 ?></td>
              <td><?= $tl8->$tabel8_field2 ?></td>
              <td><?= $tl8->$tabel8_field3 ?></td>
              <td><?= $tl8->$tabel8_field4 ?></td>
              <td><?= $tl8->$tabel8_field5 ?></td>

              <td>

                <!-- tombol yang akan muncul berdasarkan nilai dari status -->
                <!-- switch ($tl8->status) {
              case 'pending': ?>
                <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#book<?= $tl8->$tabel8_field1 ?>">
                  <i class="fas fa-bell-concierge"></i></a>
               break;

              case 'menungggu': ?>
                <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl8->$tabel8_field1 ?>">
                  <i class="fas fa-edit"></i></a>
               break;

              case 'cek in': ?>
                <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl8->$tabel8_field1 ?>">
                  <i class="fas fa-edit"></i></a>
               break;

              case 'cek out': ?>
                <a class="btn btn-light text-danger" onclick="return confirm('Hapus pesanan?')" href="<?= site_url($tabel8.'/hapus/' . $tl8->$tabel8_field1) ?>">
                  <i class="fas fa-trash"></i></a>
               break;

              default: ?>
             } ?> -->

                <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
                <a class="btn btn-light text-info" href="<?= site_url($tabel8.'/print/' . $tl8->$tabel8_field1) ?>" target="_blank">
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
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  <?php } ?>
<?php endforeach; ?>

<div id="entri" class="modal fade bayar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Entri</h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel8.'/tambah') ?>" method="post" enctype="multipart/form-data">

        <div class="modal-body">
          <div class="row">

            <!-- Data tamu -->
            <?php foreach ($tbl4 as $tl4) : ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel4_field1_alias ?></label>
                      <p><?= $tl4->$tabel4_field1 ?></p>
                      <input type="hidden" name="<?= $tabel4_field1 ?>" value="<?= $tl4->$tabel4_field1 ?>">
                      <input type="hidden" name="<?= $tabel9_field1 ?>" value="<?= $this->session->userdata($tabel9_field1) ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel4_field2_alias ?></label>
                      <p><?= $tl4->$tabel4_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel4_field3_alias ?></label>
                      <p><?= $tl4->$tabel4_field3 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel4_field4_alias ?></label>
                      <p><?= $tl4->$tabel4_field4 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel4_field5_alias ?></label>
                      <p><?= $tl4->$tabel4_field5 ?></p>
                    </div>
                    <hr>

                  </div>


                  



                    <!-- Di bawah ini adalah form input pesanan -->
                    <div class="form-group">
                      <label><?= $tabel8_field4_alias ?> </label>
                      <input class="form-control" type="date" required name="<?= $tabel8_field4 ?>" min="<?= date('Y-m-d'); ?>">
                    </div>

                    <div class="form-group">
                      <label><?= $tabel8_field5_alias ?> </label>
                      <select class="form-control" required name="<?= $tabel8_field5 ?>">
                        <option value="" selected hidden>Pilih <?= $tabel8_field5_alias ?></option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                      </select>
                    </div>

                  </div>

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