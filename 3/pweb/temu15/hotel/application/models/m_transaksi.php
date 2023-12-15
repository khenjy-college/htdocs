<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
	private $tabel = 'transaksi';
	private $tabel2 = 'history';
	private $tabel8 = 'pesanan';

	// 4 fungsi di bawah ini bisa dibilang pengganti fungsi ambildata atau ambil atau ambil_id_user
	public function join_pesanan()
	{
		$sql = "SELECT * FROM $this->tabel 
		JOIN $this->tabel8 
		ON $this->tabel.id_pesanan = $this->tabel8.id_pesanan";
		return $this->db->query($sql);
	}

	public function join_pesanan_tamu($where)
	{
		$sql = "SELECT * FROM $this->tabel 
		JOIN $this->tabel8 
		ON $this->tabel.id_pesanan = $this->tabel8.id_pesanan
		WHERE $this->tabel10.id_user = $where";
		return $this->db->query($sql);
	}

	public function join_history()
	{
		$sql = "SELECT DISTINCT * FROM $this->tabel 
		JOIN $this->tabel2 
		ON $this->tabel.id_pesanan = $this->tabel2.id_pesanan";
		return $this->db->query($sql);
	}

	public function join_history_tamu($where)
	{
		$sql = "SELECT DISTINCT * FROM $this->tabel 
		JOIN $this->tabel2 
		ON $this->tabel.id_pesanan = $this->tabel2.id_pesanan 
		WHERE $this->tabel10.id_user = $where";
		return $this->db->query($sql);
	}


	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_transaksi', $where);
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

	public function ambil_email($where)
	{
		$this->db->where('email', $where);
		return $this->db->get($this->tabel);
	}

	public function cari($id_transaksi, $email)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->where('email', $email);
		return $this->db->get($this->tabel);
	}

	// Saat ini aku akan menghilangkan fitur filter karena ingin fokus pada penerapan join terlebih dahulu
	// Alasannya karena tabel transaksi merupakan tabel yang sangat unik
	// karena melibatkan 2 tabel sekaligus yaitu tabel pesanan dan tabel history

	// Sebenarnya ada cara, namun itu memerlukanku untuk membuat sebuah tabel baru
	// yaitu tabel transaksi_history yang akan menggunakan trigger ketika data tabel pesanan dihapus

	// Hanya saja aku ingin mencoba bereksperimen terlebih dahulu dengan fitur JOIN
	public function filter($min, $max)
	{
		$sql = "SELECT * FROM transaksi 
		WHERE tgl_transaksi 
		BETWEEN '" . $min . "' AND '" . $max . "'";
		return $this->db->query($sql);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_transaksi', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
		$this->db->where('id_transaksi', $where);
		return $this->db->delete($this->tabel);
	}
}
