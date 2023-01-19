<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // if (!$this->session->userdata('email')) {
        //     redirect('auth');
        // }
    }
    public function index()
    {
        $data['title'] = 'Data Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($this->session->userdata('role_id') == '7') {
            $data['transaksi'] = $this->M_room->transaksiPart();
        } else {
            $data['transaksi'] = $this->M_room->transaksi();
        }
        $this->load->view('template/header', $data);
        $this->load->view('transaksi/transaksi', $data);
        $this->load->view('template/footer');
    }
    public function pesanan()
    {
        $data['title'] = 'Data Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->M_room->pesanan();
        $this->load->view('template/header', $data);
        $this->load->view('transaksi/pesanan', $data);
        $this->load->view('template/footer');
    }
    public function failed_order()
    {
        $data['title'] = 'Data Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['failed'] = $this->M_room->failed();
        $this->load->view('template/header', $data);
        $this->load->view('transaksi/failed', $data);
        $this->load->view('template/footer');
    }
    public function confirm($id)
    {
        $query = $this->db->get_where('pesanan', ['id' => $id])->row_array();
        $data = [
            'user_id' => $query['user_id'],
            'hotel_id' => $query['hotel_id'],
            'room_id' => $query['room_id'],
            'check_in' => $query['check_in'],
            'check_out' => $query['check_out'],
            'payment_method' => $query['payment_method'],
            'total' => $query['total'],
            'kode' => $query['kode'],
            'status' => 'Selesai',
            'created' => time()
        ];
        $insert =  $this->db->insert('transaksi', $data);
        if ($insert) {
            $where = array(
                'id' => $id
            );
            $this->db->where($where);
            $this->db->delete('pesanan');
            $this->session->set_flashdata('flash', 'Di Konfirmasi');
            redirect('transaksi/pesanan');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Konfirmasi');
            redirect('transaksi/pesanan');
        }
    }
    public function delete_order($id)
    {
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        $this->db->delete('pesanan');
        $this->session->set_flashdata('flash', 'Di Hapus');
        redirect('transaksi/pesanan');
    }
    public function delete_failed($id)
    {
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        $this->db->delete('pesanan');
        $this->session->set_flashdata('flash', 'Di Hapus');
        redirect('transaksi/failed_order');
    }
    public function delete($id)
    {
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        $this->db->delete('transaksi');
        $this->session->set_flashdata('flash', 'Di Hapus');
        redirect('transaksi/');
    }
    public function cobain()
    {
        $this->session->set_flashdata('flash', 'Di Konfirmasi');
        redirect('transaksi/pesanan');
    }
}