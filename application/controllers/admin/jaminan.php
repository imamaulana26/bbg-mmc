<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Jaminan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('layout/_header');
		$this->load->view('layout/_footer');
		$this->load->model('m_jaminan');
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function add_jaminan(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/add_jaminan',
			'data' => $this->m_jaminan->selectJoin($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function edit_jaminan(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/edit_jaminan',
			'data' => $this->m_jaminan->getJoin($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function simpanData(){
		$key = $this->input->post('nip');
		$data = array(
			'nip' => $this->input->post('nip'),
			'tipe_jaminan' => $this->input->post('tipe_jaminan'),
			'deskripsi' => $this->input->post('deskripsi'),
			'negara' => $this->input->post('negara'),
			'njop' => str_replace(',', '', $this->input->post('njop'))
		);

		$query = $this->m_jaminan->getData($key);
		if($query->num_rows() > 0){
			$this->m_jaminan->updateData($key, $data);
			redirect('admin/asset/edit_asset/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil diubah!');
		} else{
			$this->m_jaminan->insertData($data);
			redirect('admin/asset/add_asset/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil disimpan!');
		}
	}
}