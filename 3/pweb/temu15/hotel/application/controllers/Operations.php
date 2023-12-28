<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Operations extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel11_m = 'tl11';

	// deklarasi variabel views
	private $tabel11_v1;
	private $tabel11_v1_title;
	private $tabel11_v2;
	private $tabel11_v2_title;
	private $tabel11_v3;
	private $tabel11_v3_title;

	// deklarasi variabel controller
	private $tabel11_c1;
	private $tabel11_c2;
	private $tabel11_c3;
	private $tabel11_c4;
	private $tabel11_c5;
	private $tabel11_c6;
	private $tabel11_c7;
	private $tabel11_c8;
	private $tabel11_v_input1_post;
	private $tabel11_v_input1_alt;
	private $tabel11_v_input2_post;
	private $tabel11_v_input3_post;
	private $tabel11_v_input4_post;
	private $tabel11_v_input5_post;
	private $tabel11_v_input6_post;
	private $tabel11_v_flashdata1_msg_1;
	private $tabel11_v_flashdata1_msg_2;
	private $tabel11_v_flashdata1_msg_3;
	private $tabel11_v_flashdata1_msg_4;
	private $tabel11_v_flashdata1_msg_5;
	private $tabel11_v_flashdata1_msg_6;

	private $tabel11_v_flashdata3_msg_1;
	private $tabel11_v_flashdata4_msg_1;
	private $tabel5_c1;

	private $tabel5_v_input5_post;


	public function

	declare()
	{


		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel11_m = 'tl11';

		// deklarasi variabel views
		$this->tabel11_v1 = 'v_-' . $this->tabel11;
		$this->tabel11_v1_title = 'Daftar ' . $this->tabel11_alias;
		$this->tabel11_v2 = 'v_admin-' . $this->tabel11;
		$this->tabel11_v2_title = 'Data ' . $this->tabel11_alias;
		$this->tabel11_v3 = '_laporan/laporan_' . $this->tabel11;
		$this->tabel11_v3_title = 'Laporan ' . $this->tabel11_alias;

		// deklarasi variabel controller
		$this->tabel11_c1 = $this->tabel11;
		$this->tabel11_c2 = $this->tabel11 . '/tambah';
		$this->tabel11_c3 = $this->tabel11 . '/update';
		$this->tabel11_c4 = $this->tabel11 . '/hapus';
		$this->tabel11_c5 = $this->tabel11 . '/laporan';

		// tabel bagian input
		$this->tabel11_v_input1_post = $this->input->post($this->tabel11_field1);
		$this->tabel11_v_input1_alt = '';
		$this->tabel11_v_input2_post = $this->input->post($this->tabel11_field2);
		$this->tabel11_v_input3_post = $this->input->post($this->tabel11_field3);
		$this->tabel11_v_input4_post = $this->input->post($this->tabel11_field4);
		$this->tabel11_v_input5_post = $this->input->post($this->tabel11_field5);
		$this->tabel11_v_input6_post = $this->input->post($this->tabel11_field6);

		// deklarasi variabel bagian v_flashdata
		$this->tabel11_v_flashdata1_msg_1 = 'Data ' . $this->tabel11_alias . ' berhasil disimpan!';
		$this->tabel11_v_flashdata1_msg_2 = 'Data ' . $this->tabel11_alias . ' gagal disimpan!';
		$this->tabel11_v_flashdata1_msg_3 = 'Data ' . $this->tabel11_alias . ' berhasil diubah!';
		$this->tabel11_v_flashdata1_msg_4 = 'Data ' . $this->tabel11_alias . ' gagal diubah!';
		$this->tabel11_v_flashdata1_msg_5 = 'Data ' . $this->tabel11_alias . ' berhasil dihapus!';
		$this->tabel11_v_flashdata1_msg_6 = 'Data ' . $this->tabel11_alias . ' gagal dihapus!';

		// deklarasi variabel menampilkan pesan modal
		$this->tabel11_v_flashdata3_msg_1 =  '';
		$this->tabel11_v_flashdata4_msg_1 = '';

		$this->tabel5_c1 = $this->tabel5;
		$this->tabel5_v_input5_post = $this->input->post($this->tabel5_field4);
	}




	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel11_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel11_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel11' =>  $this->tl11->ambildata()->result(),
			'tabel4' =>  $this->tl4->ambildata()->result(),
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tgl = date("Y-m-d") . " " . date("h:m:s", time());

		$where = $this->tabel11_v_input2_post;
		$data = array(
			$this->tabel11_field1 => $this->tabel11_v_input1_alt,
			$this->tabel11_field2 => $where,
			$this->tabel11_field3 => $this->tabel11_v_input3_post,
			$this->tabel11_field4 => $this->tabel11_v_input4_post,
			$this->tabel11_field5 => $this->tabel11_v_input5_post,
			$this->tabel11_field6 => $tgl
		);

		$status = array(
			$this->tabel5_field4 => $this->tabel5_v_input5_post,
		);
		$update_status = $this->kmr->update($status, $where);

		$simpan = $this->tl11->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel11_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel11_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel5_c1));
	}

	// Fungsi update saat ini belum dibutuhkan karena operations saat ini pada dasarnya adalah
	// Data untuk menyimpan history dari operasi yang dilakukan oleh hotel 
	// Namun tidak menutup kemungkinan bahwa fitur ini akan digunakan nantinya
	public function update()
	{
	}

	public function hapus($id_operations = null)
	{
		$this->declare();
		$hapus = $this->tl11->hapus($id_operations);

		if ($hapus) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel11_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel11_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel11_c1));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel11_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel11' =>  $this->tl11->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel11_v3, $data);
	}

	// Fitur ini masih perencanaan
	// Rencananya petugas bisa login sebagai akun juga dan bisa melihat daftar operasi yang telah dilakukannya
	// Namun mengingat use case dan kebutuhan yang sepertinya minim 
	// Untuk sementara ini disimpan untuk kepentingan ke depan
	// public function daftar($tabel7_field1 = 1)
	// {
	// 	$this->declare();
	// 	$where = $this->session->userdata($this->tabel9_userdata1);
	// 	$data = array(
	// 		$this->v_part1 => $this->tabel11_v1_title,
	// 		$this->v_part2 => $this->head,
	// 		$this->v_part3 => $this->tabel11_v1,
	// 		'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
	// 		'tabel11' =>  $this->tl11->ambil_id_user($where)->result()
	// 	);

	// 	$this->load->view($this->v7, $data);
	// }

	// Kemungkinan bakal ada fitur status dalam pengelolaan operasi yang dilakukan oleh petugas
	// Namun mengingat kebutuhan yang sangat minim, saat ini fitur ini disimpan dulu
	// public function update_status($tabel7_field1 = 1)
	// {
	// 	$this->declare();
	// 	$where = $this->tabel11_v_input1_post;
	// 	$data = array(
	// 		'status' => $this->input->post('status')
	// 	);

	// 	// jika status pesanan cek in
	// 	if ($this->input->post('status') == 'cek in') {

	// 		// hanya merubah status pesanan
	// 		$update = $this->tl11->update($data, $where);

	// 		// jika status pesanan cek out
	// 	} elseif ($this->input->post('status') == 'cek out') {

	// 		// menghapus data pesanan supaya trigger tambah_kamar dapat berjalan
	// 		$hapus = $this->tl11->hapus($where);

	// 		// memasukkan nama resepsionis yang melakukan operasi
	// 		$data = array(
	// 			'user_aktif' => $this->session->userdata('nama')
	// 		);

	// 		// mengupdate pesanan dengan nama user yang aktif
	// 		$update = $this->tl11->update_pesanan($data, $where);
	// 	}

	// 	if ($update) {

	// 		$this->session->set_flashdata($this->v_flashdata1, 'Status pesanan berhasil diubah!');
	// 		$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
	// 	} else {

	// 		$this->session->set_flashdata($this->v_flashdata1, 'Status pesanan gagal diubah!');
	// 		$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
	// 	}

	// 	redirect(site_url($this->tabel11_c1));
	// }
}
