<!-- halaman print untuk pembayaran -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($tbl7 as $tl7) : ?>
      <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
      <p class="text-center"><?= $tl7->nama; ?> | <?= $tl7->hp; ?> | <?= $tl7->email; ?></p>
      <p class="text-center"><?= $tl7->alamat; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pembayaran sebagai ps -->
    <?php foreach ($tbl8 as $tl8) :
      foreach ($tbl6 as $tl6) :
        if ($tl6->id_spp == $tl8->id_spp) { ?>

          <!-- menampilkan data pemesan -->
          <table class="table">
            <thead class="thead-">
              <tr>
                <th><?= $tabel8_field1_alias ?></th>
                <th><?= $tabel8_field2_alias ?></th>
                <th><?= $tabel8_field3_alias ?></th>
                <th><?= $tabel8_field4_alias ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="25%"><?= $tl8->id_pembayaran ?></td>
                <td width="25%"><?= $tl8->id_petugas ?></td>
                <td width="25%"><?= $tl8->nisn ?></td>
                <td width="25%"><?= $tl8->tgl_bayar ?></td>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- menampilkan data siswa -->
          <table class="table">
            <thead class="thead">
              <tr>
                <th><?= $tabel8_field5_alias ?></th>
                <th><?= $tabel8_field6_alias ?></th>
                <th><?= $tabel8_field7_alias ?></th>
                <th><?= $tabel8_field8_alias ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="25%"><?= $tl8->bulan_dibayar ?></td>
                <td width="25%"><?= $tl8->tahun_dibayar ?></td>
                <td width="25%"><?= $tl8->id_spp ?></td>
                <td width="25%">Rp <?= number_format($tl8->jumlah_bayar, '2', ',', '.') ?></td>
              </tr>
            </tbody>
          </table>
    <?php }
      endforeach;
    endforeach ?>
  </div>

  <p class="text-center">Kirimkan bukti ini ke petugas untuk diproses</p>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>