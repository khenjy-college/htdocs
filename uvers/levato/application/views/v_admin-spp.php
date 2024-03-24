<?php switch ($this->session->userdata('level')) {
  case 'administrator':
    // case 'petugas':
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url($tabel6.'/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel6_field1_alias ?></th>
        <th><?= $tabel6_field2_alias ?></th>
        <th><?= $tabel6_field3_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tbl6 as $tl6) : ?>
        <tr>
          <td><?= $tl6->id_spp; ?></td>
          <td><?= $tl6->tahun ?></td>
          <td>Rp <?= number_format($tl6->nominal, '2', ',', '.') ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl6->id_spp; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl6->id_spp; ?>">
              <i class="fas fa-edit"></i></a>


            <!-- Ini adalah fitur yang akan kupending terlebih dahulu
            Rencananya ini akan kubuka lagi setelah kupelajari cascade
            Rencanannya jika user menghapus data tipe kelas, maka ada use case yang terjadi
            Namun use case tersebut saat ini masih belum bisa ditentukan
            Entah itu mau menghapus data yang berada di tabel child, atau meng-NULL kan data di child table
            Hal itu perlu didiskusikan lebih lanjut supaya tidak ada bug yang tidak diinginkan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus data tipe kelas?')" href="<?= site_url($tabel6.'/hapus/' . $tl6->id_spp) ?>">
            <i class="fas fa-trash"></i></a> -->

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th><?= $tabel6_field1_alias ?></th>
        <th><?= $tabel6_field2_alias ?></th>
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
      <form action="<?= site_url($tabel6.'/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- Rencananya adalah untuk membuat style khusus untuk masing-masing id spp (ditunda) -->
          <!-- <div class="form-group">
            <label><?= $tabel6_field1_alias ?></label>
            <input class="form-control" type="text" required name="id_spp" placeholder="Masukkan <?= $tabel6_field1_alias ?>">
          </div> -->

          <div class="form-group">
            <label><?= $tabel6_field2_alias ?></label>
            <input class="form-control" type="number" required name="tahun" value="2010" placeholder="Masukkan <?= $tabel6_field2_alias ?>">
          </div>

          <div class="form-group">
            <label><?= $tabel6_field3_alias ?></label>
            <input class="form-control" type="number" required name="nominal" value="300000" placeholder="Masukkan <?= $tabel6_field3_alias ?>">
          </div>

          <!-- Keterangan tabel yang menjelaskan tentang id spp ditunda dulu karena malas -->
          <!-- <div class="table-responsive">
            <table class="table table-light" id="data">
              <thead></thead>
              <tbody>
                <tr>
                  <td colspan="2" class="table-secondary table-active">Keterangan ID SPP</td>
                </tr>

                <tr>
                  <td class="table-secondary table-active">ID</td>
                  <td class="table-light">Keterangan</td>
                </tr>

                <tr>
                  <td class="table-secondary table-active">1010</td>
                  <td class="table-light"><?= $tl4->nama ?></td>
                </tr>

                <tr>
                  <td class="table-secondary table-active"><?= $tabel4_field4_alias ?></td>
                  <td class="table-light"><?= $tl4->id_kelas ?></td>
                </tr>

                <tr>
                  <td class="table-secondary table-active"><?= $tabel4_field5_alias ?></td>
                  <td class="table-light"><?= $tl4->alamat ?></td>
                </tr>

                <tr>
                  <td class="table-secondary table-active"><?= $tabel4_field6_alias ?></td>
                  <td class="table-light"><?= $tl4->no_telp ?></td>
                </tr>
              </tbody>
              <tfoot></tfoot>
            </table>
          </div> -->

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
<?php foreach ($tbl6 as $tl6) : ?>
  <div id="ubah<?= $tl6->id_spp; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel6_alias ?> <?= $tl6->id_spp; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel6.'/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel6_field1_alias ?></label>
              <input class="form-control" type="number" required name="id_spp" value="<?= $tl6->id_spp; ?>">
              <input type="hidden" name="id_spp" value="<?= $tl6->id_spp; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel6_field2_alias ?></label>
              <input class="form-control" type="number" required name="tahun" value="<?= $tl6->tahun; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel6_field3_alias ?></label>
              <input class="form-control" type="number" required name="nominal" value="<?= $tl6->nominal; ?>">
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
<?php foreach ($tbl6 as $tl6) : ?>
  <div id="lihat<?= $tl6->id_spp; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel6_alias ?> <?= $tl6->id_spp; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel6_field2_alias ?> : </label>
              <p><?= $tl6->tahun; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel6_field3_alias ?></label>
              <p>Rp <?= number_format($tl6->nominal, '2', ',', '.') ?></p>
            </div>
            <hr>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_lihat" class=" small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>