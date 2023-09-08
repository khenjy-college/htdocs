<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Latihan 3</title>
</head>
<body>
  <header>
    <h1 align="center">WEB TPL 2022</h1>
  </header>

  <ul>
    <li><a class="active" href="latihan3.php">Beranda</a></li>
    <li><a class="active" href="latihan3.php?page=datamhs">Data Mahasiswa</a></li>
    <li><a class="active" href="latihan3.php?page=datakegiatan">Kegiatan</a></li>
    <li><a class="active" href="latihan3.php?page=datapengumuman">Pengumuman</a></li>
    <li><a class="active" href="latihan3.php?page=tentangkami">Tetang Kami</a></li>
  </ul>

  <?php
    if(isset($_GET['page'])){
      $page = $_GET['page'];
      switch ($page) {
        case 'datamhs':
          include "datamahasiswa.php";
          break;
        case 'datakegiatan':
          include "datakegiatan.php";
          break;
        case 'datapengumuman':
          include "datapengumuman.php";
          break;
          case 'tentangkami':
            include "datatentangkami.php";
            break;
        default:
         echo "Maaf Halaman Ini Masih dalam Pengembangan";
          break;
      }
    } else{
      include "beranda.php";
    }
  ?>

  

  <footer>
    <p align="center">Created by Mahasiswa TPL</p>
  </footer>

</div>
</body>
</html>