<?php
/*
 * @table work
 */
class Work_model extends CI_Model {
	
	// table name
	private $table_name = 'work';
	private $company_table_name = 'company';
	
	// table filed name
	private $id = 'id';
	private $user_id = 'user_id';
	private $company_id = 'company_id';
	private $staff_id = 'staff_id';
	private $team_name = 'team_name';
	private $sub_team_name = 'sub_team_name';
	private $from_date = 'from_date';
	private $to_date = 'to_date';
	private $work_nature = 'work_nature';
	private $is_current = 'is_current';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}
	
	/*
	 * @sql = select * from work where user_id = @user_id
	 */
	function get_by_userid($user_id) {
		$result = $this->db->get_where($this->table_name, array($this->user_id=>$user_id));
		return $result;
	}
	
	/*
	 * @sql = select work.id, work.staff_id, work.team_name, work.sub_team_name, work.from_date, work.to_date,
	 * 		work.work_nature, company.company_name from work left join company on work.company_id = company.id
	 * 		where work.user_id = @user_id and is_current = @is_current
	 */
	function get_by_userid_and_work_status($user_id, $is_current=0) {
		$this->db->select($this->table_name.'.'.$this->id);
		$this->db->select($this->staff_id);
		$this->db->select($this->team_name);
		$this->db->select($this->sub_team_name);
		$this->db->select($this->from_date);
		$this->db->select($this->to_date);
		$this->db->select($this->work_nature);
		$this->db->select($this->company_table_name.'.company_name');
		$this->db->from($this->table_name);
		$this->db->join($this->company_table_name, 'work.company_id = company.id', 'left');
		$this->db->where(array($this->table_name.'.'.$this->user_id=>$user_id, $this->is_current=>$is_current));
		$this->db->order_by($this->from_date, 'ASC');
		$result = $this->db->get();
		return $result;
	}
	
	/*
	 * @sql = insert into work(user_id, company_id, staff_id, team_name, sub_name, from_date, to_date, work_nature, is_current)
	 * 		value(@user_id, @company_id, @staff_id, @team_name, @sub_name, @from_date, @to_date, @work_nature, @is_current)
	 */
	function insert_work($user_id, $company_id, $staff_id, $team_name='', $sub_team_name='', $from_date, $to_date, 
			$work_nature, $is_current) {
		$work_data = array($this->user_id => $user_id, $this->company_id => $company_id, $this->staff_id => $staff_id, 
			$this->team_name => $team_name, $this->sub_team_name => $sub_team_name, $this->from_date => $from_date,
			$this->to_date => $to_date, $this->work_nature => $work_nature, $this->is_current => $is_current);
			
		$this->db->insert($this->table_name, $work_data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/*
	 * @sql = select * from work where id = @id
	 */
	function get_by_id($id) {
		$work_result = $this->db->get_where($this->table_name, array($this->id => $id));
		return $work_result;
	}

	function update_work($id, $company_id, $staff_id, $team_name, $sub_team_name, $from_date, $to_date, 
			$work_nature, $is_current) {
		$data = array($this->id => $id, $this->company_id => $company_id, $this->staff_id => $staff_id, 
			$this->team_name => $team_name, $this->sub_team_name => $sub_team_name, $this->from_date => $from_date,
			$this->to_date => $to_date, $this->work_nature => $work_nature, $this->is_current => $is_current);
		$this->db->where('id', $id);
		$this->db->update($this->table_name, $data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function get_work_by_company_id($company_id) {
		$result = $this->db->get_where($this->table_name, array($this->company_id=>$company_id));
		return $result;
	}

	function delete_work_by_company_id($company_id) {
		$this->db->delete($this->table_name, array('company_id' => $company_id));
		if ($this->db->affected_rows() >= 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function delete_work_by_id($id) {
		$this->db->delete($this->table_name, array('id' => $id));
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file work_model.php */
/* Location: ./application/models/work_model.php */