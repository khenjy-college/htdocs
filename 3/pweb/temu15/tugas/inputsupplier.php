<div class="card mb-4">
    <div class="card-header">Input Data supplier</div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="col-md 12">
                <div class="form-group"><label for="">Kode supplier</label>
                <input type="text" name="kode" class="form-control" placeholder="silakan masukan kode supplier">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Nama supplier</label>
                <input type="text" name="nama" class="form-control" placeholder="silakan masukan nama supplier">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Id Kategori</label>
                <select name="idKategori" class="form-control">
                    <option value="0">Silakan Pilih Kategori supplier</option>
                    <?php
                        include"koneksi.php";

                        $sql = mysqli_query($db, "SELECT * FROM tbl_kategori;");

                        while($data = mysqli_fetch_array($sql)){
                    ?>
                    <option value="<?php echo $data['id_kategori']?>"><?php echo $data['nama_kategori']?></option>
                    <?php }?>
                </select>

                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Id Supplier</label>
                <select name="idSupplier" class="form-control">
                    <option value="0">Silakan Pilih id Supplier</option>
                    <?php
                        include"koneksi.php";

                        $sql = mysqli_query($db, "SELECT * FROM tbl_supplier;");

                        while($data = mysqli_fetch_array($sql)){
                        echo "<option value='$data[id_supplier]'>$data[nama_supplier]</option>";
                        }   
                    ?>
                </select>
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Harga</label>
                <input type="text" name="harga" class="form-control" placeholder="silakan masukan harga">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Stock</label>
                <input type="text" name="stock" class="form-control" placeholder="silakan masukan stock">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" placeholder="silakan masukan Tanggal">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Keterangan</label>
                <textarea name="keterangan" rows="4" class="form-control" placeholder="silakan masukan Keterangan"></textarea>
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
    $idk = $_POST['idKategori'];
    $ids = $_POST['idSupplier'];
    $hrg = $_POST['harga'];
    $stock = $_POST['stock'];
    $tgl = $_POST['tanggal'];
    $ket = $_POST['keterangan'];

    $sql = mysqli_query($db,"INSERT INTO tbl_supplier VALUES ('$kd', '$nama', '$idk', '$ids', '$hrg', '$stock', '$tgl', '$ket')");


    if($sql){
        echo"<script>window.alert('Data Berhasil Disimpan!'), window.location.replace('admin.php?page=datasupplier')</script>";
    }else{
        die ("Erornya Di SQL");
    }
}else{
        die ("Errornya Disini");
    }
 


?>