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
      <th>Id Spek Laptop</th>
      <th>Processor</th>
      <th>RAM</th>
      <th>Penyimpanan</th>
      <th>Kartu Grafis</th>
      <th>Sistem Operasi</th>
      <th>Baterai</th>
      <th>Port</th>
      <th>Berat</th>
      <th>Dimensi</th>
      <th>Webcam</th>
      <th>Keyboard</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($spesifikasi_laptop as $sl) : ?>
      <tr>
        <td><?= $sl->id_laptop; ?></td>
        <td><?= $sl->id_spek; ?></td>
        <td><?= $sl->processor ?></td>
        <td><?= $sl->ram ?></td>
        <td><?= $sl->penyimpanan ?></td>
        <td><?= $sl->kartu_grafis ?></td>
        <td><?= $sl->sistem_informasi ?></td>
        <td><?= $sl->baterai ?></td>
        <td><?= $sl->port ?></td>
        <td><?= $sl->berat ?></td>
        <td><?= $sl->dimensi ?></td>
        <td><?= $sl->webcam ?></td>
        <td><?= $sl->keyboard ?></td>
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $sl->id_spek; ?>">
            <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $sl->id_spek; ?>">
            <i class="fas fa-edit"></i></a>
          <a class="btn btn-light text-danger" onclick="return confirm('Hapus data fasilitas?')" href="<?= site_url('spesifikasi_laptop/hapus/' . $sl->id_spek) ?>">
            <i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>

  <tfoot>
    <tr>
      <th>Id Laptop</th>
      <th>Id Spek Laptop</th>
      <th>Processor</th>
      <th>RAM</th>
      <th>Penyimpanan</th>
      <th>Kartu Grafis</th>
      <th>Sistem Operasi</th>
      <th>Baterai</th>
      <th>Port</th>
      <th>Berat</th>
      <th>Dimensi</th>
      <th>Webcam</th>
      <th>Keyboard</th>
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

        <div class="modal-body">

          <!-- memilih salah satu tipe spesifikasi_laptop yang ada -->
          <div class="form-group">
            <label>Tipe Laptop</label>
            <select class="form-control" required name="tipe">
              <option selected hidden value="">Pilih Tipe Laptop...</option>
              <?php foreach ($tipe_kamar as $tp) : ?>

                <!-- mengambil nilai tipe dari tipe spesifikasi_laptop -->
                <option><?= $tp->tipe; ?></option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            <label>Nama Laptop</label>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama fasilitas">
          </div>

          <div class="form-group">
            <label>Tambah Gambar</label>
            <input class="form-control-file" type="file" required name="img">
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
<?php foreach ($spesifikasi_laptop as $sl) : ?>
  <div id="ubah<?= $sl->id_spek; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Laptop <?= $sl->id_spek; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('spesifikasi_laptop/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">

              <!-- memilih salah satu tipe spesifikasi_laptop yang ada -->
              <label>Tipe Laptop</label>
              <select class="form-control" required name="tipe">

                <!-- menampilkan nilai tipe spesifikasi_laptop yang aktif -->
                <option selected hidden><?= $sl->tipe; ?></option>

                <?php foreach ($tipe_kamar as $tp) : ?>
                  <option><?= $tp->tipe; ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <label>Processor</label>
              <input class="form-control" type="text" required name="processor" value="<?= $sl->processor; ?>">
              <input type="hidden" name="processor" value="<?= $sl->processor; ?>">
            </div>

            <div class="form-group">
              <label>RAM</label>
              <input class="form-control" type="text" required name="nama" value="<?= $sl->ram; ?>">
              <input type="hidden" name="ram" value="<?= $sl->ram; ?>">
            </div>

            <div class="form-group">
              <label>Penyimpanan</label>
              <input class="form-control" type="text" required name="nama" value="<?= $sl->penyimpanan; ?>">
              <input type="hidden" name="penyimpanan" value="<?= $sl->penyimpanan; ?>">
            </div>

            <div class="form-group">
              <label>Kartu Grafis</label>
              <input class="form-control" type="text" required name="grafis" value="<?= $sl->kartu_grafis; ?>">
              <input type="hidden" name="kartu_grafis" value="<?= $sl->kartu_grafis; ?>">
            </div>

            <div class="form-group">
              <label>Sistem Operasi</label>
              <input class="form-control" type="text" required name="sistem_operasi" value="<?= $sl->sistem_operasi; ?>">
              <input type="hidden" name="sistem_operasi" value="<?= $sl->sistem_operasi; ?>">
            </div>

            <div class="form-group">
              <label>Baterai</label>
              <input class="form-control" type="text" required name="baterai" value="<?= $sl->baterai; ?>">
              <input type="hidden" name="baterai" value="<?= $sl->baterai; ?>">
            </div>

            <div class="form-group">
              <label>Port</label>
              <input class="form-control" type="text" required name="port" value="<?= $sl->port; ?>">
              <input type="hidden" name="port" value="<?= $sl->port; ?>">
            </div>

            <div class="form-group">
              <label>Berat</label>
              <input class="form-control" type="text" required name="berat" value="<?= $sl->berat; ?>">
              <input type="hidden" name="berat" value="<?= $sl->berat; ?>">
            </div>

            <div class="form-group">
              <label>Dimensi</label>
              <input class="form-control" type="text" required name="dimensi" value="<?= $sl->dimensi; ?>">
              <input type="hidden" name="dimensi" value="<?= $sl->dimensi; ?>">
            </div>

            <div class="form-group">
              <label>Webcam</label>
              <input class="form-control" type="text" required name="webcam" value="<?= $sl->webcam; ?>">
              <input type="hidden" name="webcam" value="<?= $sl->webcam; ?>">
            </div>

            <div class="form-group">
              <label>Keyboard</label>
              <input class="form-control" type="text" required name="keyboard" value="<?= $sl->keyboard; ?>">
              <input type="hidden" name="keyboard" value="<?= $sl->keyboard; ?>">
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

<!-- Modal Lihat -->
<?php foreach ($spesifikasi_laptop as $sl) : ?>
  <div id="lihat<?= $sl->id_spek; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Laptop <?= $sl->id_spek; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Tipe Laptop : </label>
              <p><?= $sl->tipe; ?></p>
            </div>

            <div class="form-group">
              <label>Nama Laptop : </label>
              <p><?= $sl->nama; ?></p>
            </div>

            <img src="img/spesifikasi_laptop/<?= $sl->img; ?>" width="450">
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>