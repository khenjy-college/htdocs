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

    <!-- menampilkan data pemesan -->
    <table class="table">
      <thead class="thead">
        <tr>
          <th><?= $tabel6_field1_alias ?></th>
          <th><?= $tabel6_field2_alias ?></th>
          <th><?= $tabel6_field4_alias ?></th>
          <th><?= $tabel6_field5_alias ?></th>
          <th><?= $tabel6_field3_alias ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tabel6 as $tl6) : ?>
          <tr>
            <td width="20%"><?= $tl6->id_tipe ?></td>
            <td width="20%"><?= $tl6->tipe ?></a></td>
            <td width="20%"><?= $tl6->stok ?></td>
            <td width="20%">Rp <?= number_format($tl6->harga, '2', ',', '.') ?></td>
            <td width="20%"><img class="img-fluid" style="max-height: 100px; object-fit:cover" src="img/tipe_kamar/<?= $tl6->img ?>"></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>