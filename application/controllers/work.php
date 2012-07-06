<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Work extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('work_model');
		$this->load->model('company_model');
	}
	
	function index(){
		$user_id = $this->session->userdata('user_id');
		
		$work_result = $this->work_model->get_by_userid($user_id);
		if($work_result->num_rows() > 0) {
			$data['has_work'] = true;
			$current_work_result = $this->work_model->get_by_userid_and_work_status($user_id, 1);
			$history_work_result = $this->work_model->get_by_userid_and_work_status($user_id, 0);
			$data['current_work_result'] = $current_work_result;
			$data['history_work_result'] = $history_work_result;
		} else {
			$data['has_work'] = false;
		}
		
		$data['action'] = "work";
		$this->load->view('main_view', $data);
	}
	
	function add(){
		$user_id = $this->session->userdata('user_id');
		
		$company_result = $this->company_model->get_by_userid($user_id);
		if($company_result->num_rows() > 0) {
			$data['action'] = "add_work";
			$data['company_result'] = $company_result;
			$data['has_company'] = true;
		} else {
			$data['action'] = "add_company";
			$data['has_company'] = false;
		}
		
		$this->load->view('main_view', $data);
	}
	
	function add_action(){
		$company_id = $this->input->post('company_id');
		$staff_id = $this->input->post('staff_id');
		$team_name = $this->input->post('team_name');
		$sub_team_name = $this->input->post('sub_team_name');
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		$work_nature = $this->input->post('work_nature');
		$is_current = $this->input->post('is_current');
		
		$user_id = $this->session->userdata('user_id');
		
		$is_add_successful = $this->work_model->insert_work($user_id, $company_id, $staff_id, $team_name, $sub_team_name, $from_date, $to_date, $work_nature, $is_current);
		if($is_add_successful){
			echo 1;
		} else {
			echo 0;
		}
	}
}

/* End of file work.php */
/* Location: ./application/controllers/work.php */