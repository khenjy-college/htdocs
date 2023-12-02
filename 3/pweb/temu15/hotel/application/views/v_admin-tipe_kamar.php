<?php if ($this->session->userdata('akses') <> 'administrator') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar Kamar</h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('tipe_kamar/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

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
        <td><?= $tp->harga ?></td>
        <td><img src="img/tipe_kamar/<?= $tp->img ?>" width="100"></td>
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tp->id_tipe; ?>">
            <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tp->id_tipe; ?>">
            <i class="fas fa-edit"></i></a>
          <a class="btn btn-light text-danger" onclick="return confirm('Hapus data tipe kamar?')" href="<?= site_url('tipe_kamar/hapus/' . $tp->id_tipe) ?>">
            <i class="fas fa-trash"></i></a>
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

          <div class="form-group">
            <label>Stok Kamar</label>
            <input class="form-control" type="number" required name="stok" min="0" value="1">
          </div>

          <!-- Harga kamar masih menggunakan satuan per kamar, untuk per hari masih belum -->
          <div class="form-group">
            <label>Harga Kamar (Per Kamar, untuk satuan waktu masih belum)</label>
            <input class="form-control" type="number" required name="harga" min="0" value="50000">
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
              <label>Stok Kamar</label>
              <input class="form-control" type="text" required name="stok" value="<?= $tp->stok; ?>">
            </div>

            <div class="form-group">
              <label>Harga Kamar</label>
              <input class="form-control" type="number" required name="harga" value="<?= $tp->harga; ?>">
            </div>

            <img src="img/tipe_kamar/<?= $tp->img; ?>" width="300">
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

            <div class="form-group">
              <label>Stok Kamar : </label>
              <p><?= $tp->stok; ?></p>
            </div>

            <div class="form-group">
              <label>Harga Kamar : </label>
              <p><?= $tp->harga; ?></p>
            </div>

            <img src="img/tipe_kamar/<?= $tp->img; ?>" width="450">

          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>