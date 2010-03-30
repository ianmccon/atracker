<?php 

class Request extends Model {

	// This model should handle all request database queries
	// Fetching days, posting days, handling approvals

	function Request(){
        parent::Model();
    }
	
	function approve($request_id){
		$data = array(
			'status' => 'approved',
			'date_reviewed' => mdate("%Y-%m-%d")
			);
		$this->db->where('id', $request_id);
		if($this->db->update('requests', $data)){
			return true;
		}else{
			return false;
		}
	}
	
	function decline($request_id){
		
		$data = array(
			'status' => 'declined',
			'date_reviewed' => mdate("%Y-%m-%d")
			);
		$this->db->where('id', $request_id);
		if($this->db->update('requests', $data)){
			return true;
		}else{
			return false;
		}
		
	}
	
	function cancel($request_id){
		if($this->db->delete('requests', array('id' => $request_id))){
			if($this->db->delete('request_types', array('request_id' => $request_id))){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	//adds requests 
	function add($user_id, $start, $end, $type_id){
		
		
		$start_date = strtotime($start);
		$end_date = strtotime($end);
		
		//now get the date details
		$start_date_array = getdate($start_date);	
		$end_date_array = getdate($end_date);
		
		//now lets get all the days and get ready to put it in the DB.
		for ($i=$start_date; $i <= $end_date; $i = round($i + 86400)) { 
			
			$day = getdate($i);
			
			if($day['weekday'] !== 'Saturday' && $day['weekday'] !== 'Sunday'){
				
				//print_r(unix_to_human($day[0]));
				
				$mysql_date = explode(" ", unix_to_human($day[0]));
				$request_data = array(
						'user_id' => $user_id,
						'date_requested' => mdate('%Y-%m-%d'),
						'date' => $mysql_date[0],
					 	'status' => 'pending'
					);
				
				//check if day exists
				if($this->check_exists($user_id, $mysql_date[0]) == true){
					@$msg['error'] .= "$mysql_date[0] has already been requested<br />";
				}else{
					$this->db->insert('requests', $request_data);
					$request = $this->db->get_where('requests', $request_data);
					foreach($request->result() as $row){

						$request_type = array(
							'request_id' => $row->id,
							'type_id' => $type_id
							);

						$this->db->insert('request_types', $request_type);
					}
					@$msg['success'] .= "$mysql_date[0] has been added and is pending review<br />";
				}
			}
		}
		
		return $msg;
	}
	
	function check_exists($user_id, $day){
		$check_data = array(
			'date' => $day,
			'user_id' => $user_id
			);
		
		$check = $this->db->get_where('requests', $check_data);
		if($check->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	
	function update(){
		
	}
	
	function get($what){
		
		$user_id = $this->session->userdata('user_id');
		
		$requests = $this->db->get_where('requests', array('user_id' => $user_id, 'status' => $what));
		
		foreach ($requests->result() as $key => $value) {
			
			$type_query = $this->db->get_where('request_types', array('request_id' => $value->id), 1);
			foreach($type_query->result() as $row){
				$value->type = $this->get_type($row->request_id);
			}
			
			
			$data[$key] = $value;
			
		}
		
		return @$data;
		
	}
	
	function types(){
		$types = $this->db->get('types');
		
		foreach($types->result() as $row){
			$data['types'][$row->id] = array(
				'id' => $row->id,
				'title' => $row->title,
				'description' => $row->description
			);
		}
		return $data;
	}
	
	function get_type($request_id){
		$query = $this->db->get_where('request_types', array('request_id' => $request_id));
		$result = $query->result();
	
		foreach($result as $row){
			$type_query = $this->db->get_where('types', array('id'=>$row->type_id));
			$type_result = $type_query->row();
			$data = $type_result->title;
		}
		return $data;
		
	}

} 

?>