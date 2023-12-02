<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{
	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Kamar',
			'head' => '_partials/head',
			'konten' => 'v_admin-kamar',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'kamar' => $this->kmr->ambildata()->result(),
			'tipe_kamar' => $this->tpk->ambildata()->result(),
			'petugas' => $this->pts->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data = array(
			'no_kamar' => '',
			'id_tipe' => $this->input->post('id_tipe'),
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'),
		);

		$simpan = $this->kmr->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Kamar berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kamar gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('kamar'));
	}

	public function update()
	{
		$where = $this->input->post('no_kamar');
		$data = array(
			'id_tipe' => $this->input->post('id_tipe'),
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'),
		);

		$update = $this->kmr->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Kamar berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kamar gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('kamar'));
	}

	public function hapus($no_kamar = null)
	{
		$hapus = $this->kmr->hapus($no_kamar);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Kamar berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kamar gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('kamar'));
	}

	public function laporan($id = 1)
	{
		$data = array(
			'title' => 'Laporan Kamar',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'kamar' => $this->kmr->ambildata()->result()
		);

		$this->load->view('_laporan/laporan_kamar', $data);
	}
}
