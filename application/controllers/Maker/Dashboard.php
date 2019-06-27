<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$model = array('m_dashboard','m_login','m_list','m_result');
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
			'konten' => 'maker/v_dashboard',
			'data' => $this->m_dashboard->getAll(),
			'getAll' => $this->m_dashboard->getAll(),
			'koperasi' => $this->m_list->getDistKop(),
			'cif' => $this->m_dashboard->distCIF(),
			'cabang' => $this->m_list->getAllCabang(),
			'lokasi' => $this->m_list->getAllLokasi(),
			'sektor' => $this->m_list->getAllSektor(),
			'user' => $this->m_list->getAllUser(),
			'viewReject' => $this->m_dashboard->getReject(),
			'getSukses' => $this->m_result->getSukses(),
			'getGagal' => $this->m_result->getGagal()
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_header');
		$this->load->view('layout/_content', $isi);
		$this->load->view('layout/_footer');
	}
}