<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != 'admin') {
            header("HTTP/1.1 401 Unauthorized");
            exit;
        }
    }

    public function index()
    {
        $data = [
            'content'=>'admin/profile',
        ];
    $this->load->view('admin/layouts/app', $data);
    }

    public function ubah_profile()
    {}

    public function ubah_password()
    {}
}
?>