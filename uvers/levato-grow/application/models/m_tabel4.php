<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel4 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel4']);
	}

	public function ambil_tabel4_field1($param1)
	{
		$this->db->where($this->aliases['tabel4_field1'], $param1);
		$this->db->order_by($this->aliases['tabel4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel4']);
	}

	public function cek_tabel4_field1($param1)
	{
		$this->db->where($this->aliases['tabel4_field1'], $param1);
		$this->db->order_by($this->aliases['tabel4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel4']);
	}

	public function cek_tabel4_field2($param1)
	{
		$this->db->where($this->aliases['tabel4_field2'], $param1);
		$this->db->order_by($this->aliases['tabel4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel4']);
	}

	public function ceklogin($param1, $param2)
	{
		$this->db->where($this->aliases['tabel4_field1'], $param1);
		$this->db->where($this->aliases['tabel4_field4'], $param2);
		$this->db->order_by($this->aliases['tabel4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel4']);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel4'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel4_field1'], $param1);
		return $this->db->update($this->aliases['tabel4'], $data);
	}

	public function updateCount($param1)
	{
		$this->db->set('login_count', 'login_count + 1', FALSE);
		$this->db->where($this->aliases['tabel4_field1'], $param1);
		return $this->db->update($this->aliases['tabel4']);
	}

	// public function hapus($param1)
	// {
	//   $this->db->where($this->aliases['tabel4_field1'], $param1);
	// 	return $this->db->delete($this->aliases['tabel4']);
	// }
}
