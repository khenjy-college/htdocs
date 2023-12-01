<?php if ($this->session->userdata('akses') <> 'administrator') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar Laptop</h1>
<hr>
<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Id Laptop</th>
      <th>Merk Laptop</th>
      <th>Model Laptop</th>
      <th>Ukuran Layar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($laptop as $lp) : ?>
      <tr>
        <td><?= $lp->id_laptop; ?></td>
        <td><?= $lp->merk ?></td>
        <td><?= $lp->model ?></td>
        <td><img src="img/laptop/<?= $lp->ukuran_layar ?>" width="100"></td>
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $lp->id_laptop; ?>">
            <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $lp->id_laptop; ?>">
            <i class="fas fa-edit"></i></a>
          <a class="btn btn-light text-danger" onclick="return confirm('Hapus data merk kamar?')" href="<?= site_url('laptop/hapus/' . $lp->id_laptop) ?>">
            <i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Id Laptop</th>
      <th>Tipe Laptop</th>
      <th>Stok Laptop</th>
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
        <h5 class="modal-title">Tambah Laptop</h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <form action="<?= site_url('laptop/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Merk Laptop</label>
            <input class="form-control" type="text" required name="merk" placeholder="Masukkan merk kamar">
          </div>

          <div class="form-group">
            <label>Model Laptop</label>
            <input class="form-control" type="number" required name="model" min="0" value="1">
          </div>
          
          <div class="form-group">
            <label>Ukuran Layar</label>
            <input class="form-control" type="number" required name="model" min="0" value="1">
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
<?php foreach ($laptop as $lp) : ?>
  <div id="ubah<?= $lp->id_laptop; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Laptop <?= $lp->id_laptop; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        
        <form action="<?= site_url('laptop/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label>Merk Laptop</label>
              <input class="form-control" type="text" required name="merk" value="<?= $lp->merk; ?>">
              <input type="hidden" name="id_laptop" value="<?= $lp->id_laptop; ?>">
            </div>

            <div class="form-group">
              <label>Model Laptop</label>
              <input class="form-control" type="text" required name="model" value="<?= $lp->model; ?>">
            </div>

            <div class="form-group">
              <label>Ukuran Layar</label>
              <input class="form-control" type="text" required name="model" value="<?= $lp->model; ?>">
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
<?php foreach ($laptop as $lp) : ?>
  <div id="lihat<?= $lp->id_laptop; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Laptop <?= $lp->id_laptop; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Tipe Laptop : </label>
              <p><?= $lp->merk; ?></p>
            </div>

            <div class="form-group">
              <label>Stok Laptop : </label>
              <p><?= $lp->model; ?></p>
            </div>
            
            <div class="form-group">
              <label>Ukuran Layar : </label>
              <p><?= $lp->ukuran_layar; ?></p>
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