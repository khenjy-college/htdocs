<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Kamar extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel5_m = 'kmr';

	// deklarasi variabel views
	private $tabel5_v1;
	private $tabel5_v1_title;
	private $tabel5_v2;
	private $tabel5_v2_title;
	private $tabel5_v3;
	private $tabel5_v3_title;

	// deklarasi variabel controller
	private $tabel5_c1;
	private $tabel5_c2;
	private $tabel5_c3;
	private $tabel5_c4;
	private $tabel5_c5;
	private $tabel5_v_input1_post;
	private $tabel5_v_input1_alt;
	private $tabel5_v_input2_post;
	private $tabel5_v_input3_post;
	private $tabel5_v_input4_post;
	private $tabel5_v_input5_post;
	private $tabel5_v_flashdata1_msg_1;
	private $tabel5_v_flashdata1_msg_2;
	private $tabel5_v_flashdata1_msg_3;
	private $tabel5_v_flashdata1_msg_4;
	private $tabel5_v_flashdata1_msg_5;
	private $tabel5_v_flashdata1_msg_6;
	public function

	declare()
	{
		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel5_m = 'kmr';

		// deklarasi variabel views
		$this->tabel5_v1 = 'v_' . $this->tabel5;
		$this->tabel5_v1_title = 'Daftar ' . $this->tabel5_alias;
		$this->tabel5_v2 = 'v_admin-' . $this->tabel5;
		$this->tabel5_v2_title = 'Data ' . $this->tabel5_alias;
		$this->tabel5_v3 = '_laporan/laporan_' . $this->tabel5;
		$this->tabel5_v3_title = 'Laporan ' . $this->tabel5_alias;

		// deklarasi variabel controller
		$this->tabel5_c1 = $this->tabel5;
		$this->tabel5_c2 = $this->tabel5 . '/tambah';
		$this->tabel5_c3 = $this->tabel5 . '/update';
		$this->tabel5_c4 = $this->tabel5 . '/hapus';
		$this->tabel5_c5 = $this->tabel5 . '/laporan';


		// tabel bagian input
		$this->tabel5_v_input1_post = $this->input->post($this->tabel5_field1);
		$this->tabel5_v_input1_alt = '';
		$this->tabel5_v_input2_post = $this->input->post($this->tabel5_field2);
		$this->tabel5_v_input3_post = $this->input->post($this->tabel5_field3);
		$this->tabel5_v_input4_post = $this->input->post($this->tabel5_field4);
		$this->tabel5_v_input5_post = $this->input->post($this->tabel5_field5);

		// deklarasi variabel bagian v_flashdata
		$this->tabel5_v_flashdata1_msg_1 = $this->tabel5 . ' berhasil disimpan!';
		$this->tabel5_v_flashdata1_msg_2 = $this->tabel5 . ' gagal disimpan!';
		$this->tabel5_v_flashdata1_msg_3 = 'Status ' . $this->tabel5 . ' berhasil diubah!';
		$this->tabel5_v_flashdata1_msg_4 = 'Status ' . $this->tabel5 . ' gagal diubah!';
		$this->tabel5_v_flashdata1_msg_5 = $this->tabel5 . ' berhasil dihapus!';
		$this->tabel5_v_flashdata1_msg_6 = $this->tabel5 . ' gagal dihapus!';
	}


	public function index($tabel7_field1 = 1)
	{
		$this->declare();

		$data = array(
			'title' => $this->tabel5_v2_title,
			'head' => $this->head,
			'konten' => $this->tabel5_v2,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel5 => $this->kmr->ambildata()->result(),
			$this->tabel6 => $this->tpk->ambildata()->result(),
			$this->tabel4 => $this->pts->ambildata()->result()
		);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$data = array(
			'no_kamar' => '',
			'id_tipe' => $this->input->post('id_tipe'),
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'),
		);

		$simpan = $this->kmr->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel5_c1));
	}

	public function update()
	{
		$this->declare();
		$where = $this->input->post('no_kamar');
		$data = array(
			'id_tipe' => $this->input->post('id_tipe'),
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'),
		);

		$update = $this->kmr->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel5_c1));
	}

	public function hapus($no_kamar = null)
	{
		$this->declare();
		$hapus = $this->kmr->hapus($no_kamar);

		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel5_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
		}

		redirect(site_url($this->tabel5_c1));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data = array(
			'title' => $this->tabel5_v3_title,
			'head' => $this->head,
			$this->tabel7 => $this->ptn->ambil($tabel7_field1)->result(),
			$this->tabel5 => $this->kmr->ambildata()->result()
		);

		$this->load->view($this->tabel5_v3, $data);
	}
}
