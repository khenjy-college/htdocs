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
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}
	// Menggunakan variabel sebagai alat pembantu, persyaratan
	// Semua yang ada di sini bakal diubah nantinya dari private menjadi antara private atau protected
	// deklarasi variabel per tabel
	// deklarasi tabel 1

	// Di bawah ini aku berencana untuk membuat sebuah array yang menampung semua jenis alias dari field dan nama tabel
	// Dan aku akan membuat array itu merge dengan array yang akan diload ke halaman view pada setiap
	// Controller yang ada di aplikasi ini, dengan begitu, aku tidak perlu khawatir jika ingin memulai projek baru
	// Dan ingin mengubah konten di dalamnya dalam waktu yang singkat

	public $tabel1 = 'faskamar';
	public $tabel1_alias = 'Fasilitas Kamar';
	// deklarasi variabel bagian field
	public $tabel1_field1 = 'id_faskamar';
	public $tabel1_field1_alias = 'ID';
	public $tabel1_field2 = 'tipe';
	public $tabel1_field2_alias = 'Tipe Kamar';
	public $tabel1_field3 = 'nama';
	public $tabel1_field3_alias = 'Nama Fasilitas';
	public $tabel1_field4 = 'img';
	public $tabel1_field4_alias = 'Gambar';



	// deklarasi tabel 2
	public $tabel2 = 'history';
	public $tabel2_alias = 'History Pemesanan';
	// deklarasi variabel bagian field
	public $tabel2_field1 = 'id_history';
	public $tabel2_field1_alias = 'ID';
	public $tabel2_field2 = 'id_pesanan';
	public $tabel2_field2_alias = 'id_pesanan';
	public $tabel2_field3 = 'id_user';
	public $tabel2_field3_alias = 'id_user';
	public $tabel2_field4 = 'pemesan';
	public $tabel2_field4_alias = 'pemesan';
	public $tabel2_field5 = 'email';
	public $tabel2_field5_alias = 'email';
	public $tabel2_field6 = 'hp';
	public $tabel2_field6_alias = 'hp';
	public $tabel2_field7 = 'tamu';
	public $tabel2_field7_alias = 'tamu';
	public $tabel2_field8 = 'tipe';
	public $tabel2_field8_alias = 'tipe';
	public $tabel2_field9 = 'jlh';
	public $tabel2_field9_alias = 'jlh';
	public $tabel2_field10 = 'harga_total';
	public $tabel2_field10_alias = 'harga_total';
	public $tabel2_field11 = 'cek_in';
	public $tabel2_field11_alias = 'cek_in';
	public $tabel2_field12 = 'cek_out';
	public $tabel2_field12_alias = 'cek_out';
	public $tabel2_field13 = 'no_kamar';
	public $tabel2_field13_alias = 'no_kamar';
	public $tabel2_field14 = 'tgl_perubahan';
	public $tabel2_field14_alias = 'tgl_perubahan';
	public $tabel2_field15 = 'user_aktif';
	public $tabel2_field15_alias = 'user_aktif';


	// deklarasi tabel 3
	public $tabel3 = 'fashotel';
	public $tabel3_alias = 'Fasilitas Hotel';
	// deklarasi variabel bagian field
	public $tabel3_field1 = 'id_fashotel';
	public $tabel3_field1_alias = 'ID Fasilitas';
	public $tabel3_field2 = 'nama';
	public $tabel3_field2_alias = 'Nama';
	public $tabel3_field3 = 'keterangan';
	public $tabel3_field3_alias = 'Keterangan';
	public $tabel3_field4 = 'img';
	public $tabel3_field4_alias = 'Gambar';


	// deklarasi tabel 4
	public $tabel4 = 'petugas';
	public $tabel4_alias = 'Petugas';
	// deklarasi variabel bagian field
	public $tabel4_field1 = 'id_petugas';
	public $tabel4_field1_alias = 'id_petugas';
	public $tabel4_field2 = 'nama';
	public $tabel4_field2_alias = 'nama';
	public $tabel4_field3 = 'email';
	public $tabel4_field3_alias = 'email';
	public $tabel4_field4 = 'hp';
	public $tabel4_field4_alias = 'hp';
	public $tabel4_field5 = 'img';
	public $tabel4_field5_alias = 'img';
	public $tabel4_field6 = 'role';
	public $tabel4_field6_alias = 'role';
	public $tabel4_field7 = 'poin';
	public $tabel4_field7_alias = 'poin';


	// deklarasi tabel 5
	public $tabel5 = 'kamar';
	public $tabel5_alias = 'Kamar';
	// deklarasi variabel bagian field
	public $tabel5_field1 = 'no_kamar';
	public $tabel5_field1_alias = 'no_kamar';
	public $tabel5_field2 = 'id_tipe';
	public $tabel5_field2_alias = 'id_tipe';
	public $tabel5_field3 = 'id_pesanan';
	public $tabel5_field3_alias = 'id_pesanan';
	public $tabel5_field4 = 'status';
	public $tabel5_field4_alias = 'status';
	public $tabel5_field5 = 'keterangan';
	public $tabel5_field5_alias = 'keterangan';

	// deklarasi tabel 6
	public $tabel6 = 'tipe_kamar';
	public $tabel6_alias = 'Tipe Kamar';
	// deklarasi variabel bagian field
	public $tabel6_field1 = 'id_tipe';
	public $tabel6_field1_alias = 'id_tipe';
	public $tabel6_field2 = 'tipe';
	public $tabel6_field2_alias = 'tipe';
	public $tabel6_field3 = 'img';
	public $tabel6_field3_alias = 'Gambar';
	public $tabel6_field4 = 'stok';
	public $tabel6_field4_alias = 'stok';
	public $tabel6_field5 = 'harga';
	public $tabel6_field5_alias = 'harga';



	// deklarasi tabel 7
	public $tabel7 = 'pengaturan';
	public $tabel7_alias = 'Pengaturan Website';
	// deklarasi variabel bagian field
	public $tabel7_field1 = 'id';
	public $tabel7_field1_alias = 'id';
	public $tabel7_field2 = 'nama';
	public $tabel7_field2_alias = 'nama';
	public $tabel7_field3 = 'favicon';
	public $tabel7_field3_alias = 'favicon';
	public $tabel7_field4 = 'logo';
	public $tabel7_field4_alias = 'logo';
	public $tabel7_field5 = 'foto';
	public $tabel7_field5_alias = 'foto';
	public $tabel7_field6 = 'alamat';
	public $tabel7_field6_alias = 'alamat';
	public $tabel7_field7 = 'email';
	public $tabel7_field7_alias = 'email';
	public $tabel7_field8 = 'hp';
	public $tabel7_field8_alias = 'hp';
	public $tabel7_field9 = 'metadesc';
	public $tabel7_field9_alias = 'metadesc';
	public $tabel7_field10 = 'fb';
	public $tabel7_field10_alias = 'fb';
	public $tabel7_field11 = 'ig';
	public $tabel7_field11_alias = 'ig';


	// deklarasi tabel 8
	public $tabel8 = 'pesanan';
	public $tabel8_alias = 'Pesanan';
	// deklarasi variabel bagian field
	public $tabel8_field1 = 'id_pesanan';
	public $tabel8_field1_alias = 'id_pesanan';
	public $tabel8_field2 = 'id_user';
	public $tabel8_field2_alias = 'id_user';
	public $tabel8_field3 = 'pemesan';
	public $tabel8_field3_alias = 'pemesan';
	public $tabel8_field4 = 'email';
	public $tabel8_field4_alias = 'email';
	public $tabel8_field5 = 'hp';
	public $tabel8_field5_alias = 'hp';
	public $tabel8_field6 = 'tamu';
	public $tabel8_field6_alias = 'tamu';
	public $tabel8_field7 = 'id_tipe';
	public $tabel8_field7_alias = 'id_tipe';
	public $tabel8_field8 = 'jlh';
	public $tabel8_field8_alias = 'jlh';
	public $tabel8_field9 = 'harga_total';
	public $tabel8_field9_alias = 'harga_total';
	public $tabel8_field10 = 'cek_in';
	public $tabel8_field10_alias = 'cek_in';
	public $tabel8_field11 = 'cek_out';
	public $tabel8_field11_alias = 'cek_out';
	public $tabel8_field12 = 'status';
	public $tabel8_field12_alias = 'status';
	public $tabel8_field12_value1 = 'pending';
	public $tabel8_field12_value2 = 'belum bayar';
	public $tabel8_field12_value3 = 'menunggu';
	public $tabel8_field12_value4 = 'cek in';
	public $tabel8_field12_value5 = 'cek out';
	public $tabel8_field13 = 'no_kamar';
	public $tabel8_field13_alias = 'Nomor Kamar';


	// deklarasi tabel 9
	public $tabel9 = 'user';
	public $tabel9_alias = 'User';
	// deklarasi variabel bagian field
	public $tabel9_field1 = 'id_user';
	public $tabel9_field1_alias = 'id_user';
	public $tabel9_field2 = 'nama';
	public $tabel9_field2_alias = 'nama';
	public $tabel9_field3 = 'email';
	public $tabel9_field3_alias = 'email';
	public $tabel9_field4 = 'password';
	public $tabel9_field4_alias = 'password';
	public $tabel9_field5 = 'hp';
	public $tabel9_field5_alias = 'hp';
	public $tabel9_field6 = 'level';
	public $tabel9_field6_alias = 'level';
	public $tabel9_field6_value1 = '';
	public $tabel9_field6_value2 = 'accounting';
	public $tabel9_field6_value3 = 'administrator';
	public $tabel9_field6_value4 = 'resepsionis';
	public $tabel9_field6_value5 = 'tamu';


	// deklarasi tabel 10
	// deklarasi variabel per tabel
	// deklarasi tabel 1
	public $tabel10 = 'transaksi';
	public $tabel10_alias = 'Transaksi';
	// deklarasi variabel bagian field
	public $tabel10_field1 = 'id_transaksi';
	public $tabel10_field1_alias = 'ID Transaksi';
	public $tabel10_field2 = 'id_user';
	public $tabel10_field2_alias = 'ID Resepsionis';
	public $tabel10_field3 = 'email';
	public $tabel10_field3_alias = 'Email';
	public $tabel10_field4 = 'id_pesanan';
	public $tabel10_field4_alias = 'ID Pesanan';
	public $tabel10_field5 = 'metode';
	public $tabel10_field5_alias = 'Metode';
	public $tabel10_field6 = 'bayar';
	public $tabel10_field6_alias = 'Bayar';
	public $tabel10_field7 = 'tgl_transaksi';
	public $tabel10_field7_alias = 'Tanggal Transaksi';



	// deklarasi tabel 11
	// deklarasi variabel per tabel


	public $tabel11 = 'operations';
	public $tabel11_alias = 'Operasi Hotel';
	// deklarasi variabel bagian field
	public $tabel11_field1 = 'id_operations';
	public $tabel11_field1_alias = 'id_operations';
	public $tabel11_field2 = 'no_kamar';
	public $tabel11_field2_alias = 'no_kamar';
	public $tabel11_field3 = 'id_user';
	public $tabel11_field3_alias = 'id_user';
	public $tabel11_field4 = 'id_petugas';
	public $tabel11_field4_alias = 'id_petugas';
	public $tabel11_field5 = 'keterangan';
	public $tabel11_field5_alias = 'keterangan';
	public $tabel11_field6 = 'tgl_perubahan';
	public $tabel11_field6_alias = 'tgl_perubahan';


	// deklarasi mvc
	// deklarasi model


	// deklarasi model yang tidak memiliki nama tabel pada nama file atau function

	// deklarasi controller yang tidak memiliki nama tabel pada nama file atau function
	public $c1 = 'welcome';
	public $c2 = 'welcome/pemesanan';
	public $c3 = 'welcome/tipe_kamar';
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

	// Aku ada rencana untuk menggunakan Toastr untuk menampilkan notifikasi toast
	// Ini adalah link : https://codeseven.github.io/toastr/demo.html


	// deklarasi views yang saat ini belum terhubung ke basis data
	// Ada rencana untuk menggunakan _alias dari untuk membuat title kamar semakin cantik dan interaktif
	// Namun hal itu saat ini digunakan di halaman admin saja untuk konsistensi
	public $head = '_partials/head';

	// Di bawah ini adalah fungsi config
	public $file_type1 = 'jpg|png|jpeg|gif|svg|webp';
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
	public $v1_title1 = 'Reservasi Berhasil';
	public $v1_title2 = 'Transaksi Berhasil';
	public $v2 = 'login';
	public $v2_title = 'Login';
	public $v3 = 'no-level';
	public $v3_title = 'Anda tidak memiliki level';
	public $v4 = 'print';
	public $v4_title1 = 'Bukti Reservasi';
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
	public $v11 = 'v_reservasi';
	public $v11_title = 'Data Pemesanan';

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
	public $v_flashdata1_msg1 = '';
	public $v9_flashdata1_msg2;
	public $v_flashdata2 = 'notifikasi';
	public $v_flashdata2_msg1;
	public $v_flashdata2_msg2;
	public $v_flashdata3 = 'pesan_tambah';
	public $v_flashdata3_msg1 = 'Upload gambar gagal';
	public $v_flashdata3_msg2;
	public $v_flashdata4 = 'pesan_ubah';
	public $v_flashdata4_msg1 = 'Upload gambar gagal';
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

	// Flashdata di bawah ini bertugas untuk memberitahu pengguna mengenai hal yang berhubungan dengan data pribadi
	// Elemen yang digunakan adalah modal yang digunakan oleh pengguna
	// Untuk pesan2 tersebut sendiri akan diatur pada masing-masing halaman controller

	public $v_flashdata_a = 'panggil';
	public $v_flashdata_a_func1 = '$("#element").toast("show")';
	// Flashdata untuk modal umum
	public $v_flashdata_b = 'modal';
	public $v_flashdata_b_func1 = '$("#password").modal("show")';
	// Flashdata untuk modal khusus
	public $v_flashdata_c = 'tambah';
	public $v_flashdata_c_func1 = '$("#tambah").toggle()';
	public $v_flashdata_d = 'ubah';
	public $v_flashdata_d_func1 = '$("#ubah").toggle()';
	public $v_flashdata_e = 'lihat';
	public $v_flashdata_e_func1 = '$("#lihat").toggle()';
	public $v_flashdata_f = 'cari';
	public $v_flashdata_f_func1 = '$("#cari").toggle()';
	public $v_flashdata_g = 'maintenance';
	public $v_flashdata_g_func1 = '$("#maintenance").toggle()';
	public $v_flashdata_h = 'clean';
	public $v_flashdata_h_func1 = '$("#clean").toggle()';
	public $v_flashdata_i = 'book';
	public $v_flashdata_i_func1 = '$("#book").toggle()';


	public function

	declare()
	{

		// deklarasi input pada halaman publik
		$this->tabel8_v_input8 = $this->tabel8_field8;
		$this->tabel8_v_input8_get = $this->input->get($this->tabel8_v_input8);
		$this->tabel8_v_input10 = $this->tabel8_field10;
		$this->tabel8_v_input10_get = $this->input->get($this->tabel8_v_input10);
		$this->tabel8_v_input10_post = $this->input->post($this->tabel8_v_input10);
		$this->tabel8_v_input10_filter1 = $this->tabel8_v_input10 . '_min';
		$this->tabel8_v_input10_filter1_get = $this->input->get($this->tabel8_v_input10_filter1);
		$this->tabel8_v_input10_filter2 = $this->tabel8_v_input10 . '_max';
		$this->tabel8_v_input10_filter2_get = $this->input->get($this->tabel8_v_input10_filter1);
		$this->tabel8_v_input11 = $this->tabel8_field11;
		$this->tabel8_v_input11_get = $this->input->get($this->tabel8_v_input11);
		$this->tabel8_v_input11_post = $this->input->post($this->tabel8_v_input11);
		$this->tabel8_v_input11_filter1 = $this->tabel8_v_input11 . '_min';
		$this->tabel8_v_input11_filter1_get = $this->input->get($this->tabel8_v_input10_filter1);
		$this->tabel8_v_input11_filter2 = $this->tabel8_v_input11 . '_max';
		$this->tabel8_v_input11_filter2_get = $this->input->get($this->tabel8_v_input10_filter1);


		// deklarasi session
		$this->tabel9_userdata1 = $this->tabel9_field1;
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

		$this->v_flashdata1_msg1 = 'Selamat datang ' . $this->session->userdata($this->tabel9_userdata6) . ' ' . $this->session->userdata($this->tabel9_userdata2) . '!';

		$this->v9_flashdata1_msg2 = 'Ayo kita lanjutkan ke pemesanan, ' . $this->session->userdata($this->tabel9_userdata6) . ' ' . $this->session->userdata($this->tabel9_userdata2) . '!';
	}


	// fungsi pertama yang akan diload oleh website
	public function index($id = 1)
	{

		$this->declare();
		// mengarahkan pengguna ke halaman masing-masing sesuai level
		if (
			$this->session->userdata($this->tabel9_userdata6) === $this->tabel9_field6_value2
			|| $this->session->userdata($this->tabel9_userdata6) === $this->tabel9_field6_value3
			|| $this->session->userdata($this->tabel9_userdata6) === $this->tabel9_field6_value4
		) {

			$this->session->set_flashdata($this->v_flashdata1, $this->v_flashdata1_msg1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);

			redirect(site_url($this->c5));
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->v_flashdata1_msg1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
			$data = array(

				$this->v_part1 => $this->v8_title,
				'konten' => $this->v8,
				$this->v_part2 => $this->head,
				$this->v_part4 => $this->v_part4_msg1,
				$this->tabel7 => $this->ptn->ambil($id)->result(),
			);

			$this->load->view($this->v7, $data);
		}
	}

	public function pemesanan($id = 1)
	{
		$this->declare();
		if ($this->session->userdata($this->tabel9_userdata6) === $this->tabel9_field6_value5) {
			$data = array(
				$this->v_part1 => $this->v9_title,
				$this->v_part2 => $this->head,
				'konten' => $this->v9,
				$this->tabel7 => $this->ptn->ambil($id)->result(),
				'tipe_kamar' => $this->tpk->ambildata()->result(),
				'cek_in' => $this->tabel8_v_input10_get,
				'cek_out' => $this->tabel8_v_input11_get,
				'jlh' => $this->tabel8_v_input8_get,
				'halaman' => $this->v7
			);

			$halaman = $this->v7;
		} else {
			$data = array(
				$this->v_part1 => $this->v2_title,
				$this->v_part2 => $this->head,
				$this->v_part4 => $this->v_part4_msg1,
				$this->tabel7 => $this->ptn->ambil($id)->result()

			);
			$halaman = $this->v2;
		}
		$this->session->set_flashdata($this->v_flashdata1, $this->v9_flashdata1_msg2);
		$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);

		$this->load->view($halaman, $data);
	}

	public function tipe_kamar($id = 1)
	{
		$this->declare();
		$data = array(
			$this->v_part1 => 'Daftar Tipe Kamar',
			'konten' => 'v_tipe_kamar',
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'tipe_kamar' => $this->tpk->ambildata()->result(),
			'faskamar' => $this->fsk->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function fasilitas($id = 1)
	{
		$this->declare();
		$data = array(
			$this->v_part1 => 'Daftar Fasilitas',
			'konten' => 'v_fasilitas',
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'fashotel' => $this->fsh->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function dashboard($id = 1)
	{
		$this->declare();
		$data = array(
			$this->v_part1 => 'Dashboard',
			'konten' => 'v_admin-dashboard',
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'fashotel' => $this->fsh->ambildata()->num_rows(),
			'faskamar' => $this->fsk->ambildata()->num_rows(),
			'tipe_kamar' => $this->tpk->ambildata()->num_rows(),
			'pesanan' => $this->psn->ambildata()->num_rows(),
			'transaksi' => $this->trs->ambildata()->num_rows(),
			'petugas' => $this->pts->ambildata()->num_rows(),
			'user' => $this->usr->ambildata()->num_rows(),
			'cek_in' => $this->input->get('cek_in'),
			'cek_out' => $this->input->get('cek_out'),
			'jlh' => $this->input->get('jlh'),
		);

		$this->load->view('template', $data);
	}

	// fungsi ketika pengguna mengunjungi halaman yang tidak sesuai dengan level
	public function no_level($id = 1)
	{
		$this->declare();
		$data = array(
			$this->v_part1 => 'Anda tidak memiliki akses ke halaman ini',
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'pengaturan' => $this->ptn->ambil($id)->result(),
		);

		$this->load->view('no-level', $data);
	}
}
