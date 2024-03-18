<?php
require("koneksi.php");
$perintah = "SELECT * FROM tbl_laundry";
$eksekusi = mysqli_query($koneksi, $perintah);
$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();

    while ($ambil = mysqli_fetch_object($eksekusi)) {
        $data["id"] = $ambil->id;
        $data["nama"] = $ambil->nama;
        $data["alamat"] = $ambil->alamat;
        $data["telepon"] = $ambil->telepon;
        array_push($response["data"], $data);
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);
mysqli_close($koneksi);
?>
