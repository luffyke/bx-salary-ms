<?php
/*
* @table salary_history
*/
class Salary_history_model extends CI_Model {

	// table name
	private $table_name = 'salary_history';

	// field name
	private $id = 'id';
	private $company_id = 'company_id';
	private $basic = 'basic';
	private $allowance = 'allowance';
	private $change_date = 'change_date';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function get_by_id($id) {
		$result = $this->db->get_where($this->table_name, array($this->id=>$id));
		return $result;
	}
	
	function get_by_company_id($company_id) {
		$result = $this->db->get_where($this->table_name, array($this->company_id=>$company_id));
		return $result;
	}
	
	function insert_salary_history($company_id, $basic, $allowance, $change_date) {
		$salary_history_data = array($this->company_id=>$company_id, $this->allowance=>$allowance, $this->change_date=>$change_date);
		$this->db->insert($this->table_name, $salary_history_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function update_salary_history($id, $company_id, $basic, $allowance, $change_date) {
		$salary_history_data = array($this->company_id=>$company_id, $this->allowance=>$allowance, $this->change_date=>$change_date);
		$this->db->where($this->id, $id);
		$this->db->update($this->table_name, $salary_history_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function delete_salary_history($id) {
		$this->db->delete($this->table_name, array($this->id=>$id));
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
}

/* End of file salary_history_model.php */
/* Location: ./application/models/salary_history_model.php */
