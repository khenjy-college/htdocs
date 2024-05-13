<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel6 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel6_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel6']);
	}

	public function getChartTabel8()
	{
		// Query to fetch data from the database
		$query = $this->db->query("SELECT t6." . $this->aliases['tabel6_field2'] . " AS label, 
		COUNT(t8." . $this->aliases['tabel8_field1'] . ") AS value
		FROM " . $this->aliases['tabel6'] . " AS t6
        LEFT JOIN " . $this->aliases['tabel8'] . " AS t8 
		ON t6." . $this->aliases['tabel6_field1'] . " = t8." . $this->aliases['tabel6_field1'] . "
        GROUP BY t6." . $this->aliases['tabel6_field1'] . "");

		// Convert query result to associative array
		$result = $query->result_array();

		return $result;
	}

	public function getChartTabel2()
	{
		// Query to fetch data from the database
		$query = $this->db->query("SELECT t6." . $this->aliases['tabel6_field2'] . " AS label, 
		COUNT(t2." . $this->aliases['tabel2_field2'] . ") AS value
		FROM " . $this->aliases['tabel6'] . " AS t6
		LEFT JOIN " . $this->aliases['tabel2'] . " AS t2 
		ON t6." . $this->aliases['tabel6_field1'] . " = t2." . $this->aliases['tabel6_field1'] . "
		GROUP BY t6." . $this->aliases['tabel6_field1'] . ";");

		// Convert query result to associative array
		$result = $query->result_array();

		return $result;
	}

	public function ambil_tabel6_field1($param1)
	{
		$this->db->where($this->aliases['tabel6_field1'], $param1);
		$this->db->order_by($this->aliases['tabel6_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel6']);
	}

	public function simpan($data)
	// public function simpan($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel6'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel6_field1'], $param1);
		return $this->db->update($this->aliases['tabel6'], $data);
	}

	// public function hapus($param1)
	// {
	// 	$this->db->where($this->aliases['tabel6_field1'], $param1);
	// 	return $this->db->delete($this->aliases['tabel6']);
	// }
}
