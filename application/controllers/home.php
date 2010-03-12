<?php 

class Home extends Controller{
	
	function Home(){
		parent::Controller();
	}
	
	function index(){
		
		//$this->load->view('home_view');
		//This is just a place holder redirect.		
		$this->User->auth_user();
		header("location: {$base_url}dashboard/");
	
	}
	

	
}

?>