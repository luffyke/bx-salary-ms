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
	}
	
}

/* End of file tax_basic_model.php */
/* Location: ./application/models/tax_basic_model.php */