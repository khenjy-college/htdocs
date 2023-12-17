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
          <th>Id Petugas</th>
          <th>Nama Petugas</th>
          <th>Email</th>
          <th>Hp</th>
          <th>Img</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($petugas as $pt) : ?>
          <tr>
            <td width="10%"><?= $pt->id_petugas ?></td>
            <td width="20%"><?= $pt->nama ?></a></td>
            <td width="20%"><?= $pt->email ?></td>
            <td width="20%"><?= $pt->hp ?></td>
            <td width="20%"><img class="img-fluid" style="max-height: 100px; object-fit:cover" src="img/petugas/<?= $pt->img ?>"></td>
            <td width="10%"><?= $pt->role ?></td>
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