<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operations extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Operations',
			'head' => '_partials/head',
			'konten' => 'v_admin-operations',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'operations' => $this->ops->ambildata()->result(),
			'petugas' => $this->pts->ambildata()->result(),
		);

		$this->load->view('template', $data);
	}

	public function daftar($id = 1)
	{
		$where = $this->session->userdata('id_user');
		$data = array(
			'title' => 'Data Operations',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'operations' => $this->ops->ambil_id_user($where)->result()
		);

		$this->load->view('template', $data);
	}

	public function cari($id = 1)
	{
		$id_operations = $this->input->get('id_operations');
		$email = $this->input->get('email');

		$data = array(
			'title' => 'Data Operations',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mencari dan menampilkan id operations berdasarkan id_operations yang telah diinput
			'operations' => $this->ops->cari($id_operations, $email)->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
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

			$this->session->set_flashdata('pesan', 'Operations berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Operations gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('kamar'));
	}

	public function update_status($id = 1)
	{
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

			$this->session->set_flashdata('pesan', 'Status pesanan berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Status pesanan gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('pesanan'));
	}

	public function hapus($id_operations = null)
	{
		$hapus = $this->ops->hapus($id_operations);

		if ($hapus) {

			$this->session->set_flashdata('pesan', 'Operations berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Operations gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('operations'));
	}

	public function laporan($id = 1)
	{
		$data = array(
			'title' => 'Laporan Operations',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'operations' => $this->ops->ambildata()->result()
		);

		$this->load->view('_laporan/laporan_operations', $data);
	}
}
