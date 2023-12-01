<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{

	public function index($id = 1)
	{
		// nilai min dan max di sini belum ada
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_admin-history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}

	public function daftar($id = 1)
	{
		$where = $this->session->userdata('id_user');

		// nilai min dan max di sini belum ada
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'History Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->ambil_id_user($where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}

	public function filter_cek_in($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_admin-history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->filter_cek_in($cek_in_min, $cek_in_max)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}
	public function filter_cek_out($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_admin-history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->filter_cek_out($cek_out_min, $cek_out_max)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}

	public function filter_cek_in_tamu($id = 1)
	{
		$where = $this->session->userdata('id_user');
		// nilai min dan max sudah diinput sebelumnya
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->filter_cek_in_tamu($cek_in_min, $cek_in_max, $where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}
	public function filter_cek_out_tamu($id = 1)
	{
		$where = $this->session->userdata('id_user');
		// nilai min dan max sudah diinput sebelumnya
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->filter_cek_out_tamu($cek_out_min, $cek_out_max, $where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view('template', $data);
	}

	public function hapus($id_history = null)
	{
		$hapus = $this->htr->hapus($id_history);
		redirect(site_url('history'));
	}
}
