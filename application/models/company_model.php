<?php
/*
 * @table company
 */
class Company_model extends CI_Model {
	
	// table name
	private $table_name = 'company';
	private $work_table_name = 'work';
	
	// table field name
	private $id = 'id';
	private $user_id = 'user_id';
	private $company_name = 'company_name';
	private $abbr_name = 'abbr_name';
	private $company_type = 'company_type';
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/*
	 * @sql = select * from company where user_id = @user_id
	 */
	function get_by_userid($user_id){
		$result = $this->db->get_where($this->table_name, array($this->user_id=>$user_id));
		return $result;
	}
	
	/*
	 * @sql = insert into company(user_id, company_name, abbr_name, company_type) 
	 		value(@user_id, @company_name, @abbr_name, @company_type)
	 */
	function insert_company($user_id, $company_name='', $abbr_name='', $company_type=''){
		$company_data = array($this->user_id=>$user_id, $this->company_name=>$company_name, 
				$this->abbr_name=>$abbr_name, $this->company_type=>$company_type);
		$this->db->insert($this->table_name, $company_data);
		if($this->db->affected_rows() == 1){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	/*
	 * @sql = select company.id, company_name, abbr_name, company_type from company left join work on work.company_id = company.id
	 *		and work.user_id = company.user_id where company.user_id = @user_id and work.is_current = @is_current
	 */
	function get_by_userid_and_work_status($user_id, $is_current=0){
		$this->db->select($this->table_name.'.'.$this->id);
		$this->db->select($this->company_name);
		$this->db->select($this->abbr_name);
		$this->db->select($this->company_type);
		$this->db->from($this->table_name);
		$this->db->join($this->work_table_name, 
			$this->work_table_name.'.company_id = '.$this->table_name.'.id and '.$this->work_table_name.'.user_id = '.
			$this->table_name.'.user_id', 'left');
		$this->db->where(array($this->table_name.'.user_id' => $user_id, $this->work_table_name.'.is_current' => $is_current));
		$current_company_result = $this->db->get();
		return $current_company_result;
	}
	
	/*
	* @sql = select id, company_name, abbr_name, company_type from company where id = @id;
	*/
	function get_by_id($id) {
		$this->db->select($this->id);
		$this->db->select($this->company_name);
		$this->db->select($this->abbr_name);
		$this->db->select($this->company_type);
		$company_result = $this->db->get_where($this->table_name, array($this->id => $id));
		return $company_result;
	}
	
	/*
	 * @sql = update company set company_name=@company_name, abbr_name=@abbr_name, company_type=@company_type
	 *  	where id = @id 
	 */
	function update_company($id, $company_name, $abbr_name, $company_type) {
		$data = array('company_name' => $company_name, 'abbr_name' => $abbr_name, 'company_type' => $company_type);
		$this->db->where('id', $id);
		$this->db->update($this->table_name, $data);
		if($this->db->affected_rows() == 1){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file company_model.php */
/* Location: ./application/models/company_model.php */