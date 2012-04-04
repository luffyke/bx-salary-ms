<?php
/*
 * @table user
 */
class User_model extends CI_Model{
	
	private $table_name = 'user';
	
	function __construct(){
		$this->load->database();
	}
	
	public function is_login_valid($username="", $password=""){
		$this->db->select('id');
		$result = $this->db->get_where($this->table_name,array('username'=>$username, 'password'=>$password));
		return $result->num_rows() > 0;
	}
	
	public function insert_user($username, $password, $permission){
		$user_data = array('username'=>$username, 'password'=>$password, 'permission'=>$permission);
		$this->db->insert($this->table_name, $user_data);
	}
}


/* End of file user_model.php */
/* Location: ./application/models/user_model.php */