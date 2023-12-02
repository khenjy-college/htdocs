<!-- halaman print untuk pesanan -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($pengaturan as $p) : ?>
      <h1 class="text-center">Laporan Operations</h1>
      <p class="text-center"><?= $p->nama; ?> | <?= $p->hp; ?> | <?= $p->email; ?></p>
      <p class="text-center"><?= $p->alamat; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->
    <?php foreach ($operations as $op) : ?>

      <!-- menampilkan data pemesan -->
      <table class="table">
        <thead class="thead-">
          <tr>
            <th>Id Operations</th>
            <th>No Kamar</th>
            <th>Id User</th>
            <th>Id Petugas</th>
            <th>Keterangan</th>
            <th>Tanggal Perubahan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="10%"><?= $op->id_operations ?></td>
            <td width="15%"><?= $op->no_kamar ?></a>
            <td width="10%"><?= $op->id_user ?></a>
            <td width="25%"><?= $op->id_petugas ?></a>
            <td width="20%"><?= $op->keterangan ?></a>
            <td width="20%"><?= $op->tgl_perubahan ?></td>
            </td>
          </tr>
        </tbody>
      </table>

    <?php endforeach ?>
  </div>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>