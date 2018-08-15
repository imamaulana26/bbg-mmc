<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_cabang extends CI_Model{
	public function getAll(){
		$query = $this->db->get('tbl_cabang');
		return $query->result();
	}

	public function data_chain($id){
		// $query = $this->db->query("SELECT * FROM tbl_cabang WHERE kd_cabang='$id'");
		$this->db->where('kd_cabang', $id);
		$query = $this->db->get('tbl_cabang');
		return $query->result();
	}
}