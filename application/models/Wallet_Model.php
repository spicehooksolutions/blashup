<?php
	class Wallet_Model extends CI_Model{
        function getTransactions()
        {
            $this->db->where('user_id',$this->session->userdata('user_id'));
			$result = $this->db->get('transactions');

			if ($result->num_rows() == 1) {
				return $result->result_array();
			}else{
				return false;
			}
        }

		function initiateWallet($userid,$amount)
		{
			$data = array('user_id' => $userid, 
						  'payment_order_id' =>str_shuffle('ABCDUGHFDR').'-'.rand(111111,999999),
						  'payment_initiate_date' =>date('Y-m-d'),
						  'payment_amount' =>$amount,
						  'payment_initiate_by'=>$userid
						  );

			if($this->db->insert('transactions', $data))
			{
				return $insert_id = $this->db->insert_id();
			}
			else
			return 0;
		}
    }
?>