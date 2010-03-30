<?php 

class Action extends Controller {

	function Action()
	{
		parent::Controller();
		$this->User->auth_user();		

	}
	
	function approve($id){
		$this->Request->approve($id);
		
	}
	
	function decline($id){
		$this->Request->decline($id);
		

	}
	
	function cancel($id){
		$this->Request->cancel($id);
		
	}
	
	function schedule_leave(){
		//Validation For the Request
		$user_id = $this->session->userdata('user_id');
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('start_date','Start Date','trim|required|xss_clean');
		$this->form_validation->set_rules('end_date','End Date','trim|required|xss_clean|callback_date_check');
		$this->form_validation->set_rules('request_type','Leave Type','trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if($this->form_validation->run() == false){
			$data['base'] = $this->User->get_user_base($user_id);
			$data['types'] = $this->Request->types();
			$this->load->view('dashboard/dashboard_view', $data);
		}else{
			$data['msg'] = $this->Request->add($user_id, $_POST['start_date'], $_POST['end_date'], $_POST['request_type']);
			$data['base'] = $this->User->get_user_base($user_id);
			$data['types'] = $this->Request->types();
			$this->load->view('dashboard/dashboard_view',$data);

		}
	}
	
	function date_check($date){
		$start_date = strtotime($_POST['start_date']);
		$end_date = strtotime($date);
		if($start_date > $end_date){
			$this->form_validation->set_message('date_check', 'Invalid End Date');
			return false;
		}else{
			return true;
		}
	}
	
} 

?>
