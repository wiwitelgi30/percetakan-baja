<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function index()
    {
        // CHECK
        $data = [
            'content'=>'pelanggan/homepage'
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }
}