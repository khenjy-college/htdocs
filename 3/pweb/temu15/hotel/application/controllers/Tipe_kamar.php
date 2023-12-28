<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Tipe_kamar extends Welcome
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
	private $tabel6_v_flashdata3_msg_1;
	private $tabel6_v_flashdata4_msg_1;
	public function

	declare()
	{


		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel6_m = 'tl6';

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
		$this->tabel6_v_flashdata1_msg_1 = 'Data ' . $this->tabel6_alias . ' berhasil disimpan!';
		$this->tabel6_v_flashdata1_msg_2 = 'Data ' . $this->tabel6_alias . ' gagal disimpan!';
		$this->tabel6_v_flashdata1_msg_3 = 'Data ' . $this->tabel6_alias . ' berhasil diubah!';
		$this->tabel6_v_flashdata1_msg_4 = 'Data ' . $this->tabel6_alias . ' gagal diubah!';
		$this->tabel6_v_flashdata1_msg_5 = 'Data ' . $this->tabel6_alias . ' berhasil dihapus!';
		$this->tabel6_v_flashdata1_msg_6 = 'Data ' . $this->tabel6_alias . ' gagal dihapus!';

		// deklarasi variabel menampilkan pesan modal
		$this->tabel6_v_flashdata3_msg_1 =  $this->tabel3_field4_alias . ' ' . $this->tabel3_alias . ' tidak bisa diupload';
		$this->tabel6_v_flashdata4_msg_1 = $this->tabel3_field4_alias . ' ' . $this->tabel3_alias . ' tidak bisa diupload';
	}



	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel6_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel6_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel6_v_input3_upload_path;
		$config['allowed_types'] = $this->file_type1;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->tabel6_v_input3)) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu

			$this->session->set_flashdata($this->v_flashdata3, $this->tabel6_v_flashdata3_msg_1);
			$this->session->set_flashdata($this->v_flashdata_c, $this->v_flashdata_c_func1);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->tabel6_field1 => $this->tabel6_v_input1_alt,
			$this->tabel6_field2 => $this->tabel6_v_input2_post,
			$this->tabel6_field3 => $gambar,
			$this->tabel6_field5 => $this->tabel6_v_input5_post,
		);

		// $query = 'INSERT INTO tipe_kamar VALUES('.$data.')';

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
		$config['upload_path'] = $this->tabel6_v_input3_upload_path;
		$config['allowed_types'] = $this->file_type1;
		// $config['file_name'] = $this->tabel6_v_input2_post . '.jpg';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->tabel6_v_input3)) {
			$gambar = $this->input->post($this->tabel6_v_input3_alt);
		} else {

			// Di bawah ini adalah fitur untuk menghapus file lama
			// Dipakai atau tidaknya fitur ini masih tergantung dari kebutuhan
			$table = $this->tl6->ambil($this->tabel6_v_input1_post)->result();
			$img = $table[0]->img;
			unlink($this->tabel6_v_input3_upload_path . $img);

			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$where = $this->tabel6_v_input1_post;
		$data = array(
			$this->tabel6_field2 => $this->tabel6_v_input2_post,
			$this->tabel6_field3 => $gambar,
			$this->tabel6_field5 => $this->tabel6_v_input5_post,
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

	public function hapus($id_tipe = null)
	{
		$this->declare();
		$tabel6 = $this->tl6->ambil($id_tipe)->result();
		$img = $tabel6[0]->img;

		unlink($this->tabel6_v_input3_upload_path . $img);
		$hapus = $this->tl6->hapus($id_tipe);

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
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel6_v3, $data);
	}
}
