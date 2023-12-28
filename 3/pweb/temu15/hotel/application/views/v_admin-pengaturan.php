<?php if ($this->session->userdata('level') <> 'administrator') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>
<div class="row">
  <div class="col-md-6">

    <!-- form edit favicon, logo, dan foto -->
    <?php foreach ($tabel7 as $tl7) : ?>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#favicon<?= $tl7->id ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field3_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#logo<?= $tl7->id ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field4_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#foto<?= $tl7->id ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field5_alias ?></a>

      <form action="<?= site_url('pengaturan/update') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label><?= $tabel7_field2_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="nama" value="<?= $tl7->nama; ?>">
          <input type="hidden" name="id" value="<?= $tl7->id; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field6_alias ?></label>
          <textarea class="form-control pengaturan" required name="alamat" rows="3"><?= $tl7->alamat; ?></textarea>
        </div>

        <div class="form-group">
          <label><?= $tabel7_field7_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="email" value="<?= $tl7->email; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field8_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="hp" value="<?= $tl7->hp; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field9_alias ?></label>
          <textarea class="form-control pengaturan" required name="metadesc" rows="5"><?= $tl7->metadesc; ?></textarea>
        </div>

        <div class="form-group">
          <label><?= $tabel7_field10_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="fb" placeholder="Masukkan link" value="<?= $tl7->fb; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field11_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="ig" placeholder="Masukkan link" value="<?= $tl7->ig; ?>">
        </div>

        <div class="form-group">
          <button class="btn btn-success" onclick="return confirm('Ubah data website?')" type="submit">Simpan Perubahan</button>
        </div>
      </form>
    <?php endforeach; ?>
  </div>
  <div class="col-md-6">
    <img class="img-fluid" src="img/engineer.png">
  </div>
</div>


<!-- modal edit favicon-->
<?php foreach ($tabel7 as $tl7) : ?>
  <div id="favicon<?= $tl7->id; ?>" class="modal fade favicon">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field3_alias ?> <?= $tl7->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('pengaturan/update_favicon') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $tl7->favicon; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel7_field3_alias ?></label>
              <input class="form-control-file" required type="file" name="favicon">
              <input type="hidden" name="id" value="<?= $tl7->id; ?>">
              <input type="hidden" name="txtfavicon" value="<?= $tl7->favicon; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_favicon" class="small text-center text-danger"><?= $this->session->flashdata('pesan_favicon') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah favicon?')" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit logo-->
<?php foreach ($tabel7 as $tl7) : ?>
  <div id="logo<?= $tl7->id; ?>" class="modal fade logo">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field4_alias ?> <?= $tl7->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('pengaturan/update_logo') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $tl7->logo; ?>" width="300">
            </div>
            <hr>


            <div class="form-group">
              <label>Ubah <?= $tabel7_field4_alias ?></label>
              <input class="form-control-file" required type="file" name="logo">
              <input type="hidden" name="id" value="<?= $tl7->id; ?>">
              <input type="hidden" name="txtlogo" value="<?= $tl7->logo; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_logo" class="small text-center text-danger"><?= $this->session->flashdata('pesan_logo') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah logo website?')" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit foto-->
<?php foreach ($tabel7 as $tl7) : ?>
  <div id="foto<?= $tl7->id; ?>" class="modal fade foto">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field5_alias ?> <?= $tl7->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('pengaturan/update_foto') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $tl7->foto; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel7_field5_alias ?></label>
              <input class="form-control-file" required type="file" name="foto">
              <input type="hidden" name="id" value="<?= $tl7->id; ?>">
              <input type="hidden" name="txtfoto" value="<?= $tl7->foto; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_foto" class="small text-center text-danger"><?= $this->session->flashdata('pesan_foto') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah foto website?')" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>