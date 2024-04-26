<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel6 extends Omnitags
{
	// Halaman publik
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v1_title['tabel6_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v1['tabel6'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel6')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			// 'tbl1' => $this->tl1->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman khusus akun

	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel6_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel6'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel6')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel6_field1'] => '',
			$this->aliases['tabel6_field2'] => $this->views_post['tabel6_field2'],
			$this->aliases['tabel6_field3'] => $this->views_post['tabel6_field3'],
		);

		// $query = 'INSERT INTO tipe_kamar VALUES('.$data.')';

		$simpan = $this->tl6->simpan($data);
		// $simpan = $this->tl6->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_1['tabel6_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_2['tabel6_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel6/admin'));
	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();

		$tabel6_field1 = $this->views_post['tabel6_field1'];
		$data = array(
			$this->aliases['tabel6_field2'] => $this->views_post['tabel6_field2'],
			$this->aliases['tabel6_field3'] => $this->views_post['tabel6_field3'],
		);

		$update = $this->tl6->update($data, $tabel6_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_3['tabel6_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_4['tabel6_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel6/admin'));
	}

	public function hapus($tabel6_field1 = null)
	{
		$this->declarew();

		$tabel6 = $this->tl6->ambil_tabel6_field1($tabel6_field1)->result();
		$tabel6_field3 = $tabel6[0]->img;

		unlink($this->views['tabel6_field3_upload_path'] . $tabel6_field3);
		$hapus = $this->tl6->hapus($tabel6_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_5['tabel6_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_6['tabel6_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel6/admin'));
	}

	// Cetak semua data
	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v4_title['tabel6_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel6')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v4['tabel6'], $data);
	}

	// Cetak satu data
}
