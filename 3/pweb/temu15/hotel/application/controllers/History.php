<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';


class History extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel2_m = 'htr';

	// deklarasi variabel views
	private $tabel2_v1;
	private $tabel2_v1_title;
	private $tabel2_v2;
	private $tabel2_v2_title;
	private $tabel2_v3;
	private $tabel2_v3_title;

	// deklarasi variabel controller
	private $tabel2_c1;
	private $tabel2_c2;
	private $tabel2_c3;
	private $tabel2_c4;
	private $tabel2_c5;
	private $tabel2_c6;
	private $tabel2_c7;
	private $tabel2_c8;
	private $tabel2_c9;
	private $tabel2_c10;
	private $tabel2_c11;
	private $tabel2_c12;
	private $tabel2_v_input1;
	private $tabel2_v_input1_alt;
	private $tabel2_v_input2;
	private $tabel2_v_input3;
	private $tabel2_v_input4;
	private $tabel2_v_input5;
	private $tabel2_v_input6;
	private $tabel2_v_input7;
	private $tabel2_v_input8;
	private $tabel2_v_input9;
	private $tabel2_v_input10;
	private $tabel2_v_input11;
	private $tabel2_v_input12;
	private $tabel2_v_flashdata1_msg_1;
	private $tabel2_v_flashdata1_msg_2;
	private $tabel2_v_flashdata1_msg_3;
	private $tabel2_v_flashdata1_msg_4;
	private $tabel2_v_flashdata1_msg_5;
	private $tabel2_v_flashdata1_msg_6;
	public function

	declare()
	{

		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel2_m = 'htr';

		// deklarasi variabel views

		$this->tabel2_v1 = 'v_' . $this->tabel2;
		$this->tabel2_v1_title = 'Daftar ' . $this->tabel2;
		$this->tabel2_v2 = 'v_admin-' . $this->tabel2;
		$this->tabel2_v2_title = 'Data ' . $this->tabel2;
		$this->tabel2_v3 = '_laporan/laporan_' . $this->tabel2;
		$this->tabel2_v3_title = 'Laporan ' . $this->tabel2;

		// deklarasi variabel controller
		$this->tabel2_c1 = $this->tabel2;
		$this->tabel2_c2 = $this->tabel2 . '/tambah';
		$this->tabel2_c3 = $this->tabel2 . '/update';
		$this->tabel2_c4 = $this->tabel2 . '/hapus';
		$this->tabel2_c5 = $this->tabel2 . '/laporan';



		// tabel bagian input
		$this->tabel2_v_input1 = $this->tabel2_field1;
		$this->tabel2_v_input1_alt = '';
		$this->tabel2_v_input2 = $this->tabel2_field2;
		$this->tabel2_v_input3 = $this->tabel2_field3;
		$this->tabel2_v_input4 = $this->tabel2_field4;
		$this->tabel2_v_input5 = $this->tabel2_field5;
		$this->tabel2_v_input6 = $this->tabel2_field6;
		$this->tabel2_v_input7 = $this->tabel2_field7;
		$this->tabel2_v_input8 = $this->tabel2_field8;
		$this->tabel2_v_input9 = $this->tabel2_field9;
		$this->tabel2_v_input10 = $this->tabel2_field10;
		// ini adalah filter
		$this->tabel2_v_input10_value1 = $tabel2_v_input10 . '_min';
		$this->tabel2_v_input10_value2 = $tabel2_v_input10 . '_max';
		$this->tabel2_v_input11 = $this->tabel2_field11;
		//ini adalah filter
		$this->tabel2_v_input11_value1 = $tabel2_v_input11 . '_min';
		$this->tabel2_v_input11_value2 = $tabel2_v_input11 . '_max';
		$this->tabel2_v_input12 = $this->tabel2_field12;
		$this->tabel2_v_input13 = $this->tabel2_field13;

		// deklarasi variabel bagian v_flashdata
		$this->tabel2_v_flashdata1_msg_1 = $this->tabel2 . ' berhasil disimpan!';
		$this->tabel2_v_flashdata1_msg_2 = $this->tabel2 . ' gagal disimpan!';
		$this->tabel2_v_flashdata1_msg_3 = 'Status ' . $this->tabel2 . ' gagal diubah!';
		$this->tabel2_v_flashdata1_msg_4 = 'Status ' . $this->tabel2 . ' gagal diubah!';
		$this->tabel2_v_flashdata1_msg_5 = $this->tabel2 . ' gagal dihapus!';
		$this->tabel2_v_flashdata1_msg_6 = $this->tabel2 . ' gagal dihapus!';
	}




	public function index($id = 1)
	{
		// nilai min dan max di sini belum ada
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_admin-history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}

	public function daftar($id = 1)
	{
		$where = $this->session->userdata('id_user');

		// nilai min dan max di sini belum ada
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'History Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->ambil_id_user($where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}

	public function filter_cek_in($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_admin-history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->filter_cek_in($cek_in_min, $cek_in_max)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}
	public function filter_cek_out($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_admin-history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->filter_cek_out($cek_out_min, $cek_out_max)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}

	public function filter_cek_in_tamu($id = 1)
	{
		$where = $this->session->userdata('id_user');
		// nilai min dan max sudah diinput sebelumnya
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->filter_cek_in_tamu($cek_in_min, $cek_in_max, $where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}
	public function filter_cek_out_tamu($id = 1)
	{
		$where = $this->session->userdata('id_user');
		// nilai min dan max sudah diinput sebelumnya
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->filter_cek_out_tamu($cek_out_min, $cek_out_max, $where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}

	public function hapus($id_history = null)
	{
		$hapus = $this->htr->hapus($id_history);
		redirect(site_url('history'));
	}

	public function laporan($id = 1)
	{
		$data = array(
			'title' => 'Laporan History',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->ambildata()->result()
		);

		$this->load->view('_laporan/laporan_history', $data);
	}
}
