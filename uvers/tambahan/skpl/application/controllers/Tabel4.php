<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel4 extends Omnitags
{
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel4_v2_title'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views['tabel4_v2'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel4')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl4' => $this->tl4->ambildata()->result(),
			'tbl5' => $this->tl5->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$param2 = $this->views['tabel4_v_input2_post'];
		// $param8 = $this->views['tabel4_v_input8_post'];

		$method2 = $this->tl4->cek_tabel4_field2($param2);

		// mencari apakah jumlah data kurang dari 1
		if ($method2->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			// if ($this->input->post('konfirm') === $param8) {
			// $this->load->library('encryption');

			$data = array(
				$this->aliases['tabel4_field1'] => $this->views['tabel4_v_input1_post'],
				$this->aliases['tabel4_field2'] => $param2,
				$this->aliases['tabel4_field3'] => $this->views['tabel4_v_input3_post'],
				$this->aliases['tabel4_field4'] => $this->views['tabel4_v_input4_post'],
				$this->aliases['tabel4_field6'] => $this->views['tabel4_v_input6_post'],

				// mengubah password menjadi password berenkripsi
				// $this->aliases['tabel4_field4'] => password_hash($param8, PASSWORD_DEFAULT),

			);

			$simpan = $this->tl4->simpan($data);

			// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
			if ($this->session->userdata($this->aliases['tabel4_field3'])) {

				redirect(site_url('tabel4'));
			} else {

				redirect(site_url('tabel4/login'));
			}

			// jika input konfirm tidak sama dengan input password
			// } else {

			// menampilkan flashdata dalam bentuk teks
			// $this->session->set_flashdata($this->flashdatas['v_flashdata1'], 'Konfirmasi ' . $this->aliases['tabel4_field4'] . ' salah!');

			// redirect($_SERVER['HTTP_REFERER']);
			// }

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->aliases['tabel4_field2'] . 'telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi petugas
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();

		$tabel4_field1 = $this->views['tabel4_v_input1_post'];
		
		$data = array(
			$this->aliases['tabel4_field1'] => $this->views['tabel4_v_input1_post'],
			$this->aliases['tabel4_field2'] => $this->views['tabel4_v_input2_post'],
			$this->aliases['tabel4_field3'] => $this->views['tabel4_v_input3_post'],
			$this->aliases['tabel4_field4'] => $this->views['tabel4_v_input5_post'],
			$this->aliases['tabel4_field6'] => $this->views['tabel4_v_input6_post'],
		);

		$update = $this->tl4->update($data, $tabel4_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel4_v_flashdata1_msg_3']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel4_v_flashdata1_msg_4']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel4'));
	}

	public function hapus($tabel4_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl4->hapus($tabel4_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel4_v_flashdata1_msg_5']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdatas['tabel4_v_flashdata1_msg_6']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel4'));
	}

	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel4_v3_title'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel4')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl4' => $this->tl4->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel4_v3'], $data);
	}

	public function profil($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel4_field1 = $this->session->userdata($this->aliases['tabel4_field1']);
		$data1 = array(
			$this->v_part1 => $this->views['tabel9_v1_title'],
			$this->v_part2 => $this->head,

			$this->v_part3 => $this->views['tabel9_v1'],
			$this->v_part5 => $this->tl12->dekor('tabel9')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl9' => $this->tl4->ambil_tabel4_field1($tabel4_field1)->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function login($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['tabel4_v4_title'],
			$this->v_part2 => $this->head,
			$this->v_part5 => $this->tl12->dekor('tabel4')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['tabel4_v4'], $data);
	}

	public function signup($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views['v3_title'],
			$this->v_part2 => $this->head,
			$this->v_part5 => $this->tl12->dekor('v3')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->flashdatas);

		$this->load->view($this->views['v3'], $data);
	}

	public function update_profil()
	{
		$this->declarew();

		$tabel4_field1 = $this->views['tabel4_v_input1_post'];

		$data = array(
			$this->aliases['tabel4_field2'] => $this->views['tabel4_v_input2_post'],
			$this->aliases['tabel4_field3'] => $this->views['tabel4_v_input3_post'],
			$this->aliases['tabel4_field4'] => $this->views['tabel4_v_input4_post'],
			$this->aliases['tabel4_field6'] => $this->views['tabel4_v_input6_post'],
		);

		$update = $this->tl4->update($data, $tabel4_field1);

		if ($update) {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], 'Profil berhasil diubah!');
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], 'Profil gagal diubah!');
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		// mengambil data profil yang baru dirubah
		$tabel4 = $this->tl4->ambil_tabel4_field1($tabel4_field1)->result();

		$tabel4_field2 = $tabel4[0]->nama;
		$tabel4_field3 = $tabel4[0]->email;
		$tabel4_field4 = $tabel4[0]->hp;
		$tabel4_field6 = $tabel4[0]->role;

		// membuat session baru berdasarkan data yang telah diupdate
		$this->session->set_userdata($this->aliases['tabel4_field2'], $tabel4_field2);
		$this->session->set_userdata($this->aliases['tabel4_field3'], $tabel4_field3);
		$this->session->set_userdata($this->aliases['tabel4_field4'], $tabel4_field4);
		$this->session->set_userdata($this->aliases['tabel4_field6'], $tabel4_field6);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing petugas dengan level yang berbeda
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_password()
	{
		$this->declarew();

		$tabel4_field1 = $this->views['tabel4_v_input1_post'];

		$cek_id = $this->tl4->ambil_tabel4_field1($tabel4_field1);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel4 = $cek_id->result();
			$cek_tabel4_field4 = $tabel4[0]->password;

			$old_tabel4_field4 = $this->input->post('old_password');

			// memverifikasi password lama dengan password di database
			if (password_verify($old_tabel4_field4, $cek_tabel4_field4)) {
				$param8 = $this->views['tabel4_v_input8_post'];

				// jika konfirmasi password sama dengan password baru
				if ($this->input->post('konfirm') === $param8) {
					$this->load->library('encryption');

					$data = array(

						// mengubah password menjadi password berenkripsi
						$this->aliases['tabel4_field4'] => password_hash($param8, PASSWORD_DEFAULT),
					);

					$update = $this->tl4->update($data, $tabel4_field1);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					$this->session->set_flashdata($this->flashdatas['v_flashdata2'], 'Konfirmasi ' . $this->aliases['tabel4_field4'] . ' tidak sesuai!');
					$this->session->set_flashdata($this->flashdatas['v_flashdata_b'], $this->flashdatas['v_flashdata_b_func1']);
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				$this->session->set_flashdata($this->flashdatas['v_flashdata2'], $this->aliases['tabel4_field4'] . ' lama salah!');
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

		$tabel4_field1 = $this->views['tabel4_v_input1_post'];
		$param8 = $this->views['tabel4_v_input8_post'];

		$method1 = $this->tl4->cek_tabel4_field1($tabel4_field1);

		// mencari apakah jumlah data kurang dari 0
		if ($method1->num_rows() > 0) {
			$tabel4 = $method1->result();
			$method8 = $tabel4[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($param8, $method8)) {
				$tabel4_field1 = $tabel4[0]->id_petugas;
				$tabel4_field2 = $tabel4[0]->nama;
				$tabel4_field3 = $tabel4[0]->email;
				$tabel4_field4 = $tabel4[0]->hp;
				$tabel4_field6 = $tabel4[0]->level;

				$this->session->set_userdata($this->aliases['tabel4_field1'], $tabel4_field1);
				$this->session->set_userdata($this->aliases['tabel4_field2'], $tabel4_field2);
				$this->session->set_userdata($this->aliases['tabel4_field3'], $tabel4_field3);
				$this->session->set_userdata($this->aliases['tabel4_field4'], $tabel4_field4);
				$this->session->set_userdata($this->aliases['tabel4_field6'], $tabel4_field6);


				redirect(site_url('welcome'));

				// jika password salah
			} else {

				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->aliases['tabel4_field4_alias'] . ' salah!');
				redirect(site_url('tabel4/login'));
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->aliases['tabel4_field1_alias'] . ' tidak tersedia!');
			redirect(site_url('tabel4/login'));
		}

		// // mencari apakah jumlah data kurang dari 0
		// if ($cekemail->num_rows() > 0) {
		// 	$tabel4 = $cekemail->result();
		// 	$cekpass = $tabel4[0]->password;

		// 	// memverifikasi password dengan password di database
		// 	if (password_verify($password, $cekpass)) {
		// 		$tabel4_field1user = $tabel4[0]->id_petugas;
		// 		$nama = $tabel4[0]->nama;
		// 		$tabel4_field1 = $tabel4[0]->email;
		// 		$hp = $tabel4[0]->hp;
		// 		$level = $tabel4[0]->level;

		// 		$this->session->set_userdata('id_petugas', $tabel4_field1user);
		// 		$this->session->set_userdata('nama', $nama);
		// 		$this->session->set_userdata('email', $tabel4_field1);
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
