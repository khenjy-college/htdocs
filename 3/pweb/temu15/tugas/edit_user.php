<?php 
include "koneksi.php";
$id = $_GET["idb"];
$sql = "SELECT tbl_user.*, tbl_kategori.*, tbl_user.* FROM tbl_user" ;
$sql = mysqli_query($db, "select * from tbl_user where kode_user = '$id'");
$read = mysqli_fetch_array($sql);

?>

<div class="card mb-4">
    <div class="card-header">Edit Data User</div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="col-md 12">
                <div class="form-group"><label for="">Id user</label>
                <input type="text" name="kode" class="form-control" placeholder="silakan masukan kode user" value="<?= $read['kode_user']; ?>" readonly>
                <input type="hidden" name="kode" class="form-control" placeholder="silakan masukan kode user" value="<?= $read['kode_user']; ?>"
                >
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Username</label>
                <input type="text" name="username" class="form-control" value="<?= $read['username']; ?>">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Password</label>
                <input type="password" name="password" class="form-control" value="<?= $read['password']; ?>">
                </div>
            </div><br>


            <div class="col-md 12">
                <div class="form-group"><label for="">Level</label>
                <select name="level" class="form-control">
                    <option value="<?= $read['level']; ?>"><?= $read['level']; ?></option>
                    <?php
                        include"koneksi.php";

                        $sql = mysqli_query($db, "SELECT * FROM tbl_user;");

                        while($data = mysqli_fetch_array($sql)){
                    ?>
                    <option value="<?php echo $data['level']?>"><?php echo $data['level']?></option>
                    <?php }?>
                </select>

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
    $nama = $_POST['username'];
    $pw = $_POST['password'];
    $lvl = $_POST['level'];

    $sql = mysqli_query($db,"UPDATE tbl_user SET username = '$nama', password = '$pw', level = '$lvl' WHERE id_user = '$kd'");


    if($sql){
        echo"<script>window.alert('Data Berhasil Disimpan!'), window.location.replace('admin.php?page=user')</script>";
    }else{
        die ("Erornya Di SQL");
    }
}else{
        die ("Errornya Disini");
    }
 


?>