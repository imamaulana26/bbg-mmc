<?php defined('BASEPATH') OR exit('No direct script access allowed');
class C_dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('c_login');
		}
	}

	public function index(){
		$this->load->view('user/_header');
		$this->load->view('user/v_dashboard');
		$this->load->view('user/_footer');
	}
}