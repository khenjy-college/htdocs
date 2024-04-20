<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembaruan extends CI_Model
{

	private $tabel1 = 'pembaruan';

	public function ambildata()
	{
		return $this->db->get($this->tabel1);
	}

	public function ambil_ambil_tabel1_field1($tabel1_field1)
	{
		$this->db->where('id_pembaruan', $tabel1_field1);
		return $this->db->get($this->tabel1);
	}

	public function ambil_harga($tabel1_field1)
	{
		$this->db->where('id_pembaruan', $tabel1_field1);
		return $this->db->get($this->tabel1);
	}

	public function simpan($data)
	// public function simpan($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->tabel1, $data);
	}

	public function update($data, $tabel1_field1)
	{
		$this->db->where('id_pembaruan', $tabel1_field1);
		return $this->db->update($this->tabel1, $data);
	}

	// public function hapus($where)
	// {
	// 	$this->db->where('id_pembaruan', $where);
	// 	return $this->db->delete($this->tabel1);
	// }
}
