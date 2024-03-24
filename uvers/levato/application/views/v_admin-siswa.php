<?php switch ($this->session->userdata('level')) {
  case 'administrator':
  case 'petugas':
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url($tabel4.'/laporan') ?>" target="_blank">
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
      <?php foreach ($tbl4 as $tl4) : ?>
        <tr>
          <td><?= $tl4->nisn; ?></td>
          <td><?= $tl4->nis ?></td>
          <td><?= $tl4->nama ?></td>
          <td><?= $tl4->id_kelas ?></td>
          <td><?= $tl4->alamat ?></td>
          <td><?= $tl4->no_telp ?></td>
          <td><?= $tl4->id_spp ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl4->nisn; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl4->nisn; ?>">
              <i class="fas fa-edit"></i></a>

            <!-- Sebelumnya saya sudah membahas ini di v_admin_spp
          Saya akan mempending fitur ini dengan alasan yang sama dalam waktu yang belum ditentukan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="< site_url($tabel9.'/hapus/' . $tl4->nisn) ?>">
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

      <form action="<?= site_url($tabel4.'/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="nisn" placeholder="Masukkan nisn">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="nis" placeholder="Masukkan nis">
          </div>

          <!-- administrator dapat menentukan password untuk akun baru -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-school"></i></span>
            </div>

            <!-- hanya admin yang bisa menentukan level user -->
            <select class="form-control" required name="id_kelas">
              <option value="" selected hidden>Pilih <?= $tabel4_field4_alias ?></option>
              <?php foreach ($tbl5 as $tl5) : ?>
                <option value="<?= $tl5->id_kelas ?>"><?= $tl5->nama_kelas ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
            </div>
            <textarea class="form-control" name="alamat" id="inputAlamat" placeholder="Masukkan alamat"></textarea>
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <input class="form-control" type="text" required name="no_telp" placeholder="Masukkan nomor telepon">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-school"></i></span>
            </div>

            <!-- hanya admin yang bisa menentukan level user -->
            <select class="form-control" required name="id_spp">
              <option value="" selected hidden>Pilih <?= $tabel4_field7_alias ?></option>
              <?php foreach ($tbl6 as $tl6) : ?>
                <option value="<?= $tl6->id_spp ?>"><?= $tl6->tahun ?> - Rp <?= number_format($tl6->nominal, '2', ',', '.') ?></option>
              <?php endforeach; ?>
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
<?php foreach ($tbl4 as $tl4) : ?>
  <div id="ubah<?= $tl4->nisn; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel4_alias ?> <?= $tl4->nisn; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($tabel4.'/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="text" required name="nis" placeholder="Masukkan nis" value="<?= $tl4->nis ?>">
              <input type="hidden" name="nisn" value="<?= $tl4->nisn ?>">
              <input type="hidden" name="id_spp" value="<?= $tl4->id_spp ?>">
            </div>

            <!-- administrator dapat menentukan password untuk akun baru -->
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama" value="<?= $tl4->nama ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-school"></i></span>
              </div>

              <!-- hanya admin yang bisa menentukan level user -->
              <select class="form-control" required name="id_kelas">
                <?php foreach ($tbl5 as $tl5) :
                  if ($tl4->id_kelas == $tl5->id_kelas) { ?>
                    <option value="<?= $tl4->id_kelas ?>" selected hidden><?= $tl5->nama_kelas ?></option>
                  <?php } ?>
                <?php endforeach; ?>

                <?php foreach ($tbl5 as $tl5) : ?>
                  <option value="<?= $tl5->id_kelas ?>"><?= $tl5->nama_kelas ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <textarea class="form-control" name="alamat" id="inputAlamat" placeholder="Masukkan alamat"><?= $tl4->alamat ?></textarea>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input class="form-control" type="text" required name="no_telp" placeholder="Masukkan nomor telepon" value="<?= $tl4->no_telp ?>">
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
<?php foreach ($tbl4 as $tl4) : ?>
  <div id="lihat<?= $tl4->nisn; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel4_alias ?> <?= $tl4->nisn; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel4_field2_alias ?> : </label>
                  <p><?= $tl4->nis; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel4_field3_alias ?> : </label>
                  <p><?= $tl4->nama; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel4_field4_alias ?> : </label>
                  <p><?= $tl4->id_kelas; ?></p>
                </div>
                <hr>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel4_field5_alias ?> : </label>
                  <p><?= $tl4->alamat; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel4_field6_alias ?> : </label>
                  <p><?= $tl4->no_telp; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel4_field7_alias ?> : </label>
                  <p><?= $tl4->id_spp; ?></p>
                </div>
                <hr>
              </div>
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