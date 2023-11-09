<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">

  <title>Toko Jaya Bersama</title>
</head>
<body>


  <table border align= "center"  >
    <thead>
      <tr>
        <td>
          <header>
            <h1 align="center">Toko Jaya Bersama</h1>
          </header>
          
        </td>
      </tr>
      <tr>
        <td>
        <ul>
          <li><a class="" href="index.php?">Home</a></li>
          <li><a class="active" href="index.php?page=brgmasuk">Data Barang Masuk</a></li>
          <li><a class="" href="index.php?page=brgkeluar">Data Barang Keluar</a></li>
        </ul>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>

        <?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$distributor = $_POST['distributor'];
$tglmasuk = $_POST['tglmasuk'];
$tglmasuk = $_POST['tglkeluar'];


$harga = array(
  'lifeboy' => 10000,
  'bimoli' => 100000,
  'malkis' => 200000,
  'oreo' => 80000,
  'greentea' => 250000,
  'freshtie' => 100000,
  'paseo' => 140000,
  'dancow' => 80000,
  'aqua' => 90000,
  'milkita' => 7600
);

$total = $harga[$nama] * $jumlah;

    if(isset($_GET['page'])){
      $page = $_GET['page'];
      switch ($page) {
        
        case 'brgmasuk':
          include "brgmasuk.php";
          break;
        case 'brgkeluar':
          include "brgkeluar.php";
          break;
        default:
         echo "Maaf Halaman Ini Masih dalam Pengembangan";
          break;
      }
    } else{
      include "beranda.php";
    }
  ?>
          
        </td>
      </tr>
      <tr>
        <td>
          <footer>
            <legend align="center">By: Khenjy 2022133005</legend>
          </footer>
          
        </td>
      </tr>
    </tbody>
  </table>



</body>
</html>