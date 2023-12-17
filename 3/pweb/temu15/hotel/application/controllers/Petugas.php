<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';


class Petugas extends Welcome
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel4_m = 'pts';

	// deklarasi variabel views
	private $tabel4_v1;
	private $tabel4_v1_title;
	private $tabel4_v2;
	private $tabel4_v2_title;
	private $tabel4_v3;
	private $tabel4_v3_title;

	// deklarasi variabel controller
	private $tabel4_c1;
	private $tabel4_c2;
	private $tabel4_c3;
	private $tabel4_c4;
	private $tabel4_c5;
	private $tabel4_v_input1_post;
	private $tabel4_v_input1_alt;
	private $tabel4_v_input2_post;
	private $tabel4_v_input3_post;
	private $tabel4_v_input4_post;
	private $tabel4_v_input5;
	private $tabel4_v_input5_upload_path;
	private $tabel4_v_input5_post;
	private $tabel4_v_input5_alt;
	private $tabel4_v_input6_post;
	private $tabel4_v_input7_post;
	private $tabel4_v_flashdata1_msg_1;
	private $tabel4_v_flashdata1_msg_2;
	private $tabel4_v_flashdata1_msg_3;
	private $tabel4_v_flashdata1_msg_4;
	private $tabel4_v_flashdata1_msg_5;
	private $tabel4_v_flashdata1_msg_6;

	// config untuk tabel

	public function

	declare()
	{



		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel4_m = 'pts';

		// deklarasi variabel views

		$this->tabel4_v1 = 'v_' . $this->tabel4;
		$this->tabel4_v1_title = 'Daftar ' . $this->tabel4_alias;
		$this->tabel4_v2 = 'v_admin-' . $this->tabel4;
		$this->tabel4_v2_title = 'Data ' . $this->tabel4_alias;
		$this->tabel4_v3 = '_laporan/laporan_' . $this->tabel4;
		$this->tabel4_v3_title = 'Laporan ' . $this->tabel4_alias;

		// deklarasi variabel controller
		$this->tabel4_c1 = $this->tabel4;
		$this->tabel4_c2 = $this->tabel4 . '/tambah';
		$this->tabel4_c3 = $this->tabel4 . '/update';
		$this->tabel4_c4 = $this->tabel4 . '/hapus';
		$this->tabel4_c5 = $this->tabel4 . '/laporan';


		// tabel bagian input
		$this->tabel4_v_input1_post = $this->input->post($this->tabel4_field1);
		$this->tabel4_v_input1_alt = '';
		$this->tabel4_v_input2_post = $this->input->post($this->tabel4_field2);
		$this->tabel4_v_input3_post = $this->input->post($this->tabel4_field3);
		$this->tabel4_v_input4_post = $this->input->post($this->tabel4_field4);
		$this->tabel4_v_input5 = $this->tabel4_field5;
		$this->tabel4_v_input5_upload_path = './assets/' . $this->tabel4_field5 . '/' . $this->tabel4 . '/';
		$this->tabel4_v_input5_post = $this->input->post($this->tabel4_v_input5);
		$this->tabel4_v_input5_alt = 'txt' . $this->tabel4_v_input5;

		$this->tabel4_v_input6_post = $this->input->post($this->tabel4_field6);
		$this->tabel4_v_input7_post = $this->input->post($this->tabel4_field7);

		// deklarasi variabel bagian v_flashdata
		$this->tabel4_v_flashdata1_msg_1 = $this->tabel4 . ' berhasil disimpan!';
		$this->tabel4_v_flashdata1_msg_2 = $this->tabel4 . ' gagal disimpan!';
		$this->tabel4_v_flashdata1_msg_3 = 'Data ' . $this->tabel4 . ' berhasil diubah!';
		$this->tabel4_v_flashdata1_msg_4 = 'Data ' . $this->tabel4 . ' gagal diubah!';
		$this->tabel4_v_flashdata1_msg_5 = $this->tabel4 . ' berhasil dihapus!';
		$this->tabel4_v_flashdata1_msg_6 = $this->tabel4 . ' gagal dihapus!';
	}




	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => $this->tabel4_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel4_v2,
			$this->v_part4 => $this->v_part4_msg1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel4 => $this->pts->ambildata()->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel4_v_input5_upload_path;
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->tabel4_v_input5)) {
			$gambar  = '';
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			'id_petugas' => $this->$tabel4_v_input1_alt,
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'hp' => $this->input->post('hp'),
			'img' => $gambar,
			'role' => $this->input->post('role'),

			// poin awal-awal adalah 0, bukan NULL
			'poin' => 0,
		);

		$simpan = $this->pts->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel4_c1));
	}

	public function update()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel4_v_input5_upload_path;
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->tabel4_v_input5)) {
			$gambar = $this->input->post($this->tabel4_v_input5_alt);
		} else {
			$table = $this->pts->ambil($this->tabel4_v_input1_post)->result();
			$img = $table[0]->img;
			unlink($this->tabel4_v_input5_upload_path . $img);

			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$where = $this->input->post('id_petugas');
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'hp' => $this->input->post('hp'),
			'img' => $gambar,
			'role' => $this->input->post('role'),

			// poin di sini saya simpan dlu, karena mungkin ada beberapa yang mau saya tambahkan ke depannya
			'poin' => $this->input->post('poin'),
		);

		$update = $this->pts->update($data, $where);

		if ($update) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel4_c1));
	}

	public function hapus($id_petugas = null)
	{
		$this->declare();
		// mengambil data gambar di database
		$petugas = $this->pts->ambil($id_petugas)->result();
		$img = $petugas[0]->img;

		// menghapus data dan gambar
		unlink($this->tabel4_v_input5_upload_path . $img);
		$hapus = $this->pts->hapus($id_petugas);


		if ($hapus) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}


		redirect(site_url($this->tabel4_c1));
	}
	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => $this->tabel4_v3_title,
			'head' => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel4 => $this->pts->ambildata()->result()
		);

		$this->load->view($this->tabel4_v3, $data);
	}
}
