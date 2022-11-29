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

		public function transactioninitiate()
		{
			if(isset($_POST['amount']))
			{
				if($this->Wallet_Model->initiateWallet($this->session->userdata('user_id'),$_POST['amount'])>0)
				{	echo 1;
					exit;
				}
				else
				{
					echo 0;
					exit;
				}
			}
			else
			{
				echo 0;
				exit;
			}
		}

		public function transactioncomplete($keys,$response)
		{
			var_dump($keys,$response);
			exit;
		}

	}