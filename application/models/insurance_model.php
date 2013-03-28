<?php
/*
* @table insurance
*/
class Insurance_model extends CI_Model {

	// table name
	private $table_name = 'insurance';

	// field name
	private $id = 'id';
	private $salary_id = 'salary_id';
	private $insurance_type = 'insurance_type';
	private $amount = 'amount';

	// insurance type
	public static $housing_found = 1;
	public static $pension_insurance = 2;
	public static $medical_insurance = 3;
	public static $unemployment_insurance = 4;
	public static $injury_insurance = 5;
	public static $maternity_insurance = 6;

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function get_by_salary_id($salary_id) {
		$result = $this->db->get_where($this->table_name, array($this->salary_id=>$salary_id));
		return $result;
	}
	
	function insert_insurance($salary_id, $insurance_type, $amount) {
		$insurance_data = array($this->salary_id=>$salary_id, $this->insurance_type=>$insurance_type, $this->amount=>$amount);
		$this->db->insert($this->table_name, $insurance_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function update_insurance($id, $salary_id, $insurance_type, $amount) {
		$insurance_data = array($this->salary_id=>$salary_id, $this->insurance_type=>$insurance_type, $this->amount=>$amount);
		$this->db->where($this->id, $id);
		$this->db->update($this->table_name, $insurance_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function delete_insurance($id) {
		$this->db->delete($this->table_name, array($this->id=>$id));
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file insurance_model.php */
/* Location: ./application/models/insurance_model.php */
