<?php 

class My_team extends Controller{
	
	function My_team(){
		parent::Controller();
	}
	
	function index(){
		
		//$this->load->view('home_view');
		//This is just a place holder redirect.		
		$this->User->auth_user();
		$this->load->view('my_team_view');
		//header("location: ".base_url()."dashboard/");
	
	}
	

	
}

?>