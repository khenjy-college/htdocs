<div class="card mb-4">
    <div class="card-header">Input Data Kategori</div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="col-md 12">
                <div class="form-group"><label for="">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" placeholder="silakan masukan Nama Kategori">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Keterangan</label>
                <textarea name="keterangan" rows="3" class="form-control" placeholder="silakan masukan Keterangan"></textarea>
                </div>
            </div><br>


            <center><input type="submit" value="submit" proses="submit" class="btn btn-primary"></center>

        </form>
    </div>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    include "koneksi.php";

    $nk = $_POST['nama_kategori'];
    $ket = $_POST['keterangan'];

    $sql = mysqli_query($db,"INSERT INTO tbl_kategori VALUES (NULL, '$nk', '$ket')");


    if($sql){
        echo"<script>window.alert('Data Berhasil Disimpan!'), window.location.replace('admin.php?page=databkategori')</script>";
    }else{
        die ("Erornya Di SQL");
    }
}else{
        die ("Errornya Disini");
    }
 


?>