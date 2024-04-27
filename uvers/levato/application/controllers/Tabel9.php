<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Omnitags.php';

class Tabel9 extends Omnitags
{
	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel9_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel9'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel9')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl9' => $this->tl9->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$tabel9_field3 = $this->views_post['tabel9_field3'];
		$tabel9_field4 = $this->views_post['tabel9_field4'];

		$method3 = $this->tl9->cek_tabel9_field3($tabel9_field3);

		// mencari apakah jumlah data kurang dari 1
		if ($method3->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->input->post('konfirm') === $tabel9_field4) {
				$this->load->library('encryption');

				$data = array(
					$this->aliases['tabel9_field1'] => '',
					$this->aliases['tabel9_field2'] => $this->views_post['tabel9_field2'],
					$this->aliases['tabel9_field3'] => $this->views_post['tabel9_field3'],

					// mengubah password menjadi password berenkripsi
					$this->aliases['tabel9_field4'] => password_hash($tabel9_field4, PASSWORD_DEFAULT),

					$this->aliases['tabel9_field5'] => $this->views_post['tabel9_field5'],
					$this->aliases['tabel9_field6'] => $this->views_post['tabel9_field6'],
				);

				$simpan = $this->tl9->simpan($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if ($this->session->userdata($this->aliases['tabel9_field3'])) {

					redirect(site_url('tabel9/admin'));
				} else {

					redirect(site_url('tabel9/login'));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], 'Konfirmasi ' . $this->aliases['tabel9_field4'] . ' salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->aliases['tabel9_field3'] . 'telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		$this->declarew();

		$tabel9_field1 = $this->views_post['tabel9_field1'];
		$data = array(
			$this->aliases['tabel9_field2'] => $this->views_post['tabel9_field2'],
			$this->aliases['tabel9_field3'] => $this->views_post['tabel9_field3'],
			$this->aliases['tabel9_field5'] => $this->views_post['tabel9_field5'],
		);

		$update = $this->tl9->update($data, $tabel9_field1);

		if ($update) {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_3['tabel9_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_4['tabel9_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		// kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($tabel9_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl9->hapus($tabel9_field1);


		if ($hapus) {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_5['tabel9_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_6['tabel9_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}


		redirect(site_url('tabel9/admin'));
	}


	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v4_title['tabel9_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel9')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl9' => $this->tl9->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v4['tabel9'], $data);
	}


	public function profil($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field1 = $this->session->userdata($this->aliases['tabel9_field1']);
		$data1 = array(
			$this->v_part1 => $this->views_v2_title['tabel9_alias2'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v2['tabel9'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel9')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl9' => $this->tl9->ambil_tabel9_field1($tabel9_field1)->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function login($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['v2'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('v2')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v2'], $data);
	}

	public function signup($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['v2'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('v2')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v2'], $data);
	}

	public function update_profil()
	{
		$this->declarew();

		$tabel9_field1 = $this->views_post['tabel9_field1'];
		$data = array(
			$this->aliases['tabel9_field2'] => $this->views_post['tabel9_field2'],
			$this->aliases['tabel9_field3'] => $this->views_post['tabel9_field3'],
			$this->aliases['tabel9_field5'] => $this->views_post['tabel9_field5'],
		);

		$update = $this->tl9->update($data, $tabel9_field1);

		if ($update) {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], 'Profil berhasil diubah!');
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], 'Profil gagal diubah!');
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		// mengambil data profil yang baru dirubah
		$tabel9 = $this->tl9->ambil_tabel9_field1($tabel9_field1)->result();
		$tabel9_field2 = $tabel9[0]->nama;
		$tabel9_field3 = $tabel9[0]->email;
		$tabel9_field4 = $tabel9[0]->hp;

		// membuat session baru berdasarkan data yang telah diupdate
		$this->session->set_userdata($this->aliases['tabel9_field2'], $tabel9_field2);
		$this->session->set_userdata($this->aliases['tabel9_field3'], $tabel9_field3);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing user dengan level yang berbeda
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_tabel9_field4()
	{
		$this->declarew();

		$tabel9_field1 = $this->views_post['tabel9_field1'];

		$cek_id = $this->tl9->ambil_tabel9_field1($tabel9_field1);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel9 = $cek_id->result();
			$cek_tabel9_field4 = $tabel9[0]->password;

			$old_tabel9_field4 = $this->views_post['tabel9_field4_old'];

			// memverifikasi password lama dengan password di database
			if (password_verify($old_tabel9_field4, $cek_tabel9_field4)) {
				$tabel9_field4 = $this->views_post['tabel9_field4'];

				// jika konfirmasi password sama dengan password baru
				if ($this->input->post('konfirm') === $tabel9_field4) {
					$this->load->library('encryption');

					$data = array(

						// mengubah password menjadi password berenkripsi
						$this->aliases['tabel9_field4'] => password_hash($tabel9_field4, PASSWORD_DEFAULT),
					);

					$update = $this->tl9->update($data, $tabel9_field1);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					$this->session->set_flashdata($this->flashdatas['v_flashdata2'], 'Konfirmasi ' . $this->aliases['tabel9_field4'] . ' tidak sesuai!');
					$this->session->set_flashdata($this->flashdatas['v_flashdata_b'], $this->flashdatas['v_flashdata_b_func1']);
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				$this->session->set_flashdata($this->flashdatas['v_flashdata2'], $this->aliases['tabel9_field4'] . ' lama salah!');
				$this->session->set_flashdata($this->flashdatas['v_flashdata_b'], $this->flashdatas['v_flashdata_b_func1']);
				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data kurang dari 0
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata2'], 'Akun tidak tersedia!');
			$this->session->set_flashdata($this->flashdatas['v_flashdata_b'], $this->flashdatas['v_flashdata_b_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ceklogin()
	{
		$this->declarew();

		$tabel9_field3 = $this->views_post['tabel9_field3'];
		$tabel9_field4 = $this->views_post['tabel9_field4'];

		$method3 = $this->tl9->cek_tabel9_field3($tabel9_field3);

		// mencari apakah jumlah data kurang dari 0
		if ($method3->num_rows() > 0) {
			$tabel9 = $method3->result();
			$method4 = $tabel9[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($tabel9_field4, $method4)) {
				$tabel9_field1 = $tabel9[0]->id_user;
				$tabel9_field2 = $tabel9[0]->nama;
				$tabel9_field3 = $tabel9[0]->email;
				$tabel9_field5 = $tabel9[0]->hp;
				$tabel9_field6 = $tabel9[0]->level;

				$updateCount = $this->tl9->updateCount($tabel9_field1);

				$this->session->set_userdata($this->aliases['tabel9_field1'], $tabel9_field1);
				$this->session->set_userdata($this->aliases['tabel9_field2'], $tabel9_field2);
				$this->session->set_userdata($this->aliases['tabel9_field3'], $tabel9_field3);
				$this->session->set_userdata($this->aliases['tabel9_field5'], $tabel9_field5);
				$this->session->set_userdata($this->aliases['tabel9_field6'], $tabel9_field6);

				redirect(site_url('welcome'));

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

				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->aliases['tabel9_field4'] . ' salah!');
				redirect(site_url('tabel9/login'));
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->aliases['tabel9_field3'] . ' tidak tersedia!');
			redirect(site_url('tabel9/login'));
		}

		// // mencari apakah jumlah data kurang dari 0
		// if ($cekemail->num_rows() > 0) {
		// 	$tabel9 = $cekemail->result();
		// 	$cekpass = $tabel9[0]->password;

		// 	// memverifikasi password dengan password di database
		// 	if (password_verify($password, $cekpass)) {
		// 		$tabel9_field1 = $tabel9[0]->id_user;
		// 		$nama = $tabel9[0]->nama;
		// 		$tabel9_field1 = $tabel9[0]->email;
		// 		$hp = $tabel9[0]->hp;
		// 		$level = $tabel9[0]->level;

		// 		$this->session->set_userdata('id_user', $tabel9_field1);
		// 		$this->session->set_userdata('nama', $nama);
		// 		$this->session->set_userdata('email', $tabel9_field1);
		// 		$this->session->set_userdata('hp', $hp);
		// 		$this->session->set_userdata('level', $level);

		// 		redirect(site_url('welcome'));

		// 		// jika password salah
		// 	} else {

		// 		$this->session->set_flashdata($this->flashdatas['v_flashdata1'], 'Password Salah!');
		// 		redirect(site_url('tabel9/login'));
		// 	}

		// 	// jika jumlah data lebih dari 0
		// } else {

		// 	$this->session->set_flashdata($this->flashdatas['v_flashdata1'], 'Email tidak tersedia!');
		// 	redirect(site_url('tabel9/login'));
		// }


	}

	public function logout()
	{
		$this->declarew();

		// menghapus session
		session_destroy();
		redirect(site_url('welcome'));
	}
}
