<?php foreach ($pengaturan as $p) : ?>
  <img src="img/<?= $p->foto ?>" class="img-fluid rounded">
<?php endforeach; ?>

<h2 class="pt-2">Fasilitas<?= $phase ?></h2>
<hr>

<div class="row">
  <?php foreach ($fashotel as $fh) : ?>
    <div class="col-md-4 fashotel">

      <!-- gambar dapat ditekan untuk memunculkan modal -->
      <img style="height: 200px;" role="button" data-toggle="modal" data-target="#lihat" class="img-thumbnail img-fluid" src="img/fashotel/<?= $fh->img; ?>">

    </div>
  <?php endforeach; ?>
</div>


<!-- modal lihat -->
<?php foreach ($fashotel as $fh) : ?>
  <div id="lihat" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <!-- judul modal menggunakan nama fasilitas -->
          <h5 class="modal-title"><?= $fh->nama; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <img class="img-thumbnail" src="img/fashotel/<?= $fh->img; ?>">
        </div>
          
          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>