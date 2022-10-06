<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
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
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        if ($this->form_validation->run() == false) {
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->load->view('template/header', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu'), 'icon' => $this->input->post('icon')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New menu added!
          </div>');
            redirect('menu');
        }
    }
    public function delete($id)
    {
        $where = array(
            'id' => $id
        );
        $this->M_menu->delete($where, 'user_menu');
        redirect('menu');
    }
    public function delete_sub($id)
    {
        $where = array(
            'id' => $id
        );
        $this->M_menu->delete($where, 'user_sub_menu');
        redirect('menu/submenu');
    }
    public function edit($id)
    {
        $data['title'] = 'Change Data Menu';
        $data['menu'] = $this->M_menu->get_data_menu_where($id);
        $this->load->view('template/header', $data);
        $this->load->view('menu/edit_menu', $data);
        $this->load->view('template/footer');
    }
    public function update_menu($id)
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        if ($this->form_validation->run() == false) {
        } else {
            $data = array(
                'menu' => $this->input->post('menu'),
                'icon' => $this->input->post('icon')
            );
            $where = array(
                'id' => $id
            );
            $this->M_menu->update($where, 'user_menu', $data);
            $this->session->set_flashdata('message_update', '<div class="alert alert-success" role="alert">
            Update Success
          </div>');
            redirect('menu');
        }
    }
    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        if ($this->form_validation->run() == false) {
            $data['subMenu'] = $this->M_menu->getSubMenu();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->load->view('template/header', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New sub menu added!
          </div>');
            redirect('menu/submenu');
        }
    }
    public function edit_submenu($id)
    {
        $data['title'] = 'Change Data Sub Menu';
        $data['menuW'] = $this->M_menu->get_data_menu_where($id);
        $data['subMenu'] = $this->M_menu->getSubMenuWhere($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('menu/edit_submenu', $data);
        $this->load->view('template/footer');
    }
    public function update_submenu($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        if ($this->form_validation->run() == false) {
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active')
            );
            $where = array(
                'id' => $id
            );
            $this->M_menu->update($where, 'user_sub_menu', $data);
            $this->session->set_flashdata('message_update', '<div class="alert alert-success" role="alert">
            Update Success
          </div>');
            redirect('menu/submenu');
        }
    }
    public function access()
    {
        $data['title'] = 'Access Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $data['access'] = $this->M_menu->get_data_access();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $data['role'] = $this->db->get('user_role')->result_array();
            $this->load->view('template/header', $data);
            $this->load->view('menu/access', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_access_menu', ['role_id' => $this->input->post('role_id'), 'menu_id' => $this->input->post('menu_id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Access menu added!
          </div>');
            redirect('menu/access');
        }
    }
    public function delete_access($id)
    {
        $where = array(
            'id' => $id
        );
        $this->M_menu->delete($where, 'user_access_menu');
        // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        //     Access menu deleted!
        //   </div>');
        redirect('menu/access');
    }
    public function edit_access($id)
    {
        $data['title'] = 'Change Data Access Menu';
        $data['access'] = $this->M_menu->getAccMenuWhere($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('menu/edit_access', $data);
        $this->load->view('template/footer');
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $data['role'] = $this->db->get('user_role')->result_array();
            $this->load->view('template/header', $data);
            $this->load->view('menu/role', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New role added!
          </div>');
            redirect('menu/role');
        }
    }
    public function delete_role($id)
    {
        $where = array(
            'id' => $id
        );
        $this->M_menu->delete($where, 'user_role');
        redirect('menu/role');
    }
    public function edit_role($id)
    {
        $data['title'] = 'Edit Role';
        $data['role'] = $this->M_menu->get_data_role_where($id);
        $this->load->view('template/header', $data);
        $this->load->view('menu/edit_role', $data);
        $this->load->view('template/footer');
    }
    public function update_role($id)
    {
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
        } else {
            $data = array(
                'role' => $this->input->post('role')
            );
            $where = array(
                'id' => $id
            );
            $this->M_menu->update($where, 'user_role', $data);
            $this->session->set_flashdata('message_update', '<div class="alert alert-success" role="alert">
            Update Success
          </div>');
            redirect('menu/role');
        }
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $this->db->where('id !=', 6);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('menu/role-access', $data);
        $this->load->view('template/footer');
    }
    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Access Changed!
          </div>');
    }
}
