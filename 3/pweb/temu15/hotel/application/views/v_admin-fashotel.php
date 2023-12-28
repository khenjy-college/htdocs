<!-- mengarahkan ke no_level jika level user bukan administrator -->
<?php if ($this->session->userdata('level') <> 'administrator') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<!-- menampilkan modal tambah -->
<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('fashotel/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<!-- tabel data fasilitas -->
<div class="table-responsive">
  <table class="table table-light" id="data">

    <!-- header tabel -->
    <thead class="thead-light">
      <tr>
        <th><?= $tabel3_field1_alias ?></th>
        <th><?= $tabel3_field2_alias ?></th>
        <th><?= $tabel3_field3_alias ?></th>
        <th><?= $tabel3_field4_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      <!-- menampilkan setiap baris data fashotel sebagai fh dalam tabel -->
      <?php foreach ($tabel3 as $tl3) : ?>
        <tr>
          <td><?= $tl3->id_fashotel; ?></td>
          <td><?= $tl3->nama ?></td>
          <td><?= $tl3->keterangan ?></td>
          <td><img class="img-fluid" style="max-height: 50px; object-fit:cover" src="img/fashotel/<?= $tl3->img ?>"></td>

          <!-- menampilkan modal lihat data berdasarkan id -->
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl3->id_fashotel; ?>">
              <i class="fas fa-eye"></i></a>

            <!-- menampilkan modal ubah data berdasarkan id -->
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl3->id_fashotel; ?>">
              <i class="fas fa-edit"></i></a>

            <!-- menghapus data berdasarkan id -->
            <a class="btn btn-light text-danger" type="button" onclick="return confirm('Hapus data fasilitas?')" href="<?= site_url('fashotel/hapus/' . $tl3->id_fashotel) ?>">
              <i class="fas fa-trash"></i></a>

          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>

    <!-- footer tabel -->
    <tfoot>
      <tr>
        <th><?= $tabel3_field1_alias ?></th>
        <th><?= $tabel3_field2_alias ?></th>
        <th><?= $tabel3_field3_alias ?></th>
        <th><?= $tabel3_field4_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot>

  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- header modal -->
      <div class="modal-header">

        <h5 class="modal-title">Tambah <?= $tabel3_alias ?></h5>

        <!-- tombol tutup modal -->
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>

      </div>

      <!-- form tambah yang bisa menginput gambar -->
      <form action="<?= site_url('fashotel/tambah') ?>" method="post" enctype="multipart/form-data">

        <!-- isi modal -->
        <div class="modal-body">
          <div class="form-group">
            <label><?= $tabel1_field3_alias ?></label>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama fasilitas">
          </div>

          <div class="form-group">
            <label><?= $tabel3_field3_alias ?></label>
            <textarea class="form-control" required name="keterangan" rows="3" placeholder="Masukkan keterangan fasilitas"></textarea>
          </div>

          <div class="form-group">
            <label>Tambah <?= $tabel3_field4_alias ?></label>
            <input class="form-control-file" type="file" required name="img">
          </div>
        </div>

        <!-- memunculkan notifikasi modal -->
        <p id="p_tambah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_tambah') ?></p>

        <!-- footer modal -->
        <div class="modal-footer">

          <!-- tombol simpan data -->
          <button class="btn btn-success" type="submit">Simpan</button>

        </div>

      </form>

    </div>
  </div>
</div>

<!-- menampilkan data fashotel sebagai fh dalam modal -->
<?php foreach ($tabel3 as $tl3) : ?>

  <!-- modal edit -->
  <div id="ubah<?= $tl3->id_fashotel; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- header modal -->
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel3_alias ?> <?= $tl3->id_fashotel; ?></h5>

          <!-- tombol tutup modal -->
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>

        </div>

        <!-- form edit -->
        <form action="<?= site_url('fashotel/update') ?>" method="post" enctype="multipart/form-data">

          <!-- isi modal -->
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel3_field1_alias ?></label>
              <input class="form-control" type="text" required name="nama" value="<?= $tl3->nama; ?>">
              <input type="hidden" name="id_fashotel" value="<?= $tl3->id_fashotel; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel3_field3_alias ?></label>
              <textarea class="form-control" required name="keterangan" rows="3"><?= $tl3->keterangan; ?></textarea>
            </div>

            <div class="form-group">

              <img src="img/fashotel/<?= $tl3->img; ?>" width="300">
            </div>

            <hr>

            <!-- jika img tidak diinput, maka txtimg akan diinput -->
            <div class="form-group">
              <label>Ubah <?= $tabel3_field4_alias ?></label>
              <input class="form-control-file" type="file" name="img">
              <input type="hidden" name="txtimg" value="<?= $tl3->img; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_ubah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

          <!-- footer modal -->
          <div class="modal-footer">

            <!-- tombol simpan data -->
            <button class="btn btn-success" type="submit">Simpan Perubahan</button>

          </div>

        </form>
      </div>
    </div>


  </div>

<?php endforeach; ?>

<!-- menampilkan data fashotel sebagai fh dalam modal -->
<?php foreach ($tabel3 as $tl3) : ?>

  <!-- modal lihat -->
  <div id="lihat<?= $tl3->id_fashotel; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <!-- header modal -->
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel3_alias ?> <?= $tl3->id_fashotel; ?></h5>

          <!-- tombol tutup modal -->
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>

        </div>

        <!-- tag form lihat (tidak wajib) -->
        <form>

          <!-- isi data -->
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel1_field3_alias ?> : </label>
              <p><?= $tl3->nama; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel3_field3_alias ?> : </label>
              <p><?= $tl3->keterangan; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <img src="img/fashotel/<?= $tl3->img; ?>" width="450">
            </div>
            <hr>

          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

          <!-- footer modal -->
          <div class="modal-footer">

            <!-- tombol tutup modal -->
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>

          </div>

        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>