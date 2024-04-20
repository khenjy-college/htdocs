<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lisensi extends CI_Model
{

	private $tabel5 = 'lisensi';

	public function ambildata()
	{
		return $this->db->get($this->tabel5);
	}

	public function ambil_tabel5_field1($tabel5_field1)
	{
		$this->db->where('id_lisensi', $tabel5_field1);
		return $this->db->get($this->tabel5);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel5, $data);
	}

	public function update($data, $tabel5_field1)
	{
		$this->db->where('id_lisensi', $tabel5_field1);
		return $this->db->update($this->tabel5, $data);
	}

	public function hapus($tabel5_field1)
	{
		$this->db->where('id_lisensi', $tabel5_field1);
		return $this->db->delete($this->tabel5);
	}
}
