<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Ke depannya aku akan menerapkan lebih banyak fitur lagi ke website hotel ini supaya terlihat lebih hidup
// Tentunya hal ini akan lebih possible dan mudah jika aku sudah mulai menggunakan fitur api dan container
// Dan masih ada banyak lagi yang ingin kuterapkan supaya website ini sudah layak untuk menjadi template
// Template yang bisa digunakan untuk membuat website yang lainnya
// Masih ada banyak projek yang perlu dikembangkan di bagian backend, dan tentunya hal itu perlu kontrol yang jelas
// Tidak hanya asal mengikuti tutorial saja

// Masing-masing ide website memiliki kebutuhan yang berbeda-beda, namun aku akan mencoba menerapkan hal itu di website ini
// terlebih dahulu, karena jika kedepannya ingin mengembangkan lagi, tinggal menggunakan template ini dan mengubah
// variabel-variabel dan fungsnya sesuai dengan kebutuhan saja.

// Aku juga benar-benar ingin menerapkan seluruh fungsi yang ada di Codeigniter ini supaya aku lebih dapat banyak
// wawasan mengenai web development, masih ada banyak yang belum kuterapkan seperti helpers, libraries, hooks, languages,
// dan lain-lain.

// Dengan mempelajari hal tersebut, maka mempelajari framework lain yang lebih terkenal seperti react js tentu lebih mudah

// Aku juga harus sering menerapkan fitur html yang diperlihatkan oleh pak ilwan melalui excel
// Pak Ilwan bisa membuat sebuah receipt melalui excel yang diexport ke html, dan diubah menjadi php 
// Masih banyak lagi yang bisa diexport ke html selain excel, dan aku tidak ingin menyia2kan kesempatan itu tentunya

// Selain itu aku juga perlu menerapkan github lebih sering, karena banyak tools2 yang berguna dan bisa kugunakan di sana

class Welcome extends CI_Controller
{
	// Menggunakan variabel sebagai alat pembantu, persyaratan
	// Semua yang ada di sini bakal diubah nantinya dari private menjadi antara private atau protected
	// deklarasi variabel per tabel
	// deklarasi tabel 1

	// Di bawah ini aku berencana untuk membuat sebuah array yang menampung semua jenis alias dari field dan nama tabel
	// Dan aku akan membuat array itu merge dengan array yang akan diload ke halaman view pada setiap
	// Controller yang ada di aplikasi ini, dengan begitu, aku tidak perlu khawatir jika ingin memulai projek baru
	// Dan ingin mengubah konten di dalamnya dalam waktu yang singkat

	public $tabel1 = 't1';
	// deklarasi variabel bagian field

	// deklarasi tabel 2
	public $tabel2 = 'history';
	public $tabel2_alias = 'History Pembayaran';
	// deklarasi variabel bagian field
	public $tabel2_field1 = 'id_history';
	public $tabel2_field1_alias = 'ID History';
	public $tabel2_field2 = 'id_pembayaran';
	public $tabel2_field2_alias = 'ID Pembayaran';
	public $tabel2_field3 = 'id_petugas';
	public $tabel2_field3_alias = 'ID Petugas';
	public $tabel2_field4 = 'NISN';
	public $tabel2_field4_alias = 'NISN';
	public $tabel2_field5 = 'tgl_bayar';
	public $tabel2_field5_alias = 'Tanggal Bayar';
	public $tabel2_field6 = 'bulan_dibayar';
	public $tabel2_field6_alias = 'Bulan Dibayar';
	public $tabel2_field7 = 'tahun_dibayar';
	public $tabel2_field7_alias = 'Tahun Dibayar';
	public $tabel2_field8 = 'id_spp';
	public $tabel2_field8_alias = 'ID SPP';
	public $tabel2_field9 = 'jumlah_bayar';
	public $tabel2_field9_alias = 'Jumlah Bayar';
	public $tabel2_field15 = 'user_aktif';
	public $tabel2_field15_alias = 'User Aktif';


	// deklarasi tabel 3
	public $tabel3 = 't3';


	// deklarasi tabel 4
	public $tabel4 = 'siswa';
	public $tabel4_alias = 'Siswa';
	// deklarasi variabel bagian field
	public $tabel4_field1 = 'nisn';
	public $tabel4_field1_alias = 'NISN';
	public $tabel4_field2 = 'nis';
	public $tabel4_field2_alias = 'NIS';
	public $tabel4_field3 = 'nama';
	public $tabel4_field3_alias = 'Nama';
	public $tabel4_field4 = 'id_kelas';
	public $tabel4_field4_alias = 'ID Kelas';
	public $tabel4_field5 = 'alamat';
	public $tabel4_field5_alias = 'Alamat';
	public $tabel4_field6 = 'no_telp';
	public $tabel4_field6_alias = 'No HP';
	public $tabel4_field7 = 'id_spp';
	public $tabel4_field7_alias = 'ID SPP';
	public $tabel4_field8 = 'password';
	public $tabel4_field8_alias = 'Password';
	public $tabel4_field9 = 'level';
	public $tabel4_field9_alias = 'Level';



	// deklarasi tabel 6
	public $tabel6 = 'spp';
	public $tabel6_alias = 'SPP';
	// deklarasi variabel bagian field
	public $tabel6_field1 = 'id_spp';
	public $tabel6_field1_alias = 'ID SPP';
	public $tabel6_field2 = 'tahun';
	public $tabel6_field2_alias = 'Tahun';
	public $tabel6_field3 = 'nominal';
	public $tabel6_field3_alias = 'Nominal';


	// deklarasi tabel 7
	public $tabel7 = 'pengaturan';
	public $tabel7_alias = 'Pengaturan Website';
	// deklarasi variabel bagian field
	public $tabel7_field1 = 'id';
	public $tabel7_field1_alias = 'ID';
	public $tabel7_field2 = 'nama';
	public $tabel7_field2_alias = 'Nama Website';
	public $tabel7_field3 = 'favicon';
	public $tabel7_field3_alias = 'Favicon';
	public $tabel7_field4 = 'logo';
	public $tabel7_field4_alias = 'Logo';
	public $tabel7_field5 = 'foto';
	public $tabel7_field5_alias = 'Foto';
	public $tabel7_field6 = 'alamat';
	public $tabel7_field6_alias = 'Alamat';
	public $tabel7_field7 = 'email';
	public $tabel7_field7_alias = 'Email';
	public $tabel7_field8 = 'hp';
	public $tabel7_field8_alias = 'No HP';
	public $tabel7_field9 = 'metadesc';
	public $tabel7_field9_alias = 'Metadesc';
	public $tabel7_field10 = 'fb';
	public $tabel7_field10_alias = 'Akun Facebook';
	public $tabel7_field11 = 'ig';
	public $tabel7_field11_alias = 'Akun Instagram';


	// deklarasi tabel 8
	public $tabel8 = 'pembayaran';
	public $tabel8_alias = 'Pembayaran';
	// deklarasi variabel bagian field
	public $tabel8_field1 = 'id_pembayaran';
	public $tabel8_field1_alias = 'ID Pembayaran';
	public $tabel8_field2 = 'id_petugas';
	public $tabel8_field2_alias = 'ID Petugas';
	public $tabel8_field3 = 'nisn';
	public $tabel8_field3_alias = 'NISN';
	public $tabel8_field4 = 'tgl_bayar';
	public $tabel8_field4_alias = 'Tanggal Bayar';
	public $tabel8_field5 = 'bulan_dibayar';
	public $tabel8_field5_alias = 'Bulan Dibayar';
	public $tabel8_field6 = 'tahun_dibayar';
	public $tabel8_field6_alias = 'Tahun Dibayar';
	public $tabel8_field7 = 'id_spp';
	public $tabel8_field7_alias = 'ID SPP';
	public $tabel8_field8 = 'jumlah_bayar';
	public $tabel8_field8_alias = 'Jumlah Bayar';


	// deklarasi tabel 9
	public $tabel9 = 'petugas';
	public $tabel9_alias = 'Petugas';
	// deklarasi variabel bagian field
	public $tabel9_field1 = 'id_petugas';
	public $tabel9_field1_alias = 'ID User';
	public $tabel9_field2 = 'nama';
	public $tabel9_field2_alias = 'Nama';
	public $tabel9_field3 = 'email';
	public $tabel9_field3_alias = 'Email';
	public $tabel9_field4 = 'password';
	public $tabel9_field4_alias = 'Password';
	public $tabel9_field5 = 'hp';
	public $tabel9_field5_alias = 'No HP';
	public $tabel9_field6 = 'level';
	public $tabel9_field6_alias = 'Level User';
	public $tabel9_field6_value1 = '';
	public $tabel9_field6_value2 = 'accounting';
	public $tabel9_field6_value3 = 'administrator';
	public $tabel9_field6_value4 = 'petugas';
	public $tabel9_field6_value5 = 'siswa';
	public $tabel9_field7 = 'login_count';
	public $tabel9_field7_alias = 'Jumlah Login';


	// deklarasi tabel 10
	// deklarasi variabel per tabel
	// deklarasi tabel 1
	public $tabel10 = 't10';


	// deklarasi tabel 11
	// deklarasi variabel per tabel


	public $tabel11 = 't11';


	// deklarasi mvc
	// deklarasi model


	// deklarasi model yang tidak memiliki nama tabel pada nama file atau function

	// deklarasi controller yang tidak memiliki nama tabel pada nama file atau function
	public $c1 = 'welcome';
	public $c2 = 'welcome/pemesanan';
	public $c3 = 'welcome/spp';
	public $c4 = 'welcome/fasilitas';
	public $c5 = 'welcome/dashboard';
	public $c6 = 'welcome/no_level';

	// deklarasi views yang tidak memiliki nama tabel pada nama file atau function
	// deklarasi views
	private $tabel8_v_input8;
	private $tabel8_v_input8_get;
	private $tabel8_v_input10;
	private $tabel8_v_input10_post;
	private $tabel8_v_input10_get;
	private $tabel8_v_input10_filter1;
	private $tabel8_v_input10_filter1_get;
	private $tabel8_v_input10_filter2;
	private $tabel8_v_input10_filter2_get;
	private $tabel8_v_input11;
	private $tabel8_v_input11_post;
	private $tabel8_v_input11_get;
	private $tabel8_v_input11_filter1;
	private $tabel8_v_input11_filter1_get;
	private $tabel8_v_input11_filter2;
	private $tabel8_v_input11_filter2_get;

	// deklarasi session
	private $tabel9_userdata1;
	private $tabel9_tempdata1;
	private $tabel9_userdata2;
	private $tabel9_tempdata2;
	private $tabel9_userdata3;
	private $tabel9_tempdata3;
	private $tabel9_userdata4;
	private $tabel9_tempdata4;
	private $tabel9_userdata5;
	private $tabel9_tempdata5;
	private $tabel9_userdata6;
	private $tabel9_tempdata6;
	private $tabel9_userdata7;
	private $tabel9_tempdata7;

	// Aku ada rencana untuk menggunakan Toastr untuk menampilkan notifikasi toast
	// Ini adalah link : https://codeseven.github.io/toastr/demo.html


	// deklarasi views yang saat ini belum terhubung ke basis data
	// Ada rencana untuk menggunakan _alias dari untuk membuat title kelas semakin cantik dan interaktif
	// Namun hal itu saat ini digunakan di halaman admin saja untuk konsistensi
	public $head = '_partials/head';

	// Di bawah ini adalah fungsi config
	public $file_type1 = 'png|jpg|jpeg';
	public $file_type2 = 'pdf';

	// Di bawah ini adalah bagian part dari views
	public $v_part1 = 'title';
	public $v_part2 = 'head';
	public $v_part3 = 'konten';
	public $v_part4 = 'phase';
	public $v_part4_msg0 = '<br><span class="h6"> (phase pre-alpha feature)</span>';
	public $v_part4_msg1 = '<br><span class="h6"> (phase alpha feature)</span>';
	public $v_part4_msg2 = '<br><span class="h6"> (phase beta feature)</span>';
	public $v_part4_msg3 = '<br><span class="h6"> (release candidate feature)</span>';
	public $v_part4_msg4 = '';  // feature released

	public $v1 = 'konfirmasi';
	public $v1_title1 = 'Pembayaran Berhasil';
	public $v1_title2 = 'Transaksi Berhasil';
	public $v2 = 'login';
	public $v2_title = 'Login';
	public $v3 = 'no-level';
	public $v3_title = 'Anda tidak memiliki akses ke halaman ini';
	public $v4 = 'print';
	public $v4_title1 = 'Bukti Pembayaran';
	public $v4_title2 = 'Bukti Transaksi';
	public $v5 = 'receipt';
	public $v5_title = 'Bukti Transaksi';
	public $v6 = 'signup';
	public $v6_title = 'Sign Up';
	public $v7 = 'template';
	public $v8 = 'v_home';
	public $v8_title = 'Selamat Datang!';
	public $v9 = 'v_pemesanan';
	public $v9_title = 'Halaman Pemesanan';
	public $v10 = 'v_profil';
	public $v10_title = 'Profil';
	public $v11 = 'v_pembayaran';
	public $v11_title = 'Data Pembayaran SPP';
	public $v12 = 'receipt_history';
	public $v13 = 'v_history';
	public $v13_title = 'History Pemesanan';
	public $v14 = 'v_admin-dashboard';
	public $v14_title = 'Dashboard';
	public $v15 = 'v_fasilitas';
	public $v15_title = 'Daftar Fasilitas';
	public $v16 = 'v_spp';
	public $v16_title = 'Daftar Tipe Kamar';
	public $v17 = 'login_siswa';
	public $v17_title = 'Login Sebagai Siswa';

	// Di bawah ini adalah deklarasi field tabel yang akan menggunakan alias dari masing2, dua atau lebih alias field tabel
	// Dengan adanya variabel ini, perencanaan tampilan tabel bisa menjadi lebih fleksibel dan lebih terorganisir karena
	// hanya memerlukan satu kali deklarasi saja
	// Jumlah variabel yang digunakan dapat disesuaikan dengan kebutuhan tiap-tiap function atau halaman
	// Hal ini bisa dikembangkan dengan membuat sebuah variabel view tabel supaya semuanya dapat diplanning di satu tempat
	public $v_field1;
	public $v_field2;
	public $v_field3;
	public $v_field4;
	public $v_field5;
	public $v_field6;
	public $v_field7;
	public $v_field8;
	public $v_field9;
	public $v_field10;
	public $v_field11;
	public $v_field12;
	public $v_field13;
	public $v_field14;
	public $v_field15;


	// deklarasi flashdata
	// Flashdata di sini bertugas untuk menemani pengguna dalam perselancarannya di website ini
	// Elemen yang digunakan adalah toast atau popup di sudut kanan atas

	// Masing-masing modal akan dibagi 2
	// 2. Modal yang berhuungan dengan pesan akan diberi kode nomor (flashdata1, flashdata2, flasdata3, dan seterusnya)
	// 1. Modal yang berhubungan dengan elemen akan diberi kode huruf (flashdata_a, flashdata_b, flasdata_c, dan seterusnya)

	// Jika flashdata memiliki pesan atau fungsi, maka akan ditambahakan _msg1 atau _func1
	// flashdata1_msg1, flashdata_a_func1

	// Flashdata yang berhubungan dengan pesan
	public $v_flashdata1 = 'pesan';
	public $v_flashdata1_msg1;
	public $v9_flashdata1_msg2;
	public $v_flashdata2 = 'notifikasi';
	public $v_flashdata2_msg1;
	public $v_flashdata2_msg2;
	public $v_flashdata3 = 'pesan_tambah';
	public $v_flashdata3_msg1;
	public $v_flashdata3_msg2;
	public $v_flashdata4 = 'pesan_ubah';
	public $v_flashdata4_msg1;
	public $v_flashdata4_msg2;
	public $v_flashdata5 = 'pesan_lihat';
	public $v_flashdata5_msg1;
	public $v_flashdata5_msg2;
	public $v_flashdata6 = 'pesan_cari';
	public $v_flashdata6_msg1;
	public $v_flashdata6_msg2;
	public $v_flashdata7 = 'pesan_maintenance';
	public $v_flashdata7_msg1;
	public $v_flashdata7_msg2;
	public $v_flashdata8 = 'pesan_cleaning';
	public $v_flashdata8_msg1;
	public $v_flashdata8_msg2;
	public $v_flashdata9 = 'pesan_book';
	public $v_flashdata9_msg1;
	public $v_flashdata9_msg2;
	public $v_flashdata10 = 'pesan_bayar';
	public $v_flashdata10_msg1;
	public $v_flashdata10_msg2;
	public $v_flashdata11 = 'pesan_favicon';
	public $v_flashdata11_msg1;
	public $v_flashdata11_msg2;
	public $v_flashdata12 = 'pesan_logo';
	public $v_flashdata12_msg1;
	public $v_flashdata12_msg2;
	public $v_flashdata13 = 'pesan_foto';
	public $v_flashdata13_msg1;
	public $v_flashdata13_msg2;
	public $v_flashdata14 = 'pesan_quickTour';
	public $v_flashdata14_msg1 = "Anda hanya akan mendapatkan quick tour ini sebanyak 2 kali";

	// Flashdata di bawah ini bertugas untuk memberitahu pengguna mengenai hal yang berhubungan dengan data pribadi
	// Elemen yang digunakan adalah modal yang digunakan oleh pengguna
	// Untuk pesan2 tersebut sendiri akan diatur pada masing-masing halaman controller

	public $v_flashdata_a = 'panggil';
	public $v_flashdata_a_func1 = '$("#element").toast("show")';
	// Flashdata untuk modal umum
	public $v_flashdata_b = 'modal';
	public $v_flashdata_b_func1 = '$(".password").modal("show")';
	// Flashdata untuk modal khusus
	public $v_flashdata_c = 'tambah';
	public $v_flashdata_c_func1 = '$(".tambah").modal("show")';
	public $v_flashdata_d = 'ubah';
	public $v_flashdata_d_func1 = '$(".ubah").modal("show")';
	public $v_flashdata_e = 'lihat';
	public $v_flashdata_e_func1 = '$(".lihat").modal("show")';
	public $v_flashdata_f = 'cari';
	public $v_flashdata_f_func1 = '$(".cari").modal("show")';
	public $v_flashdata_g = 'maintenance';
	public $v_flashdata_g_func1 = '$(".maintenance").modal("show")';
	public $v_flashdata_h = 'clean';
	public $v_flashdata_h_func1 = '$(".clean").modal("show")';
	public $v_flashdata_i = 'book';
	public $v_flashdata_i_func1 = '$(".book").modal("show")';
	public $v_flashdata_j = 'bayar';
	public $v_flashdata_j_func1 = '$(".bayar").modal("show")';
	public $v_flashdata_k = 'favicon';
	public $v_flashdata_k_func1 = '$(".favicon").modal("show")';
	public $v_flashdata_l = 'logo';
	public $v_flashdata_l_func1 = '$(".logo").modal("show")';
	public $v_flashdata_m = 'foto';
	public $v_flashdata_m_func1 = '$(".foto").modal("show")';
	public $v_flashdata_n = 'quickTour';
	public $v_flashdata_n_func1 = '$("#quickTour").modal("show")';
	public $aliases;
	public $controllers;
	public $views;
	public $flashdata;
	public $parts;
	public $sessionVariables;


	public function

	declarew()
	{
		$this->aliases = array(
			'tabel2' => 'history',
			'tabel2_alias' => 'History Pemesanan',
			'tabel2_field1' => 'id_history',
			'tabel2_field1_alias' => 'ID History',

			'tabel2_field2' => 'id_pesanan',
			'tabel2_field2_alias' => 'ID Pesanan',

			'tabel2_field3' => 'id_user',
			'tabel2_field3_alias' => 'ID User',

			'tabel2_field4' => 'nama',
			'tabel2_field4_alias' => 'Nama Pemesan',

			'tabel2_field5' => 'email',
			'tabel2_field5_alias' => 'Email',
			'tabel2_field6' => 'hp',
			'tabel2_field6_alias' => 'No HP',
			'tabel2_field7' => 'id_petugas',
			'tabel2_field7_alias' => 'ID Petugas',
			'tabel2_field8' => 'tipe',
			'tabel2_field8_alias' => 'Tipe',
			'tabel2_field9' => 'jumlah',
			'tabel2_field9_alias' => 'Jumlah',
			'tabel2_field10' => 'harga_total',
			'tabel2_field10_alias' => 'Harga Total',
			'tabel2_field11' => 'cek_in',
			'tabel2_field11_alias' => 'Cek In',
			'tabel2_field12' => 'cek_out',
			'tabel2_field12_alias' => 'Cek Out',
			'tabel2_field13' => 'no_kamar',
			'tabel2_field13_alias' => 'No Kamar',
			'tabel2_field14' => 'tgl_perubahan',
			'tabel2_field14_alias' => 'Tgl Perubahan',
			'tabel2_field15' => 'user_aktif',
			'tabel2_field15_alias' => 'User Aktif',

			'tabel4' => 'siswa',
			'tabel4_alias' => 'Siswa',
			'tabel4_field1' => 'nisn',
			'tabel4_field1_alias' => 'NISN',
			'tabel4_field2' => 'nis',
			'tabel4_field2_alias' => 'NIS',
			'tabel4_field3' => 'nama',
			'tabel4_field3_alias' => 'Nama',
			'tabel4_field4' => 'id_kelas',
			'tabel4_field4_alias' => 'ID Kelas',
			'tabel4_field5' => 'alamat',
			'tabel4_field5_alias' => 'Alamat',
			'tabel4_field6' => 'no_telp',
			'tabel4_field6_alias' => 'No HP',
			'tabel4_field7' => 'id_spp',
			'tabel4_field7_alias' => 'ID SPP',
			'tabel4_field8' => 'id_spp',
			'tabel4_field8_alias' => 'password',

			'tabel5' => 'kelas',
			'tabel5_alias' => 'Kelas',
			'tabel5_field1' => 'id_kelas',
			'tabel5_field1_alias' => 'ID Kelas',
			'tabel5_field2' => 'nama_kelas',
			'tabel5_field2_alias' => 'Nama Kelas',
			'tabel5_field3' => 'kompetensi_keahlian',
			'tabel5_field3_alias' => 'Kompetensi Keahlian',

			'tabel6' => 'spp',
			'tabel6_alias' => 'SPP',
			'tabel6_field1' => 'id_spp',
			'tabel6_field1_alias' => 'ID SPP',
			'tabel6_field2' => 'tahun',
			'tabel6_field2_alias' => 'Tahun',
			'tabel6_field3' => 'nominal',
			'tabel6_field3_alias' => 'Nominal',

			'tabel7' => 'pengaturan',
			'tabel7_alias' => 'Pengaturan Website',
			'tabel7_field1' => 'id',
			'tabel7_field1_alias' => 'ID Website',
			'tabel7_field2' => 'nama',
			'tabel7_field2_alias' => 'Nama Website',
			'tabel7_field3' => 'favicon',
			'tabel7_field3_alias' => 'Favicon',
			'tabel7_field4' => 'logo',
			'tabel7_field4_alias' => 'Logo',
			'tabel7_field5' => 'foto',
			'tabel7_field5_alias' => 'Foto',
			'tabel7_field6' => 'alamat',
			'tabel7_field6_alias' => 'Alamat',
			'tabel7_field7' => 'email',
			'tabel7_field7_alias' => 'Email',
			'tabel7_field8' => 'hp',
			'tabel7_field8_alias' => 'No HP',
			'tabel7_field9' => 'metadesc',
			'tabel7_field9_alias' => 'Metadesc',
			'tabel7_field10' => 'fb',
			'tabel7_field10_alias' => 'Akun Facebook',
			'tabel7_field11' => 'ig',
			'tabel7_field11_alias' => 'Akun Instagram',

			'tabel8' => 'pembayaran',
			'tabel8_alias' => 'Pembayaran',
			'tabel8_field1' => 'id_pembayaran',
			'tabel8_field1_alias' => 'ID Pembayaran',
			'tabel8_field2' => 'id_petugas',
			'tabel8_field2_alias' => 'ID Petugas',
			'tabel8_field3' => 'nisn',
			'tabel8_field3_alias' => 'NISN',
			'tabel8_field4' => 'tgl_bayar',
			'tabel8_field4_alias' => 'Tanggal Bayar',
			'tabel8_field5' => 'bulan_dibayar',
			'tabel8_field5_alias' => 'Bulan Dibayar',
			'tabel8_field6' => 'tahun_dibayar',
			'tabel8_field6_alias' => 'Tahun Dibayar',
			'tabel8_field7' => 'id_spp',
			'tabel8_field7_alias' => 'ID SPP',
			'tabel8_field8' => 'password',
			'tabel8_field8_alias' => 'Password',

			'tabel9' => 'petugas',
			'tabel9_alias' => 'Petugas',
			'tabel9_field1' => 'id_user',
			'tabel9_field1_alias' => 'ID User',
			'tabel9_field2' => 'nama',
			'tabel9_field2_alias' => 'Nama',
			'tabel9_field3' => 'email',
			'tabel9_field3_alias' => 'Email',
			'tabel9_field4' => 'password',
			'tabel9_field4_alias' => 'Password',
			'tabel9_field5' => 'hp',
			'tabel9_field5_alias' => 'No Hp',
			'tabel9_field6' => 'level',
			'tabel9_field6_alias' => 'Level User',
			'tabel9_field6_value1' => '',
			'tabel9_field6_value2' => 'accounting',
			'tabel9_field6_value3' => 'administrator',
			'tabel9_field6_value4' => 'petugas',
			'tabel9_field6_value5' => 'siswa',
			'tabel9_field7' => 'login_count',
			'tabel9_field7_alias' => 'Jumlah Login',
		);
		
	

		// deklarasi session
		$this->tabel9_userdata1 = $this->aliases['tabel9_field1'];
		$this->tabel9_tempdata1 = $this->tabel9_field1;
		$this->tabel9_userdata2 = $this->tabel9_field2;
		$this->tabel9_tempdata2 = $this->tabel9_field2;
		$this->tabel9_userdata3 = $this->tabel9_field3;
		$this->tabel9_tempdata3 = $this->tabel9_field3;
		$this->tabel9_userdata4 = $this->tabel9_field4;
		$this->tabel9_tempdata4 = $this->tabel9_field4;
		$this->tabel9_userdata5 = $this->tabel9_field5;
		$this->tabel9_tempdata5 = $this->tabel9_field5;
		$this->tabel9_userdata6 = $this->tabel9_field6;
		$this->tabel9_tempdata6 = $this->tabel9_field6;
		$this->tabel9_userdata7 = $this->tabel9_field7;
		$this->tabel9_tempdata7 = $this->tabel9_field7;

		$this->v_flashdata1_msg1 = 'Selamat datang ' . $this->session->userdata($this->tabel9_userdata6) . ' ' . $this->session->userdata($this->tabel9_userdata2) . '!';

		$this->v9_flashdata1_msg2 = 'Ayo kita lanjutkan ke pemesanan, ' . $this->session->userdata($this->tabel9_userdata6) . ' ' . $this->session->userdata($this->tabel9_userdata2) . '!';
	}


	// fungsi pertama yang akan diload oleh website
	public function index($id = 1)
	{
		$this->declarew();
		// Cache control headers
        header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.

		// mengarahkan pengguna ke halaman masing-masing sesuai level
		switch ($this->session->userdata($this->tabel9_userdata6)) {
			case $this->tabel9_field6_value2:
			case $this->tabel9_field6_value3:
			case $this->tabel9_field6_value4:

				$this->session->set_flashdata($this->v_flashdata1, $this->v_flashdata1_msg1);
				$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);

				redirect(site_url($this->c5));
				break;

			default:
				$this->session->set_flashdata($this->v_flashdata1, $this->v_flashdata1_msg1);
				$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);

				// When you're the one who's developing this app, it's quite annoying to see this message over and over again.\
				// The feature below isn't working as expected
				// if ($this->session->userdata($this->tabel9_userdata7) < 2) {
				// 	$this->session->set_flashdata($this->v_flashdata14, $this->v_flashdata14_msg1);
				// 	$this->session->set_flashdata($this->v_flashdata_n, $this->v_flashdata_n_func1);
				// } else {
				// }

				$data1 = array(

					$this->v_part1 => $this->v8_title,
					$this->v_part3 => $this->v8,
					$this->v_part2 => $this->head,
					$this->v_part4 => $this->v_part4_msg1,
					'tbl7' => $this->tl7->ambil($id)->result(),
				);

				$data = array_merge($data1, $this->aliases);

				$this->load->view($this->v7, $data);
		}
	}

	public function pemesanan($id = 1)
	{
		$this->declarew();
		switch ($this->session->userdata($this->tabel9_userdata6)) {
			case $this->tabel9_field6_value5:
				$data1 = array(
					$this->v_part1 => $this->v9_title,
					$this->v_part2 => $this->head,
					$this->v_part3 => $this->v9,
					'tbl7' => $this->tl7->ambil($id)->result(),
					'tbl6' =>  $this->tl6->ambildata()->result(),
					$this->tabel8_v_input10 => $this->tabel8_v_input10_get,
					$this->tabel8_v_input11 => $this->tabel8_v_input11_get,
					$this->tabel8_v_input8 => $this->tabel8_v_input8_get,
				);

				$halaman = $this->v7;
				break;

			default:
				$data1 = array(
					$this->v_part1 => $this->v2_title,
					$this->v_part2 => $this->head,
					$this->v_part4 => $this->v_part4_msg1,
					'tbl7' => $this->tl7->ambil($id)->result()

				);
				$halaman = $this->v2;
		}

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->session->set_flashdata($this->v_flashdata1, $this->v9_flashdata1_msg2);
		$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);

		$this->load->view($halaman, $data);
	}

	public function spp($id = 1)
	{
		$this->declarew();
		$data1 = array(
			$this->v_part1 => $this->v16_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v16,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil($id)->result(),
			'tbl6' =>  $this->tl6->ambildata()->result(),
			// 'tbl1' => $this->tl1->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function fasilitas($id = 1)
	{
		$this->declarew();
		$data1 = array(
			$this->v_part1 => $this->v15_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v15,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil($id)->result(),
			// 'tabel3' => $this->tl3->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function dashboard($id = 1)
	{
		$this->declarew();
		$data1 = array(
			$this->v_part1 => $this->v14_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v14,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil($id)->result(),
			// 'tabel3' => $this->tl3->ambildata()->num_rows(),
			// 'tbl1' => $this->tl1->ambildata()->num_rows(),
			'tbl6' =>  $this->tl6->ambildata()->num_rows(),
			'tbl8' =>  $this->tl8->ambildata()->num_rows(),
			// 'tabel10' =>  $this->tl10->ambildata()->num_rows(),
			'tbl4' =>  $this->tl4->ambildata()->num_rows(),
			'tbl5' =>  $this->tl5->ambildata()->num_rows(),
			'tbl9' =>  $this->tl9->ambildata()->num_rows(),
			$this->tabel8_v_input10 => $this->tabel8_v_input10_get,
			$this->tabel8_v_input11 => $this->tabel8_v_input11_get,
			$this->tabel8_v_input8 => $this->tabel8_v_input8_get,
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	// fungsi ketika pengguna mengunjungi halaman yang tidak sesuai dengan level
	public function no_level($id = 1)
	{
		$this->declarew();
		$data1 = array(
			$this->v_part1 => $this->v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil($id)->result(),
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v3, $data);
	}
}
