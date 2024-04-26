<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel5 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel5_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel5'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel5')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl5' => $this->tl5->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			'tbl4' => $this->tl4->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel5_field1'] => '',
			$this->aliases['tabel5_field2'] => $this->views_post['tabel5_field2'],
			$this->aliases['tabel5_field4'] => $this->views_post['tabel5_field4'],
		);

		$simpan = $this->tl5->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_1['tabel5_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_2['tabel5_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel5/admin'));
	}

	public function update()
	{
		$this->declarew();

		$tabel5_field1 = $this->views_post['tabel5_field1'];
		$data = array(
			$this->aliases['tabel5_field2'] => $this->views_post['tabel5_field2'],
			$this->aliases['tabel5_field3'] => $this->views_post['tabel5_field3'],
			$this->aliases['tabel5_field4'] => $this->views_post['tabel5_field4'],
			$this->aliases['tabel5_field5'] => $this->views_post['tabel5_field5'],
		);

		$update = $this->tl5->update($data, $tabel5_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_3['tabel5_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_4['tabel5_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}
		-
			redirect(site_url('tabel5/admin'));
	}

	public function hapus($tabel5_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl5->hapus($tabel5_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_5['tabel5_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_6['tabel5_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel5/admin'));
	}

	// Cetak semua data
	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v4_title['tabel5_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel5')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl5' => $this->tl5->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v4['tabel5'], $data);
	}

	// Cetak satu data
	
}
