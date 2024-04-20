<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel12 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel12_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel12']);
	}

	public function dekor($param1)
	{
		$this->db->where($this->aliases['tabel12_field2'], $param1);
		$this->db->order_by($this->aliases['tabel12_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel12']);
	}

	public function ambil_tabel12_field1($param1)
	{
		$this->db->where($this->aliases['tabel12_field1'], $param1);
		$this->db->order_by($this->aliases['tabel12_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel12']);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel12'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel12_field1'], $param1);
		return $this->db->update($this->aliases['tabel12'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel12_field1'], $param1);
		return $this->db->delete($this->aliases['tabel12']);
	}
}
