<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
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
        $data['title'] = 'Payment Method';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('method', 'Method', 'required');
        $this->form_validation->set_rules('norek', 'Norek', 'required');

        if ($this->form_validation->run() == false) {
            $data['payment'] = $this->db->get('payment_method')->result();
            $data['category'] = $this->db->get('category_payment_method')->result_array();
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
                    'norek' => $this->input->post('norek', TRUE),
                    'id_category' => $this->input->post('category', TRUE),
                    'id_class' => $this->input->post('idc', TRUE)
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
    public function update($id)
    {
        $this->form_validation->set_rules('method', 'Method', 'required|trim');
        $this->form_validation->set_rules('norek', 'Norek', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'Gagal Update');
            redirect('payment');
        } else {
            $method = $this->input->post('method');
            $norek = $this->input->post('norek');

            // Cek ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/image/payment/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2000';
                $config['max_width'] = '2000';
                $config['max_height'] = '1000';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $this->input->post('old');
                    unlink(FCPATH . 'assets/image/payment/' . $old_image);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('icon', $new_image);
                } else {
                    echo  $this->upload->display_errors();
                }
            }

            $this->db->set('method', $method);
            $this->db->set('norek', $norek);
            $this->db->set('id_class', $this->input->post('idc'));
            $this->db->set('id_category', $this->input->post('category'));
            $this->db->where('id', $id);
            $this->db->update('payment_method');
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('payment');
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
    public function delete_category($id)
    {
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        $this->db->delete('category_payment_method');
        $this->session->set_flashdata('flash', 'Di Hapus');
        redirect('payment/category');
    }
    public function delete($id)
    {
        $where = array(
            'id' => $id
        );
        $getdata = $this->db->get_where('payment_method', ['id' => $id])->row_array();
        $delima = unlink(FCPATH . 'assets/image/payment/' . $getdata['icon']);
        if ($delima) {
            $this->db->where($where);
            $this->db->delete('payment_method');
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('payment');
        } else {
            $this->session->set_flashdata('flash', 'Gagal Hapus');
            redirect('payment');
        }
    }
}