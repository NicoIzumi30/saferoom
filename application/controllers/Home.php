<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {

        $data['city'] = $this->db->get('city')->result();
        $this->load->view('home/index', $data);
    }

    public function filter()
    {
        $id = $this->input->get('kota');
        $room = $this->M_room->room($id);
        $countWisata = count($room);
        $output = "";
        if ($id) {
            foreach ($room as $kamar) {
                $img = explode(',', $kamar->image);
                $add = explode(' ', $kamar->address);
                $output .=  '<div class="swiper-slide">
                <a href="' . base_url('home/halaman3/') . $kamar->id . '">
                <div class="card col-md-12 mt-3">
                <img src=" ' . base_url('assets/image/room/') . $img[0] . '" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">' . $add[0] . $add[1] . $add[2] . $add[3] . '</p>
                    <p class="card-text"><i class="fa-solid fa-location-dot"></i>
                            ' . $kamar->city . '</p>
                    <p class="card-text text-danger">Rp
                    ' . number_format($kamar->price) . '</p>
                    </div>
                    </div>
                </a>
                    </div>';
            }
            if ($countWisata == 0) {
                $output .= '<div class="col-lg-12 text-black p-3 mx-5 text-center">
                <h4>Tidak ada data</h4>
                        </div>';
            }
        }

        // $dataaa =   $this->response = $output;
        // var_dump($output);
        $this->output->set_output($output);
    }


    public function coba($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $data['cobaan'] =  $this->db->get_where('coba', ['id' => $id])->row_array();
        $now = date("H:i:sa");
        $after = $data['cobaan']['expired'];
        // var_dump($now);
        // var_dump($after);
        if ($now >= $after) {
            $this->db->set('status', 'Sudah mati');
            $this->db->where('id', $id);
            $this->db->update('coba');
            $this->load->view('home/coba', $data);
        } else {
            $this->load->view('home/coba', $data);
        }
    }
    public function coba21()
    {
        $data['fasilitas'] = $this->db->get('coba')->result_array();
        $this->load->view('home/coba21', $data);
    }
    public function coba_insert()
    {
        date_default_timezone_set("Asia/Jakarta");
        $now = date("H:i:sa");
        $after = date('H:i:sa', time() + 60 * 1);
        $data = [
            'expired' => $after,
            'status' => ' Masih Aktif'
        ];

        $this->db->insert('coba', $data);
        // var_dump();

        // $tgl_sekarang = date('Y-m-d');
        // $tgl_expired = '2015-10-28'; //tanggal expired
        // if ($tgl_sekarang <= $tgl_expired) {
        //     echo '<center><h1>data Sudah expired</h1></center>';
        // } else {

        //     echo '<center><h1>data Sudah expired</h1></center>';
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
    public function pemesanan()
    {
        if ($this->session->userdata('full_name')) {
            if ($this->uri->segment(3) === NULL) {
                redirect('home');
            } else {
                $id = $this->uri->segment(3);
                $data['room'] = $this->M_room->getRoomWH($id);
                $this->load->view('home/pemesanan', $data);
            }
        } else {
            redirect('home/login');
        }
    }
    public function pesanansaya()
    {

        if ($this->session->userdata('full_name')) {
            $data['pesanan'] = $this->db->get_where('pesanan', ['user_id' => $this->session->userdata('id')])->result();
            $this->load->view('home/pesanan', $data);
        } else {
            redirect('home/login');
        }
    }
    public function update_qty($id)
    {
        $query = $this->db->get_where('barang', ['id' => $id])->row_array();
        $count = $query['total_qty'];
        $qty =  $this->input->post('qty');
        $order_id =  $this->input->post('order_id');
        $new_count = $count - $qty;
        $this->db->set('total_qty', $new_count);
        $this->db->where('id', $id);
        $this->db->update('barang');
        redirect('user/struk_order/' .
        
         $order_id);
    }

    public function _booking()
    {
        function generateRandomString($length = 10)
        {
            return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
        }
        $token = generateRandomString(6);
        $data_ = [
            'user_id' => $this->session->userdata('id'),
            'room_id' => $this->input->post('id'),
            'hotel_id' => $this->input->post('hotel'),
            'check_in' => $this->input->post('checkin'),
            'check_out' => $this->input->post('checkout'),
            'payment_method' => $this->input->post('payment'),
            'total' => $this->input->post('total'),
            'expired' => $this->input->post('expired'),
            'kode' => $token,
            'status' => 'Menunggu'
        ];
        // var_dump($data_);
        $query = $this->db->insert('pesanan', $data_);
        if ($query) {
            redirect('home/booking/' . $token);
        }
    }
    public function booking()
    {
        if ($this->session->userdata('full_name')) {
            $this->form_validation->set_rules('id', 'ID', 'required|trim');
            $this->form_validation->set_rules('hotel', 'Hotel', 'required|trim');
            $this->form_validation->set_rules('payment', 'Payment', 'required|trim');
            if ($this->form_validation->run() == false) {
                // redirect('home');
                // $this->load->view('home/booking');
                if ($this->uri->segment(3) === NULL) {
                    redirect('home');
                } else {
                    $token =  $this->uri->segment(3);
                    $data['trx'] = $this->db->get_where('pesanan', ['kode' => $token])->row_array();
                    $room_id = $data['trx']['room_id'];
                    $pay_id = $data['trx']['payment_method'];
                    $data['room'] = $this->db->get_where('room', ['id' => $room_id])->row_array();
                    $data['pay'] = $this->db->get_where('payment_method', ['id' => $pay_id])->row_array();
                    $this->load->view('home/booking', $data);
                }
            } else {
                $this->_booking();
            }
        } else {
            redirect('home/login');
        }
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
            $data['room'] = $this->M_room->getRoomWHO($id);
            $this->load->view('home/hal3', $data);
        }
    }
    public function payment()
    {
        if ($this->session->userdata('full_name')) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('room', 'Room', 'required|trim');
            if ($this->form_validation->run() == false) {
                redirect('home');
            } else {
                $data_ = [
                    'id' => $this->input->post('id'),
                    'email' => $this->input->post('email'),
                    'name' => $this->input->post('name'),
                    'room' => $this->input->post('room'),
                    'address' => $this->input->post('address'),
                    'type' => $this->input->post('type'),
                    'harga' => $this->input->post('harga'),
                    'layanan' => $this->input->post('layanan'),
                    'hotel' => $this->input->post('hotel'),
                    'total' => $this->input->post('total'),
                ];
                $data['category'] = $this->db->get('category_payment_method')->result();
                $data['post'] = $data_;
                $this->load->view('home/payment', $data);
            }
        } else {
            redirect('home/login');
        }
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
            $this->load->view('home/register');
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
                        'id' => $user['id'],
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
    public function update_status($kode)
    {
        if ($this->session->userdata('full_name')) {
            $this->db->set('status', 'Expired');
            $this->db->where('kode', $kode);
            $this->db->update('pesanan');
            redirect('home/booking/' . $kode);
        } else {
            redirect('home/login');
        }
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