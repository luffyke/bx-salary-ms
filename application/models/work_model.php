<?php
/*
 * @table work
 */
class Work_model extends CI_Model {
	
	// table name
	private $table_name = 'work';
	
	// table filed name
	private $user_id = 'user_id';
	private $company_id = 'company_id';
	private $staff_id = 'staff_id';
	private $team_name = 'team_name';
	private $sub_team_name = 'sub_team_name';
	private $from_date = 'from_date';
	private $to_date = 'to_date';
	private $work_nature = 'work_nature';
	private $is_current = 'is_current';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}
	
	function get_by_userid($user_id){
		$result = $this->db->get_where($this->table_name, array($this->user_id=>$user_id));
		return $result;
	}
	
	function get_by_userid_and_work_status($user_id, $is_current=0){
		$result = $this->db->get_where($this->table_name, array($this->user_id=>$user_id, $this->is_current=>$is_current));
		return $result;
	}
	
	function insert_work($user_id, $company_id, $staff_id, $team_name='', $sub_team_name='', $from_date, $to_date, 
			$work_nature, $is_current){
		$work_data = array($this->user_id => $user_id, $this->company_id => $company_id, $this->staff_id => $staff_id, 
			$this->team_name => $team_name, $this->sub_team_name => $sub_team_name, $this->from_date => $from_date,
			$this->to_date => $to_date, $this->work_nature => $work_nature, $this->is_current => $is_current);
			
		$this->db->insert($this->table_name, $work_data);
		if($this->db->affected_rows() == 1){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file work_model.php */
/* Location: ./application/models/work_model.php */