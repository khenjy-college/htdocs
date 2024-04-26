<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel12 extends Omnitags
{
	// Halaman publik

	
	// Halaman khusus akun


	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel12_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel12'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel12')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl12' => $this->tl12->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$config['upload_path'] = $this->views['tabel12_field3_upload_path'];
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->views_post['tabel12_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->views_input['tabel12_field3_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->views_input['tabel12_field3_input'])) {
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
			$this->aliases['tabel12_field1'] => '',
			$this->aliases['tabel12_field2'] => $this->views_post['tabel12_field2'],
			$this->aliases['tabel12_field3'] => $this->views_post['tabel12_field2'] . "." . $file_extension,
			$this->aliases['tabel12_field4'] => $this->views_post['tabel12_field4'],
		);

		$simpan = $this->tl12->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_1['tabel12_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_2['tabel12_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel12/admin'));
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$config['upload_path'] = $this->views['tabel12_field3_upload_path'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->views_post['tabel12_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->views_input['tabel12_field3_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->views_input['tabel12_field3_input'])) {
			$gambar = $this->views['tabel12_field3_alt'];
		} else {

			$upload = $this->upload->data();
			$gambar = $this->views_post['tabel12_field2'] . "." . $file_extension;
		}

		$tabel12_field1 = $this->views_post['tabel12_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel12_field2'] => $this->views_post['tabel12_field2'],
			$this->aliases['tabel12_field3'] => $gambar,
			$this->aliases['tabel12_field4'] => $this->views_post['tabel12_field4'],
		);

		$update = $this->tl12->update($data, $tabel12_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_3['tabel12_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_4['tabel12_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_m'], $this->flashdatas['v_flashdata_m_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('tabel12/admin'));
	}

	public function hapus($tabel12_field1 = null)
	{
		$this->declarew();

		$tabel12 = $this->tl12->ambil_tabel12_field1($tabel12_field1)->result();
		$img = $tabel12[0]->img;

		unlink($this->views['tabel12_field3_upload_path'] . $img);

		$hapus = $this->tl12->hapus($tabel12_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_5['tabel12_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_6['tabel12_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel12/admin'));
	}

	// Cetak semua data
	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v4_title['tabel12_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel12')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl12' => $this->tl12->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v4['tabel12'], $data);
	}
}
