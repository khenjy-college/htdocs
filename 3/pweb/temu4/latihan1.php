<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FKOM</title>
</head>
<body>
<SCRIPT LANGUAGE = "JavaScript">
<!--
var nama = prompt("Siapa nama Anda?","Masukkan nama anda");
document.write("Hai, " + nama);
//-->

  <?php
  include "latihan2.php";
  $angka1= 10;
  $angka2= 12.5;
  $hasil= $angka1 + $angka2;
  echo "$hasil <br>" ;
  $nama = "joni";
  echo $nama;
  ?>

  <hr>

  <form action="admin.php">
    <label for="masuknim">Masukkan NIM</label>
    <input type="text" placeholder="Masukkan NIM" id="masuknim"> <br>
    <label>Masukkan Password</label>
    <input type="password" placeholder="Masukkan Password"> <br>
    <label>Masukkan Foto</label>
    <input type="file">
    <input type="submit" value="LOGIN"> <br>
    <input type="date"> <br>
  </form>

  <ul>
    <li><a href="https://www.google.com">Google</a></li>
    <li><a href="https://www.instagram.com">Instagram</a></li>
    <li><a href="admin/pengumuman.php">Pengumuman</a></li>
    <li><a href="https://www.youtube.com" target="blank">YT</a></li>
  </ul>

  <table border="1" width="90%">
    <tr>
      <td>No</td>
      <td>NIM</td>
      <td>Nama</td>
      <td>Alamat</td>
    </tr>
    <tr>
      <td>1</td>
      <td>202213001</td>
      <td>Calvin</td>
      <td>Sei Panas</td>
    </tr>
    <tr></tr>
    
  </table>
</body>
</html>