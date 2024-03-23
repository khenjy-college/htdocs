<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Welcome.php';

class Siswa extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel4_m = 'tl4';

	// deklarasi variabel views
	private $tabel4_v1;
	private $tabel4_v1_title;
	private $tabel4_v2;
	private $tabel4_v2_title;
	private $tabel4_v3;
	private $tabel4_v3_title;

	// deklarasi variabel controller
	private $tabel4_c1;
	private $tabel4_c2;
	private $tabel4_c3;
	private $tabel4_c4;
	private $tabel4_c5;
	private $tabel4_c6;
	private $tabel4_c7;
	private $tabel4_c8;
	private $tabel4_c9;
	private $tabel4_c10;
	private $tabel4_c11;
	private $tabel4_c12;
	private $tabel4_v_input1_post;
	private $tabel4_v_input1_alt;
	private $tabel4_v_input2_post;
	private $tabel4_v_input3_post;
	private $tabel4_v_input4_post;
	private $tabel4_v_input5_post;
	private $tabel4_v_input6_post;
	private $tabel4_v_input7_post;
	private $tabel4_v_input8_post;
	private $tabel4_v_flashdata1_msg_1;
	private $tabel4_v_flashdata1_msg_2;
	private $tabel4_v_flashdata1_msg_3;
	private $tabel4_v_flashdata1_msg_4;
	private $tabel4_v_flashdata1_msg_5;
	private $tabel4_v_flashdata1_msg_6;
	private $tabel4_v_flashdata3_msg_1;
	private $tabel4_v_flashdata4_msg_1;
	private $tabel4_userdata1;
	private $tabel4_tempdata1;
	private $tabel4_userdata2;
	private $tabel4_tempdata2;
	private $tabel4_userdata3;
	private $tabel4_tempdata3;
	private $tabel4_userdata4;
	private $tabel4_tempdata4;
	private $tabel4_userdata5;
	private $tabel4_tempdata5;
	private $tabel4_userdata6;
	private $tabel4_tempdata6;
	private $tabel4_userdata7;
	private $tabel4_tempdata7;
	private $tabel4_userdata8;
	private $tabel4_tempdata8;
	private $tabel4_userdata9;
	private $tabel4_tempdata9;
	public function

	declare()
	{


		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel4_m = 'tl4';

		// deklarasi variabel views
		$this->tabel4_v1 = 'v_' . $this->tabel4;
		$this->tabel4_v1_title = 'Daftar ' . $this->tabel4_alias;
		$this->tabel4_v2 = 'v_admin-' . $this->tabel4;
		$this->tabel4_v2_title = 'Data ' . $this->tabel4_alias;
		$this->tabel4_v3 = '_laporan/laporan_' . $this->tabel4;
		$this->tabel4_v3_title = 'Laporan ' . $this->tabel4_alias;

		// deklarasi variabel controller
		$this->tabel4_c1 = $this->tabel4;
		$this->tabel4_c2 = $this->tabel4 . '/tambah';
		$this->tabel4_c3 = $this->tabel4 . '/update';
		$this->tabel4_c4 = $this->tabel4 . '/hapus';
		$this->tabel4_c5 = $this->tabel4 . '/laporan';
		$this->tabel4_c6 = $this->tabel4 . '/profil';
		$this->tabel4_c7 = $this->tabel4 . '/login';
		$this->tabel4_c8 = $this->tabel4 . '/signup';
		$this->tabel4_c9 = $this->tabel4 . '/update_profil';
		$this->tabel4_c10 = $this->tabel4 . '/update_password';
		$this->tabel4_c11 = $this->tabel4 . '/ceklogin';
		$this->tabel4_c12 = $this->tabel4 . '/logout';


		// tabel bagian input
		$this->tabel4_v_input1_post = $this->input->post($this->tabel4_field1);
		$this->tabel4_v_input1_alt = '';
		$this->tabel4_v_input2_post = $this->input->post($this->tabel4_field2);
		$this->tabel4_v_input3_post = $this->input->post($this->tabel4_field3);
		$this->tabel4_v_input4_post = $this->input->post($this->tabel4_field4);
		$this->tabel4_v_input5_post = $this->input->post($this->tabel4_field5);
		$this->tabel4_v_input6_post = $this->input->post($this->tabel4_field6);
		$this->tabel4_v_input7_post = $this->input->post($this->tabel4_field7);
		$this->tabel4_v_input8_post = $this->input->post($this->tabel4_field8);

		// deklarasi variabel bagian v_flashdata
		$this->tabel4_v_flashdata1_msg_1 = 'Data ' . $this->tabel4_alias . ' berhasil disimpan!';
		$this->tabel4_v_flashdata1_msg_2 = 'Data ' . $this->tabel4_alias . ' gagal disimpan!';
		$this->tabel4_v_flashdata1_msg_3 = 'Data ' . $this->tabel4_alias . ' berhasil diubah!';
		$this->tabel4_v_flashdata1_msg_4 = 'Data ' . $this->tabel4_alias . ' gagal diubah!';
		$this->tabel4_v_flashdata1_msg_5 = 'Data ' . $this->tabel4_alias . ' berhasil dihapus!';
		$this->tabel4_v_flashdata1_msg_6 = 'Data ' . $this->tabel4_alias . ' gagal dihapus!';

		// deklarasi session
		$this->tabel4_userdata1 = $this->tabel4_field1;
		$this->tabel4_tempdata1 = $this->tabel4_field1;
		$this->tabel4_userdata2 = $this->tabel4_field2;
		$this->tabel4_tempdata2 = $this->tabel4_field2;
		$this->tabel4_userdata3 = $this->tabel4_field3;
		$this->tabel4_tempdata3 = $this->tabel4_field3;
		$this->tabel4_userdata4 = $this->tabel4_field4;
		$this->tabel4_tempdata4 = $this->tabel4_field4;
		$this->tabel4_userdata5 = $this->tabel4_field5;
		$this->tabel4_tempdata5 = $this->tabel4_field5;
		$this->tabel4_userdata6 = $this->tabel4_field6;
		$this->tabel4_tempdata6 = $this->tabel4_field6;
		$this->tabel4_userdata7 = $this->tabel4_field7;
		$this->tabel4_tempdata7 = $this->tabel4_field7;
		$this->tabel4_userdata8 = $this->tabel4_field8;
		$this->tabel4_tempdata8 = $this->tabel4_field8;
		$this->tabel4_userdata9 = $this->tabel4_field9;
		$this->tabel4_tempdata9 = $this->tabel4_field9;
	}



	public function index($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel4_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel4_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tbl4' =>  $this->tl4->ambildata()->result(),
			'tbl5' =>  $this->tl5->ambildata()->result(),
			'tbl6' =>  $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$param2 = $this->tabel4_v_input2_post;
		$param8 = $this->tabel4_v_input8_post;

		$method2 = $this->tl4->ceknama($param2);

		// mencari apakah jumlah data kurang dari 1
		if ($method2->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->input->post('konfirm') === $param8) {
				$this->load->library('encryption');

				$data = array(
					$this->tabel4_field1 => $this->tabel4_v_input1_post,
					$this->tabel4_field2 => $param2,
					$this->tabel4_field3 => $this->tabel4_v_input3_post,
					$this->tabel4_field4 => $this->tabel4_v_input4_post,
					$this->tabel4_field5 => $this->tabel4_v_input5_post,
					$this->tabel4_field6 => $this->tabel4_v_input6_post,
					$this->tabel4_field7 => $this->tabel4_v_input7_post,

					// mengubah password menjadi password berenkripsi
					$this->tabel4_field8 => password_hash($param8, PASSWORD_DEFAULT),

				);

				$simpan = $this->tl4->simpan($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if ($this->session->userdata($this->tabel4_field3)) {

					redirect(site_url($this->tabel4_c1));
				} else {

					redirect(site_url($this->tabel4_c7));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				$this->session->set_flashdata($this->v_flashdata1, 'Konfirmasi ' . $this->tabel4_field8 . ' salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->v_flashdata1,  $this->tabel4_field2 . 'telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declare();
		$where = $this->tabel4_v_input1_post;
		$data = array(
			$this->tabel4_field1 => $this->tabel4_v_input1_post,
			$this->tabel4_field2 => $this->tabel4_v_input2_post,
			$this->tabel4_field3 => $this->tabel4_v_input3_post,
			$this->tabel4_field4 => $this->tabel4_v_input4_post,
			$this->tabel4_field5 => $this->tabel4_v_input5_post,
			$this->tabel4_field6 => $this->tabel4_v_input6_post,
			$this->tabel4_field7 => $this->tabel4_v_input7_post,
		);

		$update = $this->tl4->update($data, $where);

		if ($update) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel4_c1));
	}

	public function hapus($id_spp = null)
	{
		$this->declare();
		$hapus = $this->tl4->hapus($id_spp);

		if ($hapus) {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {
			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel4_c1));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel4_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tbl4' =>  $this->tl4->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel4_v3, $data);
	}

	public function profil($tabel7_field1 = 1)
	{
		$this->declare();
		$id_petugas = $this->session->userdata($this->tabel4_field1);
		$data1 = array(
			$this->v_part1 => $this->v10_title,
			$this->v_part2 => $this->head,

			// Ini adalah showcase mengenai apa yang bisa dilakukan oleh oop
			// $this->v_part3 => $this->tabel4_c6,

			$this->v_part3 => $this->v10,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tbl9' =>  $this->tl4->ambil($id_petugas)->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function login($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->v17_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil($tabel7_field1)->result(),
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v17, $data);
	}

	public function signup($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->v6_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil($tabel7_field1)->result(),
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v6, $data);
	}

	public function update_profil()
	{
		$this->declare();
		$where = $this->tabel4_v_input1_post;
		$data = array(
			$this->tabel4_field2 => $this->tabel4_v_input2_post,
			$this->tabel4_field3 => $this->tabel4_v_input3_post,
			$this->tabel4_field5 => $this->tabel4_v_input5_post,
		);

		$update = $this->tl4->update($data, $where);

		if ($update) {

			$this->session->set_flashdata($this->v_flashdata1, 'Profil berhasil diubah!');
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, 'Profil gagal diubah!');
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		// mengambil data profil yang baru dirubah
		$tabel4 = $this->tl4->ambil($where)->result();
		$nama = $tabel4[0]->nama;
		$email = $tabel4[0]->email;
		$hp = $tabel4[0]->hp;

		// membuat session baru berdasarkan data yang telah diupdate
		$this->session->set_userdata($this->tabel4_userdata2, $nama);
		$this->session->set_userdata($this->tabel4_userdata3, $email);
		$this->session->set_userdata($this->tabel4_userdata5, $hp);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing user dengan level yang berbeda
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_password()
	{
		$this->declare();
		$where = $this->tabel4_v_input1_post;

		$cek_id = $this->tl4->ambil($where);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel4 = $cek_id->result();
			$cekpass = $tabel4[0]->password;

			$old_password = $this->input->post('old_password');

			// memverifikasi password lama dengan password di database
			if (password_verify($old_password, $cekpass)) {
				$param8 = $this->tabel4_v_input8_post;

				// jika konfirmasi password sama dengan password baru
				if ($this->input->post('konfirm') === $param8) {
					$this->load->library('encryption');

					$data = array(

						// mengubah password menjadi password berenkripsi
						$this->tabel4_field4 => password_hash($param8, PASSWORD_DEFAULT),
					);

					$update = $this->tl4->update($data, $where);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					$this->session->set_flashdata($this->v_flashdata2, 'Konfirmasi ' . $this->tabel4_field4 . ' tidak sesuai!');
					$this->session->set_flashdata($this->v_flashdata_b, $this->v_flashdata_b_func1);
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				$this->session->set_flashdata($this->v_flashdata2, $this->tabel4_field4 . ' lama salah!');
				$this->session->set_flashdata($this->v_flashdata_b, $this->v_flashdata_b_func1);
				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data kurang dari 0
		} else {

			$this->session->set_flashdata($this->v_flashdata2, 'Akun tidak tersedia!');
			$this->session->set_flashdata($this->v_flashdata_b, $this->v_flashdata_b_func1);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ceklogin()
	{
		$this->declare();
		$param1 = $this->tabel4_v_input1_post;
		$param8 = $this->tabel4_v_input8_post;

		$method1 = $this->tl4->ceknisn($param1);

		// mencari apakah jumlah data kurang dari 0
		if ($method1->num_rows() > 0) {
			$tabel4 = $method1->result();
			$method8 = $tabel4[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($param8, $method8)) {
				$nisn = $tabel4[0]->nisn;
				$nis = $tabel4[0]->nis;
				$nama = $tabel4[0]->nama;
				$id_kelas = $tabel4[0]->id_kelas;
				$alamat = $tabel4[0]->alamat;
				$no_telp = $tabel4[0]->no_telp;
				$id_spp = $tabel4[0]->id_spp;

				$level = 'siswa'; //planning untuk menambahkan halaman siswa

				$this->session->set_userdata($this->tabel4_userdata1, $nisn);
				$this->session->set_userdata($this->tabel4_userdata2, $nis);
				$this->session->set_userdata($this->tabel4_userdata3, $nama);
				$this->session->set_userdata($this->tabel4_userdata4, $id_kelas);
				$this->session->set_userdata($this->tabel4_userdata5, $alamat);
				$this->session->set_userdata($this->tabel4_userdata6, $no_telp);
				$this->session->set_userdata($this->tabel4_userdata7, $id_spp);
				$this->session->set_userdata($this->tabel4_userdata9, $level);
				

				redirect(site_url($this->c1));

				// jika password salah
			} else {

				// Selama ini hal yang menampilkan pesan hanyalah toast
				// Di sini aku akan mencoba menerapkan menampilkan modal secara otomatis ketika password salah
				// Namun nanti hanya ketika password salah saja, melainkan semua proses yang melibatkan elemen modal
				// Kemungkinan ke depannya bakal ada yang lain juga selain modal dan toast 
				// Hal ini tentunya akan menggunakan beberapa file diantara lain
				// Welcome.php, halaman template bagian javascript, dan masing-masing halaman tujuan
				// Selain itu aku ingin mencoba menerapkannya juga pada button notifikasi jika ada nanti
				// Supaya bisa menyimpan proses apa saja yang telah selesai dilakukan

				// Dan terakhir, aku perlu menambahkan fungsi flashdata baru selain 'panggil'
				// Alasannya karena ada banyak sekali jenis pesan yang tidak boleh digunakan dalam satu tempat
				// Kalau tidak bisa merusak experience dari user

				$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_field8 . ' salah!');
				redirect(site_url($this->tabel4_c7));
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel4_field1 . ' tidak tersedia!');
			redirect(site_url($this->tabel4_c7));
		}

		// // mencari apakah jumlah data kurang dari 0
		// if ($cekemail->num_rows() > 0) {
		// 	$tabel4 = $cekemail->result();
		// 	$cekpass = $tabel4[0]->password;

		// 	// memverifikasi password dengan password di database
		// 	if (password_verify($password, $cekpass)) {
		// 		$id_petugas = $tabel4[0]->id_petugas;
		// 		$nama = $tabel4[0]->nama;
		// 		$email = $tabel4[0]->email;
		// 		$hp = $tabel4[0]->hp;
		// 		$level = $tabel4[0]->level;

		// 		$this->session->set_userdata('id_petugas', $id_petugas);
		// 		$this->session->set_userdata('nama', $nama);
		// 		$this->session->set_userdata('email', $email);
		// 		$this->session->set_userdata('hp', $hp);
		// 		$this->session->set_userdata('level', $level);

		// 		redirect(site_url('welcome'));

		// 		// jika password salah
		// 	} else {

		// 		$this->session->set_flashdata($this->v_flashdata1, 'Password Salah!');
		// 		redirect(site_url('petugas/login'));
		// 	}

		// 	// jika jumlah data lebih dari 0
		// } else {

		// 	$this->session->set_flashdata($this->v_flashdata1, 'Email tidak tersedia!');
		// 	redirect(site_url('petugas/login'));
		// }


	}

	public function logout()
	{
		$this->declare();

		// menghapus session
		session_destroy();
		redirect(site_url($this->c1));
	}
}
