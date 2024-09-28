<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->db->from('kategori')->order_by('nama_k', 'ASC');
    $kate = $this->db->get()->result_array();
		
    $data = array(
      'judul_halaman' => 'Daftar Kategori Produk',
      'kate' => $kate
    );
    $this->template->load('template', 'kategori', $data);
  }

  public function simpan()
  {
    $this->db->from('kategori')->where('nama_k', $this->input->post('nama_k'));
    $cek = $this->db->get()->row();
    if ($cek <> NULL) {
      $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
             Kategori sudah tersedia <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>');
      redirect('kategori');
    }
    $data = array(
        'nama_k' => $this->input->post('nama_k'),
    );
    $this->db->insert('kategori', $data);
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
         Data berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>');
    redirect('kategori');
  }
  public function hapus($id)
  {
    $id = array(
      'id_kategori' => $id
    );
    $this->db->delete('kategori', $id);
    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Berhasil Menghapus Data <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
    redirect('kategori');
  }
  public function edit()
  {
    $where = array(
        'id_kategori'   =>  $this->input->post('id_kategori')
    );
    $data = array(
        'nama_k'      =>  $this->input->post('nama_k'),
    );
    $this->db->update('kategori', $data, $where);
    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Berhasil update Nama Kategori<button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>');
    redirect('kategori');
  }
	
}
