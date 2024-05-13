<?php foreach ($tbl7 as $tl7): ?>
  <img src="img/tabel7/<?= $tl7->$tabel7_field5 ?>" class="img-fluid rounded">
<?php endforeach; ?>

<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value5: ?>

    <!-- method get supaya nilai dari form bisa tampil nanti (tidak langsung masuk ke database) -->
    <form action="<?= site_url('tabel8') ?>" method="get">
      <!--  -->
    </form>
    <?php break;

  default: ?>
<?php } ?>


<?php foreach ($tbl7 as $tl7): ?>
  <?php foreach ($tbl13 as $tl13): ?>
    <?php if ($tl7->$tabel7_field12 == $tl13->$tabel7_field12) { ?>

      <h1 class="text-center"><?= $tl13->$tabel13_field3 ?></h1>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <img src="img/tabel13/<?= $tl13->$tabel13_field4 ?>" class="img-fluid rounded">
        </div>
        
        <div class="col-md-6">
          <p><?= $tl13->$tabel13_field5 ?></p>
        </div>
      </div>


    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>

<br>
<br>
<br>




<?php foreach ($tbl7 as $tl7): ?>
  <h1 class="text-center">Tentang Kami</h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <p><?= $tl7->$tabel7_field9 ?></p>
    </div>

    <div class="col-md-6">
      <?php foreach ($dekor as $dk): ?>
        <img src="img/tabel12/<?= $dk->$tabel12_field3 ?>" class="img-fluid rounded">
      <?php endforeach ?>
    </div>
  </div>
<?php endforeach ?>

