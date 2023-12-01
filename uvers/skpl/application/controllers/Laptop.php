<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laptop extends CI_Controller
{
	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Laptop',
			'head' => '_partials/head',
			'konten' => 'v_admin-laptop',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'laptop' => $this->lpt->ambildata()->result(),
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data = array(
			'no_laptop' => '',
			'merk' => $this->input->post('merk'),
			'model' => $this->input->post('model'),
			'ukuran_layar' => $this->input->post('ukuran_layar'),
		);

		$simpan = $this->lpt->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Laptop berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Laptop gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('laptop'));
	}

	public function update()
	{
		$where = $this->input->post('no_laptop');
		$data = array(
			'merk' => $this->input->post('merk'),
			'model' => $this->input->post('model'),
			'ukuran_layar' => $this->input->post('ukuran_layar'),
		);

		$update = $this->lpt->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Laptop berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Laptop gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('laptop'));
	}

	public function hapus($no_laptop = null)
	{
		$hapus = $this->lpt->hapus($no_laptop);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Laptop berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Laptop gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('laptop'));
	}
}
