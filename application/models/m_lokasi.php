<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_lokasi extends CI_Model{
	public function getAll(){
		$query = $this->db->get('tbl_lokasi');
		return $query->result();
	}

	public function data_chain($id){
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_lokasi');
		return $query->result();
	}
}