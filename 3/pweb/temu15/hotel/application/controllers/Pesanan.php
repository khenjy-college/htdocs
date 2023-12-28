<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Masih banyak fitur-fitur yang kurang pada fitur pesanan seperti fitur cancel pesanan.
// Dan juga seharusnya ketika user melakukan pesanan seharusnya stok kamar tidak langsung berkurang
// // Melainkan harus menunggu resepsionis membooking kamar untuk customer terlebih dulu
// Saya baru berpikir untuk mengubah juga query sql pada trigger tambah kamar
// Yaitu untuk menambah stok kamar dan input ke history jika status pesannanya NOT IN (pending)
// Hal ini akan diperbaiki pada waktu-waktu mendatang. 

include 'Welcome.php';
session_write_close();
class Pesanan extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel8_m = 'tl8';

	// deklarasi variabel views
	private $tabel8_v1;
	private $tabel8_v1_title;
	private $tabel8_v2;
	private $tabel8_v2_title;
	private $tabel8_v3;
	private $tabel8_v3_title;

	// deklarasi variabel controller
	private $tabel8_c1;
	private $tabel8_c2;
	private $tabel8_c3;
	private $tabel8_c4;
	private $tabel8_c5;
	private $tabel8_c6;
	private $tabel8_c7;
	private $tabel8_c8;
	private $tabel8_c9;
	private $tabel8_c10;
	private $tabel8_c11;
	private $tabel8_c12;
	private $tabel8_c13;
	private $tabel8_c14;
	private $tabel8_c15;
	// deklarasi variabel views
	private $tabel8_v_input1_post;
	private $tabel8_v_input1_alt;
	private $tabel8_v_input1_get;
	private $tabel8_v_input2_post;
	private $tabel8_v_input3_post;
	private $tabel8_v_input3_get;
	private $tabel8_v_input4_post;
	private $tabel8_v_input4_get;
	private $tabel8_v_input5_post;
	private $tabel8_v_input6_post;
	private $tabel8_v_input7_post;
	private $tabel8_v_input8_post;
	private $tabel8_v_input9_post;
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
	private $tabel8_v_input12_post;
	private $tabel8_v_input13_post;
	private $tabel8_v_flashdata1_msg_1;
	private $tabel8_v_flashdata1_msg_2;
	private $tabel8_v_flashdata1_msg_3;
	private $tabel8_v_flashdata1_msg_4;
	private $tabel8_v_flashdata1_msg_5;
	private $tabel8_v_flashdata1_msg_6;
	private $tabel8_v_flashdata1_msg_7;
	private $tabel8_v_flashdata1_msg_8;
	private $tabel8_v_flashdata3_msg_1;
	private $tabel8_v_flashdata4_msg_1;

	private $tabel8_userdata1;
	private $tabel8_userdata2;
	private $tabel8_userdata3;
	private $tabel8_userdata4;
	private $tabel8_userdata5;
	private $tabel8_userdata6;
	private $tabel8_userdata7;
	private $tabel8_userdata8;
	private $tabel8_userdata9;
	private $tabel8_userdata10;
	private $tabel8_userdata11;
	private $tabel8_userdata12;
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

	public function

	declare()
	{
		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel8_m = 'tl8';

		// deklarasi variabel views
		$this->tabel8_v1 = 'v_' . $this->tabel8;
		$this->tabel8_v1_title = 'Daftar ' . $this->tabel8_alias;
		$this->tabel8_v2 = 'v_admin-' . $this->tabel8;
		$this->tabel8_v2_title = 'Data ' . $this->tabel8_alias;
		$this->tabel8_v3 = '_laporan/laporan_' . $this->tabel8;
		$this->tabel8_v3_title = 'Laporan ' . $this->tabel8_alias;

		// deklarasi variabel controller
		$this->tabel8_c1 = $this->tabel8;
		$this->tabel8_c2 = $this->tabel8 . '/tambah';
		$this->tabel8_c3 = $this->tabel8 . '/update';
		$this->tabel8_c4 = $this->tabel8 . '/hapus';
		$this->tabel8_c5 = $this->tabel8 . '/laporan';
		$this->tabel8_c6 = $this->tabel8 . '/daftar';
		$this->tabel8_c7 = $this->tabel8 . '/cari';
		$this->tabel8_c8 = $this->tabel8 . '/update_status';
		$this->tabel8_c9 = $this->tabel8 . '/konfirmasi';
		$this->tabel8_c10 = $this->tabel8 . '/print';
		$this->tabel8_c11 = $this->tabel8 . '/filter';
		$this->tabel8_c12 = $this->tabel8 . '/filter_tamu';
		$this->tabel8_c13 = $this->tabel8 . '/book';


		// tabel bagian input
		$this->tabel8_v_input1_post = $this->input->post($this->tabel8_field1);
		$this->tabel8_v_input1_get = $this->input->get($this->tabel8_field1);
		$this->tabel8_v_input1_alt = '';
		$this->tabel8_v_input2_post = $this->input->post($this->tabel8_field2);
		$this->tabel8_v_input3_post = $this->input->post($this->tabel8_field3);
		$this->tabel8_v_input3_get = $this->input->get($this->tabel8_field3);
		$this->tabel8_v_input4_post = $this->input->post($this->tabel8_field4);
		$this->tabel8_v_input4_get = $this->input->get($this->tabel8_field4);
		$this->tabel8_v_input5_post = $this->input->post($this->tabel8_field5);
		$this->tabel8_v_input6_post = $this->input->post($this->tabel8_field6);
		$this->tabel8_v_input7_post = $this->input->post($this->tabel8_field7);
		$this->tabel8_v_input8_post = $this->input->post($this->tabel8_field8);
		$this->tabel8_v_input9_post = $this->input->post($this->tabel8_field9);
		$this->tabel8_v_input10 = $this->tabel8_field10;
		$this->tabel8_v_input10_get = $this->input->get($this->tabel8_v_input10);
		$this->tabel8_v_input10_post = $this->input->post($this->tabel8_v_input10);
		$this->tabel8_v_input10_filter1 = $this->tabel8_v_input10 . '_min';
		$this->tabel8_v_input10_filter1_get = $this->input->get($this->tabel8_v_input10_filter1);
		$this->tabel8_v_input10_filter2 = $this->tabel8_v_input10 . '_max';
		$this->tabel8_v_input10_filter2_get = $this->input->get($this->tabel8_v_input10_filter2);
		$this->tabel8_v_input11 = $this->tabel8_field11;
		$this->tabel8_v_input11_get = $this->input->get($this->tabel8_v_input11);
		$this->tabel8_v_input11_post = $this->input->post($this->tabel8_v_input11);
		$this->tabel8_v_input11_filter1 = $this->tabel8_v_input11 . '_min';
		$this->tabel8_v_input11_filter1_get = $this->input->get($this->tabel8_v_input11_filter1);
		$this->tabel8_v_input11_filter2 = $this->tabel8_v_input11 . '_max';
		$this->tabel8_v_input11_filter2_get = $this->input->get($this->tabel8_v_input11_filter2);
		$this->tabel8_v_input12_post = $this->input->post($this->tabel8_field12);
		$this->tabel8_v_input13_post = $this->input->post($this->tabel8_field13);


		// deklarasi variabel bagian v_flashdata
		$this->tabel8_v_flashdata1_msg_1 = 'Data ' . $this->tabel8_alias . ' berhasil disimpan!';
		$this->tabel8_v_flashdata1_msg_2 = 'Data ' . $this->tabel8_alias . ' gagal disimpan!';
		$this->tabel8_v_flashdata1_msg_3 = 'Data ' . $this->tabel8_alias . ' berhasil diubah!';
		$this->tabel8_v_flashdata1_msg_4 = 'Data ' . $this->tabel8_alias . ' gagal diubah!';
		$this->tabel8_v_flashdata1_msg_5 = 'Data ' . $this->tabel8_alias . ' berhasil dihapus!';
		$this->tabel8_v_flashdata1_msg_6 = 'Data ' . $this->tabel8_alias . ' gagal dihapus!';
		$this->tabel8_v_flashdata1_msg_7 = 'Status ' . $this->tabel8_alias . ' berhasil diubah!';
		$this->tabel8_v_flashdata1_msg_8 = 'Status ' . $this->tabel8_alias . ' gagal diubah!';

		// deklarasi menggunakan nilai tabel lain
		// deklarasi session
		$this->tabel8_userdata1 = $this->tabel8_v_input1_get;
		$this->tabel8_userdata3 = $this->tabel8_v_input3_get;

		// deklarasi session tabel 9
		$this->tabel9_userdata1 = $this->tabel9_field1;
		$this->tabel9_tempdata1 = $this->tabel9_field1;
		$this->tabel9_userdata2 = $this->tabel9_field2;
		$this->tabel9_tempdata2 = $this->tabel9_field2;
		$this->tabel9_userdata3 = $this->tabel9_field3;
		$this->tabel9_tempdata3 = $this->tabel9_field3 . '_' . $this->tabel8;
		$this->tabel9_userdata4 = $this->tabel9_field4;
		$this->tabel9_tempdata4 = $this->tabel9_field4;
		$this->tabel9_userdata5 = $this->tabel9_field5;
		$this->tabel9_tempdata5 = $this->tabel9_field5;
		$this->tabel9_userdata6 = $this->tabel9_field6;
		$this->tabel9_tempdata6 = $this->tabel9_field6;
	}



	public function index($tabel7_field1 = 1)
	{
		$this->declare();

		// nilai min dan max di sini belum ada
		$param1 = $this->tabel8_v_input10_filter1_get;
		$param2 = $this->tabel8_v_input10_filter2_get;
		$param3 = $this->tabel8_v_input11_filter1_get;
		$param4 = $this->tabel8_v_input11_filter2_get;

		$data1 = array(
			$this->v_part1 => $this->tabel8_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel8_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel8' =>  $this->tl8->ambildata()->result(),
			'tabel5' =>  $this->tl5->ambildata()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			$this->tabel8_v_input10_filter1 => $param1,
			$this->tabel8_v_input10_filter2 => $param2,
			$this->tabel8_v_input11_filter1 => $param3,
			$this->tabel8_v_input11_filter2 => $param4
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$param4 = $this->tabel8_v_input4_post;
		$param8 = $this->tabel8_v_input8_post;

		$param10 = $this->tabel8_v_input10_post; //cek in
		$param11 = $this->tabel8_v_input11_post; //cek out

		// di bawah ini adalah fungsi untuk memesan kamar hotel
		$startTimeStamp = strtotime($param10);
		$endTimeStamp = strtotime($param11);

		$timedif = $endTimeStamp - $startTimeStamp;
		$numberdays = $timedif / 60 / 60 / 24; // 86400 seconds in one day

		$where = $this->tabel8_v_input7_post;
		$tabel6 = $this->tl6->ambil_harga($where)->result();

		// rumus harga total pesanan (bisa dijadikan sebuah fungsi jika menggunakan rumus yang kompleks)
		$harga_total = ($numberdays * $tabel6[0]->harga);

		//mengecek apakah ada pesanan yang telah dilakukan -->
		//Di bawah ini adalah fitur yang ditetapkan sebagai unfinished, yakni fitur untuk mengelola array dari jumlah pesanan yang telah dilakukan. -->
		//Dengan fitur ini, tamu dapat memesan lebih dari satu kamar  -->
		//dan mendapatkan pesanan yang terpisah masing-masing -->
		//Sebenarnya lebih baik jika menggunakan tabel pesanan dan tabel detail pesanan -->
		//Namun hal itu hanya akan mempersulit masalah yang sudah ada -->
		//Fitur ini akan diselesaikan ketika sudah ada pemahaman mengenai cara kerja array -->

		// if (isset($this->tabel8_v_input1_post) and is_array($this->tabel8_v_input1_post)) {
		// 	foreach($this->tabel8_v_input1_post as $tp) {

		// 	}
		// }

		// $da = array(
		// 	for($i = 0; $i < $this->tabel8_v_input8_post; $i++) {
		// 		array(
		// 			$this->tabel8_field1 => $this->tabel8_v_input1_alt,
		// 			$this->tabel8_field2 => $this->tabel8_v_input2_post,
		// 			$this->tabel8_field3 => $this->tabel8_v_input3_post,
		// 		$this->tabel8_field4 => $param4,
		// 		$this->tabel8_field5 => $this->tabel8_v_input5_post,
		// 		$this->tabel8_field6 => $this->tabel8_v_input6_post,
		// 		$this->tabel8_field7 => $this->tabel8_v_input7_post,
		// 		$this->tabel8_field8 => $param8,
		// 		$this->tabel8_field9 => $harga_total,
		// 		$this->tabel8_field10 => $this->tabel8_v_input10_post,
		// 		$this->tabel8_field11 => $this->tabel8_v_input11_post,



		// 		// status akan kuubah menjadi pending karena resepsionis wajib memilihkan kamar untuk user
		// 		$this->tabel8_field12 => $this->tabel8_field12_value1,
		// 		// 'status' => "belum bayar"
		// 	} 	
		// 	);

		$data = array(
			$this->tabel8_field1 => $this->tabel8_v_input1_alt,
			$this->tabel8_field2 => $this->tabel8_v_input2_post,
			$this->tabel8_field3 => $this->tabel8_v_input3_post,
			$this->tabel8_field4 => $param4,
			$this->tabel8_field5 => $this->tabel8_v_input5_post,
			$this->tabel8_field6 => $this->tabel8_v_input6_post,
			$this->tabel8_field7 => $this->tabel8_v_input7_post,
			$this->tabel8_field8 => $param8,
			$this->tabel8_field9 => $harga_total,
			$this->tabel8_field10 => $this->tabel8_v_input10_post,
			$this->tabel8_field11 => $this->tabel8_v_input11_post,

			// status akan kuubah menjadi pending karena resepsionis wajib memilihkan kamar untuk user
			$this->tabel8_field12 => $this->tabel8_field12_value1,
			// 'status' => "belum bayar"
		);

		// membuat session supaya nilainya dapat digunakan selama waktu yang ditentukan dalam detik
		$this->session->set_tempdata($this->tabel9_tempdata3, $param4, 300);

		$simpan = $this->tl8->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel8_c9));
	}

	public function update()
	{
		// this function is not really reccessary since only status that can be changed
	}


	public function hapus($id_pesanan = null)
	{
		$this->declare();
		$where = $this->tabel8_v_input1_post;
		$status = $this->tabel8_v_input12_post;

		$hapus = $this->tl8->hapus($id_pesanan);

		// memasukkan nama resepsionis yang melakukan operasi
		$data = array(
			$this->tabel2_field14 => $this->session->userdata($this->tabel9_userdata2)
		);

		// mengupdate history dengan nama user yang aktif
		$update_history = $this->tl2->update_history($data, $where);

		if ($hapus && $update_history) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel8_c1));
	}


	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel8_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel8' =>  $this->tl8->ambildata()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel8_v3, $data);
	}


	public function daftar($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		$data1 = array(
			$this->v_part1 => $this->v11_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v11,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel8' =>  $this->tl8->ambil_id_user($where)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),
			'tabel5' =>  $this->tl5->ambildata()->result(),

		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	// Di bawah ini adalah fitur yang ingin kutambahkan ketika ingin memasukkan fitur filter di halaman daftar
	// Jika user menggunakan tombol cari untuk mencari pesanan, namun pada views masih menggunakan v_reservasi, 
	// maka fitur ini dibutuhkan untuk membedakan user mana yang sedang mencari daftar pesanan/history/transaksi 
	// atau hanya membuka halaman saja
	// Namun fitur di bawah tidak akan berguna jika halaman yang digunakan untuk menampilkan hasil cari berbeda dan
	// bukan v_reservasi
	// if (!$this->session->userdata('id_pesanan')) {}
	// 	} else {  -->
	// 	 }  -->

	public function cari($tabel7_field1 = 1)
	{
		$this->declare();
		$param1 = $this->tabel8_v_input1_get;
		$param4 = $this->tabel8_v_input4_get;

		$data1 = array(
			$this->v_part1 => $this->tabel8_v1_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v11,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),

			// mencari dan menampilkan id pesanan berdasarkan id_pesanan yang telah diinput
			'tabel8' =>  $this->tl8->cari($param1, $param4)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}


	// bagian update status untuk sementara kubiarkan tidak menggunakan variabel untuk sementara waktu
	// hal ini ditujukan untuk keperluan penelitian penggunaan array
	public function update_status()
	{
		$where = $this->input->post('id_pesanan');
		$data = array(
			'status' => $this->input->post('status')
		);

		// jika status pesanan cek in
		if ($this->input->post('status') == 'cek in') {

			// hanya merubah status pesanan
			$update = $this->tl8->update($data, $where);

			// jika status pesanan cek out
		} elseif ($this->input->post('status') == 'cek out') {

			// menghapus data pesanan supaya trigger tambah_kamar dapat berjalan
			$hapus = $this->tl8->hapus($where);

			// memasukkan nama resepsionis yang melakukan operasi
			$data = array(
				'user_aktif' => $this->session->userdata('nama')
			);

			// mengupdate pesanan dengan nama user yang aktif
			$update = $this->tl2->update_history($data, $where);
		}

		if ($update) {

			$this->session->set_flashdata('pesan', 'Status pesanan berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Status pesanan gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('pesanan'));
	}

	public function konfirmasi($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->tempdata($this->tabel9_tempdata3);
		$data1 = array(
			$this->v_part1 => $this->v1_title1,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tabel8' =>  $this->tl8->ambil_email($where)->last_row(),
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v1, $data);
	}


	public function print($id_pesanan = null, $tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->v4_title1,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel8' =>  $this->tl8->ambil($id_pesanan)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v4, $data);
	}

	public function filter($tabel7_field1 = 1)
	{
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel8_v_input10_filter1_get;
		$param2 = $this->tabel8_v_input10_filter2_get;
		$param3 = $this->tabel8_v_input11_filter1_get;
		$param4 = $this->tabel8_v_input11_filter2_get;

		$data1 = array(
			$this->v_part1 => $this->tabel8_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel8_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel8' =>  $this->tl8->filter($param1, $param2, $param3, $param4)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->tabel8_v_input10_filter1 => $param1,
			$this->tabel8_v_input10_filter2 => $param2,
			$this->tabel8_v_input11_filter1 => $param3,
			$this->tabel8_v_input11_filter2 => $param4
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}


	public function filter_tamu($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel8_v_input10_filter1_get;
		$param2 = $this->tabel8_v_input10_filter2_get;
		$param3 = $this->tabel8_v_input11_filter1_get;
		$param4 = $this->tabel8_v_input11_filter2_get;

		$data1 = array(
			$this->v_part1 => $this->v13_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v13,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel8' =>  $this->tl8->filter_tamu($param1, $param2, $param3, $param4, $where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->tabel8_v_input10_filter1 => $param1,
			$this->tabel8_v_input10_filter2 => $param2,
			$this->tabel8_v_input11_filter1 => $param3,
			$this->tabel8_v_input11_filter2 => $param4
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	// Ini adalah fitur untuk membooking kamar berdasarkan pesanan oleh resepsionis
	// Pada fitur ini, saya akan mencoba menggunakan gabungan dari jumlah kamar dan tipe kamar, 
	// Oleh karena itu bakal ada 2 fungsi yang menggunakan parameter ini yakni, book dan ubah status. 
	// Semoga besok bisa kelar karena ini merupakan fitur yang paling rumit di antara yang lain
	public function book($tabel7_field1 = 1)
	{
		$this->declare();
		// hanya merubah status pesanan berdasarkan id pesanan
		$where = $this->tabel8_v_input1_post;
		$data = array(
			$this->tabel8_field12 => $this->tabel8_field12_value2,
			$this->tabel8_field13 => $this->tabel8_v_input13_post

		);

		$update = $this->tl8->update($data, $where);

		// hanya merubah id pesanan di tabel kamar berdasarkan no kamar
		$param = $this->tabel8_v_input13_post;
		$no_kamar = array(
			$this->tabel5_field3 => $this->tabel8_v_input1_post,
			$this->tabel5_field4 => $this->tabel5_field4_value2,
		);
		$update_kamar = $this->tl5->update($no_kamar, $param);


		if ($update_kamar) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel8_c1));
	}
}
