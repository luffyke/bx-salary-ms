<?php
class Acl {

	private $CI;

	public function __construct() {
		$this->CI = & get_instance();
	}

	public function auth() {
		if (!preg_match('/^(?!user\/change_password)user.*$/', uri_string())) {
			$user_id = $this->CI->session->userdata('user_id');
			if(empty($user_id)) {
				redirect('/user');
				return;
			}
		}
	}
}

/* End of file acl.php */
/* Location: ./application/hooks/Acl.php */