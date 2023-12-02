<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function index($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$min = $this->input->get('min');
		$max = $this->input->get('max');

		$data = array(
			'title' => 'Data Transaksi',
			'head' => '_partials/head',
			'konten' => 'v_admin-transaksi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'transaksi' => $this->trs->ambildata()->result(),
			'pesanan' => $this->psn->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'min' => $min,
			'max' => $max,
		);

		$this->load->view('template', $data);
	}

	public function daftar($id = 1)
	{
		$where = $this->session->userdata('id_user');
		$data = array(
			'title' => 'Data Transaksi',
			'head' => '_partials/head',
			'konten' => 'v_transaksi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'transaksi' => $this->trs->ambil_id_user($where)->result(),
			'pesanan' => $this->psn->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function filter($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$min = $this->input->get('min');
		$max = $this->input->get('max');

		$data = array(
			'title' => 'Data Transaksi',
			'head' => '_partials/head',
			'konten' => 'v_admin-transaksi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'transaksi' => $this->trs->filter($min, $max)->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'min' => $min,
			'max' => $max,
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$email = $this->input->post('email');
		$bayar = $this->input->post('bayar');

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tgl = date("Y-m-d") . " " . date("h:m:s", time());

		// $kembalian = $this->psn->get('harga_total') - $bayar;

		$data = array(
			'id_transaksi' => '',
			'id_user' => $this->session->userdata('id_user'),
			'email' => $email,
			'id_pesanan' => $this->input->post('id_pesanan'),
			'metode' => $this->input->post('metode'),
			'bayar' => $bayar,
			'tgl_transaksi' => $tgl,
		);

		$this->session->set_tempdata('email_transaksi', $email, 300);

		// Session kembalian_transaksi sebenarnya digunakan ketika menggunakan cash, namun fungsi ini akan tetap disimpan untuk pengembangan lebih lanjut
		// $this->session->set_tempdata('kembalian_transaksi', $kembalian, 300);


		// $query = 'INSERT INTO transaksi VALUES('.$data.')';

		$simpan = $this->trs->simpan($data);
		// $simpan = $this->trs->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Transaksi berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Transaksi gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		// fitur mengubah status ini seharusnya berada di bagian pesanan cman saya belum bisa menemukan algoritma yang pas jadi akan disimpan untuk pengembangan di kemudian hari
		$where = $this->input->post('id_pesanan');
		$status = array(
			'status' => $this->input->post('status'),
		);

		if ($this->input->post('status') == 'menunggu') {

			// hanya merubah status pesanan
			$update = $this->psn->update($status, $where);

			if ($update) {
				$this->session->set_flashdata('pesan', 'Selamat! Anda sudah bisa mengunjungi HotelHebat!');
				$this->session->set_flashdata('panggil', '$("#element").toast("show")');
			} else {
				$this->session->set_flashdata('pesan', 'Anda belum bisa mengunjungi HotelHebat!');
				$this->session->set_flashdata('panggil', '$("#element").toast("show")');
			}
		} else {
			$this->session->set_flashdata('pesan', 'Transaksi tidak valid!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('transaksi/konfirmasi'));
	}

	public function konfirmasi($id = 1)
	{
		$where = $this->session->tempdata('email_transaksi');
		$data = array(
			'title' => 'Transaksi Berhasil',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'transaksi' => $this->trs->ambil_email($where)->last_row(),
		);

		$this->load->view('konfirmasi', $data);
	}

	public function update()
	{
		$where = $this->input->post('id_transaksi');

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tgl = date("Y-m-d") . " " . date("h:m:s", time());

		$data = array(
			'metode' => $this->input->post('metode'),
			'bayar' => $this->input->post('bayar'),
			'tgl_transaksi' => $tgl,
		);

		$update = $this->trs->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Transaksi berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Transaksi gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('transaksi'));
	}

	public function hapus($id_transaksi = null)
	{
		$transaksi = $this->trs->ambil($id_transaksi)->result();
		$hapus = $this->trs->hapus($id_transaksi);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Transaksi berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Transaksi gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('transaksi'));
	}

	public function receipt($id_transaksi = null, $id = 1)
	{
		$data = array(
			'title' => 'Bukti Reservasi',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'transaksi' => $this->trs->ambil($id_transaksi)->result(),
			'pesanan' => $this->psn->ambildata()->result()
		);

		$this->load->view('receipt', $data);
	}

	public function laporan($id = 1)
	{
		$data = array(
			'title' => 'Laporan Transaksi',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'transaksi' => $this->trs->ambildata()->result()
		);

		$this->load->view('_laporan/laporan_transaksi', $data);
	}
}
