<!-- halaman print untuk pesanan -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($pengaturan as $p) : ?>
      <h1 class="text-center">Laporan User</h1>
      <p class="text-center"><?= $p->nama; ?> | <?= $p->hp; ?> | <?= $p->email; ?></p>
      <p class="text-center"><?= $p->alamat; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->
    <?php foreach ($user as $us) : ?>

      <!-- menampilkan data pemesan -->
      <table class="table">
        <thead class="thead-">
          <tr>
            <th>Id User</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Hp</th>
            <th>Level</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="20%"><?= $us->id_user ?></td>
            <td width="20%"><?= $us->nama ?></a>
            <td width="20%"><?= $us->email ?></td>
            <td width="20%"><?= $us->hp ?></td>
            <td width="20%"><?= $us->level ?></td>
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