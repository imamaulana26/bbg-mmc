<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Asset extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('layout/_header');
		$this->load->view('layout/_footer');
		$this->load->model('m_asset');
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function add_asset(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/add_asset',
			'data' => $this->m_asset->selectJoin($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function edit_asset(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/edit_asset',
			'data' => $this->m_asset->getJoin($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function simpanData(){
		$key = $this->input->post('nip');
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama_asset' => $this->input->post('nama_asset'),
			'ket_asset' => $this->input->post('ket_asset'),
			'fas_anak' => $this->input->post('fas_anak'),
			'harga_asset' => $this->input->post('harga'),
			'cif_pemasok' => $this->input->post('cif_pemasok'),
			'uang_muka' => str_replace(',', '', $this->input->post('uang_muka')),
			'jumlah_asset' => $this->input->post('jumlah_asset'),
			'total_asset' => str_replace(',', '', $this->input->post('total_asset'))
			
		);

		$query = $this->m_asset->getData($key);
		if($query->num_rows() > 0){
			$this->m_asset->updateData($key, $data);
			redirect('admin/kontrak/edit_kontrak/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil diubah!');
		} else{
			$this->m_asset->insertData($data);
			redirect('admin/kontrak/add_kontrak/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil disimpan!');
		}
	}
}