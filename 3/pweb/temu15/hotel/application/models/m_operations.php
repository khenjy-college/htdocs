<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_operations extends CI_Model
{
	private $tabel = 'operations';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_operations', $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_id_user($where)
	{
		$this->db->where('id_user', $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_email($where)
	{
		$this->db->where('email', $where);
		return $this->db->get($this->tabel);
	}

	public function cari($id_operations, $email)
	{
		$this->db->where('id_operations', $id_operations);
		$this->db->where('email', $email);
		return $this->db->get($this->tabel);
	}

	public function filter_cek_in($cek_in_min, $cek_in_max)
	{
		$sql = "SELECT * FROM operations WHERE cek_in BETWEEN '" . $cek_in_min . "' AND '" . $cek_in_max . "'";
		return $this->db->query($sql);
	}

	public function filter_cek_out($cek_out_min, $cek_out_max)
	{
		$sql = "SELECT * FROM operations WHERE cek_in BETWEEN '" . $cek_out_min . "' AND '" . $cek_out_max . "'";
		return $this->db->query($sql);
	}

	public function filter_cek_in_tamu($cek_in_min, $cek_in_max, $where)
	{
		$sql = "SELECT * FROM operations WHERE 
		id_user IN ('" . $where . "') AND
		cek_in BETWEEN '" . $cek_in_min . "' AND '" . $cek_in_max . "'
		";
		return $this->db->query($sql);
	}

	public function filter_cek_out_tamu($cek_out_min, $cek_out_max, $where)
	{
		$sql = "SELECT * FROM operations WHERE 
		id_user IN ('" . $where . "') AND
		cek_out BETWEEN '" . $cek_out_min . "' AND '" . $cek_out_max . "'
		ORDER BY id_operations DESC";
		return $this->db->query($sql);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_operations', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
		$this->db->where('id_operations', $where);
		return $this->db->delete($this->tabel);
	}
}
