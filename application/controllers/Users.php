<?php
	class Users extends CI_Controller
	{
		public function dashboard(){
			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}
			$data['title'] = 'Dashboard';

			$this->load->view('templates/header');
			$this->load->view('users/dashboard', $data);
			$this->load->view('templates/footer');
		}

		// Register User
		public function register(){
			if($this->session->userdata('login')) {
				redirect('posts');
			}

			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header-login');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer-login');
			}else{
				//Encrypt Password
				$encrypt_password = md5($this->input->post('password'));

				$this->User_Model->register($encrypt_password);

				//Set Message
				$this->session->set_flashdata('user_registered', 'You are registered and can log in.');
				redirect('/');
			}
		}
		
		public function change_password()
		{
			
			$data['title'] = 'Change password';

			$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_match_old_password');
			$this->form_validation->set_rules('new_password', 'New Password Field', 'required');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'matches[new_password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/changepassword', $data);
				$this->load->view('templates/footer');
			}else{


				$this->Users_Model->change_password($this->input->post('new_password'));

				//Set Message
				$this->session->set_flashdata('success', 'Password has been changed successfull.');
				redirect('users/updatepassword');
			}
		}
		public function updatepassword()
		{
			
			$data['title'] = 'Change password';

				$this->load->view('templates/header');
				$this->load->view('users/changepassword', $data);
				$this->load->view('templates/footer');
		}
		public function myaccount()
		{
			
				$data['user'] = $this->User_Model->get_profile_data($this->session->userdata('user_id'));

				$data['user']=$data['user'][0];
				$this->load->view('templates/header');
				$this->load->view('users/myaccount', $data);
				$this->load->view('templates/footer');
		}

		public function update_profile_data($page = 'update-profile')
		{
			
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('user/login');
			}

			$data['title'] = 'Update Profile';

			//$data['add-user'] = $this->Administrator_Model->get_categories();

			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$data['user'] = $this->User_Model->get_profile_data($this->session->userdata('user_id'));

				$data['user']=$data['user'][0];
				$this->load->view('templates/header');
				$this->load->view('users/myaccount', $data);
				$this->load->view('templates/footer');
			}else{
				//Upload Image
				
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$id = $this->input->post('id');
					$data['img'] = $this->User_Model->get_profile_data($id);
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = $data['img']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->User_Model->update_profile_data($post_image);

				//Set Message
				$this->session->set_flashdata('success', 'Profile data has been updated successfull.');
				redirect('users/myaccount');
			}
			
		}

		// Log in User
		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header-login');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer-login');
			}else{
				// get username and Encrypt Password
				$username = $this->input->post('username');
				$encrypt_password = md5($this->input->post('password'));

				$user_id = $this->User_Model->login($username, $encrypt_password);
				
				if ($user_id) {
					//Create Session
					$user_data = array(
								'user_id' => $user_id->id,
				 				'username' => $username,
				 				'email' => $user_id->email,
				 				'login' => true,
								'role'=>$user_id->role_id
				 	);

				 	$this->session->set_userdata($user_data);

					//Set Message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in.');
					if($user_id->role_id==1)
					redirect('/administrator/dashboard');
					else
					redirect('/');
				}else{
					$this->session->set_flashdata('login_failed', 'Login is invalid.');
					redirect('users/login');
				}
				
			}
		}

		// log user out
		public function logout(){
			// unset user data
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			//Set Message
			$this->session->set_flashdata('user_loggedout', 'You are logged out.');
			redirect('users/login');
		}

		// Check user name exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is already taken, Please choose a different one.');

			if ($this->User_Model->check_username_exists($username)) {
				return true;
			}else{
				return false;
			}
		}


		// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}
	}