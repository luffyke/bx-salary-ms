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
	}
	
}

/* End of file tax_calculation_model.php */
/* Location: ./application/models/tax_calculation_model.php */