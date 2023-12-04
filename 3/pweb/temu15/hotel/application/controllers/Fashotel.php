

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
// 		$this->tabel1_v_input1 = $this->input->this->tabel1_field;
// 		$this->tabel1_v_input1_alt = '';
// 		$this->tabel1_v_input1 = $this->input->this->tabel1_field;
// 		$this->tabel1_v_input1 = $this->input->this->tabel1_field;
// 		$this->tabel1_v_input1 = $this->input->this->tabel1_field;
// 	}
// }

class Fashotel extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel3_m = 'fsh';

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
	private $tabel3_v_input4_alt;
	private $tabel3_v_flashdata1_msg_1;
	private $tabel3_v_flashdata1_msg_2;
	private $tabel3_v_flashdata1_msg_3;
	private $tabel3_v_flashdata1_msg_4;
	private $tabel3_v_flashdata1_msg_5;
	private $tabel3_v_flashdata1_msg_6;

	public function

	declare()
	{

		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel3_m = 'fsh';

		// deklarasi variabel views
		$this->tabel3_v1 = 'v_' . $this->tabel3;
		$this->tabel3_v2_title = 'Daftar ' . $this->tabel3;
		$this->tabel3_v2 = 'v_admin-' . $this->tabel3;
		$this->tabel3_v2_title = 'Data ' . $this->tabel3;
		$this->tabel3_v3 = '_laporan/laporan_' . $this->tabel3;
		$this->tabel3_v3_title = 'Laporan ' . $this->tabel3;

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
		$this->tabel3_v_input4_post = $this->input->post($this->tabel3_v_input4);
		$this->tabel3_v_input4_alt = 'txt' . $this->tabel3_v_input4;

		// deklarasi variabel bagian v_flashdata
		$this->tabel3_v_flashdata1_msg_1 = $this->tabel3 . ' berhasil disimpan!';
		$this->tabel3_v_flashdata1_msg_2 = $this->tabel3 . ' gagal disimpan!';
		$this->tabel3_v_flashdata1_msg_3 = 'Status ' . $this->tabel3 . ' gagal diubah!';
		$this->tabel3_v_flashdata1_msg_4 = 'Status ' . $this->tabel3 . ' gagal diubah!';
		$this->tabel3_v_flashdata1_msg_5 = $this->tabel3 . ' gagal dihapus!';
		$this->tabel3_v_flashdata1_msg_6 = $this->tabel3 . ' gagal dihapus!';
	}




	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => $this->tabel3_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel3_v2,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel3 => $this->fsh->ambildata()->result()
		);

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
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		// supaya fungsi upload berjalan
		$this->load->library('upload', $config);

		// mengambil nama file dari hasil upload
		$gambar = $_FILES['img']['name'];

		// dieksekusi jika nama gambar ada
		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'id_fashotel' => '',
			'nama' => $this->input->post('nama'),
			'keterangan' => $this->input->post('keterangan'),
			'img' => $gambar,
		);

		$simpan = $this->fsh->simpan($data);

		// menampilkan toast jika operasi berhasil
		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel3_c1));
	}

	public function update()
	{
		$this->declare();
		// konfigurasi upload
		$config['upload_path'] = $this->tabel3_v_input4_upload_path;
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		// supaya fungsi upload berjalan
		$this->load->library('upload', $config);

		// mengambil nama file dari hasil upload
		$gambar = $_FILES['img']['name'];

		// dieksekusi jika nama gambar ada
		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post($this->tabel3_v_input4_alt);
		}

		$where = $this->input->post('id_fashotel');
		$data = array(
			'nama' => $this->input->post('nama'),
			'keterangan' => $this->input->post('keterangan'),
			'img' => $gambar,
		);

		$update = $this->fsh->update($data, $where);

		// menampilkan toast jika operasi berhasil
		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel3_c1));
	}

	// $id_fashotel akan menjadi $where di model
	public function hapus($id_fashotel = null)
	{
		$this->declare();
		// mengambil data gambar di database
		$fashotel = $this->fsh->ambil($id_fashotel)->result();
		$img = $fashotel[0]->img;

		// menghapus data dan gambar
		unlink($this->tabel3_v_input4_upload_path . $img);
		$hapus = $this->fsh->hapus($id_fashotel);

		// menampilkan toast jika operasi berhasil
		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel3_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel3_c1));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => $this->tabel3_v3_title,
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel3 => $this->fsh->ambildata()->result()
		);

		$this->load->view($this->tabel3_v3, $data);
	}
}
