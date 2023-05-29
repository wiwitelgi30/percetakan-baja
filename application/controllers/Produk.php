<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content'=>'pelanggan/produk',
            'kategori_produk' => $this->db->select('*')
                    ->get('kategori_produk')->result(),
            'produk' => $this->db->select('*')
                    ->from('produk as p')
                    ->join('kategori_produk as kp', 'kp.id_kategori_produk = p.id_kategori_produk')
                    ->like('nama_produk', $this->input->get('search'), 'both')
                    ->like('nama_kategori_produk', $this->input->get('kategori'), 'both')
                    ->get()->result(),
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }

    public function detail($slug)
    {
        $data = [
            'content'=>'pelanggan/detail-produk',
            'produk' => $this->db->select('*')
                    ->from('produk as p')
                    ->join('kategori_produk as kp', 'kp.id_kategori_produk = p.id_kategori_produk')
                    ->like('nama_produk', $this->input->get('search'), 'left')
                    ->like('nama_kategori_produk', $this->input->get('kategori'), 'left')
                    ->where('slug', $slug)
                    ->get()->row(),
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }
}