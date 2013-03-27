<?php
/*
* @table company_ins_rate
*/
class Company_ins_rate_model extends CI_Model {

	// table name
	private $table_name = 'company_ins_rate';

	// field name
	private $id = 'id';
	private $company_id = 'company_id';
	private $ins_rate_id = 'ins_rate_id';
	
	function __construct() {
		parent::__construct();
	}
	
}

/* End of file company_ins_rate_model.php */
/* Location: ./application/models/company_ins_rate_model.php */