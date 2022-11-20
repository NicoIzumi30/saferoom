<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function user_admin()
    {
        $data['title'] = 'Users Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['usere'] = $this->M_users->getUsers();
        $this->load->view('template/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }
    public function update_user($id)
    {
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Failed update user
              </div>');
            redirect('users/user_admin');
        } else {

            $data = [
                'role_id' => $this->input->post('role'),
                'is_active' => $this->input->post('status'),

            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('user');
            $this->session->set_flashdata('flash', 'Di Update');

            redirect('users/user_admin');
        }
    }
    public function user_client()
    {
        $data['title'] = 'Users Client';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['usere'] = $this->db->get('user_client')->result();
        $this->load->view('template/header', $data);
        $this->load->view('user/client', $data);
        $this->load->view('template/footer');
    }
    public function update_user_client($id)
    {
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Failed update user   
               
               </div>');
            redirect('users/user_client');
        } else {

            $data = [
                'role' => $this->input->post('role'),
                'is_active' => $this->input->post('status'),

            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('user_client');
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('users/user_client');
        }
    }
}
