<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
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
        $produk = $this->db->get('produk')->result();
        $kategori = $this->db->get('kategori_produk')->result();
        $terjual = $this->db->select('COUNT(id_detail_pesanan) as terjual')
                ->join('pesanan', 'pesanan.id_pesanan=detail_pesanan.id_pesanan', 'left')
                ->where('pesanan.status_pesanan', 'Selesai')
                ->get('detail_pesanan')->row()->terjual;

        $data = [
            'content'=>'admin/dashboard',
            'total_produk' => count($produk),
            'total_kategori_produk' => count($kategori),
            'total_pesanan_selesai' => $terjual,
        ];
        $this->load->view('admin/layouts/app', $data);
    }
}