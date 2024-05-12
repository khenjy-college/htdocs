<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel23 extends Omnitags
{
	// Halaman publik
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v1_title['tabel23_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v1['tabel23'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel23')->result(),
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl23' => $this->tl23->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman khusus akun
	

	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel23_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel23'],
			$this->v_part5 => $this->tl232->dekor('tabel23')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl23' => $this->tl23->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$param1 = $this->views_post['tabel23_field2'];
		$param2 = date("Y-m-d\TH:i:s");
		$param3 = $this->views_post['tabel5_field4'];

		$limit = date("Y-m-d\TH:i:s", strtotime(" ". $this->aliases['tabel5_field7_limit1']));
		
		$data = array(
			$this->aliases['tabel23_field1'] => '',
			$this->aliases['tabel23_field2'] => $param1,
			$this->aliases['tabel23_field3'] => $this->views_post['tabel23_field3'],
			$this->aliases['tabel23_field4'] => NULL,
			$this->aliases['tabel23_field5'] => $param2,
		);

		// $query = 'INSERT INTO tabel23 VALUES('.$data.')';

		$simpan = $this->tl23->simpan($data);
		// $simpan = $this->tl23->simpan($query);

		$data2 = array(
			$this->aliases['tabel5_field4'] => $param3,
			$this->aliases['tabel5_field6'] => $param2,
			$this->aliases['tabel5_field7'] => $limit,
		);

		$update = $this->tl5->update($data2, $param1);

		if ($simpan && $update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_1['tabel23_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_2['tabel23_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}
		redirect(site_url('tabel5/admin'));

	}

	public function tambah_versi_aman()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		// Security: Input Sanitization and Validation
		$input2 = htmlspecialchars(trim($this->views_post['tabel23_field2']));
		$input3 = htmlspecialchars(trim($this->views_post['tabel23_field3']));

		// Form Validation
		if (empty($input2) || empty($input3)) {
			// Error Handling: Set error flash message for invalid input
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], "Invalid input. Please provide valid data.");
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
			// Functional requirement: Redirect user to 'tabel23' page
			redirect(site_url('tabel23/admin'));
		}

		// Authentication and Authorization (if applicable)

		// Functional requirement: Construct data array from validated view inputs
		$data = array(
			$this->aliases['tabel23_field1'] => '',
			$this->aliases['tabel23_field2'] => $input2,
			$this->aliases['tabel23_field3'] => $input3,
		);

		try {
			// Security: Prepared Statements to prevent SQL injection
			// Functional requirement: Save data to database
			$simpan = $this->tl23->simpan($data);

			if ($simpan) {
				// Functional requirement: Set success flash message
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_1['tabel23_alias']);
			} else {
				// Functional requirement: Set failure flash message
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_2['tabel23_alias']);
			}
			// Functional requirement: Set flash message for further action
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], "Error occurred while adding data: " . $e->getMessage());
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		// Security Headers (if applicable)

		// Session Management (if applicable)

		// Data Encryption (if applicable)

		// Code Reviews and Testing (not shown in the code)

		// Updates and Patches (not shown in the code)

		// Functional requirement: Redirect user to 'tabel23' page
		redirect(site_url('tabel23/admin'));
	}


	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();

		$tabel23_field1 = $this->views_post['tabel23_field1'];
		$data = array(
			$this->aliases['tabel23_field2'] => $this->views_post['tabel23_field2'],
			$this->aliases['tabel23_field3'] => $this->views_post['tabel23_field3'],
		);

		$update = $this->tl23->update($data, $tabel23_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_3['tabel23_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_4['tabel23_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel23/admin'));
	}

	public function hapus($tabel23_field1 = null)
	{
		$this->declarew();

		$tabel23 = $this->tl23->ambil_tabel23_field1($tabel23_field1)->result();
		$tabel23_field3 = $tabel23[0]->img;

		unlink($this->views['tabel23_field3_upload_path'] . $tabel23_field3);
		$hapus = $this->tl23->hapus($tabel23_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_5['tabel23_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_6['tabel23_alias']);
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		redirect(site_url('tabel23/admin'));
	}

	// Halaman cetak semua data
	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v4_title['tabel23_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl232->dekor('tabel23')->result(),
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl23' => $this->tl23->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v4['tabel23'], $data);
	}

	public function print($tabel23_field1 = null, $tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v5_title['tabel23'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl232->dekor('tabel23')->result(),
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl23' => $this->tl23->ambil_tabel23_field1($tabel23_field1)->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v5['tabel23'], $data);
	}	
}
