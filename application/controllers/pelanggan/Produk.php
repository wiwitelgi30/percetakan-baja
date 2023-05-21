<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content'=>'pelanggan/produk',
            'produk' => $this->db->select('*')
                    ->from('produk as p')
                    ->join('kategori_produk as kp', 'kp.id_kategori_produk = p.id_kategori_produk')
                    ->get()->result(),
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }
}