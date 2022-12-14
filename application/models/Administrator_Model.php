<?php
	class Administrator_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function adminLogin($email, $encrypt_password){
			//Validate
			$this->db->where('email', $email);
			$this->db->where('password', $encrypt_password);

			$result = $this->db->get('users');

			if ($result->num_rows() == 1) {
				return $result->row(0);
			}else{
				return false;
			}
		}

		public function get_posts($slug = FALSE)
		{
			if($slug === FALSE){
				$query = $this->db->order_by('id', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}

		public function create_post()
		{
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
				'title' => $this->input->post('title'), 
			    'slug' => $slug,
			    'body' => $this->input->post('body'),
			    'category_id' => $this->input->post('category_id')
			    );
			return $this->db->insert('posts', $data);
		}

		public function delete($id,$table)
		{
			$this->db->where('id', $id);
			$this->db->delete($table);
			return true;
		}

		public function get_categories(){
			$this->db->order_by("id", "DESC");
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function add_user($post_image,$password)
		{
			$data = array('name' => $this->input->post('name'), 
							'email' => $this->input->post('email'),
							'password' => $password,
							'username' => $this->input->post('username'),
							'zipcode' => $this->input->post('zipcode'),
							'contact' => $this->input->post('contact'),
							'address' => $this->input->post('address'),
							'gender' => $this->input->post('gender'),
							'role_id' => '2',
							'status' => $this->input->post('status'),
							'dob' => $this->input->post('dob'),
							'image' => $post_image,
							'password' => $password,
							'register_date' => date("Y-m-d H:i:s")

						  );
			return $this->db->insert('users', $data);
		}

		public function get_users($username = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($username === FALSE){
				$this->db->order_by('users.id', 'DESC');
				
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query =$this->db->get_where('users', array('role_id !=' => 1));
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('username' => $username));
			return $query->row_array();
		}

		public function enable($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}
		public function desable($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}

		public function get_user($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}

		public function update_user_data($post_image)
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

		public function create_product_category()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'type' => 'product',
				'status' => $this->input->post('status'),
				'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('categories', $data);
		}

		public function product_categories(){
			$this->db->order_by('id','desc');
			$this->db->where('type', 'product');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function update_product_category_data()
		{
			$data = array('name' => $this->input->post('name'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('categories', $data);
		}

		public function update_product_category($id = FALSE)
		  {
		   if($id === FALSE){
		    $query = $this->db->get('categories');
		    return $query->result_array(); 
		   }

		   $query = $this->db->get_where('categories', array('id' => $id));
		   return $query->row_array();
		  }


		  public function create_product($post_image)
		{
			$data = array('name' => $this->input->post('name'), 
							'sku' => $this->input->post('sku'),
							'save_price' => $this->input->post('save_price'),
							'price' => $this->input->post('price'),
							'user_id' => $this->session->userdata('user_id'),
							'quantity' => $this->input->post('quantity'),
							'color' => $this->input->post('color'),
							'tag' => $this->input->post('tag'),
							'short_description' => $this->input->post('short_description'),
							'cat_id' => $this->input->post('cat_id'),
							'size' => $this->input->post('size'),
							'status' => $this->input->post('status'),
							'description' => $this->input->post('description'),
							'meta_title' => $this->input->post('meta_title'),
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_tag' => $this->input->post('meta_tag'),
							'image' => $post_image,
							'datetime' => date("Y-m-d H:i:s")
						);
			$this->db->insert('products', $data);
			 return  $insert_id = $this->db->insert_id();
		}

		public function insertproductsmultipleImages($data = array()){
       	 $insert = $this->db->insert_batch('product_images',$data);
       	 return $insert?true:false;
    	}

		// Check Product SKU exists
		public function check_sku_exists($sku){
			$query = $this->db->get_where('products', array('sku' => $sku));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

		public function get_products($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('products');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('products', array('id' => $id));
			return $query->row_array();
		}

		public function update_products($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('products');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('products', array('id' => $id));
			return $query->row_array();
		}

		public function product_images($productId = FALSE){
			$this->db->order_by('id','desc');
			$this->db->where('product_id', $productId);
			$query = $this->db->get('product_images');
			return $query->result_array();
		}

		public function update_products_data($post_image)
		{
			$data = array('name' => $this->input->post('name'), 
							'save_price' => $this->input->post('save_price'),
							'price' => $this->input->post('price'),
							'user_id' => $this->session->userdata('user_id'),
							'quantity' => $this->input->post('quantity'),
							'color' => $this->input->post('color'),
							'tag' => $this->input->post('tag'),
							'short_description' => $this->input->post('short_description'),
							'cat_id' => $this->input->post('cat_id'),
							'size' => $this->input->post('size'),
							'status' => $this->input->post('status'),
							'description' => $this->input->post('description'),
							'meta_title' => $this->input->post('meta_title'),
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_tag' => $this->input->post('meta_tag'),
							'image' => $post_image,
							'datetime' => date("Y-m-d H:i:s")
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('products', $data);
		}

		public function create_faq_category()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'type' => 'faq',
				'status' => $this->input->post('status'),
				'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('categories', $data);
		}

		public function faq_categories(){
			$this->db->order_by('id','desc');
			$this->db->where('type', 'faq');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function update_faq_category_data()
		{
			$data = array('name' => $this->input->post('name'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('categories', $data);
		}

		public function update_faq_category($id = FALSE)
		 {
		   	if($id === FALSE){
		    $query = $this->db->get('categories');
		    return $query->result_array(); 
		}
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row_array();
		}


		//faq models functions start

		 public function create_faq()
		{
			$data = array('question' => $this->input->post('question'), 
							'answer' => $this->input->post('answer'),
							'faq_cat_id' => $this->input->post('faq_cat_id'),
							'status' => 1,
							'datetime' => date("Y-m-d H:i:s")
						);
			return $this->db->insert('faqs', $data);
		}


		public function get_faqs()
		{
			$this->db->select('categories.name catName, faqs.id as faqId,faqs.question,faqs.answer,faqs.datetime,faqs.status as faqStatus');
			$this->db->from('faqs');
			$this->db->join('categories', 'categories.id = faqs.faq_cat_id');
				
				$query=$this->db->get();
				return $data=$query->result_array();
		}

		public function update_faqs($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('faqs');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('faqs', array('id' => $id));
			return $query->row_array();
		}

		public function update_faq_data()
		{
			$data = array('question' => $this->input->post('question'), 
							'answer' => $this->input->post('answer'),
							'faq_cat_id' => $this->input->post('faq_cat_id'),
							'status' => 1,
							'datetime' => date("Y-m-d H:i:s")
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('faqs', $data);
		}

		//Site configuration
		public function get_siteconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('site_config');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('site_config', array('id' => $id));
			return $query->row_array();
		}

		public function update_siteconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('site_config');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('site_config', array('id' => $id));
			return $query->row_array();
		}


		

		public function update_siteconfiguration_data($post_image)
		{
			$data = array('site_title' => $this->input->post('site_title'),
						  'site_name' => $this->input->post('site_name'),
						  'app_token_key' => $this->input->post('app_token_key'),
						  'logo_img' => $post_image
						);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('site_config', $data);
		}

		//Save payment settings

		public function get_paymentconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('paymentgateways');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('paymentgateways', array('id' => $id));
			return $query->row_array();
		}

		public function payment_gateway_integration_update()
		{
			$data = array('payment_gateway_key_id' => $this->input->post('razorpay_key_id'), 
							'payment_gateway_key_secret' => $this->input->post('razorpay_key_secret'),
							'gatewaytag' =>'razorpay',
							'payment_gateway_api_path' => $this->input->post('razorpay_api_path')
						  );

			if($this->input->post('id')==0)
			 $this->db->insert('paymentgateways', $data);
			else
			{
				$this->db->where('id', $this->input->post('id'));
			    $this->db->update('paymentgateways', $data);
			}
			
		}

		public function campaign_listing_data($id = FALSE)
		{
			// if ($limit) {
			// 	$this->db->limit($limit, $offset);
			//  }

			 if($id === FALSE){
			 	$this->db->order_by('vendor_campaigns.id', 'DESC');

			 	$query =$this->db->get('vendor_campaigns');
				return $query->result_array(); 
			 }

			 $query = $this->db->get_where('vendor_campaigns', array('id' => 1));
			 return $query->row_array();

			
		}



		//Page Content pages details start
		public function get_pagecontents($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('page_content');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('page_content', array('id' => $id));
			return $query->row_array();
		}

		public function update_pagecontents($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('page_content');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('page_content', array('id' => $id));
			return $query->row_array();
		}

		public function update_pagecontents_data($id = FALSE)
		{
			$data = array('page_name' => $this->input->post('page_name'), 
							'content' => $this->input->post('content'),
							'updated_datetime' => date("Y-m-d H:i:s")
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('page_content', $data);
		}

		public function get_galleries_images(){
			$this->db->order_by('id','desc');
			$query = $this->db->get('galleries');
			return $query->result_array();
		}

		public function create_team($team_image)
		{

			$data = array(
				'name' => $this->input->post('name'), 
			    'designation' => $this->input->post('designation'),
			    'description' => $this->input->post('description'),
			    'image' => $team_image,
			    'status' => $this->input->post('status')
			    );
			return $this->db->insert('teams', $data);
		}

		public function listteams($teamId = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($teamId === FALSE){
				$this->db->order_by('teams.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id');
				$query = $this->db->get('teams');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('teams', array('id' => $teamId));
			return $query->row_array();
		}

		public function update_team_data($post_image){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'name' => $this->input->post('name'), 
			    'designation' => $this->input->post('designation'),
			    'description' => $this->input->post('description'),
			    'image' => $post_image
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('teams', $data);
		}

		public function create_testimonial($uploaded_image)
		{

			$data = array(
				'name' => $this->input->post('name'), 
			    'domain' => $this->input->post('domain'),
			    'description' => $this->input->post('description'),
			    'image' => $uploaded_image,
			    'status' => $this->input->post('status')
			    );
			return $this->db->insert('testimonials', $data);
		}

		public function listtestimonial($id = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($id === FALSE){
				$this->db->order_by('testimonials.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('testimonials');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('testimonials', array('id' => $id));
			return $query->row_array();
		}

		public function update_testimonial_data($uploaded_image){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'name' => $this->input->post('name'), 
			    'domain' => $this->input->post('domain'),
			    'description' => $this->input->post('description'),
			    'image' => $uploaded_image,
			    'status' => $this->input->post('status')
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('testimonials', $data);
		}

		public function get_admin_data()
		{
			$id = $this->session -> userdata('user_id');
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}

		public function change_password($new_password){

			$data = array(
				'password' => md5($new_password)
			    );
			$this->db->where('id', $this->session->userdata('user_id'));
			return $this->db->update('users', $data);
		}

		public function match_old_password($password)
		{
			$id = $this->session -> userdata('user_id');
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('password' => $password));
			return $query->row_array();

		}

		// function start fron forget password

		public function email_exists(){
    $email = $this->input->post('email');
    $query = $this->db->query("SELECT email, password FROM users WHERE email='$email'");    
    if($row = $query->row()){
        return TRUE;
    }else{
        return FALSE;
    }
}
public function temp_reset_password($temp_pass){
    $data =array(
                'email' =>$this->input->post('email'),
                'reset_pass'=>$temp_pass);
                $email = $data['email'];

    if($data){
        $this->db->where('email', $email);
        $this->db->update('users', $data);  
        return TRUE;
    }else{
        return FALSE;
    }

}
public function is_temp_pass_valid($temp_pass){
    $this->db->where('reset_pass', $temp_pass);
    $query = $this->db->get('users');
    if($query->num_rows() == 1){
        return TRUE;
    }
    else return FALSE;
}

public function dashboarduser(){
	$query = $this->db->query('SELECT COUNT(*) AS CNT FROM users WHERE role_id!=1');

	if($query->num_rows()>0){
        return  $query->row();
    }
	else
	return false;
	//var_dump($query->num_rows(), $query->row());
}

public function getRecentCampaigns()
{
	$query = $this->db->query('SELECT * FROM  vendor_campaigns WHERE campaign_status="Pending" AND campaign_creation_date >= DATE_SUB( "'.date('Y-m-d h:i').'", INTERVAL 15 MINUTE ) LIMIT 5');

	return $query->result_array();
}

public function dashboardcampaign(){
	$query = $this->db->query('SELECT COUNT(*) AS CNT FROM  vendor_campaigns');
	return $query->row();
}

public function dashboardtransaction(){
	$query = $this->db->query('SELECT SUM(payment_amount) AS AMOUNT FROM  transactions WHERE payment_status="succeful"');
	return $query->row();
}

public function dashboardrunningcampaign(){
	$query = $this->db->query('SELECT COUNT(*) AS CNT FROM  vendor_campaigns WHERE campaign_status="Approved" AND NOW() BETWEEN campaign_start_date AND campaign_end_date');
	return $query->row();
}

public function dashboardsuccessfultransaction(){
	$query = $this->db->query('SELECT COUNT(*) AS CNT FROM  transactions WHERE payment_status=	
	"succeful"');
	return $query->row();
}

public function dashboardfailedtransaction(){
	$query = $this->db->query('SELECT COUNT(*) AS CNT FROM  transactions WHERE payment_status !=	
	"succeful"');
	return $query->row();
}

public function dashboardtotalsales(){
	$query = $this->db->query('SELECT SUM(payment_amount) AS TOTAL FROM transactions WHERE payment_status=	
	"succeful"');
	return $query->row();
}

public function dashboardtotaltransactions(){
	$query = $this->db->query('SELECT SUM(transaction_amount) AS TOTAL FROM campaign_transactions WHERE transaction_status=	
	"success"');
	
       return $query->row();
}

public function getalltransaction(){
	$query = $this->db->query('SELECT * FROM transactions');
	return  $query->result_array();
	
}

// Login activity log
public function login_log(){
	function get_ip()
	{
		$ip = null;
		$deep_detect=true;
		if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
			$ip = $_SERVER["REMOTE_ADDR"];
			if ($deep_detect) {
				if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				}
				if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
					$ip = $_SERVER['HTTP_CLIENT_IP'];
				}
			}
		}
		return $ip;
	}
			function getBrowser()
			{
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
			$browser = "N/A";
			$browsers = [
				'/msie/i' => 'Internet explorer',
				'/firefox/i' => 'Firefox',
				'/safari/i' => 'Safari',
				'/chrome/i' => 'Chrome',
				'/edge/i' => 'Edge',
				'/opera/i' => 'Opera',
				'/mobile/i' => 'Mobile browser',
			];
			foreach ($browsers as $regex => $value) {
				if (preg_match($regex, $user_agent)) {
				$browser = $value;
				}
			}
			return $browser;
			}
			//echo "Browser: " . getBrowser();
			$user_ip=get_ip();
			$user_browser=getbrowser();
			$data = array('user_id'=>$this->session->userdata('user_id'),
				  'login_ip' => $user_ip,
				  'browser' => $user_browser,
				  'browser_detail'=>$_SERVER['HTTP_USER_AGENT']					  
				  );
			return $this->db->insert('login_activity_log', $data);
	}

	public function dashboardsixmonthtransactions($type)
	{
			if($type=='all')
			{
				$monthwisevalues="0,0,0,0,0,0";

				$query = $this->db->query('SELECT MONTH(`payment_initiate_date`) AS MONTH, COUNT(*) AS TOTALWALLET FROM transactions WHERE MONTH(`payment_initiate_date`) BETWEEN MONTH(CURDATE() - INTERVAL 6 MONTH) AND MONTH(CURDATE()) GROUP BY MONTH');
				if ($query->num_rows()>0) {
					$monthwisevalues="";
					foreach($query->result_array() as $row)
					{
						$monthwisevalues .=$row['TOTALWALLET'].",";
					}
					if ($query->num_rows()<6)
					{
						for($i=1;$i<=6-$query->num_rows();$i++)
						$monthwisevalues .="0".",";
					}

				}

				return rtrim($monthwisevalues,",");
			}


			if($type=='countsuccess')
			{
				$monthwisevalues="0,0,0,0,0,0";

				$query = $this->db->query('SELECT MONTH(`payment_initiate_date`) AS MONTH, COUNT(*) AS TOTALWALLET FROM transactions WHERE MONTH(`payment_initiate_date`) BETWEEN MONTH(CURDATE() - INTERVAL 6 MONTH) AND MONTH(CURDATE()) AND payment_status="succeful" GROUP BY MONTH');
				if ($query->num_rows()>0) {
					$monthwisevalues="";
					foreach($query->result_array() as $row)
					{
						$monthwisevalues .=$row['TOTALWALLET'].",";
					}
					if ($query->num_rows()<6)
					{
						for($i=1;$i<=6-$query->num_rows();$i++)
						$monthwisevalues .="0".",";
					}

				}

				return rtrim($monthwisevalues,",");
			}
			if($type=='countfailed')
			{
				$monthwisevalues="0,0,0,0,0,0";

				$query = $this->db->query('SELECT MONTH(`payment_initiate_date`) AS MONTH, COUNT(*) AS TOTALWALLET FROM transactions WHERE MONTH(`payment_initiate_date`) BETWEEN MONTH(CURDATE() - INTERVAL 6 MONTH) AND MONTH(CURDATE()) AND payment_status!="succeful" GROUP BY MONTH');
				if ($query->num_rows()>0) {
					$monthwisevalues="";
					foreach($query->result_array() as $row)
					{
						$monthwisevalues .=$row['TOTALWALLET'].",";
					}
					if ($query->num_rows()<6)
					{
						for($i=1;$i<=6-$query->num_rows();$i++)
						$monthwisevalues .="0".",";
					}

				}

				return rtrim($monthwisevalues,",");
			}
	}

	public function dashboardsixmonthusers($type)
	{
		if($type=='all')
			{
				$monthwisevalues="0,0,0,0,0,0";

				$query = $this->db->query('SELECT MONTH(`register_date`) AS MONTH, COUNT(*) AS TOTALUSERS FROM users WHERE MONTH(`register_date`) BETWEEN MONTH(CURDATE() - INTERVAL 6 MONTH) AND MONTH(CURDATE()) GROUP BY MONTH');
				if ($query->num_rows()>0) {
					$monthwisevalues="";
					foreach($query->result_array() as $row)
					{
						$monthwisevalues .=$row['TOTALUSERS'].",";
					}
					if ($query->num_rows()<6)
					{
						for($i=1;$i<=6-$query->num_rows();$i++)
						$monthwisevalues .="0".",";
					}

				}

				return rtrim($monthwisevalues,",");
			}
	}

	public function dashboardsixmonthcampaign($type)
		{
			if($type=='all')
			{
				$monthwisevalues="0,0,0,0,0,0";

				$query = $this->db->query('SELECT MONTH(`campaign_creation_date`) AS MONTH, COUNT(*) AS TOTALCAMPAIGN FROM vendor_campaigns WHERE MONTH(`campaign_creation_date`) BETWEEN MONTH(CURDATE() - INTERVAL 6 MONTH) AND MONTH(CURDATE()) GROUP BY MONTH');
				if ($query->num_rows()>0) {
					$monthwisevalues="";
					foreach($query->result_array() as $row)
					{
						$monthwisevalues .=$row['TOTALCAMPAIGN'].",";
					}
					if ($query->num_rows()<6)
					{
						for($i=1;$i<=6-$query->num_rows();$i++)
						$monthwisevalues .="0".",";
					}

				}

				return rtrim($monthwisevalues,",");
			}



			if($type=='running')
			{
				$monthwisevalues="0,0,0,0,0,0";

				$query = $this->db->query('SELECT MONTH(`campaign_creation_date`) AS MONTH, COUNT(*) AS TOTALCAMPAIGN FROM vendor_campaigns WHERE MONTH(`campaign_creation_date`) BETWEEN MONTH(CURDATE() - INTERVAL 6 MONTH) AND MONTH(CURDATE()) AND campaign_status="Approved" AND NOW() BETWEEN campaign_start_date AND campaign_end_date GROUP BY MONTH');
				if ($query->num_rows()>0) {
					$monthwisevalues="";
					foreach($query->result_array() as $row)
					{
						$monthwisevalues .=$row['TOTALCAMPAIGN'].",";
					}
					if ($query->num_rows()<6)
					{
						for($i=1;$i<=6-$query->num_rows();$i++)
						$monthwisevalues .="0".",";
					}

				}

				return rtrim($monthwisevalues,",");
			}


			if($type=='failed')
			{
				$monthwisevalues="0,0,0,0,0,0";

				$query = $this->db->query('SELECT MONTH(`campaign_creation_date`) AS MONTH, COUNT(*) AS TOTALCAMPAIGN FROM vendor_campaigns WHERE MONTH(`campaign_creation_date`) BETWEEN MONTH(CURDATE() - INTERVAL 6 MONTH) AND MONTH(CURDATE())  AND campaign_status="Suspend" GROUP BY MONTH');
				if ($query->num_rows()>0) {
					$monthwisevalues="";
					foreach($query->result_array() as $row)
					{
						$monthwisevalues .=$row['TOTALCAMPAIGN'].",";
					}
					if ($query->num_rows()<6)
					{
						for($i=1;$i<=6-$query->num_rows();$i++)
						$monthwisevalues .="0".",";
					}

				}

				return rtrim($monthwisevalues,",");
			}

		}


		public function apikeyvalidation($app_token_key)
		{
			$query = $this->db->query('SELECT * FROM site_config WHERE app_token_key="'.$app_token_key.'"');
				
			$result=$query->row();
			if ($query->num_rows()>0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

}	