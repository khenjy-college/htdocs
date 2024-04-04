<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tipe_kamar extends CI_Model
{

	private $tabel6 = 'tipe_kamar';

	public function ambildata()
	{
		return $this->db->get($this->tabel6);
	}

	public function ambil_ambil_tabel6_field1($tabel6_field1)
	{
		$this->db->where('id_tipe', $tabel6_field1);
		return $this->db->get($this->tabel6);
	}

	public function ambil_harga($tabel6_field1)
	{
		$this->db->where('id_tipe', $tabel6_field1);
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
		$this->db->where('id_tipe', $tabel6_field1);
		return $this->db->update($this->tabel6, $data);
	}

	// public function hapus($where)
	// {
	// 	$this->db->where('id_tipe', $where);
	// 	return $this->db->delete($this->tabel6);
	// }
}
