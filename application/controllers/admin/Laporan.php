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

    public function index()
    {
        $pesanan = $this->db->from('pesanan')
                ->where('status_pesanan',  'Selesai')
                ->order_by('id_pesanan', 'DESC')
                ->get()->result();

        foreach ($pesanan as $row) {
            $row->detail = $this->db->from('detail_pesanan')
                    ->join('produk', 'produk.id_produk=detail_pesanan.id_produk', 'left')
                    ->where('id_pesanan', $row->id_pesanan)
                    ->get()->result();
        }

        $data = [
            'content' => 'admin/laporan',
            'pesanan' => $pesanan,
        ];
        $this->load->view('admin/layouts/app', $data);
    }

    public function detail($id_pesanan)
    {
        $pesanan = $this->db->from('pesanan')
                ->join('users', 'users.id_user=pesanan.id_user', 'left')
                ->where('id_pesanan', $id_pesanan)
                ->order_by('id_pesanan', 'DESC')
                ->get()->row();

        $pesanan->detail = $this->db->from('detail_pesanan')
                ->join('produk', 'produk.id_produk=detail_pesanan.id_produk', 'left')
                ->where('id_pesanan', $pesanan->id_pesanan)
                ->get()->result();

        $data = [
            'content'=>'admin/detail-laporan',
            'pesanan' => $pesanan,
        ];
        $this->load->view('admin/layouts/app', $data);
    }
}