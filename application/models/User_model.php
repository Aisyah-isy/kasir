<?php
class User_model extends CI_Model
{
    public function simpan()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level')
        );
        $this->db->insert('user', $data);
    }
    public function edit()
    {
        $where = array(
            'id_user'   =>  $this->input->post('id_user')
        );
        $data = array(
            'nama'      =>  $this->input->post('nama'),
            'level'      =>  $this->input->post('level')
        );
        $this->db->update('user', $data, $where);
    }
    public function reset($id_user)
    {
        $where = array(
            'id_user'   =>  $id_user
        );
        $data = array(
            'password'      => md5(1234)
        );
        $this->db->update('user', $data, $where);
    }
    public function simpanp()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'kode_produk' => $this->input->post('kode_produk'),
            'stok' => $this->input->post('stok'),
            'harga' => $this->input->post('harga'),
            'id_kategori' => $this->input->post('id_kategori'),
        );
        $this->db->insert('produk', $data);
    }
    public function editp()
    {
        $where = array(
            'id_produk'   =>  $this->input->post('id_produk')
        );
        $data = array(
            'nama'      =>  $this->input->post('nama'),
            'stok'      =>  $this->input->post('stok'),
            'harga'      =>  $this->input->post('harga'),
            'kode_produk'      =>  $this->input->post('kode_produk'),
            'id_kategori'   =>  $this->input->post('id_kategori')
        );
        $this->db->update('produk', $data, $where);
    }
    public function simpanmem()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp')
        );
        $this->db->insert('pelanggan', $data);
    }
    public function editmem()
    {
        $where = array(
            'id_pelanggan'   =>  $this->input->post('id_pelanggan')
        );
        $data = array(
            'nama'      =>  $this->input->post('nama'),
            'alamat'      =>  $this->input->post('alamat'),
            'telp'      =>  $this->input->post('telp'),

        );
        $this->db->update('pelanggan', $data, $where);
    }
    public function produk()
    {
        $this->db->from('produk a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->order_by('nama', 'ASC');
        $produk = $this->db->get()->result_array();
        return $produk;
    }
    public function kategori1()
    {
        $this->db->from('kategori');
        $this->db->order_by('nama_k', 'ASC');
        $kategori1 = $this->db->get()->result_array();
        return $kategori1;
    }
    // public function carip($kataKunci)
    // {
    //     $this->db->from('produk')->like('nama', $kataKunci, 'after');
    //     $query = $this->db->get()->result_array();
    //     return $query;
    // }
}
