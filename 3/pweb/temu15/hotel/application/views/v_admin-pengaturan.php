<?php if ($this->session->userdata('level') <> 'administrator') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>
<div class="row">
  <div class="col-md-6">

    <!-- form edit favicon, logo, dan foto -->
    <?php foreach ($pengaturan as $p) : ?>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#favicon<?= $p->id ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field3_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#logo<?= $p->id ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field4_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#foto<?= $p->id ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field5_alias ?></a>

      <form action="<?= site_url('pengaturan/update') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label><?= $tabel7_field2_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="nama" value="<?= $p->nama; ?>">
          <input type="hidden" name="id" value="<?= $p->id; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field6_alias ?></label>
          <textarea class="form-control pengaturan" required name="alamat" rows="3"><?= $p->alamat; ?></textarea>
        </div>

        <div class="form-group">
          <label><?= $tabel7_field7_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="email" value="<?= $p->email; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field8_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="hp" value="<?= $p->hp; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field9_alias ?></label>
          <textarea class="form-control pengaturan" required name="metadesc" rows="5"><?= $p->metadesc; ?></textarea>
        </div>

        <div class="form-group">
          <label><?= $tabel7_field10_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="fb" placeholder="Masukkan link" value="<?= $p->fb; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field11_alias ?></label>
          <input class="form-control pengaturan" required type="text" name="ig" placeholder="Masukkan link" value="<?= $p->ig; ?>">
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
<?php foreach ($pengaturan as $p) : ?>
  <div id="favicon<?= $p->id; ?>" class="modal fade favicon">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field3_alias ?> <?= $p->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('pengaturan/update_favicon') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $p->favicon; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel7_field3_alias ?></label>
              <input class="form-control-file" required type="file" name="favicon">
              <input type="hidden" name="id" value="<?= $p->id; ?>">
              <input type="hidden" name="txtfavicon" value="<?= $p->favicon; ?>">
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
<?php foreach ($pengaturan as $p) : ?>
  <div id="logo<?= $p->id; ?>" class="modal fade logo">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field4_alias ?> <?= $p->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('pengaturan/update_logo') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $p->logo; ?>" width="300">
            </div>
            <hr>


            <div class="form-group">
              <label>Ubah <?= $tabel7_field4_alias ?></label>
              <input class="form-control-file" required type="file" name="logo">
              <input type="hidden" name="id" value="<?= $p->id; ?>">
              <input type="hidden" name="txtlogo" value="<?= $p->logo; ?>">
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
<?php foreach ($pengaturan as $p) : ?>
  <div id="foto<?= $p->id; ?>" class="modal fade foto">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field5_alias ?> <?= $p->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('pengaturan/update_foto') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $p->foto; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel7_field5_alias ?></label>
              <input class="form-control-file" required type="file" name="foto">
              <input type="hidden" name="id" value="<?= $p->id; ?>">
              <input type="hidden" name="txtfoto" value="<?= $p->foto; ?>">
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