<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

	private $tabel = 'user';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_user', $where);
		return $this->db->get($this->tabel);
	}

	public function ceknama($nama)
	{
		$this->db->where('nama', $nama);
		return $this->db->get($this->tabel);
	}

	public function ceklogin($nama, $password)
	{
		$this->db->where('nama', $nama);
		$this->db->where('password', $password);
		return $this->db->get($this->tabel);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_user', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function updateCount($where)
	{
		$this->db->set('login_count', 'login_count + 1', FALSE);
		$this->db->where('id_user', $where);
		return $this->db->update($this->tabel);
	}

	// public function hapus($where)
	// {
	//   $this->db->where('id_user', $where);
	// 	return $this->db->delete($this->tabel);
	// }
}
