<?php if ($this->session->userdata('level') <> 'administrator') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('user/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel9_field1_alias ?></th>
        <th><?= $tabel9_field2_alias ?></th>
        <th><?= $tabel9_field3_alias ?></th>
        <th><?= $tabel9_field5_alias ?></th>
        <th><?= $tabel9_field6_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tabel9 as $tl9) : ?>
        <tr>
          <td><?= $tl9->id_user; ?></td>
          <td><?= $tl9->nama ?></td>
          <td><?= $tl9->email ?></td>
          <td><?= $tl9->hp ?></td>
          <td><?= $tl9->level ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl9->id_user; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl9->id_user; ?>">
              <i class="fas fa-edit"></i></a>

            <!-- Sebelumnya saya sudah membahas ini di v_admin_tipe_kamar
          Saya akan mempending fitur ini dengan alasan yang sama dalam waktu yang belum ditentukan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="< site_url('user/hapus/' . $tl9->id_user) ?>">
            <i class="fas fa-trash"></i></a> -->

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

    <tfoot>
      <tr>
        <th><?= $tabel9_field1_alias ?></th>
        <th><?= $tabel9_field2_alias ?></th>
        <th><?= $tabel9_field3_alias ?></th>
        <th><?= $tabel9_field5_alias ?></th>
        <th><?= $tabel9_field6_alias ?></th>
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
        <h5 class="modal-title">Tambah <?= $tabel9_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('user/tambah') ?>" method="post">
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

          <!-- administrator dapat menentukan password untuk akun baru -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="password" placeholder="Masukkan password">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="konfirm" placeholder="Konfirmasi password">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <input class="form-control" type="text" required name="hp" placeholder="Masukkan hp">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-users"></i></span>
            </div>

            <!-- hanya admin yang bisa menentukan level user -->
            <select class="form-control" required name="level">
              <option value="" selected hidden>Pilih <?= $tabel9_field6_alias ?></option>
              <option value="tamu">tamu</option>
              <option value="resepsionis">resepsionis</option>
              <option value="accounting">accounting</option>
              <option value="administrator">administrator</option>
            </select>
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
<?php foreach ($tabel9 as $tl9) : ?>
  <div id="ubah<?= $tl9->id_user; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel9_alias ?> <?= $tl9->id_user; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url('user/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="text" required name="nama" value="<?= $tl9->nama; ?>">
              <input type="hidden" name="id_user" value="<?= $tl9->id_user; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input class="form-control" type="email" required name="email" value="<?= $tl9->email; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input class="form-control" type="text" required name="hp" value="<?= $tl9->hp; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-users"></i></span>
              </div>
              <select class="form-control" required name="level">
                <option selected hidden><?= $tl9->level; ?></option>
                <option value="tamu">tamu</option>
                <option value="resepsionis">resepsionis</option>
                <option value="accounting">accounting</option>
                <option value="administrator">administrator</option>
              </select>
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
<?php foreach ($tabel9 as $tl9) : ?>
  <div id="lihat<?= $tl9->id_user; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel9_alias ?> <?= $tl9->id_user; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel9_field2_alias ?> : </label>
              <p><?= $tl9->nama; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel9_field3_alias ?> : </label>
              <p><?= $tl9->email; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel9_field5_alias ?> : </label>
              <p><?= $tl9->hp; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel9_field6_alias ?> : </label>
              <p><?= $tl9->level; ?></p>
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