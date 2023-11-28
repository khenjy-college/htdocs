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
			'laptop' => $this->lpt->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$config['upload_path'] = './assets/img/laptop/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'no_laptop' => '',
			'tipe' => $this->input->post('tipe'),
			'nama' => $this->input->post('nama'),
			'img' => $gambar,
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
		$config['upload_path'] = './assets/img/laptop/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post('txtimg');
		}

		$where = $this->input->post('no_laptop');
		$data = array(
			'tipe' => $this->input->post('tipe'),
			'nama' => $this->input->post('nama'),
			'img' => $gambar,
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
		$laptop = $this->lpt->ambil($no_laptop)->result();
		$img = $laptop[0]->img;

		unlink('./assets/img/laptop/' . $img);
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
