<?php foreach ($tabel7 as $tl7) : ?>
  <img src="img/<?= $tl7->foto ?>" class="img-fluid rounded">
<?php endforeach; ?>

<!-- menampilkan footer untuk umum  -->
<?php if ($this->session->userdata('level') == 'tamu') { ?>
  <!-- method get supaya nilai dari form bisa tampil nanti (tidak langsung masuk ke database) -->
  <form action="<?= site_url('welcome/pemesanan') ?>" method="get">
    <div id="tour2" class="row justify-content-center align-items-end mt-2">
      <div class="col-md-2">
        <div class="form-group">
          <label><?= $tabel8_field10_alias ?></label>
          <input id="cek_in_date" class="form-control" type="date" required oninput="myFunction()" name="cek_in" min="<?= date('Y-m-d'); ?>">
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label><?= $tabel8_field11_alias ?></label>
          <input id="cek_out_date" class="form-control" type="date" required name="cek_out" min="<?= date('Y-m-d', strtotime("+1 day")); ?>">
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label><?= $tabel8_field8_alias ?></label>
          <input class="form-control" readonly type="number" required name="jlh" min="1" max="10" value="1">
        </div>
      </div>

      <div class="col-md-1">
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Pesan</button>
        </div>
      </div>
    </div>
  </form>

  <!-- menampilkan footer khusus jika level adalah resepsionis dan admin  -->
<?php } else { ?>


<?php } ?>



<?php foreach ($tabel7 as $tl7) : ?>
  <h1 class="text-center">Tentang Kami</h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <p><?= $tl7->metadesc ?></p>
    </div>

    <div class="col-md-6">
      <img class="img-fluid rounded" src="img/mark.png">
    </div>
  </div>
<?php endforeach ?>

<!-- Ide baru : menambahkan fitur pesan hotel
Tapi ketika user sudah login saja, jika tidak, maka menampilkan tombol login -->

<script>
  function myFunction() {
    let x = document.getElementById("cek_in_date").value;

    // Create a Date object with the value from cek_in_date
    let startDate = new Date(x);

    // Add one day to the date
    startDate.setDate(startDate.getDate() + 1);

    // Format the date to YYYY-MM-DD (same as input type date)
    let formattedDate = startDate.toISOString().split('T')[0];


    document.getElementById("cek_out_date").min = formattedDate;
    document.getElementById("cek_out_date").value = formattedDate;

  }
</script>