<!-- halaman print untuk pesanan -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($pengaturan as $p) : ?>
      <h1 class="text-center">Bukti Transaksi</h1>
      <p class="text-center"><?= $p->nama; ?> | <?= $p->hp; ?> | <?= $p->email; ?></p>
      <p class="text-center"><?= $p->alamat; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->
    <?php foreach ($transaksi as $tr) : ?>
      <?php foreach ($pesanan as $ps) : ?>

        <?php if ($tr->id_pesanan === $ps->id_pesanan) { ?>

          <!-- menampilkan data pemesan -->
          <table class="table">
            <thead class="thead">
              <tr>
                <th>Id Pesanan</th>
                <th>Pemesan</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="25%"><?= $ps->id_pesanan ?></td>
                <td width="25%"><?= $ps->pemesan ?></a>
                <td width="25%"><?= $ps->email ?></td>
                <td width="25%"><?= $ps->hp ?></td>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- menampilkan data tamu -->
          <table class="table">
            <thead class="thead">
              <tr>
                <th>Tamu</th>
                <th>Tipe Kamar</th>
                <th>Tanggal Cek In</th>
                <th>Tanggal Cek Out</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="25%"><?= $ps->tamu ?></td>
                <td width="25%"><?= $ps->id_tipe ?></a>
                <td width="25%"><?= $ps->cek_in ?></td>
                <td width="25%"><?= $ps->cek_out ?></td>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- menampilkan harga total dari tabel pesanan -->
          <table class="table">
            <thead class="thead">
              <tr>
                <th>Harga Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="25%">Rp <?= number_format($ps->harga_total, '2', ',', '.') ?></td>
                </td>
              </tr>
            </tbody>
          </table>



          <!-- menampilkan data transaksi -->
          <table class="table">
            <thead class="thead">
              <tr>
                <th>Id Transaksi</th>
                <th>Metode Pembayaran</th>
                <th>Bayar</th>
                <th>Tanggal Transaksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="25%"><?= $tr->id_transaksi ?></td>
                <td width="25%"><?= $tr->metode ?></a>
                <td width="25%">Rp <?= number_format($tr->bayar, '2', ',', '.') ?></td>
                <td width="25%"><?= $tr->tgl_transaksi ?></td>
                </td>
              </tr>
            </tbody>
          </table>

        <?php } ?>

      <?php endforeach ?>
    <?php endforeach ?>

  </div>

  <p class="text-center">Kirimkan bukti ini ke resepsionis untuk diproses</p>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>