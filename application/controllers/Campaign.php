<?php
	class Campaign extends CI_Controller
	{
		public function add(){
           
			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}
			$data['title'] = 'Add Campaign';

			$this->load->view('templates/header');
			$this->load->view('campaign/add', $data);
			$this->load->view('templates/footer');
		}

	}