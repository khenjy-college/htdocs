

<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Operations extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel11_m = 'ops';

	// deklarasi variabel views
	private $tabel11_v1;
	private $tabel11_v1_title;
	private $tabel11_v2;
	private $tabel11_v2_title;
	private $tabel11_v3;
	private $tabel11_v3_title;

	// deklarasi variabel controller
	private $tabel11_c1;
	private $tabel11_c2;
	private $tabel11_c3;
	private $tabel11_c4;
	private $tabel11_c5;
	private $tabel11_c6;
	private $tabel11_c7;
	private $tabel11_c8;
	private $tabel11_c9;
	private $tabel11_c10;
	private $tabel11_c11;
	private $tabel11_c12;
	private $tabel11_v_input1;
	private $tabel11_v_input1_alt;
	private $tabel11_v_input2;
	private $tabel11_v_input3;
	private $tabel11_v_input4;
	private $tabel11_v_input5;
	private $tabel11_v_input6;
	private $tabel11_v_input7;
	private $tabel11_v_input8;
	private $tabel11_v_input9;
	private $tabel11_v_input10;
	private $tabel11_v_input11;
	private $tabel11_v_input12;
	private $tabel11_v_flashdata1_msg_1;
	private $tabel11_v_flashdata1_msg_2;
	private $tabel11_v_flashdata1_msg_3;
	private $tabel11_v_flashdata1_msg_4;
	private $tabel11_v_flashdata1_msg_5;
	private $tabel11_v_flashdata1_msg_6;
	public function

	declare()
	{


		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel11_m = 'ops';

		// deklarasi variabel views
		$this->tabel11_v1 = 'v_-' . $this->tabel11;
		$this->tabel11_v2 = 'v_admin-' . $this->tabel11;
		$this->tabel11_v2_title = 'Data ' . $this->tabel11;
		$this->tabel11_v3 = '_laporan/laporan_' . $this->tabel11;
		$this->tabel11_v3_title = 'Laporan ' . $this->tabel11;

		// deklarasi variabel controller
		$this->tabel11_c1 = $this->tabel11;
		$this->tabel11_c2 = $this->tabel11 . '/tambah';
		$this->tabel11_c3 = $this->tabel11 . '/update';
		$this->tabel11_c4 = $this->tabel11 . '/hapus';
		$this->tabel11_c5 = $this->tabel11 . '/laporan';


		// deklarasi variabel konten website
		// deklarasi variabel title


		// tabel bagian input
		$this->tabel11_v_input1 = $this->tabel11_field1;
		$this->tabel11_v_input1_alt = '';
		$this->tabel11_v_input2 = $this->tabel11_field2;
		$this->tabel11_v_input3 = $this->tabel11_field3;
		$this->tabel11_v_input4 = $this->tabel11_field4;
		$this->tabel11_v_input5 = $this->tabel11_field5;
		$this->tabel11_v_input6 = $this->tabel11_field6;

		// deklarasi variabel bagian v_flashdata
		$this->tabel11_v_flashdata1_msg_1 = $this->tabel11 . ' berhasil disimpan!';
		$this->tabel11_v_flashdata1_msg_2 = $this->tabel11 . ' gagal disimpan!';
		$this->tabel11_v_flashdata1_msg_3 = 'Status ' . $this->tabel11 . ' gagal diubah!';
		$this->tabel11_v_flashdata1_msg_4 = 'Status ' . $this->tabel11 . ' gagal diubah!';
		$this->tabel11_v_flashdata1_msg_5 = $this->tabel11 . ' gagal dihapus!';
		$this->tabel11_v_flashdata1_msg_6 = $this->tabel11 . ' gagal dihapus!';
	}




	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Data Operations',
			'head' => $this->head,
			'konten' => 'v_admin-operations',
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel11 => $this->ops->ambildata()->result(),
			'petugas' => $this->pts->ambildata()->result(),
		);

		$this->load->view($this->v7, $data);
	}

	public function daftar($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		$data = array(
			'title' => 'Data Operations',
			'head' => $this->head,
			'konten' => 'v_reservasi',
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel11 => $this->ops->ambil_id_user($where)->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function cari($tabel7_field1 = 1)
	{
		$this->declare();
		$id_operations = $this->input->get('id_operations');
		$email = $this->input->get('email');

		$data = array(
			'title' => 'Data Operations',
			'head' => $this->head,
			'konten' => 'v_reservasi',
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),

			// mencari dan menampilkan id operations berdasarkan id_operations yang telah diinput
			$this->tabel11 => $this->ops->cari($id_operations, $email)->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tgl = date("Y-m-d") . " " . date("h:m:s", time());

		$where = $this->input->post('no_kamar');
		$data = array(
			'id_operations' => '',
			'no_kamar' => $where,
			'id_user' => $this->input->post('id_user'),
			'id_petugas' => $this->input->post('id_petugas'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_perubahan' => $tgl
		);

		$status = array(
			'status' => $this->input->post('status')
		);
		$update_status = $this->kmr->update($status, $where);

		$simpan = $this->ops->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata($this->v_flashdata1, 'Operations berhasil disimpan!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, 'Operations gagal disimpan!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel5));
	}

	public function update_status($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->input->post('id_operations');
		$data = array(
			'status' => $this->input->post('status')
		);

		// jika status pesanan cek in
		if ($this->input->post('status') == 'cek in') {

			// hanya merubah status pesanan
			$update = $this->ops->update($data, $where);

			// jika status pesanan cek out
		} elseif ($this->input->post('status') == 'cek out') {

			// menghapus data pesanan supaya trigger tambah_kamar dapat berjalan
			$hapus = $this->ops->hapus($where);

			// memasukkan nama resepsionis yang melakukan operasi
			$data = array(
				'user_aktif' => $this->session->userdata('nama')
			);

			// mengupdate pesanan dengan nama user yang aktif
			$update = $this->ops->update_pesanan($data, $where);
		}

		if ($update) {

			$this->session->set_flashdata($this->v_flashdata1, 'Status pesanan berhasil diubah!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, 'Status pesanan gagal diubah!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url('pesanan'));
	}

	public function hapus($id_operations = null)
	{
		$this->declare();
		$hapus = $this->ops->hapus($id_operations);

		if ($hapus) {

			$this->session->set_flashdata($this->v_flashdata1, 'Operations berhasil dihapus!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, 'Operations gagal dihapus!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel11));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$data = array(
			'title' => 'Laporan Operations',
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel11 => $this->ops->ambildata()->result()
		);

		$this->load->view('_laporan/laporan_operations', $data);
	}
}
