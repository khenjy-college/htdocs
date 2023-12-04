<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';
class Pesanan extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel8_m = 'psn';

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
	private $tabel8_v_input1_post;
	private $tabel8_v_input1_alt;
	private $tabel8_v_input1_get;
	private $tabel8_v_input2_post;
	private $tabel8_v_input3_post;
	private $tabel8_v_input3_get;
	private $tabel8_v_input4_post;
	private $tabel8_v_input5_post;
	private $tabel8_v_input6_post;
	private $tabel8_v_input7_post;
	private $tabel8_v_input8_post;
	private $tabel8_v_input9_post;
	private $tabel8_v_input10_post;
	private $tabel8_v_input10_filter1;
	private $tabel8_v_input10_filter1_get;
	private $tabel8_v_input10_filter2;
	private $tabel8_v_input10_filter2_get;
	private $tabel8_v_input11_post;
	private $tabel8_v_input11_filter1;
	private $tabel8_v_input11_filter1_get;
	private $tabel8_v_input11_filter2;
	private $tabel8_v_input11_filter2_get;
	private $tabel8_v_input12_post;
	private $tabel8_v_flashdata1_msg_1;
	private $tabel8_v_flashdata1_msg_2;
	private $tabel8_v_flashdata1_msg_3;
	private $tabel8_v_flashdata1_msg_4;
	private $tabel8_v_flashdata1_msg_5;
	private $tabel8_v_flashdata1_msg_6;
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
		$this->tabel8_m = 'psn';

		// deklarasi variabel views
		$this->tabel8_v1 = 'v-' . $this->tabel8;
		$this->tabel8_v1_title = 'Daftar ' . $this->tabel8;
		$this->tabel8_v2 = 'v_admin-' . $this->tabel8;
		$this->tabel8_v2_title = 'Data ' . $this->tabel8;
		$this->tabel8_v3 = '_laporan/laporan_' . $this->tabel8;
		$this->tabel8_v3_title = 'Laporan ' . $this->tabel8;

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
		$this->tabel8_c11 = $this->tabel8 . '/filter_cek_in';
		$this->tabel8_c12 = $this->tabel8 . '/filter_cek_out';
		$this->tabel8_c13 = $this->tabel8 . '/filter_cek_in_tamu';
		$this->tabel8_c14 = $this->tabel8 . '/filter_cek_out_tamu';
		$this->tabel8_c15 = $this->tabel8 . '/book';


		// tabel bagian input
		$this->tabel8_v_input1_post = $this->input->post($this->tabel8_field1);
		$this->tabel8_v_input1_get = $this->input->get($this->tabel8_field1);
		$this->tabel8_v_input1_alt = '';
		$this->tabel8_v_input2_post = $this->input->post($this->tabel8_field2);
		$this->tabel8_v_input3_post = $this->input->post($this->tabel8_field3);
		$this->tabel8_v_input3_get = $this->input->get($this->tabel8_field3);
		$this->tabel8_v_input4_post = $this->input->post($this->tabel8_field4);
		$this->tabel8_v_input5_post = $this->input->post($this->tabel8_field5);
		$this->tabel8_v_input6_post = $this->input->post($this->tabel8_field6);
		$this->tabel8_v_input7_post = $this->input->post($this->tabel8_field7);
		$this->tabel8_v_input8_post = $this->input->post($this->tabel8_field8);
		$this->tabel8_v_input9_post = $this->input->post($this->tabel8_field9);
		$this->tabel8_v_input10_post = $this->input->post($this->tabel8_field10);
		$this->tabel8_v_input10_filter1 = $this->tabel8_field10 . '_min';
		$this->tabel8_v_input10_filter1_get = $this->input->get($this->tabel8_field10 . '_min');
		$this->tabel8_v_input10_filter2 = $this->tabel8_field10 . '_max';
		$this->tabel8_v_input10_filter2_get = $this->input->get($this->tabel8_field10 . '_max');
		$this->tabel8_v_input11_post = $this->input->post($this->tabel8_field11);
		$this->tabel8_v_input11_filter1 = $this->tabel8_field11 . '_min';
		$this->tabel8_v_input11_filter1_get = $this->input->get($this->tabel8_field11 . '_min');
		$this->tabel8_v_input11_filter2 = $this->tabel8_field11 . '_max';
		$this->tabel8_v_input11_filter2_get = $this->input->get($this->tabel8_field11 . '_max');
		$this->tabel8_v_input12_post = $this->input->post($this->tabel8_field12);


		// deklarasi variabel bagian v_flashdata
		$this->tabel8_v_flashdata1_msg_1 = $this->tabel8 . ' berhasil disimpan!';
		$this->tabel8_v_flashdata1_msg_2 = $this->tabel8 . ' gagal disimpan!';
		$this->tabel8_v_flashdata1_msg_3 = 'Status ' . $this->tabel8 . ' gagal diubah!';
		$this->tabel8_v_flashdata1_msg_4 = 'Status ' . $this->tabel8 . ' gagal diubah!';
		$this->tabel8_v_flashdata1_msg_5 = $this->tabel8 . ' gagal dihapus!';
		$this->tabel8_v_flashdata1_msg_6 = $this->tabel8 . ' gagal dihapus!';


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

		// nilai min dan max di sini belum ada
		$param1 = $this->tabel8_v_input10_filter1_get;
		$param2 = $this->tabel8_v_input10_filter2_get;
		$param3 = $this->tabel8_v_input11_filter1_get;
		$param4 = $this->tabel8_v_input11_filter2_get;

		$data = array(
			'title' => $this->tabel8_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel8_v2,
			$this->v7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel8 => $this->psn->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			$this->tabel8_v_input10_filter1 => $param1,
			$this->tabel8_v_input10_filter2 => $param2,
			$this->tabel8_v_input11_filter1 => $param3,
			$this->tabel8_v_input11_filter2 => $param4,
		);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$param4 = $this->tabel8_v_input4_post;
		$param8 = $this->tabel8_v_input8_post;

		$where = $this->tabel8_v_input8_post;
		$tipe_kamar = $this->tpk->ambil_harga($where)->result();

		// rumus harga total pesanan (bisa dijadikan sebuah fungsi jika menggunakan rumus yang kompleks)
		foreach ($tipe_kamar as $tp) :
			$harga_total = ($param8 * $tp->harga);
		endforeach;

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
			$this->tabel8_field11 => $this->tabel8_v_input10_post,

			// status akan kuubah menjadi pending karena resepsionis wajib memilihkan kamar untuk user
			$this->tabel8_field12 => $this->tabel8_field12_value1,
			// 'status' => "belum bayar"
		);

		// membuat session supaya nilainya dapat digunakan selama waktu yang ditentukan dalam detik
		$this->session->set_tempdata($this->tabel9_tempdata3, $param4, 300);

		$simpan = $this->psn->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel8_c1));
	}

	public function update()
	{
		// this function is not really reccessary since only status that can be changed
	}


	public function hapus($id_pesanan = null)
	{
		$this->declare();
		$hapus = $this->psn->hapus($id_pesanan);

		if ($hapus) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->site_url1));
	}


	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => $this->title4,
			'head' => $this->head,
			$this->v7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel8 => $this->psn->ambildata()->result()
		);

		$this->load->view($this->page4, $data);
	}


	public function daftar($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		$data = array(
			'title' => $this->v11_title,
			'head' => $this->head,
			'konten' => 'v_reservasi',
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel8 => $this->psn->ambil_id_user($where)->result()
		);

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
		$param3 = $this->tabel8_v_input3_post;

		$data = array(
			'title' => $this->tabel8_v1_title,
			'head' => $this->head,
			'konten' => $this->v11,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),

			// mencari dan menampilkan id pesanan berdasarkan id_pesanan yang telah diinput
			$this->tabel8 => $this->psn->cari($param1, $param3)->result()

		);
		$this->session->set_userdata($this->tabel8_userdata1, $param1);

		$this->load->view($this->v7, $data);
	}


	public function update_status()
	{
		$this->declare();
		$where = $this->tabel8_v_input1_post;
		$data = array(
			$this->tabel8_field12 => $this->tabel8_v_input12_post
		);

		// jika status pesanan cek in
		if ($this->tabel8_v_input12_post == $this->tabel8_field12_value4) {

			// hanya merubah status pesanan
			$update = $this->psn->update($data, $where);

			// jika status pesanan cek out
		} elseif ($this->tabel8_v_input12_post == $this->tabel8_field12_value5) {

			// menghapus data pesanan supaya trigger tambah_kamar dapat berjalan
			$hapus = $this->psn->hapus($where);

			// memasukkan nama resepsionis yang melakukan operasi
			$data = array(
				$this->tabel2_field13 => $this->session->userdata($this->tabel9_userdata1)
			);

			// mengupdate history dengan nama user yang aktif
			$update = $this->htr->update_history($data, $where);
		}

		if ($update) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel8_v1));
	}

	public function konfirmasi($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->tempdata($this->tempdata1);
		$data = array(
			'title' => $this->title2,
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			$this->tabel8 => $this->psn->ambil_email($where)->last_row(),
		);

		$this->load->view($this->v1, $data);
	}


	public function print($id_pesanan = null, $tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => $this->title3,
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel8 => $this->psn->ambil($id_pesanan)->result()
		);

		$this->load->view($this->v4, $data);
	}

	public function filter_cek_in($tabel7_field1 = 1)
	{
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel8_v_input10_filter1_get;
		$param2 = $this->tabel8_v_input10_filter2_get;
		$param3 = $this->tabel8_v_input11_filter1_get;
		$param4 = $this->tabel8_v_input11_filter2_get;

		$data = array(
			'title' => $this->tabel8_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel8_v2,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel8 => $this->psn->filter_cek_in($param1, $param2)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->tabel8_v_input10_filter1 => $param1,
			$this->tabel8_v_input10_filter2 => $param2,
			$this->tabel8_v_input11_filter1 => $param3,
			$this->tabel8_v_input11_filter2 => $param4,
		);

		$this->load->view($this->v7, $data);
	}
	public function filter_cek_out($tabel7_field1 = 1)
	{
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel8_v_input10_filter1_get;
		$param2 = $this->tabel8_v_input10_filter2_get;
		$param3 = $this->tabel8_v_input11_filter1_get;
		$param4 = $this->tabel8_v_input11_filter2_get;

		$data = array(
			'title' => $this->tabel8_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel8_v2,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel8 => $this->psn->filter_cek_out($param3, $param4)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->tabel8_v_input10_filter1 => $param1,
			$this->tabel8_v_input10_filter2 => $param2,
			$this->tabel8_v_input11_filter1 => $param3,
			$this->tabel8_v_input11_filter2 => $param4,
		);

		$this->load->view($this->v7, $data);
	}

	public function filter_cek_in_tamu($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel8_v_input10_filter1_get;
		$param2 = $this->tabel8_v_input10_filter2_get;
		$param3 = $this->tabel8_v_input11_filter1_get;
		$param4 = $this->tabel8_v_input11_filter2_get;

		$data = array(
			'title' => $this->v11_title,
			'head' => $this->head,
			'konten' => 'v_history',
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel8 => $this->psn->filter_cek_in_tamu($param1, $param2, $where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->tabel8_v_input10_filter1 => $param1,
			$this->tabel8_v_input10_filter2 => $param2,
			$this->tabel8_v_input11_filter1 => $param3,
			$this->tabel8_v_input11_filter2 => $param4,
		);

		$this->load->view($this->v7, $data);
	}
	public function filter_cek_out_tamu($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel8_v_input10_filter1_get;
		$param2 = $this->tabel8_v_input10_filter2_get;
		$param3 = $this->tabel8_v_input11_filter1_get;
		$param4 = $this->tabel8_v_input11_filter2_get;

		$data = array(
			'title' => $this->v11_title,
			'head' => $this->head,
			'konten' => 'v_history',
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel8 => $this->psn->filter_cek_out_tamu($param3, $param4, $where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->tabel8_v_input10_filter1 => $param1,
			$this->tabel8_v_input10_filter2 => $param2,
			$this->tabel8_v_input11_filter1 => $param3,
			$this->tabel8_v_input11_filter2 => $param4,
		);

		$this->load->view($this->v7, $data);
	}

	// Ini adalah fitur untuk membooking kamar berdasarkan pesanan oleh resepsionis
	// Pada fitur ini, saya akan mencoba menggunakan gabungan dari jumlah kamar dan tipe kamar, 
	// Oleh karena itu bakal ada 2 fungsi yang menggunakan parameter ini yakni, book dan ubah status. 
	// Semoga besok bisa kelar karena ini merupakan fitur yang paling rumit di antara yang lain
	public function book($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->tabel8_v_input8_post;
		// $kamar = $this->psn->ambildata
		// for($i = 0; $i <)
	}
}
