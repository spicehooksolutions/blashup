<?php
	class Campaign_Model extends CI_Model
    {
		public function __construct()
		{
			$this->load->database();
		}

        public function campiagn_add($step=1,$banner=NULL)
        {

            if($step==1)
            {
            $data = array('campaign_title' => $this->input->post('campaign_title'), 
							'campaign_description' => $this->input->post('campaign_description'),
							'campaign_media_type' => $this->input->post('campaign_media_type'),
							'link_of_product' => $this->input->post('link_of_product'),
							'ad_type' => $this->input->post('ad_type'),
							'campaign_creation_date' => date("Y-m-d H:i:s"),
                            'campaign_created_by' => $this->input->post('campaign_created_by')
						  );
			$this->db->insert('vendor_campaigns', $data);
            return $insert_id = $this->db->insert_id();
                        }

                        if($step==2)
                        {
                        $data = array('video_or_image_file' => $banner, 
                                        'campaign_pack' => $this->input->post('campaign_pack'),
                                        'budget_per_day' => $this->input->post('budget_per_day'),
                                        'total_campaign_value' =>($this->input->post('budget_per_day') *$this->input->post('campaign_pack')),
                                        'campaign_status' => 'Pending'
                                      );
                        $this->db->where('id', $this->input->post('step2_id'));              
                        $return=$this->db->update('vendor_campaigns', $data);


                        
                                    }

        }


        public function getcampiagns()
		{
			$this->db->order_by('vendor_campaigns.id', 'DESC');

			 	$query =$this->db->get('vendor_campaigns');
				return $query->result_array(); 
		}
    }
    ?>