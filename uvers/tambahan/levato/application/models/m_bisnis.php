<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bisnis extends CI_Model
{

	private $tabel6 = 'bisnis';

	public function ambildata()
	{
		return $this->db->get($this->tabel6);
	}

	public function ambil_ambil_tabel6_field1($tabel6_field1)
	{
		$this->db->where('id_usaha', $tabel6_field1);
		return $this->db->get($this->tabel6);
	}

	public function ambil_harga($tabel6_field1)
	{
		$this->db->where('id_usaha', $tabel6_field1);
		return $this->db->get($this->tabel6);
	}

	public function simpan($data)
	// public function simpan($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->tabel6, $data);
	}

	public function update($data, $tabel6_field1)
	{
		$this->db->where('id_usaha', $tabel6_field1);
		return $this->db->update($this->tabel6, $data);
	}

	// public function hapus($where)
	// {
	// 	$this->db->where('id_usaha', $where);
	// 	return $this->db->delete($this->tabel6);
	// }
}
