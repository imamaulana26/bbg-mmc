<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_list extends CI_Model{
	public function getAllCabang(){
		$this->db->select('*')->group_by('kd_cabang');
		$query = $this->db->get('tbl_cabang');
		return $query->result();
	}

	public function getAllLokasi(){
		$query = $this->db->get('tbl_lokasi');
		return $query->result();
	}

	public function getAllSektor(){
		$this->db->select('*')->like('deskripsi', '(Konsumtif)');
		$query = $this->db->get('tbl_sektor');
		return $query->result();
	}

	public function getAllProduk(){
		$query = $this->db->get('tbl_produk');
		return $query->result();
	}

	public function getAllKop(){
		$query = $this->db->get('tbl_koperasi');
		return $query->result();
	}

	public function getAllUser(){
		$query = $this->db->get('tbl_users');
		return $query->result();
	}

	public function getDistKop(){
		$akses = $this->session->userdata('akses_user');
		$cabang = $this->session->userdata('cabang');
		$nip = $this->session->userdata('nip');

		if($akses == 'Maker'){
			$this->db->select('*')->where('cabang', $cabang)->group_by('cif_induk');
			$query = $this->db->get('tbl_koperasi');
			return $query;
		} else{
			$this->db->select('jaringan')->where('nip_user', $nip);
			$query = $this->db->get('tbl_users');
			$result = $query->result();

			foreach($result as $res){
				$exp = explode("::", $res->jaringan);
				$jmlh = count($exp);

				$this->db->select('*')->from('tbl_koperasi');
				for($i=0; $i<$jmlh; $i++){
					$this->db->or_where('cabang', $exp[$i]);
				}
				// $this->db->join('tbl_koperasi', 'tbl_koperasi.cif_induk = tbl_input.cif_induk', 'inner');
				$this->db->order_by('cabang','asc');
				$result = $this->db->get();
				return $result;
			}
		}
	}
}