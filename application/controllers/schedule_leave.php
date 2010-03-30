<?php 

class Schedule_leave extends Controller{
	
	function Schedule_leave(){
		parent::Controller();
	}
	
	function index(){
		
		//$this->load->view('home_view');
		//This is just a place holder redirect.
		$user_id = $this->session->userdata('user_id');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['base'] = $this->User->get_user_base($user_id);
		$data['types'] = $this->Request->types();
		
		$this->User->auth_user();
		$this->load->view('schedule_leave_view', $data);
	
	}
	

	
}

?>