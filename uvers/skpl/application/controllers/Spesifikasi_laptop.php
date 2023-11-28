<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{
	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Kamar',
			'head' => '_partials/head',
			'konten' => 'v_admin-spesifikasi_laptop',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'spesifikasi_laptop' => $this->spk->ambildata()->result(),
			'spesifikasi_laptop' => $this->spk->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$config['upload_path'] = './assets/img/spesifikasi_laptop/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'no_spesifikasi_laptop' => '',
			'tipe' => $this->input->post('tipe'),
			'nama' => $this->input->post('nama'),
			'img' => $gambar,
		);

		$simpan = $this->spk->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Kamar berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kamar gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('spesifikasi_laptop'));
	}

	public function update()
	{
		$config['upload_path'] = './assets/img/spesifikasi_laptop/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post('txtimg');
		}

		$where = $this->input->post('no_spesifikasi_laptop');
		$data = array(
			'tipe' => $this->input->post('tipe'),
			'nama' => $this->input->post('nama'),
			'img' => $gambar,
		);

		$update = $this->spk->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Kamar berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kamar gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('spesifikasi_laptop'));
	}

	public function hapus($no_spesifikasi_laptop = null)
	{
		$spesifikasi_laptop = $this->spk->ambil($no_spesifikasi_laptop)->result();
		$img = $spesifikasi_laptop[0]->img;

		unlink('./assets/img/spesifikasi_laptop/' . $img);
		$hapus = $this->spk->hapus($no_spesifikasi_laptop);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Kamar berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kamar gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('spesifikasi_laptop'));
	}
}
