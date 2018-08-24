<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index(){
		$this->load->view('v_login');
	}

	public function auth(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$valid = $this->m_login->getLogin($username, $password);

		if($valid){
			$sess['id'] = $valid['id'];
			$sess['username'] = $valid['username'];
			$sess['status'] = $valid['status'];
			$sess['akses_user'] = $valid['akses'];
			$sess['nama_user'] = $valid['nama'];
			$sess['logged_in'] = true;
			$stat = $valid['status'];

			if($stat == 0 && $sess['akses_user'] == 'Admin'){
				$this->session->set_userdata($sess);
				$status = 1;
				$this->m_login->update($sess['id'], $status);
				redirect('login/success');
			} elseif($stat == 0 && $sess['akses_user'] == 'User'){
				$this->session->set_userdata($sess);
				$status = 1;
				$this->m_login->update($sess['id'], $status);
				redirect('login/success');
			} else{
				$this->session->set_flashdata('msg','Akun sedang digunakan!');
				redirect('login');
			}
		}
	}

	public function success(){
		$cek = $this->session->userdata('logged_in');
		$akses = $this->session->userdata('akses_user');
		if($cek == true && $akses == 'Admin'){
			redirect('admin/dashboard');
		} elseif ($cek == true && $akses == 'User'){
			redirect('user/dashboard');
		}
	}
	
	public function logout(){
		$status = 0;
		$id = $this->session->userdata('id');
		if($this->m_login->update($id, $status)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}