

<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Welcome.php';

class Faskamar extends Welcome
{
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
	private $tabel1_c6;
	private $tabel1_c7;
	private $tabel1_c8;
	private $tabel1_c9;
	private $tabel1_c10;
	private $tabel1_c11;
	private $tabel1_c12;
	private $tabel1_v_input1;
	private $tabel1_v_input1_alt;
	private $tabel1_v_input2;
	private $tabel1_v_input3;
	private $tabel1_v_input4;
	private $tabel1_v_input5;
	private $tabel1_v_input6;
	private $tabel1_v_input7;
	private $tabel1_v_input8;
	private $tabel1_v_input9;
	private $tabel1_v_input10;
	private $tabel1_v_input11;
	private $tabel1_v_input12;
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
		$this->tabel1_v1_title = 'Daftar ' . $this->tabel1;
		$this->tabel1_v2 = 'v_admin-' . $this->tabel1;
		$this->tabel1_v2_title = 'Data ' . $this->tabel1;
		$this->tabel1_v3 = '_laporan/laporan_' . $this->tabel1;

		$this->tabel1_v3_title = 'Laporan ' . $this->tabel1;
		// deklarasi variabel controller
		$this->tabel1_c1 = $this->tabel1;
		$this->tabel1_c2 = $this->tabel1 . '/tambah';
		$this->tabel1_c3 = $this->tabel1 . '/update';
		$this->tabel1_c4 = $this->tabel1 . '/hapus';
		$this->tabel1_c5 = $this->tabel1 . '/laporan';


		//deklarasi variabel bagian input
		$this->tabel1_v_input1 = $this->tabel1_field1;
		$this->tabel1_v_input2 = $this->tabel1_field2;
		$this->tabel1_v_input3 = $this->tabel1_field3;
		$this->tabel1_v_input4 = $this->tabel1_field4;


		// deklarasi variabel bagian v_flashdata
		$this->tabel1_v_flashdata1_msg_1 = $this->tabel1 . ' berhasil disimpan!';
		$this->tabel1_v_flashdata1_msg_2 = $this->tabel1 . ' gagal disimpan!';
		$this->tabel1_v_flashdata1_msg_3 = 'Status ' . $this->tabel1 . ' gagal diubah!';
		$this->tabel1_v_flashdata1_msg_4 = 'Status ' . $this->tabel1 . ' gagal diubah!';
		$this->tabel1_v_flashdata1_msg_5 = $this->tabel1 . ' gagal dihapus!';
		$this->tabel1_v_flashdata1_msg_6 = $this->tabel1 . ' gagal dihapus!';
	}



	public function index($tabel7_field1 = 1)
	{
		$data = array(
			'title' => 'Data Faskamar',
			'head' => $this->head,
			'konten' => 'v_admin-faskamar',
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel1 => $this->fsk->ambildata()->result(),
			$this->tabel5 => $this->kmr->ambildata()->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$config['upload_path'] = './assets/img/faskamar/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'id_faskamar' => '',
			'tipe' => $this->input->post('tipe'),
			'nama' => $this->input->post('nama'),
			'img' => $gambar,
		);

		$simpan = $this->fsk->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, 'Fasilitas berhasil disimpan!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, 'Fasilitas gagal disimpan!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel1));
	}

	public function update()
	{
		$config['upload_path'] = './assets/img/faskamar/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post('txtimg');
		}

		$where = $this->input->post('id_faskamar');
		$data = array(
			'tipe' => $this->input->post('tipe'),
			'nama' => $this->input->post('nama'),
			'img' => $gambar,
		);

		$update = $this->fsk->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, 'Fasilitas berhasil diubah!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, 'Fasilitas gagal diubah!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel1));
	}

	public function hapus($id_faskamar = null)
	{
		$faskamar = $this->fsk->ambil($id_faskamar)->result();
		$img = $faskamar[0]->img;

		unlink('./assets/img/faskamar/' . $img);
		$hapus = $this->fsk->hapus($id_faskamar);

		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, 'Fasilitas berhasil dihapus!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, 'Fasilitas gagal dihapus!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel1));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$data = array(
			'title' => 'Laporan Fasilitas Kamar',
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel1 => $this->fsk->ambildata()->result()
		);

		$this->load->view('_laporan/laporan_faskamar', $data);
	}
}
