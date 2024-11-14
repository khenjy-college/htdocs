<form action="" method="post">
  <label for="txtNoKTP">Nomor KTP : </label>
  <input type="number" name="noktp" id="txtNoKTP"><br><br>

  <label for="txtNama">Nama : </label>
  <input type="text" name="nama" id="txtNama"><br><br>
  
  <label for="txtUmur">Umur : </label>
  <input type="number" name="umur" id="txtUmur"><br><br>
  
  <label for="txtKelamin">Jenis Kelamin</label>
  <input type="text" name="kelamin" id="txtKelamin"><br><br>

  <label for="txtAlamat">Alamat</label>
  <input type="text" name="alamat" id="txtalamat"><br><br>
  
  <label for="slcTipeKamar">Tipe Kamar : </label>
  <select name="tipe" id="slcTipeKamar">
    <option value="0">Pilih tipe kamar</option>
    <option value="standar">Standar</option>
    <option value="superior">Superior</option>
    <option value="deluxe">Deluxe</option>
    <option value="suit">Suit</option>
  </select><br><br>
  
  <label for="txtNomorKamar">Nomor Kamar : </label>
  <input type="number" name="nomorkamar" id="txtNomorKamar"><br><br>
  
  <label for="txtFasilitas">Fasilitas : </label>
  <input type="text" name="fasilitas" id="txtFasilitas"><br><br>

  <label for="txtJlhKamar">Jumlah Kamar : </label>
  <input type="number" name="jumlah" id="txtJlhKamar"><br><br>

  <label for="txtLamaInap">Lama Inap : </label>
  <input type="number" name="lama" id="txtLamaInap"><br><br>

  <label for="txtTanggalInap">Tanggal Inap : </label>
  <input type="date" name="tanggal" id="txtTanggalInap"><br><br>

  <input type="submit" value="SIMPAN"><br><br>
</form>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$noktp = $_POST['noktp'];
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$kelamin = $_POST['kelamin'];
$alamat = $_POST['alamat'];
$tipe = $_POST['tipe'];
$nomorkamar = $_POST['nomorkamar'];
$fasilitas = $_POST['fasilitas'];
$jumlah = $_POST['jumlah'];
$lama = $_POST['lama'];
$tanggal = $_POST['tanggal'];

$harga = array('standar' => 300000,
 'superior' => 600000,
'deluxe' => 1000000,
'suit' => 1300000);

if ($jumlah == 1) {
  $diskon = 0;
} elseif ($jumlah == 2) {
  $diskon = ($harga[$tipe]*$jumlah*$lama) * 0.025;
} elseif ($jumlah >= 3 && $jumlah <= 5) {
  $diskon = ($harga[$tipe]*$jumlah*$lama) * 0.05;
} elseif ($jumlah >= 6 && $jumlah <= 10) {
  $diskon = ($harga[$tipe]*$jumlah*$lama) * 0.1;
} else {
  $diskon = 0;
}

$pajak = ($harga[$tipe]*$jumlah*$lama) * 0.1;

$total = (($harga[$tipe]*$jumlah*$lama) + $pajak) - $diskon;

// Menamplkan data
echo "<table border>";
echo "  <thead>";
echo "    <tr>";
echo "    <td>No KTP</td>";
echo "    <td>Nama</td>";
echo "    <td>Umur</td>";
echo "    <td>JK</td>";
echo "    <td>Alamat</td>";
echo "    <td>Tipe Kamar</td>";
echo "    <td>No Kamar</td>";
echo "    <td>Fasilitas</td>";
echo "    <td>Lama</td>";
echo "    <td>Jumlah Kamar</td>";
echo "    <td>Tanggal Inap</td>";
echo "    <td>Harga</td>";
echo "    <td>Diskon</td>";
echo "    <td>Pajak</td>";
echo "    <td>Total</td>";
echo "    </tr>";

echo "    <tr>";
echo "      <td>".$noktp."</td>";
echo "      <td>".$nama."</td>";
echo "      <td>".$umur."</td>";
echo "      <td>".$kelamin."</td>";
echo "      <td>".$alamat."</td>";
echo "      <td>".$tipe."</td>";
echo "      <td>".$nomorkamar."</td>";
echo "      <td>".$fasilitas."</td>";
echo "      <td>".$lama."</td>";
echo "      <td>".$jumlah."</td>";
echo "      <td>".$tanggal."</td>";
echo "      <td>".$harga[$tipe]."</td>";
echo "      <td>".$diskon."</td>";
echo "      <td>".$pajak."</td>";
echo "      <td>".$total."</td>";
echo "    </tr>";  
echo "</table>";

?>
