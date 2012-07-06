<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('profile_model');
		//$this->output->enable_profiler(TRUE);		// for testing
	}
	
	function index(){
		$is_keep_login = $this->input->cookie('keep_login');
		if($is_keep_login){
			$username = $this->input->cookie('username');
			$password = $this->input->cookie('password');
			$user_result = $this->user_model->get_by_username_and_password($username, $password);
			if($user_result->num_rows() > 0){
				$user_id = $user_result->row()->id;
				$this->load->view('main_view', $this->get_data($user_id));
			} else {
				$this->load->view('login_view');
			}
		} else {
			$user_id = $this->session->userdata('user_id');
			if($user_id != null){
				$this->load->view('main_view', $this->get_data($user_id));
			} else {
				$this->load->view('login_view');
			}
		}
	}
	
	private function get_data($user_id){
		// profile details
		$profile_result = $this->profile_model->get_profile_by_userid($user_id);
		$profile_row = $profile_result->row();
		if($profile_row != null) {
			$first_name = $profile_row->first_name;
			$last_name = $profile_row->last_name;
			$birthdate = $profile_row->birthdate;
			$gender = $profile_row->gender;
			$profile_data = array('first_name'=>$first_name, 'last_name'=>$last_name, 'birthdate'=>$birthdate, 'gender'=>$gender);
		} else {
			$profile_data = array('first_name'=>'', 'last_name'=>'', 'birthdate'=>'', 'gender'=>'', 'nickname'=>'');
		}
		// user details
		$user_result = $this->user_model->get_by_userid($user_id);
		$user_row = $user_result->row();
		$username = $user_row->username;
		$email = $user_row->email;
		$create_date = $user_row->create_date;
		$user_data = array('username'=>$username, 'email'=>$email, 'create_date'=>$create_date);
		// set data to view
		$data['action'] = 'main';
		$data['profile'] = $profile_data;
		$data['user'] = $user_data;
		return $data;
	}
}


/* End of file main.php */
/* Location: ./application/controllers/main.php */