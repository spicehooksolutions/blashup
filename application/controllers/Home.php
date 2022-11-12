<?php
	class Home extends CI_Controller
	{
		public function index(){
			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}
			$data['title'] = 'Dashboard';
			$data['campaigns'] = $this->Campaign_Model->getcampiagns();

			$this->load->view('templates/header');
			$this->load->view('home/index', $data);
			$this->load->view('templates/footer');
		}

	}