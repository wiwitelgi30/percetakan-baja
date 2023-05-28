<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if (! $this->session->userdata('logged_in')) {
            header("HTTP/1.1 401 Unauthorized");
            exit;
        }
    }
    
    public function index()
    {
        $data = [
            'content'=>'pelanggan/keranjang',
            'keranjang' => $this->db->select('*')
                    ->from('keranjang')
                    ->join('produk', 'produk.id_produk=keranjang.id_produk', 'left')
                    ->get()->result(),
        ];

        $this->load->view('pelanggan/layouts/app', $data);
    }

    public function tambah_keranjang()
    {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'id_produk' => $this->input->post('id_produk'),
            'jumlah_produk' => $this->input->post('jumlah_produk'),
        ];

        $produk_exist = $this->db->get_where('keranjang', [
            'id_user' => $data['id_user'],
            'id_produk' => $data['id_produk'],
        ])->row();

        if ($produk_exist) {
            $jumlah_baru_produk = $produk_exist->jumlah_produk + $data['jumlah_produk'];

            $this->db->set(['jumlah_produk' => $jumlah_baru_produk]);
            $this->db->where('id_keranjang', $produk_exist->id_keranjang);
            $this->db->update('keranjang');
        }
        
        else {
            $this->db->insert('kategori', $data);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function ubah_keranjang()
    {
        $data = [
            'id_keranjang' => $this->input->post('id_keranjang'),
            'jumlah_produk' => $this->input->post('jumlah_produk'),
        ];

        $this->db->where('id_keranjang', $data['id_keranjang'])->update('keranjang', [
            'jumlah_produk' => $data['jumlah_produk'],
        ]);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapus_produk($id_keranjang)
    {
        $this->db->where('id_keranjang', $id_keranjang);
        $this->db->delete('keranjang');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function kosongkan_keranjang()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_produk' => $this->input->post('id_produk'),
        ];

        $this->db->where('id_user', $data['id_user']);
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('kategori');

        redirect($_SERVER['HTTP_REFERER']);
    }
}