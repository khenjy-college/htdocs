<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class tabel_e3 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun
	public function daftar($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v2_title['tabel_e3_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v2['tabel_e3'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl_e12->dekor('tabel_e3')->result(),
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl1' => $this->tl_e1->ambildata()->result(),
			'tbl3' => $this->tl_e2->ambildata()->result(),
			'tbl4' => $this->tl4->ambildata()->result(),
			'tbl5' => $this->tl_e3->ambil_tabel4_field1($this->session->userdata($this->aliases['tabel9_field1']))->result(),
			'tbl6' => $this->tl6->ambil_tabel4_field1($this->session->userdata($this->aliases['tabel9_field1']))->result(),
			'tbl8' => $this->tl8->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel_e3_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel_e3'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl_e12->dekor('tabel_e3')->result(),
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl4' => $this->tl4->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			'tbl5' => $this->tl_e3->ambildata()->result(),
			'tbl3' => $this->tl_e2->ambildata()->result(),
			'tbl8' => $this->tl8->ambildata()->result(),
			'tbl1' => $this->tl_e1->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman detail
	public function detail($tabel_e3_field1 = null, $tabel7_field1 = 1, $tabel1_field1 = null)
	{
		$this->declarew();

		$tabel_e3 = $this->tl_e3->ambil_tabel_e3_field1($tabel_e3_field1)->result();

		$param1 = $tabel_e3[0]->tgl_persetujuan;
		$param2 = $tabel_e3[0]->tgl_kedaluwarsa;

		switch ($tabel_e3[0]->status) {
			case $this->aliases['tabel_e3_field4_value0']:
				$data2 = array(
					$this->aliases['tabel_e3_field6'] => NULL,
					$this->aliases['tabel_e3_field7'] => NULL
				);
				$update = $this->tl_e3->update($data2, $tabel_e3_field1);
				$delete = $this->tl_e2->hapus_tabel_e3_field1($tabel_e3_field1);
				$value = '';
				$value2 = '';

				break;

			case $this->aliases['tabel_e3_field4_value1']:
				$value = '';
				$value2 = '';

				break;
			case $this->aliases['tabel_e3_field4_value2']:

				if ($param2 < date('Y-m-d H:i:s')) {
					$data2 = array(
						$this->aliases['tabel_e3_field4'] => $this->aliases['tabel_e3_field4_value0'],
						$this->aliases['tabel_e3_field6'] => NULL,
						$this->aliases['tabel_e3_field7'] => NULL
					);
					$delete = $this->tl_e2->hapus_tabel_e3_field1($tabel_e3_field1);
					$update = $this->tl_e3->update($data2, $tabel_e3_field1);

					$value = '';
					$value2 = '';
				} else {
					$StartTimeStamp = strtotime($param1);
					$EndTimeStamp = strtotime($param2);

					$TimeStamp = $EndTimeStamp - $StartTimeStamp;

					$numberdays = $TimeStamp / 60 / 60 / 24;

					$value = ($numberdays * $this->aliases['tabel_f2_field8_value1']);
					$value2 = '';
				}

				break;
			case $this->aliases['tabel_e3_field4_value3']:
				if ($param2 < date('Y-m-d H:i:s')) {
					$data2 = array(
						$this->aliases['tabel_e3_field4'] => $this->aliases['tabel_e3_field4_value4'],
					);
					$update = $this->tl_e3->update($data2, $tabel_e3_field1);

					$value = '';
					$value2 = '';
				} else {
					$value = '';
					$value2 = '';
				}

				break;
			case $this->aliases['tabel_e3_field4_value4']:
				$value = '';
				$value2 = '';
				break;
			case $this->aliases['tabel_e3_field4_value5']:
				if ($param2 < date('Y-m-d H:i:s')) {
					$data2 = array(
						$this->aliases['tabel_e3_field4'] => $this->aliases['tabel_e3_field4_value0'],
						$this->aliases['tabel_e3_field6'] => NULL,
						$this->aliases['tabel_e3_field7'] => NULL
					);
					$delete = $this->tl_e1->hapus_tabel_e3_field1($tabel_e3_field1);
					$delete = $this->tl_e2->hapus_tabel_e3_field1($tabel_e3_field1);
					$update = $this->tl_e3->update($data2, $tabel_e3_field1);

					$value = '';
					$value2 = '';
				} else {
					$StartTimeStamp = strtotime($param1);
					$EndTimeStamp = strtotime($param2);

					$TimeStamp = $EndTimeStamp - $StartTimeStamp;

					$numberdays = $TimeStamp / 60 / 60 / 24;

					$value = ($numberdays * $this->aliases['tabel_f2_field8_value1']);
					$value2 = '';
				}



				break;
			default:
				$value = 'tidak valid';
				$value2 = '';
		}



		// rumus harga total pesanan (bisa dijadikan sebuah fungsi jika menggunakan rumus yang kompleks)

		$data1 = array(
			$this->v_part1 => $this->views_v6_title['tabel_e3_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v6['tabel_e3'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl_e12->dekor('tabel_e3')->result(),
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl5' => $this->tl_e3->ambil_tabel_e3_field1($tabel_e3_field1)->result(),
			'tbl4' => $this->tl4->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			'tbl3' => $this->tl_e2->ambil_tabel_e3_field1($tabel_e3_field1)->result(),
			'tbl8' => $this->tl8->ambil_tabel_e3_field1($tabel_e3_field1)->result(),
			'tbl1' => $this->tl_e1->ambil_tabel_e3_field1($tabel_e3_field1)->result(),

			'count1' => $this->tl_e1->ambil_tabel_e3_field1($tabel_e3_field1)->num_rows(),
			'count8' => $this->tl8->ambil_tabel_e3_field1($tabel_e3_field1)->num_rows(),

			// Value ini adalah nilai unik yang dapat digunakan untuk masing-masing proses
			'valueku' => $value,
			'value2' => $value2
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}


	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_e3_field1'] => '',
			$this->aliases['tabel_e3_field2'] => $this->views_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field3'] => $this->views_post['tabel_e3_field3'],
			$this->aliases['tabel_e3_field4'] => $this->views_post['tabel_e3_field4'],
		);

		$simpan = $this->tl_e3->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_1['tabel_e3_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_2['tabel_e3_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update()
	{
		$this->declarew();

		$tabel_e3_field1 = $this->views_post['tabel_e3_field1'];
		$data = array(
			$this->aliases['tabel_e3_field2'] => $this->views_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field3'] => $this->views_post['tabel_e3_field3'],
			$this->aliases['tabel_e3_field4'] => $this->views_post['tabel_e3_field4'],
			$this->aliases['tabel_e3_field5'] => $this->views_post['tabel_e3_field5'],
		);

		$update = $this->tl_e3->update($data, $tabel_e3_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_3['tabel_e3_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_4['tabel_e3_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_status()
	{
		$this->declarew();

		$param1 = $this->views_post['tabel_e3_field1'];

		$param2 = date("Y-m-d") . " " . date("H:i:s", time());

		$limit = date("Y-m-d\TH:i:s", strtotime(" ". $this->aliases['tabel_e3_field7_limit1']));

		$data = array(
			$this->aliases['tabel_e3_field4'] => $this->views_post['tabel_e3_field4'],
			$this->aliases['tabel_e3_field6'] => $param2,
			$this->aliases['tabel_e3_field7'] => $limit
		);

		$update = $this->tl_e3->update($data, $param1);

		if ($update) {

			$this->session->set_flashdata('pesan', 'Status pesanan berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Status pesanan gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($tabel_e3_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl_e3->hapus($tabel_e3_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_5['tabel_e3_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_6['tabel_e3_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Cetak semua data
	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v4_title['tabel_e3_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl_e12->dekor('tabel_e3')->result(),
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl5' => $this->tl_e3->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v4['tabel_e3'], $data);
	}

	// Cetak satu data
	public function print($tabel_e3_field1 = null, $tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v5_title['tabel_e3'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl_e12->dekor('tabel_e3')->result(),
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl5' => $this->tl_e3->ambil_tabel_e3_field1($tabel_e3_field1)->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v5['tabel_e3'], $data);
	}
}
