<?php foreach ($tbl7 as $tl7): ?>
  <img src="img/tabel7/<?= $tl7->$tabel7_field5 ?>" class="img-fluid rounded">
<?php endforeach; ?>

<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value5: ?>

    <!-- method get supaya nilai dari form bisa tampil nanti (tidak langsung masuk ke database) -->
    <form action="<?= site_url('tabel8') ?>" method="get">
      <div id="tour2" class="row justify-content-center align-items-end mt-2">
        <div class="col-md-2">
          <div class="form-group">
            <label><?= $tabel8_field10_alias ?></label>
            <input id="<?= $tabel8_field10 ?>_date" class="form-control" type="date" required oninput="myFunction()"
              name="<?= $tabel8_field10_input ?>" min="<?= date('Y-m-d'); ?>">
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label><?= $tabel8_field11_alias ?></label>
            <input id="<?= $tabel8_field11 ?>_date" class="form-control" type="date" required name="<?= $tabel8_field11_input ?>"
              min="<?= date('Y-m-d', strtotime("+1 day")); ?>">
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label><?= $tabel8_field8_alias ?></label>
            <input class="form-control" readonly type="number" required name="<?= $tabel8_field8_input ?>" min="1" max="10"
              value="1">
          </div>
        </div>

        <div class="col-md-1">
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Pesan</button>
          </div>
        </div>
      </div>
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


<!-- Ide baru : menambahkan fitur tabel8
Tapi ketika user sudah login saja, jika tidak, maka menampilkan tombol login -->

<script>
  function myFunction() {
    let x = document.getElementById("<?= $tabel8_field10 ?>_date").value;

    // Create a Date object with the value from cek_in_date
    let startDate = new Date(x);

    // Add one day to the date
    startDate.setDate(startDate.getDate() + 1);

    // Format the date to YYYY-MM-DD (same as input type date)
    let formattedDate = startDate.toISOString().split('T')[0];


    document.getElementById("<?= $tabel8_field11 ?>_date").min = formattedDate;
    document.getElementById("<?= $tabel8_field11 ?>_date").value = formattedDate;

  }
</script>