<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index(){
        $data['title'] = 'Hotel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == false) {
            $data['hotel'] = $this->M_hotel->getHotel();
            $this->load->view('template/header', $data);
            $this->load->view('hotel/index', $data);
            $this->load->view('template/footer');
        } else {
        //     $this->db->insert('room_type', ['name' => $this->input->post('name')]);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //     New room type added!
        //   </div>');
        //     redirect('type');
        }
    }
    public function update($id){
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Update Failed!
          </div>');
            redirect('type');
        } else {
            $name = $this->input->post('name');
            $this->db->set('name', $name);
            $this->db->where('id', $id);
            $this->db->update('room_type');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Success
          </div>');
            redirect('type');
        }
    }
    public function delete($id)
    {
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        $this->db->delete('room_type');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Room type has been deleted!
                 </div>');
        redirect('type');
    }
}