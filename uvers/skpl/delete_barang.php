<?php
include"koneksi.php";

$id = $_GET['idb'];

$sql = mysqli_query($db, "DELETE FROM tbl_barang WHERE kode_barang = '$id' ");

echo "<script>window.alert('Data Berhasil Dihapus!'), window.location.replace('admin.php?page=databarang')</script>";

?>