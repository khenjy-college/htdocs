<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	// Menggunakan variabel sebagai alat pembantu, persyaratan
	// Semua yang ada di sini bakal diubah nantinya dari private menjadi antara private atau protected

	// sebenarnya yang bagian input pengen dibikin pakai multiple views (bukan cman _v_ saja) cman fitur itu mending dipending dulu

	//dekrlarasi variabel bagian umum
	// deklarasi konten
	public $head = '_partials/head';

	// deklarasi variabel yang merupakan mvc namun tidak mengandung unsur tabel pada penamaan

	// deklarasi model yang tidak memiliki nama tabel pada nama file atau function

	// deklarasi views yang tidak memiliki nama tabel pada nama file atau function
	public $v1 = 'konfirmasi';
	public $v1_title1 = 'Reservasi Berhasil';
	public $v1_title2 = 'Transaksi Berhasil';
	public $v2 = 'login';
	public $v2_title = 'Login';
	public $v3 = 'no-level';
	public $v3_title = 'Anda tidak memiliki level';
	public $v4 = 'print';
	public $v4_title1 = 'Bukti Reservasi';
	public $v4_title2 = 'Bukti Transaksi';
	public $v5 = 'receipt';
	public $v5_title = 'Bukti Transaksi';
	public $v6 = 'signup';
	public $v6_title = 'Sign Up';
	public $v7 = 'template';
	public $v8 = 'v_home';
	public $v8_title = 'Selamat Datang!';
	public $v9 = 'v_pemesanan';
	public $v9_title = 'Halaman Pemesanan';
	public $v10 = 'v_profil';
	public $v10_title = 'Profil';
	public $v11 = 'v_reservasi';
	public $v11_title = 'Data Pemesanan';

	// deklarasi controller yang tidak memiliki nama tabel pada nama file atau function
	public $c1 = 'welcome';
	public $c2 = 'welcome/pemesanan';
	public $c3 = 'welcome/tipe_kamar';
	public $c4 = 'welcome/fasilitas';
	public $c5 = 'welcome/dashboard';
	public $c6 = 'welcome/no_level';

	// deklarasi flashdata
	public $v_flashdata1 = 'pesan';
	public $v_flashdata1_msg1 = 'pesan';
	public $v_flashdata2 = 'panggil';
	public $v_flashdata2_func = '$("#element").toast("show")';

	// deklarasi variabel per tabel
	// deklarasi tabel 1
	public $tabel1 = 'faskamar';
	// deklarasi variabel bagian field
	public $tabel1_field1 = 'id_faskamar';
	public $tabel1_field2 = 'tipe';
	public $tabel1_field3 = 'nama';
	public $tabel1_field4 = 'img';



	// deklarasi tabel 2
	public $tabel2 = 'history';
	// deklarasi variabel bagian field
	public $tabel2_field1 = 'id_history';
	public $tabel2_field2 = 'id_pesanan';
	public $tabel2_field3 = 'id_user';
	public $tabel2_field4 = 'pemesan';
	public $tabel2_field5 = 'email';
	public $tabel2_field6 = 'hp';
	public $tabel2_field7 = 'tamu';
	public $tabel2_field8 = 'tipe';
	public $tabel2_field9 = 'jlh';
	public $tabel2_field10 = 'cek_in';
	public $tabel2_field11 = 'cek_out';
	public $tabel2_field12 = 'tgl_perubahan';
	public $tabel2_field13 = 'user_aktif';


	// deklarasi tabel 3
	public $tabel3 = 'fashotel';
	// deklarasi variabel bagian field
	public $tabel3_field1 = 'id_fashotel';
	public $tabel3_field2 = 'nama';
	public $tabel3_field3 = 'keterangan';
	public $tabel3_field4 = 'img';


	// deklarasi tabel 4
	public $tabel4 = 'petugas';
	// deklarasi variabel bagian field
	public $tabel4_field1 = 'id_petugas';
	public $tabel4_field2 = 'nama';
	public $tabel4_field3 = 'email';
	public $tabel4_field4 = 'hp';
	public $tabel4_field5 = 'img';
	public $tabel4_field6 = 'role';
	public $tabel4_field7 = 'poin';


	// deklarasi tabel 5
	public $tabel5 = 'kamar';
	// deklarasi variabel bagian field
	public $tabel5_field1 = 'no_kamar';
	public $tabel5_field2 = 'id_tipe';
	public $tabel5_field3 = 'id_pemesan';
	public $tabel5_field4 = 'status';
	public $tabel5_field5 = 'keterangan';

	// deklarasi tabel 6
	public $tabel6 = 'tipe_kamar';
	// deklarasi variabel bagian field
	public $tabel6_field1 = 'id_tipe';
	public $tabel6_field2 = 'tipe';
	public $tabel6_field3 = 'img';
	public $tabel6_field4 = 'stok';
	public $tabel6_field5 = 'harga';



	// deklarasi tabel 7
	public $tabel7 = 'pengaturan';
	// deklarasi variabel bagian field
	public $tabel7_field1 = 'id';
	public $tabel7_field2 = 'nama';
	public $tabel7_field3 = 'favicon';
	public $tabel7_field4 = 'logo';
	public $tabel7_field5 = 'foto';
	public $tabel7_field6 = 'alamat';
	public $tabel7_field7 = 'email';
	public $tabel7_field8 = 'hp';
	public $tabel7_field9 = 'metadesc';
	public $tabel7_field10 = 'fb';
	public $tabel7_field11 = 'ig';


	// deklarasi tabel 8
	public $tabel8 = 'pesanan';
	// deklarasi variabel bagian field
	public $tabel8_field1 = 'id_pesanan';
	public $tabel8_field2 = 'id_user';
	public $tabel8_field3 = 'pemesan';
	public $tabel8_field4 = 'email';
	public $tabel8_field5 = 'hp';
	public $tabel8_field6 = 'tamu';
	public $tabel8_field7 = 'tipe';
	public $tabel8_field8 = 'jlh';
	public $tabel8_field9 = 'harga_total';
	public $tabel8_field10 = 'cek_in';
	public $tabel8_field10_filter1 = 'cek_in_min';
	public $tabel8_field10_filter2 = 'cek_in_max';
	public $tabel8_field11 = 'cek_out';
	public $tabel8_field11_filter1 = 'cek_out_min';
	public $tabel8_field11_filter2 = 'cek_out_max';
	public $tabel8_field12 = 'status';
	public $tabel8_field12_value1 = 'pending';
	public $tabel8_field12_value2 = 'belum bayar';
	public $tabel8_field12_value3 = 'menunggu';
	public $tabel8_field12_value4 = 'cek in';
	public $tabel8_field12_value5 = 'cek out';


	// deklarasi tabel 9
	public $tabel9 = 'user';
	// deklarasi variabel bagian field
	public $tabel9_field1 = 'id_user';
	public $tabel9_field2 = 'nama';
	public $tabel9_field3 = 'email';
	public $tabel9_field4 = 'password';
	public $tabel9_field5 = 'hp';
	public $tabel9_field6 = 'level';
	public $tabel9_field6_value1 = '';
	public $tabel9_field6_value2 = 'accounting';
	public $tabel9_field6_value3 = 'administrator';
	public $tabel9_field6_value4 = 'resepsionis';
	public $tabel9_field6_value5 = 'tamu';


	// deklarasi tabel 10
	// deklarasi variabel per tabel
	// deklarasi tabel 1
	public $tabel10 = 'transaksi';
	// deklarasi variabel bagian field
	public $tabel10_field1 = 'id_transaksi';
	public $tabel10_field2 = 'id_user';
	public $tabel10_field3 = 'email';
	public $tabel10_field4 = 'id_pesanan';
	public $tabel10_field5 = 'metode';
	public $tabel10_field6 = 'bayar';
	public $tabel10_field7 = 'tgl_transaksi';



	// deklarasi tabel 11
	// deklarasi variabel per tabel
	// deklarasi tabel 1
	public $tabel11 = 'operations';
	// deklarasi variabel bagian field
	public $tabel11_field1 = 'id_operations';
	public $tabel11_field2 = 'no_kamar';
	public $tabel11_field3 = 'id_user';
	public $tabel11_field4 = 'id_petugas';
	public $tabel11_field5 = 'keterangan';
	public $tabel11_field6 = 'tgl_perubahan';


	// deklarasi session

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


	public function

	declare()
	{
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


	// fungsi pertama yang akan diload oleh website
	public function index($id = 1)
	{

		$this->declare();
		// mengarahkan pengguna ke halaman masing-masing sesuai level
		if (
			$this->session->userdata($this->tabel9_userdata6) === site_url($this->tabel9_field6_value2)
			|| $this->session->userdata($this->tabel9_userdata6) === $this->tabel9_field6_value3
			|| $this->session->userdata($this->tabel9_userdata6) === $this->tabel9_field6_value4
		) {

			$this->session->set_flashdata($this->v_flashdata1, 'Selamat datang ' . $this->session->userdata($this->tabel9_userdata6) . ' ' . $this->session->userdata($this->tabel9_userdata2) . '!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);

			redirect(site_url($this->c5));
		} else {
			$this->session->set_flashdata($this->v_flashdata1, 'Selamat datang ' . $this->session->userdata($this->tabel9_userdata6) . ' ' . $this->session->userdata($this->tabel9_userdata2) . '!');
			$this->session->set_flashdata($this->v_flashdata2, $this->v_flashdata2_func);
			$data = array(

				'title' => $this->v8_title,
				'konten' => $this->v8,
				'head' => $this->head,
				$this->tabel7 => $this->ptn->ambil($id)->result(),
			);

			$this->load->view($this->v7, $data);
		}
	}

	public function pemesanan($id = 1)
	{
		$this->declare();
		if ($this->session->userdata(site_url($this->tabel9_field6)) === $this->tabel9_field6_value5) {
			$data = array(
				'title' => $this->v9_title,
				'head' => $this->head,
				'konten' => $this->v9,
				$this->tabel7 => $this->ptn->ambil($id)->result(),
				'tipe_kamar' => $this->tpk->ambildata()->result(),
				'cek_in' => $this->input->get('cek_in'),
				'cek_out' => $this->input->get('cek_out'),
				'jlh' => $this->input->get('jlh'),
				'halaman' => $this->v7
			);

			$halaman = $this->v7;
		} else {
			$data = array(
				'title' => $this->v2_title,
				'head' => $this->head,
				$this->tabel7 => $this->ptn->ambil($id)->result()

			);
			$halaman = $this->v2;
		}
		$this->load->view($halaman, $data);
	}

	public function tipe_kamar($id = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Daftar Tipe Kamar',
			'konten' => 'v_tipe_kamar',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'tipe_kamar' => $this->tpk->ambildata()->result(),
			'faskamar' => $this->fsk->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function fasilitas($id = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Daftar Fasilitas',
			'konten' => 'v_fasilitas',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'fashotel' => $this->fsh->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function dashboard($id = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Dashboard',
			'konten' => 'v_admin-dashboard',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'fashotel' => $this->fsh->ambildata()->num_rows(),
			'faskamar' => $this->fsk->ambildata()->num_rows(),
			'tipe_kamar' => $this->tpk->ambildata()->num_rows(),
			'pesanan' => $this->psn->ambildata()->num_rows(),
			'transaksi' => $this->trs->ambildata()->num_rows(),
			'petugas' => $this->pts->ambildata()->num_rows(),
			'user' => $this->usr->ambildata()->num_rows(),
			'cek_in' => $this->input->get('cek_in'),
			'cek_out' => $this->input->get('cek_out'),
			'jlh' => $this->input->get('jlh'),
		);

		$this->load->view('template', $data);
	}

	// fungsi ketika pengguna mengunjungi halaman yang tidak sesuai dengan level
	public function no_level($id = 1)
	{
		$this->declare();
		$data = array(
			'title' => 'Anda tidak Memiliki level',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
		);

		$this->load->view('no-level', $data);
	}
}
