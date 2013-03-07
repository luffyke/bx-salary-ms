<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('company_model');
		$this->load->model('work_model');
		define('PER_PAGE_RECORD', 5);
		//$this->output->enable_profiler(TRUE);		// for testing
	}
	
	function index() {
		$this->load(null);
	}

	function load($data) {
		$user_id = $this->session->userdata('user_id');
		
		$history_company_result = $this->company_model->get_by_userid_and_work_status($user_id, 0);
		$data['history_company_result'] = $history_company_result;
		
		$current_company_result = $this->company_model->get_by_userid_and_work_status($user_id, 1);
		$data['current_company_result'] = $current_company_result;
		
		$is_current = FALSE;
		$data['is_current'] = $is_current;
		$is_history = FALSE;
		$data['is_history'] = $is_history;
		
		$data['action'] = 'company';
		$this->load->view('main_view', $data);
	}
	
	function current($page_number=1) {
		$user_id = $this->session->userdata('user_id');
	
		// get current company count
		$current_company_result_for_count = $this->company_model->get_by_userid_and_work_status($user_id, 1);
		$count_record = $current_company_result_for_count->num_rows();
	
		$page_count = ceil($count_record / PER_PAGE_RECORD);
		if ($page_number > $page_count) {
			$page_number = $page_count;
		}
		// count offset
		if ($page_number > 1) {
			$offset = PER_PAGE_RECORD * ($page_number - 1) ;
		} else {
			$offset = 0;
		}
	
		$data['page'] = $page_number;
		$data['page_count'] = $page_count;
	
		$current_company_result = $this->company_model->get_by_status_and_page($user_id, 1, PER_PAGE_RECORD, $offset);
		$data['current_company_result'] = $current_company_result;
	
		$is_current = TRUE;
		$data['is_current'] = $is_current;
	
		$data['action'] = 'company';
		$this->load->view('main_view', $data);
	}
	
	function history($page_number=1) {
		$user_id = $this->session->userdata('user_id');
		
		// get history company count
		$history_company_result_for_count = $this->company_model->get_by_userid_and_work_status($user_id, 0);
		$count_record = $history_company_result_for_count->num_rows();
		
		$page_count = ceil($count_record / PER_PAGE_RECORD);
		if ($page_number > $page_count) {
			$page_number = $page_count;
		}
		// count offset
		if ($page_number > 1) {
			$offset = PER_PAGE_RECORD * ($page_number - 1) ;
		} else {
			$offset = 0;
		}
		
		$data['page'] = $page_number;
		$data['page_count'] = $page_count;
		
		$history_company_result = $this->company_model->get_by_status_and_page($user_id, 0, PER_PAGE_RECORD, $offset);
		$data['history_company_result'] = $history_company_result;
		
		$is_history = TRUE;
		$data['is_history'] = $is_history;
		
		$data['action'] = 'company';
		$this->load->view('main_view', $data);
	}

	function add() {
		$user_id = $this->session->userdata('user_id');
		
		$company_result = $this->company_model->get_by_userid($user_id);
		if ($company_result->num_rows() > 0) {
			$has_company = true;
		} else {
			$has_company = false;
		}
		
		$data['has_company'] = $has_company;
		$data['action'] = 'add_company';
		$this->load->view('main_view', $data);
	}

	function edit($id) {
		$company_result = $this->company_model->get_by_id($id);
		
		$data['action'] = 'edit_company';
		$data['company_result'] = $company_result;
		$this->load->view('main_view', $data);
	}

	function delete($id) {
		// start transaction
		$this->db->trans_start();

		// delete company and related work
		$is_delete_work_succussful = $this->work_model->delete_work_by_company_id($id);
		$is_delete_company_succussful = $this->company_model->delete_company_by_id($id);

		// complete transaction
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE) {
			log_message('error', 'Delete company error');
			$data['delete_message'] = "删除失败";
		} else {
			if ($is_delete_work_succussful && $is_delete_company_succussful) {
				$data['delete_message'] = "删除成功";
			} else {
				$data['delete_message'] = "删除失败";
			}
		}
		$this->load($data);
	}
	
	function amend_action() {
		$action = $this->input->post('action');
		if ($action == 'edit_company') {
			// edit company
			$id = $this->input->post('id');
			$company_name = $this->input->post('company_name');
			$abbr_name = $this->input->post('abbr_name');
			$company_type = $this->input->post('company_type');
			
			// compare updated record with the original record in DB
			$company_result = $this->company_model->get_by_id($id);
			$row = $company_result->first_row();
			if ($company_name == $row->company_name && $abbr_name == $row->abbr_name && $company_type == $row->company_type) {
				echo 1;
				return;
			}
			
			$is_edit_successful = $this->company_model->update_company($id, $company_name, $abbr_name, $company_type);
			if ($is_edit_successful) {
				echo 1;
			} else {
				echo 0;
			}
		} else {
			// add company
			$company_name = $this->input->post('company_name');
			$abbr_name = $this->input->post('abbr_name');
			$company_type = $this->input->post('company_type');
			$user_id = $this->session->userdata('user_id');
			$is_add_successful = $this->company_model->insert_company($user_id, $company_name, $abbr_name, $company_type);
			if ($is_add_successful) {
				echo 1;
			} else {
				echo 0;
			}
		}
	}
}

/* End of file company.php */
/* Location: ./application/controllers/company.php */