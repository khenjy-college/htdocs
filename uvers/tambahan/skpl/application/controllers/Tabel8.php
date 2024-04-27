<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';
session_write_close();
class Tabel8 extends Omnitags
{
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();

		// nilai min dan max di sini belum ada
		$param1 = $this->views['tabel8_v_input10_filter1_get'];
		$param2 = $this->views['tabel8_v_input10_filter2_get'];
		$param3 = $this->views['tabel8_v_input11_filter1_get'];
		$param4 = $this->views['tabel8_v_input11_filter2_get'];

		$data1 = array(
			$this->v_part1 => $this->views['tabel8_v2_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel8_v2'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->ambildata()->result(),
			'tbl5' => $this->tl5->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel8_v_input10_filter1_value' => $param1,
			'tabel8_v_input10_filter2_value' => $param2,
			'tabel8_v_input11_filter1_value' => $param3,
			'tabel8_v_input11_filter2_value' => $param4
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$param4 = $this->views['tabel8_v_input4_post'];
		$param8 = $this->views['tabel8_v_input8_post'];

		$param10 = $this->views['tabel8_v_input10_post']; //cek in
		$param11 = $this->views['tabel8_v_input11_post']; //cek out

		// di bawah ini adalah fungsi untuk tabel8
		$startTimeStamp = strtotime($param10);
		$endTimeStamp = strtotime($param11);

		$timedif = $endTimeStamp - $startTimeStamp;
		$numberdays = $timedif / 60 / 60 / 24; // 86400 seconds in one day

		$tabel6_field1 = $this->views['tabel8_v_input7_post'];
		$tabel6 = $this->tl6->ambil_tabel6_field1($tabel6_field1)->result();

		// rumus harga total pesanan (bisa dijadikan sebuah fungsi jika menggunakan rumus yang kompleks)
		$harga_total = ($numberdays * $tabel6[0]->harga);

		$data = array(
			$this->aliases['tabel8_field1'] => $this->views['tabel8_v_input1_alt'],
			$this->aliases['tabel8_field2'] => $this->views['tabel8_v_input2_post'],
			$this->aliases['tabel8_field3'] => $this->views['tabel8_v_input3_post'],
			$this->aliases['tabel8_field4'] => $param4,
			$this->aliases['tabel8_field5'] => $this->views['tabel8_v_input5_post'],
			$this->aliases['tabel8_field6'] => $this->views['tabel8_v_input6_post'],
			$this->aliases['tabel8_field7'] => $this->views['tabel8_v_input7_post'],
			$this->aliases['tabel8_field8'] => $param8,
			$this->aliases['tabel8_field9'] => $harga_total,
			$this->aliases['tabel8_field10'] => $this->views['tabel8_v_input10_post'],
			$this->aliases['tabel8_field11'] => $this->views['tabel8_v_input11_post'],

			// status akan kuubah menjadi pending karena resepsionis wajib memilihkan kamar untuk user
			$this->aliases['tabel8_field12'] => $this->aliases['tabel8_field12_value1'],
			// 'status' => "belum bayar"

		);

		// membuat session supaya nilainya dapat digunakan selama waktu yang ditentukan dalam detik
		$this->session->set_tempdata($this->aliases['tabel9_field3'] . '_' . $this->aliases['tabel8'], $param4, 300);

		$simpan = $this->tl8->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel8_v_flashdata1_msg_1']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel8_v_flashdata1_msg_2']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel8/konfirmasi'));
	}

	public function update()
	{
		// this function is not really reccessary since only status that can be changed
	}


	public function hapus($tabel8_field1 = null)
	{
		$this->declarew();

		$tabel8_field1 = $this->views['tabel8_v_input1_post'];
		$status = $this->views['tabel8_v_input12_post'];

		$hapus = $this->tl8->hapus($tabel8_field1);

		// memasukkan nama resepsionis yang melakukan operasi
		$data = array(
			$this->aliases['tabel2_field14'] => $this->session->userdata($this->aliases['tabel9_field2'])
		);

		// mengupdate history dengan nama user yang aktif
		$update_tabel2 = $this->tl2->update_tabel2($data, $tabel8_field1);

		if ($hapus && $update_tabel2) {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel8_v_flashdata1_msg_3']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel8_v_flashdata1_msg_4']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel8'));
	}


	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel8_v3_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel8_v3'], $data);
	}

	public function pemesanan($tabel7_field1 = 1)
	{
		$this->declarew();

		switch ($this->session->userdata($this->aliases['tabel9_field6'])) {
			case $this->aliases['tabel9_field6_value5']:
				$data1 = array(
					$this->v_part1 => $this->views['tabel8_v6_title'],
					$this->v_part2 => $this->head,
					$this->v_part3 => $this->views['tabel8_v6'],
					$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
					'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
					'tbl6' => $this->tl6->ambildata()->result(),

					'tabel8_v_input10_value' => $this->views['tabel8_v_input10_get'],
					'tabel8_v_input11_value' => $this->views['tabel8_v_input11_get'],
					'tabel8_v_input8_value' => $this->views['tabel8_v_input8_get'],
				);

				$halaman = $this->views['v1'];
				break;

			default:
				$data1 = array(
					$this->v_part1 => $this->views['v2_title'],
					$this->v_part2 => $this->head,
					$this->v_part4 => $this->v_part4_msg1,
					$this->v_part5 => $this->tl12->dekor('v2')->result(),
					'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result()

				);
				$halaman = $this->views['v2'];
		}

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel8_v_flashdata1_msg2']);
		$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);

		$this->load->view($halaman, $data);
	}

	public function daftar($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field1 = $this->session->userdata($this->aliases['tabel9_field1']);
		$data1 = array(
			$this->v_part1 => $this->views['tabel8_v1_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel8_v1'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->ambil_tabel9_field1($tabel9_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			'tbl5' => $this->tl5->ambildata()->result(),

		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function cari($tabel7_field1 = 1)
	{
		$this->declarew();

		$param1 = $this->views['tabel8_v_input1_get'];
		$param2 = $this->views['tabel8_v_input4_get'];

		$data1 = array(
			$this->v_part1 => $this->views['tabel8_v1_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel8_v1'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),

			// mencari dan menampilkan id pesanan berdasarkan id_pesanan yang telah diinput
			'tbl8' => $this->tl8->cari($param1, $param2)->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			'tbl5' => $this->tl5->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}


	// bagian update status untuk sementara kubiarkan tidak menggunakan variabel untuk sementara waktu
	// hal ini ditujukan untuk keperluan penelitian penggunaan array
	public function update_status()
	{
		$this->declarew();

		$tabel8_field1 = $this->views['tabel8_v_input1_post'];
		
		$data = array(
			$this->aliases['tabel8_field12'] => $this->views['tabel8_v_input12post'],
		);

		// jika status pesanan cek in
		if ($this->views['tabel8_v_input12_post'] == $this->aliases['tabel8_field12_value4']) {

			// hanya merubah status pesanan
			$update = $this->tl8->update($data, $tabel8_field1);

			// jika status pesanan cek out
		} elseif ($this->views['tabel8_v_input12_post'] == $this->aliases['tabel8_field12_value5']) {

			// menghapus data pesanan supaya trigger tambah_kamar dapat berjalan
			$hapus = $this->tl8->hapus($tabel8_field1);

			// memasukkan nama resepsionis yang melakukan operasi
			$data = array(
				$this->aliases['tabel2_field15'] => $this->session->userdata($this->aliases['tabel9_field1'])
			);

			// mengupdate pesanan dengan nama user yang aktif
			$update = $this->tl2->update_tabel2($data, $tabel8_field1);
		}

		if ($update) {

			$this->session->set_flashdata('pesan', 'Status pesanan berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Status pesanan gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('tabel8'));
	}

	public function konfirmasi($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field3 = $this->session->tempdata($this->aliases['tabel9_field3'] . '_' . $this->aliases['tabel8']);
		$data1 = array(
			$this->v_part1 => $this->views['tabel8_v7_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tbl8' => $this->tl8->ambil_tabel9_field3($tabel9_field3)->last_row(),
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel8_v7'], $data);
	}


	public function print($tabel8_field1 = null, $tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel8_v4_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->ambil_tabel8_field1($tabel8_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel8_v4'], $data);
	}

	public function filter($tabel7_field1 = 1)
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->views['tabel8_v_input10_filter1_get'];
		$param2 = $this->views['tabel8_v_input10_filter2_get'];
		$param3 = $this->views['tabel8_v_input11_filter1_get'];
		$param4 = $this->views['tabel8_v_input11_filter2_get'];

		$data1 = array(
			$this->v_part1 => $this->views['tabel8_v2_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel8_v2'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->filter($param1, $param2, $param3, $param4)->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			'tbl5' => $this->tl5->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel8_v_input10_filter1_value' => $param1,
			'tabel8_v_input10_filter2_value' => $param2,
			'tabel8_v_input11_filter1_value' => $param3,
			'tabel8_v_input11_filter2_value' => $param4
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}


	public function filter_tamu($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field1 = $this->session->userdata($this->aliases['tabel9_field1']);
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->views['tabel8_v_input10_filter1_get'];
		$param2 = $this->views['tabel8_v_input10_filter2_get'];
		$param3 = $this->views['tabel8_v_input11_filter1_get'];
		$param4 = $this->views['tabel8_v_input11_filter2_get'];

		$data1 = array(
			$this->v_part1 => $this->views['tabel2_v1_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel2_v1'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel2')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->filter_tamu($param1, $param2, $param3, $param4, $tabel9_field1)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel8_v_input10_filter1_value' => $param1,
			'tabel8_v_input10_filter2_value' => $param2,
			'tabel8_v_input11_filter1_value' => $param3,
			'tabel8_v_input11_filter2_value' => $param4
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}
	
	public function book($tabel7_field1 = 1)
	{
		$this->declarew();

		// hanya merubah status pesanan berdasarkan id pesanan
		$tabel8_field1 = $this->views['tabel8_v_input1_post'];
		$data = array(
			$this->aliases['tabel8_field12'] => $this->aliases['tabel8_field12_value2'],
			$this->aliases['tabel8_field13'] => $this->views['tabel8_v_input13_post'],

		);

		$update = $this->tl8->update($data, $tabel8_field1);

		// hanya merubah id pesanan di tabel kamar berdasarkan no kamar
		$param = $this->views['tabel8_v_input13_post'];
		$tabel5 = array(
			$this->aliases['tabel5_field3'] => $this->views['tabel8_v_input1_post'],
			$this->aliases['tabel5_field4'] => $this->aliases['tabel5_field4_value3'],
		);
		$update_tabel5 = $this->tl5->update($tabel5, $param);


		if ($update_tabel5) {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel8_v_flashdata1_msg_3']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel8_v_flashdata1_msg_4']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel8'));
	}
}
