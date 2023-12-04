<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';


class Petugas extends Welcome
{
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
	private $tabel4_c6;
	private $tabel4_c7;
	private $tabel4_c8;
	private $tabel4_c9;
	private $tabel4_c10;
	private $tabel4_c11;
	private $tabel4_c12;
	private $tabel4_v_input1;
	private $tabel4_v_input1_alt;
	private $tabel4_v_input2;
	private $tabel4_v_input3;
	private $tabel4_v_input4;
	private $tabel4_v_input5;
	private $tabel4_v_input5_upload_path;
	private $tabel4_v_input5_alt;
	private $tabel4_v_input6;
	private $tabel4_v_input7;
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

		$this->tabel4_v1 = 'v-' . $this->tabel4;
		$this->tabel4_v1_title = 'Daftar ' . $this->tabel4;
		$this->tabel4_v2 = 'v_admin-' . $this->tabel4;
		$this->tabel4_v2_title = 'Data ' . $this->tabel4;
		$this->tabel4_v3 = '_laporan/laporan_' . $this->tabel4;
		$this->tabel4_v3_title = 'Laporan ' . $this->tabel4;

		// deklarasi variabel controller
		$this->tabel4_c1 = $this->tabel4;
		$this->tabel4_c2 = $this->tabel4 . '/tambah';
		$this->tabel4_c3 = $this->tabel4 . '/update';
		$this->tabel4_c4 = $this->tabel4 . '/hapus';
		$this->tabel4_c5 = $this->tabel4 . '/laporan';


		// tabel bagian input
		$this->tabel4_v_input1 = $this->tabel4_field1;
		$this->tabel4_v_input1_alt = '';
		$this->tabel4_v_input2 = $this->tabel4_field2;
		$this->tabel4_v_input3 = $this->tabel4_field3;
		$this->tabel4_v_input4 = $this->tabel4_field4;
		$this->tabel4_v_input5 = $this->tabel4_field5;
		$this->tabel4_v_input5_upload_path = './assets/' . $this->tabel4_v_input5 . '/' . $this->tabel4 . '/';
		$this->tabel4_v_input5_alt = 'txt' . $this->tabel4_v_input5;

		$this->tabel4_v_input6 = $this->tabel4_field6;
		$this->tabel4_v_input7 = $this->tabel4_field7;

		// deklarasi variabel bagian v_flashdata
		$this->tabel4_v_flashdata1_msg_1 = $this->tabel4 . ' berhasil disimpan!';
		$this->tabel4_v_flashdata1_msg_2 = $this->tabel4 . ' gagal disimpan!';
		$this->tabel4_v_flashdata1_msg_3 = 'Status ' . $this->tabel4 . ' gagal diubah!';
		$this->tabel4_v_flashdata1_msg_4 = 'Status ' . $this->tabel4 . ' gagal diubah!';
		$this->tabel4_v_flashdata1_msg_5 = $this->tabel4 . ' gagal dihapus!';
		$this->tabel4_v_flashdata1_msg_6 = $this->tabel4 . ' gagal dihapus!';
	}




	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Data Petugas',
			'head' => $this->head,
			'konten' => 'v_admin-petugas',
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			'petugas' => $this->pts->ambildata()->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel4_v_input5_upload_path;
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'id_petugas' => '',
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

			$this->session->set_flashdata($this->v_flashdata1, 'Petugas berhasil ditambah!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, 'Petugas gagal ditambah!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url('petugas'));
	}

	public function update()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel4_v_input5_upload_path;
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post('txtimg');
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

			$this->session->set_flashdata($this->v_flashdata1, 'Petugas berhasil diubah!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, 'Petugas gagal diubah!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url('petugas'));
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

			$this->session->set_flashdata($this->v_flashdata1, 'Petugas berhasil dihapus!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, 'Petugas gagal dihapus!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}


		redirect(site_url('petugas'));
	}
	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Laporan Petugas',
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			'petugas' => $this->pts->ambildata()->result()
		);

		$this->load->view('_laporan/laporan_petugas', $data);
	}
}
