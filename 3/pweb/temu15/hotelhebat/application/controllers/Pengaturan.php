<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Pengaturan extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel7_m = 'ptn';

	// deklarasi variabel views
	private $tabel7_v1;
	private $tabel7_v1_title;
	private $tabel7_v2;
	private $tabel7_v2_title;
	private $tabel7_v3;
	private $tabel7_v3_title;

	// deklarasi variabel controller
	private $tabel7_c1;
	private $tabel7_c2;
	private $tabel7_c3;
	private $tabel7_c4;
	private $tabel7_c5;
	private $tabel7_c6;
	private $tabel7_c7;
	private $tabel7_c8;
	private $tabel7_c9;
	private $tabel7_c10;
	private $tabel7_c11;
	private $tabel7_c12;
	private $tabel7_v_input1_post;
	private $tabel7_v_input1_alt;
	private $tabel7_v_input2_post;
	private $tabel7_v_input3_post;
	private $tabel7_v_input4_post;
	private $tabel7_v_input5_post;
	private $tabel7_v_input6_post;
	private $tabel7_v_input7_post;
	private $tabel7_v_input8_post;
	private $tabel7_v_input9_post;
	private $tabel7_v_input10_post;
	private $tabel7_v_input11_post;
	private $tabel7_v_input12_post;
	private $tabel7_v_flashdata1_msg_1;
	private $tabel7_v_flashdata1_msg_2;
	private $tabel7_v_flashdata1_msg_3;
	private $tabel7_v_flashdata1_msg_4;
	private $tabel7_v_flashdata1_msg_5;
	private $tabel7_v_flashdata1_msg_6;
	public function

	declare()
	{


		// deklarasi variabel mvc
		// deklarasi variabel model
		// public $this->tabel7_m = 'ptn';

		// deklarasi variabel views
		$this->tabel7_v1 = 'v_' . $this->tabel7;
		$this->tabel7_v2_title = 'Daftar ' . $this->tabel7;
		$this->tabel7_v2 = 'v_admin-' . $this->tabel7;
		$this->tabel7_v2_title = 'Data ' . $this->tabel7;
		$this->tabel7_v3 = '_laporan/laporan_' . $this->tabel7;
		$this->tabel7_v3_title = 'Laporan ' . $this->tabel7;

		// deklarasi variabel controller
		$this->tabel7_c1 = $this->tabel7;
		$this->tabel7_c2 = $this->tabel7 . '/tambah';
		$this->tabel7_c3 = $this->tabel7 . '/update';
		$this->tabel7_c4 = $this->tabel7 . '/hapus';
		$this->tabel7_c5 = $this->tabel7 . '/laporan';

		// tabel bagian input
		$this->tabel7_v_input1_post = $this->input->post($this->tabel7_field1);
		$this->tabel7_v_input1_alt = '';
		$this->tabel7_v_input2_post = $this->input->post($this->tabel7_field2);
		$this->tabel7_v_input3_post = $this->input->post($this->tabel7_field3);
		$this->tabel7_v_input4_post = $this->input->post($this->tabel7_field4);
		$this->tabel7_v_input5_post = $this->input->post($this->tabel7_field5);
		$this->tabel7_v_input6_post = $this->input->post($this->tabel7_field6);
		$this->tabel7_v_input7_post = $this->input->post($this->tabel7_field7);
		$this->tabel7_v_input8_post = $this->input->post($this->tabel7_field8);
		$this->tabel7_v_input9_post = $this->input->post($this->tabel7_field9);
		$this->tabel7_v_input10_post = $this->input->post($this->tabel7_field10);
		$this->tabel7_v_input11_post = $this->input->post($this->tabel7_field11);

		// deklarasi variabel bagian v_flashdata
		$this->tabel7_v_flashdata1_msg_1 = $this->tabel7 . ' berhasil disimpan!';
		$this->tabel7_v_flashdata1_msg_2 = $this->tabel7 . ' gagal disimpan!';
		$this->tabel7_v_flashdata1_msg_3 = 'Status ' . $this->tabel7 . ' gagal diubah!';
		$this->tabel7_v_flashdata1_msg_4 = 'Status ' . $this->tabel7 . ' gagal diubah!';
		$this->tabel7_v_flashdata1_msg_5 = $this->tabel7 . ' gagal dihapus!';
		$this->tabel7_v_flashdata1_msg_6 = $this->tabel7 . ' gagal dihapus!';
	}




	public function index($id = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Data Pengaturan',
			'head' => '_partials/head',
			'konten' => 'v_admin-pengaturan',
			'pengaturan' => $this->ptn->ambil($id)->result(),
		);

		$this->load->view('template', $data);
	}

	public function update()
	{
		$this->declare();
		$where = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'hp' => $this->input->post('hp'),
			'metadesc' => $this->input->post('metadesc'),
			'fb' => $this->input->post('fb'),
			'ig' => $this->input->post('ig'),
		);

		$update = $this->ptn->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Data website berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Data website gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('pengaturan'));
	}

	public function update_favicon()
	{
		$this->declare();
		$config['upload_path'] = './assets/img/';

		// nama file telah ditetapkan dan hanya berekstensi png dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = 'png';
		$config['file_name'] = 'favicon';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
		$gambar = $_FILES['favicon']['name'];

		if ($gambar) {
			$this->upload->do_upload('favicon');
		} else {
			$gambar = $this->input->post('txtfavicon');
		}

		$where = $this->input->post('id');

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'favicon' => 'favicon.png',
		);

		$update = $this->ptn->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Favicon berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Favicon gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('pengaturan'));
	}

	public function update_logo()
	{
		$this->declare();
		$config['upload_path'] = './assets/img/';

		// nama file telah ditetapkan dan hanya berekstensi png dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = 'png';
		$config['file_name'] = 'logo';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
		$gambar = $_FILES['logo']['name'];

		if ($gambar) {
			$this->upload->do_upload('logo');
		} else {
			$gambar = $this->input->post('txtlogo');
		}

		$where = $this->input->post('id');

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'logo' => 'logo.png',
		);

		$update = $this->ptn->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Logo berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Logo gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('pengaturan'));
	}

	public function update_foto()
	{
		$this->declare();
		$config['upload_path'] = './assets/img/';

		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = 'jpg';
		$config['file_name'] = 'foto';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
		$gambar = $_FILES['foto']['name'];

		if ($gambar) {
			$this->upload->do_upload('foto');
		} else {
			$gambar = $this->input->post('txtfoto');
		}

		$where = $this->input->post('id');

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'foto' => 'foto.jpg',
		);

		$update = $this->ptn->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Foto berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Foto gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('pengaturan'));
	}
}
