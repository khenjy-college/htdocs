<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_petugas extends CI_Model
{

	private $tabel = 'petugas';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_petugas', $where);
		return $this->db->get($this->tabel);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_petugas', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
		$this->db->where('id_petugas', $where);
		return $this->db->delete($this->tabel);
	}
}
