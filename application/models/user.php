<?php

class User extends Model {

	function User(){
        parent::Model();
		
    }
	
	
	function auth_user(){
		//$this->load->helper('cookie');
		//$token = get_cookie('homecamp_auth_token');
		$homecamp = $this->load->database('homecamp', TRUE); 
		$token = '20b7a3ad768836580a498e70231b34ac42a52543';
		
		if($token){
			$user_data = $homecamp->get_where('users', "remember_token = '$token'");
			foreach ($user_data->row() as $key => $value) {
				$session_stuff[$key] = $value;
			}
			
			$user_id = $session_stuff['id'];
			$username = $this->username($session_stuff['login']);
			
			$approver = $this->approver($user_id);
			
			$approver_name = $this->username($approver['login']);
			
			$session_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'email' => $session_stuff['email'],
					'approver_id' => $approver['id'],
					'approver_name' => $approver_name
				);
			$this->session->set_userdata($session_data);
		}else{
			header('location: http://homecamp.reedref.com/remote_login');
		}	
		
	}
	
	function approver($user_id){
		$homecamp = $this->load->database('homecamp', TRUE);
		$get_approver = $this->db->get_where('approver_employees', "user_id = '$user_id'");
		$approver = $get_approver->row();
		$approver_id = $approver->approver_id;
		$approver_data = $homecamp->get_where('users', "id = '$approver_id'");

		foreach ($approver_data->row() as $key => $value) {
			$approver_stuff[$key] = $value;
		}
		
		return $approver_stuff;
	}

	function username($email){
		return preg_replace_callback(
		    '/(.+)@.+$/i',
		    create_function('$_', 'return ucwords(implode(\' \', explode(\'.\', $_[1])));'),
			$email);
	}
	
	function get_user_base($user_id){
		
		$data['days_left'] = $this->Pto->get_remaining();
		$data['pending_requests'] = $this->Request->get('pending');
		$data['approved_requests'] = $this->Request->get('approved');
		$data['declined_requests'] = $this->Request->get('declined');
		$data['my_approver'] = $this->session->userdata('approver_name');
		return $data;
	}
	
	function getusername($user_id){
		$homecamp = $this->load->database('homecamp', TRUE);
		$homecamp->select('login')->from('users')->where("id = '$user_id'")->limit(1);
		$query = $homecamp->get();
		$result = $query->result();
		foreach($result as $row){
			$username = $this->username($row->login);
		}
		
		return $username;
	}
	
}

?>