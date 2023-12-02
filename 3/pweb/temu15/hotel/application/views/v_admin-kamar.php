<?php if ($this->session->userdata('akses') <> 'resepsionis') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar Kamar</h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('kamar/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>No Kamar</th>
      <th>Tipe Kamar</th>
      <th>Status</th>
      <th>Keterangan</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($kamar as $km) : ?>
      <tr>
        <td><?= $km->no_kamar; ?></td>
        <td><?= $km->tipe ?></td>
        <td><?= $km->status ?></td>
        <td><?= $km->keterangan ?></td>
        <td>
          <?php if ($km->status == 'Available') { ?>
            <a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $km->no_kamar; ?>">
              <i class="fas fa-eye"></i></a>
          <?php } elseif ($km->status == 'Unavailable') { ?>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $km->no_kamar; ?>">
              <i class="fas fa-edit"></i></a>
          <?php } elseif ($km->status == 'Dirty') { ?>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#assign<?= $km->no_kamar; ?>">
              <i class="fas fa-edit"></i></a>
          <?php } elseif ($km->status == 'Damaged') { ?>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#assign<?= $km->no_kamar; ?>">
              <i class="fas fa-edit"></i></a>

          <?php } ?>

          <!-- Saat ini tidak masuk akal untuk menambahkan fitur untuk menghapus kamar -->
          <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus data fasilitas?')" href="<?= site_url('kamar/hapus/' . $km->no_kamar) ?>">
            <i class="fas fa-trash"></i></a> -->
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>

  <tfoot>
    <tr>
      <th>No Kamar</th>
      <th>Tipe Kamar</th>
      <th>Status</th>
      <th>Keterangan</th>
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

      <form action="<?= site_url('kamar/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- memilih salah satu tipe kamar yang ada -->
          <div class="form-group">
            <label>Tipe Kamar</label>
            <select class="form-control" required name="tipe">
              <option selected hidden value="">Pilih Tipe Kamar...</option>
              <?php foreach ($tipe_kamar as $tp) : ?>

                <!-- mengambil nilai tipe dari tipe kamar -->
                <option value="<?= $tp->id_tipe ?>"><?= $tp->tipe; ?></option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            <label>Status</label>
            <select class="form-control" required name="status">
              <option selected hidden value="">Pilih Status Kamar...</option>

              <!-- memilih nilai status -->
              <option value="Available">Available</option>
              <option value="Unavailable>">Unavailable</option>
              <option value="Dirty">Dirty</option>
              <option value="Damaged">Damaged</option>

            </select>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" required name="keterangan" placeholder="Masukkan keterangan"></textarea>
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
<?php foreach ($kamar as $km) : ?>
  <div id="ubah<?= $km->no_kamar; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Kamar <?= $km->no_kamar; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('kamar/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">

              <!-- memilih salah satu tipe kamar yang ada -->
              <label>Tipe Kamar</label>
              <select class="form-control" required name="tipe">

                <!-- menampilkan nilai tipe kamar yang aktif -->
                <option selected hidden><?= $km->tipe; ?></option>

                <?php foreach ($tipe_kamar as $tp) : ?>
                  <option><?= $tp->tipe; ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <label>Status</label>
              <select class="form-control" required name="status">
                <option selected hidden value=""><?= $km->status; ?></option>

                <!-- memilih nilai status -->
                <option value="Available">Available</option>
                <option value="Unavailable>">Unavailable</option>
                <option value="Dirty">Dirty</option>
                <option value="Damaged">Damaged</option>

              </select>
              <input type="hidden" name="no_kamar" value="<?= $km->no_kamar; ?>">
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
<?php foreach ($kamar as $km) : ?>
  <div id="lihat<?= $km->no_kamar; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Kamar <?= $km->no_kamar; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Tipe Kamar : </label>
              <p><?= $km->tipe; ?></p>
            </div>

            <div class="form-group">
              <label>Nama Kamar : </label>
              <p><?= $km->nama; ?></p>
            </div>

            <img src="img/kamar/<?= $km->img; ?>" width="450">
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!-- modal assign -->
<?php foreach ($kamar as $km) : ?>
  <div id="assign<?= $km->id_kamar ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Kamar <?= $km->id_kamar ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- form untuk mengubah nilai status sebuah kamar -->
        <form action="<?= site_url('kamar/update_status') ?>" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Id Kamar</label>
                  <p><?= $km->id_kamar ?></p>
                  <input type="hidden" name="id_kamar" value="<?= $km->id_kamar; ?>">
                  <input type="hidden" name="tipe" value="<?= $km->tipe; ?>">

                </div>

                <div class="form-group">

                  <!-- memilih salah satu tipe kamar yang ada -->
                  <label>Assign Orang</label>
                  <select class="form-control" required name="tipe">

                    <!-- menampilkan nilai tipe kamar yang aktif -->
                    <option selected hidden><?= $km->tipe; ?></option>

                    <?php foreach ($petugas as $pt) : ?>
                      <option><?= $tp->tipe; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>


                <!-- input status berdasarkan nilai status -->
                <!-- seharusnya jika status masih belum bayar, resepsionis tidak bisa melakukan apa-apa terhadap kamar -->
                <?php if ($km->status == 'Dirty') { ?>


                  <input type="hidden" name="status" value="menunggu">


                <?php } elseif ($km->status == 'Damages') { ?>

                  <input type="hidden" name="status" value="cek in">
                <?php } elseif ($km->status == 'Damages') { ?>
                  <input type="hidden" name="status" value="cek out">
                <?php } ?>


              </div>
            </div>
          </div>

          <div class="modal-footer">

            <!-- pesan yg muncul berdasarkan nilai status -->
            <?php if ($km->status == 'belum bayar') { ?>
              <p>Selesaikan Dulu Transaksi</p>
            <?php } elseif ($km->status == 'menunggu') { ?>
              <p>Ubah Status Menjadi Cek In?</p>
              <button class="btn btn-success" type="submit">Ya</button>
            <?php } elseif ($km->status == 'cek in') { ?>
              <p>Ubah Status Menjadi Cek Out?</p>
              <button class="btn btn-success" type="submit">Ya</button>
            <?php } ?>

          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach ?>