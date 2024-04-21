<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel7 extends Omnitags
{
	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		// Cache control headers
		header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.

		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel7_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel7'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel7')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl13' => $this->tl13->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function update()
	{
		$this->declarew();

		$tabel7_field1 = $this->views_post['tabel7_field1'];
		$data = array(
			$this->aliases['tabel7_field2'] => $this->views_post['tabel7_field2'],
			$this->aliases['tabel7_field6'] => $this->views_post['tabel7_field6'],
			$this->aliases['tabel7_field7'] => $this->views_post['tabel7_field7'],
			$this->aliases['tabel7_field8'] => $this->views_post['tabel7_field8'],
			$this->aliases['tabel7_field9'] => $this->views_post['tabel7_field9'],
			$this->aliases['tabel7_field10'] => $this->views_post['tabel7_field10'],
			$this->aliases['tabel7_field11'] => $this->views_post['tabel7_field11'],
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_3['tabel7_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_4['tabel7_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel7/admin'));
	}

	public function update_tabel7_field12()
	{
		$this->declarew();

		$tabel7_field1 = $this->views_post['tabel7_field1'];
		$data = array(
			$this->aliases['tabel7_field12'] => $this->views_post['tabel7_field12'],
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel7_v_flashdata1_msg_13']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_o'], $this->flashdatas['v_flashdata_o_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel7_v_flashdata1_msg_14']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_o'], $this->flashdatas['v_flashdata_o_func1']);
		}

		redirect(site_url('tabel7/admin'));
	}

	public function update_tabel7_field3()
	{
		$this->declarew();

		$table = $this->tl7->ambil_tabel7_field1($this->views_post['tabel7_field1'])->result();
		$tabel7_field3 = $table[0]->favicon;
		unlink($this->views['tabel7_field3_upload_path'] . $tabel7_field3);

		$config['upload_path'] = $this->views['tabel7_field3_upload_path'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->aliases['tabel7_field3'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->views_input['tabel7_field3_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->views_input['tabel7_field3_input'])) {
			$gambar = $this->views['tabel7_field3_alt'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel7_field1 = $this->views_post['tabel7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel7_field3'] => $this->aliases['tabel7_field3'] . "." . $file_extension,
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel7_v_flashdata1_msg_7']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel7_v_flashdata1_msg_8']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_m'], $this->flashdatas['v_flashdata_m_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('tabel7/admin'));
	}

	public function update_tabel7_field4()
	{
		$this->declarew();

		$table = $this->tl7->ambil_tabel7_field1($this->views_post['tabel7_field1'])->result();
		$tabel7_field4 = $table[0]->logo;
		unlink($this->views['tabel7_field4_upload_path'] . $tabel7_field4);

		$config['upload_path'] = $this->views['tabel7_field4_upload_path'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->aliases['tabel7_field4'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->views_input['tabel7_field4_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->views_input['tabel7_field4_input'])) {
			$gambar = $this->views['tabel7_field4_alt'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel7_field1 = $this->views_post['tabel7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel7_field4'] => $this->aliases['tabel7_field4'] . "." . $file_extension,
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel7_v_flashdata1_msg_9']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel7_v_flashdata1_msg_10']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_m'], $this->flashdatas['v_flashdata_m_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('tabel7/admin'));
	}

	public function update_tabel7_field5()
	{
		$this->declarew();

		$table = $this->tl7->ambil_tabel7_field1($this->views_post['tabel7_field1'])->result();
		$tabel7_field5 = $table[0]->foto;
		unlink($this->views['tabel7_field5_upload_path'] . $tabel7_field5);

		$config['upload_path'] = $this->views['tabel7_field5_upload_path'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->aliases['tabel7_field5'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->views_input['tabel7_field5_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->views_input['tabel7_field5_input'])) {
			$gambar = $this->views['tabel7_field5_alt'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel7_field1 = $this->views_post['tabel7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel7_field5'] => $this->aliases['tabel7_field5'] . "." . $file_extension,
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel7_v_flashdata1_msg_11']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel7_v_flashdata1_msg_12']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_m'], $this->flashdatas['v_flashdata_m_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('tabel7/admin'));
	}
}
