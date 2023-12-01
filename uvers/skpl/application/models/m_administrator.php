<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_administrator extends CI_Model {

  private $tabel = 'administrator';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
    $this->db->where('id_admin', $where);
		return $this->db->get($this->tabel);
	}

	public function ceknama_admin($nama_admin)
	{
    $this->db->where('nama_admin', $nama_admin);
		return $this->db->get($this->tabel);
	}

	public function ceklogin($nama_admin, $password)
	{
    $this->db->where('nama_admin', $nama_admin);
    $this->db->where('password', $password);
		return $this->db->get($this->tabel);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
    $this->db->where('id_admin', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
    $this->db->where('id_admin', $where);
		return $this->db->delete($this->tabel);
	}
}
