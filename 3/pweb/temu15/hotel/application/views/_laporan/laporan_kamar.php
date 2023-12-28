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
      <thead class="thead-">
        <tr>
          <th><?= $tabel5_field1_alias ?></th>
          <th><?= $tabel5_field2_alias ?></th>
          <th><?= $tabel5_field4_alias ?></th>
          <th><?= $tabel5_field5_alias ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tabel5 as $tl5) : ?>
          <tr>
            <td width="25%"><?= $tl5->no_kamar ?></td>
            <td width="25%"><?= $tl5->id_tipe ?></a></td>
            <td width="25%"><?= $tl5->status ?></td>
            <td width="25%"><?= $tl5->keterangan ?></td>
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