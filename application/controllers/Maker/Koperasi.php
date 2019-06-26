<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Koperasi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('layout/_header');
		$this->load->view('layout/_footer');
		$model = array('m_koperasi','m_list','m_log');
		foreach($model as $mod){
			$this->load->model($mod);
		}
		$email = $this->session->userdata('email');
		if(empty($email)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function index(){
		$isi = array(
			'konten' => 'maker/v_koperasi',
			'data' => $this->m_list->getDistKop()
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_content', $isi);
	}

	public function add_koperasi(){
		$isi = array(
			'konten' => 'maker/add_koperasi'
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_content', $isi);
	}

	public function edit_koperasi(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'maker/edit_koperasi',
			'data' => $this->m_koperasi->getData($key)
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_content', $isi);
	}

	public function simpan(){
		$key = input($this->input->post('cif_induk'));
		// $rate_bank = $this->input->post('rate_bank');
		// $tenor_bank = $this->input->post('tenor_bank');
		if(is_array($this->input->post('rate_bank')) && is_array($this->input->post('tenor_bank'))){
			$rate_bank = implode("::", $this->input->post('rate_bank'));
			$tenor_bank = implode("::", $this->input->post('tenor_bank'));
		}
		$query = $this->m_koperasi->getData($key);

		$data = array(
			'cif_induk' => $key,
			'nip_user' => $this->session->userdata('nip'),
			'cabang' => $this->session->userdata('cabang'),
			'nama_kop' => input($this->input->post('nama_kop')),
			'npwp' => input($this->input->post('npwp')),
			'nominal' => str_replace(',', '', input($this->input->post('nominal'))),
			'rate_bank' => $rate_bank,
			'tenor_bank' => $tenor_bank,
			'rek_agent' => input($this->input->post('rek_agent')),
			'mata_uang' => input($this->input->post('mata_uang'))
		);

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

		if($query->num_rows() > 0){ ?>
			<script type="text/javascript">
				alert('Data koperasi sudah ada!');
				window.history.go(-1);
			</script>
		<?php } else{
			$this->m_koperasi->insertData($data);
			$log['detail'] = 'Berhasil menambahkan data pada Pendaftaran Koperasi dengan CIF '.$key;
			$this->m_log->insert($log);
			$this->session->set_flashdata('Info', "Data koperasi dengan CIF <b>\"".$key."\"</b> a/n <b>\"".$data['nama_kop']."\"</b> berhasil disimpan!");
			redirect('maker/koperasi');
		}
	}

	public function update(){
		$key = input($this->input->post('cif_induk'));
		$rate_bank = preg_replace('/[^0-9.]/', '', $this->input->post('rate_bank'));
		$tenor_bank = preg_replace('/[^0-9]/', '', $this->input->post('tenor_bank'));
		if(is_array(preg_replace('/[^0-9.]/', '', $this->input->post('rate_bank'))) && is_array(preg_replace('/[^0-9]/', '', $this->input->post('tenor_bank')))){
			$rate_bank = implode("::", preg_replace('/[^0-9.]/', '', $this->input->post('rate_bank')));
			$tenor_bank = implode("::", preg_replace('/[^0-9]/', '', $this->input->post('tenor_bank')));
		}
		$query = $this->m_koperasi->getData($key);

		if($this->session->userdata('akses_user') == 'Reviewer'){
			$data = array(
				'cif_induk' => $key,
				'nama_kop' => input($this->input->post('nama_kop')),
				'npwp' => input($this->input->post('npwp')),
				'nominal' => str_replace(',', '', input($this->input->post('nominal'))),
				'rate_bank' => $rate_bank,
				'tenor_bank' => $tenor_bank,
				'rek_agent' => input($this->input->post('rek_agent')),
				'mata_uang' => input($this->input->post('mata_uang')),
				'id_fasilitas' => input($this->input->post('id_fasilitas'))
			);
		} else{
			$data = array(
				'cif_induk' => $key,
				'nip_user' => $this->session->userdata('nip'),
				'cabang' => $this->session->userdata('cabang'),
				'nama_kop' => input($this->input->post('nama_kop')),
				'npwp' => input($this->input->post('npwp')),
				'nominal' => str_replace(',', '', input($this->input->post('nominal'))),
				'rate_bank' => $rate_bank,
				'tenor_bank' => $tenor_bank,
				'rek_agent' => input($this->input->post('rek_agent')),
				'mata_uang' => input($this->input->post('mata_uang'))
			);
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

		if($query->num_rows() > 0){
			$this->m_koperasi->updateData($key, $data);
			$log['detail'] = 'Berhasil mengubah data pada Pendaftaran Koperasi dengan CIF '.$key;
			$this->m_log->insert($log);
			$this->session->set_flashdata('Info', "Data koperasi dengan CIF <b>\"".$key."\"</b> a/n <b>\"".$data['nama_kop']."\"</b> berhasil diubah!");
			redirect('maker/koperasi');
		}
	}
}