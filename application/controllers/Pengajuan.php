
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function index()
    {
        $data['city'] = $this->db->get('city')->result();
        $this->load->view('home/registerHotel', $data);
    }
    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('lahir', 'Lahir', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email has already registered!']);
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('hotel', 'Hotel', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('room', 'Room', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('about', 'About', 'required');

        if ($this->form_validation->run() == false) {
            if ($this->input->post('s&k') == 'true') {
                $data['city'] = $this->db->get('city')->result();
                $this->load->view('home/register', $data);
            } else {
                redirect('pengajuan');
            }
        } else {
            $this->_pengajuan();
        }
    }

    public function _pengajuan()
    {
        $data = [
            'nama' => $this->input->post('name'),
            'tanggal_lahir' => $this->input->post('lahir'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp'),
            'gender' => $this->input->post('gender'),
            'hotel' => $this->input->post('hotel'),
            'city' => $this->input->post('city'),
            'room' => $this->input->post('room'),
            'image' => $this->input->post('image'),
            'address' => $this->input->post('address'),
            'about' => $this->input->post('about'),
        ];

        $this->db->insert('pengajuan', $data);
        redirect('registerHotel');
    }
}
