<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_operations extends CI_Model
{

	private $tabel11 = 'operations';

	public function ambildata()
	{
		return $this->db->get($this->tabel11);
	}

	public function ambil_ambil_tabel11_field1($tabel11_field1)
	{
		$this->db->where('id_operasional', $tabel11_field1);
		return $this->db->get($this->tabel11);
	}

	public function ambil_harga($tabel11_field1)
	{
		$this->db->where('id_operasional', $tabel11_field1);
		return $this->db->get($this->tabel11);
	}

	public function simpan($data)
	// public function simpan($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->tabel11, $data);
	}

	public function update($data, $tabel11_field1)
	{
		$this->db->where('id_operasional', $tabel11_field1);
		return $this->db->update($this->tabel11, $data);
	}

	// public function hapus($where)
	// {
	// 	$this->db->where('id_operasional', $where);
	// 	return $this->db->delete($this->tabel11);
	// }
}
