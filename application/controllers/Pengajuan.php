
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function index()
    {
        $data['city'] = $this->db->get('city')->result();
        $this->load->view('pengajuan/registerHotel', $data);
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
                $this->load->view('pengajuan/register', $data);
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
        redirect('pengajuan/index');
    }

    public function data()
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        if ($this->session->userdata('role_id') != '1') {
            redirect('dashboard');
        }
        $data['title'] = 'Data Pengajuan Hotel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengajuan'] = $this->db->get('pengajuan')->result();
        $this->load->view('template/header', $data);
        $this->load->view('pengajuan/data', $data);
        $this->load->view('template/footer');
    }

    public function diterima($id)
    {
        function getRandomString($n)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            return $randomString;
        }

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        if ($this->session->userdata('role_id') != '1') {
            redirect('dashboard');
        }
        $query = $this->db->get_where('pengajuan', ['id' => $id])->row_array();
        $name = $query['nama'];
        $email = $query['email'];
        $date_of_birth = $query['tanggal_lahir'];
        $gender = $query['gender'];
        $telp = $query['telp'];
        $image = 'default.jpg';
        $password = getRandomString(10);
        $role_id = '7';
        $is_active = '1';
        $date_created =  time();
        $nama_hotel = $query['hotel'];
        $id_city = $query['city'];
        $address = $query['address'];
        $jumlah_kamar = $query['room'];
        $about = $query['about'];


        $data_user = [
            'name' => $name,
            'email' => $email,
            'image' => $image,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role_id' => $role_id,
            'is_active' => $is_active,
            'date_created' => $date_created
        ];

        $insert1 = $this->db->insert('user', $data_user);
        $insert_id = $this->db->insert_id();

        $data_hotel = [
            'nama_hotel' => $nama_hotel,
            'id_city' => $id_city,
            'id_user' => $insert_id,
            'pemilik' => $name,
            'alamat' => $address,
            'jumlah_kamar' => $jumlah_kamar,
            'about' => $about,
            'status' => '1'
        ];
        $insert2 = $this->db->insert('hotel', $data_hotel);

        if ($insert1 && $insert2) {
            $text = '
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <h4>Yth Bapak/Ibu ' . $name . '</h4>

            <>Pada tanggal ' . $query['created'] . ' sistem kami menerima permintaan pendaftaran untuk properti ' . $nama_hotel . ' .<br>
            Setelah kami melakukan pengecekan mendalam kami memutuskan bahwa properti tersebut benar benar milik anda.<br>
            Selamat bergabung menjadi mitra SafeRoom, silahkan login ke halaman dashboard untuk mengelola properti anda</p>

            <table>
            <tbody>
                <tr>
                <td>Email</td>
                <td> : </td>
                <td>' . $email . '</td>
                </tr>
                <tr>
                <td>Password </td>
                <td> : </td>
                <td>' . $password . '</td>
                </tr>
                <tr>
                <td>Link Dashboard</td>
                <td> : </td>
                <td><a href="https:saferoom/site/auth" target="_blank" style="text-decoration:none">https:saferoom/site/auth</a></td>
                </tr>
            </tbody>
            </table>
            <br><br>
            <p>Bila ada yang ingin ditanyakan silahkan hubungi client support SafeRoom.</p>
            <button style="font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:150px"><i class="fa fa-whatsapp" style="color:green;"></i> 62859126462972 </button>
            <button style="font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:180px"><i class="fa fa-envelope" style="color:#333;"></i> saferoom@gmail.com </button>

            <p>Hormat Kami,</p>
            <p>Administrator SafeRoom</p>
            <a href="https:saferoom/site/auth" target="_blank" style="text-decoration:none">
            https://saferoom.site
            </a>
            ';

            $this->db->insert('tampungan', ['text' => $text]);
            $this->db->where(['id' => $id]);
            $this->db->update('pengajuan', ['status' => 'Diterima']);
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('pengajuan/data');
        }
    }

    public function ditolak($id)
    {

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        if ($this->session->userdata('role_id') != '1') {
            redirect('dashboard');
        }
        $query = $this->db->get_where('pengajuan', ['id' => $id])->row_array();
        $name = $query['nama'];
        $email = $query['email'];
        $nama_hotel = $query['hotel'];
        $waktu =  $query['created'];

        $text = '
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
         <h4>Yth Bapak/Ibu ' . $name . '</h4>
        
                    <p>Pada tanggal ' . $query['created'] . ' sistem kami menerima permintaan pendaftaran untuk properti ' . $nama_hotel . ' . <br>
                  Setelah kami melakukan pengecekan mendalam kami tidak dapat memastikan bahwa properti tersebut milik anda.<br>
                    Silahkan cek ulang data yang anda kirim dan coba mendaftar ulang.</p>
                        
                        <p>Bila ada yang ingin ditanyakan silahkan hubungi client support SafeRoom.</p>
                        <button style="font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:150px"><i class="fa fa-whatsapp" style="color:green;"></i> 62859126462972 </button>
                        <button style="font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:180px"><i class="fa fa-envelope" style="color:#333;"></i> saferoom@gmail.com </button>
                        
                    
                    <p>Hormat Kami,</p>
                    <p>Administrator SafeRoom</p>
                    <a href="https:saferoom/site/auth" target="_blank" style="text-decoration:none">
                    https://saferoom.site
                    </a>
            ';

        $this->db->insert('tampungan', ['text' => $text]);
        $this->db->where(['id' => $id]);
        $this->db->update('pengajuan', ['status' => 'Ditolak']);
        $this->session->set_flashdata('flash', 'Di Update');
        redirect('pengajuan/data');
    }


    public function tampungan()
    {
        $data['title'] = 'Data Tampungan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tampungan'] = $this->db->get('tampungan')->result();
        $this->load->view('template/header', $data);
        $this->load->view('pengajuan/tampungan', $data);
        $this->load->view('template/footer');
    }
}
