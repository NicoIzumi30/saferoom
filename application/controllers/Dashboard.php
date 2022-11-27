<?php
class Dashboard extends CI_Controller
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
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('dashboard/index');
		$this->load->view('template/footer');
	}
}
