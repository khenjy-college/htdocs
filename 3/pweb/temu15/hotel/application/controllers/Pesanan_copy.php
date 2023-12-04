<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Faskamar.php';
include 'History.php';
include 'Fashotel.php';
include 'Petugas.php';
include 'Kamar.php';
include 'Tipe_kamar.php';
include 'Pengaturan.php';
include 'Pesanan.php';
include 'User.php';
include 'Transaksi.php';
include 'Operations.php';
include 'Welcome.php';
class Pesanan_copy extends CI_Controller
{
	// Menggunakan variabel sebagai alat pembantu, persyaratan
	// 1. Nama tabel sama dengan nama controller

	//dekrlarasi variabel bagian umum
	private $tabel1 = 'faskamar';
	private $tabel2 = 'history';
	private $tabel3 = 'fashotel';
	private $tabel4 = 'petugas';
	private $tabel5 = 'kamar';
	private $tabel6 = 'tipe_kamar';
	private $tabel7 = 'pengaturan';
	private $tabel8 = 'pesanan';
	private $tabel9 = 'user';
	private $tabel10 = 'transaksi';
	private $tabel11 = 'operations';
	private $site_url1 = 'pesanan';
	private $site_url2 = 'pesanan/konfirmasi';
	private $view1 = 'pesanan';

	// deklarasi variabel bagian input filter
	private $filter1 = 'cek_in_min';
	private $filter2 = 'cek_in_max';
	private $filter3 = 'cek_out_min';
	private $filter4 = 'cek_out_max';

	// deklarasi variabel bagian title
	private $title1 = 'Data Pesanan';
	private $title2 = 'Pemesanan Berhasil';
	private $title3 = 'Bukti Reservasi';
	private $title4 = 'Laporan Pesanan';

	// deklarasi variabel bagian head
	private $head = '_partials/head';

	// deklarasi variabel bagian konten
	private $page1 = 'template';
	private $page2 = 'konfirmasi';
	private $page3 = 'print';
	private $page4 = '_laporan/laporan_pesanan';
	private $konten1 = 'v_admin-pesanan';
	private $konten2 = 'konfirmasi';

	// deklarasi variabel bagian field
	private $field1 = 'id_pesanan';
	private $field2 = 'id_user';
	private $field3 = 'pemesan';
	private $field4 = 'email';
	private $field5 = 'hp';
	private $field6 = 'tamu';
	private $field7 = 'tipe';
	private $field8 = 'jlh';
	private $field9 = 'harga_total';
	private $field10 = 'cek_in';
	private $field11 = 'cek_out';
	private $field12 = 'status';

	// deklarasi variabel bagian input
	private $input1 = 'id_pesanan';
	private $input1_alt = '';
	private $input2 = 'id_user';
	private $input3 = 'pemesan';
	private $input4 = 'email';
	private $input5 = 'hp';
	private $input6 = 'tamu';
	private $input7 = 'tipe';
	private $input8 = 'jlh';
	private $input9 = 'harga_total';
	private $input10 = 'cek_in';
	private $input11 = 'cek_out';
	private $input12 = 'status';

	// deklarasi variabel bagian value input yang diprediksi
	private $input12_value_1 = 'pending';
	private $input12_value_2 = 'belum_bayar';
	private $input12_value_3 = 'menunggu';
	private $input12_value_4 = 'cek in';
	private $input12_value_5 = 'cek out';

	// deklarasi variabel bagian flashdata
	private $flashdata1 = 'pesan';
	private $flashdata1_msg_1 = 'Pesanan berhasil disimpan!';
	private $flashdata1_msg_2 = 'Pesanan gagal disimpan!';
	private $flashdata1_msg_3 = 'Status Pesanan gagal diubah!';
	private $flashdata1_msg_4 = 'Status Pesanan gagal diubah!';
	private $flashdata1_msg_5 = 'Pesanan gagal dihapus!';
	private $flashdata1_msg_6 = 'Pesanan gagal dihapus!';
	private $flashdata2 = 'panggil';
	private $flashdata2_func = '$("#element").toast("show")';

	// deklarasi variabel bagian tempdata
	private $tempdata1 = 'id_user';
	private $tempdata2 = 'nama_pemesan';
	private $tempdata3 = 'email_pemesan';
	// private $tempdata4 = 'password';
	private $tempdata5 = 'hp';
	private $tempdata6 = 'akses';

	// deklarasi variabel bagian userdata
	private $userdata1 = 'id_user';
	private $userdata2 = 'nama';
	private $userdata3 = 'email';
	// private $userdata4 = 'password';
	private $userdata5 = 'hp';
	private $userdata6 = 'akses';

	public function index($id = 1)
	{

		// nilai min dan max di sini belum ada
		$param1 = $this->input->get($this->filter1);
		$param2 = $this->input->get($this->filter2);
		$param3 = $this->input->get($this->filter3);
		$param4 = $this->input->get($this->filter4);

		$data = array(
			'title' => $this->title1,
			'head' => $this->head,
			'konten' => 'v_admin-pesanan',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			$this->filter1 => $param1,
			$this->filter2 => $param2,
			$this->filter3 => $param3,
			$this->filter4 => $param4,
		);

		$this->load->view($this->page1, $data);
	}

	public function daftar($id = 1)
	{
		$where = $this->session->userdata('id_user');
		$data = array(
			'title' => 'Data Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->ambil_id_user($where)->result()
		);

		$this->load->view($this->page1, $data);
	}

	public function cari($id = 1)
	{
		$id_pesanan = $this->input->get($this->input1);
		$email = $this->input->get('email');

		$data = array(
			'title' => 'Data Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mencari dan menampilkan id pesanan berdasarkan id_pesanan yang telah diinput
			'pesanan' => $this->psn->cari($id_pesanan, $email)->result()
		);

		$this->load->view($this->page1, $data);
	}

	public function filter_cek_in($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->input->get($this->filter1);
		$param2 = $this->input->get($this->filter2);
		$param3 = $this->input->get($this->filter3);
		$param4 = $this->input->get($this->filter4);

		$data = array(
			'title' => 'Data Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_admin-pesanan',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->filter_cek_in($cek_in_min, $cek_in_max)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->filter1 => $param1,
			$this->filter2 => $param2,
			$this->filter3 => $param3,
			$this->filter4 => $param4,
		);

		$this->load->view($this->page1, $data);
	}
	public function filter_cek_out($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_admin-pesanan',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->filter_cek_out($cek_out_min, $cek_out_max)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view($this->page1, $data);
	}

	public function filter_cek_in_tamu($id = 1)
	{
		$where = $this->session->userdata('id_user');
		// nilai min dan max sudah diinput sebelumnya
		$cek_in_min = $this->input->get('cek_in_min');
		$cek_in_max = $this->input->get('cek_in_max');
		$cek_out_min = $this->input->get('cek_out_min');
		$cek_out_max = $this->input->get('cek_out_max');

		$data = array(
			'title' => 'Data Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->filter_cek_in_tamu($cek_in_min, $cek_in_max, $where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'cek_in_min' => $cek_in_min,
			'cek_in_max' => $cek_in_max,
			'cek_out_min' => $cek_out_min,
			'cek_out_max' => $cek_out_max,
		);

		$this->load->view($this->page1, $data);
	}
	public function filter_cek_out_tamu($id = 1)
	{
		$where = $this->session->userdata('id_user');
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->input->get($this->filter1);
		$param2 = $this->input->get($this->filter2);
		$param3 = $this->input->get($this->filter3);
		$param4 = $this->input->get($this->filter4);

		$data = array(
			'title' => 'Data Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->filter_cek_out_tamu($cek_out_min, $cek_out_max, $where)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			$this->filter1 => $param1,
			$this->filter2 => $param2,
			$this->filter3 => $param3,
			$this->filter4 => $param4,
		);

		$this->load->view($this->page1, $data);
	}

	public function tambah()
	{
		$email = $this->input->post($this->input4);
		$jlh = $this->input->post($this->input8);

		$where = $this->input->post($this->input7);
		$tipe_kamar = $this->tpk->ambil_harga($where)->result();

		// rumus harga total pesanan (bisa dijadikan sebuah fungsi jika menggunakan rumus yang kompleks)
		foreach ($tipe_kamar as $tp) :
			$harga_total = ($jlh * $tp->harga);
		endforeach;

		$data = array(
			$this->field1 => $this->input1_alt,
			$this->field2 => $this->input->post($this->input2),
			$this->field3 => $this->input->post($this->input3),
			$this->field4 => $email,
			$this->field5 => $this->input->post($this->input5),
			$this->field6 => $this->input->post($this->input6),
			$this->field7 => $where,
			$this->field8 => $jlh,
			$this->field9 => $harga_total,
			$this->field10 => $this->input->post($this->input10),
			$this->field11 => $this->input->post($this->input11),

			// status akan kuubah menjadi pending karena resepsionis wajib memilihkan kamar untuk user
			'status' => "pending",
			// 'status' => "belum bayar"
		);

		// membuat session supaya nilainya dapat digunakan selama waktu yang ditentukan dalam detik
		$this->session->set_tempdata($this->tempdata3, $email, 300);

		$simpan = $this->psn->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata($this->flashdata1, $this->flashdata1_msg_1);
			$this->session->set_flashdata($this->flashdata2, $this->flashdata2_func);
		} else {

			$this->session->set_flashdata($this->flashdata1, $this->flashdata1_msg_2);
			$this->session->set_flashdata($this->flashdata2, $this->flashdata2_func);
		}

		redirect(site_url($this->site_url2));
	}

	// Ini adalah fitur untuk membooking kamar berdasarkan pesanan oleh resepsionis
	// Pada fitur ini, saya akan mencoba menggunakan gabungan dari jumlah kamar dan tipe kamar, 
	// Oleh karena itu bakal ada 2 fungsi yang menggunakan parameter ini yakni, book dan ubah status. 
	// Semoga besok bisa kelar karena ini merupakan fitur yang paling rumit di antara yang lain
	public function book($id = 1)
	{
		$where = $this->input->get('jlh');
		// $kamar = $this->psn->ambildata
		// for($i = 0; $i <)
	}

	public function konfirmasi($id = 1)
	{
		$where = $this->session->tempdata($this->tempdata1);
		$data = array(
			'title' => $this->title2,
			'head' => $this->head,
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'pesanan' => $this->psn->ambil_email($where)->last_row(),
		);

		$this->load->view($this->konten2, $data);
	}

	public function update_status()
	{
		$where = $this->input->post($this->input1);
		$data = array(
			'status' => $this->input->post($this->input12)
		);

		// jika status pesanan cek in
		if ($this->input->post($this->input12) == $this->input12_value_4) {

			// hanya merubah status pesanan
			$update = $this->psn->update($data, $where);

			// jika status pesanan cek out
		} elseif ($this->input->post($this->input12) == $this->input12_value_5) {

			// menghapus data pesanan supaya trigger tambah_kamar dapat berjalan
			$hapus = $this->psn->hapus($where);

			// memasukkan nama resepsionis yang melakukan operasi
			$data = array(
				'user_aktif' => $this->session->userdata($this->userdata2)
			);

			// mengupdate history dengan nama user yang aktif
			$update = $this->htr->update_history($data, $where);
		}

		if ($update) {

			$this->session->set_flashdata($this->flashdata1, $this->flashdata1_msg_3);
			$this->session->set_flashdata($this->flashdata2, $this->flashdata2_func);
		} else {

			$this->session->set_flashdata($this->flashdata1, $this->flashdata1_msg_4);
			$this->session->set_flashdata($this->flashdata2, $this->flashdata2_func);
		}

		redirect(site_url($this->site_url1));
	}

	public function hapus($id_pesanan = null)
	{
		$hapus = $this->psn->hapus($id_pesanan);

		if ($hapus) {

			$this->session->set_flashdata($this->flashdata1, $this->flashdata1_msg_5);
			$this->session->set_flashdata($this->flashdata2, $this->flashdata2_func);
		} else {

			$this->session->set_flashdata($this->flashdata1, $this->flashdata1_msg_6);
			$this->session->set_flashdata($this->flashdata2, $this->flashdata2_func);
		}

		redirect(site_url($this->site_url1));
	}

	public function print($id_pesanan = null, $id = 1)
	{
		$data = array(
			'title' => $this->title3,
			'head' => $this->head,
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->ambil($id_pesanan)->result()
		);

		$this->load->view($this->page3, $data);
	}

	public function laporan($id = 1)
	{
		$data = array(
			'title' => $this->title4,
			'head' => $this->head,
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->ambildata()->result()
		);

		$this->load->view($this->page4, $data);
	}
}
