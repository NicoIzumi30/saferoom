
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterHotel extends CI_Controller
{
    public function index()
    {
        $data['city'] = $this->db->get('city')->result();
        $this->load->view('home/registerHotel', $data);
    }
    public function register()
    {
        if ($this->input->post('s&k') == 'true') {
            $data['city'] = $this->db->get('city')->result();
            $this->load->view('home/register', $data);
        } else {
            redirect('registerHotel');
        }
    }
}
