<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel13 extends Omnitags
{
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel13_v2_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel13_v2'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel13')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl13' => $this->tl13->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$config['upload_path'] = $this->views['tabel13_v_input4_upload_path'];
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->views['tabel13_v_input4_post'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->views['tabel13_v_input4'])) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu


			$this->session->set_flashdata($this->flashdatas['v_flashdata3'], $this->flashdatas['tabel13_v_flashdata3_msg_1']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_c'], $this->flashdatas['v_flashdata_c_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->aliases['tabel13_field1'] => $this->views['tabel13_v_input1_alt'],
			$this->aliases['tabel13_field2'] => $this->views['tabel13_v_input2_post'],
			$this->aliases['tabel13_field3'] => $this->views['tabel13_v_input3_post'],
			$this->aliases['tabel13_field4'] => $gambar,
			$this->aliases['tabel13_field5'] => $this->views['tabel13_v_input5_post'],
		);

		$simpan = $this->tl13->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel13_v_flashdata1_msg_1']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel13_v_flashdata1_msg_2']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel13'));
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$config['upload_path'] = $this->views['tabel13_v_input4_upload_path'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->views['tabel13_v_input4_post'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->views['tabel13_v_input4'])) {
			$gambar = $this->views['tabel13_v_input4_alt'];
		} else {

			$upload = $this->upload->data();
			$gambar = $upload['file_name'];

		}

		$tabel13_field1 = $this->views['tabel13_v_input1_post'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel13_field2'] => $this->views['tabel13_v_input2_post'],
			$this->aliases['tabel13_field3'] => $this->views['tabel13_v_input3_post'],
			$this->aliases['tabel13_field4'] => $gambar,
			$this->aliases['tabel13_field5'] => $this->views['tabel13_v_input5_post'],
		);

		$update = $this->tl13->update($data, $tabel13_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel13_v_flashdata1_msg_3']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel13_v_flashdata1_msg_4']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_m'], $this->flashdatas['v_flashdata_m_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('tabel13'));
	}

	public function hapus($tabel13_field1 = null)
	{
		$this->declarew();

		$tabel13 = $this->tl13->ambil_tabel13_field1($tabel13_field1)->result();
		$img = $tabel13[0]->img;

		unlink($this->views['tabel13_v_input4_upload_path'] . $img);

		$hapus = $this->tl13->hapus($tabel13_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel13_v_flashdata1_msg_5']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel13_v_flashdata1_msg_6']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel13'));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel13_v3_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl13->dekor('tabel13')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl13' => $this->tl13->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel13_v3'], $data);
	}
}
