<!-- halaman print untuk pesanan -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($pengaturan as $p) : ?>
      <h1 class="text-center">Laporan Fasilitas Hotel</h1>
      <p class="text-center"><?= $p->nama; ?> | <?= $p->hp; ?> | <?= $p->email; ?></p>
      <p class="text-center"><?= $p->alamat; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->
    <?php foreach ($fashotel as $fh) : ?>

      <!-- menampilkan data pemesan -->
      <table class="table">
        <thead class="thead-">
          <tr>
            <th>Id Fasilitas Hotel</th>
            <th>Nama Fasilitas</th>
            <th>Keterangan</th>
            <th>Gambar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="25%"><?= $fh->id_fashotel ?></td>
            <td width="25%"><?= $fh->nama ?></a>
            <td width="25%"><?= $fh->keterangan ?></td>
            <td width="25%"><img src="img/fashotel/<?= $fh->img ?>" width="100"></td>
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