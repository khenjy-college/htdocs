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
      <p class="text-center"><?= $tl7->$tabel7_field2; ?> | <?= $tl7->$tabel7_field8; ?> | <?= $tl7->$tabel7_field7; ?></p>
      <p class="text-center"><?= $tl7->$tabel7_field6; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pembayaran sebagai ps -->
    <?php foreach ($tbl10 as $tl10) : ?>
      <?php foreach ($tbl2 as $tl2) : ?>
        <?php foreach ($tbl6 as $tl6) : ?>

          <?php if ($tl10->id_pembayaran === $tl2->id_pembayaran && $tl2->id_spp === $tl6->$tabel6_field1) { ?>

            <!-- menampilkan data pemesan -->
            <table class="table">
              <thead class="thead">
                <tr>
                  <th><?= $tabel2_field2_alias ?></th>
                  <th><?= $tabel2_field4_alias ?></th>
                  <th><?= $tabel2_field5_alias ?></th>
                  <th><?= $tabel2_field6_alias ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width="25%"><?= $tl2->id_pembayaran ?></td>
                  <td width="25%"><?= $tl2->pemesan ?></a>
                  <td width="25%"><?= $tl2->email ?></td>
                  <td width="25%"><?= $tl2->hp ?></td>
                  </td>
                </tr>
              </tbody>
            </table>

            <!-- menampilkan data tamu -->
            <table class="table">
              <thead class="thead">
                <tr>
                  <th><?= $tabel2_field7_alias ?></th>
                  <th><?= $tabel6_field2_alias ?></th>
                  <th><?= $tabel2_field11_alias ?></th>
                  <th><?= $tabel2_field12_alias ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width="25%"><?= $tl2->tamu ?></td>
                  <td width="25%"><?= $tl6->tipe ?></a>
                  <td width="25%"><?= $tl2->cek_in ?></td>
                  <td width="25%"><?= $tl2->cek_out ?></td>
                  </td>
                </tr>
              </tbody>
            </table>

            <!-- menampilkan harga total dari tabel pembayaran -->
            <table class="table">
              <thead class="thead">
                <tr>
                  <th><?= $tabel2_field10_alias ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width="25%">Rp <?= number_format($tl2->harga_total, '2', ',', '.') ?></td>
                  </td>
                </tr>
              </tbody>
            </table>



            <!-- menampilkan data transaksi -->
            <table class="table">
              <thead class="thead">
                <tr>
                  <th><?= $tabel10_field1_alias ?></th>
                  <th><?= $tabel10_field5_alias ?></th>
                  <th><?= $tabel10_field6_alias ?></th>
                  <th><?= $tabel10_field7_alias ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width="25%"><?= $tl10->$tabel10_field1 ?></td>
                  <td width="25%"><?= $tl10->$tabel10_field5 ?></a>
                  <td width="25%">Rp <?= number_format($tl10->$tabel10_field6, '2', ',', '.') ?></td>
                  <td width="25%"><?= $tl10->$tabel10_field7 ?></td>
                  </td>
                </tr>
              </tbody>
            </table>

          <?php } ?>

        <?php endforeach ?>
      <?php endforeach ?>
    <?php endforeach ?>

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