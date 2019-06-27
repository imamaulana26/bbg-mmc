<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('layout/_header');
		$this->load->view('layout/_footer');
		$model = array('m_user','m_log','m_list');
		foreach($model as $mod){
			$this->load->model($mod);
		}
		$email = $this->session->userdata('email');
		if(empty($email)){
			$this->session->sess_destroy();
			redirect(ucfirst('login'));
		}
	}

	function profil(){
		$key = $this->session->userdata('nip');
		$isi = array(
			'konten' => 'admin/v_profil',
			'cabang' => $this->m_list->getAllCabang(),
			'data' => $this->m_user->getData($key)
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_content', $isi);
	}

	function log(){
		$isi = array(
			'log_history' => $this->m_log->getAll(),
			'konten' => 'admin/v_log'
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_content', $isi);
	}

	function index(){
		$isi = array(
			'konten' => 'admin/add_user',
			'cabang' => $this->m_list->getAllCabang()
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_content', $isi);
	}

	function edit_user(){
		$key = $this->uri->segment(4);
		$isi = array(
			'konten' => 'admin/edit_user',
			'data' => $this->m_user->getData($key),
			'cabang' => $this->m_list->getAllCabang()
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_content', $isi);
	}

	function simpanBaru(){
		$key = input($this->input->post('nip_user'));
		$jaringan = $this->input->post('jaringan');
		if(is_array($this->input->post('jaringan'))){
			$jaringan = implode("::", $this->input->post('jaringan'));
		}

		$query = $this->m_user->getData($key);
		// upload photo
		$config = array(
			'max_size' => 1000,
			'allowed_types' => 'jpg|png|jpeg',
			'remove_spaces' => true,
			'overwrite' => true,
			'upload_path' => './assets/images/'
		);

		$this->load->library('upload');
		$this->upload->initialize($config);
		// get data images
		if(!empty($_FILES['userfile']['name'])){
			if($this->upload->do_upload('userfile')){
				$img = $this->upload->data();
				// Compress images
				$config = array(
					'image_library' => 'gd2',
					'source_image' => './assets/images/'.$img['file_name'],
					'create_thumb' => false,
					'maintain_ratio' => false,
					'quality' => '50%',
					'width' => 600,
					'height' => 400,
					'new_image' => './assets/images/'.$img['file_name']
				);
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
				$pict = $img['file_name'];
			}
		}

		if($query->num_rows() > 0){ ?>
			<script type="text/javascript">
				alert('Data user sudah ada!');
				window.history.go(-1);
			</script>
		<?php } else {
			if(isset($pict)){
				$data = array(
					'nip_user' => $key,
					'nama_user' => input($this->input->post('nama')),
					'cabang' => input($this->input->post('cabang')),
					'jabatan' => $this->input->post('jabatan'),
					'jaringan' => $jaringan,
					'akses_user' => input($this->input->post('akses')),
					'email' => input($this->input->post('email')),
					'photo' => $pict
				);

				date_default_timezone_set('Asia/Jakarta');
				$log = array(
					'user_session' => $this->session->userdata('nip'),
					'nama_user' => $this->session->userdata('nama_user'),
					'akses_user' => $this->session->userdata('akses_user'),
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'browser' => $_SERVER['HTTP_USER_AGENT'],
					'url' => $_SERVER['REQUEST_URI'],
					'waktu' => date('Y-m-d H:i:s'),
					'detail' => 'Berhasil menambahkan Data User dengan NIP '.$key
				);

				$this->m_log->insert($log);
				$this->m_user->insertData($data);
				$this->session->set_flashdata('Info', "Data dengan No. Induk Pegawai <b>\"".$data['nip_user']."\"</b> berhasil disimpan!");
				redirect(ucfirst($_SERVER['HTTP_REFERER']));
			} else{
				$data = array(
					'nip_user' => $key,
					'nama_user' => input($this->input->post('nama')),
					'cabang' => input($this->input->post('cabang')),
					'jabatan' => $this->input->post('jabatan'),
					'jaringan' => $jaringan,
					'akses_user' => input($this->input->post('akses')),
					'email' => input($this->input->post('email'))
				);

				date_default_timezone_set('Asia/Jakarta');
				$log = array(
					'user_session' => $this->session->userdata('nip'),
					'nama_user' => $this->session->userdata('nama_user'),
					'akses_user' => $this->session->userdata('akses_user'),
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'browser' => $_SERVER['HTTP_USER_AGENT'],
					'url' => $_SERVER['REQUEST_URI'],
					'waktu' => date('Y-m-d H:i:s'),
					'detail' => 'Berhasil menambahkan Data User dengan NIP '.$key
				);

				$this->m_log->insert($log);
				$this->m_user->insertData($data);
				$this->session->set_flashdata('Info', "Data dengan No. Induk Pegawai <b>\"".$data['nip_user']."\"</b> berhasil disimpan!");
				redirect(ucfirst($_SERVER['HTTP_REFERER']));
			}
		}
	}

	function simpanData(){
		$key = input($this->input->post('nip_user'));
		$jaringan = $this->input->post('jaringan');
		if(is_array($this->input->post('jaringan'))) {
			$jaringan = implode("::", $this->input->post('jaringan'));
		}

		$query = $this->m_user->getData($key);
		// upload photo
		$config = array(
			'max_size' => 2500,
			'allowed_types' => 'jpg|png|jpeg',
			'remove_spaces' => true,
			'overwrite' => true,
			'upload_path' => './assets/images/'
		);

		$this->load->library('upload');
		$this->upload->initialize($config);
		// get data images
		if(!empty($_FILES['userfile']['name'])){
			if($this->upload->do_upload('userfile')){
				$img = $this->upload->data();
				// Compress images
				$config = array(
					'image_library' => 'gd2',
					'source_image' => './assets/images/'.$img['file_name'],
					'create_thumb' => false,
					'maintain_ratio' => false,
					'quality' => '50%',
					'width' => 600,
					'height' => 400,
					'new_image' => './assets/images/'.$img['file_name']
				);
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
				$pict = $img['file_name'];
			}
		}
		
		if($query->num_rows() > 0){
			if(isset($pict)){
				$data = array(
					'nip_user' => $key,
					'nama_user' => input($this->input->post('nama')),
					'cabang' => input($this->input->post('cabang')),
					'jabatan' => $this->input->post('jabatan'),
					'jaringan' => $jaringan,
					'akses_user' => input($this->input->post('akses')),
					'email' => input($this->input->post('email')),
					'photo' => $pict
				);

				date_default_timezone_set('Asia/Jakarta');
				$log = array(
					'user_session' => $this->session->userdata('nip'),
					'nama_user' => $this->session->userdata('nama_user'),
					'akses_user' => $this->session->userdata('akses_user'),
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'browser' => $_SERVER['HTTP_USER_AGENT'],
					'url' => $_SERVER['REQUEST_URI'],
					'waktu' => date('Y-m-d H:i:s'),
					'detail' => 'Berhasil mengubah Data User dengan NIP '.$key
				);

				$this->m_log->insert($log);
				$this->m_user->updateData($key, $data);
				$this->session->set_flashdata('Info', "Data dengan No. Induk Pegawai <b>\"".$data['nip_user']."\"</b> berhasil diubah!");
				redirect(ucfirst('admin/user/edit_user/'.$key));
			} else{
				$data = array(
					'nip_user' => $key,
					'nama_user' => input($this->input->post('nama')),
					'cabang' => input($this->input->post('cabang')),
					'jabatan' => $this->input->post('jabatan'),
					'jaringan' => $jaringan,
					'akses_user' => input($this->input->post('akses')),
					'email' => input($this->input->post('email'))
				);

				date_default_timezone_set('Asia/Jakarta');
				$log = array(
					'user_session' => $this->session->userdata('nip'),
					'nama_user' => $this->session->userdata('nama_user'),
					'akses_user' => $this->session->userdata('akses_user'),
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'browser' => $_SERVER['HTTP_USER_AGENT'],
					'url' => $_SERVER['REQUEST_URI'],
					'waktu' => date('Y-m-d H:i:s'),
					'detail' => 'Berhasil mengubah Data User dengan NIP '.$key
				);

				$this->m_log->insert($log);
				$this->m_user->updateData($key, $data);
				$this->session->set_flashdata('Info', "Data dengan No. Induk Pegawai <b>\"".$data['nip_user']."\"</b> berhasil diubah!");
				redirect(ucfirst('admin/user/edit_user/'.$key));
			}
		}
	}

	/*function changePass(){
		$key = $this->input->post('id');
		$query = $this->m_user->getData($key);

		$pass = md5($this->input->post('pass'));
		$new_pass = $this->input->post('new_pass');
		$conf_pass = $this->input->post('verify');

		if(!empty($pass)){
			foreach($query->result() as $res){
				if($res->password != $pass){
					$this->session->set_flashdata('Info', "Password invalid");
					redirect(ucfirst('admin/user/edit_user/'.$key));
				}
			}
			if(($new_pass != $conf_pass) || (empty($new_pass) && empty($conf_pass))){
				$this->session->set_flashdata('Info', "Konfirmasi password tidak sesuai");
				redirect(ucfirst('admin/user/edit_user/'.$key));
			} else{
				if($query->num_rows() > 0){
					$data = array(
						'id' => $key,
						'password' => md5($conf_pass),
					);

					$this->m_user->updateData($key, $data);
					$this->session->set_flashdata('Info', "Data dengan No. Induk Pegawai <b>\"".$data['no_employe']."\"</b> berhasil diubah!");
					redirect(ucfirst('admin/dashboard'));
				}
			}
		}
	}*/
}