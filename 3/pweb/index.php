<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="latihan.css">
  <title>Document</title>
  
</head>
<body>
  <header>
    <h1 align="center">WEB TEKNIK PERANGKAT LUNAK</h1>
  </header>
  <ul>
    <li><a class="active" href="">Beranda</a></li>
    <li><a href="#datamahasiswa">Data Mahasiswa</a></li>
    <li><a href="#datakegiatan">Kegiatan</a></li>
    <li><a href="">Pengumuman</a></li>
    <li><a href="">Tentang Kami</a></li>
  </ul>

  <?php
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        switch($page) {
          case 'datamahasiswa':
            include "datamhs.php";
            break;
          case 'datakegiatan':
            include "kegiatan.php";
            break;
          default:
            echo "Maaf Halaman Ini Masih dalam Pengembangan";
            break;
        }
    } else {
      include "beranda.php";
    }
  ?>
  
  <footer>
    <p>Created By Mahasiswa Sistem Informasi</p>
  </footer>
</body>
</html>