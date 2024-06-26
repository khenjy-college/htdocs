<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Welcome.php';

class Faskamar extends Welcome
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}

	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel1_m = 'fsk';

	// deklarasi variabel views
	private $tabel1_v1;
	private $tabel1_v1_title;
	private $tabel1_v2;
	private $tabel1_v2_title;
	private $tabel1_v3;
	private $tabel1_v3_title;

	// deklarasi variabel controller
	private $tabel1_c1;
	private $tabel1_c2;
	private $tabel1_c3;
	private $tabel1_c4;
	private $tabel1_c5;
	private $tabel1_v_input1_post;
	private $tabel1_v_input1_alt;
	private $tabel1_v_input2_post;
	private $tabel1_v_input3_post;
	private $tabel1_v_input4;
	private $tabel1_v_input4_upload_path;
	private $tabel1_v_input4_post;
	private $tabel1_v_input4_upload;
	private $tabel1_v_input4_alt;
	private $tabel1_v_flashdata1_msg_1;
	private $tabel1_v_flashdata1_msg_2;
	private $tabel1_v_flashdata1_msg_3;
	private $tabel1_v_flashdata1_msg_4;
	private $tabel1_v_flashdata1_msg_5;
	private $tabel1_v_flashdata1_msg_6;

	public function

	declare()
	{
		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel1_m = 'fsk';

		// deklarasi variabel views
		// $this->tabel_v1 = 'v_' . 	site_url('tabel1'); 
		// seperti di atas bentuknya jika ingin mengambil variabel di luar controller

		$this->tabel1_v1 = 'v_' . $this->tabel1;
		$this->tabel1_v1_title = 'Daftar ' . $this->tabel1_alias;
		$this->tabel1_v2 = 'v_admin-' . $this->tabel1;
		$this->tabel1_v2_title = 'Data ' . $this->tabel1_alias;
		$this->tabel1_v3 = '_laporan/laporan_' . $this->tabel1;
		$this->tabel1_v3_title = 'Laporan ' . $this->tabel1_alias;

		// deklarasi variabel controller
		$this->tabel1_c1 = $this->tabel1;
		$this->tabel1_c2 = $this->tabel1 . '/tambah';
		$this->tabel1_c3 = $this->tabel1 . '/update';
		$this->tabel1_c4 = $this->tabel1 . '/hapus';
		$this->tabel1_c5 = $this->tabel1 . '/laporan';


		//deklarasi variabel bagian input
		$this->tabel1_v_input1_post = $this->input->post($this->tabel1_field1);
		$this->tabel1_v_input1_alt = '';
		$this->tabel1_v_input2_post = $this->input->post($this->tabel1_field2);
		$this->tabel1_v_input3_post = $this->input->post($this->tabel1_field3);
		$this->tabel1_v_input4 = $this->tabel1_field4;
		$this->tabel1_v_input4_upload_path = './assets/' . $this->tabel1_field4 . '/' . $this->tabel1 . '/';
		$this->tabel1_v_input4_upload = $this->upload->do_upload($this->tabel1_v_input4);
		$this->tabel1_v_input4_post = $this->input->post($this->tabel1_v_input4);
		$this->tabel1_v_input4_alt = $this->input->post('txt' . $this->tabel1_v_input4);

		// deklarasi variabel bagian v_flashdata
		$this->tabel1_v_flashdata1_msg_1 = $this->tabel1 . ' berhasil disimpan!';
		$this->tabel1_v_flashdata1_msg_2 = $this->tabel1 . ' gagal disimpan!';
		$this->tabel1_v_flashdata1_msg_3 = 'Status ' . $this->tabel1 . ' berhasil diubah!';
		$this->tabel1_v_flashdata1_msg_4 = 'Status ' . $this->tabel1 . ' gagal diubah!';
		$this->tabel1_v_flashdata1_msg_5 = $this->tabel1 . ' berhasil dihapus!';
		$this->tabel1_v_flashdata1_msg_6 = $this->tabel1 . ' gagal dihapus!';
	}



	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			$this->v_part1 => $this->tabel1_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel1_v2,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel1 => $this->fsk->ambildata()->result(),
			$this->tabel6 => $this->tpk->ambildata()->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel1_v_input4_upload_path;
		$config['allowed_types'] = $this->file_type1;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->tabel1_v_input4_upload) {
			$gambar  = '';
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->tabel1_field1 => '',
			$this->tabel1_field2 => $this->tabel1_v_input2_post,
			$this->tabel1_field3 => $this->tabel1_v_input3_post,
			$this->tabel1_field4 => $gambar,
		);

		$simpan = $this->fsk->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel1_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel1_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		// redirect(site_url($this->tabel1_c1));
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel1_v_input4_upload_path;
		$config['allowed_types'] = $this->file_type1;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->tabel1_v_input4_upload) {
			$gambar = $this->tabel1_v_input4_alt;
		} else {
			$table = $this->fsk->ambil($this->tabel1_v_input1_post)->result();
			$img = $table[0]->img;
			unlink($this->tabel1_v_input4_upload_path . $img);

			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$where = $this->tabel1_v_input1_post;
		$data = array(
			$this->tabel1_field2 => $this->tabel1_v_input2_post,
			$this->tabel1_field3 => $this->tabel1_v_input3_post,
			$this->tabel1_field4 => $gambar,
		);

		$update = $this->fsk->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel1_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel1_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		// redirect(site_url($this->tabel1_c1));
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($id_faskamar = null)
	{
		$this->declare();
		$faskamar = $this->fsk->ambil($id_faskamar)->result();
		$img = $faskamar[0]->img;

		unlink($this->tabel1_v_input4_upload_path . $img);
		$hapus = $this->fsk->hapus($id_faskamar);

		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel1_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel1_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel1_c1));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			$this->v_part1 => $this->tabel1_v3_title,
			$this->v_part2 => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel1 => $this->fsk->ambildata()->result()
		);

		$this->load->view($this->tabel1_v3, $data);
	}
}
