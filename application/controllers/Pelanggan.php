
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
  }
  public function index()
  {
    $this->db->from('pelanggan')->order_by('nama', 'ASC');
    $pelanggan = $this->db->get()->result_array();
    $data = array(
      'judul_halaman' => 'Daftar Pelanggan',
      'pelanggan' => $pelanggan
    );
    $this->template->load('template', 'pelanggan', $data);
  }
  public function simpan()
  {
    $this->db->from('pelanggan')->where('nama', $this->input->post('nama'));
    $cek = $this->db->get()->result_array();
    if ($cek <> NULL) {
      $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
               Pelanggan sudah tersedia <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>');
      redirect('pelanggan');
    }
    $this->User_model->simpanmem();
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           Data Pelanggan berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>');
    redirect('pelanggan');
  }
  public function hapus($id)
  {
    $id = array(
      'id_pelanggan' => $id
    );
    $this->db->delete('pelanggan', $id);
    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Berhasil Menghapus Data Pelanggan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>');
    redirect('pelanggan');
  }
  public function edit()
  {
    $this->User_model->editmem();
    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Berhasil update Data Pelanggan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
    redirect('pelanggan');
  }
}
