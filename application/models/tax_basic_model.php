<?php
/*
* @table tax_basic
*/
class Tax_basic_model extends CI_Model {

	// table name
	private $table_name = 'tax_basic';

	// field name
	private $sequence = 'sequence';
	private $basic_amount = 'basic_amount';
	private $effective_date = 'effective_date';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function get_by_sequence($sequence) {
		$result = $this->db->get_where($this->table_name, array($this->sequence=>$sequence));
		return $result;
	}
	
	function insert_tax_basic($sequence, $basic_amount, $effective_date) {
		$tax_basic_data = array($this->sequence=>$sequence, $this->basic_amount=>$basic_amount, $this->effective_date=>$effective_date);
		$this->db->insert($this->table_name, $tax_basic_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function update_tax_basic($sequence, $basic_amount, $effective_date) {
		$tax_basic_data = array($this->basic_amount=>$basic_amount, $this->effective_date=>$effective_date);
		$this->db->where($this->sequence, $sequence);
		$this->db->update($this->table_name, $tax_basic_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function delete_tax_basic($sequence) {
		$this->db->delete($this->table_name, array($this->sequence=>$sequence));
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file tax_basic_model.php */
/* Location: ./application/models/tax_basic_model.php */
