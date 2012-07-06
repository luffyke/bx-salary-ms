<?php
/*
 * @table company
 */
class Company_model extends CI_Model {
	
	// table name
	private $table_name = 'company';
	private $work_table_name = 'work';
	
	// table field name
	private $user_id = 'user_id';
	private $company_name = 'company_name';
	private $abbr_name = 'abbr_name';
	private $company_type = 'company_type';
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function get_by_userid($user_id){
		$result = $this->db->get_where($this->table_name, array($this->user_id=>$user_id));
		return $result;
	}
	
	function insert_company($user_id, $company_name='', $abbr_name='', $company_type=''){
		$company_data = array($this->user_id=>$user_id, $this->company_name=>$company_name, 
				$this->abbr_name=>$abbr_name, $this->company_type=>$company_type);
		$this->db->insert($this->table_name, $company_data);
		if($this->db->affected_rows() == 1){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_by_userid_and_work_status($user_id, $is_current=0){
		$this->db->select($this->company_name);
		$this->db->select($this->abbr_name);
		$this->db->select($this->company_type);
		$this->db->from($this->table_name);
		$this->db->join($this->work_table_name, 
			$this->work_table_name.'.company_id = '.$this->table_name.'.id and '.$this->work_table_name.'.user_id = '.
			$this->table_name.'.user_id', 'left');
		$this->db->where(array($this->table_name.'.user_id' => $user_id, $this->work_table_name.'.is_current' => $is_current));
		$current_company_result = $this->db->get();
		return $current_company_result;
	}
}

/* End of file company_model.php */
/* Location: ./application/models/company_model.php */