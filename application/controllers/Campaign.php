<?php
	class Campaign extends CI_Controller
	{
		public function add($campaignid=NULL,$steps=NULL){
           
			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}
			$data['title'] = 'Add Campaign';
			$data['steps'] = $steps;
			if($campaignid!=NULL)
			{
				$data['campaign']=$this->Campaign_Model->getcampiagn($campaignid);
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

				$returnvalue=$this->Campaign_Model->campiagn_add($id,$post_image,$video_or_image_file);
				redirect('campaign/add/'.$this->input->post('step2_id').'/3');
				
			}
		}

		public function manage()
		{
			$data['title'] = 'Manage Campaigns';
			$data['campaigns'] = $this->Campaign_Model->getcampiagns();
			$this->load->view('templates/header');
			$this->load->view('campaign/manage', $data);
			$this->load->view('templates/footer');
		}

	}