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
	private $allowance 'allowance';
	private $change_date = 'change_date';
	
	function __construct() {
		parent::__construct();
	}
	
}

/* End of file salary_history_model.php */
/* Location: ./application/models/salary_history_model.php */