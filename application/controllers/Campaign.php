<?php
	class Campaign extends CI_Controller
	{
		public function add($campaignid=NULL,$steps=NULL){
           
			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}
			$data['title'] = 'Add Campaign';
			$data['steps'] = $steps;

			$data['wallaetbalance']=$this->User_Model->wallet($this->session->userdata('user_id'));


			if($campaignid!=NULL)
			{
				$data['campaign']=$this->Campaign_Model->getcampiagn($campaignid);

				$data['transaction']=$this->Campaign_Model->getcampiagnTransaction($campaignid);
			}
			else
			$data['campaign']=NULL;

			
			$this->load->view('templates/header');
			$this->load->view('campaign/add', $data);
			$this->load->view('templates/footer');
		}

		public function step($id=NULL)
		{
			if($id==1)
			{
				$returnvalue="";		
					
				$returnvalue=$this->Campaign_Model->campiagn_add($id);

				echo $returnvalue;
				exit;
				
			}

			if($id==2)
			{
				$post_image=NULL;
				$video_or_image_file=NULL;

				if(isset($_FILES['banner_add']['name']) && $_FILES['banner_add']['name']!='')
				{
					$config['upload_path'] = './assets/images/campaigns';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '204800000';
					$config['max_width'] = '5000';
					$config['max_height'] = '5000';

					$this->load->library('upload', $config);

					if(!$this->upload->do_upload('banner_add')){
						$errors =  array('error' => $this->upload->display_errors());
						
						$post_image = 'noimage.jpg';
					}else{
						$data =  array('upload_data' => $this->upload->data());
						$post_image = $_FILES['banner_add']['name'];
					}
				}

				if(isset($_FILES['video_or_image_file']['name']) && $_FILES['video_or_image_file']['name']!='')
				{
						$config['upload_path'] = './assets/images/campaigns';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|mp4|flv|mpeg|wmv';
						$config['max_size'] = '204800000';

						$this->load->library('upload', $config);

						if(!$this->upload->do_upload('video_or_image_file')){
							$errors =  array('error' => $this->upload->display_errors());
							
							$video_or_image_file = 'noimage.jpg';
						}else{
							$data =  array('upload_data' => $this->upload->data());
							$video_or_image_file = $_FILES['video_or_image_file']['name'];
						}
				}

				$returnvalue=$this->Campaign_Model->campiagn_add($id,$post_image,$video_or_image_file);
				redirect('campaign/add/'.$this->input->post('step2_id').'/3');
				
			}


			if($id==3)
			{
				$returnvalue="";		
					
				$returnvalue=$this->Campaign_Model->campiagn_add($id);

				echo $returnvalue;
				exit;
				
			}

			if($id==4)
			{
				$returnvalue="";		
					
				$returnvalue=$this->Campaign_Model->campiagn_add($id);

				echo $returnvalue;
				exit;
				
			}

		}

		public function preview($campaignid)
		{
			if($campaignid!=NULL)
			{
				$data['campaign']=$this->Campaign_Model->getcampiagn($campaignid);
			}
			else
			$data['campaign']=NULL;

			return $data;
			exit;
		}

		public function manage()
		{
			$data['title'] = 'Manage Campaigns';
			$data['campaigns'] = $this->Campaign_Model->getcampiagns();
			$this->load->view('templates/header');
			$this->load->view('campaign/manage', $data);
			$this->load->view('templates/footer');
		}


		public function transactioninitiate()
		{
			if(isset($_POST['amount']))
			{
				$rid=$this->Wallet_Model->initiateWallet($this->session->userdata('user_id'),$_POST['amount'],'C');
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



		public function statusupdate()
		{
			if(isset($_POST['id']) && isset($_POST['status']))
			{
				$this->Campaign_Model->updateStatus($_POST['id'],$_POST['status']);
				$status=$_POST['status'];
				$returnval="";
        switch($status)
        {
            case 'Active':
                $returnval="<a href='javascript:;' class='btn btn-success'>".$status."</a>";
                break;
            case 'Inactive':
                $returnval="<a href='javascript:;' class='btn btn-inverse'>".$status."</a>";
                break;
            case 'Pending':
                $returnval="<a href='javascript:;' class='btn btn-info'>".$status."</a>";
                break;
            case 'Approve':
                $returnval="<a href='javascript:;' class='btn btn-success'>".$status."</a>";
                break;
            case 'Pause':
                $returnval="<a href='javascript:;' class='btn btn-warning'>".$status."</a>";
                break;
            case 'Completed':
                $returnval="<a href='javascript:;' class='btn btn-disabled'>".$status."</a>";
                break;
            case 'Draft':
                $returnval="<a href='javascript:;' class='btn btn-warning'>".$status."</a>";
                break;
            case 'Suspend':
                $returnval="<a href='javascript:;' class='btn btn-danger'>".$status."</a>";
                break;   
        }

        echo $returnval;
		exit;

			}
		}

	}