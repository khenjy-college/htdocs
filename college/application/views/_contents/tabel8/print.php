<?php switch ($this->session->userdata($base_url . $tabel9_field6)) {
    // case $tabel9_field6_value3:
  case $tabel9_field6_value5:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<!-- halaman print untuk pesanan -->

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

    <!-- menampilkan data pesanan sebagai ps -->
    <?php foreach ($tbl8 as $tl8) :
      foreach ($tbl6 as $tl6) :
        if ($tl6->$tabel6_field1 == $tl8->$tabel8_field7) { ?>

          <!-- menampilkan data pemesan -->
          <table class="table">
            <thead class="thead-">
              <tr>
                <th><?= $tabel8_field1_alias ?></th>
                <th><?= $tabel8_field2_alias ?></th>
                <th><?= $tabel8_field3_alias ?></th>
                <th><?= $tabel8_field4_alias ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width=""><?= $tl8->$tabel8_field1 ?></td>
                <td width=""><?= $tl8->$tabel8_field2 ?></td>
                <td width=""><?= $tl8->$tabel8_field3 ?></td>
                <td width=""><?= $tl8->$tabel8_field4 ?></td>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- menampilkan data tamu -->
          <table class="table">
            <thead class="thead">
              <tr>
                <th><?= $tabel8_field5_alias ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width=""><?= $tl8->$tabel8_field5 ?></td>
              </tr>
            </tbody>
          </table>
    <?php }
      endforeach;
    endforeach ?>
  </div>

  <p class="text-center">Kirimkan bukti ini ke <?= $tabel9_field6_value4_alias ?> untuk diproses</p>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>