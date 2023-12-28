<!-- halaman print untuk pesanan -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($tabel7 as $tl7) : ?>
      <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
      <p class="text-center"><?= $tl7->nama; ?> | <?= $tl7->hp; ?> | <?= $tl7->email; ?></p>
      <p class="text-center"><?= $tl7->alamat; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->
    <?php foreach ($tabel10 as $tl10) : ?>
      <?php foreach ($tabel2 as $tl2) : ?>
        <?php foreach ($tabel6 as $tl6) : ?>

          <?php if ($tl10->id_pesanan === $tl2->id_pesanan && $tl2->id_tipe === $tl6->id_tipe) { ?>

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
                  <td width="25%"><?= $tl2->id_pesanan ?></td>
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

            <!-- menampilkan harga total dari tabel pesanan -->
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
                  <td width="25%"><?= $tl10->id_transaksi ?></td>
                  <td width="25%"><?= $tl10->metode ?></a>
                  <td width="25%">Rp <?= number_format($tl10->bayar, '2', ',', '.') ?></td>
                  <td width="25%"><?= $tl10->tgl_transaksi ?></td>
                  </td>
                </tr>
              </tbody>
            </table>

          <?php } ?>

        <?php endforeach ?>
      <?php endforeach ?>
    <?php endforeach ?>

  </div>

  <p class="text-center">Kirimkan bukti ini ke resepsionis untuk diproses</p>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>