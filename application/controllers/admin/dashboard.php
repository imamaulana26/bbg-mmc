<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function index(){
		$this->load->view('layout/_header');
		$this->load->view('admin/v_dashboard');
		$this->load->view('layout/_footer');
	}
}