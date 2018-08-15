<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Anak extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('layout/_header');
		$this->load->view('layout/_footer');
		$model = array('m_input','m_induk','m_anak','m_cabang','m_lokasi');
		foreach($model as $mod){
			$this->load->model($mod);
		}
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function add_anak(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/add_anak',
			'data' => $this->m_anak->selectJoin($key),
			'lokasi' => $this->m_lokasi->getAll()
		);

		$this->load->view('layout/_content', $isi);
	}

	public function edit_anak(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/edit_anak',
			'data' => $this->m_anak->selectJoin($key),
			'lokasi' => $this->m_lokasi->getAll()
		);

		$this->load->view('layout/_content', $isi);
	}

	public function simpanData(){
		$key = $this->input->post('nip');
		$data = array(
			'nip' => $this->input->post('nip'),
			'orientasi' => $this->input->post('orientasi'),
			'sifat_piutang' => $this->input->post('piutang'),
			'gol_piutang' => $this->input->post('gol_piutang'),
			'jenis_guna' => $this->input->post('jenis_guna'),
			'sektor_ekonomi' => $this->input->post('sektor_ekon'),
			'sifat_pinjam' => $this->input->post('sifat_pinjam'),
			'tipe_guna' => $this->input->post('tipe_guna'),
			'status_cair' => $this->input->post('status')
		);

		$query = $this->m_anak->getData($key);
		if($query->num_rows() > 0){
			$this->m_anak->updateData($key, $data);
			redirect('admin/link/edit_link/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil diubah!');
		} else{
			$this->m_anak->insertData($data);
			redirect('admin/link/add_link/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil disimpan!');
		}
	}
}