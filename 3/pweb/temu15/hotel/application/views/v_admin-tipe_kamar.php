<?php if ($this->session->userdata('level') <> 'administrator') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('tipe_kamar/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel6_field1_alias ?></th>
        <th><?= $tabel6_field2_alias ?></th>
        <th><?= $tabel6_field5_alias ?></th>
        <th><?= $tabel6_field4_alias ?></th>
        <th><?= $tabel6_field3_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tabel6 as $tl6) : ?>
        <tr>
          <td><?= $tl6->id_tipe; ?></td>
          <td><?= $tl6->tipe ?></td>
          <td><?= $tl6->stok ?></td>
          <td>Rp <?= number_format($tl6->harga, '2', ',', '.') ?></td>
          <td><img class="img-fluid" style="max-height: 50px; object-fit:cover" src="img/tipe_kamar/<?= $tl6->img ?>"></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl6->id_tipe; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl6->id_tipe; ?>">
              <i class="fas fa-edit"></i></a>


            <!-- Ini adalah fitur yang akan kupending terlebih dahulu
            Rencananya ini akan kubuka lagi setelah kupelajari cascade
            Rencanannya jika user menghapus data tipe kamar, maka ada use case yang terjadi
            Namun use case tersebut saat ini masih belum bisa ditentukan
            Entah itu mau menghapus data yang berada di tabel child, atau meng-NULL kan data di child table
            Hal itu perlu didiskusikan lebih lanjut supaya tidak ada bug yang tidak diinginkan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus data tipe kamar?')" href="<?= site_url('tipe_kamar/hapus/' . $tl6->id_tipe) ?>">
            <i class="fas fa-trash"></i></a> -->

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th><?= $tabel6_field1_alias ?></th>
        <th><?= $tabel6_field2_alias ?></th>
        <th><?= $tabel6_field5_alias ?></th>
        <th><?= $tabel6_field4_alias ?></th>
        <th><?= $tabel6_field3_alias ?></th>
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
        <h5 class="modal-title">Tambah <?= $tabel6_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <form action="<?= site_url('tipe_kamar/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label><?= $tabel6_field2_alias ?></label>
            <input class="form-control" type="text" required name="tipe" placeholder="Masukkan tipe kamar">
          </div>

          <!-- Harga kamar masih menggunakan satuan per kamar, untuk per hari masih belum -->
          <div class="form-group">
            <label><?= $tabel6_field5_alias ?> (Per hari & Per jumlah)</label>
            <input class="form-control" type="number" required name="harga" min="0">
          </div>

          <div class="form-group">
            <label>Tambah <?= $tabel6_field3_alias ?></label>
            <input class="form-control-file" required type="file" name="img">
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
<?php foreach ($tabel6 as $tl6) : ?>
  <div id="ubah<?= $tl6->id_tipe; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel6_alias ?> <?= $tl6->id_tipe; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('tipe_kamar/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel6_field2_alias ?></label>
              <input class="form-control" type="text" required name="tipe" value="<?= $tl6->tipe; ?>">
              <input type="hidden" name="id_tipe" value="<?= $tl6->id_tipe; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel6_field5_alias ?> (Per hari & Per jumlah)</label>
              <input class="form-control" type="number" required name="harga" value="<?= $tl6->harga; ?>">
            </div>

            <div class="form-group">
              <img src="img/tipe_kamar/<?= $tl6->img; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel6_field3_alias ?></label>
              <input class="form-control-file" type="file" name="img">
              <input type="hidden" name="txtimg" value="<?= $tl6->img; ?>">
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
<?php endforeach; ?>

<!-- modal lihat -->
<?php foreach ($tabel6 as $tl6) : ?>
  <div id="lihat<?= $tl6->id_tipe; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel6_alias ?> <?= $tl6->id_tipe; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel6_field2_alias ?> : </label>
              <p><?= $tl6->tipe; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel6_field4_alias ?> : </label>
              <p><?= $tl6->stok; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel6_field3_alias ?> (Per hari & Per jumlah) : </label>
              <p>Rp <?= number_format($tl6->harga, '2', ',', '.') ?></p>
            </div>
            <hr>

            <div class="form-group">
              <img src="img/tipe_kamar/<?= $tl6->img; ?>" width="450">

            </div>

          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_lihat class=" small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>