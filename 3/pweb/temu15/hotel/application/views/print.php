<!-- halaman print untuk pesanan -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($pengaturan as $p) : ?>
      <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
      <p class="text-center"><?= $p->nama; ?> | <?= $p->hp; ?> | <?= $p->email; ?></p>
      <p class="text-center"><?= $p->alamat; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->
    <?php foreach ($pesanan as $ps) :
      foreach ($tipe_kamar as $tk) :
        if ($tk->id_tipe == $ps->id_tipe) { ?>

          <!-- menampilkan data pemesan -->
          <table class="table">
            <thead class="thead-">
              <tr>
                <th><?= $tabel8_field1_alias ?></th>
                <th><?= $tabel8_field3_alias ?></th>
                <th><?= $tabel8_field4_alias ?></th>
                <th><?= $tabel8_field5_alias ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="25%"><?= $ps->id_pesanan ?></td>
                <td width="25%"><?= $ps->pemesan ?></a>
                <td width="25%"><?= $ps->email ?></td>
                <td width="25%"><?= $ps->hp ?></td>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- menampilkan data tamu -->
          <table class="table">
            <thead class="thead">
              <tr>
                <th><?= $tabel8_field6_alias ?></th>
                <th><?= $tabel6_field2_alias ?></th>
                <th><?= $tabel8_field10_alias ?></th>
                <th><?= $tabel8_field11_alias ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="25%"><?= $ps->tamu ?></td>
                <td width="25%"><?= $tk->tipe ?></a>
                <td width="25%"><?= $ps->cek_in ?></td>
                <td width="25%"><?= $ps->cek_out ?></td>
                </td>
              </tr>
            </tbody>
          </table>
    <?php }
      endforeach;
    endforeach ?>
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