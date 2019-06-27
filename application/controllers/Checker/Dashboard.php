<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$model = array('m_input','m_dashboard','m_login','m_list','m_checker','m_log','m_result');
		foreach($model as $mod){
			$this->load->model($mod);
		}
		$email = $this->session->userdata('email');
		if(empty($email)){
			$this->session->sess_destroy();
			redirect(ucfirst('login'));
		}
	}

	function index(){
		$isi = array(
			'konten' => 'checker/v_dashboard',
			'data' => $this->m_dashboard->getChecker(),
			'existing' => $this->m_dashboard->getExisting(),
			'getAll' => $this->m_dashboard->getAll(),
			'koperasi' => $this->m_list->getDistKop(),
			'cif' => $this->m_dashboard->getChecker(),
			'cabang' => $this->m_list->getAllCabang(),
			'lokasi' => $this->m_list->getAllLokasi(),
			'user' => $this->m_list->getAllUser(),
			'sektor' => $this->m_list->getAllSektor(),
			// 'list_approve' => $this->db->get_where('tbl_input', array('approve' => 'Approved', 'tgl_cair' => '0000-00-00')),
			'list_approve' => $this->m_dashboard->getListApprove(),
			// 'viewApprove' => $this->m_input->approve(),
			'viewReject' => $this->m_dashboard->getListReject(),
			'getSukses' => $this->m_result->getSukses(),
			'getGagal' => $this->m_result->getGagal()
		);
		
		ob_start('ob_gzhandler');
		$this->load->view('layout/_header');
		$this->load->view('layout/_content', $isi);
		$this->load->view('layout/_footer');
	}

	function updateDetail(){
		$key = input($this->input->post('no_fos'));
		$data = array(
			'tgl_cair' => input($this->input->post('tgl_cair'))
		);

		$query = $this->m_input->getData($key);
		if($query->num_rows() > 0){
			$this->m_input->updateData($key, $data);
			$this->session->set_flashdata('Info',"Berhasil input tanggal pencairan pada <b>\"".$data['tgl_cair']."\"</b> dengan No.MMC <b>\"".$key."\"</b>.");
			redirect(ucfirst('checker/dashboard'));
		}
	}

	function approve(){
		$key = input($this->input->post('no_fos'));
		$data = array(
			'konten' => 'checker/v_approval',
			// 'viewApprove' => $this->m_dashboard->getApprove(),
			'viewReject' => $this->m_dashboard->getListReject(),
			'existing' => $this->m_dashboard->getExisting(),
			'koperasi' => $this->m_list->getDistKop(),
			'cif' => $this->m_dashboard->getChecker(),
			'getAll' => $this->m_dashboard->getAll(),
			'cabang' => $this->m_list->getAllCabang(),
			'lokasi' => $this->m_list->getAllLokasi(),
			'sektor' => $this->m_list->getAllSektor(),
			'user' => $this->m_list->getAllUser(),
			// 'list_approve' => $this->db->get_where('tbl_input', array('approve' => 'Approved', 'tgl_cair' => '0000-00-00'))
			'list_approve' => $this->m_dashboard->getListApprove()
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_header');
		$this->load->view('layout/_content', $data);
		$this->load->view('layout/_footer');

		date_default_timezone_set('Asia/Jakarta');
		$log = array(
			'user_session' => $this->session->userdata('nip'),
			'nama_user' => $this->session->userdata('nama_user'),
			'akses_user' => $this->session->userdata('akses_user'),
			'ip_address' => $_SERVER['REMOTE_ADDR'],
			'browser' => $_SERVER['HTTP_USER_AGENT'],
			'url' => $_SERVER['REQUEST_URI'],
			'waktu' => date('Y-m-d H:i:s')
		);

		if(isset($_POST['approve'])){
			$data = array(
				'no_fos' => $key,
				'nip_checker' => $this->session->userdata('nip'),
				'approve' => input($this->input->post('approve'))
			);
			$log['detail'] = 'Berhasil merubah status '.$data['no_fos'].' menjadi '.$data['approve'];
		} else {
			$data = array(
				'no_fos' => $key,
				'nip_checker' => $this->session->userdata('nip'),
				'approve' => input($this->input->post('reject'))
			);
			$log['detail'] = 'Berhasil merubah status '.$data['no_fos'].' menjadi '.$data['approve'];
		}
		
		$query = $this->m_input->getData($key);
		if($query->num_rows() > 0){
			$this->m_input->updateData($key, $data);
			$this->m_log->insert($log);
			$this->session->set_flashdata('Info', "Status <b>\"".$key."\"</b> saat ini <b>\"".$data['approve']."\"</b>");
			redirect(ucfirst('checker/dashboard'));
		}
	}
}