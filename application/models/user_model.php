<?php
/*
 * @table user
*/
class User_model extends CI_Model{

	// table name
	private $table_name = 'user';
	
	// table field name
	private $id = 'id';
	private $username = 'username';
	private $email = 'email';
	private $password = 'password';
	private $create_date = 'create_date';

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}

	function get_by_username_and_password($username='', $password='') {
		$result = $this->db->get_where($this->table_name, array($this->username=>$username, $this->password=>$password));
		return $result;
	}
	
	function get_by_userid($user_id) {
		$result = $this->db->get_where($this->table_name, array($this->id=>$user_id));
		return $result;
	}

	function get_by_username($username='') {
		$result = $this->db->get_where($this->table_name, array($this->username=>$username));
		return $result;
	}

	function insert_user($username='', $email='', $password='') {
		$user_data = array($this->username=>$username, $this->email=>$email, $this->password=>$password, $this->create_date=>mdate('%Y-%m-%d %H:%i:%s', now()));
		$this->db->insert($this->table_name, $user_data);
	}
	
	function is_username_exist($username=''){
		$result = $this->get_by_username($username);
		return $result->num_rows() > 0;
	}
	
	function get_max_id(){
		
	}
	
	function update_email($user_id, $email){
		$this->db->where($this->id, $user_id);
		$this->db->update($this->table_name, array($this->email=>$email));
		return TRUE;
	}
	
	function update_password($user_id, $password){
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array($this->password=>$password));
		return TRUE;
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */