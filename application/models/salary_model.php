<?php
/*
 * @table salary
 */
class Salary_model extends CI_Model {

	// table name
	private $table_name = 'salary';

	// field name
	private $id = 'id';
	private $user_id = 'user_id';
	private $company_id = 'company_id';
	private $year_month = 'year_month';
	private $basic = 'basic';
	private $allowance = 'allowance';
	private $income_tax = 'income_tax';
	private $non_income_tax = 'non_income_tax';
	private $credit_amount = 'credit_amount';
	private $insurance_indicator = 'insurance_indicator';
	private $payment_date = 'payment_date';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function get_by_userid($user_id) {
		$result = $this->db->get_where($this->table_name, array($this->user_id=>$user_id));
		return $result;
	}

	function get_by_userid_and_companyid($user_id, $company_id) {
		$result = $this->db->get_where($this->table_name, array($this->user_id=>$user_id, $this->company_id=$company_id));
		return $result;
	}

	function insert_salary($user_id, $company_id, $year_month, $basic, $allowance, $income_tax, $non_income_tax, $credit_amount,
		$insurance_indicator, $payment_date) {
		$salary_data = array($this->user_id=>$user_id, $this->company_id=>$company_id, $this->basic=>$basic, $this->allowance=>$allowance,
			$this->income_tax=>$income_tax, $this->non_income_tax=>$non_income_tax, $this->credit_amount=>$credit_amount,
			$this->insurance_indicator=>$insurance_indicator, $this->payment_date=>$payment_date);
		$this->db->insert($this->table_name, $salary_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function update_salary($id, $company_id, $year_month, $basic, $allowance, $income_tax, $non_income_tax, $credit_amount,
		$insurance_indicator, $payment_date) {
		$salary_data = array($this->company_id=>$company_id, $this->basic=>$basic, $this->allowance=>$allowance,
			$this->income_tax=>$income_tax, $this->non_income_tax=>$non_income_tax, $this->credit_amount=>$credit_amount,
			$this->insurance_indicator=>$insurance_indicator, $this->payment_date=>$payment_date);
		$this->db->where('id', $id);
		$this->db->update($this->table_name, $salary_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function delete_salary($id) {
		$this->db->delete($this->table_name, array($this->id=>$id));
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file salary_model.php */
/* Location: ./application/models/salary_model.php */