<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_login extends CI_Model{
	function getLogin($username, $password){
		// $pass_md5 = md5($password);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('tbl_user');
		return $query->result();
	}

	function getId($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('tbl_user')->result();
	}
}