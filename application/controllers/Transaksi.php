<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function pesanan()
    {
        $data['title'] = 'Data Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->M_room->pesanan();
        $this->load->view('template/header', $data);
        $this->load->view('transaksi/pesanan', $data);
        $this->load->view('template/footer');
    }
    public function cobain()
    {
        $this->session->set_flashdata('flash-confirm', 'Di Tambahkan');
        redirect('transaksi/pesanan');
    }
}
