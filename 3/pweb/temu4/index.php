<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
  
</head>
<body>
<SCRIPT LANGUAGE = "JavaScript">
<!--
window.alert("Ini merupakan pesan untuk Anda");
//-->
</SCRIPT>

  <header>
    <h1 align="center">WEB TEKNIK PERANGKAT LUNAK</h1>
    Latihan memakai JavaScript:<BR>
<SCRIPT LANGUAGE = "JavaScript">
<!--
document.write("Selamat Mencoba JavaScript<BR>");
document.write("Semoga sukses!");
//-->
</SCRIPT>
  </header>
  <ul>
    <li><a class="active" href="">Beranda</a></li>
    <li><a href="index.php?page=datamahasiswa">Data Mahasiswa</a></li>
    <li><a href="index.php?page=datakegiatan">Kegiatan</a></li>
    <li><a href="index.php?page=datapengumuman">Pengumuman</a></li>
    <li><a href="index.php?page=datatentangkami">Tentang Kami</a></li>
  </ul>

  <?php
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        switch($page) {
          case 'datamahasiswa':
            include "datamahasiswa.php";
            break;
          case 'datakegiatan':
            include "datakegiatan.php";
            break;
          case 'datapengumuman':
            include "datapengumuman.php";
            break;
          case 'datatentangkami':
            include "datatentangkami.php";
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