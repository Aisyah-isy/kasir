<?php
class Penjualan_m extends CI_Model
{
	public function index()
	{
		$tgl    = date('y-m-d');
		$this->db->select('*');
		$this->db->from('penjualan a')->order_by('a.tanggal', 'DESC')->where('a.tanggal', $tgl);
		$this->db->join('pelanggan b', 'a.id_pelanggan=b.id_pelanggan', 'left');
		$penjualan = $this->db->get()->result_array();
		$this->db->from('pelanggan')->order_by('nama', 'ASC');
		$pelanggan = $this->db->get()->result_array();
	}
}
