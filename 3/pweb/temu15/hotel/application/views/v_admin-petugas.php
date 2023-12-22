<?php if ($this->session->userdata('level') <> 'administrator') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('petugas/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel4_field1_alias ?></th>
        <th><?= $tabel4_field2_alias ?></th>
        <th><?= $tabel4_field3_alias ?></th>
        <th><?= $tabel4_field4_alias ?></th>
        <th><?= $tabel4_field5_alias ?></th>
        <th><?= $tabel4_field6_alias ?></th>
        <th><?= $tabel4_field7_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($petugas as $p) : ?>
        <tr>
          <td><?= $p->id_petugas; ?></td>
          <td><?= $p->nama ?></td>
          <td><?= $p->email ?></td>
          <td><?= $p->hp ?></td>
          <td><img class="img-fluid" style="max-height: 50px; object-fit:cover" src="img/petugas/<?= $p->img ?>"></td>
          <td><?= $p->role ?></td>
          <td><?= $p->poin ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $p->id_petugas; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $p->id_petugas; ?>">
              <i class="fas fa-edit"></i></a>

            <!-- Sebelumnya saya sudah membahas ini di v_admin_tipe_kamar
          Saya akan mempending fitur ini dengan alasan yang sama dalam waktu yang belum ditentukan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus petugas?')" href="<?= site_url('petugas/hapus/' . $p->id_petugas) ?>">
            <i class="fas fa-trash"></i></a> -->
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

    <tfoot>
      <tr>
        <th><?= $tabel4_field1_alias ?></th>
        <th><?= $tabel4_field2_alias ?></th>
        <th><?= $tabel4_field3_alias ?></th>
        <th><?= $tabel4_field4_alias ?></th>
        <th><?= $tabel4_field5_alias ?></th>
        <th><?= $tabel4_field6_alias ?></th>
        <th><?= $tabel4_field7_alias ?></th>
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
        <h5 class="modal-title">Tambah <?= $tabel4_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('petugas/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input class="form-control" type="email" required name="email" placeholder="Masukkan email">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <input class="form-control" type="text" required name="hp" placeholder="Masukkan hp">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-image"></i></span>
            </div>
            <input class="form-control form-control-file" type="file" required name="img">
          </div>


          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-users"></i></span>
            </div>
            <!-- hanya admin yang bisa menentukan role petugas -->
            <select class="form-control" required name="role">
              <option value="" selected hidden>Pilih Role Petugas</option>
              <option value="cleaning">cleaning</option>
              <option value="maintenance">maintenance</option>
            </select>
          </div>
        </div>

        <!-- memunculkan notifikasi modal -->
        <p id="p_tambah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_tambah') ?></p>


        <!-- saat ini tidak ada input poin, semua poin petugas dimulai dari 0 -->
        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($petugas as $p) : ?>
  <div id="ubah<?= $p->id_petugas; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel4_alias ?> <?= $p->id_petugas; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url('petugas/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="text" required name="nama" value="<?= $p->nama; ?>">
              <input type="hidden" name="id_petugas" value="<?= $p->id_petugas; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input class="form-control" type="email" required name="email" value="<?= $p->email; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input class="form-control" type="text" required name="hp" value="<?= $p->hp; ?>">
            </div>

            <div class="form-group">
              <img src="img/petugas/<?= $p->img; ?>" width="300">
            </div>
            <hr>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-users"></i></span>
              </div>
              <input class="form-control form-control-file" type="file" name="img">
              <input type="hidden" name="txtimg" value="<?= $p->img; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-users"></i></span>
              </div>
              <!-- hanya admin yang bisa menentukan role petugas -->
              <select class="form-control" required name="role">
                <option value="<?= $p->role ?>" selected hidden><?= $p->role ?></option>
                <option value="cleaning">cleaning</option>
                <option value="maintenance">maintenance</option>
              </select>
            </div>

            <!-- Poin tidak bisa diubah maupun dikurangi, hanya bisa didapat melalui hasil operasional hotel -->
            <input type="hidden" name="poin" value="<?= $p->poin; ?>">
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
<?php foreach ($petugas as $p) : ?>
  <div id="lihat<?= $p->id_petugas; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel4_alias ?> <?= $p->id_petugas; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password petugas lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel4_field2_alias ?> : </label>
              <p><?= $p->nama; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel4_field3_alias ?> : </label>
              <p><?= $p->email; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel4_field4_alias ?> : </label>
              <p><?= $p->hp; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <img src="img/petugas/<?= $p->img; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel4_field6_alias ?> : </label>
              <p><?= $p->role; ?></p>
            </div>
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