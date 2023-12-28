<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';


class Petugas extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel4_m = 'tl4';

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
		$this->tabel4_m = 'tl4';

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
		$this->tabel4_v_flashdata1_msg_1 = 'Data ' . $this->tabel4_alias . ' berhasil disimpan!';
		$this->tabel4_v_flashdata1_msg_2 = 'Data ' . $this->tabel4_alias . ' gagal disimpan!';
		$this->tabel4_v_flashdata1_msg_3 = 'Data ' . $this->tabel4_alias . ' berhasil diubah!';
		$this->tabel4_v_flashdata1_msg_4 = 'Data ' . $this->tabel4_alias . ' gagal diubah!';
		$this->tabel4_v_flashdata1_msg_5 = 'Data ' . $this->tabel4_alias . ' berhasil dihapus!';
		$this->tabel4_v_flashdata1_msg_6 = 'Data ' . $this->tabel4_alias . ' gagal dihapus!';

		// deklarasi variabel menampilkan pesan modal
		$this->tabel3_v_flashdata3_msg_1 =  $this->tabel3_field4_alias . ' ' . $this->tabel3_alias . ' tidak bisa diupload';
		$this->tabel3_v_flashdata4_msg_1 = $this->tabel3_field4_alias . ' ' . $this->tabel3_alias . ' tidak bisa diupload';
	}




	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel4_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel4_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel4' =>  $this->tl4->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel4_v_input5_upload_path;
		$config['allowed_types'] = $this->file_type1;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->tabel4_v_input5)) {
			$gambar  = '';
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->tabel4_field1 => $this->tabel4_v_input1_alt,
			$this->tabel4_field2 => $this->tabel4_v_input2_post,
			$this->tabel4_field3 => $this->tabel4_v_input3_post,
			$this->tabel4_field4 => $this->tabel4_v_input4_post,
			$this->tabel4_field5 => $gambar,
			$this->tabel4_field6 => $this->tabel4_v_input6_post,

			// poin awal-awal adalah 0, bukan NULL
			$this->tabel4_field7 => 0,
		);

		$simpan = $this->tl4->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel4_c1));
	}

	public function update()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel4_v_input5_upload_path;
		$config['allowed_types'] = $this->file_type1;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->tabel4_v_input5)) {
			$gambar = $this->input->post($this->tabel4_v_input5_alt);
		} else {
			$table = $this->tl4->ambil($this->tabel4_v_input1_post)->result();
			$img = $table[0]->img;
			unlink($this->tabel4_v_input5_upload_path . $img);

			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$where = $this->tabel4_v_input1_post;
		$data = array(
			$this->tabel4_field2 => $this->tabel4_v_input2_post,
			$this->tabel4_field3 => $this->tabel4_v_input3_post,
			$this->tabel4_field4 => $this->tabel4_v_input4_post,
			$this->tabel4_field5 => $gambar,
			$this->tabel4_field6 => $this->tabel4_v_input6_post,

			// poin di sini saya simpan dlu, karena mungkin ada beberapa yang mau saya tambahkan ke depannya
			$this->tabel4_field7 => $this->tabel4_v_input7_post,
		);

		$update = $this->tl4->update($data, $where);

		if ($update) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel4_c1));
	}

	public function hapus($id_petugas = null)
	{
		$this->declare();
		// mengambil data gambar di database
		$tabel4 = $this->tl4->ambil($id_petugas)->result();
		$img = $tabel4[0]->img;

		// menghapus data dan gambar
		unlink($this->tabel4_v_input5_upload_path . $img);
		$hapus = $this->tl4->hapus($id_petugas);


		if ($hapus) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}


		redirect(site_url($this->tabel4_c1));
	}
	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel4_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel4' =>  $this->tl4->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel4_v3, $data);
	}
}
