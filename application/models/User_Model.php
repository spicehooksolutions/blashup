<?php
	class User_Model extends CI_Model{
		public function register($encrypt_password){

			$data = array('name' => $this->input->post('name'), 
						  'email' => $this->input->post('email'),
						  'password' => $encrypt_password,
						  'username' => $this->input->post('username'),
						  'role_id'=>2
						  );

			return $this->db->insert('users', $data);
		}
		
		public function get_profile_data($userid){
			//Validate
			$this->db->where('id', $userid);
		

			$result = $this->db->get('users');

			if ($result->num_rows() == 1) {
				return $result->result_array();
			}else{
				return false;
			}
		}

		public function update_profile_data($post_image)
		{ 
			$data = array('name' => $this->input->post('name'),
							'zipcode' => $this->input->post('zipcode'),
							'contact' => $this->input->post('contact'),
							'address' => $this->input->post('address'),
							'gender' => $this->input->post('gender'),
							'status' => $this->input->post('status'),
							'dob' => $this->input->post('dob'),
							'image' => $post_image,
							'register_date' => date("Y-m-d H:i:s")
						  );

			$this->db->where('id', $this->input->post('id'));
			$d = $this->db->update('users', $data);
		}

		public function change_password($new_password){

			$data = array(
				'password' => md5($new_password)
			    );
			$this->db->where('id', $this->session->userdata('user_id'));
			return $this->db->update('users', $data);
		}
		
		public function login($username, $encrypt_password){
			//Validate
			$this->db->where('username', $username);
			$this->db->where('password', $encrypt_password);

			$result = $this->db->get('users');

			if ($result->num_rows() == 1) {
				return $result->row(0);
			}else{
				return false;
			}
		}

		// Check Username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}



		public function wallet($userid)
		{
			$walletbalance=0;
			$this->db->where('user_id',$userid);
			$this->db->where('payment_status','succeful');
			$result = $this->db->get('transactions');
			if ($result->num_rows()>=1) {
				foreach($result->result_array() as $row)
				{
					$walletbalance +=$row['payment_amount'];
				}

				return $walletbalance;
			}else{
				return $walletbalance;
			}
		}
	}