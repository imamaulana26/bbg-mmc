<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Link extends CI_Controller{
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

	public function add_link(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/add_link',
			'data' => $this->m_input->getData($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function edit_link(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/edit_link',
			'data' => $this->m_link->selectJoin($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function simpanData(){
		$key = $this->input->post('nip');
		$data = array(
			'nip' => $this->input->post('nip'),
			'kode_jaminan' => $this->input->post('kode_jaminan'),
			'tgl_jth_tempo' => $this->input->post('tgl_jth_tempo'),
			'frek_review' => $this->input->post('frek_review'),
			'cif' => $this->input->post('cif_nsbh'),
			'cif_induk' => $this->input->post('cif_induk')
		);

		$query = $this->m_link->getData($key);
		if($query->num_rows() > 0){
			$this->m_link->updateData($key, $data);
			
			$this->db->set('tbl_input.tgl_jth_tempo', $data['tgl_jth_tempo']);
			$this->db->set('tbl_input.frek_review', $data['frek_review']);
			$this->db->set('tbl_input.cif', $data['cif']);
			$this->db->set('tbl_input.cif_induk', $data['cif_induk']);
			$this->db->update('tbl_input');
			$this->db->where('tbl_input.nip', $key);

			redirect('admin/jaminan/edit_jaminan/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil diubah!');
		} else{
			$this->m_link->insertData($data);
			redirect('admin/jaminan/add_jaminan/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil disimpan!');
		}
	}
}