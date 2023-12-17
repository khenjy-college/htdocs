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
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel10_m = 'trs';

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


	public function

	declare()
	{

		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel10_m = 'trs';

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
		$this->tabel10_v_flashdata1_msg_1 = $this->tabel10_alias . ' berhasil disimpan!';
		$this->tabel10_v_flashdata1_msg_2 = $this->tabel10_alias . ' gagal disimpan!';
		$this->tabel10_v_flashdata1_msg_3 = 'Data ' . $this->tabel10_alias . ' berhasil diubah!';
		$this->tabel10_v_flashdata1_msg_4 = 'Data ' . $this->tabel10_alias . ' gagal diubah!';
		$this->tabel10_v_flashdata1_msg_5 = $this->tabel10_alias . ' berhasil dihapus!';
		$this->tabel10_v_flashdata1_msg_6 = $this->tabel10_alias . ' gagal dihapus!';


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
	}



	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		// $param1 = $this->tabel10_v_input7_filter1_get;
		// $param2 = $this->tabel10_v_input7_filter2_get;

		$data = array(
			'title' => $this->tabel10_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel10_v2,
			$this->v_part4 => $this->v_part4_msg1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel10 => $this->trs->join_pesanan()->result(),
			$this->tabel6 => $this->tpk->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tgl_transaksi_min' => $param1,
			// 'tgl_transaksi_max' => $param2,
		);

		$this->load->view($this->v7, $data);
	}

	// Fungsi di bawah ini sebaiknya menggunakan fungsi join untuk menampilkan data yang sesuai kebutuhan yang telah ditentukan
	public function history($tabel7_field1 = 1)
	{
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		// $param1 = $this->tabel10_v_input7_filter1_get;
		// $param2 = $this->tabel10_v_input7_filter2_get;

		$data = array(
			'title' => $this->tabel10_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel10_v2_alt,
			$this->v_part4 => $this->v_part4_msg1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel10 => $this->trs->join_history()->result(),
			$this->tabel6 => $this->tpk->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tgl_transaksi_min' => $param1,
			// 'tgl_transaksi_max' => $param2,
		);

		$this->load->view($this->v7, $data);
	}


	public function tambah()
	{
		$this->declare();
		$email = $this->input->post('email');
		$bayar = $this->input->post('bayar');

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tgl = date("Y-m-d") . " " . date("h:m:s", time());

		// $kembalian = $this->psn->get('harga_total') - $bayar;

		$data = array(
			'id_transaksi' => '',
			'id_user' => $this->session->userdata($this->tabel9_userdata1),
			'email' => $email,
			'id_pesanan' => $this->input->post('id_pesanan'),
			'metode' => $this->input->post('metode'),
			'bayar' => $bayar,
			'tgl_transaksi' => $tgl,
		);

		$this->session->set_tempdata('email_transaksi', $email, 300);

		// Session kembalian_transaksi sebenarnya digunakan ketika menggunakan cash, namun fungsi ini akan tetap disimpan untuk pengembangan lebih lanjut
		// $this->session->set_tempdata('kembalian_transaksi', $kembalian, 300);


		// $query = 'INSERT INTO transaksi VALUES('.$data.')';

		$simpan = $this->trs->simpan($data);
		// $simpan = $this->trs->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel10_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		// fitur mengubah status ini seharusnya berada di bagian pesanan cman saya belum bisa menemukan algoritma yang pas jadi akan disimpan untuk pengembangan di kemudian hari
		$where = $this->input->post('id_pesanan');
		$status = array(
			'status' => $this->input->post('status'),
		);

		if ($this->input->post('status') == 'menunggu') {

			// hanya merubah status pesanan
			$update = $this->psn->update($status, $where);

			if ($update) {
				$this->session->set_flashdata($this->v_flashdata1, 'Selamat! Anda sudah bisa mengunjungi HotelHebat!');
				$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
			} else {
				$this->session->set_flashdata($this->v_flashdata1, 'Anda belum bisa mengunjungi HotelHebat!');
				$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
			}
		} else {
			$this->session->set_flashdata($this->v_flashdata1, 'Transaksi tidak valid!');
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url('transaksi/konfirmasi'));
	}


	public function update()
	{
		$this->declare();
		$where = $this->input->post('id_transaksi');

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tgl = date("Y-m-d") . " " . date("h:m:s", time());

		$data = array(
			'metode' => $this->input->post('metode'),
			'bayar' => $this->input->post('bayar'),
			'tgl_transaksi' => $tgl,
		);

		$update = $this->trs->update($data, $where);

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
		$transaksi = $this->trs->ambil($id_transaksi)->result();
		$hapus = $this->trs->hapus($id_transaksi);

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
		$data = array(
			'title' => $this->tabel10_v3_title,
			'head' => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel10 => $this->trs->ambildata()->result(),
			$this->tabel6 => $this->tpk->ambildata()->result(),
			$this->tabel8 => $this->psn->ambildata()->result()
		);

		$this->load->view($this->tabel10_v3, $data);
	}

	public function daftar($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		$data = array(
			'title' => $this->tabel10_v1_title,
			'head' => $this->head,
			'konten' => $this->tabel10_v1,
			$this->v_part4 => $this->v_part4_msg1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel10 => $this->trs->join_pesanan_tamu($where)->result(),
			$this->tabel6 => $this->tpk->ambildata()->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function daftar_history($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		$data = array(
			'title' => $this->tabel10_v1_alt_title,
			'head' => $this->head,
			'konten' => $this->tabel10_v1_alt,
			$this->v_part4 => $this->v_part4_msg1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel10 => $this->trs->join_history_tamu($where)->result(),
			$this->tabel6 => $this->tpk->ambildata()->result()
		);

		$this->load->view($this->v7, $data);
	}

	// Fitur filter untuk saat ini akan tidak digunakan terlebih dahulu
	public function filter($tabel7_field1 = 1)
	{
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel10_v_input7_filter1_get;
		$param2 = $this->tabel10_v_input7_filter2_get;

		$data = array(
			'title' => $this->tabel10_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel10_v2,
			$this->v_part4 => $this->v_part4_msg1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel10 => $this->trs->join_pesanan($where)->result(),
			$this->tabel10 => $this->trs->filter($param1, $param2)->result(),
			$this->tabel8 => $this->psn->ambildata()->result(),
			$this->tabel6 => $this->tpk->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tgl_transaksi_min' => $param1,
			'tgl_transaksi_max' => $param2,
		);

		$this->load->view($this->v7, $data);
	}


	public function konfirmasi($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->tempdata('email_transaksi');
		$data = array(
			'title' => 'Transaksi Berhasil',
			'head' => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			$this->tabel10 => $this->trs->ambil_email($where)->last_row(),
		);

		$this->load->view('konfirmasi', $data);
	}


	// Fitur receipt menurutku tidak memerlukan fitur join sama sekali 
	// karena sudah menggunakan parameter yang memilki nilai
	public function receipt($id_transaksi = null, $tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			'title' => 'Bukti Transaksi',
			'head' => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel10 => $this->trs->ambil($id_transaksi)->result(),
			$this->tabel6 => $this->tpk->ambildata()->result()
		);


		// Di bawah ini adalah kode untuk memisahkan antara transaksi yang id pesanannya masih berada di tabel pesanann
		// Dan transaksi yang id pesanananya sudah berada di tabel history

		$param1 = $this->trs->ambil($id_transaksi)->result();
		$param2 = $param1[0]->id_pesanan;

		$method = $this->htr->ambil_id_pesanan($param2);

		if ($method->num_rows() > 0) {
			$data2 = array(
				$this->tabel2 => $this->htr->ambildata()->result(),
			);
			$data = array_merge($data1, $data2);
			$this->load->view('receipt_history', $data);
		} else {
			$data2 = array(
				$this->tabel8 => $this->psn->ambildata()->result(),
			);
			$data = array_merge($data1, $data2);
			$this->load->view('receipt', $data);
		}
	}
}
