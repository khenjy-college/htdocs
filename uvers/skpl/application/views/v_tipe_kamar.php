<!-- menampilkan fasilitas kamar sesuai dengan tipe kamar yang ada
https://stackoverflow.com/questions/30531359/nested-foreach-in-codeigniter-view
https://stackoverflow.com/questions/22354514/message-trying-to-get-property-of-non-object-in-codeigniter
terima kasih pada link di atas -->

<?php foreach ($tipe_kamar as $tp) : ?>
  <img src="img/tipe_kamar/<?= $tp->img ?>" class="img-fluid rounded">
  <h2 class="pt-2">Tipe <?= $tp->tipe; ?></h2>
  <ul class="list-unstyled ml-2">
    <li>Fasilitas : </li>
    <?php foreach ($faskamar as $fk) : ?>
      <?php if ($tp->tipe === $fk->tipe) { ?>
        <li><?= $fk->nama ?></li>
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