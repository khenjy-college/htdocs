<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan extends CI_Model
{
	private $tabel8 = 'pesanan';

	public function ambildata()
	{
		return $this->db->get($this->tabel8);
	}

	public function ambil_tabel8_field1($tabel8_field1)
	{
		$this->db->where('id_pesanan', $tabel8_field1);
		return $this->db->get($this->tabel8);
	}

	public function ambil_tabel8_field2($tabel8_field3)
	{
		$this->db->where('no_kamar', $tabel8_field3);
		return $this->db->get($this->tabel8);
	}

	public function ambil_tabel9_field1($tabel9_field1)
	{
		$this->db->where('id_user', $tabel9_field1);
		return $this->db->get($this->tabel8);
	}

	public function ambil_tabel9_field3($ambil_tabel9_field3)
	{
		$this->db->where('email', $ambil_tabel9_field3);
		return $this->db->get($this->tabel8);
	}

	public function cari($tabel8_field1, $tabel9_field3)
	{
		$this->db->where('id_pesanan', $tabel8_field1);
		$this->db->where('email', $tabel9_field3);
		return $this->db->get($this->tabel8);
	}

	public function filter($param1)
	{
		$filter = "SELECT * FROM $this->tabel8 WHERE 
		
		id_user LIKE '%" . $param1 . "%'";
		return $this->db->query($filter);
	}

	public function filter_tabel4($param1, $tabel4_field1)
	{
		$filter = "SELECT * FROM $this->tabel10 WHERE 
		id_user IN ('" . $tabel4_field1 . "') AND
		id_user LIKE  '%" . $param1 . "%'";
		return $this->db->query($filter);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel8, $data);
	}

	public function update($data, $tabel8_field1)
	{
		$this->db->where('id_pesanan', $tabel8_field1);
		return $this->db->update($this->tabel8, $data);
	}

	public function hapus($tabel8_field1)
	{
		$sql = "DELETE FROM " . $this->tabel8 . " WHERE id_pesanan =  " . $tabel8_field1 . ";";
		return $this->db->query($sql);
	}

	public function hapus_status($where)
	{

		$this->db->where('status', $where);
		return $this->db->delete($this->tabel8);
	}
}
