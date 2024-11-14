<form method="post">
<select name="nama" id="">
  <option value="0">Silahkan pilih</option>
  <option value="Samsung">Samsung</option>
  <option value="OPPO">OPPO</option>
  <option value="iPhone">iPhone</option>
  <option value="Xiaomi">Xiaomi</option>

</select>

<input type="text" name="jumlah">
<input type="submit" name="proses" value="Proses">
</form>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$nm = $_POST['nama'];
$jml = $_POST['jumlah'];

$barang = array('Samsung' => 1000000,
 'OPPO' => 2000000,
'iPhone' => 3000000,
'Xiaomi' => 2000000,);

$total = $jml * $barang[$nm];
echo "Total Yang Harus dibayar : $total";
?>