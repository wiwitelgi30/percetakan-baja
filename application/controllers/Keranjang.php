<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content'=>'pelanggan/keranjang',
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }
}