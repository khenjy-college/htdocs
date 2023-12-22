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

    <!-- menampilkan data pemesan -->
    <table class="table">
      <thead class="thead-">
        <tr>
          <th><?= $tabel11_field1_alias ?></th>
          <th><?= $tabel11_field2_alias ?></th>
          <th><?= $tabel11_field3_alias ?></th>
          <th><?= $tabel11_field4_alias ?></th>
          <th><?= $tabel11_field5_alias ?></th>
          <th><?= $tabel11_field6_alias ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($operations as $op) : ?>
          <tr>
            <td width="10%"><?= $op->id_operations ?></td>
            <td width="15%"><?= $op->no_kamar ?></a></td>
            <td width="10%"><?= $op->id_user ?></a></td>
            <td width="25%"><?= $op->id_petugas ?></a></td>
            <td width="20%"><?= $op->keterangan ?></a></td>
            <td width="20%"><?= $op->tgl_perubahan ?></td>
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