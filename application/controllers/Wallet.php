<?php
	class Wallet extends CI_Controller
	{
		public function transactions(){
			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}
			$data['title'] = 'Wallet transactions';
			$data['wallettransactions'] = $this->Wallet_Model->getTransactions();

			$this->load->view('templates/header');
			$this->load->view('wallet/transactions', $data);
			$this->load->view('templates/footer');
		}

	}