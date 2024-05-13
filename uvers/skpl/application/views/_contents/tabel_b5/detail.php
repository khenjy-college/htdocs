<?php foreach ($tbl_a1 as $tl_a1):
  if (!$tbl_b5) { ?>
    <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">
    <h1 class="text-center"><?= $tabel_b5_alias ?> tidak tersedia</h1>
    <hr>

  <?php } else {
    foreach ($tbl_b5 as $tl_b5): ?>

      <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">

      <h1 class="text-center">
        <hr>
        <img src="img/<?= $tabel_b5 ?>/<?= $tl_b5->$tabel_b5_field4 ?>" role="button" data-toggle="modal"
          data-target="#lihat<?= $tl_b5->$tabel_b5_field1 ?>" width="25%" class="rounded">
        <br>
        <?= $tabel_b5_alias ?> <a target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>"><?= $tl_b5->$tabel_b5_field2 ?></a>
      </h1>

      <hr>

      <div class="row">
        <div class="col-md">
          <!-- <p>This course is tbl_b5d under a <a target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>"><?= $tl_b5->$tabel_b5_field2 ?></a>
            tbl_b5. This is a human-readable summary of (and not a substitute for) the <a
            target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>/legalcode">tbl_b5</a>. Official
            translations of this tbl_b5 are available in <a
            target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>/legalcode#languages">other languages</a>.</p> -->
          <p><?= html_entity_decode($tl_b5->$tabel_b5_field3) ?></p>
        </div>
      </div>
    <?php endforeach;
  }
endforeach; ?>


<!-- modal lihat -->
<?php foreach ($tbl_b5 as $tl_b5): ?>
  <div id="lihat<?= $tl_b5->$tabel_b5_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <!-- judul modal menggunakan $tabel_b5_field2 fasilitas -->
          <h5 class="modal-title"><?= $tl_b5->$tabel_b5_field2; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <img class="img-thumbnail" width="100%" src="img/<?= $tabel_b5 ?>/<?= $tl_b5->$tabel_b5_field4; ?>">
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