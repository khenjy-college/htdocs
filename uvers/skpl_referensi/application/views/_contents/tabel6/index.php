<!-- menampilkan fasilitas kamar sesuai dengan tipe kamar yang ada
https://stackoverflow.com/questions/30531359/nested-foreach-in-codeigniter-view
https://stackoverflow.com/questions/22354514/message-trying-to-get-property-of-non-object-in-codeigniter
terima kasih pada link di atas -->
<?php foreach ($tbl6 as $tl6) : ?>
  <img src='img/tabel6/<?= $tl6->$tabel6_field3 ?>' class="img-fluid rounded">
  <h2 class="pt-2">Tipe <?= $tl6->$tabel6_field2; ?> (Rp <?= number_format($tl6->$tabel6_field5, '2', ',', '.') ?> per hari)</h2>
  <ul class="list-unstyled ml-2">
    <li><?= $tabel1_alias ?> : </li>
    <?php foreach ($tbl1 as $tl1) : ?>
      <?php if ($tl6->$tabel6_field2 === $tl1->$tabel6_field2) { ?>
        <li><?= $tl1->$tabel1_field3 ?></li>
      <?php } ?>
    <?php endforeach; ?>
  </ul>
<?php endforeach; ?>


<!-- method get supaya nilai dari form bisa tampil nanti (tidak langsung masuk ke database) -->
<!-- <form action="<?= site_url('tabel8') ?>" method="get">
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