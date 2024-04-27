<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

// Jujurly masih banyak bagian di controller ini yang masih menggunakan variabel biasa dan bukan menggunakan declare
// Aku juga ingin membuat sebuah fitur history transaksi dimana pesanan yang sudah masuk history bakal masuk ke sana


// Saat ini ketika data yang ada di tabel transaksi dan history, data-data yang berada di tabel transaksi bakal hilang
// Hal ini merupakan hal yang sedang aku coba teliti kepentingannya
// Aku perlu meneliti lebih jauh, ini adalah kedua pilihan yang kumiliki :
// 1. Menambahkan fitur untuk melihat data transksi saja, lalu diberi opsi apakah user ingin melihat data pesanan
// atau data history yang terhubung dengan data transaksi, jika perlu maka akan dicek data pesanan atau history tersebut.
// Jika data ada, maka akan ditampilkan, jika tidak akan muncul notifikasi data tidak ada
// 2. Opsi kedua adalah untuk membiarkannya tidak menampilkan data 

class Tabel10 extends Omnitags
{
	// Halaman publik
	

	// Halaman khusus akun
	public function daftar($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field1 = $this->session->userdata($this->aliases['tabel9_field1']);
		$data1 = array(
			$this->v_part1 => $this->views_v2_title['tabel10_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v2['tabel10'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->join_tabel8_tamu($tabel9_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function daftar_history($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field1 = $this->session->userdata($this->aliases['tabel9_field1']);
		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v2_alt_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel10_v2_alt'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->join_tabel2_tamu($tabel9_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		// $param1 = $this->views['tabel10_field7_filter1_get'];
		// $param2 = $this->views['tabel10_field7_filter2_get'];

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel10_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel10'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->join_tabel8()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tgl_transaksi_min' => $param1,
			// 'tgl_transaksi_max' => $param2,
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);


		$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['v_flashdata1_msg1']);
		$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);

		$this->load->view($this->views['v1'], $data);
	}

	// Fungsi di bawah ini sebaiknya menggunakan fungsi join untuk menampilkan data yang sesuai kebutuhan yang telah ditentukan
	public function history($tabel7_field1 = 1)
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		// $param1 = $this->views['tabel10_field7_filter1_get'];
		// $param2 = $this->views['tabel10_field7_filter2_get'];

		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v3_alt_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel10_v3_alt'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->join_tabel2()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tgl_transaksi_min' => $param1,
			// 'tgl_transaksi_max' => $param2,
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}


	public function tambah()
	{
		// Masih membutuhkan kode untuk mencegah hal ini terjadi lebih dari satu kali dengan id tabel8 yang sama
		$this->declarew();

		$tabel10_field3 = $this->views_post['tabel10_field3'];
		$tabel10_field6 = $this->views_post['tabel10_field6'];

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel10_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		// $kembalian = $this->tl8->get('harga_total') - $bayar;

		$data = array(
			$this->aliases['tabel10_field1'] => '',
			$this->aliases['tabel10_field2'] => $this->session->userdata($this->aliases['tabel9_field1']),
			$this->aliases['tabel10_field3'] => $tabel10_field3,
			$this->aliases['tabel10_field4'] => $this->views_post['tabel10_field4'],
			$this->aliases['tabel10_field5'] => $this->views_post['tabel10_field5'],
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
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_1['tabel10_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_2['tabel10_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		// fitur mengubah status ini seharusnya berada di bagian pesanan cman saya belum bisa menemukan algoritma yang pas jadi akan disimpan untuk pengembangan di kemudian hari
		$tabel10_field4 = $this->views_post['tabel10_field4'];
		$status = array(
			$this->aliases['tabel8_field12'] => $this->views_post['tabel8_input12'],
		);

		if ($this->views_post['tabel8_input12'] === $this->aliases['tabel8_field12_value3']) {

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

		$tabel10_field1 = $this->views_post['tabel10_field1'];

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel10_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		$data = array(
			$this->aliases['tabel10_field5'] => $this->views_post['tabel10_field5'],
			$this->aliases['tabel10_field6'] => $this->views_post['tabel10_field6'],
			$this->aliases['tabel10_field7'] => $tabel10_field7,
		);

		$update = $this->tl10->update($data, $tabel10_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_3['tabel10_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_4['tabel10_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel10/admin'));
	}

	public function hapus($tabel10_field1 = null)
	{
		$this->declarew();

		$tabel10 = $this->tl10->ambil_tabel10_field1($tabel10_field1)->result();
		$hapus = $this->tl10->hapus($tabel10_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_5['tabel10_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_6['tabel10_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel10/admin'));
	}

	// Fitur filter untuk saat ini akan tidak digunakan terlebih dahulu
	public function filter($tabel7_field1 = 1)
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		$tabel10_field7_filter1 = $this->views['tabel10_field7_filter1_get'];
		$tabel10_field7_filter2 = $this->views['tabel10_field7_filter2_get'];

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel10_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel10'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->filter($tabel10_field7_filter1, $tabel10_field7_filter2)->result(),
			'tbl8' => $this->tl8->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel10_field7_filter1' => $tabel10_field7_filter1,
			'tabel10_field7_filter2' => $tabel10_field7_filter2,
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Cetak semua data
	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v4_title['tabel10_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl10' => $this->tl10->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			'tbl8' => $this->tl8->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v4['tabel10'], $data);
	}

	// Cetak satu data

	// Fitur print menurutku tidak memerlukan fitur join sama sekali 
	// karena sudah menggunakan parameter yang memilki nilai
	public function print($tabel10_field1 = null, $tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v5_title['tabel10'],
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
			$this->load->view($this->views_v5['tabel2'], $data);
		} else {
			$data2 = array(
				'tbl8' => $this->tl8->ambildata()->result(),
			);
			$data = array_merge($data1, $data2, $this->aliases);
			$this->load->view($this->views_v5['tabel10'], $data);
		}
	}

	// Fungsi khusus
	public function konfirmasi($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel10_field3 = $this->session->tempdata($this->aliases['tabel10_field3'] . '_' . $this->aliases['tabel10']);
		$data1 = array(
			$this->v_part1 => $this->views['tabel10_v6_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel10')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tbl10' => $this->tl10->ambil_tabel9_field3($tabel10_field3)->last_row(),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel10_v6'], $data);
	}
}
