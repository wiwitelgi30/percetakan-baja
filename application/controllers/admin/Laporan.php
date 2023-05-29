<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != 'admin') {
            header("HTTP/1.1 401 Unauthorized");
            exit;
        }
    }
    
    public function penjualan()
    {
        $produk = $this->db->select('*')
                ->from('produk as p')
                ->join('kategori_produk as kp', 'kp.id_kategori_produk = p.id_kategori_produk')
                ->get()->result();

        foreach ($produk as $row) {
            $row->terjual = $this->db->select('COUNT(id_detail_pesanan) as terjual')
                    ->join('pesanan', 'pesanan.id_pesanan=detail_pesanan.id_pesanan', 'left')
                    ->where('detail_pesanan.id_produk', $row->id_produk)
                    ->where('pesanan.status_pesanan', 'Selesai')
                    ->get('detail_pesanan')->row()->terjual;
        }

        $data = [
            'content'=>'admin/laporan-penjualan',
            'produk' => $produk,
        ];
        $this->load->view('admin/layouts/app', $data);
    }
}