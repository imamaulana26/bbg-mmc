<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_dashboard extends CI_Model{
	function getApprove(){
		$cabang = $this->session->userdata('cabang');
		$akses = $this->session->userdata('akses_user');
		
		$this->db->select('*')->where(array('cabang' => $cabang, 'akses_user' => $akses));
		$query = $this->db->get('tbl_users');
		$result = $query->result();

		foreach($result as $res){
			$exp = explode("::", $res->jaringan);
			$jmlh = count($exp);

			$this->db->select('*')->from('tbl_input');
			for($i=0; $i<$jmlh; $i++){
				$this->db->or_where('kode_cabang', $exp[$i]);
				if($res->akses_user == 'Reviewer'){
					$this->db->where(array('approve' => 'Approved', 'tgl_cair' => '0000-00-00'));
				} else{
					$this->db->where(array('approve' => 'Approval', 'tgl_cair !=' => '0000-00-00'));
				}
			}
			$this->db->order_by('no_fos','desc');
			$result = $this->db->get();
			return $result;
		}
	}

	function getExisting(){
		$key = $this->session->userdata('nip');
		$akses = $this->session->userdata('akses_user');
		$this->db->select('jaringan')->where('nip_user', $key);
		$query = $this->db->get('tbl_users');
		$result = $query->result();

		foreach($result as $res){
			$exp = explode("::", $res->jaringan);
			$jmlh = count($exp);

			$this->db->select('*')->from('tbl_input');
			for($i=0; $i<$jmlh; $i++){
				$this->db->or_where('kode_cabang', $exp[$i]);
				if($akses == 'Reviewer'){
					$this->db->where(array('approve' => 'Revisi Reviewer', 'tgl_cair !=' => '0000-00-00'));
				} else{
					$this->db->where(array('approve' => 'Approved', 'status' => 'Gagal'));
				}
			}
			
			$tables = array('tbl_induk','tbl_anak','tbl_asset','tbl_jaminan','tbl_kontrak','tbl_link');
			foreach($tables as $tab){
				$this->db->join($tab, $tab.'.no_fos = tbl_input.no_fos', 'inner');
			}
			$this->db->join('tbl_koperasi', 'tbl_koperasi.cif_induk = tbl_input.cif_induk', 'inner');			
			$this->db->order_by('tbl_input.no_fos','desc');
			
			$result = $this->db->get();
			return $result;
		}
	}
	
	function distCIF(){
		$akses = $this->session->userdata('akses_user');
		$cabang = $this->session->userdata('cabang');

		if($akses == 'Maker'){		
			$this->db->select('*');
			$this->db->from('tbl_input');
			
			$tables = array('tbl_induk','tbl_anak','tbl_asset','tbl_jaminan','tbl_kontrak','tbl_link');
			foreach($tables as $tab){
				$this->db->join($tab, $tab.'.no_fos = tbl_input.no_fos', 'inner');
			}
			$this->db->where(array('kode_cabang' => $cabang, 'status' => ''))->or_where('status', 'Gagal');
			$this->db->order_by('tbl_input.no_fos','desc');
			$this->db->group_by('tbl_input.cif');
			
			$query = $this->db->get();
			return $query->num_rows();
		} else{
			$this->db->select('jaringan')->where('cabang', $cabang);
			$query = $this->db->get('tbl_users');
			$result = $query->result();

			foreach($result as $res){
				$exp = explode("::", $res->jaringan);
				$jmlh = count($exp);

				$this->db->select('*')->from('tbl_input');
				for($i=0; $i<$jmlh; $i++){
					$this->db->or_where('kode_cabang', $exp[$i]);
				}

				$tables = array('tbl_induk','tbl_anak','tbl_asset','tbl_jaminan','tbl_kontrak','tbl_link');
				foreach($tables as $tab){
					$this->db->join($tab, $tab.'.no_fos = tbl_input.no_fos', 'inner');
				}
				
				$this->db->join('tbl_koperasi', 'tbl_koperasi.cif_induk = tbl_input.cif_induk', 'inner');
				$this->db->order_by('tbl_input.no_fos','desc');
				$this->db->where('kode_cabang', $cabang)->group_by('tbl_input.cif');
				$result = $this->db->get();
				return $result->num_rows();
			}
		}
	}

	// <Approval>
	function getJaringan(){
		$cabang = $this->session->userdata('cabang');
		$this->db->select('jaringan')->where('cabang', $cabang);
		$query = $this->db->get('tbl_users');
		$result = $query->result();

		foreach($result as $res){
			$exp = explode("::", $res->jaringan);
			$jmlh = count($exp);

			$tables = array('tbl_induk','tbl_anak','tbl_asset','tbl_jaminan','tbl_kontrak','tbl_link');
			$this->db->select('*')->from('tbl_input');
			for($i=0; $i<$jmlh; $i++){
				$this->db->or_where('kode_cabang', $exp[$i]);
			}
			foreach($tables as $tab){
				$this->db->join($tab, $tab.'.no_fos = tbl_input.no_fos', 'inner');
			}
			$this->db->join('tbl_koperasi', 'tbl_koperasi.cif_induk = tbl_input.cif_induk', 'inner');
			$this->db->order_by('tbl_input.no_fos','desc');
			$result = $this->db->get();
			return $result;
		}
	}

	function getReject(){
		$key = $this->session->userdata('nip');
		$akses = $this->session->userdata('akses_user');
		
		if($akses == 'Maker'){
			$cabang = $this->session->userdata('cabang');
			$this->db->select('*');
			$this->db->from('tbl_input');
			
			$tables = array('tbl_induk','tbl_anak','tbl_asset','tbl_jaminan','tbl_kontrak','tbl_link');
			foreach($tables as $tab){
				$this->db->join($tab, $tab.'.no_fos = tbl_input.no_fos', 'inner');
			}
			$this->db->join('tbl_koperasi', 'tbl_koperasi.cif_induk = tbl_input.cif_induk', 'inner');
			$this->db->where(array('kode_cabang' => $cabang, 'approve' => 'Revisi Maker'));
			$this->db->order_by('tbl_input.no_fos','desc');
			$query = $this->db->get();
			return $query;
		} else{
			$this->db->select('*')->where(array('nip_user' => $key, 'akses_user' => $akses));
			$query = $this->db->get('tbl_users');
			$result = $query->result();

			foreach($result as $res){
				$exp = explode("::", $res->jaringan);
				$jmlh = count($exp);

				$this->db->select('*')->from('tbl_input');
				for($i=0; $i<$jmlh; $i++){
					$this->db->or_where('kode_cabang', $exp[$i]);
					$this->db->where('approve', 'Revisi');
				}
				$this->db->order_by('no_fos','desc');
				$result = $this->db->get();
				return $result;
			}
		}
	}
	// </Approval>

	// <Checker>
	function getChecker(){
		$key = $this->session->userdata('nip');
		$this->db->select('jaringan')->where('nip_user', $key);
		$query = $this->db->get('tbl_users');
		$result = $query->result();

		foreach($result as $res){
			$exp = explode("::", $res->jaringan);
			$jmlh = count($exp);

			$tables = array('tbl_induk','tbl_anak','tbl_asset','tbl_jaminan','tbl_kontrak','tbl_link');
			$list = array('', 'Pending');
			$this->db->select('*')->from('tbl_input');
			for($i=0; $i<$jmlh; $i++){
				$this->db->or_where('kode_cabang', $exp[$i])->where_in('approve', $list);
			}
			foreach($tables as $tab){
				$this->db->join($tab, $tab.'.no_fos = tbl_input.no_fos', 'inner');
			}
			$this->db->join('tbl_koperasi', 'tbl_koperasi.cif_induk = tbl_input.cif_induk', 'inner');
			$this->db->order_by('tbl_input.no_fos','desc');
			$result = $this->db->get();
			return $result;
		}
	}

	function getListApprove(){
		$key = $this->session->userdata('nip');
		$this->db->select('jaringan')->where('nip_user', $key);
		$query = $this->db->get('tbl_users');
		$result = $query->result();

		foreach($result as $res){
			$exp = explode("::", $res->jaringan);
			$jmlh = count($exp);

			$tables = array('tbl_induk','tbl_anak','tbl_asset','tbl_jaminan','tbl_kontrak','tbl_link');
			$this->db->select('*')->from('tbl_input');
			for($i=0; $i<$jmlh; $i++){
				$this->db->or_where('kode_cabang', $exp[$i]);
				$this->db->where(array('approve' => 'Approved', 'tgl_cair' => '0000-00-00'));
			}
			foreach($tables as $tab){
				$this->db->join($tab, $tab.'.no_fos = tbl_input.no_fos', 'inner');
			}
			$this->db->join('tbl_koperasi', 'tbl_koperasi.cif_induk = tbl_input.cif_induk', 'inner');
			$this->db->order_by('tbl_input.no_fos','desc');
			$result = $this->db->get();
			return $result;
		}
	}

	function getListReject(){
		$key = $this->session->userdata('nip');
		$this->db->select('jaringan')->where('nip_user', $key);
		$query = $this->db->get('tbl_users');
		$result = $query->result();

		foreach($result as $res){
			$exp = explode("::", $res->jaringan);
			$jmlh = count($exp);

			$tables = array('tbl_induk','tbl_anak','tbl_asset','tbl_jaminan','tbl_kontrak','tbl_link');
			$this->db->select('*')->from('tbl_input');
			for($i=0; $i<$jmlh; $i++){
				$this->db->or_where('kode_cabang', $exp[$i]);
				$this->db->where(array('approve' => 'Revisi', 'tgl_cair' => '0000-00-00'));
			}
			foreach($tables as $tab){
				$this->db->join($tab, $tab.'.no_fos = tbl_input.no_fos', 'inner');
			}
			$this->db->join('tbl_koperasi', 'tbl_koperasi.cif_induk = tbl_input.cif_induk', 'inner');
			$this->db->order_by('tbl_input.no_fos','desc');
			$result = $this->db->get();
			return $result;
		}
	}

	function getAll(){
		$key = $this->session->userdata('nip');
		$akses = $this->session->userdata('akses_user');
		
		if($akses == 'Maker'){
			$this->db->select('*')->from('tbl_input')->where('kode_cabang', $this->session->userdata('cabang'));
			$this->db->or_where('status', '');
			$tables = array('tbl_induk','tbl_anak','tbl_asset','tbl_jaminan','tbl_kontrak','tbl_link');
			foreach($tables as $tab){
				$this->db->join($tab, $tab.'.no_fos = tbl_input.no_fos', 'inner');
			}
			$this->db->join('tbl_koperasi', 'tbl_koperasi.cif_induk = tbl_input.cif_induk', 'inner');
			$this->db->join('tbl_users', 'tbl_users.nip_user = tbl_input.nip_user', 'inner');
			$this->db->order_by('tbl_input.no_fos','desc');
			$result = $this->db->get();
			return $result;
		} else{
			$this->db->select('jaringan')->where('nip_user', $key);
			$query = $this->db->get('tbl_users');
			$result = $query->result();

			foreach($result as $res){
				$exp = explode("::", $res->jaringan);
				$jmlh = count($exp);

				$tables = array('tbl_induk','tbl_anak','tbl_asset','tbl_jaminan','tbl_kontrak','tbl_link');
				$this->db->select('*')->from('tbl_input');
				for($i=0; $i<$jmlh; $i++){
					$this->db->or_where('kode_cabang', $exp[$i]);
				}
				foreach($tables as $tab){
					$this->db->join($tab, $tab.'.no_fos = tbl_input.no_fos', 'inner');
				}
				$this->db->join('tbl_koperasi', 'tbl_koperasi.cif_induk = tbl_input.cif_induk', 'inner');
				$this->db->order_by('tbl_input.no_fos','desc');
				$result = $this->db->get();
				return $result;
			}
		}
	}
}