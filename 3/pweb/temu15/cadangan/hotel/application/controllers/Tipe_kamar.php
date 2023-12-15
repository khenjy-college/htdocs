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
	private $tabel6_v_input1_post;
	private $tabel6_v_input1_alt;
	private $tabel6_v_input2;
	private $tabel6_v_input2_post;
	private $tabel6_v_input3;
	private $tabel6_v_input3_upload_path;
	private $tabel6_v_input3_post;
	private $tabel6_v_input3_alt;

	private $tabel6_v_input4_post;
	private $tabel6_v_input5_post;
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
		$this->tabel6_v1 = 'v_' . $this->tabel6;
		$this->tabel6_v1_title = 'Daftar ' . $this->tabel6_alias;
		$this->tabel6_v2 = 'v_admin-' . $this->tabel6;
		$this->tabel6_v2_title = 'Data ' . $this->tabel6_alias;
		$this->tabel6_v3 = '_laporan/laporan_' . $this->tabel6;
		$this->tabel6_v3_title = 'Laporan ' . $this->tabel6_alias;

		// deklarasi variabel controller
		$this->tabel6_c1 = $this->tabel6;
		$this->tabel6_c2 = $this->tabel6 . '/tambah';
		$this->tabel6_c3 = $this->tabel6 . '/update';
		$this->tabel6_c4 = $this->tabel6 . '/hapus';
		$this->tabel6_c5 = $this->tabel6 . '/laporan';


		// tabel bagian input
		$this->tabel6_v_input1_post = $this->input->post($this->tabel6_field1);
		$this->tabel6_v_input1_alt = '';
		$this->tabel6_v_input2_post = $this->input->post($this->tabel6_field2);
		$this->tabel6_v_input3 = $this->tabel6_field3;
		$this->tabel6_v_input3_upload_path = './assets/' . $this->tabel6_field3 . '/' . $this->tabel6 . '/';
		$this->tabel6_v_input3_post = $this->input->post($this->tabel6_v_input3_post);
		$this->tabel6_v_input3_alt = 'txt' . $this->tabel6_v_input3;

		$this->tabel6_v_input4_post = $this->input->post($this->tabel6_field4);
		$this->tabel6_v_input5_post = $this->input->post($this->tabel6_field5);

		// deklarasi variabel bagian v_flashdata
		$this->tabel6_v_flashdata1_msg_1 = $this->tabel6_alias . ' berhasil disimpan!';
		$this->tabel6_v_flashdata1_msg_2 = $this->tabel6_alias . ' gagal disimpan!';
		$this->tabel6_v_flashdata1_msg_3 = 'Status ' . $this->tabel6_alias . ' berhasil diubah!';
		$this->tabel6_v_flashdata1_msg_4 = 'Status ' . $this->tabel6_alias . ' gagal diubah!';
		$this->tabel6_v_flashdata1_msg_5 = $this->tabel6_alias . ' berhasil dihapus!';
		$this->tabel6_v_flashdata1_msg_6 = $this->tabel6_alias . ' gagal dihapus!';
	}



	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Data Tipe Kamar',
			'head' => $this->head,
			'konten' => 'v_admin-tipe_kamar',
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel6 => $this->tpk->ambildata()->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel6_v_input3_upload_path;
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->tabel6_v_input3)) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu
			$gambar  = '';
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
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
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
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
		$config['upload_path'] = $this->tabel6_v_input3_upload_path;
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';
		// $config['file_name'] = $this->tabel6_v_input2_post . '.jpg';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->tabel6_v_input3)) {
			$gambar = $this->input->post($this->tabel6_v_input3_alt);
		} else {

			// Di bawah ini adalah fitur untuk menghapus file lama
			// Dipakai atau tidaknya fitur ini masih tergantung dari kebutuhan
			$table = $this->tpk->ambil($this->tabel6_v_input1_post)->result();
			$img = $table[0]->img;
			unlink($this->tabel6_v_input3_upload_path . $img);

			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$where = $this->input->post('id_tipe');
		$data = array(
			'tipe' => $this->input->post('tipe'),
			'harga' => $this->input->post('harga'),
			'img' => $gambar
		);

		$update = $this->tpk->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel6_c1));
	}

	public function hapus($id_tipe = null)
	{
		$this->declare();
		$tipe_kamar = $this->tpk->ambil($id_tipe)->result();
		$img = $tipe_kamar[0]->img;

		unlink($this->tabel6_v_input3_upload_path . $img);
		$hapus = $this->tpk->hapus($id_tipe);

		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel6_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel6_c1));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => $this->tabel6_v3_title,
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel6 => $this->tpk->ambildata()->result()
		);

		$this->load->view($this->tabel6_v3, $data);
	}
}
