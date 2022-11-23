<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['city'] = $this->db->get('city')->result();
        $data['room'] = $this->db->get('room')->result();
        $this->load->view('home/index', $data);
    }
    public function coba()
    {
        $this->load->view('home/coba');
    }
    public function coba21()
    {
        $data['fasilitas'] = $this->db->get('coba')->result_array();
        $this->load->view('home/coba21', $data);
    }
    public function coba_insert()
    {
        $jumlahData = count($_FILES['image']['name']);

        // // Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
        // for ($i = 0; $i < $jumlahData; $i++) :

        //     // Inisialisasi Nama,Tipe,Dll.
        //     $_FILES['file']['name']     = $_FILES['image']['name'][$i];
        //     $_FILES['file']['type']     = $_FILES['image']['type'][$i];
        //     $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
        //     $_FILES['file']['size']     = $_FILES['image']['size'][$i];

        //     // Konfigurasi Upload
        //     $config['upload_path']          = './assets/image/coba/';
        //     $config['overwrite'] = TRUE;
        //     $config['allowed_types']        = 'gif|jpg|png|pdf';

        //     // Memanggil Library Upload dan Setting Konfigurasi
        //     $this->load->library('upload', $config);
        //     $this->upload->initialize($config);

        //     if ($this->upload->do_upload('file')) { // Jika Berhasil Upload

        //         $fileData = $this->upload->data(); // Lakukan Upload Data

        //     }

        // endfor; // Penutup For
        // $fasilitas = implode(',', $this->input->post('fasilitas'));
        // $image = implode(',', $_FILES['image']['name']);
        $form_data = array(
            'full_name' => $this->input->post('full_name'),
            'coment' => $this->input->post('coment'),
            // 'fasilitas' => $fasilitas,
            // 'image' => $image
        );
        $this->db->insert('coba', $form_data);
        // if ($query) {
        //     redirect('home/coba21');
        // } else {
        //     echo 'Gagal cok';
        // }
    }
    public function list()
    {
        if ($this->uri->segment(3) === NULL) {
            $data['room'] = $this->db->get('room')->result();
            $this->load->view('home/list_room', $data);
        } else {
            $id = $this->uri->segment(3);
            $data['room'] = $this->db->get_where('room', ['city_id' => $id])->result();
            $this->load->view('home/list_room', $data);
        }
    }
    public function pemesanan($id)
    {
        $data['room'] = $this->M_room->getRoomWH($id);
        $this->load->view('home/pemesanan', $data);
    }
    public function pesanansaya()
    {
        $this->load->view('home/pesanan');
    }
    public function booking()
    {
        $this->load->view('home/booking');
    }
    public function halaman31()
    {
        $this->load->view('home/halaman3');
    }
    public function halaman3()
    {
        if ($this->uri->segment(3) === NULL) {
            redirect('home/list');
        } else {
            $id = $this->uri->segment(3);
            $data['room'] = $this->db->get_where('room', ['id' => $id])->result();
            $this->load->view('home/hal3', $data);
        }
    }
    public function payment()
    {
        $data_ = [
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'room' => $this->input->post('room'),
            'address' => $this->input->post('address'),
            'type' => $this->input->post('type'),
            'harga' => $this->input->post('harga'),
            'layanan' => $this->input->post('layanan'),
            'total' => $this->input->post('total'),
        ];
        $data['category'] = $this->db->get('category_payment_method')->result();
        $data['post'] = $data_;
        $this->load->view('home/payment', $data);
    }
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user_client.email]',
            ['is_unique' => 'This email has already registered!']
        );
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password dont matches!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('home/registration');
        } else {
            $data = [
                'full_name' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'telp' => $this->input->post('phone', true),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'role' => 'member',
                'date_created' => time()
            ];
            $this->db->insert('user_client', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Congratulation! your account has been created. Please Login
</div>');
            redirect('home/login');
        }
    }

    public function login()
    {
        if ($this->session->userdata('email')) {
            redirect('home');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('home/login');
        } else {
            // Validasinya success
            $this->_login();
        }
    }

    public function profile()
    {
        $this->load->view('home/profile');
    }
    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user_client', ['email' => $email])->row_array();
        // Jika Usernya ada
        if ($user) {
            // Jika usernya aktif
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'full_name' => $user['full_name'],
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    Wrong password!
</div>');
                    redirect('home/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    This email is has not been activated!
</div>');
                redirect('home/login');
            }
        } else {
            // Usernya ga ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    Email is not regitered!
</div>');
            redirect('home/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('full_name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    You have been logged out!
</div>');
        redirect('home/login');
    }

    public function change_password()
    {
        $data['user'] = $this->db->get_where('user_client', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules(
            'new_password1',
            'New Password',
            'required|trim|min_length[6]|matches[new_password2]'
        );
        $this->form_validation->set_rules(
            'new_password2',
            'Confirm New Password',
            'required|trim|min_length[6]|matches[new_password1]'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('home/change_password');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    Wrong current password!
</div>');
                redirect('home/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    New Password cannot be the same as current password!
</div>');
                    redirect('home/change_password');
                } else {
                    // Password suda oke
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('user_client');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Password Change!
</div>');
                    redirect('home/change_password');
                }
            }
        }
    }
}