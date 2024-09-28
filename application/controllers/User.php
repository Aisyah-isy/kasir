<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
  }
  public function index()
  {
    $this->db->from('user')->order_by('nama', 'ASC');
    $user = $this->db->get()->result_array();
		
    $data = array(
      'judul_halaman' => 'Daftar Pengguna',
      'user' => $user
    );
    $this->template->load('template', 'user', $data);
  }
  public function simpan()
  {
    $this->db->from('user')->where('username', $this->input->post('username'));
    $cek = $this->db->get()->row();
    if ($cek <> NULL) {
      $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
             Username sudah tersedia <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>');
      redirect('user');
    }
    $this->User_model->simpan();
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
         Data berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>');
    redirect('user');
  }
  public function hapus($id)
  {
    $id = array(
      'id_user' => $id
    );
    $this->db->delete('user', $id);
    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Berhasil Menghapus Data <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
    redirect('user');
  }
  public function edit()
  {
    $this->User_model->edit();
    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Berhasil update Data User<button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
    redirect('user');
  }
	public function reset($id_user)
  {
    $this->User_model->reset($id_user);
    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Password Diubah Menjadi 1234 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
    redirect('user');
  }
}
