<?php
	class Wallet_Model extends CI_Model{
        function getTransactions()
        {
            $this->db->where('user_id',$this->session->userdata('user_id'));
			$result = $this->db->get('transactions');

			if ($result->num_rows()>=1) {
				return $result->result_array();
			}else{
				return false;
			}
        }

		function initiateWallet($userid,$amount,$walletfrom='W')
		{
			$data = array('user_id' => $userid, 
						  'payment_order_id' =>str_shuffle('ABCDUGHFDR').'-'.rand(111111,999999),
						  'payment_initiate_date' =>date('Y-m-d h:i'),
						  'payment_amount' =>$amount,
						  'payment_initiate_by'=>$userid,
						  'direct_from_campaign_or_wallet'=>$walletfrom
						  );

			if($this->db->insert('transactions', $data))
			{
				return $insert_id = $this->db->insert_id();
			}
			else
			return 0;
		}




		function completeWallet($rid,$responsetext,$status)
		{
			$data = array(
						  'payment_status' =>(($status==true)?'succeful':'failed'),
						  'payment_response_time' =>date('Y-m-d h:i'),
						  'payment_responses' =>((!empty($responsetext) && count($responsetext)>0)?$responsetext['razorpay_payment_id']:''),
						  );

						  $this->db->where('id', $rid);              
                        $this->db->update('transactions', $data);
		}
    }
?>