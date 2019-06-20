<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_result extends CI_Model{
	function getAll(){
		$query = $this->db->get('tbl_result');
		return $query;
	}
	
	function getData($key){
		$this->db->where('no_fos', $key);
		$result = $this->db->get('tbl_result');
		return $result;
	}

	function getSukses(){
		// ambil data user
		$nip = $this->session->userdata('nip');
		$akses = $this->session->userdata('akses_user');
		$this->db->select('*')->where(array('nip_user' => $nip, 'akses_user' => $akses));
		$query = $this->db->get('tbl_users');
		$result = $query->result();
		
		foreach($result as $res){
			$exp = explode("::", $res->jaringan);
			$jmlh = count($exp);
			
			// sub-query
			$this->db->select('max(time_upload)')->from('tbl_result')->where(array('status'=>'Sukses'))->group_by('no_fos');
			$subQuery = $this->db->get_compiled_select();
			// main query
			$this->db->select('*')->from('tbl_result');
			if($akses == 'Maker'){
				$this->db->where("time_upload IN ($subQuery)", null, false)->where('cabang', $this->session->userdata('cabang'));
			} else {
				for($i=0; $i<$jmlh; $i++){
					$this->db->or_where('cabang', $exp[$i]);
					$this->db->where("time_upload IN ($subQuery)", null, false);
				}
			}
			$this->db->join('tbl_input', 'tbl_result.no_fos = tbl_input.no_fos', 'inner')->where('tbl_input.status', 'Sukses');

			/*$this->db->select('*')->from('tbl_input a')->join('tbl_result b', 'a.no_fos = b.no_fos', 'innner');
			if($akses == 'Maker'){
				$this->db->where(array('b.cabang' => $this->session->userdata('cabang'), 'a.status' => 'Sukses'));
			} else{
				for($i=0; $i<$jmlh; $i++){
					$this->db->or_where('b.cabang', $exp[$i]);
					$this->db->where('b.status', 'Sukses');
					// $this->db->where(array('b.status' => 'Sukses', 'timestampdiff(day, b.time_upload, curdate()) <' => 3));
				}
			}*/
			
			$result = $this->db->get();
			return $result;
		}
	}

	function getGagal(){
		$nip = $this->session->userdata('nip');
		$akses = $this->session->userdata('akses_user');
		$this->db->select('*')->where(array('nip_user' => $nip, 'akses_user' => $akses));
		$query = $this->db->get('tbl_users');
		$result = $query->result();

		foreach($result as $res){
			$exp = explode("::", $res->jaringan);
			$jmlh = count($exp);

			// sub-query
			// timestampdiff menghitung interval hari, jika lebih dari 3 hari maka data tidak di tampilkan
			$this->db->select('max(time_upload)')->from('tbl_result')->where(array('status'=>'Gagal','timestampdiff(day, time_upload, curdate()) <'=>3))->group_by('no_fos');
			$subQuery = $this->db->get_compiled_select();
			// main query
			$this->db->select('*')->from('tbl_result');
			if($akses == 'Maker'){
				$this->db->where("time_upload IN ($subQuery)", null, false)->where('cabang', $this->session->userdata('cabang'));
			} else {
				for($i=0; $i<$jmlh; $i++){
					$this->db->or_where('cabang', $exp[$i]);
					$this->db->where("time_upload IN ($subQuery)", null, false);
				}
			}
			$this->db->join('tbl_input', 'tbl_result.no_fos = tbl_input.no_fos', 'inner')->where('tbl_input.status', 'Gagal');

			/*$this->db->select('*')->from('tbl_input a')->join('tbl_result b', 'a.no_fos = b.no_fos', 'right');
			if($akses == 'Maker'){
				$this->db->where(array('b.cabang' => $this->session->userdata('cabang'), 'a.status' => 'Gagal'));
			} else{
				for($i=0; $i<$jmlh; $i++){
					$this->db->or_where('b.cabang', $exp[$i]);
					$this->db->where(array('b.status' => 'Gagal', 'timestampdiff(day, b.time_upload, curdate()) <' => 3));
				}
			}*/
						
			$result = $this->db->get();
			return $result;
		}
	}

	function getWhere($key){
		$this->db->where(array('no_fos'=>$key, 'status'=>'Gagal'));
		$result = $this->db->get('tbl_result');
		return $result;
	}

	function updateData($key, $data){
		$this->db->where('id', $key);
		$this->db->update('tbl_result', $data);
	}

	function insertData($data){
		$this->db->insert('tbl_result', $data);
	}
}