<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
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
            'content'=>'pelanggan/checkout',
            'keranjang' => $this->db->select('*')
                    ->from('keranjang')
                    ->join('produk', 'produk.id_produk=keranjang.id_produk', 'left')
                    ->get()->result(),
            'total_pesanan' => $this->db->select('SUM(jumlah_produk * produk.harga) as total')
                    ->from('keranjang')
                    ->join('produk', 'produk.id_produk=keranjang.id_produk', 'left')
                    ->get()->row()->total,
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }

    public function buat_pesanan()
    {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
        ];

        $keranjang = $this->db->select('keranjang.id_produk, jumlah_produk, catatan, keranjang.link_design')
                ->from('keranjang')
                ->join('produk', 'produk.id_produk=keranjang.id_produk', 'left')
                ->get()->result();

        if (count($keranjang) > 0) {
            $total_pesanan = $this->db->select('SUM(jumlah_produk * produk.harga) as total_harga')
                ->from('keranjang')
                ->join('produk', 'produk.id_produk=keranjang.id_produk', 'left')
                ->get()->row()->total_harga;

            ## PESANAN
                $getLastPesanan = $this->db->order_by('id_pesanan', 'DESC')->get('pesanan')->row();
                $id_pesanan = 'PS' . date('y') . '001';
                
                if (isset($getLastPesanan)) {
                    $id_pesanan = ++$getLastPesanan->id_pesanan;
                }

                $this->db->insert('pesanan', [
                    'id_pesanan' => $id_pesanan,
                    'id_user' => $data['id_user'],
                    'total_harga' => $total_pesanan,
                ]);
    
            ## DETAIL PESANAN
                foreach ($keranjang as $produk) {
                    $this->db->insert('detail_pesanan', [
                        'id_pesanan' => $id_pesanan,
                        'id_produk' => $produk->id_produk,
                        'jumlah_produk' => $produk->jumlah_produk,
                        'catatan' => $produk->catatan,
                        'link_design' => $produk->link_design
                    ]);
                }

            ## KERANJANG
                $this->db->where('id_user', $data['id_user']);
                $this->db->delete('keranjang');
        }

        redirect('/checkout');
    }
}