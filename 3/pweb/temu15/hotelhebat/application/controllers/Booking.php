<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';


class Booking extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel12_m = 'bkg';

	// deklarasi variabel views
	private $tabel12_v1;
	private $tabel12_v1_title;
	private $tabel12_v2;
	private $tabel12_v2_title;
	private $tabel12_v3;
	private $tabel12_v3_title;

	// deklarasi variabel controller
	private $tabel12_c1;
	private $tabel12_c2;
	private $tabel12_c3;
	private $tabel12_c4;
	private $tabel12_c5;
	private $tabel12_c6;
	private $tabel12_c7;
	private $tabel12_c8;
	private $tabel12_c9;
	private $tabel12_c10;
	private $tabel12_c11;
	private $tabel12_c12;
	private $tabel12_v_input1_post;
	private $tabel12_v_input1_alt;
	private $tabel12_v_input2_post;
	private $tabel12_v_input3_post;
	private $tabel12_v_input4_post;
	private $tabel12_v_input5_post;
	private $tabel12_v_input5_filter1;
	private $tabel12_v_input5_filter1_get;
	private $tabel12_v_input5_filter2;
	private $tabel12_v_input5_filter2_get;
	private $tabel12_v_flashdata1_msg_1;
	private $tabel12_v_flashdata1_msg_2;
	private $tabel12_v_flashdata1_msg_3;
	private $tabel12_v_flashdata1_msg_4;
	private $tabel12_v_flashdata1_msg_5;
	private $tabel12_v_flashdata1_msg_6;


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
		$this->tabel12_m = 'trs';

		// deklara		$this->tabeli variabel views
		$this->tabel12_v1 = 'v_' . $this->tabel12;
		$this->tabel12_v1_title = 'Daftar ' . $this->tabel12;
		$this->tabel12_v2 = 'v_admin-' . $this->tabel12;
		$this->tabel12_v2_title = 'Data ' . $this->tabel12;
		$this->tabel12_v3 = '_laporan/laporan_' . $this->tabel12;
		$this->tabel12_v3_title = 'Laporan ' . $this->tabel12;

		// deklarasi variabel controller
		$this->tabel12_c1 = $this->tabel12;
		$this->tabel12_c2 = $this->tabel12 . '/tambah';
		$this->tabel12_c3 = $this->tabel12 . '/update';
		$this->tabel12_c4 = $this->tabel12 . '/hapus';
		$this->tabel12_c5 = $this->tabel12 . '/laporan';


		// tabel bagian input
		$this->tabel12_v_input1_post = $this->input->post($this->tabel12_field1);
		$this->tabel12_v_input1_alt = '';
		$this->tabel12_v_input2_post = $this->input->post($this->tabel12_field2);
		$this->tabel12_v_input3_post = $this->input->post($this->tabel12_field3);
		$this->tabel12_v_input4_post = $this->input->post($this->tabel12_field4);
		$this->tabel12_v_input5_post = $this->input->post($this->tabel12_field5);
		$this->tabel12_v_input5_filter1 = $this->input->post($this->tabel12_field5 . '_min');
		$this->tabel12_v_input5_filter1_get = $this->tabel12_field5 . '_min';
		$this->tabel12_v_input5_filter2 = $this->input->post($this->tabel12_field5 . '_max');
		$this->tabel12_v_input5_filter2_get = $this->tabel12_field5 . '_max';

		// deklarasi variabel bagian v_flashdata
		$this->tabel12_v_flashdata1_msg_1 = $this->tabel12 . ' berhasil disimpan!';
		$this->tabel12_v_flashdata1_msg_2 = $this->tabel12 . ' gagal disimpan!';
		$this->tabel12_v_flashdata1_msg_3 = 'Status ' . $this->tabel12 . ' gagal diubah!';
		$this->tabel12_v_flashdata1_msg_4 = 'Status ' . $this->tabel12 . ' gagal diubah!';
		$this->tabel12_v_flashdata1_msg_5 = $this->tabel12 . ' gagal dihapus!';
		$this->tabel12_v_flashdata1_msg_6 = $this->tabel12 . ' gagal dihapus!';


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
		$param1 = $this->tabel12_v_input5_filter1_get;
		$param2 = $this->tabel12_v_input5_filter2_get;

		$data = array(
			'title' => $this->tabel12_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel12_v2,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel12 => $this->trs->ambildata()->result(),
			$this->tabel8 => $this->psn->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			$this->tabel12_v_input5_filter1 => $param1,
			$this->tabel12_v_input5_filter2 => $param2,
		);

		$this->load->view($this->v7, $data);
	}

	public function daftar($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		$data = array(
			'title' => $this->tabel12_v1_title,
			'head' => $this->head,
			'konten' => $this->tabel12_v1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel12 => $this->trs->ambil_id_user($where)->result(),
			$this->tabel8 => $this->psn->ambildata()->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function filter($tabel7_field1 = 1)
	{
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel12_v_input5_filter1_get;
		$param2 = $this->tabel12_v_input5_filter2_get;

		$data = array(
			'title' => $this->tabel12_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel12_v2,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel12 => $this->trs->filter($param1, $param2)->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			$this->tabel12_v_input5_filter1 => $param1,
			$this->tabel12_v_input5_filter2 => $param2,
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
			'id_booking' => '',
			'id_user' => $this->session->userdata($this->tabel9_userdata1),
			'email' => $email,
			'id_pesanan' => $this->input->post('id_pesanan'),
			'metode' => $this->input->post('metode'),
			'bayar' => $bayar,
			'tgl_booking' => $tgl,
		);

		$this->session->set_tempdata('email_booking', $email, 300);

		// Session kembalian_booking sebenarnya digunakan ketika menggunakan cash, namun fungsi ini akan tetap disimpan untuk pengembangan lebih lanjut
		// $this->session->set_tempdata('kembalian_booking', $kembalian, 300);


		// $query = 'INSERT INTO booking VALUES('.$data.')';

		$simpan = $this->trs->simpan($data);
		// $simpan = $this->trs->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel12_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel12_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
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
				$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
			} else {
				$this->session->set_flashdata($this->v_flashdata1, 'Anda belum bisa mengunjungi HotelHebat!');
				$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
			}
		} else {
			$this->session->set_flashdata($this->v_flashdata1, 'Booking tidak valid!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url('booking/konfirmasi'));
	}

	public function konfirmasi($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->tempdata('email_booking');
		$data = array(
			'title' => 'Booking Berhasil',
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			$this->tabel12 => $this->trs->ambil_email($where)->last_row(),
		);

		$this->load->view('konfirmasi', $data);
	}

	public function update()
	{
		$this->declare();
		$where = $this->input->post('id_booking');

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tgl = date("Y-m-d") . " " . date("h:m:s", time());

		$data = array(
			'metode' => $this->input->post('metode'),
			'bayar' => $this->input->post('bayar'),
			'tgl_booking' => $tgl,
		);

		$update = $this->trs->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel12_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel12_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel12));
	}

	public function hapus($id_booking = null)
	{
		$this->declare();
		$booking = $this->trs->ambil($id_booking)->result();
		$hapus = $this->trs->hapus($id_booking);

		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel12_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel12_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel12));
	}

	public function receipt($id_booking = null, $tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Bukti Reservasi',
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel12 => $this->trs->ambil($id_booking)->result(),
			$this->tabel8 => $this->psn->ambildata()->result()
		);

		$this->load->view('receipt', $data);
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => $this->tabel12_v3_title,
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel12 => $this->trs->ambildata()->result()
		);

		$this->load->view($this->tabel12_v3, $data);
	}
}
