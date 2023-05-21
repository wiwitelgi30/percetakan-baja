<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function index()
    {
        $data = [
            'content'=>'admin/laporan'
        ];
        $this->load->view('admin/layouts/app', $data);
    }
}