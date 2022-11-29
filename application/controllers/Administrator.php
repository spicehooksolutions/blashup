<?php 
	class Administrator extends CI_Controller{
		public function view($page = 'index'){
			if($this->session->userdata('login')) {
    			redirect('administrator/dashboard');
   			}
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			//$this->load->view('administrator/header');
			//$this->load->view('administrator/index');
			$this->load->view('administrator/'.$page, $data);
			//$this->load->view('administrator/footer');
		}
		public function home($page = 'home'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}
		public function dashboard($page = 'dashboard'){
		   if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
		   $data['title'] = ucfirst($page);
		   
		   $totalusers=$this->Administrator_Model->dashboarduser();

		   
		   if($totalusers!=FALSE)
		   $data['totalusers']=$totalusers->CNT;
		   else
		   $data['totalusers']=0;

		  $totalcampaigns=$this->Administrator_Model->dashboardcampaign();

		  if($totalcampaigns!=FALSE)
		  $data['totalcampaigns']=$totalcampaigns->CNT;
		  else
		  $data['totalcampaigns']=0;

		  $totaltransactions=$this->Administrator_Model->dashboardtransaction();
		  
		  if($totaltransactions!=FALSE)
		  $data['totaltransactions']=$totaltransactions->CNT;
		  else
		  $data['totaltransactions']=0;

		  $totalrunningcampaigns=$this->Administrator_Model->dashboardrunningcampaign();

		  if($totalrunningcampaigns!=FALSE)
		  $data['totalrunningcampaigns']=$totalrunningcampaigns->CNT;
		  else
		  $data['totalrunningcampaigns']=0;

		  $totalsuccessfultransactions=$this->Administrator_Model->dashboardsuccessfultransaction();
		  
		  if($totalsuccessfultransactions!=FALSE)
		  $data['totalsuccessfultransactions']=$totalsuccessfultransactions->CNT;
		  else
		  $data['totalsuccessfultransactions']=0;

		  $totalfailedtransactions=$this->Administrator_Model->dashboardfailedtransaction();
		  
		  if($totalfailedtransactions!=FALSE)
		  $data['totalfailedtransactions']=$totalfailedtransactions->CNT;
		  else
		  $data['totalfailedtransactions']=0;

		  $totalsales=$this->Administrator_Model->dashboardtotalsales();

		  if($totalsales!=FALSE)
		  $data['totalsales']=$totalsales->TOTAL;
		  else
		  $data['totalfailedtransactions']=0;

		  $totaltransactions=$this->Administrator_Model->dashboardtotaltransactions();

		  if($totaltransactions!=FALSE)
		  $data['totaltransactions']=$totaltransactions->TOTAL;
		  else
		  $data['totaltransactions']=0;

		   $this->load->view('administrator/header-script');
		   $this->load->view('administrator/header');
		   $this->load->view('administrator/header-bottom');
		   $this->load->view('administrator/'.$page, $data);
		   $this->load->view('administrator/footer');
		}
	  // Log in Admin
		public function adminLogin(){
			$data['title'] = 'Admin Login';
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				//$data['title'] = ucfirst($page);
				$this->load->view('administrator/header-script');
				//$this->load->view('administrator/header');
				//$this->load->view('administrator/header-bottom');
				$this->load->view('administrator/index', $data);
				//$this->load->view('administrator/footer');
			}else{
				// get email and Encrypt Password
				$email = $this->input->post('email');
				$encrypt_password = md5($this->input->post('password'));
				$user_id = $this->Administrator_Model->adminLogin($email, $encrypt_password);
				$sitelogo = $this->Administrator_Model->update_siteconfiguration(1);
				if ($user_id && $user_id->role_id == 1) {
					//Create Session
					$user_data = array(
								'user_id' => $user_id->id,
				 				'username' => $user_id->username,
				 				'email' => $user_id->email,
				 				'login' => true,
				 				'role' => $user_id->role_id,
				 				'image' => $user_id->image,
				 				'site_logo' => $sitelogo['logo_img']
				 	);
				 	$this->session->set_userdata($user_data);
					//Set Message
					$this->session->set_flashdata('success', 'Welcome to administrator Dashboard.');
					redirect('administrator/dashboard');
				}else{
					$this->session->set_flashdata('danger', 'Login Credential in invalid!');
					redirect('administrator/index');
				}
			}
		}
				// log admin out
		public function logout(){
			// unset user data
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role_id');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('image');
			$this->session->unset_userdata('site_logo');
			//Set Message
			$this->session->set_flashdata('success', 'You are logged out.');
			redirect(base_url().'administrator/index');
		}
		public function forget_password($page = 'forget-password'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			//$this->load->view('administrator/header');
			//$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}
		public function add_user($page = 'add-user')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Create User';
			//$data['add-user'] = $this->Administrator_Model->get_categories();
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$password = md5('Test@123');
				$this->Administrator_Model->add_user($post_image,$password);
				//Set Message
				$this->session->set_flashdata('success', 'User has been created Successfull.');
				redirect('administrator/users');
			}
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
		public function users($offset = 0)
		{
			// Pagination Config
			$config['base_url'] = base_url(). 'administrator/users/';
			$config['total_rows'] = $this->db->get('users');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			// Init Pagination
			$this->pagination->initialize($config);
			$data['title'] = 'Latest Users';
			$data['users'] = $this->Administrator_Model->get_users();
			 	$this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/users', $data);
		  		$this->load->view('administrator/footer');
		}
		public function delete($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Administrator_Model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function enable($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Administrator_Model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Desabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Administrator_Model->desable($id,$table);       
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function update_user($id = NULL)
		{
			$data['user'] = $this->Administrator_Model->get_user($id);
			if (empty($data['user'])) {
				show_404();
			}
			$data['title'] = 'Update User';
			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/update-user', $data);
	  		$this->load->view('administrator/footer');
		}
		public function update_user_data($page = 'update-user')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update User';
			//$data['add-user'] = $this->Administrator_Model->get_categories();
			$this->form_validation->set_rules('name', 'Name', 'required');
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
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
					$data['img'] = $this->Administrator_Model->get_user($id);
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = $data['img']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$this->Administrator_Model->update_user_data($post_image);
				//Set Message
				$this->session->set_flashdata('success', 'User has been Updated Successfull.');
				redirect('administrator/users');
			}
		}
		//########################## functions start of faq ##############################
		public function create_faq($page = 'add-faq')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['faq_categories'] = $this->Administrator_Model->faq_categories();
			$data['title'] = 'Create FAQ';
			$this->form_validation->set_rules('question', 'Question', 'required');
			$this->form_validation->set_rules('answer', 'Answer', 'required');
			$this->form_validation->set_rules('faq_cat_id', 'FAQ Category Name', 'required');
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				 $this->Administrator_Model->create_faq();
				//Set Message
				$this->session->set_flashdata('success', 'FAQ has been Added Successfull.');
				redirect('administrator/faqs');
			}
		}
		public function get_faqs($page = 'faqs')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    	show_404();
		   	}
			$data['faqs'] = $this->Administrator_Model->get_faqs();
			$data['title'] = 'List FAQS';
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/faqs', $data);
	  		$this->load->view('administrator/footer');
		}
		public function update_faqs($id = NULL)
		{
			$data['faq_categories'] = $this->Administrator_Model->faq_categories();
			$data['faqsDetails'] = $this->Administrator_Model->update_faqs($id);
			$data['title'] = 'Update Details';
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/update-faqs', $data);
	  		$this->load->view('administrator/footer');
		}
		public function update_faqs_data($page = 'update-faqs')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update faq';
			$this->form_validation->set_rules('question', 'Question', 'required');
			$this->form_validation->set_rules('answer', 'Answer', 'required');
			$this->form_validation->set_rules('faq_cat_id', 'FAQ Category Name', 'required');
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				 $this->Administrator_Model->update_faq_data();
				//Set Message
				$this->session->set_flashdata('success', 'FAQ has been Updated Successfull.');
				redirect('administrator/faqs');
			}
		}
		//Site configuration
		public function get_siteconfiguration($page = 'site-configuration')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    	show_404();
		   	}
			$data['siteconfiguration'] = $this->Administrator_Model->get_siteconfiguration();
			$data['title'] = 'Site Configuration';
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/update-site-configuration', $data);
	  		$this->load->view('administrator/footer');
		}
		public function update_siteconfiguration($id = NULL)
		{
			$data['siteconfiguration'] = $this->Administrator_Model->update_siteconfiguration($id);
			$data['title'] = 'Update Configuration';
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/update-site-configuration', $data);
	  		$this->load->view('administrator/footer');
		}
		public function update_siteconfiguration_data($page = 'update-site-configuration')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update Configuration';
			$this->form_validation->set_rules('site_title', 'Site Title', 'required');
			$this->form_validation->set_rules('site_name', 'Site Name', 'required');
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$data['logo_imgs'] = $this->Administrator_Model->update_siteconfiguration($this->input->post('id'));
					$post_image = $data['logo_imgs']['logo_img'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				 $this->Administrator_Model->update_siteconfiguration_data($post_image);
				//Set Message
				$this->session->set_flashdata('success', 'site configuration Details has been Updated Successfull.');
				redirect('administrator/site-configuration/update/1');
			}
		}
		public function payment_gateway_integration()
		{
			$config['base_url'] = base_url(). 'administrator/payment-gateway-integration/';
			$data['paymentconfiguration'] = $this->Administrator_Model->get_paymentconfiguration(1);
			$data['title'] = 'Payment Gateway Integration';
			 	$this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/payment-gateway-integration', $data);
		  		$this->load->view('administrator/footer');
		}
		public function payment_gateway_integration_update()
		{
			$data['paymentgateway'] = $this->Administrator_Model->payment_gateway_integration_update();
			$this->session->set_flashdata('success', 'Payment gateway settings updated');
			redirect('administrator/site-configuration/payment-gateway-integration');
		}
		public function campaign_listing()
		{	
			$data['campaign_listing'] = $this->Administrator_Model->campaign_listing_data();
			$data['title'] = 'Campaign Listing';
			 	$this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/campaign-listing', $data);
		  		$this->load->view('administrator/footer');
		}
		public function get_admin_data()
		{
			$data['changePassword'] = $this->Administrator_Model->get_admin_data();
			$data['title'] = 'Change Password';
			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/change-password', $data);
	  		$this->load->view('administrator/footer');
		}
		public function change_password($page = 'change-password')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Change password';
			//$data['add-user'] = $this->Administrator_Model->get_categories();
			$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_match_old_password');
			$this->form_validation->set_rules('new_password', 'New Password Field', 'required');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'matches[new_password]');
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				$this->Administrator_Model->change_password($this->input->post('new_password'));
				//Set Message
				$this->session->set_flashdata('success', 'Password Has Been Changed Successfull.');
				redirect('administrator/change-password');
			}
		}
		// Check user name exists
		public function match_old_password($old_password){
			$this->form_validation->set_message('match_old_password', 'Current Password Does not matched, Please Try Again.');
			$password = md5($old_password);
			$que = $this->Administrator_Model->match_old_password($password);
			if ($que) {
				return true; 
			}else{
				return false;
			}
		}
		public function update_admin_profile()
		{
			$data['user'] = $this->Administrator_Model->get_admin_data();
			$data['title'] = 'Update Profile';
			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/update-profile', $data);
	  		$this->load->view('administrator/footer');
		}
		public function update_admin_profile_data($page = 'update-profile')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update Profile';
			//$data['add-user'] = $this->Administrator_Model->get_categories();
			$this->form_validation->set_rules('name', 'Name', 'required');
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
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
					$data['img'] = $this->Administrator_Model->get_user($id);
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = $data['img']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$this->Administrator_Model->update_user_data($post_image);
				//Set Message
				$this->session->set_flashdata('success', 'User has been Updated Successfull.');
				redirect('administrator/update-profile');
			}
		}
		//forget password functions start
		public function forget_password_mail(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
            //check if email is in the database
        $this->load->model('Administrator_Model');
        if($this->Administrator_Model->email_exists()){
            //$them_pass is the varible to be sent to the user's email
            $temp_pass = md5(uniqid());
            //send email with #temp_pass as a link
            $this->load->library('email', array('mailtype'=>'html'));
            $this->email->from('admin1234567@gmail.com', "Site");
            $this->email->to($this->input->post('email'));
            $this->email->subject("Reset your Password");
            $message = "<p>This email has been sent as a request to reset our password</p>";
            $message .= "<p><a href='".base_url()."administrator/reset-password/$temp_pass'>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";
            $this->email->message($message);
            if($this->email->send()){
                $this->load->model('Administrator_Model');
                if($this->Administrator_Model->temp_reset_password($temp_pass)){
                    echo "check your email for instructions, thank you";
                }
            }
            else{
                echo "email was not sent, please contact your administrator";
            }
        }else{
            echo "your email is not in our database";
        }
}
public function reset_password($temp_pass){
    $this->load->model('Administrator_Model');
    if($this->Administrator_Model->is_temp_pass_valid($temp_pass)){
        $this->load->view('reset-password');
       //once the user clicks submit $temp_pass is gone so therefore I can't catch the new password and   //associated with the user...
    }else{
        echo "the key is not valid";    
    }
}
public function update_password(){
    $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
            if($this->form_validation->run()){
            echo "passwords match";
            }else{
            echo "passwords do not match";  
            }
}

public function userswallet($offset = 0)
		{
			

			$data['title'] = 'Latest Users';

			$data['users'] = $this->Administrator_Model->get_users();
			

			 	$this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/userswallet', $data);
		  		$this->load->view('administrator/footer');
		}
	}