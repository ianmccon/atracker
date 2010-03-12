<?php 

class Action extends Controller {

	function Action()
	{
		parent::Controller();
		$this->User->auth_user();		

	}
	
	function approve($id){
		$this->Request->approve($id);
		
		$user_id = $this->session->userdata('user_id');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['base'] = $this->User->get_user_base($user_id);
		$data['types'] = $this->Request->types();
		
		$this->load->view('dashboard/dashboard_view',$data);
	}
	
	function decline($id){
		$this->Request->decline($id);
		
		$user_id = $this->session->userdata('user_id');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['base'] = $this->User->get_user_base($user_id);
		$data['types'] = $this->Request->types();
		
		$this->load->view('dashboard/dashboard_view',$data);
	}
	
	function cancel($id){
		$this->Request->cancel($id);
		
		$user_id = $this->session->userdata('user_id');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['base'] = $this->User->get_user_base($user_id);
		$data['types'] = $this->Request->types();
		
		$this->load->view('dashboard/dashboard_view',$data);
	}
	
} 

?>
