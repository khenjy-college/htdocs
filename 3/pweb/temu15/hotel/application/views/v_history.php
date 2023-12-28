<?php if ($this->session->userdata('level') <> 'tamu') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<!-- method get supaya nilai dari filter bisa tampil nanti -->
<!-- tabel fiter history -->
<form action="<?= site_url('history/filter_tamu') ?>" method="get">

  <div class="row">
    <div class="col-md-auto">
      <table class="mb-4">
        <!-- Mengecek data menggunakan tanggal cek in -->
        <tr>
          <td class="pr-2"><?= $tabel2_field11_alias ?></td>
          <td class="pr-2">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text">Dari</span>
              </div>
              <input type="date" class="form-control" name="cek_in_min" value="<?= $cek_in_min ?>">
            </div>
          </td>
          <td class="pr-2">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text">Ke</span>
              </div>
              <input type="date" class="form-control" name="cek_in_max" value="<?= $cek_in_max ?>">
            </div>
          </td>
        </tr>

        <!-- Mengecek data menggunakan tanggal cek out -->
        <!-- method get supaya nilai dari filter bisa tampil nanti -->
        <tr>

          <td class="pr-2"><?= $tabel2_field12_alias ?></td>
          <td class="pr-2">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text">Dari</span>
              </div>
              <input type="date" class="form-control" name="cek_out_min" value="<?= $cek_out_min ?>">

            </div>
          </td>
          <td class="pr-2">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text">Ke</span>
              </div>
              <input type="date" class="form-control" name="cek_out_max" value="<?= $cek_out_max ?>">
            </div>
          </td>
        </tr>
      </table>
    </div>
    <div class="col-md-auto">
      <div class="row">
        <div class="col-auto">
          <div class="input-group">
            <button class="btn btn-success text-light" type="submit">
              <a type="submit"><i class="fas fa-search"></i></a>
            </button>
          </div>
        </div>
        <div class="col-auto">
          <div class="input-group">
            <a class="btn btn-danger text-light" type="button" href="<?= site_url('history/daftar') ?>">
              <i class="fas fa-redo"></i></a>
          </div>
        </div>
      </div>

    </div>

  </div>

</form>


<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel2_field2_alias ?></th>
        <th><?= $tabel2_field7_alias ?></th>
        <th><?= $tabel6_field2_alias ?></th>
        <th><?= $tabel2_field11_alias ?></th>
        <th><?= $tabel2_field12_alias ?></th>
        <th><?= $tabel2_field15_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tabel2 as $tl2) : ?>
        <?php foreach ($tabel6 as $tl6) : ?>
          <?php if ($tl6->id_tipe === $tl2->id_tipe) { ?>
            <tr>
              <td><?= $tl2->id_pesanan ?></td>
              <td><?= $tl2->tamu ?></td>
              <td><?= $tl6->tipe ?></td>
              <td><?= $tl2->cek_in ?></td>
              <td><?= $tl2->cek_out ?></td>
              <td><?= $tl2->user_aktif ?></td>
              <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl2->id_history ?>">
                  <i class="fas fa-eye"></i></a>
              </td>
            </tr>
          <?php } ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th><?= $tabel2_field2_alias ?></th>
        <th><?= $tabel2_field7_alias ?></th>
        <th><?= $tabel2_field8_alias ?></th>
        <th><?= $tabel2_field11_alias ?></th>
        <th><?= $tabel2_field12_alias ?></th>
        <th><?= $tabel2_field15_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>

<!-- modal lihat -->
<?php foreach ($tabel2 as $tl2) : ?>
  <?php foreach ($tabel6 as $tl6) : ?>
    <?php if ($tl6->id_tipe == $tl2->id_tipe) { ?>
      <div id="lihat<?= $tl2->id_history ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel2_alias ?> <?= $tl2->id_history ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel2_field2_alias ?></label>
                    <p><?= $tl2->id_pesanan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field4_alias ?></label>
                    <p><?= $tl2->pemesan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field5_alias ?></label>
                    <p><?= $tl2->email ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field6_alias ?></label>
                    <p><?= $tl2->hp ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel2_field7_alias ?></label>
                    <p><?= $tl2->tamu ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel6_field2_alias ?></label>
                    <p><?= $tl6->tipe ?></p>

                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field11_alias ?></label>
                    <p><?= $tl2->cek_in ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field12_alias ?></label>
                    <p><?= $tl2->cek_out ?></p>
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
    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>