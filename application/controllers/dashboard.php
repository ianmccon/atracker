<?php

class Dashboard extends Controller {

	function Dashboard()
	{
		parent::Controller();
		$this->User->auth_user();		

	}
	
	function index()
	{
		
		$user_id = $this->session->userdata('user_id');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['base'] = $this->User->get_user_base($user_id);
		$data['types'] = $this->Request->types();
		
		$this->load->view('dashboard/dashboard_view',$data);
	}

	
	function show_pending(){
		
		//get all pending requests for logged in approver and send to view
		
	}
	
}

/* End of file dashboard.php */
/* Location: ./system/application/controllers/dashboard.php */