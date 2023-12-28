<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Pengaturan extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel7_m = 'tl7';

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
	private $tabel7_v_input3;
	private $tabel7_v_input3_alt;
	private $tabel7_v_input3_upload_path;
	private $tabel7_v_input3_post;
	private $tabel7_v_input4;
	private $tabel7_v_input4_post;
	private $tabel7_v_input4_upload_path;
	private $tabel7_v_input4_alt;
	private $tabel7_v_input5;
	private $tabel7_v_input5_alt;
	private $tabel7_v_input5_upload_path;
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
	private $tabel7_v_flashdata1_msg_7;
	private $tabel7_v_flashdata1_msg_8;
	private $tabel7_v_flashdata1_msg_9;
	private $tabel7_v_flashdata1_msg_10;
	private $tabel7_v_flashdata1_msg_11;
	private $tabel7_v_flashdata1_msg_12;

	private $tabel7_v_flashdata11_msg_1;
	private $tabel7_v_flashdata12_msg_1;
	private $tabel7_v_flashdata13_msg_1;
	public function

	declare()
	{


		// deklarasi variabel mvc
		// deklarasi variabel model
		// public $this->tabel7_m = 'tl7';

		// deklarasi variabel views
		$this->tabel7_v1 = 'v_' . $this->tabel7;
		$this->tabel7_v2_title = 'Daftar ' . $this->tabel7_alias;
		$this->tabel7_v2 = 'v_admin-' . $this->tabel7;
		$this->tabel7_v2_title = 'Data ' . $this->tabel7_alias;
		$this->tabel7_v3 = '_laporan/laporan_' . $this->tabel7;
		$this->tabel7_v3_title = 'Laporan ' . $this->tabel7_alias;

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
		$this->tabel7_v_input3 = $this->tabel7_field3;
		$this->tabel7_v_input3_upload_path = './assets/img/';
		$this->tabel7_v_input3_post = $this->input->post($this->tabel7_v_input3);
		$this->tabel7_v_input3_alt = $this->input->post('txt' . $this->tabel7_v_input3);
		$this->tabel7_v_input4 = $this->tabel7_field4;
		$this->tabel7_v_input4_upload_path = './assets/img/';
		$this->tabel7_v_input4_post = $this->input->post($this->tabel7_v_input4);
		$this->tabel7_v_input4_alt = $this->input->post('txt' . $this->tabel7_v_input4);
		$this->tabel7_v_input5 = $this->tabel7_field5;
		$this->tabel7_v_input5_upload_path =  './assets/img/';
		$this->tabel7_v_input5_post = $this->input->post($this->tabel7_v_input5);
		$this->tabel7_v_input5_alt = $this->input->post('txt' . $this->tabel7_v_input5);
		$this->tabel7_v_input6_post = $this->input->post($this->tabel7_field6);
		$this->tabel7_v_input7_post = $this->input->post($this->tabel7_field7);
		$this->tabel7_v_input8_post = $this->input->post($this->tabel7_field8);
		$this->tabel7_v_input9_post = $this->input->post($this->tabel7_field9);
		$this->tabel7_v_input10_post = $this->input->post($this->tabel7_field10);
		$this->tabel7_v_input11_post = $this->input->post($this->tabel7_field11);

		// deklarasi variabel bagian v_flashdata
		$this->tabel7_v_flashdata1_msg_1 = 'Data ' . $this->tabel7_alias . ' berhasil disimpan!';
		$this->tabel7_v_flashdata1_msg_2 = 'Data ' . $this->tabel7_alias . ' gagal disimpan!';
		$this->tabel7_v_flashdata1_msg_3 = 'Data ' . $this->tabel7_alias . ' berhasil diubah!';
		$this->tabel7_v_flashdata1_msg_4 = 'Data ' . $this->tabel7_alias . ' gagal diubah!';
		$this->tabel7_v_flashdata1_msg_5 = 'Data ' . $this->tabel7_alias . ' berhasil dihapus!';
		$this->tabel7_v_flashdata1_msg_6 = 'Data ' . $this->tabel7_alias . ' gagal dihapus!';

		$this->tabel7_v_flashdata1_msg_7 = $this->tabel7_field3_alias . ' ' . $this->tabel7_field2_alias . ' berhasil diubah!';
		$this->tabel7_v_flashdata1_msg_8 = $this->tabel7_field3_alias . ' ' . $this->tabel7_field2_alias . ' gagal diubah!';
		$this->tabel7_v_flashdata1_msg_9 = $this->tabel7_field4_alias . ' ' . $this->tabel7_field2_alias . ' berhasil diubah!';
		$this->tabel7_v_flashdata1_msg_10 = $this->tabel7_field4_alias . ' ' . $this->tabel7_field2_alias . ' gagal diubah!';
		$this->tabel7_v_flashdata1_msg_11 = $this->tabel7_field5_alias . ' ' . $this->tabel7_field2_alias . ' berhasil diubah!';
		$this->tabel7_v_flashdata1_msg_12 = $this->tabel7_field5_alias . ' ' . $this->tabel7_field2_alias . ' gagal diubah!';

		// deklarasi variabel menampilkan pesan modal
		$this->tabel7_v_flashdata11_msg_1 = $this->tabel7_field3_alias . ' ' . $this->tabel7_alias . ' tidak bisa diupload';
		$this->tabel7_v_flashdata12_msg_1 = $this->tabel7_field4_alias . ' ' . $this->tabel7_alias . ' tidak bisa diupload';
		$this->tabel7_v_flashdata13_msg_1 = $this->tabel7_field5_alias . ' ' . $this->tabel7_alias . ' tidak bisa diupload';
	}




	public function index($id = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel7_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel7_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' =>  $this->tl7->ambil($id)->result(),
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function update()
	{
		$this->declare();
		$where = $this->tabel7_v_input1_alt;
		$data = array(
			$this->tabel7_field2 => $this->tabel7_v_input2_post,
			$this->tabel7_field6 => $this->tabel7_v_input6_post,
			$this->tabel7_field7 => $this->tabel7_v_input7_post,
			$this->tabel7_field8 => $this->tabel7_v_input8_post,
			$this->tabel7_field9 => $this->tabel7_v_input9_post,
			$this->tabel7_field10 => $this->tabel7_v_input10_post,
			$this->tabel7_field11 => $this->tabel7_v_input11_post,
		);

		$update = $this->tl7->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel7_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel7_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel7));
	}

	public function update_favicon()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel7_v_input3_upload_path;

		// nama file telah ditetapkan dan hanya berekstensi png dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->tabel7_field3;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$gambar = $_FILES[$this->tabel7_v_input3]['name'];

		if ($gambar) {
			$this->upload->do_upload($this->tabel7_v_input3);
		} else {
			$gambar = $this->tabel7_v_input3_alt;
		}

		$where = $this->tabel7_v_input1_post;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->tabel7_field3 => $this->tabel7_field3 . '.png',
		);

		$update = $this->tl7->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel7_v_flashdata1_msg_7);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel7_v_flashdata1_msg_8);
			$this->session->set_flashdata($this->v_flashdata_k, $this->v_flashdata_k_func1);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url($this->tabel7));
	}

	public function update_logo()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel7_v_input4_upload_path;

		// nama file telah ditetapkan dan hanya berekstensi png dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->tabel7_field4;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$gambar = $_FILES[$this->tabel7_v_input4]['name'];

		if ($gambar) {
			$this->upload->do_upload($this->tabel7_v_input4);
		} else {
			$gambar = $this->tabel7_v_input4_alt;
		}

		$where = $this->tabel7_v_input1_post;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->tabel7_field4 => $this->tabel7_field4 . '.png',
		);

		$update = $this->tl7->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel7_v_flashdata1_msg_9);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel7_v_flashdata1_msg_10);
			$this->session->set_flashdata($this->v_flashdata_l, $this->v_flashdata_l_func1);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url($this->tabel7));
	}

	public function update_foto()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel7_v_input5_upload_path;

		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->tabel7_field5;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$gambar = $_FILES[$this->tabel7_v_input5]['name'];

		if ($gambar) {
			$this->upload->do_upload($this->tabel7_v_input5);
		} else {
			$gambar = $this->tabel7_v_input5_alt;
		}

		$where = $this->tabel7_v_input1_post;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->tabel7_field5 => $this->tabel7_field5 . '.jpg',
		);

		$update = $this->tl7->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel7_v_flashdata1_msg_11);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel7_v_flashdata1_msg_12);
			$this->session->set_flashdata($this->v_flashdata_m, $this->v_flashdata_m_func1);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url($this->tabel7));
	}
}
