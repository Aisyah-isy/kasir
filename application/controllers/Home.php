<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
		if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
        $tgl    = date('Y-m-d');
        $this->db->select('sum(total_harga) as total');
        $this->db->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m-%d') =",  $tgl);
        $hari_ni = $this->db->get()->row()->total;

        $this->db->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m-%d') =",  $tgl);
        $transaksi =  $this->db->count_all_results();

        $produk = $this->db->from('produk')->count_all_results();

        $tgl    = date('Y-m');
        $this->db->select('sum(total_harga) as total');
        $this->db->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =",  $tgl);
        $bulan_ni = $this->db->get()->row()->total;

        if($hari_ni==NULL){$hari_ni=0;}
        if($bulan_ni==NULL){$bulan_ni=0;}
        if($transaksi==NULL){$transaksi=0;}
		$data = array(
            'judul_halaman' => 'Dashboard',
            'hari_ni' => $hari_ni,
            'bulan_ni' => $bulan_ni,
            'transaksi' => $transaksi,
            'produk' => $produk,
        );
		$this->template->load('template','dashboard',$data);
	}

}
