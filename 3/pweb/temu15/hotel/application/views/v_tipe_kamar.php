<!-- menampilkan fasilitas kamar sesuai dengan tipe kamar yang ada
https://stackoverflow.com/questions/30531359/nested-foreach-in-codeigniter-view
https://stackoverflow.com/questions/22354514/message-trying-to-get-property-of-non-object-in-codeigniter
terima kasih pada link di atas -->
<?php foreach ($tabel6 as $tl6) : ?>
  <img src="img/tipe_kamar/<?= $tl6->img ?>" class="img-fluid rounded">
  <h2 class="pt-2">Tipe <?= $tl6->tipe; ?> (Rp <?= number_format($tl6->harga, '2', ',', '.') ?> per hari)</h2>
  <ul class="list-unstyled ml-2">
    <li><?= $tabel1_alias ?> : </li>
    <?php foreach ($tabel1 as $tl1) : ?>
      <?php if ($tl6->tipe === $tl1->tipe) { ?>
        <li><?= $tl1->nama ?></li>
      <?php } ?>
    <?php endforeach; ?>
  </ul>
<?php endforeach; ?>


<!-- method get supaya nilai dari form bisa tampil nanti (tidak langsung masuk ke database) -->
<!-- <form action="<?= site_url('welcome/pemesanan') ?>" method="get">
  <div class="row justify-content-center align-items-end mt-2">
    <div class="col-md-1">
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Pesan</button>
      </div>
    </div>
  </div>
</form> -->


<!-- Ide baru : jika tekan tombol di fasilitas bisa muncul pop up yang menampilkan
 keterangan fasilitas(termasuk gambar) -->