<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->model('work_model');
	}
	
	function index() {
		$user_id = $this->session->userdata('user_id');

		// profile result
		$profile_result = $this->profile_model->get_profile_by_userid($user_id);

		// current work result
		$work_result = $this->work_model->get_by_userid_and_work_status($user_id, 1);

		$data['profile_result'] = $profile_result;
		$data['work_result'] = $work_result;
		$data['action'] = 'main';
		$this->load->view('main_view', $data);
	}
}


/* End of file main.php */
/* Location: ./application/controllers/main.php */