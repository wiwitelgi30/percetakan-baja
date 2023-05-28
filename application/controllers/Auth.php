<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
    }

    public function daftar()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('homepage');
        }
        
        else {
            $data = [
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'alamat' => $this->input->post('alamat'),
                'id_role' => 1,
            ];

            $userExists = $this->db
                    ->where('email', $this->input->post('email'))
                    ->where('no_hp', $this->input->post('no_hp'))
                    ->get('users')->row();
            
            if ($userExists) {
                $this->session->set_flashdata('error.daftar', 'Gagal mendaftar akun, email atau No. HP sudah terdaftar.');
                redirect('homepage');
            }

            if ($this->db->insert('users', $data)) {
                $this->session->set_flashdata('success.daftar', 'Kamu berhasil mendaftar sebagai pelanggan, silahkan login melalui akun anda.');
                redirect('homepage');
            }

            redirect('homepage');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Email/No. HP', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('homepage');
        }
        
        else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            ];

            $user = $this->db
                    ->join('roles', 'roles.id_role = users.id_role')
                    ->where('email', $data['username'])
                    ->or_where('no_hp', $data['username'])
                    ->get('users')->row();

            if (password_verify($data['password'], $user->password)) {
                $this->setSessionUser($user);
            }

            $this->session->set_flashdata('error.login', 'Username atau password tidak sesuai.');
            redirect('homepage');
        }
    }

    public function setSessionUser($data)
    {
        $sessData = [
            'id_user'   => $data->id_user,
            'email'     => $data->email,
            'role'      => $data->nama_role,
            'logged_in' => TRUE,
        ];

        $this->session->set_userdata($sessData);

        if ($data->nama_role == 'admin') {
            redirect('admin/dashboard');
        } else {
            redirect('homepage');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('homepage');
    }
}