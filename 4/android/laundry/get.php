<?php
require("koneksi.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        
        $perintah = "DELETE FROM tbl_laundry WHERE id = $id";
        $eksekusi = mysqli_query($konek, $perintah);
        $cek = mysqli_affected_rows($konek);
        
        if ($cek > 0) {
            $response["kode"] = 1;
            $response["pesan"] = "Data Berhasil Dihapus";
        } else {
            $response["kode"] = 0;
            $response["pesan"] = "Gagal Menghapus Data";
        }
    } else {
        $response["kode"] = 0;
        $response["pesan"] = "Parameter id tidak diterima";
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Metode Request Salah";
}

echo json_encode($response);
?>
