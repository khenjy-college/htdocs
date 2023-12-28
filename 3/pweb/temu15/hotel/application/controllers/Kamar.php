<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Kamar extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel5_m = 'tl5';

	// deklarasi variabel views
	private $tabel5_v1;
	private $tabel5_v1_title;
	private $tabel5_v2;
	private $tabel5_v2_title;
	private $tabel5_v3;
	private $tabel5_v3_title;

	// deklarasi variabel controller
	private $tabel5_c1;
	private $tabel5_c2;
	private $tabel5_c3;
	private $tabel5_c4;
	private $tabel5_c5;
	private $tabel5_v_input1_post;
	private $tabel5_v_input1_alt;
	private $tabel5_v_input2_post;
	private $tabel5_v_input3_post;
	private $tabel5_v_input4_post;
	private $tabel5_v_input5_post;
	private $tabel5_v_flashdata1_msg_1;
	private $tabel5_v_flashdata1_msg_2;
	private $tabel5_v_flashdata1_msg_3;
	private $tabel5_v_flashdata1_msg_4;
	private $tabel5_v_flashdata1_msg_5;
	private $tabel5_v_flashdata1_msg_6;

	private $tabel5_v_flashdata3_msg_1;
	private $tabel5_v_flashdata4_msg_1;
	public function

	declare()
	{
		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel5_m = 'tl5';

		// deklarasi variabel views
		$this->tabel5_v1 = 'v_' . $this->tabel5;
		$this->tabel5_v1_title = 'Daftar ' . $this->tabel5_alias;
		$this->tabel5_v2 = 'v_admin-' . $this->tabel5;
		$this->tabel5_v2_title = 'Data ' . $this->tabel5_alias;
		$this->tabel5_v3 = '_laporan/laporan_' . $this->tabel5;
		$this->tabel5_v3_title = 'Laporan ' . $this->tabel5_alias;

		// deklarasi variabel controller
		$this->tabel5_c1 = $this->tabel5;
		$this->tabel5_c2 = $this->tabel5 . '/tambah';
		$this->tabel5_c3 = $this->tabel5 . '/update';
		$this->tabel5_c4 = $this->tabel5 . '/hapus';
		$this->tabel5_c5 = $this->tabel5 . '/laporan';


		// tabel bagian input
		$this->tabel5_v_input1_post = $this->input->post($this->tabel5_field1);
		$this->tabel5_v_input1_alt = '';
		$this->tabel5_v_input2_post = $this->input->post($this->tabel5_field2);
		$this->tabel5_v_input3_post = $this->input->post($this->tabel5_field3);
		$this->tabel5_v_input4_post = $this->input->post($this->tabel5_field4);
		$this->tabel5_v_input5_post = $this->input->post($this->tabel5_field5);

		// deklarasi variabel bagian v_flashdata
		$this->tabel5_v_flashdata1_msg_1 = 'Data ' . $this->tabel5_alias . ' berhasil disimpan!';
		$this->tabel5_v_flashdata1_msg_2 = 'Data ' . $this->tabel5_alias . ' gagal disimpan!';
		$this->tabel5_v_flashdata1_msg_3 = 'Data ' . $this->tabel5_alias . ' berhasil diubah!';
		$this->tabel5_v_flashdata1_msg_4 = 'Data ' . $this->tabel5_alias . ' gagal diubah!';
		$this->tabel5_v_flashdata1_msg_5 = 'Data ' . $this->tabel5_alias . ' berhasil dihapus!';
		$this->tabel5_v_flashdata1_msg_6 = 'Data ' . $this->tabel5_alias . ' gagal dihapus!';

		// deklarasi variabel menampilkan pesan modal
		$this->tabel5_v_flashdata3_msg_1 =  $this->tabel5_field4_alias . ' ' . $this->tabel5_alias . ' tidak bisa diupload';
		$this->tabel5_v_flashdata4_msg_1 = $this->tabel5_field4_alias . ' ' . $this->tabel5_alias . ' tidak bisa diupload';
	}


	public function index($tabel7_field1 = 1)
	{
		$this->declare();

		$data1 = array(
			$this->v_part1 => $this->tabel5_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel5_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel5' =>  $this->tl5->ambildata()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),
			'tabel4' =>  $this->tl4->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$data = array(
			$this->tabel5_field1 => $this->tabel5_v_input1_alt,
			$this->tabel5_field2 => $this->tabel5_v_input2_post,
			// $this->tabel5_field3 => NULL,
			$this->tabel5_field4 => $this->tabel5_v_input4_post,
			$this->tabel5_field5 => $this->tabel5_v_input5_post
		);

		$simpan = $this->tl5->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel5_c1));
	}

	public function update()
	{
		$this->declare();
		$where = $this->tabel5_v_input1_post;
		$data = array(
			$this->tabel5_field2 => $this->tabel5_v_input2_post,
			$this->tabel5_field4 => $this->tabel5_v_input4_post,
			$this->tabel5_field5 => $this->tabel5_v_input5_post,
		);

		$update = $this->tl5->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel5_c1));
	}

	public function hapus($no_kamar = null)
	{
		$this->declare();
		$hapus = $this->tl5->hapus($no_kamar);

		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel5_c1));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel5_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel5' =>  $this->tl5->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel5_v3, $data);
	}
}
