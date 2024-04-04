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

    <!-- menampilkan data pemesan -->
    <table class="table">
      <thead class="thead">
        <tr>
          <th><?= $tabel5_field1_alias ?></th>
          <th><?= $tabel5_field2_alias ?></th>
          <th><?= $tabel5_field3_alias ?></th>
          <th><?= $tabel5_field4_alias ?></th>
          <th><?= $tabel5_field5_alias ?></th>
          <th><?= $tabel5_field6_alias ?></th>
          <th><?= $tabel5_field7_alias ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tbl5 as $tl5) : ?>
          <tr>
            <td width="20%"><?= $tl5->$tabel5_field1 ?></td>
            <td width="20%"><?= $tl5->$tabel5_field2 ?></td>
            <td width="10%"><?= $tl5->$tabel5_field3 ?></td>
            <td width="10%"><?= $tl5->$tabel5_field4 ?></td>
            <td width="10%"><?= $tl5->$tabel5_field5 ?></td>
            <td width="20%"><?= $tl5->$tabel5_field6 ?></td>
            <td width="10%"><?= $tl5->$tabel5_field7 ?></td>
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