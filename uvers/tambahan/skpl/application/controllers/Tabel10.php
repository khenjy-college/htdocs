<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel10 extends Omnitags
{
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		// $param1 = $this->views['tabel10_v_input7_filter1_get'];
		// $param2 = $this->views['tabel10_v_input7_filter2_get'];

		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v2_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel10_v2'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->join_tabel8()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tgl_transaksi_min' => $param1,
			// 'tgl_transaksi_max' => $param2,
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);


		$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['v_flashdata1_msg1']);
		$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);

		$this->load->view($this->views['v1'], $data);
	}

	// Fungsi di bawah ini sebaiknya menggunakan fungsi join untuk menampilkan data yang sesuai kebutuhan yang telah ditentukan
	public function history($tabel7_field1 = 1)
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		// $param1 = $this->views['tabel10_v_input7_filter1_get'];
		// $param2 = $this->views['tabel10_v_input7_filter2_get'];

		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v2_alt_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel10_v2_alt'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->join_tabel2()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tgl_transaksi_min' => $param1,
			// 'tgl_transaksi_max' => $param2,
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}


	public function tambah()
	{
		// Masih membutuhkan kode untuk mencegah hal ini terjadi lebih dari satu kali dengan id tabel8 yang sama
		$this->declarew();

		$tabel10_field3 = $this->views['tabel10_v_input3_post'];
		$tabel10_field6 = $this->views['tabel10_v_input6_post'];

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel10_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		// $kembalian = $this->tl8->get('harga_total') - $bayar;

		$data = array(
			$this->aliases['tabel10_field1'] => $this->views['tabel10_v_input1_alt'],
			$this->aliases['tabel10_field2'] => $this->session->userdata($this->aliases['base_url'] . $this->aliases['tabel9_field1']),
			$this->aliases['tabel10_field3'] => $tabel10_field3,
			$this->aliases['tabel10_field4'] => $this->views['tabel10_v_input4_post'],
			$this->aliases['tabel10_field5'] => $this->views['tabel10_v_input5_post'],
			$this->aliases['tabel10_field6'] => $tabel10_field6,
			$this->aliases['tabel10_field7'] => $tabel10_field7,
		);

		$this->session->set_tempdata($this->aliases['tabel9_field3'] . '_' . $this->aliases['tabel10'], $tabel10_field3, 300);

		// Session kembalian_transaksi sebenarnya digunakan ketika menggunakan cash, namun fungsi ini akan tetap disimpan untuk pengembangan lebih lanjut
		// $this->session->set_tempdata('kembalian_transaksi', $kembalian, 300);


		// $query = 'INSERT INTO transaksi VALUES('.$data.')';

		$simpan = $this->tl10->simpan($data);
		// $simpan = $this->tl10->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel10_v_flashdata1_msg_1']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel10_v_flashdata1_msg_2']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		// fitur mengubah status ini seharusnya berada di bagian pesanan cman saya belum bisa menemukan algoritma yang pas jadi akan disimpan untuk pengembangan di kemudian hari
		$tabel10_field4 = $this->views['tabel10_v_input4_post'];
		$status = array(
			$this->aliases['tabel8_field12'] => $this->views['tabel8_input12_post'],
		);

		if ($this->views['tabel8_input12_post'] === $this->aliases['tabel8_field12_value3']) {

			// hanya merubah status pesanan
			$update = $this->tl8->update($status, $tabel10_field4);

			if ($update) {
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel10_v_flashdata1_msg_7']);
				$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
			} else {
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel10_v_flashdata1_msg_8']);
				$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
			}
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel10_v_flashdata1_msg_9']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel10/konfirmasi'));
	}


	public function update()
	{
		$this->declarew();

		$tabel10_field1 = $this->views['tabel10_v_input1_post'];

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel10_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		$data = array(
			$this->aliases['tabel10_field5'] => $this->views['tabel10_v_input5_post'],
			$this->aliases['tabel10_field6'] => $this->views['tabel10_v_input6_post'],
			$this->aliases['tabel10_field7'] => $tabel10_field7,
		);

		$update = $this->tl10->update($data, $tabel10_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel10_v_flashdata1_msg_3']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel10_v_flashdata1_msg_4']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel10'));
	}

	public function hapus($tabel10_field1 = null)
	{
		$this->declarew();

		$tabel10 = $this->tl10->ambil_tabel10_field1($tabel10_field1)->result();
		$hapus = $this->tl10->hapus($tabel10_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel10_v_flashdata1_msg_5']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel10_v_flashdata1_msg_6']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel10'));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v3_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			'tbl8' => $this->tl8->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel10_v3'], $data);
	}

	public function daftar($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field1 = $this->session->userdata($this->aliases['base_url'] . $this->aliases['tabel9_field1']);
		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v1_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel10_v1'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->join_tabel8_tamu($tabel9_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function daftar_history($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field1 = $this->session->userdata($this->aliases['base_url'] . $this->aliases['tabel9_field1']);
		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v1_alt_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel10_v1_alt'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->join_tabel2_tamu($tabel9_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Fitur filter untuk saat ini akan tidak digunakan terlebih dahulu
	public function filter($tabel7_field1 = 1)
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		$tabel10_field7_filter1 = $this->views['tabel10_v_input7_filter1_get'];
		$tabel10_field7_filter2 = $this->views['tabel10_v_input7_filter2_get'];

		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v2_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel10_v2'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->filter($tabel10_field7_filter1, $tabel10_field7_filter2)->result(),
			'tbl8' => $this->tl8->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel10_v_input7_filter1' => $tabel10_field7_filter1,
			'tabel10_v_input7_filter2' => $tabel10_field7_filter2,
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}


	public function konfirmasi($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel10_field3 = $this->session->tempdata($this->aliases['tabel10_field3'] . '_' . $this->aliases['tabel10']);
		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v5_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tbl10' => $this->tl10->ambil_tabel9_field3($tabel10_field3)->last_row(),
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel10_v5'], $data);
	}


	// Fitur receipt menurutku tidak memerlukan fitur join sama sekali 
	// karena sudah menggunakan parameter yang memilki nilai
	public function receipt($tabel10_field1 = null, $tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v4_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->ambil_tabel10_field1($tabel10_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);


		// Di bawah ini adalah kode untuk memisahkan antara transaksi yang id pesanannya masih berada di tabel pesanann
		// Dan transaksi yang id pesanananya sudah berada di tabel history

		$param1 = $this->tl10->ambil_tabel10_field1($tabel10_field1)->result();
		$param2 = $param1[0]->id_pesanan;

		$method = $this->tl2->ambil_tabel2_field2($param2);


		if ($method->num_rows() > 0) {
			$data2 = array(
				'tbl2' => $this->tl2->ambildata()->result(),
			);
			$data = array_merge($data1, $data2, $this->aliases);
			$this->load->view($this->views['tabel2_v4'], $data);
		} else {
			$data2 = array(
				'tbl8' => $this->tl8->ambildata()->result(),
			);
			$data = array_merge($data1, $data2, $this->aliases);
			$this->load->view($this->views['tabel10_v4'], $data);
		}
	}
}
