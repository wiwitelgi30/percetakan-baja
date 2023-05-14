<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content'=>'admin/dashboard'
        ];
        $this->load->view('admin/layouts/app', $data);
    }
}