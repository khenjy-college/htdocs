<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengaturan extends CI_Model
{
	private $tabel7 = 'pengaturan';

	public function ambildata()
	{
		return $this->db->get($this->tabel7);
	}

	public function ambil_tabel7_field1($tabel7_field1)
	{
		$this->db->where('id', $tabel7_field1);
		return $this->db->get($this->tabel7);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel7, $data);
	}

	public function update($data, $tabel7_field1)
	{
		$this->db->where('id', $tabel7_field1);
		return $this->db->update($this->tabel7, $data);
	}

	public function hapus($tabel7_field1)
	{
		$this->db->where('id', $tabel7_field1);
		return $this->db->delete($this->tabel7);
	}
}
