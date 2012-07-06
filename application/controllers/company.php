<?php
class Company extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('company_model');
		//$this->output->enable_profiler(TRUE);		// for testing
	}
	
	function index(){
		$user_id = $this->session->userdata('user_id');
		
		$history_company_result = $this->company_model->get_by_userid_and_work_status($user_id, 0);
		$data['history_company_result'] = $history_company_result;
		
		$current_company_result = $this->company_model->get_by_userid_and_work_status($user_id, 1);
		$data['current_company_result'] = $current_company_result;
		
		$data['action'] = 'company';
		$this->load->view('main_view', $data);
	}
	
	function add(){
		$user_id = $this->session->userdata('user_id');
		
		$company_result = $this->company_model->get_by_userid($user_id);
		if($company_result->num_rows() > 0){
			$has_company = true;
		} else {
			$has_company = false;
		}
		
		$data['has_company'] = $has_company;
		$data['action'] = 'add_company';
		$this->load->view('main_view', $data);
	}
	
	function add_action(){
		$company_name = $this->input->post('company_name');
		$abbr_name = $this->input->post('abbr_name');
		$company_type = $this->input->post('company_type');
		$user_id = $this->session->userdata('user_id');
		$is_add_successful = $this->company_model->insert_company($user_id, $company_name, $abbr_name, $company_type);
		if($is_add_successful){
			echo 1;
		} else {
			echo 0;
		}
	}
}

/* End of file company.php */
/* Location: ./application/controllers/company.php */