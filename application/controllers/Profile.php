<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content'=>'pelanggan/profile',
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }

    public function ubah_profile()
    {}

    public function ubah_password()
    {}
}