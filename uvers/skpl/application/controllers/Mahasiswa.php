<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Mahasiswa',  
			'head' => '_partials/head',
			'konten' => 'v_admin-mahasiswa',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'mahasiswa' => $this->usr->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function profil($id = 1)
	{
		$id_mahasiswa = $this->session->userdata('id_mahasiswa');
		$data = array(
			'title' => 'Profil',
			'head' => '_partials/head',
			'konten' => 'v_profil',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'mahasiswa' => $this->usr->ambil($id_mahasiswa)->result()
		);

		$this->load->view('template', $data);
	}

	public function login($id = 1)
	{
		$data = array(
			'title' => 'Login',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
		);

		$this->load->view('login', $data);
	}

	public function signup($id = 1)
	{
		$data = array(
			'title' => 'Sign Up',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
		);

		$this->load->view('signup', $data);
	}

	public function tambah()
	{
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$password = $this->input->post('password');

		$ceknama = $this->usr->ceknama($nama_mahasiswa);

		// mencari apakah jumlah data kurang dari 1
		if ($ceknama->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->input->post('konfirm') === $password) {
				$this->load->library('encryption');

				$data = array(
					'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
					'email' => $email,

					// mengubah password menjadi password berenkripsi
					'password' => password_hash($password, PASSWORD_DEFAULT),

					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
				);

				$simpan = $this->usr->simpan($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if ($this->session->userdata('email')) {

					redirect(site_url('mahasiswa'));
				} else {

					redirect(site_url('mahasiswa/login'));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				$this->session->set_flashdata('pesan', 'Konfirmasi password salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata('pesan', 'Email telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		$where = $this->input->post('id_mahasiswa');
		$data = array(
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'email' => $this->input->post('email'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		);

		$update = $this->usr->update($data, $where);

		if ($update) {

			$this->session->set_flashdata('pesan', 'Mahasiswa berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Mahasiswa gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		// kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_profil()
	{
		$where = $this->input->post('id_mahasiswa');
		$data = array(
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'email' => $this->input->post('email'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		);

		$update = $this->usr->update($data, $where);

		if ($update) {

			$this->session->set_flashdata('pesan', 'Profil berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Profil gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		// mengambil data profil yang baru dirubah
		$mahasiswa = $this->usr->ambil($where)->result();
		$nama_mahasiswa = $mahasiswa[0]->nama_mahasiswa;
		$email = $mahasiswa[0]->email;
		$jenis_kelamin = $mahasiswa[0]->jenis_kelamin;

		// membuat session baru berdasarkan data yang telah diupdate
		$this->session->set_userdata('nama_mahasiswa', $nama_mahasiswa);
		$this->session->set_userdata('email', $email);
		$this->session->set_userdata('jenis_kelamin', $jenis_kelamin);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing mahasiswa dengan akses yang berbeda
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_password()
	{
		$where = $this->input->post('id_mahasiswa');

		$cek_id = $this->usr->ambil($where);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$mahasiswa = $cek_id->result();
			$cekpass = $mahasiswa[0]->password;

			$old_password = $this->input->post('old_password');

			// memverifikasi password lama dengan password di database
			if (password_verify($old_password, $cekpass)) {
				$password = $this->input->post('password');

				// jika konfirmasi password sama dengan password baru
				if ($this->input->post('konfirm') === $password) {
					$this->load->library('encryption');

					$data = array(

						// mengubah password menjadi password berenkripsi
						'password' => password_hash($password, PASSWORD_DEFAULT),
					);

					$update = $this->usr->update($data, $where);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					$this->session->set_flashdata('pesan', 'Konfirmasi password tidak sesuai!');
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				$this->session->set_flashdata('pesan', 'Password lama salah!');
				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data kurang dari 0
		} else {

			$this->session->set_flashdata('pesan', 'Akun tidak tersedia!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function hapus($id_mahasiswa = null)
	{
		$hapus = $this->usr->hapus($id_mahasiswa);


		if ($hapus) {

			$this->session->set_flashdata('pesan', 'Mahasiswa berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Mahasiswa gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}


		redirect(site_url('mahasiswa'));
	}

	public function ceklogin()
	{
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$password = $this->input->post('password');

		$ceknama = $this->usr->ceknama($nama_mahasiswa, $password);

		// mencari apakah jumlah data kurang dari 0
		if ($ceknama->num_rows() > 0) {
			$mahasiswa = $ceknama->result();
			$cekpass = $mahasiswa[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($password, $cekpass)) {
				$id_mahasiswa = $mahasiswa[0]->id_mahasiswa;
				$nama_mahasiswa = $mahasiswa[0]->nama_mahasiswa;
				$email = $mahasiswa[0]->email;
				$jenis_kelamin = $mahasiswa[0]->jenis_kelamin;
				$tgl_lahir = $mahasiswa[0]->tgl_lahir;

				$this->session->set_userdata('id_mahasiswa', $id_mahasiswa);
				$this->session->set_userdata('nama_mahasiswa', $nama_mahasiswa);
				$this->session->set_userdata('email', $email);
				$this->session->set_userdata('jenis_kelamin', $jenis_kelamin);
				$this->session->set_userdata('akses', $tgl_lahir);

				redirect(site_url('welcome'));

				// jika password salah
			} else {

				$this->session->set_flashdata('pesan', 'Password Salah!');
				redirect(site_url('mahasiswa/login'));
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata('pesan', 'Email tidak tersedia!');
			redirect(site_url('mahasiswa/login'));
		}

		// // mencari apakah jumlah data kurang dari 0
		// if ($cekemail->num_rows() > 0) {
		// 	$mahasiswa = $cekemail->result();
		// 	$cekpass = $mahasiswa[0]->password;

		// 	// memverifikasi password dengan password di database
		// 	if (password_verify($password, $cekpass)) {
		// 		$id_mahasiswa = $mahasiswa[0]->id_mahasiswa;
		// 		$nama_mahasiswa = $mahasiswa[0]->nama_mahasiswa;
		// 		$email = $mahasiswa[0]->email;
		// 		$jenis_kelamin = $mahasiswa[0]->jenis_kelamin;
		// 		$tgl_lahir = $mahasiswa[0]->tgl_lahir;

		// 		$this->session->set_userdata('id_mahasiswa', $id_mahasiswa);
		// 		$this->session->set_userdata('nama_mahasiswa', $nama_mahasiswa);
		// 		$this->session->set_userdata('email', $email);
		// 		$this->session->set_userdata('jenis_kelamin', $jenis_kelamin);
		// 		$this->session->set_userdata('akses', $tgl_lahir);

		// 		redirect(site_url('welcome'));

		// 		// jika password salah
		// 	} else {

		// 		$this->session->set_flashdata('pesan', 'Password Salah!');
		// 		redirect(site_url('mahasiswa/login'));
		// 	}

		// 	// jika jumlah data lebih dari 0
		// } else {

		// 	$this->session->set_flashdata('pesan', 'Email tidak tersedia!');
		// 	redirect(site_url('mahasiswa/login'));
		// }


	}

	public function logout()
	{
		// menghapus session
		session_destroy();
		redirect(site_url('welcome'));
	}
}
