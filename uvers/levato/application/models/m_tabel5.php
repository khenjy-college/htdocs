<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel5 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel5']);
	}

	public function ambil_tabel5_field1($param1)
	{
		$this->db->where($this->aliases['tabel5_field1'], $param1);
		$this->db->order_by($this->aliases['tabel5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel5']);
	}

	public function ambil_tabel8_field1($param1)
	{
		$this->db->where($this->aliases['tabel8_field1'], $param1);
		$this->db->order_by($this->aliases['tabel5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel5']);
	}

	public function ambil_tabel4_field1($param1)
	{
		$subquery = "(SELECT {$this->aliases['tabel6_field1']} FROM {$this->aliases['tabel6']} WHERE {$this->aliases['tabel4_field1']} = {$param1})";

		$this->db->where("{$this->aliases['tabel6_field1']} IN $subquery", NULL, FALSE);
		$this->db->order_by($this->aliases['tabel5_field1'], 'DESC');

		return $this->db->get($this->aliases['tabel5']);
	}


	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel5'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel5_field1'], $param1);
		return $this->db->update($this->aliases['tabel5'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel5_field1'], $param1);
		return $this->db->delete($this->aliases['tabel5']);
	}
}
