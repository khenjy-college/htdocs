<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{

	private $tabel = 'siswa';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('nisn', $where);
		return $this->db->get($this->tabel);
	}

	public function ceknisn($nisn)
	{
		$this->db->where('nisn', $nisn);
		return $this->db->get($this->tabel);
	}

	public function ceknama($nisn)
	{
		$this->db->where('nama', $nisn);
		return $this->db->get($this->tabel);
	}

	public function ceklogin($nisn, $password)
	{
		$this->db->where('nisn', $nisn);
		$this->db->where('password', $password);
		return $this->db->get($this->tabel);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('nisn', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function updateCount($where)
	{
		$this->db->set('login_count', 'login_count + 1', FALSE);
		$this->db->where('nisn', $where);
		return $this->db->update($this->tabel);
	}

	// public function hapus($where)
	// {
	//   $this->db->where('nisn', $where);
	// 	return $this->db->delete($this->tabel);
	// }
}
