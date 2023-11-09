<?php
if($_POST['action']) {
  $nm = $_POST['nama'];
  $nim = $_POST['nim'];
  $tgl = $_POST['tgl'];
  $jrs = $_POST['jrs'];
  $tgs = $_POST['ntugas'];
  $kuis = $_POST['nkuis'];
  $uts  = $_POST['nuts'];
  $uas = $_POST['nuas'];

  $ratarata = ($tgs+$kuis+$uts+$uas)/4;
  if ($ratarata >= 85 && $ratarata <= 100) {
    $grade = "A";
    $ket = "Baik Sekali";
  } else if ($ratarata >= 85 && $ratarata <= 70) {

  } else {
    $grade = "E";
    $ket = "Tidak lulus, Silahkan mengulang lagi!!!";
  }

  echo "<table border='1' width='100%'>
  <tr>
    <td width=''>"
  
  "
}



?>

<label for=""><h3>Data Mahasiswa</h3></label>
<a href="index.php?page=tambahmhs">Tambah</a>
