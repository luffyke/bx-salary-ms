<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('work_model');
		$this->load->model('company_model');
	}
	
	function index() {
		$this->load(null);
	}

	function load($data) {
		$user_id = $this->session->userdata('user_id');
		
		$work_result = $this->work_model->get_by_userid($user_id);
		if ($work_result->num_rows() > 0) {
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
	
	function add() {
		$user_id = $this->session->userdata('user_id');
		
		$company_result = $this->company_model->get_by_userid($user_id);
		if ($company_result->num_rows() > 0) {
			$data['action'] = "add_work";
			$data['company_result'] = $company_result;
			$data['has_company'] = true;
		} else {
			$data['action'] = "add_company";
			$data['has_company'] = false;
		}
		
		$this->load->view('main_view', $data);
	}

	function edit($id) {
		$user_id = $this->session->userdata('user_id');
		
		$company_result = $this->company_model->get_by_userid($user_id);
		$work_result = $this->work_model->get_by_id($id);
		
		$data['action'] = 'edit_work';
		$data['company_result'] = $company_result;
		$data['work_result'] = $work_result;
		$this->load->view('main_view', $data);
	}

	function delete($id) {
		$is_delete_successful = $this->work_model->delete_work_by_id($id);
		if ($is_delete_successful) {
			$data['delete_message'] = "删除成功";
		} else {
			$data['delete_message'] = "删除失败";
		}
		$this->load($data);
	}

	function amend_action() {
		$action = $this->input->post('action');
		if ($action == 'edit_work') {
			// edit work
			$user_id = $this->session->userdata('user_id');
			$work_id = $this->input->post('work_id');
			$company_id = $this->input->post('company_id');
			$staff_id = $this->input->post('staff_id');
			$team_name = $this->input->post('team_name');
			$sub_team_name = $this->input->post('sub_team_name');
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$work_nature = $this->input->post('work_nature');
			$is_current = $this->input->post('is_current');

			$work_result = $this->work_model->get_by_id($work_id);
			$work_row = $work_result->first_row();

			// compare updated record with the original record in DB
			if ($company_id == $work_row->company_id && $staff_id == $work_row->staff_id && $team_name == $work_row->team_name
				&& $sub_team_name == $work_row->sub_team_name && $from_date == $work_row->from_date && $to_date == $work_row->to_date
				&& $work_nature == $work_row->work_nature && $is_current == $work_row->is_current) {
				echo 1;
				return;
			}

			$is_edit_successful = $this->work_model->update_work($work_id, $company_id, $staff_id, $team_name, $sub_team_name, 
				$from_date, $to_date, $work_nature, $is_current);
			if ($is_edit_successful) {
				echo 1;
			} else {
				echo 0;
			}
		} else {
			// add work
			$company_id = $this->input->post('company_id');
			$staff_id = $this->input->post('staff_id');
			$team_name = $this->input->post('team_name');
			$sub_team_name = $this->input->post('sub_team_name');
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$work_nature = $this->input->post('work_nature');
			$is_current = $this->input->post('is_current');
			
			$user_id = $this->session->userdata('user_id');
			
			$is_add_successful = $this->work_model->insert_work($user_id, $company_id, $staff_id, $team_name, 
				$sub_team_name, $from_date, $to_date, $work_nature, $is_current);
			if ($is_add_successful) {
				echo 1;
			} else {
				echo 0;
			}
		}
	}
}

/* End of file work.php */
/* Location: ./application/controllers/work.php */