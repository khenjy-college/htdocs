<?php if ($this->session->userdata('level') <> 'administrator') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('faskamar/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>


<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel1_field1_alias ?></th>
        <th><?= $tabel1_field2_alias ?></th>
        <th><?= $tabel1_field3_alias ?></th>
        <th><?= $tabel1_field4_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($faskamar as $fk) : ?>
        <tr>
          <td><?= $fk->id_faskamar; ?></td>
          <td><?= $fk->tipe ?></td>
          <td><?= $fk->nama ?></td>
          <td><img class="img-fluid" style="max-height: 50px; object-fit:cover" src="img/faskamar/<?= $fk->img ?>"></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $fk->id_faskamar; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $fk->id_faskamar; ?>">
              <i class="fas fa-edit"></i></a>
            <a class="btn btn-light text-danger" onclick="return confirm('Hapus data fasilitas?')" href="<?= site_url('faskamar/hapus/' . $fk->id_faskamar) ?>">
              <i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

    <tfoot>
      <tr>
        <th><?= $tabel1_field1_alias ?></th>
        <th><?= $tabel1_field2_alias ?></th>
        <th><?= $tabel1_field3_alias ?></th>
        <th><?= $tabel1_field4_alias ?></th>
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
        <h5 class="modal-title">Tambah <?= $tabel1_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('faskamar/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- memilih salah satu tipe kamar yang ada -->
          <div class="form-group">
            <label><?= $tabel1_field2_alias ?></label>
            <select class="form-control" required name="tipe">
              <option selected hidden value="">Pilih Tipe Kamar...</option>
              <?php foreach ($tipe_kamar as $k) : ?>

                <!-- mengambil nilai tipe dari tipe kamar -->
                <option><?= $k->tipe; ?></option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            <label><?= $tabel1_field3_alias ?></label>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama fasilitas">
          </div>

          <div class="form-group">
            <label>Tambah <?= $tabel3_field4_alias ?></label>
            <input class="form-control-file" type="file" required name="img">
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
<?php foreach ($faskamar as $fk) : ?>
  <div id="ubah<?= $fk->id_faskamar; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel1_alias ?> <?= $fk->id_faskamar; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('faskamar/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">

              <!-- memilih salah satu tipe kamar yang ada -->
              <label><?= $tabel1_field2_alias ?></label>
              <select class="form-control" required name="tipe">

                <!-- menampilkan nilai tipe kamar yang aktif -->
                <option selected hidden><?= $fk->tipe; ?></option>

                <?php foreach ($tipe_kamar as $k) : ?>
                  <option><?= $k->tipe; ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <label><?= $tabel1_field3_alias ?></label>
              <input class="form-control" type="text" required name="nama" value="<?= $fk->nama; ?>">
              <input type="hidden" name="id_faskamar" value="<?= $fk->id_faskamar; ?>">
            </div>

            <div class="form-group">
              <img src="img/faskamar/<?= $fk->img; ?>" width="300">
            </div>

            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel1_field4_alias ?></label>
              <input class="form-control-file" type="file" name="img">
              <input type="hidden" name="txtimg" value="<?= $fk->img; ?>">
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

<!-- Modal Lihat -->
<?php foreach ($faskamar as $fk) : ?>
  <div id="lihat<?= $fk->id_faskamar; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Fasilitas <?= $fk->id_faskamar; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel1_field2_alias ?> : </label>
              <p><?= $fk->tipe; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel1_field3_alias ?> : </label>
              <p><?= $fk->nama; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <img src="img/faskamar/<?= $fk->img; ?>" width="450">

            </div>
            <hr>

          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>