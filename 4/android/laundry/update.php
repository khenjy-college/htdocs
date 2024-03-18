<?php
require("koneksi.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["id"]) && isset($_POST["nama"]) && isset($_POST["alamat"]) && isset($_POST["telepon"])) {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $telepon = $_POST["telepon"];
        
        $perintah = "UPDATE tbl_laundry SET nama = '$nama', alamat = '$alamat', telepon = '$telepon' WHERE id = '$id'";
        $eksekusi = mysqli_query($konek, $perintah);
        
        if ($eksekusi) {
            $cek = mysqli_affected_rows($konek);
            if ($cek > 0) {
                $response["kode"] = 1;
                $response["pesan"] = "Data Berhasil Diubah";
            } else {
                $response["kode"] = 0;
                $response["pesan"] = "Data Tidak Tersedia";
            }
        } else {
            $response["kode"] = 0;
            $response["pesan"] = "Gagal Eksekusi Query";
        }
    } else {
        $response["kode"] = 0;
        $response["pesan"] = "Data tidak lengkap";
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Metode request tidak valid";
}

echo json_encode($response);
mysqli_close($konek);
?>
