<?php foreach ($tbl7 as $tl7) : ?>
  <img src="img/tabel7/<?= $tl7->$tabel7_field5 ?>" class="img-fluid rounded">
<?php endforeach; ?>

<h2 class="pt-2"><?= $title ?><?= $phase ?></h2>
<hr>

<div class="row">
  <?php foreach ($tbl3 as $tl3) : ?>
    <div class="col-md-4 tabel3">

      <!-- gambar dapat ditekan untuk memunculkan modal -->
      <img style="height: 200px;" role="button" data-toggle="modal" data-target="#lihat<?= $tl3->$tabel3_field1 ?>" class="img-thumbnail img-fluid" src="<?= "img/tabel3/".$tl3->$tabel3_field4; ?>">

    </div>
  <?php endforeach; ?>
</div>


<!-- modal lihat -->
<?php foreach ($tbl3 as $tl3) : ?>
  <div id="lihat<?= $tl3->$tabel3_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <!-- judul modal menggunakan $tabel3_field2 fasilitas -->
          <h5 class="modal-title"><?= $tl3->$tabel3_field2; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <img class="img-thumbnail" src="<?= "img/tabel3/". $tl3->$tabel3_field4; ?>">
        </div>

        <!-- memunculkan notifikasi modal -->
        <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>