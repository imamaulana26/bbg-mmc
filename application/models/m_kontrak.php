<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_kontrak extends CI_Model{
	public function getAll(){
		$query = $this->db->get('tbl_kontrak');
		return $query->result();
	}

	public function getData($key){
		$this->db->where('nip', $key);
		$result = $this->db->get('tbl_kontrak');
		return $result;
	}

	public function updateData($key, $data){
		$this->db->where('nip', $key);
		$this->db->update('tbl_kontrak', $data);
	}

	public function insertData($data){
		$this->db->insert('tbl_kontrak', $data);
	}

	public function selectJoin($key){
		$this->db->select('*');
		$this->db->from('tbl_input');
		$this->db->join('tbl_induk', 'tbl_input.nip = tbl_induk.nip', 'inner');
		$this->db->join('tbl_kontrak', 'tbl_input.nip = tbl_kontrak.nip', 'inner');
		$this->db->where('tbl_input.nip', $key);
		$query = $this->db->get();
		return $query;
	}

	public function getJoin($key){
		$this->db->select('*');
		$this->db->from('tbl_input');
		$this->db->join('tbl_induk', 'tbl_input.nip = tbl_induk.nip', 'inner');
		$this->db->where('tbl_input.nip', $key);
		$query = $this->db->get();
		return $query;
	}
}