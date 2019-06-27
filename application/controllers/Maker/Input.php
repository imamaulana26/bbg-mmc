<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Input extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('layout/_header');
		$this->load->view('layout/_footer');
		$model = array('m_input','m_induk','m_log','m_list','m_user','m_result');
		foreach($model as $mod){
			$this->load->model($mod);
		}
		$email = $this->session->userdata('email');
		if(empty($email)){
			$this->session->sess_destroy();
			redirect(ucfirst('login'));
		}
	}

	public function index(){
		$this->add_input();
	}

	public function add_input(){
		$key = $this->session->userdata('nip');
		$isi = array(
			'userCab' => $this->m_user->getData($key),
			'cabang' => $this->m_list->getAllCabang(),
			'lokasi' => $this->m_list->getAllLokasi(),
			'koperasi' => $this->m_list->getDistKop(),
			'konten' => 'maker/add_input',
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_content', $isi);
	}

	public function edit_input(){
		$key = $this->uri->segment(4);
		$isi = array(
			'data' => $this->m_input->getData($key),
			'konten' => 'maker/edit_input',
			'koperasi' => $this->m_list->getDistKop(),
			'cabang' => $this->m_list->getAllCabang(),
			'lokasi' => $this->m_list->getAllLokasi(),
			'no_fas' => $this->m_result->getWhere($key)
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_content', $isi);
	}

	public function deleteAll(){
		$key = $this->uri->segment(4);
		$query = $this->m_input->getData($key);

		if($query->num_rows() > 0){
			$this->m_input->deleteAll($key);
			redirect(ucfirst('maker/dashboard'));
		}
	}

	public function listCabang(){
		$id = $_POST['id'];
		$view = $this->m_list->data_chainCabang($id);
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
		$key = input($this->input->post('no_fos'));
		$akses = $this->session->userdata('akses_user');
		$check = ''; $kode = "";
		if(!empty($_POST['checkbox'])){
			$check = 'Y';
		}
		/*if($akses == 'Maker'){
			$kode .= $_POST['kode'];
		} else{
			$kode .= $_POST['kode']+1;
		}*/
		if(!empty($_POST['tgl_nota']) && !empty($_POST['tgl_sp3']) && !empty($_POST['tgl_jth_tempo']) && !empty($_POST['tgl_pks']) && !empty($_POST['tgl_komite'])){
			$data = array(
				'no_fos' => input($this->input->post('no_fos')),
				// 'kode' => $kode,
				'nip_user' => $this->session->userdata('nip'),
				'nip_member_kop' => input($this->input->post('nip')),
				'cif' => input($this->input->post('cif')),
				'cif_induk' => input($this->input->post('cif_induk')),
				'nama_nsbh' => input($this->input->post('nama_nsbh')),
				'nama_kop' => input($this->input->post('nama_kop')),
				'kode_cabang' => trim($this->input->post('kd_cabang')),
				'nom_fasilitas' => str_replace(',', '', input($this->input->post('nominal'))),
				'no_sp3' => input($this->input->post('no_sp3')),
				'tgl_sp3' => input($this->input->post('tgl_sp3')),
				'alamat' => input($this->input->post('alamat')),
				'lokasi_proyek' => input($this->input->post('lokasi')),
				'kode_pim' => input($this->input->post('kode_pim')),
				'rek_nsbh' => input($this->input->post('rek_nsbh')),
				'rek_pokok' => input($this->input->post('rek_pokok')),
				'kode_ao' => input($this->input->post('kode_ao')),
				'kode_fao' => input($this->input->post('kode_fao')),
				'tenor' => input($this->input->post('tenor')),
				'gaji_bln' => str_replace(',', '', input($this->input->post('gaji'))),
				'gaji_thn' => str_replace(',', '', input($this->input->post('gaji_thn'))),
				'tgl_jth_tempo' => input($this->input->post('tgl_jth_tempo')),
				'frek_review' => input($this->input->post('frek_review')),
				'tgl_angsuran' => input($this->input->post('tgl_angsuran')),
				'tgl_expired' => input($this->input->post('tgl_expire')),
				'no_pks' => input($this->input->post('no_pks')),
				'tgl_pks' => input($this->input->post('tgl_pks')),
				'tgl_nota' => input($this->input->post('tgl_nota')),
				'no_skkp' => input($this->input->post('no_skkp')),
				'tgl_komite' => input($this->input->post('tgl_komite')),
				'check' => $check
			);
		} else{
			echo "<script type='text/javascript'>alert('Pengisian tidak valid');";
			echo "window.history.back();</script>";
		}

		date_default_timezone_set('Asia/Jakarta');
		$log = array(
			'user_session' => $this->session->userdata('nip'),
			'nama_user' => $this->session->userdata('nama_user'),
			'akses_user' => $this->session->userdata('akses_user'),
			'ip_address' => $_SERVER['REMOTE_ADDR'],
			'browser' => $_SERVER['HTTP_USER_AGENT'],
			'url' => $_SERVER['REQUEST_URI'],
			'waktu' => date('Y-m-d H:i:s')
		);

		$query = $this->m_input->getData($key);
		// $cif = $this->m_input->getCif(input($_POST['cif']));
		//if($query->num_rows() > 0 && $cif->num_rows() > 0){
		if($query->num_rows() > 0){
			$akses = $this->session->userdata('akses_user');
			if($akses == 'Reviewer'){
				$data['approve'] = 'Approved';
				$data['nip_reviewer'] = $this->session->userdata('nip');
			} /*else if($akses == 'Approval'){
				$data['approve'] = 'Approved';
				$data['nip_approval'] = $this->session->userdata('nip');
			} else {
				$data['approve'] = 'Revisi';
				$data['nip_user'] = $this->session->userdata('nip');
			}*/
			
			if($akses == 'Maker') $data['approve'] = 'Pending';

			foreach($query->result() as $qry){
				if($qry->status != 'Gagal'){
					$data['kode'] = $_POST['kode'];
				} else{
					$data['kode'] = $_POST['kode']+1;
				}
			}

			$this->m_input->updateData($key, $data);
			$log['detail'] = 'Berhasil mengubah data pada Form Input dengan No.MMC '.$data['no_fos'];
			$this->m_log->insert($log);
			
			$cek = $this->m_induk->getData($key);
			if($cek->num_rows() > 0){
				redirect(ucfirst('maker/induk/edit_induk/'.$data['no_fos']));
			} else{
				redirect(ucfirst('maker/induk/add_induk/'.$data['no_fos']));
			}
		} /*elseif($cif->num_rows() > 0){
			echo "<script type='text/javascript'>alert('Nomor CIF sudah terdaftar');";
			echo "window.history.back();</script>";
		}*/ else{	
			$this->m_input->insertData($data);
			$log['detail'] = 'Berhasil menambahkan data pada Form Input dengan No.MMC '.$data['no_fos'];
			$this->m_log->insert($log);
			redirect(ucfirst('maker/induk/add_induk/'.$data['no_fos']));
		}
	}
}