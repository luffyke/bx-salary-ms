<?php
/*
* @table profile
*/
class Profile_model extends CI_Model {
	
	// table name
	private $table_name = 'user_profile';
	
	// table field name
	private $user_id = 'user_id';
	private $first_name = 'first_name';
	private $last_name = 'last_name';
	private $birthdate = 'birthdate';
	private $gender = 'gender';
	private $province = 'province';
	private $city = 'city';
	private $county = 'county';
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function get_profile_by_userid($user_id){
		$result = $this->db->get_where($this->table_name, array($this->user_id=>$user_id));
		return $result;
	}
	
	function insert_profile($user_id, $first_name, $last_name, $birthdate, $gender, $province, $city, $county){
		$profile_data = array($this->user_id=>$user_id, $this->first_name=>$first_name, $this->last_name=>$last_name, $this->birthdate=>$birthdate, $this->gender=>$gender, 
				$this->province=>$province, $this->city=>$city, $this->county=>$county);
		$this->db->insert($this->table_name, $profile_data);
	}
	
	function update_profile($user_id, $first_name, $last_name, $birthdate, $gender, $province, $city, $county){
		$profile_data = array($this->first_name=>$first_name, $this->last_name=>$last_name, $this->birthdate=>$birthdate, $this->gender=>$gender,
						$this->province=>$province, $this->city=>$city, $this->county=>$county);
		$this->db->where($this->user_id, $user_id);
		$this->db->update($this->table_name, $profile_data);
	}
	
}

/* End of file profile_model.php */
/* Location: ./application/models/profile_model.php */