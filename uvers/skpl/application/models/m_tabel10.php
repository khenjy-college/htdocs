<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel10 extends CI_Model
{
	// 4 fungsi di bawah ini bisa dibilang pengganti fungsi ambildata atau ambil atau ambil_tabel9_field1
	public function join_tabel8()
	{
		$sql = "SELECT * FROM " . $this->aliases['tabel10'] . "
		JOIN " . $this->aliases['tabel8'] . "
		ON $this->aliases['tabel10']" . "." . $this->aliases['tabel8_field1'] . " = " . $this->aliases['tabel8'] . "." . $this->aliases['tabel8_field1'] . "";
		return $this->db->query($sql);
	}

	public function join_tabel8_tamu($param1)
	{
		$sql = "SELECT * FROM " . $this->aliases['tabel10'] . " 
		JOIN " . $this->aliases['tabel8'] . " 
		ON " . $this->aliases['tabel10'] . "." . $this->aliases['tabel8_field1'] . " = " . $this->aliases['tabel8'] . "." . $this->aliases['tabel8_field1'] . "
		WHERE " . $this->aliases['tabel10'] . ". " . $this->aliases['tabel9_field1'] . " = $param1";
		return $this->db->query($sql);
	}

	public function join_tabel2()
	{
		$sql = "SELECT DISTINCT * FROM " . $this->aliases['tabel10'] . " 
		JOIN " . $this->aliases['tabel2'] . " 
		ON " . $this->aliases['tabel10'] . "." . $this->aliases['tabel8_field1'] . " = " . $this->aliases['tabel2'] . "." . $this->aliases['tabel8_field1'] . "";
		return $this->db->query($sql);
	}

	public function join_tabel2_tamu($param1)
	{
		$sql = "SELECT DISTINCT * FROM " . $this->aliases['tabel10'] . " 
		JOIN " . $this->aliases['tabel2'] . " 
		ON " . $this->aliases['tabel10'] . "." . $this->aliases['tabel8_field1'] . " = " . $this->aliases['tabel2'] . "." . $this->aliases['tabel8_field1'] . " 
		WHERE " . $this->aliases['tabel10'] . "." . $this->aliases['tabel9_field1'] . " = $param1";
		return $this->db->query($sql);
	}


	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel10_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel10']);
	}

	public function ambil_tabel10_field1($param1)
	{
		$this->db->where($this->aliases['tabel10_field1'], $param1);
		$this->db->order_by($this->aliases['tabel10_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel10']);
	}

	public function ambil_tabel9_field1($param1)
	{
		$this->db->where($this->aliases['tabel9_field1'], $param1);
		$this->db->order_by($this->aliases['tabel9_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel10']);
	}

	public function ambil_tabel10_field2($param1)
	{
		$this->db->where($this->aliases['tabel8_field1'], $param1);
		$this->db->order_by($this->aliases['tabel8_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel10']);
	}

	public function ambil_tabel9_field3($param1)
	{
		$this->db->where($this->aliases['tabel9_field3'], $param1);
		$this->db->order_by($this->aliases['tabel9_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel10']);
	}

	public function cari($param1, $param2)
	{
		$this->db->where($this->aliases['tabel10_field1'], $param1);
		$this->db->where($this->aliases['tabel9_field3'], $param2);
		$this->db->order_by($this->aliases['tabel10_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel10']);
	}

	// Saat ini aku akan menghilangkan fitur filter karena ingin fokus pada penerapan join terlebih dahulu
	// Alasannya karena tabel10 transaksi merupakan tabel10 yang sangat unik
	// karena melibatkan 2 tabel10 sekaligus yaitu tabel10 pesanan dan tabel10 history

	// Sebenarnya ada cara, namun itu memerlukanku untuk membuat sebuah tabel10 baru
	// yaitu tabel10 transaksi_history yang akan menggunakan trigger ketika data tabel10 pesanan dihapus

	// Hanya saja aku ingin mencoba bereksperimen terlebih dahulu dengan fitur JOIN
	public function filter($min, $max)
	{
		$sql = "SELECT * FROM " . $this->aliases['tabel10'] . "
		WHERE " . $this->aliases['tabel10_field7'] . "
		BETWEEN '" . $min . "' AND '" . $max . "' ORDER BY " . $this->aliases['tabel10_field1'] . " DESC";
		return $this->db->query($sql);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel10'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel10_field1'], $param1);
		return $this->db->update($this->aliases['tabel10'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel10_field1'], $param1);
		return $this->db->delete($this->aliases['tabel10']);
	}
}
