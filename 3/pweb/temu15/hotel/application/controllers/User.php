<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Welcome.php';

class User extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel9_m = 'tl9';

	// deklarasi variabel views
	private $tabel9_v1;
	private $tabel9_v1_title;
	private $tabel9_v2;
	private $tabel9_v2_title;
	private $tabel9_v3;
	private $tabel9_v3_title;

	// deklarasi variabel controller
	private $tabel9_c1;
	private $tabel9_c2;
	private $tabel9_c3;
	private $tabel9_c4;
	private $tabel9_c5;
	private $tabel9_c6;
	private $tabel9_c7;
	private $tabel9_c8;
	private $tabel9_c9;
	private $tabel9_c10;
	private $tabel9_c11;
	private $tabel9_c12;
	private $tabel9_v_menu1;
	private $tabel9_v_menu2;
	private $tabel9_v_menu3;
	private $tabel9_v_menu4;
	private $tabel9_v_menu5;
	private $tabel9_v_input1_post;
	private $tabel9_v_input1_alt;
	private $tabel9_v_input2_post;
	private $tabel9_v_input3_post;
	private $tabel9_v_input4_post;
	private $tabel9_v_input5_post;
	private $tabel9_v_input6_post;
	private $tabel9_v_flashdata1_msg_1;
	private $tabel9_v_flashdata1_msg_2;
	private $tabel9_v_flashdata1_msg_3;
	private $tabel9_v_flashdata1_msg_4;
	private $tabel9_v_flashdata1_msg_5;
	private $tabel9_v_flashdata1_msg_6;
	private $tabel9_userdata1;
	private $tabel9_tempdata1;
	private $tabel9_userdata2;
	private $tabel9_tempdata2;
	private $tabel9_userdata3;
	private $tabel9_tempdata3;
	private $tabel9_userdata4;
	private $tabel9_tempdata4;
	private $tabel9_userdata5;
	private $tabel9_tempdata5;
	private $tabel9_userdata6;
	private $tabel9_tempdata6;

	private $tabel9_v_flashdata3_msg_1;
	private $tabel9_v_flashdata4_msg_1;


	public function

	declare()
	{

		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel9_m = 'tl9';

		// deklarasi variabel views
		$this->tabel9_v1 = 'v_' . $this->tabel9;
		$this->tabel9_v1_title = 'Daftar ' . $this->tabel9_alias;
		$this->tabel9_v2 = 'v_admin-' . $this->tabel9;
		$this->tabel9_v2_title = 'Data ' . $this->tabel9_alias;
		$this->tabel9_v3 = '_laporan/laporan_' . $this->tabel9;
		$this->tabel9_v3_title = 'Laporan ' . $this->tabel9_alias;

		// deklarasi variabel controller
		$this->tabel9_c1 = $this->tabel9;
		$this->tabel9_c2 = $this->tabel9 . '/tambah';
		$this->tabel9_c3 = $this->tabel9 . '/update';
		$this->tabel9_c4 = $this->tabel9 . '/hapus';
		$this->tabel9_c5 = $this->tabel9  . '/laporan';
		$this->tabel9_c6 = $this->tabel9 . '/profil';
		$this->tabel9_c7 = $this->tabel9 . '/login';
		$this->tabel9_c8 = $this->tabel9 . '/signup';
		$this->tabel9_c9 = $this->tabel9 . '/update_profil';
		$this->tabel9_c10 = $this->tabel9 . '/update_password';
		$this->tabel9_c11 = $this->tabel9 . '/ceklogin';
		$this->tabel9_c12 = $this->tabel9 . '/logout';


		// deklarasi views menu dari _partials
		$this->tabel9_v_menu1 = 'menu_' . $this->tabel9_field6_value1;
		$this->tabel9_v_menu2 = 'menu_' . $this->tabel9_field6_value2;
		$this->tabel9_v_menu3 = 'menu_' . $this->tabel9_field6_value3;
		$this->tabel9_v_menu4 = 'menu_' . $this->tabel9_field6_value4;
		$this->tabel9_v_menu5 = 'menu_' . $this->tabel9_field6_value5;

		// tabel bagian input
		$this->tabel9_v_input1_post = $this->input->post($this->tabel9_field1);
		$this->tabel9_v_input1_alt = '';
		$this->tabel9_v_input2_post = $this->input->post($this->tabel9_field2);
		$this->tabel9_v_input3_post = $this->input->post($this->tabel9_field3);
		$this->tabel9_v_input4_post = $this->input->post($this->tabel9_field4);
		$this->tabel9_v_input5_post = $this->input->post($this->tabel9_field5);
		$this->tabel9_v_input6_post = $this->input->post($this->tabel9_field6);

		// deklarasi variabel bagian v_flashdata
		$this->tabel9_v_flashdata1_msg_1 = 'Data ' . $this->tabel9_alias . ' berhasil disimpan!';
		$this->tabel9_v_flashdata1_msg_2 = 'Data ' . $this->tabel9_alias . ' gagal disimpan!';
		$this->tabel9_v_flashdata1_msg_3 = 'Data ' . $this->tabel9_alias . ' berhasil diubah!';
		$this->tabel9_v_flashdata1_msg_4 = 'Data ' . $this->tabel9_alias . ' gagal diubah!';
		$this->tabel9_v_flashdata1_msg_5 = 'Data ' . $this->tabel9_alias . ' berhasil dihapus!';
		$this->tabel9_v_flashdata1_msg_6 = 'Data ' . $this->tabel9_alias . ' gagal dihapus!';

		// deklarasi variabel menampilkan pesan modal
		$this->tabel9_v_flashdata3_msg_1 =  $this->tabel3_field4_alias . ' ' . $this->tabel3_alias . ' tidak bisa diupload';
		$this->tabel9_v_flashdata4_msg_1 = $this->tabel3_field4_alias . ' ' . $this->tabel3_alias . ' tidak bisa diupload';

		// deklarasi session
		$this->tabel9_userdata1 = $this->tabel9_field1;
		$this->tabel9_tempdata1 = $this->tabel9_field1;
		$this->tabel9_userdata2 = $this->tabel9_field2;
		$this->tabel9_tempdata2 = $this->tabel9_field2;
		$this->tabel9_userdata3 = $this->tabel9_field3;
		$this->tabel9_tempdata3 = $this->tabel9_field3;
		$this->tabel9_userdata4 = $this->tabel9_field4;
		$this->tabel9_tempdata4 = $this->tabel9_field4;
		$this->tabel9_userdata5 = $this->tabel9_field5;
		$this->tabel9_tempdata5 = $this->tabel9_field5;
		$this->tabel9_userdata6 = $this->tabel9_field6;
		$this->tabel9_tempdata6 = $this->tabel9_field6;
	}

	public function index($id = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel9_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel9_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($id)->result(),
			'tabel9' =>  $this->tl9->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$param2 = $this->tabel9_v_input2_post;
		$param4 = $this->tabel9_v_input4_post;

		$method2 = $this->tl9->ceknama($param2);

		// mencari apakah jumlah data kurang dari 1
		if ($method2->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->input->post('konfirm') === $param4) {
				$this->load->library('encryption');

				$data = array(
					$this->tabel9_field2 => $param2,
					$this->tabel9_field3 => $this->tabel9_v_input3_post,

					// mengubah password menjadi password berenkripsi
					$this->tabel9_field4 => password_hash($param4, PASSWORD_DEFAULT),

					$this->tabel9_field5 => $this->tabel9_v_input5_post,
					$this->tabel9_field6 => $this->tabel9_v_input6_post,
				);

				$simpan = $this->tl9->simpan($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if ($this->session->userdata($this->tabel9_field3)) {

					redirect(site_url($this->tabel9_c1));
				} else {

					redirect(site_url($this->tabel9_c7));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				$this->session->set_flashdata($this->v_flashdata1, 'Konfirmasi ' . $this->tabel9_field4 . ' salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->v_flashdata1,  $this->tabel9_field3 . 'telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		$this->declare();
		$where = $this->tabel9_v_input1_post;
		$data = array(
			$this->tabel9_field2 => $this->tabel9_v_input2_post,
			$this->tabel9_field3 => $this->tabel9_v_input3_post,
			$this->tabel9_field5 => $this->tabel9_v_input5_post,
		);

		$update = $this->tl9->update($data, $where);

		if ($update) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel9_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel9_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		// kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($id_user = null)
	{
		$this->declare();
		$hapus = $this->tl9->hapus($id_user);


		if ($hapus) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel9_v_flashdata1_msg_5);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel9_v_flashdata1_msg_6);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}


		redirect(site_url($this->tabel9_v1));
	}


	public function laporan($id = 1)
	{
		$this->declare();

		$data1 = array(
			$this->v_part1 => $this->tabel9_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($id)->result(),
			'tabel9' =>  $this->tl9->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel9_v3, $data);
	}


	public function profil($tabel7_field1 = 1)
	{
		$this->declare();
		$id_user = $this->session->userdata($this->tabel9_field1);
		$data1 = array(
			$this->v_part1 => $this->v10_title,
			$this->v_part2 => $this->head,

			// Ini adalah showcase mengenai apa yang bisa dilakukan oleh oop
			// $this->v_part3 => $this->tabel9_c6,

			$this->v_part3 => $this->v10,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel9' =>  $this->tl9->ambil($id_user)->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function login($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->v2_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v2, $data);
	}

	public function signup($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->v6_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v6, $data);
	}

	public function update_profil()
	{
		$this->declare();
		$where = $this->tabel9_v_input1_post;
		$data = array(
			$this->tabel9_field2 => $this->tabel9_v_input2_post,
			$this->tabel9_field3 => $this->tabel9_v_input3_post,
			$this->tabel9_field5 => $this->tabel9_v_input5_post,
		);

		$update = $this->tl9->update($data, $where);

		if ($update) {

			$this->session->set_flashdata($this->v_flashdata1, 'Profil berhasil diubah!');
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, 'Profil gagal diubah!');
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		// mengambil data profil yang baru dirubah
		$tabel9 = $this->tl9->ambil($where)->result();
		$nama = $tabel9[0]->nama;
		$email = $tabel9[0]->email;
		$hp = $tabel9[0]->hp;

		// membuat session baru berdasarkan data yang telah diupdate
		$this->session->set_userdata($this->tabel9_userdata2, $nama);
		$this->session->set_userdata($this->tabel9_userdata3, $email);
		$this->session->set_userdata($this->tabel9_userdata5, $hp);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing user dengan level yang berbeda
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_password()
	{
		$this->declare();
		$where = $this->tabel9_v_input1_post;

		$cek_id = $this->tl9->ambil($where);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel9 = $cek_id->result();
			$cekpass = $tabel9[0]->password;

			$old_password = $this->input->post('old_password');

			// memverifikasi password lama dengan password di database
			if (password_verify($old_password, $cekpass)) {
				$param4 = $this->tabel9_v_input4_post;

				// jika konfirmasi password sama dengan password baru
				if ($this->input->post('konfirm') === $param4) {
					$this->load->library('encryption');

					$data = array(

						// mengubah password menjadi password berenkripsi
						$this->tabel9_field4 => password_hash($param4, PASSWORD_DEFAULT),
					);

					$update = $this->tl9->update($data, $where);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					$this->session->set_flashdata($this->v_flashdata2, 'Konfirmasi ' . $this->tabel9_field4 . ' tidak sesuai!');
					$this->session->set_flashdata($this->v_flashdata_b, $this->v_flashdata_b_func1);
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				$this->session->set_flashdata($this->v_flashdata2, $this->tabel9_field4 . ' lama salah!');
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
		$param2 = $this->tabel9_v_input2_post;
		$param4 = $this->tabel9_v_input4_post;

		$method2 = $this->tl9->ceknama($param2);

		// mencari apakah jumlah data kurang dari 0
		if ($method2->num_rows() > 0) {
			$tabel9 = $method2->result();
			$method4 = $tabel9[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($param4, $method4)) {
				$id_user = $tabel9[0]->id_user;
				$nama = $tabel9[0]->nama;
				$email = $tabel9[0]->email;
				$hp = $tabel9[0]->hp;
				$level = $tabel9[0]->level;
				$login_count = $tabel9[0]->login_count;

				$updateCount = $this->tl9->updateCount($id_user);

				$this->session->set_userdata($this->tabel9_userdata1, $id_user);
				$this->session->set_userdata($this->tabel9_userdata2, $nama);
				$this->session->set_userdata($this->tabel9_userdata3, $email);
				$this->session->set_userdata($this->tabel9_userdata5, $hp);
				$this->session->set_userdata($this->tabel9_userdata6, $level);
				$this->session->set_userdata($this->tabel9_userdata7, $login_count);

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

				$this->session->set_flashdata($this->v_flashdata1, $this->tabel9_field4 . ' salah!');
				redirect(site_url($this->tabel9_c7));
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel9_field2 . ' tidak tersedia!');
			redirect(site_url($this->tabel9_c7));
		}

		// // mencari apakah jumlah data kurang dari 0
		// if ($cekemail->num_rows() > 0) {
		// 	$tabel9 = $cekemail->result();
		// 	$cekpass = $tabel9[0]->password;

		// 	// memverifikasi password dengan password di database
		// 	if (password_verify($password, $cekpass)) {
		// 		$id_user = $tabel9[0]->id_user;
		// 		$nama = $tabel9[0]->nama;
		// 		$email = $tabel9[0]->email;
		// 		$hp = $tabel9[0]->hp;
		// 		$level = $tabel9[0]->level;

		// 		$this->session->set_userdata('id_user', $id_user);
		// 		$this->session->set_userdata('nama', $nama);
		// 		$this->session->set_userdata('email', $email);
		// 		$this->session->set_userdata('hp', $hp);
		// 		$this->session->set_userdata('level', $level);

		// 		redirect(site_url('welcome'));

		// 		// jika password salah
		// 	} else {

		// 		$this->session->set_flashdata($this->v_flashdata1, 'Password Salah!');
		// 		redirect(site_url('user/login'));
		// 	}

		// 	// jika jumlah data lebih dari 0
		// } else {

		// 	$this->session->set_flashdata($this->v_flashdata1, 'Email tidak tersedia!');
		// 	redirect(site_url('user/login'));
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
