<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
  }
  public function index()
  {
    $data = array(
      'judul_halaman' => 'Daftar Produk',
      'produk' => $this->User_model->produk(),
      'kategori1' =>$this->User_model->kategori1(),
      // 'hasil' => $this->User_model->carip($this->input->post('cari')),
    );
    $this->template->load('template', 'produk', $data);
  }
  public function simpan()
  {
    $this->db->from('produk');
    $this->db->where('kode_produk', $this->input->post('kode_produk'));
    $cek = $this->db->get()->result_array();
    if ($cek <> NULL) {
      $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
             Kode Produk sudah tersedia <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>');
      redirect('produk');
    }
    $this->User_model->simpanp();
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
         Data Produk berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>');
    redirect('produk');
  }
  public function edit()
  {
    $this->User_model->editp();
    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Berhasil update Data produk<button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
    redirect('produk');
  }
  public function hapus($id)
  {
    $id = array(
      'id_produk' => $id
    );
    $this->db->delete('produk', $id);
    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Berhasil Menghapus Data Produk <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>');
    redirect('produk');
  }
  // public function cari(){
  //   $data = array(
  //     'hasil' => $this->User_model->carip($this->input->post('cari')),
  //   );
  //   redirect('produk', $data);
  // }
}
