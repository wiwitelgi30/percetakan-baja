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
            'admin' => $this->db
                    ->where('id_user', $this->session->userdata('id_user'))
                    ->get('users')->row(),
        ];
    $this->load->view('admin/layouts/app', $data);
    }

    public function ubah_profile()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
        ];

        $this->db->set($data);
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('users');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function ubah_password()
    {
        $id_user = $this->input->post('id_user');
        $password_sekarang = $this->input->post('password_sekarang');

        // check user
        $this_user = $this->db->where('id_user', $id_user)->get('users')->row();

        if ($this_user->password == password_verify($password_sekarang)) {
            $data = [
                'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT),
            ];
    
            $this->db->set($data);
            $this->db->where('id_user', $id_user);
            $this->db->update('users');
    
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
?>