<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel3 extends Omnitags
{
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel3_v2_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel3_v2'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel3')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl3' => $this->tl3->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel3_field1'] => $this->views['tabel3_v_input1_alt'],
			$this->aliases['tabel3_field2'] => $this->views['tabel3_v_input2_post'],
			$this->aliases['tabel3_field3'] => $this->views['tabel3_v_input3_post'],
		);

		// $query = 'INSERT INTO tabel3 VALUES('.$data.')';

		$simpan = $this->tl3->simpan($data);
		// $simpan = $this->tl3->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel3_v_flashdata1_msg_1']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel3_v_flashdata1_msg_2']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel3'));
	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();

		$tabel3_field1 = $this->views['tabel3_v_input1_post'];
		$data = array(
			$this->aliases['tabel3_field2'] => $this->views['tabel3_v_input2_post'],
			$this->aliases['tabel3_field3'] => $this->views['tabel3_v_input3_post'],
		);

		$update = $this->tl3->update($data, $tabel3_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel3_v_flashdata1_msg_3']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel3_v_flashdata1_msg_4']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel3'));
	}

	public function hapus($tabel3_field1 = null)
	{
		$this->declarew();

		$tabel3 = $this->tl3->ambil_tabel3_field1($tabel3_field1)->result();
		$tabel3_field3 = $tabel3[0]->img;

		unlink($this->views['tabel3_v_input3_upload_path'] . $tabel3_field3);
		$hapus = $this->tl3->hapus($tabel3_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel3_v_flashdata1_msg_5']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel3_v_flashdata1_msg_6']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel3'));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel3_v3_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel3')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl3' => $this->tl3->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel3_v3'], $data);
	}

	public function fasilitas($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel3_v1_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel3_v1'],
			$this->v_part5 => $this->tl12->dekor('tabel3')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl3' => $this->tl3->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}
}
