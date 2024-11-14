<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="card mb-4">
<div class="card-header">    
    <i class="fas fa-table mr-1"></i>List Data Barang
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <i class='fas fa-trash'></i> Data Barang</a><p></p>
        <thead>
            <tr>
                <th>NO</th>  
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <a href="" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit"></i></a>
            <a href="" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Yakin Hapus Data Ini..?')"><i class="fas fa-trash"></i></a>
        </tbody>
        </table>
    </div> 
    </div>
</div>
</body>
</html>