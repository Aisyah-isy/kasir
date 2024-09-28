<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->db->from('surat_26');
        $surat = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => 'Input Surat Suara',
            'surat' => $surat
        );
        $this->template->load('template', 'surat/dashboard', $data);
    }
    public function input()
    {
        $this->db->from('surat_26');
        $this->db->where('id_tps_26', $this->input->post('id_tps'));
        $cek = $this->db->get()->result_array();
        $total_suara = $this->input->post('total_sah') + $this->input->post('total_tdksah');
        $suara_sah = $this->input->post('total_sah');
        $total_sah = $this->input->post('no1') + $this->input->post('no2') + $this->input->post('no3');
        $data = array(
            'id_tps_26' => $this->input->post('id_tps'),
            'nama_tps_26' => $this->input->post('nama_tps'),
            'total_suara_26' => $this->input->post('total'),
            'total_sah_26' => $this->input->post('total_sah'),
            'total_tdk_sah_26' => $this->input->post('total_tdksah'),
            'no1_26' => $this->input->post('no1'),
            'no2_26' => $this->input->post('no2'),
            'no3_26' => $this->input->post('no3'),
        );
        if ($total_suara <=> $this->input->post('total')) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Jumlah Suara Salah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
            redirect('surat');
        } else if ($suara_sah != $total_sah) {
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Jumlah suara sah salah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
            redirect('surat');
        } else {
            $this->db->insert('surat_26', $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Suara Berhasil Di Iput<button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">×</span>
           </button>
         </div>');
        }


        redirect('surat');
    }
}
