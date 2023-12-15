<?php

use PharIo\Version\AndVersionConstraintGroup;
use PhpParser\Node\ComplexType;

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


	// Eventhought the codes below works, there's still flasws inside the code
	// To apply the filter, I actualy have two options, 
	// first, is to make the filter must be fill altogether so that the filter will perfectly work,
	// but it will make the website seems a bit messy and a lot of codes
	// second, is to make the a dropdown or a toggle that can switch between cek in or cek out filter
	// three, is to make a javascript that can switch the button from the one that using the filter function with OR 
	// and the filter function with AND, with that, the fiter will be fine
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
