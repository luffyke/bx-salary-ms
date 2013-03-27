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
	}
	
}

/* End of file insurance_rate_model.php */
/* Location: ./application/models/insurance_rate_model.php */