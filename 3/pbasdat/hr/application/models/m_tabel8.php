<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel8 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel8_field1'], 'DESC'); return $this->db->get($this->aliases['tabel8']);
	}

	public function ambil_tabel8_field1($param1)
	{
		$this->db->where($this->aliases['tabel8_field1'], $param1);
		$this->db->order_by($this->aliases['tabel8_field1'], 'DESC'); return $this->db->get($this->aliases['tabel8']);
	}

	public function ambil_tabel8_field2($param1)
	{
		$this->db->where($this->aliases['tabel5_field1'], $param1);
		$this->db->order_by($this->aliases['tabel8_field1'], 'DESC'); return $this->db->get($this->aliases['tabel8']);
	}

	public function ambil_tabel9_field1($param1)
	{
		$this->db->where($this->aliases['tabel9_field1'], $param1);
		$this->db->order_by($this->aliases['tabel9_field1'], 'DESC'); return $this->db->get($this->aliases['tabel8']);
	}

	public function ambil_tabel9_field3($param1)
	{
		$this->db->where($this->aliases['tabel9_field3'], $param1);
		$this->db->order_by($this->aliases['tabel9_field1'], 'DESC'); return $this->db->get($this->aliases['tabel8']);
	}

	public function cari($param1, $param2)
	{
		$this->db->where($this->aliases['tabel8_field1'], $param1);
		$this->db->where($this->aliases['tabel9_field3'], $param2);
		$this->db->order_by($this->aliases['tabel8_field1'], 'DESC'); return $this->db->get($this->aliases['tabel8']);
	}

	public function filter($param1, $param2, $param3, $param4)
	{
		$filter = "SELECT * FROM $this->aliases['tabel8'] WHERE 
		
		$this->aliases['tabel8_field10'] BETWEEN '$param1' AND '$param2'
		OR $this->aliases['tabel8_field11'] BETWEEN '$param3' AND '$param4'
		ORDER BY $this->aliases['tabel8_field1'] DESC";
		return $this->db->query($filter);
	}

	public function filter_tabel9($param1, $param2)
	{
		$filter = "SELECT * FROM $this->aliases['tabel10'] WHERE 
		$this->aliases['tabel9_field1'] IN ($param2) AND
		$this->aliases['tabel9_field1'] LIKE  '%$param1%' ORDER BY $this->aliases['tabel9_field1'] DESC";
		return $this->db->query($filter);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel8'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel8_field1'], $param1);
		return $this->db->update($this->aliases['tabel8'], $data);
	}

	public function hapus($param1)
	{
		$sql = "DELETE FROM $this->aliases['tabel8'] WHERE $this->aliases['tabel8_field1'] =  $param1;";
		return $this->db->query($sql);
	}

	public function hapus_status($param12)
	{

		$this->db->where($this->aliases['tabel8_field12'], $param12);
		return $this->db->delete($this->aliases['tabel8']);
	}
}
