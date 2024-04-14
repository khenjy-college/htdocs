<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Tabel12 extends Welcome
{
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel12_v2_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel12_v2'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel12')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl12' => $this->tl12->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$config['upload_path'] = $this->views['tabel12_v_input3_upload_path'];
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->views['tabel12_v_input2_post'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->views['tabel12_v_input3']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->views['tabel12_v_input3'])) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu


			$this->session->set_flashdata($this->flashdatas['v_flashdata3'], $this->flashdatas['tabel12_v_flashdata3_msg_1']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_c'], $this->flashdatas['v_flashdata_c_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->aliases['tabel12_field1'] => $this->views['tabel12_v_input1_alt'],
			$this->aliases['tabel12_field2'] => $this->views['tabel12_v_input2_post'],
			$this->aliases['tabel12_field3'] => $this->views['tabel12_v_input2_post'] . "." . $file_extension,
			$this->aliases['tabel12_field4'] => $this->views['tabel12_v_input4_post'],
		);

		$simpan = $this->tl12->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel12_v_flashdata1_msg_1']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel12_v_flashdata1_msg_2']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel12'));
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$config['upload_path'] = $this->views['tabel12_v_input3_upload_path'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->views['tabel12_v_input2_post'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->views['tabel12_v_input3']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->views['tabel12_v_input3'])) {
			$gambar = $this->views['tabel12_v_input3_alt'];
		} else {

			$upload = $this->upload->data();
			$gambar = $this->views['tabel12_v_input2_post'] . "." . $file_extension;
		}

		$tabel12_field1 = $this->views['tabel12_v_input1_post'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel12_field2'] => $this->views['tabel12_v_input2_post'],
			$this->aliases['tabel12_field3'] => $gambar,
			$this->aliases['tabel12_field4'] => $this->views['tabel12_v_input4_post'],
		);

		$update = $this->tl12->update($data, $tabel12_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel12_v_flashdata1_msg_3']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel12_v_flashdata1_msg_4']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_m'], $this->flashdatas['v_flashdata_m_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('tabel12'));
	}

	public function hapus($tabel12_field1 = null)
	{
		$this->declarew();

		$tabel12 = $this->tl12->ambil_tabel12_field1($tabel12_field1)->result();
		$img = $tabel12[0]->img;

		unlink($this->views['tabel12_v_input3_upload_path'] . $img);

		$hapus = $this->tl12->hapus($tabel12_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel12_v_flashdata1_msg_5']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel12_v_flashdata1_msg_6']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel12'));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel12_v3_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel12')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl12' => $this->tl12->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel12_v3'], $data);
	}
}
