<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_log extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('user_log_model');
		// define per page record
		define('PER_PAGE_RECORD', 15);
	}
	
	function index(){
		$user_id = $this->session->userdata('user_id');
		$user_log_result = $this->user_log_model->find_by_page($user_id, 1);
		$count_record = $this->user_log_model->count_result_by_userid($user_id);
		
		$page_count = ceil($count_record / PER_PAGE_RECORD);
		
		$data['action'] = 'user_log';
		$data['page'] = 1;
		$data['page_count'] = $page_count;
		$data['user_log_result'] = $user_log_result;
		
		$this->load->view('main_view', $data);
	}
	
	function page($page_number){
		$user_id = $this->session->userdata('user_id');
		
		$count_record = $this->user_log_model->count_result_by_userid($user_id);
		$page_count = ceil($count_record / PER_PAGE_RECORD);
		if($page_number > $page_count){
			$page_number = $page_count;
		}
		// count offset
		if($page_number > 1){
			$offset = PER_PAGE_RECORD * ($page_number - 1) ;
		} else {
			$offset = 0;
		}
		
		$user_log_result = $this->user_log_model->find_by_page($user_id, PER_PAGE_RECORD, $offset);
		
		$data['action'] = 'user_log';
		$data['page'] = $page_number;
		$data['page_count'] = $page_count;
		$data['user_log_result'] = $user_log_result;
		
		$this->load->view('main_view', $data);
	}
}

/* End of file user_log.php */
/* Location: ./application/controllers/user_log.php */