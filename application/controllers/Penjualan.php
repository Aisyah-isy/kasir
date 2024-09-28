<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl    = date('y-m-d');
        $this->db->select('*');
        $this->db->from('penjualan a')->order_by('a.tanggal', 'DESC')->where('a.tanggal', $tgl);
        $this->db->join('pelanggan b', 'a.id_pelanggan=b.id_pelanggan', 'left');
        $penjualan = $this->db->get()->result_array();
        $this->db->from('pelanggan')->order_by('nama', 'ASC');
        $pelanggan = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Penjualan',
            'penjualan' => $penjualan,
            'pelanggan' => $pelanggan
        );
        $this->template->load('template', 'penjualan', $data);
    }
    public function transaksi($id_pelanggan) //dari web
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl    = date('Y-m');
        $this->db->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =",  $tgl);
        $jumlah = $this->db->count_all_results();
        $nota   = date('ymd') . $jumlah + 1;

        $this->db->from('produk')->where('stok >', 0)->order_by('nama', 'ASC');
        $produk = $this->db->get()->result_array();

        $this->db->from('pelanggan')->where('id_pelanggan', $id_pelanggan);
        $namapelanggan = $this->db->get()->row()->nama;

        $this->db->from('detail_penjualan a')->join('produk b', 'a.id_produk=b.id_produk', 'left')->where('a.kode_penjualan', $nota);
        $detail = $this->db->get()->result_array();

        $this->db->from('temp a')->join('produk b', 'a.id_produk=b.id_produk', 'left')
            ->where('a.id_user', $this->session->userdata('id_user'))->where('a.id_pelanggan', $id_pelanggan);
        $temp = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => 'Transaksi Penjualan',
            'nota'          => $nota,
            'produk'        => $produk,
            'id_pelanggan'  => $id_pelanggan,
            'nama_pelanggan' => $namapelanggan,
            'detail'        => $detail,
            'temp'           => $temp
        );
        $this->template->load('template', 'penjualan_transaksi', $data);
    }
    public function addtemp()
    {
        $this->db->from('produk')->where('id_produk', $this->input->post('id_produk'));
        $stok_lama = $this->db->get()->row()->stok; // stok produk

        $this->db->from('temp');
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
        $cek = $this->db->get()->result_array();
        //mengecek produk

        if ($stok_lama < $this->input->post('jumlah')) {
            //cek stok produk apakah kurang dari jumlah yang di inputkan
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Stok Produk Yang dipilih Tidak Mencukupi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>');
        } else if ($cek <> NULL) { //mengecek produk apakah sudah di pilih
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Produk Sudah Dipilih<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>');
        } else { //ada stok produknya dan belum di pilih maka bisa insert ke dataabse
            $data = array(
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'id_user' => $this->session->userdata('id_user'),
                'id_produk' => $this->input->post('id_produk'),
                'jumlah' => $this->input->post('jumlah'),
            ); //13.00 bagian 17
            $this->db->insert('temp', $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Produk Berhasil Ditambahkan ke Keranjang<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>');
        }
        redirect($_SERVER["HTTP_REFERER"]); //mindahin halaman

    }
    public function addkeranjang()
    {
        $this->db->from('detail_penjualan')->where('id_produk', $this->input->post('id_produk'))
            ->where('kode_penjualan', $this->input->post('kode_penjualan'));
        $cek = $this->db->get()->result_array(); //barang yang sudah ada di keranjang tidak bisa di tambah lagi
        if ($cek <> NULL) {
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Produk Sudah Dipilih<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>');
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->db->from('produk')->where('id_produk', $this->input->post('id_produk'));
        $harga = $this->db->get()->row()->harga;
        $this->db->from('produk')->where('id_produk', $this->input->post('id_produk')); //stok produk
        $stok_lama = $this->db->get()->row()->stok;
        $stok_baru = $stok_lama - $this->input->post('jumlah');
        $sub_total = $this->input->post('jumlah') * $harga; //total harga produk
        $data = array(
            'kode_penjualan' => $this->input->post('kode_penjualan'),
            'id_produk' => $this->input->post('id_produk'),
            'jumlah' => $this->input->post('jumlah'),
            'sub_total' => $sub_total,
        );
        if ($stok_lama >= $this->input->post('jumlah')) { //syarat nya jumlah tidak melebihi stok
            $this->db->insert('detail_penjualan', $data);
            $data2 = array('stok'  => $stok_baru);
            $where = array('id_produk' => $this->input->post('id_produk'),);
            $this->db->update('produk', $data2, $where);
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Produk Berhasil Ditambahkan ke Keranjang<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>');
        } else { //produk yang dipilih jumlahnya melebihi stok
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Stok Produk Yang dipilih Tidak Mencukupi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>');
        }
        redirect($_SERVER["HTTP_REFERER"]);
    }
    public function hapus($id_detail, $id_produk)
    {
        $this->db->from('detail_penjualan')->where('id_detail', $id_detail);
        $jumlah = $this->db->get()->row()->jumlah;

        $this->db->from('produk')->where('id_produk', $id_produk);
        $stok_lama = $this->db->get()->row()->stok;
        $stok_baru = $jumlah + $stok_lama; //dapet stok yang tersisa sama yg di hapus

        $data2 = array('stok'  => $stok_baru);
        $where = array('id_produk' => $id_produk);
        $this->db->update('produk', $data2, $where); //update stok yangudah di hapus

        $id_detail = array(
            'id_detail' => $id_detail
        );
        $this->db->delete('detail_penjualan', $id_detail);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Berhasil Menghapus Produk Dari Keranjang<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>');
        redirect($_SERVER["HTTP_REFERER"]);
    }
    public function hapus_temp($id_temp)
    {
        $id_detail = array(
            'id_temp' => $id_temp
        );
        $this->db->delete('temp', $id_detail);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Berhasil Menghapus Produk Dari Keranjang<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>');
        redirect($_SERVER["HTTP_REFERER"]);
    }
    public function bayar()
    {
        $data = array(
            'kode_penjualan' => $this->input->post('kode_penjualan'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'total_harga' => $this->input->post('total_harga'),
            'tanggal' => date('Y-m-d')
        );
        $this->db->insert('penjualan', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Penjualan Berhasil<button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
        redirect('penjualan/invoice/' . $this->input->post('kode_penjualan'));
    }
    public function bayarv2()
    {
        //nota
        date_default_timezone_set("Asia/Jakarta");
        $tgl    = date('Y-m');
        $this->db->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =",  $tgl);
        $jumlah = $this->db->count_all_results();
        $nota   = date('ymd') . $jumlah + 1;

        $this->db->from('temp a')->join('produk b', 'a.id_produk=b.id_produk', 'left')
            ->where('a.id_user', $this->session->userdata('id_user'))->where('a.id_pelanggan', $this->input->post('id_pelanggan'));
        $temp = $this->db->get()->result_array();
        $total = 0;
        foreach ($temp as $aa) {
            if ( $aa['stok'] <  $aa['jumlah']) {
                //cek stok produk apakah kurang dari jumlah yang di inputkan
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Stok Produk Yang dipilih Tidak Mencukupi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">×</span>
                   </button>
                 </div>');
                 redirect($_SERVER["HTTP_REFERER"]);
            }
            $total = $total + $aa['jumlah'] * $aa['harga'];
            // input tbl penjualan
            $data = array(
                'kode_penjualan' =>  $nota,
                'id_produk' => $aa['id_produk'],
                'jumlah' => $aa['jumlah'],
                'sub_total' => $aa['jumlah'] * $aa['harga'],
            );
            $this->db->insert('detail_penjualan', $data);
            //update stok produk
            $data2 = array('stok'  => $aa['stok'] - $aa['jumlah']);
            $where = array('id_produk' => $aa['id_produk']);
            $this->db->update('produk', $data2, $where);
            //hapus dari temp
            $where2 = array(
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'id_user' =>  $this->session->userdata('id_user')
            );
            $this->db->delete('temp', $where2);
        }

        //input tbl penjualan
        $data = array(
            'kode_penjualan' => $nota,
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'total_harga' => $total,
            'tanggal' => date('Y-m-d')
        );
        $this->db->insert('penjualan', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Penjualan Berhasil<button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
        redirect('penjualan/invoice/' . $nota);
    }
    public function invoice($kode_penjualan)
    {
        $this->db->select('*');
        $this->db->from('penjualan a')->order_by('a.tanggal', 'DESC')->where('a.kode_penjualan', $kode_penjualan);
        $this->db->join('pelanggan b', 'a.id_pelanggan=b.id_pelanggan', 'left');
        $penjualan = $this->db->get()->row();

        $this->db->from('detail_penjualan a')->join('produk b', 'a.id_produk=b.id_produk', 'left')->where('a.kode_penjualan', $kode_penjualan);
        $detail = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => 'Transaksi Penjualan',
            'nota'          => $kode_penjualan,
            'penjualan'        => $penjualan,
            'detail'        => $detail,
        );
        $this->template->load('template', 'invoice', $data);
    }
}
