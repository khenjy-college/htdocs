











<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Tipe_kamar extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel6_m = 'tpk';

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
	private $tabel6_c6;
	private $tabel6_c7;
	private $tabel6_c8;
	private $tabel6_c9;
	private $tabel6_c10;
	private $tabel6_c11;
	private $tabel6_c12;
	private $tabel6_v_input1;
	private $tabel6_v_input1_alt;
	private $tabel6_v_input2;
	private $tabel6_v_input3;
	private $tabel6_v_input4;
	private $tabel6_v_input5;
	private $tabel6_v_input6;
	private $tabel6_v_input7;
	private $tabel6_v_input8;
	private $tabel6_v_input9;
	private $tabel6_v_input10;
	private $tabel6_v_input11;
	private $tabel6_v_input12;
	private $tabel6_v_flashdata1_msg_1;
	private $tabel6_v_flashdata1_msg_2;
	private $tabel6_v_flashdata1_msg_3;
	private $tabel6_v_flashdata1_msg_4;
	private $tabel6_v_flashdata1_msg_5;
	private $tabel6_v_flashdata1_msg_6;
	public function

	declare()
	{


		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel6_m = 'tpk';

		// deklarasi variabel views
		$this->tabel6_v1 = 'v-' . $this->tabel6;
		$this->tabel6_v2 = 'v_admin-' . $this->tabel6;
		$this->tabel6_v3 = '_laporan/laporan_' . $this->tabel6;

		// deklarasi variabel controller
		$this->tabel6_c1 = $this->tabel6;
		$this->tabel6_c2 = $this->tabel6 . '/tambah';
		$this->tabel6_c3 = $this->tabel6 . '/update';
		$this->tabel6_c4 = $this->tabel6 . '/hapus';
		$this->tabel6_c5 = $this->tabel6 . '/laporan';


		// deklarasi variabel konten website
		// deklarasi variabel title
		$this->tabel6_v2_title = 'Data ' . $this->tabel6;
		$this->tabel6_v3_title = 'Laporan ' . $this->tabel6;

		// deklarasi variabel bagian konten
		$this->tabel6_konten1 = 'v_admin-' . $this->tabel6;
		$this->tabel6_konten2 = 'konfirmasi';

		// tabel bagian input
		$this->tabel6_v_input1 = $this->tabel6_field1;
		$this->tabel6_v_input1_alt = '';
		$this->tabel6_v_input2 = $this->tabel6_field2;
		$this->tabel6_v_input3 = $this->tabel6_field3;
		$this->tabel6_v_input4 = $this->tabel6_field4;
		$this->tabel6_v_input5 = $this->tabel6_field5;

		// deklarasi variabel bagian v_flashdata
		$this->tabel6_v_flashdata1_msg_1 = $this->tabel6 . ' berhasil disimpan!';
		$this->tabel6_v_flashdata1_msg_2 = $this->tabel6 . ' gagal disimpan!';
		$this->tabel6_v_flashdata1_msg_3 = 'Status ' . $this->tabel6 . ' gagal diubah!';
		$this->tabel6_v_flashdata1_msg_4 = 'Status ' . $this->tabel6 . ' gagal diubah!';
		$this->tabel6_v_flashdata1_msg_5 = $this->tabel6 . ' gagal dihapus!';
		$this->tabel6_v_flashdata1_msg_6 = $this->tabel6 . ' gagal dihapus!';
	}



	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Data Tipe Kamar',
			'head' => $this->head,
			'konten' => 'v_admin-tipe_kamar',
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			'tipe_kamar' => $this->tpk->ambildata()->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$config['upload_path'] = './assets/img/tipe_kamar/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'id_tipe' => '',
			'tipe' => $this->input->post('tipe'),
			'harga' => $this->input->post('harga'),
			'img' => $gambar,
		);

		// $query = 'INSERT INTO tipe_kamar VALUES('.$data.')';

		$simpan = $this->tpk->simpan($data);
		// $simpan = $this->tpk->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, 'Tipe Kamar berhasil disimpan!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, 'Tipe Kamar gagal disimpan!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url('tipe_kamar'));
	}

	public function update()
	{
		$this->declare();
		$config['upload_path'] = './assets/img/tipe_kamar/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post('txtimg');
		}

		$where = $this->input->post('id_tipe');
		$data = array(
			'tipe' => $this->input->post('tipe'),
			'harga' => $this->input->post('harga'),
			'img' => $gambar,
		);

		$update = $this->tpk->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, 'Tipe Kamar berhasil diubah!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, 'Tipe Kamar gagal diubah!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url('tipe_kamar'));
	}

	public function hapus($id_tipe = null)
	{
		$this->declare();
		$tipe_kamar = $this->tpk->ambil($id_tipe)->result();
		$img = $tipe_kamar[0]->img;

		unlink('./assets/img/tipe_kamar/' . $img);
		$hapus = $this->tpk->hapus($id_tipe);

		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, 'Tipe Kamar berhasil dihapus!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, 'Tipe Kamar gagal dihapus!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url('tipe_kamar'));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Laporan Tipe Kamar',
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			'tipe_kamar' => $this->tpk->ambildata()->result()
		);

		$this->load->view('_laporan/laporan_tipe_kamar', $data);
	}
}
