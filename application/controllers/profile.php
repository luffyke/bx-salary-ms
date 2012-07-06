<?php
class Profile extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('profile_model');
		//$this->output->enable_profiler(TRUE);		// for testing
	}
	
	function index() {
		$user_id = $this->session->userdata('user_id');
		
		// profile details
		$profile_result = $this->profile_model->get_profile_by_userid($user_id);
		$profile_row = $profile_result->row();
		if($profile_row != null) {
			$first_name = $profile_row->first_name;
			$last_name = $profile_row->last_name;
			$birthdate = $profile_row->birthdate;
			$gender = $profile_row->gender;
			$province = $profile_row->province;
			$city = $profile_row->city;
			$county = $profile_row->county;
			$profile_data = array('first_name'=>$first_name, 'last_name'=>$last_name, 'birthdate'=>$birthdate, 'gender'=>$gender, 
					'province'=>$province, 'city'=>$city, 'county'=>$county);
		} else {
			$profile_data = array('first_name'=>'', 'last_name'=>'', 'birthdate'=>'', 'gender'=>'', 'province'=>'', 'city'=>'', 'county'=>'');
		}
		// user details
		$user_result = $this->user_model->get_by_userid($user_id);
		$user_row = $user_result->row();
		$username = $user_row->username;
		$email = $user_row->email;
		$create_date = $user_row->create_date;
		$user_data = array('username'=>$username, 'email'=>$email, 'create_date'=>$create_date);

		// set data to view
		$data['action'] = 'profile';
		$data['profile'] = $profile_data;
		$data['user'] = $user_data;
		$this->load->view('main_view' , $data);
	}
	
	function update_profile(){
		$user_id = $this->session->userdata('user_id');
		
		// begin transaction
		$this->db->trans_start();
		// user details
		$email = $this->input->post('email');
		$this->user_model->update_email($user_id, $email);
		// profile details
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$gender = $this->input->post('gender');
		$birthdate = $this->input->post('birthdate');
		$province = $this->input->post('province');
		$city = $this->input->post('city');
		$county = $this->input->post('county');
		$this->profile_model->update_profile($user_id, $first_name, $last_name, $birthdate, $gender, $province, $city, $county);

		// insert user edit profile log
		$this->load->model('user_log_model');
		$this->user_log_model->insert_user_log($user_id, 3);
		
		// complete transaction
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE){
			log_message('error', 'Update profile error');
			echo FALSE;
		} else {
			echo TRUE;
		}
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */