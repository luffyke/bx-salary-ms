<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function index(){
		$this->load->view('login');
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->user_model->is_login_valid($username, $password)){
			$this->load->model('user_login_model');
			$this->load->view('main');
		} else{
			$this->load->view('login');
		}
	}
	
	public function install(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->user_model->insert_user($username, $password, 0);
		$this->load->view('login');
	}
}


/* End of file user.php */
/* Location: ./application/controllers/user.php */