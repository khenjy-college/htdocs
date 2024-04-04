<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
	private $tabel10 = 'transaksi';
	private $tabel2 = 'history';
	private $tabel8 = 'tb_transaksi';

	// 4 fungsi di bawah ini bisa dibilang pengganti fungsi ambildata atau ambil atau ambil_tabel9_field1
	public function join_tabel8()
	{
		$sql = "SELECT * FROM $this->tabel10 
		JOIN $this->tabel8 
		ON $this->tabel10.id_pembayaran = $this->tabel8.id_pembayaran";
		return $this->db->query($sql);
	}

	public function join_tabel8_tamu($where)
	{
		$sql = "SELECT * FROM $this->tabel10 
		JOIN $this->tabel8 
		ON $this->tabel10.id_pembayaran = $this->tabel8.id_pembayaran
		WHERE $this->tabel10.id_user = $where";
		return $this->db->query($sql);
	}

	public function join_tabel2()
	{
		$sql = "SELECT DISTINCT * FROM $this->tabel10 
		JOIN $this->tabel2 
		ON $this->tabel10.id_pembayaran = $this->tabel2.id_pembayaran";
		return $this->db->query($sql);
	}

	public function join_tabel2_tamu($where)
	{
		$sql = "SELECT DISTINCT * FROM $this->tabel10 
		JOIN $this->tabel2 
		ON $this->tabel10.id_pembayaran = $this->tabel2.id_pembayaran 
		WHERE $this->tabel10.id_user = $where";
		return $this->db->query($sql);
	}


	public function ambildata()
	{
		return $this->db->get($this->tabel10);
	}

	public function ambil_tabel10_field1($tabel10_field1)
	{
		$this->db->where('id_transaksi', $tabel10_field1);
		return $this->db->get($this->tabel10);
	}

	public function ambil_tabel9_field1($where)
	{
		$this->db->where('id_user', $where);
		return $this->db->get($this->tabel10);
	}

	public function ambil_tabel10_field2($where)
	{
		$this->db->where('id_pembayaran', $where);
		return $this->db->get($this->tabel10);
	}

	public function ambil_tabel9_field3($tabel9_field3)
	{
		$this->db->where('email', $tabel9_field3);
		return $this->db->get($this->tabel10);
	}

	public function cari($tabel10_field1, $tabel9_field3)
	{
		$this->db->where('id_transaksi', $tabel10_field1);
		$this->db->where('email', $tabel9_field3);
		return $this->db->get($this->tabel10);
	}

	// Saat ini aku akan menghilangkan fitur filter karena ingin fokus pada penerapan join terlebih dahulu
	// Alasannya karena tabel10 transaksi merupakan tabel10 yang sangat unik
	// karena melibatkan 2 tabel10 sekaligus yaitu tabel10 pembayaran dan tabel10 history

	// Sebenarnya ada cara, namun itu memerlukanku untuk membuat sebuah tabel10 baru
	// yaitu tabel10 transaksi_history yang akan menggunakan trigger ketika data tabel10 pembayaran dihapus

	// Hanya saja aku ingin mencoba bereksperimen terlebih dahulu dengan fitur JOIN
	public function filter($min, $max)
	{
		$sql = "SELECT * FROM $this->tabel10
		WHERE tgl_transaksi 
		BETWEEN '" . $min . "' AND '" . $max . "'";
		return $this->db->query($sql);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel10, $data);
	}

	public function update($data, $tabel10_field1)
	{
		$this->db->where('id_transaksi', $tabel10_field1);
		return $this->db->update($this->tabel10, $data);
	}

	public function hapus($tabel10_field1)
	{
		$this->db->where('id_transaksi', $tabel10_field1);
		return $this->db->delete($this->tabel10);
	}
}
