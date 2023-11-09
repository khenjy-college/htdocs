<fieldset>
  <h2>Form Data Keluar</h2>
            <form action="" method="post">
              <label for="txtKodeBarang">Kode Barang</label>
            <input type="text" name="kode" id="txtKodeBarang"><br>
            
            <label for="txtNamaBarang">Nama Barang</label>
            <select name="nama" id="txtNamaBarang">
              <option value="0">Pilih Nama Barang</option>
              <option value="lifeboy">Lifeboy</option>
              <option value="bimoli">Bimoli</option>
              <option value="malkis">Malkis</option>
              <option value="oreo">Oreo</option>
              <option value="greentea">Greentea</option>
              <option value="frestie">Frestie</option>
              <option value="paseo">Paseo</option>
              <option value="dancow">Dancow</option>
              <option value="aqua">Aqua</option>
              <option value="milkita">Milkita</option>
            </select><br>

            <label for="txtJumlahBarang">Jumlah Barang</label>
            <input type="number" name="jumlah" id="txtJumlahBarang"><br>

            <label for="txtDistributor">Distributor</label>
            <input type="text" name="distributor" id="txtDistributor"><br>

            <label for="txtTglKeluar">Tanggal Keluar</label>
            <input type="date" name="tglkeluar" id="txtTglKeluar"><br>

            <input type="submit" value="Proses">
            </form>
            

            


            <p>Output Program</p>

            <table border>
              <thead>
                <tr>
                  <td>Kode</td>
                  <td>Nama Barang</td>
                  <td>Harga</td>
                  <td>Jumlah</td>
                  <td>Distributor</td>
                  <td>Tanggal Keluar</td>
                  <td>Total Pembayaran</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $kode ?></td>
                  <td><?= $nama ?></td>
                  <td><?= $harga[$nama] ?></td>
                  <td><?= $jumlah ?></td>
                  <td><?= $distributor ?></td>
                  <td><?= $tglkeluar ?></td>
                  <td>Rp<?= $total ?></td>
                </tr>
              </tbody>
            </table>
          </fieldset>