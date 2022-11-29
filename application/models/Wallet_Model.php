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
    }
?>