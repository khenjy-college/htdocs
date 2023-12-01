<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipe_kamar extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Tipe Kamar',
			'head' => '_partials/head',
			'konten' => 'v_admin-tipe_kamar',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'tipe_kamar' => $this->tpk->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$config['upload_path'] = './assets/img/tipe_kamar/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'id_tipe' => '',
			'tipe' => $this->input->post('tipe'),
			'stok' => $this->input->post('stok'),
			'harga' => $this->input->post('harga'),
			'img' => $gambar,
		);

		// $query = 'INSERT INTO tipe_kamar VALUES('.$data.')';

		$simpan = $this->tpk->simpan($data);
		// $simpan = $this->tpk->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Tipe Kamar berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Tipe Kamar gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('tipe_kamar'));
	}

	public function update()
	{
		$config['upload_path'] = './assets/img/tipe_kamar/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post('txtimg');
		}

		$where = $this->input->post('id_tipe');
		$data = array(
			'tipe' => $this->input->post('tipe'),
			'stok' => $this->input->post('stok'),
			'harga' => $this->input->post('harga'),
			'img' => $gambar,
		);

		$update = $this->tpk->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Tipe Kamar berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Tipe Kamar gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('tipe_kamar'));
	}

	public function hapus($id_tipe = null)
	{
		$tipe_kamar = $this->tpk->ambil($id_tipe)->result();
		$img = $tipe_kamar[0]->img;

		unlink('./assets/img/tipe_kamar/' . $img);
		$hapus = $this->tpk->hapus($id_tipe);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Tipe Kamar berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Tipe Kamar gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('tipe_kamar'));
	}
}
