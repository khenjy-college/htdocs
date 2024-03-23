<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_spp extends CI_Model
{

	private $tabel = 'spp';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_spp', $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_harga($where)
	{
		$this->db->where('id_spp', $where);
		return $this->db->get($this->tabel);
	}

	public function simpan($data)
	// public function simpan($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_spp', $where);
		return $this->db->update($this->tabel, $data);
	}

	// public function hapus($where)
	// {
	// 	$this->db->where('id_spp', $where);
	// 	return $this->db->delete($this->tabel);
	// }
}
