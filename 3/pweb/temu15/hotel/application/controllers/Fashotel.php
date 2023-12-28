<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Welcome.php';

// mencoba menerapkan fitur oop menggunakan construct()
// class Input_Fashotel extends MY_Controller
// {
// 	public function __construct()
// 	{
// 		parent::Controller();
// 		// tabel bagian input
// 		$this->tabel3_v_input1 = $this->input->this->tabel3_field;
// 		$this->tabel3_v_input1_alt = '';
// 		$this->tabel3_v_input1 = $this->input->this->tabel3_field;
// 		$this->tabel3_v_input1 = $this->input->this->tabel3_field;
// 		$this->tabel3_v_input1 = $this->input->this->tabel3_field;
// 	}
// }

class Fashotel extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel3_m = 'tl3';

	// deklarasi variabel views
	private $tabel3_v1;
	private $tabel3_v1_title;
	private $tabel3_v2;
	private $tabel3_v2_title;
	private $tabel3_v3;
	private $tabel3_v3_title;

	// deklarasi variabel controller
	private $tabel3_c1;
	private $tabel3_c2;
	private $tabel3_c3;
	private $tabel3_c4;
	private $tabel3_c5;
	private $tabel3_v_input1_post;
	private $tabel3_v_input1_alt;
	private $tabel3_v_input2_post;
	private $tabel3_v_input3_post;
	private $tabel3_v_input4;
	private $tabel3_v_input4_upload_path;
	private $tabel3_v_input4_post;
	private $tabel3_v_input4_upload;
	private $tabel3_v_input4_alt;
	private $tabel3_v_flashdata1_msg_1;
	private $tabel3_v_flashdata1_msg_2;
	private $tabel3_v_flashdata1_msg_3;
	private $tabel3_v_flashdata1_msg_4;
	private $tabel3_v_flashdata1_msg_5;
	private $tabel3_v_flashdata1_msg_6;

	private $tabel3_v_flashdata3_msg_1;
	private $tabel3_v_flashdata4_msg_1;

	public function

	declare()
	{

		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel3_m = 'tl3';

		// deklarasi variabel views
		$this->tabel3_v1 = 'v_' . $this->tabel3;
		$this->tabel3_v2_title = 'Daftar ' . $this->tabel3_alias;
		$this->tabel3_v2 = 'v_admin-' . $this->tabel3;
		$this->tabel3_v2_title = 'Data ' . $this->tabel3_alias;
		$this->tabel3_v3 = '_laporan/laporan_' . $this->tabel3;
		$this->tabel3_v3_title = 'Laporan ' . $this->tabel3_alias;

		// deklarasi variabel controller
		$this->tabel3_c1 = $this->tabel3;
		$this->tabel3_c2 = $this->tabel3 . '/tambah';
		$this->tabel3_c3 = $this->tabel3 . '/update';
		$this->tabel3_c4 = $this->tabel3 . '/hapus';
		$this->tabel3_c5 = $this->tabel3 . '/laporan';

		// tabel bagian input
		$this->tabel3_v_input1_post = $this->input->post($this->tabel3_field1);
		$this->tabel3_v_input1_alt = '';
		$this->tabel3_v_input2_post = $this->input->post($this->tabel3_field2);
		$this->tabel3_v_input3_post = $this->input->post($this->tabel3_field3);

		$this->tabel3_v_input4 = $this->tabel3_field4;
		$this->tabel3_v_input4_upload_path = './assets/' . $this->tabel3_field4 . '/' . $this->tabel3 . '/';
		// $this->tabel3_v_input4_post = $this->input->post($this->tabel3_v_input4);
		$this->tabel3_v_input4_alt = $this->input->post('txt' . $this->tabel3_v_input4);
		// $this->tabel3_v_input4_upload = $this->upload->do_upload($this->tabel3_v_input4);

		// deklarasi variabel bagian v_flashdata
		$this->tabel3_v_flashdata1_msg_1 = 'Data ' . $this->tabel3_alias . ' berhasil disimpan!';
		$this->tabel3_v_flashdata1_msg_2 = 'Data ' . $this->tabel3_alias . ' gagal disimpan!';
		$this->tabel3_v_flashdata1_msg_3 = 'Data ' . $this->tabel3_alias . ' berhasil diubah!';
		$this->tabel3_v_flashdata1_msg_4 = 'Data ' . $this->tabel3_alias . ' gagal diubah!';
		$this->tabel3_v_flashdata1_msg_5 = 'Data ' . $this->tabel3_alias . ' berhasil dihapus!';
		$this->tabel3_v_flashdata1_msg_6 = 'Data ' . $this->tabel3_alias . ' gagal dihapus!';

		// deklarasi variabel menampilkan pesan modal
		$this->tabel3_v_flashdata3_msg_1 =  $this->tabel3_field4_alias . ' ' . $this->tabel3_alias . ' tidak bisa diupload';
		$this->tabel3_v_flashdata4_msg_1 = $this->tabel3_field4_alias . ' ' . $this->tabel3_alias . ' tidak bisa diupload';
	}




	public function index($tabel7_field1 = 1)
	{

		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel3_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel3_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel3' => $this->tl3->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();

		// konfigurasi upload,
		// sedang berencara menerapkan koding ini
		// https://stackoverflow.com/questions/18705639/how-to-rename-uploaded-file-before-saving-it-into-a-directory
		// rencananya nama gambar akan unik
		// semoga berhasil
		$config['upload_path'] = $this->tabel3_v_input4_upload_path;
		$config['allowed_types'] = $this->file_type1;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->tabel3_v_input4_upload) {

			$this->session->set_flashdata($this->v_flashdata3, $this->tabel3_v_flashdata3_msg_1);
			$this->session->set_flashdata($this->v_flashdata_c, $this->v_flashdata_c_func1);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->tabel3_field1 => $this->tabel3_v_input1_alt,
			$this->tabel3_field2 => $this->tabel3_v_input2_post,
			$this->tabel3_field3 => $this->tabel3_v_input3_post,
			$this->tabel3_field4 => $gambar,
		);


		$simpan = $this->tl3->simpan($data);

		// menampilkan toast jika operasi berhasil
		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel3_c1));
	}

	public function update()
	{
		$this->declare();
		$config['upload_path'] = $this->tabel3_v_input4_upload_path;
		$config['allowed_types'] = $this->file_type1;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->tabel3_v_input4)) {
			$gambar = $this->tabel3_v_input4_alt;
		} else {
			$table = $this->tl3->ambil($this->tabel3_v_input1_post)->result();
			$img = $table[0]->img;
			unlink($this->tabel3_v_input4_upload_path . $img);

			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$where = $this->tabel3_v_input1_post;
		$data = array(
			$this->tabel3_field2 => $this->tabel3_v_input2_post,
			$this->tabel3_field3 => $this->tabel3_v_input3_post,
			$this->tabel3_field4 => $gambar,
		);

		$update = $this->tl3->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata_a_func1);
		}

		// redirect(site_url($this->tabel3_c1));
		redirect($_SERVER['HTTP_REFERER']);
	}

	// $id_fashotel akan menjadi $where di model
	public function hapus($id_fashotel = null)
	{
		$this->declare();
		// mengambil data gambar di database
		$tabel3 = $this->tl3->ambil($id_fashotel)->result();
		$img = $tabel3[0]->img;

		// menghapus data dan gambar
		unlink($this->tabel3_v_input4_upload_path . $img);
		$hapus = $this->tl3->hapus($id_fashotel);

		// menampilkan toast jika operasi berhasil
		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel3_c1));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel3_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel3' => $this->tl3->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel3_v3, $data);
	}
}
