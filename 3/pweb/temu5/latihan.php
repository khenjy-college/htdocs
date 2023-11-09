<fieldset>
  <legend>Masukkan Input</legend>

  <form method="post">
      <label for="">Masukkan Nomor KTP: </label><br>
      <input type="text" name="nomorktp"><br>
      <label for="">Masukkan Nama Nasabah: </label><br>
      <input type="text"name="nama"><br>
      <label for="">Masukkan Jenis Rekening: </label><br>
      <select name="jenis" id="jenis"><br>
        <option value="pelajar">Pelajar</option>
        <option value="biasa">Tabungan Biasa</option>
        <option value="umkm">UMKM</option>
      </select>
      <input type="submit" value="proses"><br>
    </form>
</fieldset>

<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  $nama = $_POST['nama'];
  $nomorktp = $_POST['nomorktp'];
  $jenis = $_POST['jenis'];
  $min_setoran;
  $bunga = "";

//membuat percabangan atau kondisi
if ($jenis == "pelajar") {
  $min_setoran = 100000;
  $bunga = 2.5;
  
} else if ($jenis == "biasa") {
  $min_setoran  = 200000;
  $bunga = 5;

} else if ($jenis == "umkm") {
  $min_setoran = 500000;
  $bunga = 10;
} else {
  $min_setoran = 0;
  $bunga = 0;
}

echo "<fieldset>";
echo "<legend>Hasil</legend>";
echo "<p>Nomor KTP: $nomorktp</p>";
echo "<p>Nama: $nama</p>";
echo "<p>Jenis Kartu: $jenis</p>";
echo "<p>Minimal Setoran: Rp.$min_setoran</p>";
echo "<p>Bunga: $bunga%</p>";
echo "</fieldset>";

?>