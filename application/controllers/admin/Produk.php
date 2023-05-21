<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content' => 'admin/produk',
            'produk' => $this->db->select('*')
                    ->from('produk as p')
                    ->join('kategori_produk as kp', 'kp.id_kategori_produk = p.id_kategori_produk')
                    ->get()->result(),
        ];

        $this->load->view('admin/layouts/app', $data);
    }

    public function tambah()
    {
        $data = [
            'content' => 'admin/tambah-produk',
            'kategori_produk' => $this->db->select('*')
                    ->get('kategori_produk')->result(),
        ];

        $this->load->view('admin/layouts/app', $data);
    }

    public function tambah_produk()
    {
        $getLastProduk = $this->db->get('produk')->row();
        $id_produk = 'P' . date('y') . '01';
        
        if (isset($getLastProduk)) {
            $id_produk = ++$getLastProduk->id_produk;
        }

        $config['upload_path']          = './assets/uploads';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = '2048';

        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar');

        $upload = $this->upload->data();
        
        $data = [
            'id_produk' => $id_produk,
            'nama_produk' => $this->input->post('nama_produk'),
            'gambar' => $upload['file_name'],
            'id_kategori_produk' => $this->input->post('id_kategori_produk'),
            'stok' => $this->input->post('stok'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        $this->db->insert('produk', $data);

        redirect('admin/produk');
    }

    public function ubah($id_produk)
    {
        $data = [
            'content' => 'admin/ubah-produk',
            'produk' => $this->db->get_where('produk', ['id_produk' => $id_produk])->row(),
            'kategori_produk' => $this->db->get('kategori_produk')->result(),
        ];

        $this->load->view('admin/layouts/app', $data);
    }

    public function ubah_produk($id_produk)
    {
        if ($_FILES['gambar']['name']) {
            $config['upload_path']          = './assets/uploads';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = '2048';
    
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
    
            $upload = $this->upload->data();
        }
        
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'id_kategori_produk' => $this->input->post('id_kategori_produk'),
            'stok' => $this->input->post('stok'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if ($_FILES['gambar']['name']) {
            $data['gambar'] = $upload['file_name'];
        }

        $this->db->set($data);
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk');

        redirect('admin/produk');
    }

    public function hapus_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');

        redirect('admin/produk');
    }
}