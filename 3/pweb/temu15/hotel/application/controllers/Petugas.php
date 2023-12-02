<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Petugas',
			'head' => '_partials/head',
			'konten' => 'v_admin-petugas',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'petugas' => $this->pts->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$config['upload_path'] = './assets/img/petugas/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'hp' => $this->input->post('hp'),
			'img' => $gambar,
			'role' => $this->input->post('role'),
		);

		$simpan = $this->pts->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata('pesan', 'Petugas berhasil ditambah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Petugas gagal ditambah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('petugas'));
	}

	public function update()
	{
		$config['upload_path'] = './assets/img/petugas/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post('txtimg');
		}

		$where = $this->input->post('id_petugas');
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'hp' => $this->input->post('hp'),
			'img' => $gambar,
		);

		$update = $this->pts->update($data, $where);

		if ($update) {

			$this->session->set_flashdata('pesan', 'Petugas berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Petugas gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('petugas'));
	}

	public function hapus($id_petugas = null)
	{
		// mengambil data gambar di database
		$petugas = $this->pts->ambil($id_petugas)->result();
		$img = $petugas[0]->img;

		// menghapus data dan gambar
		unlink('./assets/img/petugas/' . $img);
		$hapus = $this->pts->hapus($id_petugas);


		if ($hapus) {

			$this->session->set_flashdata('pesan', 'Petugas berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Petugas gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}


		redirect(site_url('petugas'));
	}
	public function laporan($id = 1)
	{
		$data = array(
			'title' => 'Laporan Petugas',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'petugas' => $this->pts->ambildata()->result()
		);

		$this->load->view('_laporan/laporan_petugas', $data);
	}
}
