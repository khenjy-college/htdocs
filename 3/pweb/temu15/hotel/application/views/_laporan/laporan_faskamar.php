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
          <th>Id Fasilitas Kamar</th>
          <th>Tipe Kamar</th>
          <th>Nama Kamar</th>
          <th>Gambar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($faskamar as $fk) : ?>
          <tr>
            <td width="25%"><?= $fk->id_faskamar ?></td>
            <td width="25%"><?= $fk->tipe ?></a></td>
            <td width="25%"><?= $fk->nama ?></td>
            <td width="25%"><img class="img-fluid" style="max-height: 100px; object-fit:cover" src="img/faskamar/<?= $fk->img ?>"></td>
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