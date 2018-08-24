<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kontrak extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('layout/_header');
		$this->load->view('layout/_footer');
		$model = array('m_input','m_induk','m_kontrak','m_cabang');
		foreach($model as $mod){
			$this->load->model($mod);
		}
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function add_kontrak(){
		$key = $this->uri->segment(4);
		$isi = array(
			// 'cabang' => $this->m_cabang->getAll(),
			'konten' => 'admin/add_kontrak',
			'data' => $this->m_kontrak->getJoin($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function edit_kontrak(){
		$key = $this->uri->segment(4);
		$isi = array(
			// 'cabang' => $this->m_cabang->getAll(),
			'konten' => 'admin/edit_kontrak',
			'data' => $this->m_kontrak->selectJoin($key)
		);

		$this->load->view('layout/_content', $isi);
	}

	public function simpanData(){
		$key = $this->input->post('nip');
		$data = array(
			'nip' => $this->input->post('nip'),
			'tipe_produk' => $this->input->post('tipe_produk'),
			'kode_unit_kerja' => $this->input->post('kode_unit'),
			'no_limit' => $this->input->post('no_limit'),
			'tipe_angsuran' => $this->input->post('tipe_angsuran'),
			'segmentasi' => $this->input->post('segmen_produk'),
			'rek_margin' => $this->input->post('rek_margin'),
			'wakalah' => $this->input->post('wakalah'),
			'tipe_margin' => $this->input->post('tipe_margin'),
			'margin' => $this->input->post('margin'),
			'teratribusi' => $this->input->post('teratribusi'),
			'kode_biaya' => $this->input->post('kode_biaya'),
			'nom_biaya' => str_replace(',', '', $this->input->post('nilai_biaya')),
			'total_biaya' => str_replace(',', '', $this->input->post('total_biaya')),
			'total_margin' => str_replace(',', '', $this->input->post('total_margin')),
			'rek_biaya' => $this->input->post('rek_biaya'),
			'status_piutang' => $this->input->post('stat_piutang'),
			'no_akad' => $this->input->post('no_akad'),
			'tgl_akad' => $this->input->post('tgl_akad'),
			'pengusul' => $this->input->post('pengusul'),
			'pemutus' => $this->input->post('pemutus')
		);

		$query = $this->m_kontrak->getData($key);
		if($query->num_rows() > 0){
			$this->m_kontrak->updateData($key, $data);
			$this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil diubah!');
			redirect('admin/input');
		} else{
			$this->m_kontrak->insertData($data);
			$this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil disimpan!');
			redirect('admin/input');
		}
	}
}