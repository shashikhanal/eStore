<?php
class Login_model extends CI_Model {
	public function __construct () {
	}

	public function login_user($data) {
        $query = $this->db->get('users');
        return $query;
	}

	//match the username from session with the username in the database
	public function session($user_check) {
		$query = $this->db->query("select username from users where username='$user_check'");
		if ($query->num_rows() > 0) {
	        foreach ($query->result() as $row) {
                return $row->username;//returns username from the database
	        }
		}
		//return $return;
	}

	//this function stores the hashed random value in the database
	public function store_hash($hashed_random_no, $username) {
		$query = $this->db->query("update users set random='$hashed_random_no' where username='$username'");
	}

	//this function authenticates the user using hashed value from the database
	public function authentication() {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];
	    $random = $pieces[1];

		$query = $this->db->query("select random from users where username='$username'");
		if ($query->num_rows() > 0) {
	        foreach ($query->result() as $row) {
                $hash = $row->random;//returns hashed random from the database
	        }
		}

		if(password_verify($random, $hash)) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

}