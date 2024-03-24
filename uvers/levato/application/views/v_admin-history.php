<?php switch ($this->session->userdata('level')) {
  case $tabel9_field6_value3:
  case $tabel9_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel2_field2_alias ?></th>
        <th><?= $tabel2_field3_alias ?></th>
        <th><?= $tabel2_field4_alias ?></th>
        <th><?= $tabel2_field5_alias ?></th>
        <th><?= $tabel2_field6_alias ?></th>
        <th><?= $tabel2_field7_alias ?></th>
        <th><?= $tabel2_field8_alias ?></th>
        <th><?= $tabel2_field9_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tbl2 as $tl2) :
        foreach ($tbl6 as $tl6) :
          if ($tl6->id_spp == $tl2->id_spp) { ?>
            <tr>
              <td><?= $tl2->id_pembayaran ?></td>
              <td><?= $tl2->id_petugas ?></td>
              <td><?= $tl2->nisn ?></td>
              <td><?= $tl2->tgl_bayar ?></td>
              <td><?= $tl2->bulan_dibayar ?></td>
              <td><?= $tl2->tahun_dibayar ?></td>
              <td><?= $tl2->id_spp ?></td>
              <td><?= $tl2->jumlah_bayar ?></td>
              <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl2->id_history ?>">
                  <i class="fas fa-eye"></i></a>
                <a class="btn btn-light text-danger" onclick="return confirm('Hapus data history?')" href="<?= site_url('history/hapus/' . $tl2->id_history) ?>">
                  <i class="fas fa-trash"></i></a>
              </td>
            </tr>
      <?php }
        endforeach;
      endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th><?= $tabel2_field2_alias ?></th>
        <th><?= $tabel2_field3_alias ?></th>
        <th><?= $tabel2_field4_alias ?></th>
        <th><?= $tabel2_field5_alias ?></th>
        <th><?= $tabel2_field6_alias ?></th>
        <th><?= $tabel2_field7_alias ?></th>
        <th><?= $tabel2_field8_alias ?></th>
        <th><?= $tabel2_field9_alias ?></th>
      </tr>
    </tfoot>


  </table>
</div>

<!-- modal lihat -->
<?php foreach ($tbl2 as $tl2) :
  foreach ($tbl6 as $tl6) :
    if ($tl6->id_spp == $tl2->id_spp) { ?>

      <!-- <div id="lihat<?= $tl2->id_history ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel2_alias ?> <?= $tl2->id_history ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel2_field2_alias ?></label>
                    <p><?= $tl2->id_pembayaran ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field4_alias ?></label>
                    <p><?= $tl2->pemesan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field5_alias ?></label>
                    <p><?= $tl2->email ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field6_alias ?></label>
                    <p><?= $tl2->hp ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field9_alias ?></label>
                    <p><?= $tl2->jlh ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel2_field7_alias ?></label>
                    <p><?= $tl2->siswa ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel6_field2_alias ?></label>
                    <p><?= $tl6->tipe ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field11_alias ?></label>
                    <p><?= $tl2->cek_in ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field12_alias ?></label>
                    <p><?= $tl2->cek_out ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel2_field10_alias ?></label>
                    <p>Rp <?= number_format($tl2->harga_total, '2', ',', '.') ?></p>
                  </div>
                </div>
              </div>
            </div>

            memunculkan notifikasi modal -->
      <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
      </div>
      </div>
      <!-- </div> -->
<?php }
  endforeach;
endforeach; ?>