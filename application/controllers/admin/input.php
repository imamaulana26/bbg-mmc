<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Input extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('layout/_header');
		$this->load->view('layout/_footer');
		$model = array('m_input','m_cabang','m_lokasi');
		foreach($model as $mod){
			$this->load->model($mod);
		}
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function index(){
		$isi['data'] = $this->db->get('tbl_input');

		$this->load->view('admin/dashboard', $isi);
	}

	public function add_input(){
		$isi['cabang'] = $this->m_cabang->getAll();
		$isi['lokasi'] = $this->m_lokasi->getAll();
		$isi['kode'] = $this->m_input->autoNumber();
	
		$isi['konten'] = 'admin/add_input';
		$this->load->view('layout/_content', $isi);
	}

	public function edit_input(){
		$key = $this->uri->segment(4);
		$isi = array(
			'data' => $this->m_input->getData($key),
			'konten' => 'admin/edit_input',
			'cabang' => $this->m_cabang->getAll(),
			'lokasi' => $this->m_lokasi->getAll(),
		);

		$this->load->view('layout/_content', $isi);
	}

	public function delete(){
		$key = $this->uri->segment(4);
		$query = $this->m_input->getData($key);

		if($query->num_rows() > 0){
			$this->m_input->deleteData($key);
			redirect('admin/input');
		}
	}

	public function deleteAll(){
		$key = $this->uri->segment(4);
		$query = $this->m_input->getData($key);

		if($query->num_rows() > 0){
			$this->m_input->deleteAll($key);
			redirect('admin/input');
		}
	}

	// download file txt (success)
	/*public function download(){
		$this->load->helper('download');
		$key = $this->uri->segment(4);
		$query = $this->m_input->getData($key);

		foreach($query->result() as $list){
			$filename = "output-".$list->nip.".txt";
			$isi = "FILE-INPUT*".$list->nip."|".$list->nama_nsbh."|".$list->kd_cabang."|";
			force_download($filename, $isi);
		}
	}*/

	public function listCabang(){
		$id = $_POST['id'];
		$view = $this->m_cabang->data_chain($id);
		foreach($view as $row){
			echo "<p class='text-muted' style='margin-top: 8px'>".$row->nama_cabang."</p>";
		}
	}

	public function listLokasi(){
		$id = $_POST['id'];
		$view = $this->m_lokasi->data_chain($id);
		foreach($view as $row){
			echo "<p class='text-muted' style='margin-top: 8px'>".$row->deskripsi."</p>";
		}
	}

	public function simpanData(){
		$key = $this->input->post('nip');
		$data = array(
			'nip' => $this->input->post('nip'),
			'kode' => $this->input->post('kode'),
			'cif' => $this->input->post('cif'),
			'cif_induk' => $this->input->post('cif_induk'),
			'nama_nsbh' => $this->input->post('nama_nsbh'),
			'nama_kop' => $this->input->post('nama_kop'),
			'kode_cabang' => $this->input->post('kd_cabang'),
			'nom_fasilitas' => str_replace(',', '', $this->input->post('nominal')),
			'no_sp3' => $this->input->post('no_sp3'),
			'tgl_sp3' => $this->input->post('tgl_sp3'),
			'alamat' => $this->input->post('alamat'),
			'lokasi_proyek' => $this->input->post('lokasi'),
			'kode_pim' => $this->input->post('kode_pim'),
			'rek_nsbh' => $this->input->post('rek_nsbh'),
			'rek_pokok' => $this->input->post('rek_pokok'),
			'kode_ao' => $this->input->post('kode_ao'),
			'kode_fao' => $this->input->post('kode_fao'),
			'tenor' => $this->input->post('tenor'),
			'gaji_bln' => str_replace(',', '', $this->input->post('gaji')),
			'gaji_thn' => str_replace(',', '', $this->input->post('gaji_thn')),
			'tgl_jth_tempo' => $this->input->post('tgl_jth_tempo'),
			'frek_review' => $this->input->post('frek_review'),
			'tgl_angsuran' => $this->input->post('tgl_angsuran'),
			'tgl_expired' => $this->input->post('tgl_expire'),
			'no_pks' => $this->input->post('no_pks'),
			'tgl_pks' => $this->input->post('tgl_pks')
		);

		$query = $this->m_input->getData($key);
		if($query->num_rows() > 0){
			$this->m_input->updateData($key, $data);
			redirect('admin/induk/edit_induk/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil diubah!');
		} else{
			$this->m_input->insertData($data);
			redirect('admin/induk/add_induk/'.$data['nip']);
			// $this->session->set_flashdata('Info', 'Data '.$data['nip'].' dengan nama '.$data['nama_nsbh'].' berhasil disimpan!');
		}
	}
}