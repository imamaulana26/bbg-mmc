<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_input extends CI_Model{
	public function getAll(){
		$query = $this->db->get('tbl_input');
		return $query->result();
	}

	public function autoNumber(){
		$query = $this->db->query("SELECT MAX(kode) as code FROM tbl_input");
		$row = $query->row_array();
		$max_kode = $row['code'];
		$id_kode = (int)substr($max_kode, 1, 4);
		$id = $id_kode+1;
		$autoNumber = sprintf($id);
		return $autoNumber;
	}

	public function getData($key){
		$this->db->where('nip', $key);
		$result = $this->db->get('tbl_input');
		return $result;
	}

	public function updateData($key, $data){
		$this->db->where('nip', $key);
		$this->db->update('tbl_input', $data);
	}

	public function insertData($data){
		$this->db->insert('tbl_input', $data);
	}

	public function deleteData($key){
		$this->db->where('nip', $key);
		$this->db->delete('tbl_input');
	}

	public function deleteAll($key){
		$tables = array('tbl_input','tbl_induk');
		$this->db->where('nip', $key);
		$this->db->delete($tables);
	}
}