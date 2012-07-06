<?php
/*
 * @table user_log
 */
class User_log_model extends CI_Model{
	
	// table name
	private $table_name = 'user_log';
	
	// table field name
	private $user_id = 'user_id';
	private $log_type = 'log_type';
	private $log_date = 'log_date';
	
	// log type
	public $login = 1;
	public $register = 2;
	public $edit_profile = 3;
	public $change_password = 4;
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}
	
	function insert_user_log($user_id, $log_type) {
		$user_log_data = array($this->user_id=>$user_id, $this->log_type=>$log_type, $this->log_date=>mdate('%Y-%m-%d %H:%i:%s', now()));
		$this->db->insert($this->table_name, $user_log_data);
	}
	
	function count_result_by_userid($user_id){
		$this->db->where($this->user_id, $user_id);
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}
	
	function find_by_page($user_id, $page_number, $limit=15, $offset=1){
		$result = $this->db->get_where($this->table_name, array($this->user_id=>$user_id), $limit, $offset);
		return $result;
	}
}

/* End of file user_log_model.php */
/* Location: ./application/models/user_log_model.php */