<?php
/*
* @table tax_calculation
*/
class Tax_calculation_model extends CI_Model {

	// table name
	private $table_name = 'tax_calculation';

	// field name
	private $id = 'id';
	private $sequence = 'sequence';
	private $from_amount = 'from_amount';
	private $to_amount = 'to_amount';
	private $rate = 'rate';
	private $deducting_amount = 'deducting_amount';

	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function get_by_id($id) {
		$result = $this->db->get_where($this->table_name, array($this->id=>$id));
		return $result;
	}
	
	function get_by_sequence($sequence) {
		$result = $this->db->get_where($this->table_name, array($this->sequence=>$sequence));
		return $result;
	}
	
	function insert_tax_calculation($sequence, $from_amount, $to_amount, $rate, $deducting_amount) {
		$tax_calculation_data = array($this->sequence=>$sequence, $this->from_amount=>$from_amount, $this->to_amount=>$to_amount, $this->rate=>$rate, $this->deducting_amount=>$deducting_amount);
		$this->db->insert($this->table_name, $tax_calculation_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function update_tax_calculation($id, $sequence, $from_amount, $to_amount, $rate, $deducting_amount) {
		$tax_calculation_data = array($this->sequence=>$sequence, $this->from_amount=>$from_amount, $this->to_amount=>$to_amount, $this->rate=>$rate, $this->deducting_amount=>$deducting_amount);
		$this->db->where($this->id, $id);
		$this->db->update($this->table_name, $tax_calculation_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function delete_tax_calculation($id) {
		$this->db->delete($this->table_name, array($this->id=>$id));
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
}

/* End of file tax_calculation_model.php */
/* Location: ./application/models/tax_calculation_model.php */
