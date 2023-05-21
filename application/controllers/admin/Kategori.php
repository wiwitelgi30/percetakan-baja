<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content'=>'admin/kategori',
            'kategori_produk' => $this->db->select('*')
                    ->get('kategori_produk')->result(),
        ];
        $this->load->view('admin/layouts/app', $data);
    }

    public function tambah()
    {
        $data = [
            'content' => 'admin/tambah-kategori',
            'kategori_produk' => $this->db->select('*')
                    ->get('kategori_produk')->result(),
        ];

        $this->load->view('admin/layouts/app', $data);
    }

    public function tambah_kategori()
    {
        
        $data = [
            'nama_kategori_produk' => $this->input->post('nama_kategori_produk'),
        ];

        $this->db->insert('kategori_produk', $data);

        redirect('admin/kategori');
    }

    public function ubah($id_kategori_produk)
    {
        $data = [
            'content' => 'admin/ubah-kategori',
            'kategori_produk' => $this->db->get_where('kategori_produk', ['id_kategori_produk' => $id_kategori_produk])->row(),
        ];

        $this->load->view('admin/layouts/app', $data);
    }

    public function ubah_kategori_produk($id_kategori_produk)
    {
        $data = [
            'nama_kategori_produk' => $this->input->post('nama_kategori_produk'),
        ];

        $this->db->set($data);
        $this->db->where('id_kategori_produk', $id_kategori_produk);
        $this->db->update('kategori_produk');

        redirect('admin/kategori');
    }

    public function hapus_kategori_produk($id_kategori_produk)
    {
        $this->db->where('id_kategori_produk', $id_kategori_produk);
        $this->db->delete('kategori_produk');

        redirect('admin/kategori');
    }
}