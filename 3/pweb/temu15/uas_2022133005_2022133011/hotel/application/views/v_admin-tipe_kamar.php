<?php if ($this->session->userdata('level') <> 'administrator') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('tipe_kamar/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>Id Kamar</th>
        <th>Tipe Kamar</th>
        <th>Stok Kamar</th>
        <th>Harga Kamar</th>
        <th>Image</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tipe_kamar as $tp) : ?>
        <tr>
          <td><?= $tp->id_tipe; ?></td>
          <td><?= $tp->tipe ?></td>
          <td><?= $tp->stok ?></td>
          <td>Rp <?= number_format($tp->harga, '2', ',', '.') ?></td>
          <td><img class="img-fluid" style="max-height: 50px; object-fit:cover" src="img/tipe_kamar/<?= $tp->img ?>"></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tp->id_tipe; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tp->id_tipe; ?>">
              <i class="fas fa-edit"></i></a>


            <!-- Ini adalah fitur yang akan kupending terlebih dahulu
            Rencananya ini akan kubuka lagi setelah kupelajari cascade
            Rencanannya jika user menghapus data tipe kamar, maka ada use case yang terjadi
            Namun use case tersebut saat ini masih belum bisa ditentukan
            Entah itu mau menghapus data yang berada di tabel child, atau meng-NULL kan data di child table
            Hal itu perlu didiskusikan lebih lanjut supaya tidak ada bug yang tidak diinginkan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus data tipe kamar?')" href="<?= site_url('tipe_kamar/hapus/' . $tp->id_tipe) ?>">
            <i class="fas fa-trash"></i></a> -->

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Id Kamar</th>
        <th>Tipe Kamar</th>
        <th>Stok Kamar</th>
        <th>Harga Kamar</th>
        <th>Image</th>
        <th>Aksi</th>
      </tr>
    </tfoot>


  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kamar</h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <form action="<?= site_url('tipe_kamar/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Tipe Kamar</label>
            <input class="form-control" type="text" required name="tipe" placeholder="Masukkan tipe kamar">
          </div>

          <!-- Harga kamar masih menggunakan satuan per kamar, untuk per hari masih belum -->
          <div class="form-group">
            <label>Harga Kamar (Per hari & Per jumlah)</label>
            <input class="form-control" type="number" required name="harga" min="0">
          </div>

          <div class="form-group">
            <label>Tambah Gambar</label>
            <input class="form-control-file" required type="file" name="img">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($tipe_kamar as $tp) : ?>
  <div id="ubah<?= $tp->id_tipe; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Kamar <?= $tp->id_tipe; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('tipe_kamar/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label>Tipe Kamar</label>
              <input class="form-control" type="text" required name="tipe" value="<?= $tp->tipe; ?>">
              <input type="hidden" name="id_tipe" value="<?= $tp->id_tipe; ?>">
            </div>

            <div class="form-group">
              <label>Harga Kamar (Per hari & Per jumlah)</label>
              <input class="form-control" type="number" required name="harga" value="<?= $tp->harga; ?>">
            </div>

            <div class="form-group">
              <img src="img/tipe_kamar/<?= $tp->img; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah Gambar</label>
              <input class="form-control-file" type="file" name="img">
              <input type="hidden" name="txtimg" value="<?= $tp->img; ?>">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal lihat -->
<?php foreach ($tipe_kamar as $tp) : ?>
  <div id="lihat<?= $tp->id_tipe; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Kamar <?= $tp->id_tipe; ?></h5>

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
              <label>Stok Kamar : </label>
              <p><?= $tp->stok; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label>Harga Kamar (Per hari & Per jumlah) : </label>
              <p>Rp <?= number_format($tp->harga, '2', ',', '.') ?></p>
            </div>
            <hr>

            <div class="form-group">
              <img src="img/tipe_kamar/<?= $tp->img; ?>" width="450">

            </div>

          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>