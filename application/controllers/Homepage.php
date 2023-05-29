<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content'=>'pelanggan/homepage',
            'produk' => $this->db->order_by('id_produk', 'DESC')->limit(3)->get('produk')->result(),
            'kategori_produk' => $this->db->select('*')->limit(3)->get('kategori_produk')->result(),
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }
}