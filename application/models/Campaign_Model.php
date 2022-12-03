<?php
	class Campaign_Model extends CI_Model
    {
		public function __construct()
		{
			$this->load->database();
		}

        public function campiagn_add($step=1,$banner=NULL,$video_or_image_file=NULL)
        {

                        if($step==1)
                        {
                                if($this->input->post('step1_id')!='')
                                {
                                    $data = array('campaign_title' => $this->input->post('campaign_title'), 
                                            'campaign_description' => $this->input->post('campaign_description'),
                                            'campaign_media_type' => $this->input->post('campaign_media_type'),
                                            'link_of_product' => $this->input->post('link_of_product'),
                                            'ad_type' => $this->input->post('ad_type'),
                                            'campaign_created_by' => $this->session->userdata('user_id')
                                        );
                                        $this->db->where('id', $this->input->post('step1_id'));    
                                        $this->db->update('vendor_campaigns', $data);
                                            return $this->input->post('step1_id');
                                }
                                else
                                {
                                    $data = array('campaign_title' => $this->input->post('campaign_title'), 
                                            'campaign_description' => $this->input->post('campaign_description'),
                                            'campaign_media_type' => $this->input->post('campaign_media_type'),
                                            'link_of_product' => $this->input->post('link_of_product'),
                                            'ad_type' => $this->input->post('ad_type'),
                                            'campaign_creation_date' => date("Y-m-d H:i:s"),
                                            'campaign_created_by' => $this->session->userdata('user_id')
                                        );
                                        
                                            $this->db->insert('vendor_campaigns', $data);
                                            return $insert_id = $this->db->insert_id();
                                }
                            $this->db->insert('vendor_campaigns', $data);
                            return $insert_id = $this->db->insert_id();
                        }

                        if($step==2)
                        {

                            if($banner!=NULL && $video_or_image_file!=NULL)
                            {

                                $data = array('banner_add' => $banner, 
                                'video_or_image_file' => $video_or_image_file,
                                'campaign_pack' => $this->input->post('campaign_pack'),
                                'budget_per_day' => $this->input->post('budget_per_day'),
                                'total_campaign_value' =>($this->input->post('budget_per_day') *$this->input->post('campaign_pack'))
                              );
                              
                            }
                            else if($video_or_image_file!=NULL && $banner==NULL )
                            {
                                $data = array(
                                        'video_or_image_file' => $video_or_image_file,
                                        'campaign_pack' => $this->input->post('campaign_pack'),
                                        'budget_per_day' => $this->input->post('budget_per_day'),
                                        'total_campaign_value' =>($this->input->post('budget_per_day') *$this->input->post('campaign_pack'))
                                      );
                            }
                            else if($video_or_image_file==NULL && $banner!=NULL )
                            {
                                $data = array('banner_add' => $banner, 
                                        'campaign_pack' => $this->input->post('campaign_pack'),
                                        'budget_per_day' => $this->input->post('budget_per_day'),
                                        'total_campaign_value' =>($this->input->post('budget_per_day') *$this->input->post('campaign_pack'))
                                      );
                            }
                            else
                            {
                                $data = array(
                                        'campaign_pack' => $this->input->post('campaign_pack'),
                                        'budget_per_day' => $this->input->post('budget_per_day'),
                                        'total_campaign_value' =>($this->input->post('budget_per_day') *$this->input->post('campaign_pack'))
                                      );
                            }
                        
                        $this->db->where('id', $this->input->post('step2_id'));              
                        $this->db->update('vendor_campaigns', $data);

                        return $this->input->post('step2_id');


                        
                        }

                        if($step==3)
                        {
                            $data = array(
                                'transaction_code' => 'Deducted from wallet',
                                'campaign_id' => $this->input->post('step3_id'),
                                'user_id' => $this->session->userdata('user_id'),
                                'transaction_date' => date('Y-m-d h:i'), 
                                'transaction_response' => '', 
                                'transaction_status' => 'success', 
                                'response_update_time' => date('Y-m-d h:i'),
                                'transaction_amount' =>$this->input->post('total_campaign_value'),
                                'payment_gateway_or_wallet' =>'W',
                              );

                              if($this->input->post('step3_trans_id')=='')
                              {
                                $this->db->insert('campaign_transactions', $data);
                                return $insert_id = $this->db->insert_id();
                              }
                              else
                              {
                                $this->db->where('id',$this->input->post('step3_trans_id')); 
                                $this->db->update('campaign_transactions', $data);
                                return $this->input->post('step3_trans_id');
                              }
                                    
                           
                        }

                        if($step==4)
                        {
                            $data=array('campaign_status'=>'Pending');
                            $this->db->where('id', $this->input->post('step4_id'));              
                            $this->db->update('vendor_campaigns', $data);
    
                            return $this->input->post('step4_id');
                        }

        }

        public function updateStatus($id,$status)
        {
            $this->db->order_by('vendor_campaigns.id', 'DESC');
            $this->db->where('id',$id);
            $query =$this->db->get('vendor_campaigns');
            $campaign=$query->row_array(); 

                        if($status=='Approve')
                        {
                            $enddate=date('Y-m-d',strtotime('+'.$campaign['campaign_pack'].' days',strtotime(date('Y-m-d h:i'))));
                            $data=array(
                                'campaign_status'=>'Approved',
                                'campaign_approval_date'=>date('Y-m-d h:i'),
                                'campaign_approved_by'=>$this->session->userdata('user_id'),
                                'campaign_start_date'=>date('Y-m-d h:i'),
                                'campaign_end_date'=>($enddate),
                            );
                        }

                        if($status=='Suspend')
                        {
                            
                            $data=array(
                                'campaign_status'=>'Suspend',
                                'campaign_pause_date'=>date('Y-m-d h:i'),
                                'campaign_pause_by'=>$this->session->userdata('user_id')
                            );
                        }

                        if($status=='Pause')
                        {
                            
                            $data=array(
                                'campaign_status'=>'Paused',
                                'campaign_pause_date'=>date('Y-m-d h:i'),
                                'campaign_pause_by'=>$this->session->userdata('user_id')
                            );
                        }

                            
                            $this->db->where('id', $id);              
                            $this->db->update('vendor_campaigns', $data);
        }

        public function getcampiagns()
        {
          $this->db->order_by('vendor_campaigns.id', 'DESC');

            $query =$this->db->get('vendor_campaigns');
            return $query->result_array(); 
        }

        public function getcampiagnTransaction($campaignid)
        {
            $this->db->order_by('campaign_transactions.id', 'DESC');
            $this->db->where('campaign_id',$campaignid);
            $query =$this->db->get('campaign_transactions');
            return $query->row_array(); 
        }
        
        public function getcampiagn($campaignid)
        {
            $this->db->order_by('vendor_campaigns.id', 'DESC');
            $this->db->where('id',$campaignid);
            $query =$this->db->get('vendor_campaigns');
            return $query->row_array(); 
        }
    }
    ?>