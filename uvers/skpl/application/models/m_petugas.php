<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_petugas extends CI_Model
{

	private $tabel4 = 'petugas';

	public function ambildata()
	{
		return $this->db->get($this->tabel4);
	}

	public function ambil_tabel4_field1($tabel4_field1)
	{
		$this->db->where('id_petugas', $tabel4_field1);
		return $this->db->get($this->tabel4);
	}

	public function cek_tabel4_field1($tabel4_field1)
	{
		$this->db->where('id_petugas', $tabel4_field1);
		return $this->db->get($this->tabel4);
	}

	public function cek_tabel4_field2($tabel4_field2)
	{
		$this->db->where('nis', $tabel4_field2);
		return $this->db->get($this->tabel4);
	}

	public function ceklogin($tabel4_field1, $tabel4_field4)
	{
		$this->db->where('id_petugas', $tabel4_field1);
		$this->db->where('password', $tabel4_field4);
		return $this->db->get($this->tabel4);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel4, $data);
	}

	public function update($data, $tabel4_field1)
	{
		$this->db->where('id_petugas', $tabel4_field1);
		return $this->db->update($this->tabel4, $data);
	}

	public function updateCount($tabel4_field1)
	{
		$this->db->set('login_count', 'login_count + 1', FALSE);
		$this->db->where('id_petugas', $tabel4_field1);
		return $this->db->update($this->tabel4);
	}

	// public function hapus($where)
	// {
	//   $this->db->where('id_petugas', $where);
	// 	return $this->db->delete($this->tabel4);
	// }
}
