<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table mr-1"></i> List User
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
          <i class='fas fa-plus'></i> Data User
        </a>
        <br>
        <thead>
          <tr>
            <th>No</th>
            <th>ID User</th>
            <th>Username</th>
            <th>Level</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include "koneksi.php";
          $no = 1;
          $sql = mysqli_query($db, "SELECT * from tbl_user");

          while ($read = mysqli_fetch_array($sql)) {
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $read['id_user']; ?></td>
              <td><?php echo $read['username']; ?></td>
              <td><?php echo $read['level']; ?></td>
              <td>
                <a href="" class="d-none d-sm-inline-block bttn bttn-sm bttn-warning shadow-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="" class="d-none d-sm-inline-block bttn bttn-sm bttn-warning shadow-sm" onclick="return confirm('Yakin hapus data ini?')">
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