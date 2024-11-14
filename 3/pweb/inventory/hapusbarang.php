<?php
include "koneksi.php";

$id = $_GET['idb'];
$sql = mysqli_query($db, "DELETE FROM tbl_barang WHERE kode_barang = '$id'");

if ($sql) {
  echo "
  <script>
  window.location.replace('admin.php?page=databarang'),
    window.alert('Data berhasil dihapus!')
  </script>";
} else {
  die("Error di SQL");
}
