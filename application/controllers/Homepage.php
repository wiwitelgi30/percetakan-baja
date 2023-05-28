<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content'=>'pelanggan/homepage',
            'kategori_produk' => $this->db->select('*')->get('kategori_produk')->result(),
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }
}