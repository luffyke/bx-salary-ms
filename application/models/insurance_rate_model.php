<?php
/*
* @table insurance_rate
*/
class Insurance_rate_model extends CI_Model {

	// table name
	private $table_name = 'insurance_rate';

	// field name
	private $id = 'id';
	private $insurance_type = 'insurance_type';
	private $target = 'target';
	private $rate = 'rate';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function get_by_id($id) {
		$result = $this->db->get_where($this->table_name, array($this->id=>$id));
		return $result;
	}
	
	function insert_insurance_rate($insurance_type, $target, $rate) {
		$insurance_rate_data = array($this->insurance_type=>$insurance_type, $this->target=>$target, $this->rate=>$rate);
		$this->db->insert($this->table_name, $insurance_rate_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function update_insurance_rate($id, $insurance_type, $target, $rate) {
		$insurance_rate_data = array($this->insurance_type=>$insurance_type, $this->target=>$target, $this->rate=>$rate);
		$this->db->where($this->id, $id);
		$this->db->update($this->table_name, $insurance_rate_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function delete_insurance_rate($id) {
		$this->db->delete($this->table_name, array($this->id=>$id));
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
}

/* End of file insurance_rate_model.php */
/* Location: ./application/models/insurance_rate_model.php */
