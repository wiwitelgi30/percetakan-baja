<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content'=>'pelanggan/contact'
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }
}