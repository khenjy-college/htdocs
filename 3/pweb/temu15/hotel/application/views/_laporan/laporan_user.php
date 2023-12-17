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
      <thead class="thead">
        <tr>
          <th>Id User</th>
          <th>Nama User</th>
          <th>Email</th>
          <th>Hp</th>
          <th>Level</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($user as $us) : ?>
          <tr>
            <td width="20%"><?= $us->id_user ?></td>
            <td width="20%"><?= $us->nama ?></a></td>
            <td width="20%"><?= $us->email ?></td>
            <td width="20%"><?= $us->hp ?></td>
            <td width="20%"><?= $us->level ?></td>
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