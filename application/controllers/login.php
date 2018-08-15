<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	function index(){
		$this->load->view('v_login');
	}

	function auth(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$valid = $this->m_login->getLogin($username, $password);

		if($valid){
			$get_id = $this->m_login->getId($username, $password);
			foreach($get_id as $val){
				$id = $val->id;
				$username = $val->username;
				$nama = $val->nama;
				$akses = $val->akses;

				if($akses == 'Admin'){
					$data = array(
						'username' => $username,
						'nama_user' => $nama,
						'akses_user' => $akses,
						'logged_in' => true
					);
					$this->session->set_userdata($data);
					redirect('admin/dashboard');
				} else{
					$data = array(
						'username' => $username,
						'nama_user' => $nama,
						'akses_user' => $akses,
						'logged_in' => true
					);
					$this->session->set_userdata($data);
					redirect('user/dashboard');
				}
			}
		} else{
			$this->session->set_flashdata('msg', 'Username atau Password salah!');
			redirect('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}