<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_login extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getLogin($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('tbl_user');
		if($query->num_rows() == 1){
			return $query->row_array();
		} else{
			$this->session->set_flashdata('msg', 'Username atau Password salah!');
			redirect('login');
		}
	}

	function update($id, $status){
		$data['status'] = $status;
		$this->db->where('id', $id);
		$this->db->update('tbl_user', $data);
		return true;
	}

	/*function getLogin($username, $password){
		// $pass_md5 = md5($password);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		// $this->db->where('logged_in', $logged_in);
		$query = $this->db->get('tbl_user');
		return $query->result();
	}

	function getId($username, $password, $logged_in){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('logged_in', $logged_in);
		return $this->db->get('tbl_user')->result();
	}

	function updateStatus($data){
		$this->db->set('logged_in', $data['logged_in']);
		$this->db->where('username', $data['username']);
		$this->db->update('tbl_user');
	}*/
}