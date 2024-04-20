<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Bisnis extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel6_m = 'tl6';

	// deklarasi variabel views
	private $tabel6_v1;
	private $tabel6_v1_title;
	private $tabel6_v2;
	private $tabel6_v2_title;
	private $tabel6_v3;
	private $tabel6_v3_title;

	// deklarasi variabel controller
	private $tabel6_c1;
	private $tabel6_c2;
	private $tabel6_c3;
	private $tabel6_c4;
	private $tabel6_c5;
	private $tabel6_v_input1_post;
	private $tabel6_v_input1_alt;
	private $tabel6_v_input2;
	private $tabel6_v_input2_post;
	private $tabel6_v_input3_post;
	private $tabel6_v_input4_post;
	private $tabel6_v_input5_post;
	private $tabel6_v_input6_post;
	private $tabel6_v_input7_post;


	private $tabel6_v_flashdata1_msg_1;
	private $tabel6_v_flashdata1_msg_2;
	private $tabel6_v_flashdata1_msg_3;
	private $tabel6_v_flashdata1_msg_4;
	private $tabel6_v_flashdata1_msg_5;
	private $tabel6_v_flashdata1_msg_6;
	private $tabel6_v_flashdata3_msg_1;
	private $tabel6_v_flashdata4_msg_1;
	public function

	declare()
	{
		$this->declarew();

		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel6_m = 'tl6';

		// deklarasi variabel views
		$this->tabel6_v1 = 'v_' . $this->aliases['tabel6'];
		$this->tabel6_v1_title = 'Daftar ' . $this->aliases['tabel6_alias'];
		$this->tabel6_v2 = 'v_admin-' . $this->aliases['tabel6'];
		$this->tabel6_v2_title = 'Data ' . $this->aliases['tabel6_alias'];
		$this->tabel6_v3 = '_laporan/laporan_' . $this->aliases['tabel6'];
		$this->tabel6_v3_title = 'Laporan ' . $this->aliases['tabel6_alias'];

		// deklarasi variabel controller
		$this->tabel6_c1 = $this->aliases['tabel6'];
		$this->tabel6_c2 = $this->aliases['tabel6'] . '/tambah';
		$this->tabel6_c3 = $this->aliases['tabel6'] . '/update';
		$this->tabel6_c4 = $this->aliases['tabel6'] . '/hapus';
		$this->tabel6_c5 = $this->aliases['tabel6'] . '/laporan';


		// tabel bagian input
		$this->tabel6_v_input1_post = $this->input->post($this->aliases['tabel6_field1']);
		$this->tabel6_v_input1_alt = '';
		$this->tabel6_v_input2_post = $this->input->post($this->aliases['tabel6_field2']);
		$this->tabel6_v_input3_post = $this->input->post($this->aliases['tabel6_field3']);
		$this->tabel6_v_input4_post = $this->input->post($this->aliases['tabel6_field4']);
		$this->tabel6_v_input5_post = $this->input->post($this->aliases['tabel6_field5']);
		$this->tabel6_v_input6_post = $this->input->post($this->aliases['tabel6_field6']);
		$this->tabel6_v_input7_post = $this->input->post($this->aliases['tabel6_field7']);

		// deklarasi variabel bagian v_flashdata
		$this->tabel6_v_flashdata1_msg_1 = 'Data ' . $this->aliases['tabel6_alias'] . ' berhasil disimpan!';
		$this->tabel6_v_flashdata1_msg_2 = 'Data ' . $this->aliases['tabel6_alias'] . ' gagal disimpan!';
		$this->tabel6_v_flashdata1_msg_3 = 'Data ' . $this->aliases['tabel6_alias'] . ' berhasil diubah!';
		$this->tabel6_v_flashdata1_msg_4 = 'Data ' . $this->aliases['tabel6_alias'] . ' gagal diubah!';
		$this->tabel6_v_flashdata1_msg_5 = 'Data ' . $this->aliases['tabel6_alias'] . ' berhasil dihapus!';
		$this->tabel6_v_flashdata1_msg_6 = 'Data ' . $this->aliases['tabel6_alias'] . ' gagal dihapus!';
	}



	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel6_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel6_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$data = array(
			$this->aliases['tabel6_field1'] => $this->tabel6_v_input1_alt,
			$this->aliases['tabel6_field2'] => $this->tabel6_v_input2_post,
			$this->aliases['tabel6_field3'] => $this->tabel6_v_input3_post,
			$this->aliases['tabel6_field4'] => $this->tabel6_v_input4_post,
			$this->aliases['tabel6_field5'] => $this->tabel6_v_input5_post,
			$this->aliases['tabel6_field6'] => $this->tabel6_v_input6_post,
			$this->aliases['tabel6_field7'] => $this->tabel6_v_input7_post,
		);

		// $query = 'INSERT INTO bisnis VALUES('.$data.')';

		$simpan = $this->tl6->simpan($data);
		// $simpan = $this->tl6->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel6_c1));
	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declare();
		$where = $this->tabel6_v_input1_post;
		$data = array(
			$this->aliases['tabel6_field2'] => $this->tabel6_v_input2_post,
			$this->aliases['tabel6_field3'] => $this->tabel6_v_input3_post,
			$this->aliases['tabel6_field4'] => $this->tabel6_v_input4_post,
			$this->aliases['tabel6_field5'] => $this->tabel6_v_input5_post,
			$this->aliases['tabel6_field6'] => $this->tabel6_v_input6_post,
			$this->aliases['tabel6_field7'] => $this->tabel6_v_input7_post,
		);

		$update = $this->tl6->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel6_c1));
	}

	public function hapus($tabel6_field1 = null)
	{
		$this->declare();
		$hapus = $this->tl6->hapus($tabel6_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel6_c1));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel6_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			// 'tbl6' => $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel6_v3, $data);
	}
}
