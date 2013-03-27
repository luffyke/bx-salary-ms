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
	}
	
}

/* End of file insurance_model.php */
/* Location: ./application/models/insurance_model.php */