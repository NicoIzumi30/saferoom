<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Payment Method';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('method', 'Method', 'required');
        $this->form_validation->set_rules('norek', 'Norek', 'required');

        if ($this->form_validation->run() == false) {
            $data['payment'] = $this->db->get('payment_method')->result();
            $this->load->view('template/header', $data);
            $this->load->view('payment/index', $data);
            $this->load->view('template/footer');
        } else {

            $config['upload_path']          = './assets/image/payment/';
            $config['allowed_types']        = 'gif|jpg|png|webp|jpeg';
            $config['max_size']             = 3000;
            $config['max_width']            = 4800;
            $config['max_height']           = 2400;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                echo "Gagal Menambahkan Metode Pembayaran";
            } else {
                $image = $this->upload->data();
                $image = $image['file_name'];

                $dataa = array(
                    'method' => $this->input->post('method', TRUE),
                    'icon' => $image,
                    'norek' => $this->input->post('norek', TRUE)
                );
                $acc = $this->db->insert('payment_method', $dataa);
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('payment');
            }
        }
    }

    public function category()
    {
        $data['title'] = 'Payment Method';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == false) {
            $data['category'] = $this->db->get('category_payment_method')->result_array();
            $this->load->view('template/header', $data);
            $this->load->view('payment/category', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('category_payment_method', ['name' => $this->input->post('name')]);
            $this->session->set_flashdata('flash', 'Di Tambahkan');

            redirect('payment/category');
        }
    }

    public function update_category($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == false) {
        } else {
            $data = array(
                'name' => $this->input->post('name')
            );
            $where = array(
                'id' => $id
            );
            $this->M_menu->update($where, 'category_payment_method', $data);
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('payment/category');
        }
    }
}
