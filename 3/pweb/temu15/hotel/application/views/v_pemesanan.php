<img src="img/hotel.jpg" class="img-fluid rounded">


<form action="<?= site_url('pesanan/tambah') ?>" method="post">

  <!-- form ini berisi data yang sudah diinput sebelumnya dari halaman home -->
  <div class="row justify-content-center align-items-end mt-2">
    <div class="col-md-2">
      <div class="form-group">
        <label>Tanggal Cek In</label>
        <input class="form-control" type="date" required name="cek_in" value="<?= $cek_in ?>" min="<?= date('Y-m-d'); ?>">
      </div>
    </div>

    <!-- Seperti di bawah bentuk input array ke depannya cman itu perlu dipending dulu -->
    <!-- <div class="col-md-2">
      <div class="form-group">
        <label>Tanggal Cek Out</label>
        <input class="form-control" type="date" required name="cek_out" value=" $cek_out ?>">
      </div>
    </div> -->

    <div class="col-md-2">
      <div class="form-group">
        <label>Tanggal Cek Out</label>
        <input class="form-control" type="date" required name="cek_out" value="<?= $cek_out ?>" min="<?= date('Y-m-d', strtotime("+1 day")); ?>">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Jumlah Kamar</label>
        <input class="form-control" readonly type="number" required name="jlh" min="1" max="10" value="<?= $jlh ?>">
      </div>
    </div>


    <div class="col-md-1">
      <div class="form-group">
        <a class="btn btn-primary" type="button" data-toggle="modal" data-target="#ubah">
          Ubah</a>
      </div>
    </div>


  </div>

  <h2>Pesan Kamar Anda</h2>


  <hr>

  <!-- Di bawah ini adalah fitur yang ditetapkan sebagai unfinished, yakni fitur untuk mengelola array dari jumlah pesanan yang telah dilakukan. -->
  <!-- Dengan fitur ini, tamu dapat memesan lebih dari satu kamar  -->
  <!-- dan mendapatkan pesanan yang terpisah masing-masing -->
  <!-- Sebenarnya lebih baik jika menggunakan tabel pesanan dan tabel detail pesanan -->
  <!-- Namun hal itu hanya akan mempersulit masalah yang sudah ada -->
  <!-- Fitur ini akan diselesaikan ketika sudah ada pemahaman mengenai cara kerja array -->
  <!-- 
  $i = 1;
  do { ?> -->
  <!-- <h2>Pesanan  $i ?></h2> -->
  <div class="row justify-content-start mt-4">
    <hr>


    <div class="col-md-6">

      <!-- menentukan id_user jika user sudah membuat akun atau belum -->
      <div class="form-group">
        <label>Pemesan</label>
        <input class="form-control" type="text" required name="pemesan" placeholder="Masukkan nama pemesan" value="<?= $this->session->userdata('nama') ?>">
        <?php if ($this->session->userdata('id_user')) { ?>
          <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
        <?php } else { ?>

          <!-- value 0 di id_user untuk pengguna tanpa akun -->
          <input type="hidden" name="id_user" value="0">

        <?php } ?>
      </div>

      <!-- keterangan * di bawah -->
      <div class="form-group">
        <label>Email*</label>
        <input class="form-control" type="text" required name="email" placeholder="Masukkan email" value="<?= $this->session->userdata('email') ?>">
      </div>

      <div class="form-group">
        <label>Nomor Telepon</label>
        <input class="form-control" type="text" required name="hp" placeholder="Masukkan nomor telepon" value="<?= $this->session->userdata('hp') ?>">
      </div>

      <div class="form-group">
        <label>Tamu</label>
        <input class="form-control" type="text" required name="tamu" placeholder="Masukkan nama tamu">
      </div>

      <div class="form-group">
        <label><?= $tabel6_field2_alias ?></label>
        <select class="form-control" required name="id_tipe">
          <option selected hidden value="">Pilih <?= $tabel6_field2_alias ?>...</option>
          <?php foreach ($tabel6 as $tl6) : ?>
            <option value="<?= $tl6->id_tipe; ?>"><?= $tl6->tipe ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <!-- keterangan * -->
      <small>*Email dibutuhkan untuk melakukan reservasi dan transaksi</small>

    </div>
    <div class="col-md-6">
      <img class="img-fluid rounded" src="img/book.png">
    </div>

  </div>


  <hr>

  <!-- $i++;
  } while ($i <= $jlh) ?> -->



  <div class="row justify-content-start mt-4">
    <div class="col-md6">


      <div class="form-group">
        <button class="btn btn-success" onclick="return confirm('Apakah Anda Ingin Memesan Kamar?')" type="submit">Konfirmasi Pesanan</button>
        <a class="btn btn-danger" type="button" href="<?= site_url('welcome') ?>">Batal</a>
      </div>
    </div>
  </div>
</form>



<!-- modal edit -->
<div id="ubah" class="modal fade ubah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Jumlah Kamar</h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('welcome/pemesanan') ?>" method="get">
        <div class="modal-body">
          <div class="form-group">
            <label>Jumlah Kamar</label>
            <input class="form-control" type="number" value="<?= $jlh ?>" required name="jlh" min="1" max="10" value="1">
            <input type="hidden" name="cek_in" value="<?= $cek_in ?>">
            <input type="hidden" name="cek_out" value="<?= $cek_out ?>">

          </div>


        </div>

        <!-- memunculkan notifikasi modal -->
        <p id="p_ubah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>