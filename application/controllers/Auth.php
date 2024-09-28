<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->userdata('level') <> NULL) {
            redirect('home');
        }
        $data = array(
            'judul' => 'Halaman Login'
        );
        $this->load->view('login', $data);
    }
    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user')->where('username', $username);
        $cek = $this->db->get()->row();
       
        $this->db->where('username', $username);
        $this->db->update('user', array('last_login' => date('Y-m-d H:i:s')));
        
        if ($cek == NULL) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Username Tidak Tersedia <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">×</span>
           </button>
         </div>');
            redirect('auth');
        } else if ($password == $cek->password) {
            $data = array(
                'id_user'   => $cek->id_user,
                'nama'      => $cek->nama,
                'username'  => $cek->username,
                'level'     => $cek->level,
            );
            $this->session->set_userdata($data);
            redirect('home');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Password Salah           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">×</span>
           </button>
         </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }
}
