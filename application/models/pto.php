<?php 

class Pto extends Model {

	function Pto(){
        parent::Model();
    }
	
	function get_remaining(){
		$user_id = $this->session->userdata('user_id');
		
		$requests = $this->db->get_where('requests', array('status' => 'approved', 'user_id' => $user_id));
		$num_requests = $requests->num_rows();
		
		$this->db->select('*')->from('user_pto')->join('pto','user_pto.pto_id = pto.id')->where('user_id', $user_id);
		$user_pto = $this->db->get();
		
		$user_pto_data = $user_pto->row();
		
		$purchased = $user_pto_data->pto_purchased;
		$alloted = $user_pto_data->pto_days;
		
		$pto_remaining = ceil(($purchased + $alloted) - $num_requests);
		
		return $pto_remaining;
	}
	
	function add_purchased($how_many){
		
	}
	
	function calculate(){
		
	}


} 

?>