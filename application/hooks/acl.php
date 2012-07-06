<?php
class Acl {

	private $CI;

	public function __construct(){
		$this->CI = & get_instance();
	}

	public function auth(){
		if (!preg_match("/user.*/i", uri_string())) {
			$user_id = $this->CI->session->userdata('user_id');
			if(empty($user_id)) {
				redirect('/user/login');
				return;
			}
		}
	}
}
?>