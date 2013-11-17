<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('encrypt');
	}
	
	function index() {
		$this->login();
	}
	
	function login() {
		if ($this->input->cookie('remember_me')) {
			$user_id = $this->session->userdata('user_id');
			if (empty($user_id)) {
				$this->load->view('login_view');
			} else {
				$data['action'] = 'main';
				$this->load->view('main_view', $data);
			}
		} else {
			$this->load->view('login_view');
		}
	}
	
	function login_action() {
		// get username and password from post data
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if (!$this->is_sha1($password)) {
			// sha1 the password for validation
			$password = $this->sha1_password($password);
		}
		// validation
		$user_result = $this->user_model->get_by_username_and_password($username, $password);
		if ($user_result->num_rows() > 0) {
			// log user login
			$user_id = $user_result->row()->id;
			//$this->load->model('user_log_model');
			//$this->user_log_model->insert_user_log($user_id, $this->user_log_model->login);
			
			// session user id and username
			$session_data = array('user_id' => $user_id, 'username' => $username);
			$this->session->set_userdata($session_data);
			
			// cookie the username and password
			$remember_me = $this->input->post('remember_me');
			if ($remember_me) {
				$expire_time = 60*60*24*365*2;
				//$this->input->set_cookie('username', $username, $expire_time);
				//$this->input->set_cookie('password', $password, $expire_time);
				$this->input->set_cookie('remember_me', TRUE, $expire_time);
			} else {
				// delete cookie
				delete_cookie('remember_me');
			}
			// go to main page
			//$this->load->view('main_view');
			redirect('/main');
		} else {
			// set data and go to login page
			$data['message'] = '用户名或者密码不正确';
			$data['username'] = $username;
			$this->load->view('login_view', $data);
			//redirect('/user/login');
		}
	}
	
	function register() {
		$this->load->view('register_view');
	}
	
	function register_action() {
		// get username and password from post data
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		// sha1 password
		$password = $this->sha1_password($password);
		
		// begin transaction
		$this->db->trans_start();
		
		// insert user
		$this->user_model->insert_user($username, $email, $password);
		
		// insert user profile
		$this->load->model('profile_model');
		$user_id = $this->user_model->get_max_id();
		$this->profile_model->insert_profile($user_id,'','','','','','','');

		// insert user register log
		$this->load->model('user_log_model');
		$this->user_log_model->insert_user_log($user_id, 2);
		
		// complete transaction
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE) {
			log_message('error', 'Register error');
		} else {
			// redirect to login page
			// $this->load->view('login_view');
			redirect('/user/login');
		}
	}
	
	function logout() {
		$session_data = array('user_id' => '', 'username' => '');
		$this->session->unset_userdata($session_data);
		//$this->load->view('login_view');
		redirect('/user/login');
	}
	
	function ajax_check_username() {
		$username = $this->input->post('username');
		$is_exist = $this->user_model->is_username_exist($username);
		echo $is_exist;
	}
	
	function ajax_check_password() {
		$old_password = $this->input->post('old_password');
		$user_id = $this->session->userdata('user_id');
		
		$user_result = $this->user_model->get_by_userid($user_id);
		$password = $user_result->row()->password;
		echo $this->sha1_password($old_password) === $password;
	}
	
	function change_password() {
		$data['action'] = 'change_password';
		$this->load->view('main_view', $data);
	}
	
	function change_password_action() {

		// begin transaction
		$this->db->trans_start();

		$password = $this->input->post('password');
		$password = $this->sha1_password($password);
		$user_id = $this->session->userdata('user_id');
		$this->user_model->update_password($user_id, $password);

		// insert user change password log
		$this->load->model('user_log_model');
		$this->user_log_model->insert_user_log($user_id, 4);

		// complete transaction
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE){
			log_message('error', 'Change password error');
			echo FALSE;
		} else {
			echo TRUE;
		}
	}
	
	function forget_password() {
		
	}
	
	function send_password_mail() {
		
	}
	
	private function sha1_password($password) {
		return $this->encrypt->sha1($password);
	}
	
	private function is_sha1($str) {
		return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
	}
}


/* End of file user.php */
/* Location: ./application/controllers/user.php */