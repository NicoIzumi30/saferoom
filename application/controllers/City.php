<?php
defined('BASEPATH') or exit('No direct script access allowed');

class City extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index(){
        $data['title'] = 'List City';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'City', 'required');

        if ($this->form_validation->run() == false) {
            $data['city'] = $this->db->get('city')->result();
            $this->load->view('template/header', $data);
            $this->load->view('city/index', $data);
            $this->load->view('template/footer');
        } else {

            $config['upload_path']          = './assets/image/city/';
            $config['allowed_types']        = 'gif|jpg|png|webp|jpeg';
            $config['max_size']             = 3000;
            $config['max_width']            = 4800;
            $config['max_height']           = 2400;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                echo "Failed Add City";
            } else {
                $image = $this->upload->data();
                $image = $image['file_name'];

                $dataa = array(
                    'city' => $this->input->post('name', TRUE),
                    'image' => $image
                );
                $acc = $this->db->insert('city', $dataa);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                City ​​added!!
                 </div>');
                redirect('city');
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Kota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['city'] = $this->db->get_where('city', ['id' => $id])->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('city/edit', $data);
            $this->load->view('template/footer');
        } else {
            $city = $this->input->post('city');

            // Cek ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/image/city/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2000';
                $config['max_width'] = '2000';
                $config['max_height'] = '1000';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $this->input->post('old');
                    unlink(FCPATH . 'assets/image/city/' . $old_image);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo  $this->upload->display_errors();
                }
            }

            $this->db->set('city', $city);
            $this->db->where('id', $id);
            $this->db->update('city');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			City has been updated!
			 </div>');
            redirect('city');
        }
    }

    public function delete($id)
    {
        $where = array(
            'id' => $id
        );  
        $getdata = $this->db->get_where('city', ['id' => $id])->row_array();
       $delima = unlink(FCPATH . 'assets/image/city/' . $getdata['image']);
        if($delima){
        $this->db->where($where);
        $this->db->delete('city');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        City has been daleted!
                 </div>');
        redirect('city');
    }else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        City failed dalete!
                 </div>');
        redirect('city'); 
    }
    }
}