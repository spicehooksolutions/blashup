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
				$rid=$this->Wallet_Model->initiateWallet($this->session->userdata('user_id'),$_POST['amount']);
				if($rid>0)
				{	echo $rid;
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

		public function transactioncomplete()
		{
			if(isset($_POST['keys']) && $_POST['responsetext']!='')
			{
				$this->Wallet_Model->completeWallet($_POST['keys'],$_POST['responsetext'],true);
				echo 1;
			}
			else
			{
				$this->Wallet_Model->completeWallet($_POST['keys'],$_POST['responsetext'],false);
				echo 0;
			}
			exit;
		}

		public function alltransaction(){
			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}
			$data['title'] = 'All transactions';
			$data['alltransactions'] = $this->Wallet_Model->alltransaction();
			// var_dump($data['alltransactions']);
			// die();
			
			$this->load->view('templates/header');
			$this->load->view('wallet/alltransactions', $data);
			$this->load->view('templates/footer');
		}
	}