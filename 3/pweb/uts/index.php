<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT Jaya Bersama</title>
</head>
<body>
  <fieldset>
    <legend>PT Jaya Bersama</legend>
    <section>
      <a href="">Home</a>
      <a href="">Data Karyawan</a>
      <a href="">Data Gaji</a>
      <a href="">Data Lembur</a>
    </section>
    <section>
      <label for="txtIdKaryawan">ID Karyawan</label>
      <input type="text" name="id" id="txtIdKaryawan"><br>

      <label for="txtNamaKaryawan">Nama Karyawan</label>
      <input type="text" name="nama" id="txtNamaKaryawan"><br>
      
      <label for="txtGajiPokok">Gaji Pokok</label>
      <input type="text" name="gaji" id="txtGajiPokok"><br>
      
      <label for="txtJabatan">Jabatan</label>
      <input type="text" name="jabatan" id="txtJabatan"><br>
      <select name="jabatan" id="txtJabatan">
        <option value="0">Pilih Jabatan</option>
        <option value="manager">Manager</option>
        <option value="pemasaran">Manager Pemasaran</option>
        <option value="staf">Staf</option>
        <option value="gudang">Gudang</option>
        <option value="teknisi">Teknisi</option>
      </select>
      
      <label for="txtStatus">Status</label>
      <input type="text" name="status" id="txtStatus"><br>
      <select name="status" id="txtStatus">
        <option value="0">Pilih Status</option>
        <option value=""></option>
      </select>
      
      <label for="txtJlhAnak">Jumlah Anak</label>
      <input type="text" name="jlh_anak" id="txtJlhAnak"><br>
      
      <label for="txtJlhLembur">Jumlah Lembur</label>
      <input type="text" name="jlh_lembur" id="txtJlhLembur"><br>
      
      <label for="txtJamKeterlambatan">Jam Keterlambatan</label>
      <input type="text" name="jam_telat" id="txtJamKeterlambatan"><br>

      <input type="submit" value="Proses">
    </section>
  </fieldset>

  <?php
    
  ?>

  <table>
    <thead>
      <tr>
        <td>ID</td>
        <td>Nama</td>
        <td>Gaji Pokok</td>
        <td>Jabatan</td>
        <td>Tunjangan Jabatan</td>
        <td>Tunjangan Istri</td>
        <td>Tunjangan Anak</td>
        <td>Uang Lembur</td>
        <td>Potongan Keterlambatan</td>
        <td>Total Gaji</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= $id ?></td>
        <td><?= $id ?></td>
        <td><?= $id ?></td>
        <td><?= $id ?></td>
        <td><?= $id ?></td>
        <td><?= $id ?></td>
        <td><?= $id ?></td>
        <td><?= $id ?></td>
        <td><?= $potongan ?></td>
        <td><?= $total ?></td>
      </tr>
    </tbody>
  </table>
</body>
</html>

