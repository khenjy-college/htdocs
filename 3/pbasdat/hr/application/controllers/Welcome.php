<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Welcome extends Omnitags
{
	// fungsi pertama yang akan diload oleh website
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();
		
		// Cache control headers
		header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.

		// mengarahkan pengguna ke halaman masing-masing sesuai level
		switch ($this->session->userdata($this->aliases['tabel9_field6'])) {
			case $this->aliases['tabel9_field6_value2']:
			case $this->aliases['tabel9_field6_value3']:
			case $this->aliases['tabel9_field6_value4']:

				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['v6_flashdata1_msg1']);
				$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);

				redirect(site_url('welcome/dashboard'));
				break;

			default:
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['v6_flashdata1_msg1']);
				$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);

				// When you're the one who's developing this app, it's quite annoying to see this message over and over again.\
				// The feature below isn't working as expected
				// if ($this->session->userdata($this->aliases['tabel9_field7']) < 2) {
				// 	$this->session->set_flashdata($this->flashdatas['v_flashdata14, $this->flashdatas['v_flashdata14_msg1);
				// 	$this->session->set_flashdata($this->flashdatas['v_flashdata_n, $this->flashdatas['v_flashdata_n_func1']);
				// } else {
				// }

				$data1 = array(
					$this->declarew(),

					$this->v_part1 => $this->views['v6_title'],
					$this->v_part3 => $this->views['v6'],
					$this->v_part2 => $this->head,
					$this->v_part4 => $this->v_part4_msg1,
					$this->v_part5 => $this->tl12->dekor('v6')->result(),
					'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
					'tbl13' => $this->tl13->ambildata()->result(),
				);

				$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

				$this->load->view($this->views['v1'], $data);
		}
	}

	public function dashboard($tabel7_field1 = 1)
	{
		$this->declarew();
		
		$chart_tabel2 = $this->tl6->getChartTabel2();
		$chart_tabel8 = $this->tl6->getChartTabel8();

		$data1 = array(
			$this->v_part1 => $this->views['v5_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['v5'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('v5')->result(),
			'tbl1' => $this->tl1->ambildata()->num_rows(),
			'tbl3' => $this->tl3->ambildata()->num_rows(),
			'tbl4' => $this->tl4->ambildata()->num_rows(),
			'tbl5' => $this->tl5->ambildata()->num_rows(),
			'tbl6' => $this->tl6->ambildata()->num_rows(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->ambildata()->num_rows(),
			'tbl9' => $this->tl9->ambildata()->num_rows(),
			'tbl10' => $this->tl10->ambildata()->num_rows(),

			'chart_tabel2' => json_encode($chart_tabel2),
			'chart_tabel8' => json_encode($chart_tabel8),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// fungsi ketika pengguna mengunjungi halaman yang tidak sesuai dengan level
	public function no_level($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['v4_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('v4')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v4'], $data);
	}
}
