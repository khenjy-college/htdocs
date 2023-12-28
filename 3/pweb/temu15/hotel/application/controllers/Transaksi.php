<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

// Jujurly masih banyak bagian di controller ini yang masih menggunakan variabel biasa dan bukan menggunakan declare
// Aku juga ingin membuat sebuah fitur history transaksi dimana pesanan yang sudah masuk history bakal masuk ke sana


// Saat ini ketika data yang ada di tabel transaksi dan history, data-data yang berada di tabel transaksi bakal hilang
// Hal ini merupakan hal yang sedang aku coba teliti kepentingannya
// Aku perlu meneliti lebih jauh, ini adalah kedua pilihan yang kumiliki :
// 1. Menambahkan fitur untuk melihat data transksi saja, lalu diberi opsi apakah user ingin melihat data pesanan
// atau data history yang terhubung dengan data transaksi, jika perlu maka akan dicek data pesanan atau history tersebut.
// Jika data ada, maka akan ditampilkan, jika tidak akan muncul notifikasi data tidak ada
// 2. Opsi kedua adalah untuk membiarkannya tidak menampilkan data 

class Transaksi extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel10_m = 'tl10';

	// deklarasi variabel views
	private $tabel10_v1;
	private $tabel10_v1_alt;
	private $tabel10_v1_title;
	private $tabel10_v1_alt_title;
	private $tabel10_v2;
	private $tabel10_v2_alt;
	private $tabel10_v2_title;
	private $tabel10_v2_alt_title;
	private $tabel10_v3;
	// aku rasa $tabel10_v3_alt dan $tabel10_v3_title tidak dibutuhkan 
	// karena fungsi receipt sudah bisa memilah
	// mana yang menggunakan tabel pesanan dan mana yang menggunakan tabel history 
	private $tabel10_v3_alt;
	private $tabel10_v3_title;
	private $tabel10_v3_alt_title;

	// deklarasi variabel controller
	private $tabel10_c1;
	private $tabel10_c2;
	private $tabel10_c3;
	private $tabel10_c4;
	private $tabel10_c5;
	private $tabel10_c6;
	private $tabel10_c7;
	private $tabel10_c8;
	private $tabel10_c9;
	private $tabel10_c10;
	private $tabel10_c11;
	private $tabel10_c12;
	private $tabel10_v_input1_post;
	private $tabel10_v_input1_alt;
	private $tabel10_v_input2_post;
	private $tabel10_v_input3_post;
	private $tabel10_v_input4_post;
	private $tabel10_v_input5_post;
	private $tabel10_v_input6_post;
	private $tabel10_v_input7_post;
	private $tabel10_v_input7_filter1;
	private $tabel10_v_input7_filter1_get;
	private $tabel10_v_input7_filter2;
	private $tabel10_v_input7_filter2_get;
	private $tabel10_v_flashdata1_msg_1;
	private $tabel10_v_flashdata1_msg_2;
	private $tabel10_v_flashdata1_msg_3;
	private $tabel10_v_flashdata1_msg_4;
	private $tabel10_v_flashdata1_msg_5;
	private $tabel10_v_flashdata1_msg_6;
	private $tabel10_v_flashdata1_msg_7;
	private $tabel10_v_flashdata1_msg_8;
	private $tabel10_v_flashdata1_msg_9;


	// deklarasi session tabel9
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

	private $tabel10_v_flashdata3_msg_1;
	private $tabel10_v_flashdata4_msg_1;

	private $tabel8_input12_post;

	private $tabel10_tempdata3;


	public function

	declare()
	{

		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel10_m = 'tl10';

		// deklara		$this->tabeli variabel views
		$this->tabel10_v1 = 'v_' . $this->tabel10;
		$this->tabel10_v1_alt = 'v_' . $this->tabel10 . '_' . $this->tabel2;
		$this->tabel10_v1_title = 'Daftar ' . $this->tabel10_alias . " Aktif";
		$this->tabel10_v1_alt_title = 'Daftar History ' .  $this->tabel10_alias;

		$this->tabel10_v2 = 'v_admin-' . $this->tabel10;
		$this->tabel10_v2_alt = 'v_admin-' . $this->tabel10 . '_' . $this->tabel2;
		$this->tabel10_v2_title = 'Data ' . $this->tabel10_alias . " Aktif";
		$this->tabel10_v2_alt_title = 'Daftar History ' .  $this->tabel10_alias;

		$this->tabel10_v3 = '_laporan/laporan_' . $this->tabel10;
		$this->tabel10_v3_title = 'Laporan ' . $this->tabel10_alias;
		$this->tabel10_v3_alt_title = 'Daftar ' . $this->tabel10_alias;

		// deklarasi variabel controller
		$this->tabel10_c1 = $this->tabel10;
		$this->tabel10_c2 = $this->tabel10 . '/tambah';
		$this->tabel10_c3 = $this->tabel10 . '/update';
		$this->tabel10_c4 = $this->tabel10 . '/hapus';
		$this->tabel10_c5 = $this->tabel10 . '/laporan';
		$this->tabel10_c6 = $this->tabel10 . '/daftar';
		$this->tabel10_c7 = $this->tabel10 . '/daftar_history';
		$this->tabel10_c8 = $this->tabel10 . '/filter';
		$this->tabel10_c9 = $this->tabel10 . '/konfirmasi';
		$this->tabel10_c10 = $this->tabel10 . '/receipt';


		// tabel bagian input
		$this->tabel10_v_input1_post = $this->input->post($this->tabel10_field1);
		$this->tabel10_v_input1_alt = '';
		$this->tabel10_v_input2_post = $this->input->post($this->tabel10_field2);
		$this->tabel10_v_input3_post = $this->input->post($this->tabel10_field3);
		$this->tabel10_v_input4_post = $this->input->post($this->tabel10_field4);
		$this->tabel10_v_input5_post = $this->input->post($this->tabel10_field5);
		$this->tabel10_v_input6_post = $this->input->post($this->tabel10_field6);
		$this->tabel10_v_input7_post = $this->input->post($this->tabel10_field7);
		$this->tabel10_v_input7_filter1 = $this->tabel10_field7 . '_min';
		$this->tabel10_v_input7_filter1_get = $this->input->get($this->tabel10_v_input7_filter1);
		$this->tabel10_v_input7_filter2 = $this->tabel10_field7 . '_max';
		$this->tabel10_v_input7_filter2_get = $this->input->get($this->tabel10_v_input7_filter2);

		// deklarasi variabel bagian v_flashdata
		$this->tabel10_v_flashdata1_msg_1 = 'Data ' . $this->tabel10_alias . ' berhasil disimpan!';
		$this->tabel10_v_flashdata1_msg_2 = 'Data ' . $this->tabel10_alias . ' gagal disimpan!';
		$this->tabel10_v_flashdata1_msg_3 = 'Data ' . $this->tabel10_alias . ' berhasil diubah!';
		$this->tabel10_v_flashdata1_msg_4 = 'Data ' . $this->tabel10_alias . ' gagal diubah!';
		$this->tabel10_v_flashdata1_msg_5 = 'Data ' . $this->tabel10_alias . ' berhasil dihapus!';
		$this->tabel10_v_flashdata1_msg_6 = 'Data ' . $this->tabel10_alias . ' gagal dihapus!';
		$this->tabel10_v_flashdata1_msg_7 = 'Selamat! Anda sudah bisa mengunjungi Hotel!';
		$this->tabel10_v_flashdata1_msg_8 = 'Anda belum bisa mengunjungi HotelHebat!';
		$this->tabel10_v_flashdata1_msg_9 = 'Transaksi tidak valid!';

		// deklarasi variabel menampilkan pesan modal
		$this->tabel10_v_flashdata3_msg_1 =  $this->tabel3_field4_alias . ' ' . $this->tabel3_alias . ' tidak bisa diupload';
		$this->tabel10_v_flashdata4_msg_1 = $this->tabel3_field4_alias . ' ' . $this->tabel3_alias . ' tidak bisa diupload';


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

		$this->tabel10_tempdata3 = $this->tabel9_field3 . '_' . $this->tabel10;
		$this->tabel8_input12_post = $this->input->post($this->tabel8_field12);
	}



	public function index($tabel7_field1 = 1)
	{
		$this->declarew();
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		// $param1 = $this->tabel10_v_input7_filter1_get;
		// $param2 = $this->tabel10_v_input7_filter2_get;

		$data1 = array(
			$this->v_part1 => $this->tabel10_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel10_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel10' =>  $this->tl10->join_pesanan()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tgl_transaksi_min' => $param1,
			// 'tgl_transaksi_max' => $param2,
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);


		$this->session->set_flashdata($this->v_flashdata1, $this->v_flashdata1_msg1);
		$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);

		$this->load->view($this->v7, $data);
	}

	// Fungsi di bawah ini sebaiknya menggunakan fungsi join untuk menampilkan data yang sesuai kebutuhan yang telah ditentukan
	public function history($tabel7_field1 = 1)
	{
		$this->declarew();
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		// $param1 = $this->tabel10_v_input7_filter1_get;
		// $param2 = $this->tabel10_v_input7_filter2_get;

		$data1 = array(
			$this->v_part1 => $this->tabel10_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel10_v2_alt,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel10' =>  $this->tl10->join_history()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tgl_transaksi_min' => $param1,
			// 'tgl_transaksi_max' => $param2,
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}


	public function tambah()
	{
		$this->declarew();
		$this->declare();
		$email = $this->tabel10_v_input3_post;
		$bayar = $this->tabel10_v_input6_post;

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tgl = date("Y-m-d") . " " . date("h:m:s", time());

		// $kembalian = $this->tl8->get('harga_total') - $bayar;

		$data = array(
			$this->tabel10_field1 => $this->tabel10_v_input1_alt,
			$this->tabel10_field2 => $this->session->userdata($this->tabel9_userdata1),
			$this->tabel10_field3 => $email,
			$this->tabel10_field4 => $this->tabel10_v_input4_post,
			$this->tabel10_field5 => $this->tabel10_v_input5_post,
			$this->tabel10_field6 => $bayar,
			$this->tabel10_field7 => $tgl,
		);

		$this->session->set_tempdata($this->tabel10_tempdata3, $email, 300);

		// Session kembalian_transaksi sebenarnya digunakan ketika menggunakan cash, namun fungsi ini akan tetap disimpan untuk pengembangan lebih lanjut
		// $this->session->set_tempdata('kembalian_transaksi', $kembalian, 300);


		// $query = 'INSERT INTO transaksi VALUES('.$data.')';

		$simpan = $this->tl10->simpan($data);
		// $simpan = $this->tl10->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		// fitur mengubah status ini seharusnya berada di bagian pesanan cman saya belum bisa menemukan algoritma yang pas jadi akan disimpan untuk pengembangan di kemudian hari
		$where = $this->tabel10_v_input4_post;
		$status = array(
			$this->tabel8_field12 => $this->tabel8_input12_post,
		);

		if ($this->tabel8_input12_post === $this->tabel8_field12_value3) {

			// hanya merubah status pesanan
			$update = $this->tl8->update($status, $where);

			if ($update) {
				$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_7);
				$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
			} else {
				$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_8);
				$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
			}
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_9);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel10_c9));
	}


	public function update()
	{
		$this->declare();
		$where = $this->tabel10_v_input1_post;

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tgl = date("Y-m-d") . " " . date("h:m:s", time());

		$data = array(
			$this->tabel10_field5 => $this->tabel10_v_input5_post,
			$this->tabel10_field6 => $this->tabel10_v_input6_post,
			$this->tabel10_field7 => $tgl,
		);

		$update = $this->tl10->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel10));
	}

	public function hapus($id_transaksi = null)
	{
		$this->declare();
		$tabel10 = $this->tl10->ambil($id_transaksi)->result();
		$hapus = $this->tl10->hapus($id_transaksi);

		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel10));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel10_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel10' =>  $this->tl10->ambildata()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),
			'tabel8' =>  $this->tl8->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel10_v3, $data);
	}

	public function daftar($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		$data1 = array(
			$this->v_part1 => $this->tabel10_v1_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel10_v1,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel10' =>  $this->tl10->join_pesanan_tamu($where)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function daftar_history($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		$data1 = array(
			$this->v_part1 => $this->tabel10_v1_alt_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel10_v1_alt,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel10' =>  $this->tl10->join_history_tamu($where)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	// Fitur filter untuk saat ini akan tidak digunakan terlebih dahulu
	public function filter($tabel7_field1 = 1)
	{
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel10_v_input7_filter1_get;
		$param2 = $this->tabel10_v_input7_filter2_get;

		$data1 = array(
			$this->v_part1 => $this->tabel10_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel10_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel10' =>  $this->tl10->join_pesanan($where)->result(),
			'tabel10' =>  $this->tl10->filter($param1, $param2)->result(),
			'tabel8' =>  $this->tl8->ambildata()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			$this->tabel10_v_input7_filter1 => $param1,
			$this->tabel10_v_input7_filter2 => $param2,
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}


	public function konfirmasi($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->tempdata($this->tabel10_tempdata3);
		$data1 = array(
			$this->v_part1 => $this->v1_title2,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tabel10' =>  $this->tl10->ambil_email($where)->last_row(),
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v1, $data);
	}


	// Fitur receipt menurutku tidak memerlukan fitur join sama sekali 
	// karena sudah menggunakan parameter yang memilki nilai
	public function receipt($id_transaksi = null, $tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->v5_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel10' =>  $this->tl10->ambil($id_transaksi)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result()
		);


		// Di bawah ini adalah kode untuk memisahkan antara transaksi yang id pesanannya masih berada di tabel pesanann
		// Dan transaksi yang id pesanananya sudah berada di tabel history

		$param1 = $this->tl10->ambil($id_transaksi)->result();
		$param2 = $param1[0]->id_pesanan;

		$method = $this->tl2->ambil_id_pesanan($param2);

		$this->declarew();

		if ($method->num_rows() > 0) {
			$data2 = array(
				'tabel2' => $this->tl2->ambildata()->result(),
			);
			$data = array_merge($data1, $data2, $this->aliases);
			$this->load->view($this->v12, $data);
		} else {
			$data2 = array(
				'tabel8' =>  $this->tl8->ambildata()->result(),
			);
			$data = array_merge($data1, $data2, $this->aliases);
			$this->load->view($this->v5, $data);
		}
	}
}
