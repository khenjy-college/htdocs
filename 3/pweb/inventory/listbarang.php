<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table mr-1"></i> List Data Barang
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <a href="admin.php?page=inputbarang" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
          <i class='fas fa-plus'></i> Data Barang
        </a>
        <br>
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori Barang</th>
            <th>Supplier Barang</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Tanggal Masuk</th>
            <th>Keterangan</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include "koneksi.php";
          $no = 1;
          $sql = mysqli_query($db, "SELECT tbl_supplier.*, tbl_kategori.*, tbl_barang.* from tbl_barang 
		      INNER JOIN tbl_supplier on tbl_barang.id_supplier = tbl_supplier.id_supplier 
		      INNER JOIN tbl_kategori on tbl_barang.id_kategori = tbl_kategori.id_kategori");

          while ($read = mysqli_fetch_array($sql)) {
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $read['kode_barang']; ?></td>
              <td><?php echo $read['nama_barang']; ?></td>
              <td><?php echo $read['nama_kategori']; ?></td> <!-- karena sudah inner join -->
              <td><?php echo $read['nama_supplier']; ?></td> <!-- karena sudah inner join -->
              <td><?php echo $read['harga']; ?></td>
              <td><?php echo $read['stock']; ?></td>
              <td><?php echo $read['tanggal']; ?></td>
              <td><?php echo $read['keterangan']; ?></td>
              <td>
                <a href="" class="d-none d-sm-inline-block bttn bttn-sm bttn-warning shadow-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="admin.php?page=hapusbarang&idb=<?php echo $read['kode_barang']; ?>" class="d-none d-sm-inline-block bttn bttn-sm bttn-warning shadow-sm" onclick="return confirm('Yakin hapus data ini?')">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php $no++;
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>