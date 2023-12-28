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
      <thead class="thead">
        <tr>
          <th><?= $tabel1_field1_alias ?></th>
          <th><?= $tabel1_field2_alias ?></th>
          <th><?= $tabel1_field3_alias ?></th>
          <th><?= $tabel1_field4_alias ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tabel1 as $tl1) : ?>
          <tr>
            <td width="25%"><?= $tl1->id_faskamar ?></td>
            <td width="25%"><?= $tl1->tipe ?></a></td>
            <td width="25%"><?= $tl1->nama ?></td>
            <td width="25%"><img class="img-fluid" style="max-height: 100px; object-fit:cover" src="img/faskamar/<?= $tl1->img ?>"></td>
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