<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>List Data Kategori
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <a href="admin.php?page=inputkategori" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class='fas fa-plus'></i> Data Kategori</a>
                <p></p>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    $no = 1;
                    $sql = mysqli_query($db, "SELECT * FROM tbl_kategori;");

                    while ($read = mysqli_fetch_array($sql)) {

                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $read['nama_kategori']; ?></td>
                            <td><?php echo $read['keterangan']; ?></td>
                            <td>
                                <a href="admin.php?page=edit_b&idb=<?php echo $read['id_kategori']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit"></i></a>

                                <a href="admin.php?page=del_b&idb=<?php echo $read['id_kategori']; ?>" onclick="return comfirm('Yakin Hapus Data Ini..?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
           
    </div>
</div>