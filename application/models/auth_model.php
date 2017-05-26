<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
          // Call the Model constructor
          parent::__construct();
    }

     //get the username & password from tbl_usrs
    public function get_user($usr, $pwd)
    {
		$this->db->select('*');
		$this->db->from('utilizadores');
		$this->db->where("username", $usr);
		$this->db->where("status = 'active'");
		$this->db->limit(1);
		$result = $this->db->get();
		if ($result->num_rows() == 1) {
			$this->db->select('password');
			$this->db->from('utilizadores');
			$this->db->where("username", $usr);
			$this->db->limit(1);
			$result = $this->db->get()->row();
			$passwordHash = $result->password;
			if (password_verify($pwd, $passwordHash)) {
				return true;
			}
			else {
				return false;
			}
		} else {
			return false;
		}
    }

	// Store registration data in database
	public function new_user($firstName, $lastName, $email, $username, $password, $status)
	{
		$user = array
				(
					'firstname' => $firstName,
					'lastname' => $lastName,
					'email' => $email,
					'username' => $username,
					'password' => $password,
					'status' => $status
				);
		$this->db->insert('utilizadores', $user);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

}

?>