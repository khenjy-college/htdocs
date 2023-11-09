<fieldset>
  <legend>
    <form action="" method="post">
      <label for="">Masukkan Nilai Kehadiran: </label>
      <input type="number" name="nilai_kehadiran">
      <label for="">Masukkan Nilai Tugas: </label>
      <input type="number"name="nilai_tugas">
      <label for="">Masukkan Nilai UTS: </label>
      <input type="number" name="nilai_uts">
      <label for="">Masukkan Nilai UAS: </label>
      <input type="number"name="nilai_uas">
      <input type="number" name="nilai_uas" id=""><p></p>
      <input type="submit" value="Proses"><p></p>
    </form>
  </legend>
</fieldset>

<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$kehadiran = $_POST['nilai_kehadiran'];
$tugas = $_POST['nilai_tugas'];
$uts = $_POST['nilai_uts'];
$uas = $_POST['nilai_uas'];

//menghitung nilai total

$nilai_total = $kehadiran + $tugas + $uts + $uas;
//menghitung nilai rata-rata
$nilai_rata_rata = $nilai_total / 4;
//membuat percabangan atau kondisi
if ($nilai_rata_rata > 85) {
  $grade = "A";
  $ket = "Sangat Memuaskan";
} else if ($nilai_rata_rata > 70) {
  $grade  = "B";
  $ket = "Memuaskan";

} else if ($nilai_rata_rata > 55) {
  $grade = "C";
  $ket = "Cukup";
} else {
  $grade = "D";
  $ket = "Anda Tidak Lulus";
}

//menampilkan data
echo "<fieldset>";
echo "Hasil Percabangan Nilai<br><hr>";
echo "Hasil Kehadiran : $kehadiran 