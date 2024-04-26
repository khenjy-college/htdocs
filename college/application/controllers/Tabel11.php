<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel11 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun
	

	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel11_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel11'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel11')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl11' => $this->tl11->ambildata()->result(),
			'tbl4' => $this->tl4->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel11_field6 = date("Y-m-d") . " " . date("h:m:s", time());

		$tabel11_field2 = $this->views_post['tabel11_field2'];
		$data = array(
			$this->aliases['tabel11_field1'] => '',
			$this->aliases['tabel11_field2'] => $tabel11_field2,
			$this->aliases['tabel11_field3'] => $this->views_post['tabel11_field3'],
			$this->aliases['tabel11_field4'] => $this->views_post['tabel11_field4'],
			$this->aliases['tabel11_field5'] => $this->views_post['tabel11_field5'],
			$this->aliases['tabel11_field6'] => $tabel11_field6,
		);

		$status = array(
			$this->aliases['tabel5_field4'] => $this->views_post['tabel5_field4'],
		);
		$update_status = $this->tl5->update($status, $tabel11_field2);

		$simpan = $this->tl11->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_1['tabel11_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_2['tabel11_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel5/admin'));
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$tabel11_field1 = $this->views_post['tabel11_field1'];
		$data = array(
			$this->aliases['tabel11_field2'] => $this->views_post['tabel11_field2'],
			$this->aliases['tabel11_field3'] => $this->views_post['tabel11_field3'],
		);

		$update = $this->tl11->update($data, $tabel11_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_3['tabel11_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_4['tabel11_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}
		-
			redirect(site_url('tabel11/admin'));
	}

	public function hapus($tabel11_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl11->hapus($tabel11_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_5['tabel11_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_6['tabel11_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel11/admin'));
	}

	// Cetak semua data
	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v4_title['tabel11_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel11')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl11' => $this->tl11->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v4['tabel11'], $data);
	}
}
