<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('profile_model');
		//$this->output->enable_profiler(TRUE);		// for testing
	}
	
	function index() {
		$data['action'] = 'main';
		$this->load->view('main_view', $data);
	}
}


/* End of file main.php */
/* Location: ./application/controllers/main.php */