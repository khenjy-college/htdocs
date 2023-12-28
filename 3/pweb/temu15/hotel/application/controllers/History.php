<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';


class History extends Welcome
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel2_m = 'tl2';

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
	private $tabel2_v_input1_post;
	private $tabel2_v_input1_alt;
	private $tabel2_v_input2_post;
	private $tabel2_v_input3_post;
	private $tabel2_v_input4_post;
	private $tabel2_v_input5_post;
	private $tabel2_v_input6_post;
	private $tabel2_v_input7_post;
	private $tabel2_v_input8_post;
	private $tabel2_v_input9_post;
	private $tabel2_v_input10_post;
	private $tabel2_v_input11;
	private $tabel2_v_input11_post;
	private $tabel2_v_input11_filter1;
	private $tabel2_v_input11_filter1_get;
	private $tabel2_v_input11_filter2;
	private $tabel2_v_input11_filter2_get;
	private $tabel2_v_input12;
	private $tabel2_v_input12_post;
	private $tabel2_v_input12_filter1;
	private $tabel2_v_input12_filter1_get;
	private $tabel2_v_input12_filter2;
	private $tabel2_v_input12_filter2_get;
	private $tabel2_v_input13_post;
	private $tabel2_v_input14_post;
	private $tabel2_v_input15_post;
	private $tabel2_v_flashdata1_msg_1;
	private $tabel2_v_flashdata1_msg_2;
	private $tabel2_v_flashdata1_msg_3;
	private $tabel2_v_flashdata1_msg_4;
	private $tabel2_v_flashdata1_msg_5;
	private $tabel2_v_flashdata1_msg_6;

	private $tabel2_v_flashdata3_msg_1;
	private $tabel2_v_flashdata4_msg_1;

	// deklrasi session
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
		$this->tabel2_m = 'tl2';

		// deklarasi variabel views

		$this->tabel2_v1 = 'v_' . $this->tabel2;
		$this->tabel2_v1_title = 'Daftar ' . $this->tabel2_alias;
		$this->tabel2_v2 = 'v_admin-' . $this->tabel2;
		$this->tabel2_v2_title = 'Data ' . $this->tabel2_alias;
		$this->tabel2_v3 = '_laporan/laporan_' . $this->tabel2;
		$this->tabel2_v3_title = 'Laporan ' . $this->tabel2_alias;

		// deklarasi variabel controller
		$this->tabel2_c1 = $this->tabel2;
		$this->tabel2_c2 = $this->tabel2 . '/tambah';
		$this->tabel2_c3 = $this->tabel2 . '/update';
		$this->tabel2_c4 = $this->tabel2 . '/hapus';
		$this->tabel2_c5 = $this->tabel2 . '/laporan';



		// tabel bagian input
		$this->tabel2_v_input1_post = $this->input->post($this->tabel2_field1);
		$this->tabel2_v_input1_alt = '';
		$this->tabel2_v_input2_post = $this->input->post($this->tabel2_field2);
		$this->tabel2_v_input3_post = $this->input->post($this->tabel2_field3);
		$this->tabel2_v_input4_post = $this->input->post($this->tabel2_field4);
		$this->tabel2_v_input5_post = $this->input->post($this->tabel2_field5);
		$this->tabel2_v_input6_post = $this->input->post($this->tabel2_field6);
		$this->tabel2_v_input7_post = $this->input->post($this->tabel2_field7);
		$this->tabel2_v_input8_post = $this->input->post($this->tabel2_field8);
		$this->tabel2_v_input9_post = $this->input->post($this->tabel2_field9);
		$this->tabel2_v_input10_post = $this->input->post($this->tabel2_field10);
		// ini adalah filter
		$this->tabel2_v_input11 = $this->tabel2_field11;
		$this->tabel2_v_input11_post = $this->input->post($this->tabel2_field11);
		$this->tabel2_v_input11_filter1 = $this->tabel2_v_input11 . '_min';
		$this->tabel2_v_input11_filter1_get = $this->input->get($this->tabel2_v_input11_filter1);
		$this->tabel2_v_input11_filter2 = $this->tabel2_v_input11 . '_max';
		$this->tabel2_v_input11_filter2_get = $this->input->get($this->tabel2_v_input11_filter2);
		//ini adalah filter
		$this->tabel2_v_input12 = $this->tabel2_field12;
		$this->tabel2_v_input12_post = $this->input->post($this->tabel2_field12);
		$this->tabel2_v_input12_filter1 = $this->tabel2_v_input12 . '_min';
		$this->tabel2_v_input12_filter1_get = $this->input->get($this->tabel2_v_input12_filter1);
		$this->tabel2_v_input12_filter2 = $this->tabel2_v_input12 . '_max';
		$this->tabel2_v_input12_filter2_get = $this->input->get($this->tabel2_v_input12_filter2);
		$this->tabel2_v_input13_post = $this->input->post($this->tabel2_field13);
		$this->tabel2_v_input14_post = $this->input->post($this->tabel2_field14);
		$this->tabel2_v_input15_post = $this->input->post($this->tabel2_field15);

		// deklarasi variabel bagian v_flashdata
		$this->tabel2_v_flashdata1_msg_1 = 'Data ' . $this->tabel2_alias . ' berhasil disimpan!';
		$this->tabel2_v_flashdata1_msg_2 = 'Data ' . $this->tabel2_alias . ' gagal disimpan!';
		$this->tabel2_v_flashdata1_msg_3 = 'Status ' . $this->tabel2_alias . ' berhasil diubah!';
		$this->tabel2_v_flashdata1_msg_4 = 'Status ' . $this->tabel2_alias . ' gagal diubah!';
		$this->tabel2_v_flashdata1_msg_5 = 'Data ' . $this->tabel2_alias . ' berhasil dihapus!';
		$this->tabel2_v_flashdata1_msg_6 = 'Data ' . $this->tabel2_alias . ' gagal dihapus!';

		// deklarasi variabel menampilkan pesan modal
		$this->tabel2_v_flashdata3_msg_1 = '';
		$this->tabel2_v_flashdata4_msg_1 = '';


		// deklarasi session
		$this->tabel9_userdata1 = $this->session->userdata($this->tabel9_field1);
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
		$param1 = $this->tabel2_v_input11_filter1_get;
		$param2 = $this->tabel2_v_input11_filter2_get;
		$param3 = $this->tabel2_v_input12_filter1_get;
		$param4 = $this->tabel2_v_input12_filter2_get;

		$data1 = array(
			$this->v_part1 => $this->tabel2_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel2_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel2' => $this->tl2->ambildata()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			$this->tabel2_v_input11_filter1 => $param1,
			$this->tabel2_v_input11_filter2 => $param2,
			$this->tabel2_v_input12_filter1 => $param3,
			$this->tabel2_v_input12_filter2 => $param4,
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function daftar($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->tabel9_userdata1;

		// nilai min dan max di sini belum ada
		$param1 = $this->tabel2_v_input11_filter1_get;
		$param2 = $this->tabel2_v_input11_filter2_get;
		$param3 = $this->tabel2_v_input12_filter1_get;
		$param4 = $this->tabel2_v_input12_filter2_get;

		$data1 = array(
			$this->v_part1 => $this->tabel2_v1_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel2_v1,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel2' => $this->tl2->ambil_id_user($where)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->tabel2_v_input11_filter1 => $param1,
			$this->tabel2_v_input11_filter2 => $param2,
			$this->tabel2_v_input12_filter1 => $param3,
			$this->tabel2_v_input12_filter2 => $param4,
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function filter($tabel7_field1 = 1)
	{
		$this->declare();
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel2_v_input11_filter1_get;
		$param2 = $this->tabel2_v_input11_filter2_get;
		$param3 = $this->tabel2_v_input12_filter1_get;
		$param4 = $this->tabel2_v_input12_filter2_get;

		$data1 = array(
			$this->v_part1 => $this->tabel2_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel2_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel2' => $this->tl2->filter($param1, $param2, $param3, $param4)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->tabel2_v_input11_filter1 => $param1,
			$this->tabel2_v_input11_filter2 => $param2,
			$this->tabel2_v_input12_filter1 => $param3,
			$this->tabel2_v_input12_filter2 => $param4,
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}


	public function filter_tamu($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->tabel9_userdata1;
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->tabel2_v_input11_filter1_get;
		$param2 = $this->tabel2_v_input11_filter2_get;
		$param3 = $this->tabel2_v_input12_filter1_get;
		$param4 = $this->tabel2_v_input12_filter2_get;

		$data1 = array(
			$this->v_part1 => $this->v11_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel2_v1,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel2' => $this->tl2->filter_tamu($param1, $param2, $param3, $param4, $where)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->tabel2_v_input11_filter1 => $param1,
			$this->tabel2_v_input11_filter2 => $param2,
			$this->tabel2_v_input12_filter1 => $param3,
			$this->tabel2_v_input12_filter2 => $param4,
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function hapus($id_history = null)
	{
		$this->declare();
		$hapus = $this->tl2->hapus($id_history);
		redirect(site_url($this->tabel2));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel2_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel2' => $this->tl2->ambildata()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel2_v3, $data);
	}
}
