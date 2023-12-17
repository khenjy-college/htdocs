<!-- halaman print untuk pesanan -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($pengaturan as $p) : ?>
      <h1 class="text-center"><?= $title ?></h1>
      <p class="text-center"><?= $p->nama; ?> | <?= $p->hp; ?> | <?= $p->email; ?></p>
      <p class="text-center"><?= $p->alamat; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->

    <!-- menampilkan data pemesan -->
    <table class="table">
      <thead class="thead">
        <tr>
          <th>Id Tipe Kamar</th>
          <th>Tipe Kamar</th>
          <th>Stok</th>
          <th>Harga</th>
          <th>Gambar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tipe_kamar as $tk) : ?>
          <tr>
            <td width="20%"><?= $tk->id_tipe ?></td>
            <td width="20%"><?= $tk->tipe ?></a></td>
            <td width="20%"><?= $tk->stok ?></td>
            <td width="20%">Rp <?= number_format($tk->harga, '2', ',', '.') ?></td>
            <td width="20%"><img class="img-fluid" style="max-height: 100px; object-fit:cover" src="img/tipe_kamar/<?= $tk->img ?>"></td>
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