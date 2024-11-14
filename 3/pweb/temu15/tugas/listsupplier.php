<div class="card mb-4">
<div class="card-header">    
    <i class="fas fa-table mr-1"></i>List Data Barang
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
          <i class='fas fa-plus'></i> Data Barang</a><p></p>
        <thead>
            <tr>
                <th>No</th>  
                <th>nama supplier</th>  
                <th>kontak</th>
                <th>alamat</th>  
                <th>email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "koneksi.php";
                $no = 1;
                $sql = mysqli_query($db, "SELECT * FROM tbl_supplier;");

                while($read = mysqli_fetch_array($sql))
                { 

            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $read['nama_supplier']; ?></td>
                <td><?php echo $read['kontak']; ?></td>
                <td><?php echo $read['alamat']; ?></td>
                <td><?php echo $read['email']; ?></td>
                <td>
                    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit"></i></a>
                    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php $no++; }?>
        </tbody>
        </table>
    </div> 
    </div>
</div>
