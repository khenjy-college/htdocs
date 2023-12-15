<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_history extends CI_Model
{

	private $tabel = 'history';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_history', $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_id_user($where)
	{
		$this->db->where('id_user', $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_id_pesanan($where)
	{
		$this->db->where('id_pesanan', $where);
		return $this->db->get($this->tabel);
	}

	public function filter($cek_in_min, $cek_in_max, $cek_out_min, $cek_out_max)
	{
		$filter = "SELECT * FROM history WHERE 
		
		cek_in BETWEEN '" . $cek_in_min . "' AND '" . $cek_in_max . "'
		 OR 
		
		cek_out BETWEEN '" . $cek_out_min . "' AND '" . $cek_out_max . "'
		";
		return $this->db->query($filter);
	}

	public function filter_tamu($cek_in_min, $cek_in_max, $cek_out_min, $cek_out_max, $where)
	{
		$filter = "SELECT * FROM history WHERE 
		id_user IN ('" . $where . "') AND
		cek_in BETWEEN '" . $cek_in_min . "' AND '" . $cek_in_max . "'
		OR
		cek_out BETWEEN '" . $cek_out_min . "' AND '" . $cek_out_max . "'
		";
		return $this->db->query($filter);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_history', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function update_history($data, $where)
	{
		$this->db->where('id_pesanan', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
		$this->db->where('id_history', $where);
		return $this->db->delete($this->tabel);
	}
}
