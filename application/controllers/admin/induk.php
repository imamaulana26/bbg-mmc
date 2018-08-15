<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Induk extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('layout/_header');
		$this->load->view('layout/_footer');
		$model = array('m_input','m_induk','m_cabang','m_lokasi');
		foreach($model as $mod){
			$this->load->model($mod);
		}
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function add_induk(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/add_induk',
			'data' => $this->m_input->getData($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function edit_induk(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/edit_induk',
			'data' => $this->m_induk->selectJoin($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function simpanData(){
		$key = $this->input->post('nip');
		$data = array(
			'nip' => $this->input->post('nip'),
			'mata_uang' => $this->input->post('uang'),
			'tgl_nota' => $this->input->post('tgl_nota'),
			'nom_max_guna' => str_replace('.', '', $this->input->post('maks_guna')),
			// 'tgl_cair' => $this->input->post('tgl_cair'),
			'rating_int' => $this->input->post('rating_int'),
			'rating_eks' => $this->input->post('rating_eks'),
			'segmen' => $this->input->post('segmen')
		);

		$query = $this->m_induk->getData($key);
		if($query->num_rows() > 0){
			$this->m_induk->updateData($key, $data);
			redirect('admin/anak/edit_anak/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil diubah!');
		} else{
			$this->m_induk->insertData($data);
			redirect('admin/anak/add_anak/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil disimpan!');
		}
	}
}