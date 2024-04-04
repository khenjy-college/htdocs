<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_fashotel extends CI_Model
{

	private $tabel3 = 'fashotel';

	public function ambildata()
	{
		return $this->db->get($this->tabel3);
	}

	public function ambil_ambil_tabel3_field1($tabel3_field1)
	{
		$this->db->where('id_fashotel', $tabel3_field1);
		return $this->db->get($this->tabel3);
	}

	public function ambil_harga($tabel3_field1)
	{
		$this->db->where('id_fashotel', $tabel3_field1);
		return $this->db->get($this->tabel3);
	}

	public function simpan($data)
	// public function simpan($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->tabel3, $data);
	}

	public function update($data, $tabel3_field1)
	{
		$this->db->where('id_fashotel', $tabel3_field1);
		return $this->db->update($this->tabel3, $data);
	}

	// public function hapus($where)
	// {
	// 	$this->db->where('id_fashotel', $where);
	// 	return $this->db->delete($this->tabel3);
	// }
}
