<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Jaminan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('layout/_header');
		$this->load->view('layout/_footer');
		$model = array('m_input','m_link');
		foreach($model as $mod){
			$this->load->model($mod);
		}
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function add_jamainan(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/add_jamainan',
			'data' => $this->db->query("SELECT * FROM tbl_input WHERE nip='$key'")
		);

		$this->load->view('layout/_content', $isi);
	}

	public function edit_jaminan(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/edit_jaminan',
			'data' => $this->m_link->selectJoin($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function simpanData(){
		$key = $this->input->post('nip');
		$data = array(
			'nip' => $this->input->post('nip'),
			'kode_jaminan' => $this->input->post('kode_jaminan'),
			'tgl_cair' => $this->input->post('tgl_cair'),
			'tgl_jth_tempo' => $this->input->post('tgl_jth_tempo'),
			'frek_review' => $this->input->post('frek_review'),
			'cif' => $this->input->post('cif_nsbh'),
			'cif_induk' => $this->input->post('cif_induk')
		);

		$query = $this->m_link->getData($key);
		if($query->num_rows() > 0){
			$this->m_link->updateData($key, $data);
			redirect('admin/link/edit_link/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil diubah!');
		} else{
			$this->m_link->insertData($data);
			redirect('admin/link/add_link/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil disimpan!');
		}
	}
}