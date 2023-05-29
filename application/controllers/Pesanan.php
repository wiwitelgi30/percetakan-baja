<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
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
        $pesanan = $this->db->where('id_user', $this->session->userdata('id_user'))
                ->order_by('id_pesanan', 'DESC')
                ->get('pesanan')->result();

        foreach ($pesanan as $row) {
            $row->detail = $this->db->from('detail_pesanan')
                ->join('produk', 'produk.id_produk=detail_pesanan.id_produk', 'left')
                ->where('id_pesanan', $row->id_pesanan)
                ->get()->result();
        }

        $data = [
            'content'=>'pelanggan/pesanan',
            'pesanan' => $pesanan,
        ];
        $this->load->view('pelanggan/layouts/app', $data);
    }

    public function detail()
    {

    }

    public function bayar_pesanan()
    {
        $data = [
            'id_pesanan' => $this->input->post('id_pesanan'),
        ];

        $config['upload_path']          = './assets/uploads';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = '2048';

        $this->load->library('upload', $config);
        $this->upload->do_upload('bukti_bayar');

        $upload = $this->upload->data();

        $this->db->set([
            'bukti_bayar' => $upload['file_name'],
            'status_pesanan' => 'Dalam Proses',
        ]);
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('pesanan');

        redirect($_SERVER['HTTP_REFERER']);
    }
}