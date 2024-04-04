<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	private $tabel9 = 'user';

	public function ambildata()
	{
		return $this->db->get($this->tabel9);
	}

	public function ambil_tabel9_field1($tabel9_field1)
	{
		$this->db->where('id_user', $tabel9_field1);
		return $this->db->get($this->tabel9);
	}

	public function ambil_tabel4_field1($tabel4_field1)
	{
		$this->db->where('id_user', $tabel4_field1);
		return $this->db->get($this->tabel9);
	}

	public function ambil_tabel6_field1($tabel6_field1)
	{
		$this->db->where('id_user', $tabel6_field1);
		return $this->db->get($this->tabel9);
	}

	public function cek_tabel9_field3($tabel9_field3)
	{
		$this->db->where('email', $tabel9_field3);
		return $this->db->get($this->tabel9);
	}

	public function ceklogin($tabel9_field3, $tabel9_field4)
	{
		$this->db->where('email', $tabel9_field3);
		$this->db->where('password', $tabel9_field4);
		return $this->db->get($this->tabel9);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel9, $data);
	}

	public function update($data, $tabel9_field1)
	{
		$this->db->where('id_user', $tabel9_field1);
		return $this->db->update($this->tabel9, $data);
	}

	public function updateCount($tabel9_field1)
	{
		$this->db->set('login_count', 'login_count + 1', FALSE);
		$this->db->where('id_user', $tabel9_field1);
		return $this->db->update($this->tabel9);
	}

	// public function hapus($where)
	// {
	//   $this->db->where('id_user', $where);
	// 	return $this->db->delete($this->tabel9);
	// }
}
