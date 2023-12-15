<?php if ($this->session->userdata('level') <> 'tamu') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1>History Reservasi Hotel</h1>
<hr>

<!-- tabel fiter history -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <!-- Mengecek data menggunakan tanggal cek in -->
  <form action="<?= site_url('history/filter_tamu') ?>" method="get">
    <tr>

      <td class="pr-2">Cek In</td>
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

      <td>
        <button class="btn btn-success text-light" type="submit">
          <a type="submit"><i class="fas fa-search"></i></a>
        </button>
        <a class="btn btn-danger text-light" type="button" href="<?= site_url('history/daftar') ?>">
          <i class="fas fa-redo"></i></a>
      </td>

    </tr>

    <!-- Mengecek data menggunakan tanggal cek out -->
    <!-- method get supaya nilai dari filter bisa tampil nanti -->
    <tr>

      <td class="pr-2">Cek Out</td>
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
  </form>
</table>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Id Pesanan</th>
      <th>Tamu</th>
      <th>Tipe</th>
      <th>Cek In</th>
      <th>Cek Out</th>
      <th>Resepsionis</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($history as $h) : ?>
      <?php foreach ($tipe_kamar as $tk) : ?>
        <?php if ($tk->id_tipe === $h->id_tipe) { ?>
          <tr>
            <td><?= $h->id_pesanan ?></td>
            <td><?= $h->tamu ?></td>
            <td><?= $tk->tipe ?></td>
            <td><?= $h->cek_in ?></td>
            <td><?= $h->cek_out ?></td>
            <td><?= $h->user_aktif ?></td>
            <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $h->id_history; ?>">
                <i class="fas fa-eye"></i></a>
            </td>
          </tr>
        <?php } ?>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Id Pesanan</th>
      <th>Tamu</th>
      <th>Tipe</th>
      <th>Cek In</th>
      <th>Cek Out</th>
      <th>Resepsionis</th>
      <th>Aksi</th>
    </tr>
  </tfoot>


</table>

<!-- modal lihat -->
<?php foreach ($history as $h) : ?>
  <?php foreach ($tipe_kamar as $tk) : ?>
    <?php if ($tk->id_tipe == $h->id_tipe) { ?>
      <div id="lihat<?= $h->id_history ?>" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">History <?= $h->id_history ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Id Pesanan</label>
                    <p><?= $h->id_pesanan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Pemesan</label>
                    <p><?= $h->pemesan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Email</label>
                    <p><?= $h->email ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Nomor Telepon</label>
                    <p><?= $h->hp ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Tamu</label>
                    <p><?= $h->tamu ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Tipe Kamar</label>

                    <p><?= $tk->tipe ?></p>

                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Tanggal Cek In</label>
                    <p><?= $h->cek_in ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label>Tanggal Cek Out</label>
                    <p><?= $h->cek_out ?></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>