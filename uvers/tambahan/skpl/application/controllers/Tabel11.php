<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel11 extends Omnitags
{
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel11_v2_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel11_v2'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel11')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl11' => $this->tl11->ambildata()->result(),
			'tbl4' => $this->tl4->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel11_field6 = date("Y-m-d") . " " . date("h:m:s", time());

		$tabel11_field2 = $this->views['tabel11_v_input2_post'];
		$data = array(
			$this->aliases['tabel11_field1'] => $this->views['tabel11_v_input1_alt'],
			$this->aliases['tabel11_field2'] => $tabel11_field2,
			$this->aliases['tabel11_field3'] => $this->views['tabel11_v_input3_post'],
			$this->aliases['tabel11_field4'] => $this->views['tabel11_v_input4_post'],
			$this->aliases['tabel11_field5'] => $this->views['tabel11_v_input5_post'],
			$this->aliases['tabel11_field6'] => $tabel11_field6,
		);

		$status = array(
			$this->aliases['tabel5_field4'] => $this->views['tabel5_v_input4_post'],
		);
		$update_status = $this->tl5->update($status, $tabel11_field2);

		$simpan = $this->tl11->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel11_v_flashdata1_msg_1']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel11_v_flashdata1_msg_2']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel5'));
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$tabel11_field1 = $this->views['tabel11_v_input1_post'];
		$data = array(
			$this->aliases['tabel11_field2'] => $this->views['tabel11_v_input2_post'],
			$this->aliases['tabel11_field3'] => $this->views['tabel11_v_input3_post'],
		);

		$update = $this->tl11->update($data, $tabel11_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel11_v_flashdata1_msg_3']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel11_v_flashdata1_msg_4']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}
		-
			redirect(site_url('tabel11'));
	}

	public function hapus($tabel11_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl11->hapus($tabel11_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel11_v_flashdata1_msg_5']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel11_v_flashdata1_msg_6']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel11'));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel11_v3_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel11')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl11' => $this->tl11->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel11_v3'], $data);
	}
}
