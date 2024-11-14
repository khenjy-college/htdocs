<?php
include "koneksi.php";
$id = $_GET["idb"];
$sql = "SELECT tbl_supplier.*, tbl_kategori.*, tbl_barang.* FROM tbl_barang";
$sql = mysqli_query($db, "select * from tbl_barang where kode_barang = '$id'");
$read = mysqli_fetch_array($sql);
?>

<div class="card mb-4">
    <div class="card-header">Edit Data Barang</div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="col-md 12">
                <div class="form-group"><label for="">Kode Barang</label>
                    <input type="text" name="kode" class="form-control" placeholder="silakan masukan kode barang" value="<?= $read['kode_barang']; ?>" readonly>
                    <input type="hidden" name="kode" class="form-control" placeholder="silakan masukan kode barang" value="<?= $read['kode_barang']; ?>">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" value="<?= $read['nama_barang']; ?>">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Id Kategori</label>
                    <select name="idKategori" class="form-control">
                        <option value="<?= $read['id_kategori']; ?>"><?= $read['id_kategori']; ?></option>
                        <?php
                        include "koneksi.php";

                        $sql = mysqli_query($db, "SELECT * FROM tbl_kategori;");

                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?php echo $data['id_kategori'] ?>"><?php echo $data['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Id Supplier</label>
                    <select name="idSupplier" class="form-control">
                        <option value="<?= $read['id_supplier']; ?>"><?= $read['id_supplier']; ?></option>
                        <?php
                        include "koneksi.php";

                        $sql = mysqli_query($db, "SELECT * FROM tbl_supplier;");

                        while ($data = mysqli_fetch_array($sql)) {
                            echo "<option value='$data[id_supplier]'>$data[nama_supplier]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Harga</label>
                    <input type="text" name="harga" class="form-control" value="<?= $read['harga']; ?>">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Stock</label>
                    <input type="text" name="stock" class="form-control" value="<?= $read['stock']; ?>">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= $read['tanggal']; ?>">
                </div>
            </div><br>

            <div class="col-md 12">
                <div class="form-group"><label for="">Keterangan</label>
                    <textarea name="keterangan" rows="4" class="form-control"><?= $read['keterangan']; ?></textarea>
                </div>
            </div><br>

            <center><input type="submit" value="submit" proses="submit" class="btn btn-primary"></center>

        </form>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "koneksi.php";

    $kd = $_POST['kode'];
    $nama = $_POST['nama'];
    $idk = $_POST['idKategori'];
    $ids = $_POST['idSupplier'];
    $hrg = $_POST['harga'];
    $stock = $_POST['stock'];
    $tgl = $_POST['tanggal'];
    $ket = $_POST['keterangan'];

    $sql = mysqli_query($db, "UPDATE tbl_barang SET nama_barang = '$nama', id_kategori = '$idk', id_supplier = '$ids', harga = '$hrg', stock = '$stock', tanggal = '$tgl', keterangan = '$ket' WHERE kode_barang = '$kd'");


    if ($sql) {
        echo "<script>window.alert('Data Berhasil Disimpan!'), window.location.replace('admin.php?page=databarang')</script>";
    } else {
        die("Erornya Di SQL");
    }
} else {
    die("Errornya Disini");
}



?>