<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Room ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('room_name', 'Room_name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('about', 'About', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {

            $data['city'] = $this->db->get('city')->result_array();
            $data['usere'] = $this->db->get('user')->result_array();
            $data['type'] = $this->db->get('room_type')->result_array();
            $data['hotel'] = $this->db->get('hotel')->result_array();
            if($this->session->userdata('role_id') == '7'){
                $data['room'] = $this->M_room->getRoomW($this->session->userdata('id'));
            }else{
                $data['room'] = $this->M_room->getRoom();
            }
            $this->load->view('template/header', $data);
            $this->load->view('room/index', $data);
            $this->load->view('template/footer');
        } else {
            $jumlahData = count($_FILES['image']['name']);

            // Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
            for ($i = 0; $i < $jumlahData; $i++) :

                // Inisialisasi Nama,Tipe,Dll.
                $_FILES['file']['name']     = $_FILES['image']['name'][$i];
                $_FILES['file']['type']     = $_FILES['image']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                $_FILES['file']['size']     = $_FILES['image']['size'][$i];

                // Konfigurasi Upload
                $config['upload_path']          = './assets/image/room/';
                $config['overwrite'] = TRUE;
                $config['allowed_types']        = 'gif|jpg|png';

                // Memanggil Library Upload dan Setting Konfigurasi
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) { // Jika Berhasil Upload

                    $fileData = $this->upload->data(); // Lakukan Upload Data

                }

            endfor;
            $fasilitas = implode(',', $this->input->post('fasilitas'));
            $image = implode(',', $_FILES['image']['name']);
            $data = [
                'user_id' => $this->input->post('user_id'),
                'hotel_id' => $this->input->post('hotel_id'),
                'type_id' => $this->input->post('type'),
                'room_name' => $this->input->post('room_name'),
                'image' => $image,
                'address' => $this->input->post('address'),
                'facility' => $fasilitas,
                'price' => $this->input->post('price'),
                'about' => $this->input->post('about'),
                'status' => $this->input->post('status')
            ];
            $this->db->insert('room', $data);
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            redirect('room');
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('user', 'User', 'required');
        $this->form_validation->set_rules('pemilik', 'Pemilik', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Update Failed!
          </div>');
            redirect('hotel');
        } else {
            $data = [
                'nama_hotel' => $this->input->post('name'),
                'id_city' => $this->input->post('city'),
                'id_user' => $this->input->post('user'),
                'pemilik' => $this->input->post('pemilik'),
                'kebijakan' => $this->input->post('kebijakan'),
                'status' => $this->input->post('status')

            ];
            $where = array(
                'id' => $id
            );
            $this->M_hotel->update($where, 'hotel', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Success
          </div>');
            redirect('hotel');
        }
    }
    public function delete($id)
    {
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        $this->db->delete('hotel');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Hotel has been deleted!
                 </div>');
        redirect('hotel');
    }
}
