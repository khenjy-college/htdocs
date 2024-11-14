<?php 
include "koneksi.php";
$id = $_GET["idb"];
$sql = "SELECT tbl_supplier.*, tbl_kategori.*, tbl_supplier.* FROM tbl_supplier" ;
$sql = mysqli_query($db, "select * from tbl_supplier where kode_supplier = '$id'");
$read = mysqli_fetch_array($sql);

?>

<div class="card mb-4">
    <div class="card-header">Edit Data Supplier</div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="col-md 12">
                <div class="form-group"><label for="">Id Supplier</label>
                <input type="text" name="kode" class="form-control" placeholder="silakan masukan kode supplier" value="<?= $read['kode_supplier']; ?>" readonly>
                <input type="hidden" name="kode" class="form-control" placeholder="silakan masukan kode supplier" value="<?= $read['kode_supplier']; ?>"
                >
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Nama Supplier</label>
                <input type="text" name="nama" class="form-control" value="<?= $read['nama_supplier']; ?>">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Kontak</label>
                <input type="text" name="kontak" class="form-control" value="<?= $read['kontak']; ?>">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Alamat</label>
                <textarea name="alamat" rows="4" class="form-control"><?= $read['alamat']; ?></textarea>
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Email</label>
                <input type="text" name="email" class="form-control" value="<?= $read['email']; ?>">
                </div>
            </div><br>

            <center><input type="submit" value="submit" proses="submit" class="btn btn-primary"></center>

        </form>
    </div>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    include "koneksi.php";

    $kd = $_POST['kode'];
    $nama = $_POST['nama'];
    $idk = $_POST['kontak'];
    $ids = $_POST['alamat'];
    $hrg = $_POST['email'];

    $sql = mysqli_query($db,"UPDATE tbl_supplier SET nama_supplier = '$nama', kontak = '$idk', alamat = '$ids', email = '$hrg' WHERE id_supplier = '$kd'");


    if($sql){
        echo"<script>window.alert('Data Berhasil Disimpan!'), window.location.replace('admin.php?page=datasupplier')</script>";
    }else{
        die ("Erornya Di SQL");
    }
}else{
        die ("Errornya Disini");
    }
 


?>