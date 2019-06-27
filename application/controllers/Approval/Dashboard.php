<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$model = array('m_user','m_input','m_anak','m_dashboard','m_login','m_list','m_result','m_log');
		foreach($model as $mod){
			$this->load->model($mod);
		}

		$email = $this->session->userdata('email');
		if(empty($email)){
			$this->session->sess_destroy();
			redirect(ucfirst('login'));
		}
		
		if(!empty($this->session->userdata('filename'))){
			$this->getResult();
		}
	}

	function index(){
		$isi = array(
			'konten' => 'approval/v_dashboard',
			'data' => $this->m_dashboard->getApprove(),
			'existing' => $this->m_dashboard->getExisting(),
			'getAll' => $this->m_dashboard->getAll(),
			'koperasi' => $this->m_list->getDistKop(),
			'cabang' => $this->m_list->getAllCabang(),
			'lokasi' => $this->m_list->getAllLokasi(),
			'sektor' => $this->m_list->getAllSektor(),
			'user' => $this->m_list->getAllUser(),
			'viewReject' => $this->m_dashboard->getReject(),
			'getProses' => $this->m_dashboard->getApprove(),
			'getSukses' => $this->m_result->getSukses(),
			'getGagal' => $this->m_result->getGagal()
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_header');
		$this->load->view('layout/_content', $isi);
		$this->load->view('layout/_footer');
	}

	// download file txt (success)
	public function download(){
		$key = $this->uri->segment(4);
		$this->db->select("*");
		$this->db->from("tbl_input");
		$this->db->join("tbl_induk", "tbl_induk.no_fos = tbl_input.no_fos", "inner");
		$this->db->join("tbl_anak", "tbl_anak.no_fos = tbl_input.no_fos", "inner");
		$this->db->join("tbl_link", "tbl_link.no_fos = tbl_input.no_fos", "inner");
		$this->db->join("tbl_jaminan", "tbl_jaminan.no_fos = tbl_input.no_fos", "inner");
		$this->db->join("tbl_asset", "tbl_asset.no_fos = tbl_input.no_fos", "inner");
		$this->db->join("tbl_koperasi", "tbl_koperasi.cif_induk = tbl_input.cif_induk", "inner");
		$this->db->join("tbl_kontrak", "tbl_kontrak.no_fos = tbl_input.no_fos", "inner");
		$this->db->where("tbl_input.no_fos", $key);
		$query = $this->db->get();

		foreach($query->result() as $list){
			$kode = '';
			if($list->kode < 10){
				$kode = '0'.$list->kode;
			}
			$filename = date('Ymd', strtotime($list->tgl_cair))."-MMC-".trim($list->kode_cabang)."-".$list->tipe_produk."-".$list->no_fos."-DISBURSE-".$kode.".txt";
			
			$sess = array(
				'filename' => $filename,
				'no_fos' => $list->no_fos,
				'kode' => $list->kode
			);
			$this->session->set_userdata($sess);
			
			$isi = "LIMIT-INDUK*".date('Ymd', strtotime($list->tgl_cair))."-".$list->cif."-".$list->no_fos."|".$list->mata_uang."|".date('Ymd', strtotime($list->tgl_nota))."|".$list->nom_fasilitas."|".date('Ymd', strtotime($list->tgl_sp3))."|".$list->nom_max_guna."|".date('Ymd', strtotime($list->tgl_cair))."|".$list->segmen."|".date('Ymd', strtotime($list->tgl_cair))."|".$list->rating_int."|".date('Ymd', strtotime($list->tgl_jth_tempo))."|".$list->rating_eks."|||||||"."\r\n";

			/*$isi .= "AGEN-REG*".date('Ymd', strtotime($list->tgl_cair))."-".$list->cif."-".$list->no_fos."|".$list->nama_kop."|".$list->mata_uang."|".$list->nom_fasilitas."||".$list->nom_fasilitas."|".date('Ymd', strtotime($list->tgl_expired))."|".$list->cif_pemasok."|".$list->tenor_bank."|".$list->rate_bank."|".$list->rek_agent."|||".$list->no_pks."|".$list->no_skkp."|".date('Ymd', strtotime($list->tgl_komite))."|"."\r\n";*/

			$isi .= "LIMIT-ANAK*".date('Ymd', strtotime($list->tgl_cair))."-".$list->cif."-".$list->no_fos."|".$list->nama_nsbh."|".$list->mata_uang."|".$list->nom_fasilitas."|".date('Ymd', strtotime($list->tgl_cair))."|".$list->nom_max_guna."|".date('Ymd', strtotime($list->tgl_jth_tempo))."|".$list->id_fasilitas."|||".$list->orientasi."|".$list->sifat_piutang."|".$list->gol_piutang."|".$list->lokasi_proyek."|".$list->jenis_guna."|".$list->sektor_ekonomi."|".$list->sifat_pinjam."|".$list->tipe_guna."|".$list->status_cair."|".$list->nom_fasilitas."||||".$list->no_pks."|".date('Ymd', strtotime($list->tgl_cair))."|||||||"."\r\n";

			$isi .= "LINK-JAMINAN*".date('Ymd', strtotime($list->tgl_cair))."-".$list->cif."-".$list->no_fos."-".$kode."|".$list->kode_jaminan."||".$list->cif."|".$list->alokasi."|".date('Ymd', strtotime($list->tgl_cair))."||".date('Ymd', strtotime($list->tgl_jth_tempo))."|||"."\r\n";

			$isi .= "DETAIL-JAMINAN*".date('Ymd', strtotime($list->tgl_cair))."-".$list->cif."-".$list->no_fos."-".$kode."|".$list->tipe_jaminan."|".$list->deskripsi."|||".$list->mata_uang."|".$list->negara."|".$list->nom_fasilitas."|".$list->nom_fasilitas."|".$list->njop."|".date('Ymd', strtotime($list->tgl_cair))."||".date('Ymd', strtotime($list->tgl_jth_tempo))."|".$list->alamat."|||".$list->surat_bukti."||||||||||||||"."\r\n";

			$isi .= "ASET-REG*".date('Ymd', strtotime($list->tgl_cair))."-".$list->cif."-".$list->no_fos."|".$list->nama_asset."|".$list->ket_asset."|".$list->cif."|".$list->mata_uang."||".$list->cif_pemasok."|".$list->nama_kop."|".$list->rek_agent."|".$list->harga_asset."|".$list->uang_muka."|".$list->jumlah_asset."|".$list->total_asset."|"."\r\n";

			// Versi 1. Mapping Excel
			/*$isi .= "PEMBIAYAAN*".date('Ymd', strtotime($list->tgl_cair))."-".$list->cif."-".$list->no_fos."|".$list->cif."|".$list->tgl_angsuran."|".$list->mata_uang."|".$list->tipe_produk."|||".$list->nom_max_guna."|".$list->kode_unit_kerja."|".$list->kode_ao."|".$list->kode_fao."|".$list->kode_pim."||".$list->tenor."|".($list->tipe_angsuran+1)."|".$list->pengusul."|".$list->pemutus."|".$list->rate_agent."|".$list->rek_agent."|".$list->no_sp3."|".$list->segmentasi."||".$list->rek_nsbh."|".$list->rek_pokok."|".$list->rek_margin."|".$list->wakalah."|".$list->tipe_margin."|||".$list->margin."||".$list->total_margin."|".$list->teratribusi."|".$list->kode_biaya."|".$list->nom_biaya."||".$list->rek_biaya."||||".$list->flag_agunan."||".$list->ratio."|".$list->status_piutang."|||".$list->gol_piutang."|35||||||||||||".$list->lokasi_proyek."|||||||||||".$list->gaji_thn."|||".$list->sektor_ekonomi."|".$list->jenis_guna."||||"."\r\n";*/

			// Versi 2. Mapping Core Banking
			$isi .= "PEMBIAYAAN*".date('Ymd', strtotime($list->tgl_cair))."-".$list->cif."-".$list->no_fos."|".$list->cif."|".$list->tgl_angsuran."|".$list->mata_uang."|".$list->tipe_produk."|||".$list->nom_max_guna."|".$list->kode_unit_kerja."|".$list->kode_ao."|".$list->kode_fao."|".$list->kode_pim."||".$list->tenor."|".$list->tipe_angsuran."|".$list->pengusul."|".$list->pemutus."|".$list->rate_agent."|".$list->rek_agent."|".$list->no_sp3."|".$list->segmentasi."||".$list->rek_nsbh."|".$list->rek_pokok."|".$list->rek_margin."|".$list->wakalah."|".$list->tipe_margin."|||".$list->margin."|||".$list->teratribusi."|".$list->kode_biaya."|".$list->nom_biaya."||".$list->rek_biaya."||||".$list->flag_agunan."||".$list->ratio."|".$list->status_piutang."|||".$list->gol_piutang."|".$list->portofolio."||||||||||||".$list->gaji_thn."|||".$list->sektor_ekonomi."|".$list->jenis_guna."||".$list->lokasi_proyek."|||"."\r\n";

			// path file
			$path = 'log_txt/'.$filename;
			// Cek apakah nama file sudah ada apa belum
			if(!file_exists($path)){
				// jika belum ada maka tulis file
				$handle = fopen($path, "w");
				// menulis file
				fwrite($handle, $isi);
				// path of local server
				$source = './'.$path;
				$this->load->library('ftp');
				$ftp_config = array(
					'hostname' => '10.9.9.36',
					'username' => 'ftp_mmc',
					'password' => 'Bsm123',
					'debug' => true
				);
				$this->ftp->connect($ftp_config);
				// path of remote server (FTP)
				$destination = './'.$filename;
				$this->ftp->upload($source, $destination);

				echo "<script type='text/javascript'>alert('File berhasil terkirim ke ftp');";
				echo "window.location.href='".site_url('approval/dashboard/approve')."';</script>";
				
				$data = array(
					'nip_approval' => $this->session->userdata('nip'),
					'approve' => 'Approved'
				);
				$this->m_input->updateData($key, $data);
				$this->ftp->close();
			} else{
				echo "<script type='text/javascript'>alert('File sudah ada di ftp');";
				echo "window.location.href='".site_url('approval/dashboard/approve')."';</script>";
				
				$data = array(
					'nip_approval' => $this->session->userdata('nip'),
					'approve' => 'Approved'
				);
				$this->m_input->updateData($key, $data);
			}
		}
	}

	function getResult(){
		$filename = $this->session->userdata('filename');
		$no_fos = $this->session->userdata('no_fos');
		$kode = $this->session->userdata('kode');
		
		if(!empty($filename) && !empty($no_fos)){
			// connect and login to FTP server
			$ftp_server = "10.9.9.36";
			$ftp_username = "ftp_mmc_bbg";
			$ftp_userpass = "Bsm123";
			
			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

			$local_file = "result_txt/".$filename;
			$server_file = './PROSES/OUT/MMC/'.$filename;
			
			// download server file
			$upload = ftp_get($ftp_conn, $local_file, $server_file, FTP_BINARY);
			if(!$upload){
				//echo "File sedang di prosess...";
				$this->session->set_flashdata('Proses', "File sedang di proses...");
			}

			// close connection
			ftp_close($ftp_conn);
			
			if(file_exists('result_txt/'.$filename)){	// cek apakah file sudah ada di directory atau belum
				$file = file_get_contents('result_txt/'.$filename);
				// $hasil = stristr($file, 'SUKSES|LD');
				// $res = preg_match('/[0-9]\z/', '', $hasil);

				$hasil = strstr(substr($file, 0, -1), 'SUKSES|LD');
				$res = strstr($hasil, 'LD');
					
				if(!empty($res)){
					date_default_timezone_set('Asia/Jakarta');
					$data = array(
						'file_name' => $filename,
						'cabang' => substr($filename, 13, 9),
						'time_upload' => date('Y-m-d H:i:s'),
						'status' => 'Sukses',
						'no_fos' => $no_fos,
						'no_loan' => $res
					);
					
					$log = array(
						'user_session' => $this->session->userdata('nip'),
						'nama_user' => $this->session->userdata('nama_user'),
						'akses_user' => $this->session->userdata('akses_user'),
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'browser' => $_SERVER['HTTP_USER_AGENT'],
						'url' => $_SERVER['REQUEST_URI'],
						'waktu' => date('Y-m-d H:i:s'),
						'detail' => 'Pencairan '.$data['file_name'].' sukses dengan NOLOAN '.$data['no_loan']
					);
					
					$isi = array('status' => 'Sukses');
					
					// cek apakah nama file sudah ada atau belum
					$query = $this->db->get_where('tbl_result', array('file_name' => $filename, 'status' => 'Sukses'));
					if(!$query->num_rows() > 0){
						$this->m_result->insertData($data);
						$this->m_log->insert($log);
						$this->m_input->updateData($no_fos, $isi);
						
						// kirim email notifikasi
						// isi pesan
						/*$content = "<b>Assalamu'alaikum Wr. Wb.</b><br><br>";
						$content .= "Berikut hasil proses pencairan pada aplikasi MMC, bahwa pembiayaan dengan No.MMC ".$no_fos." dengan squence ".strlen($kode) == 1 ? "0".$kode : $kode;
						$content .= " telah berhasil diproses pada ".date('Y-m-d H:i:s')." dengan NOLOAN ".$data['no_loan']."<br>";
						$content .= "Terima kasih.<br><br>";
						$content .= "<b>Wassalamu'alaikum Wr. Wb.</b><br><br>";
						$content .= "<i>Admin MMC System</i>";
							
						$this->load->library('email');
						$config['mailtype'] = 'html';
						$this->email->initialize($config);
						// kirim email ke user maker, checker, reviewer, approval
						$this->db->select('*')->from('tbl_input')->where('no_fos', $no_fos);
						$query = $this->db->get();
						$result = $query->result();
						
						$mail = "";
						foreach($result as $res){
							$this->db->select('*')->from('tbl_users');
							$nip = array($res->nip_checker, $res->nip_user, $res->nip_reviewer, $res->nip_approval);
							foreach($nip as $n){
								$this->db->or_where('nip_user', $n);
							}
							$result = $this->db->get();
							
							foreach($result->result() as $dt){
								$mail .= $dt->email.', ';
							}
						}
						
						$this->email->to(substr($mail, 0, -2));
						$this->email->from('admin-mmc@bsm.co.id','Admin MMC');
						$this->email->subject('Hasil Proses MMC');
						$this->email->message($content);
						$this->email->send();*/
						
						$this->session->unset_userdata('filename');
						$this->session->unset_userdata('no_fos');						
					}
				} else{
					date_default_timezone_set('Asia/Jakarta');
					$data = array(
						'file_name' => $filename,
						'cabang' => substr($filename, 13, 9),
						'time_upload' => date('Y-m-d H:i:s'),
						'status' => 'Gagal',
						'no_fos' => $no_fos
					);

					$log = array(
						'user_session' => $this->session->userdata('nip'),
						'nama_user' => $this->session->userdata('nama_user'),
						'akses_user' => $this->session->userdata('akses_user'),
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'browser' => $_SERVER['HTTP_USER_AGENT'],
						'url' => $_SERVER['REQUEST_URI'],
						'waktu' => date('Y-m-d H:i:s'),
						'detail' => 'Pencairan '.$data['file_name'].' gagal'
					);

					$isi = array('status' => 'Gagal');
					
					// cek apakah nama file sudah ada atau belum
					$query = $this->db->get_where('tbl_result', array('file_name' => $filename, 'status' => 'Gagal'));
					if(!$query->num_rows() > 0){
						$this->m_result->insertData($data);
						$this->m_log->insert($log);
						$this->m_input->updateData($no_fos, $isi);
						
						// kirim email notifikasi
						// isi pesan
						/*$content = "<b>Assalamu'alaikum Wr. Wb.</b><br><br>";
						$content .= "Berikut hasil proses pencairan pada aplikasi MMC, bahwa pembiayaan dengan No.MMC ".$no_fos." dengan squence ".strlen($kode) == 1 ? "0".$kode : $kode;
						$content .= " telah gagal diproses pada ".date('Y-m-d H:i:s').".<br>";
						$content .= "Harap koreksi kembali pada saat pengisian field.<br>";
						$content .= "Terima kasih.<br><br>";
						$content .= "<b>Wassalamu'alaikum Wr. Wb.</b><br><br>";
						$content .= "<i>Admin MMC System</i>";
							
						$this->load->library('email');
						$config['mailtype'] = 'html';
						$this->email->initialize($config);
						// kirim email ke user maker, checker, reviewer, approval
						$this->db->select('*')->from('tbl_input')->where('no_fos', $no_fos);
						$query = $this->db->get();
						$result = $query->result();
						
						$mail = "";
						foreach($result as $res){
							$this->db->select('*')->from('tbl_users');
							$nip = array($res->nip_checker, $res->nip_user, $res->nip_reviewer, $res->nip_approval);
							foreach($nip as $n){
								$this->db->or_where('nip_user', $n);
							}
							$result = $this->db->get();
							
							foreach($result->result() as $dt){
								$mail .= $dt->email.', ';
							}
						}
						
						$this->email->to(substr($mail, 0, -2));
						$this->email->from('admin-mmc@bsm.co.id', 'Admin MMC');
						$this->email->subject('Hasil Proses MMC');
						$this->email->message($content);
						$this->email->send();*/
						
						$this->session->unset_userdata('filename');
						$this->session->unset_userdata('no_fos');
					}
				}
			}
		}
	}

	function updateDetail(){
		$key = input($this->input->post('no_fos'));
		$data = array(
			'nip_reviewer' => $this->session->userdata('nip'),
			'tgl_cair' => input($this->input->post('tgl_cair')),
			'approve' => 'Approval'
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

		$query = $this->m_input->getData($key);
		if($query->num_rows() > 0){
			if(!empty($this->input->post('id_fasilitas'))){
				$this->m_input->updateData($key, $data);
				$log['detail'] = 'Berhasil input tanggal pencairan pada '.$data['tgl_cair'].' dengan No.MMC '.$key;
				$this->m_log->insert($log);
				
				$this->session->set_flashdata('Info',"Berhasil input tanggal pencairan pada <b>\"".$data['tgl_cair']."\"</b> dengan No.MMC <b>\"".$key."\"</b>.");
				redirect(ucfirst('approval/dashboard/approve'));
			} else{
				echo "<script type='text/javascript'>alert('Koperasi belum memiliki kode LNGP, harap daftarkan terlebih dahulu');";
				echo "window.location.href='".site_url('maker/koperasi')."';</script>";
			}
		}
	}

	function approve(){
		$key = input($this->input->post('no_fos'));
		
		$data = array(
			'konten' => 'approval/v_approval',
			'data' => $this->m_dashboard->getApprove(),
			'existing' => $this->m_dashboard->getExisting(),
			'getAll' => $this->m_dashboard->getAll(),
			'koperasi' => $this->m_list->getDistKop(),
			'cabang' => $this->m_list->getAllCabang(),
			'lokasi' => $this->m_list->getAllLokasi(),
			'sektor' => $this->m_list->getAllSektor(),
			'user' => $this->m_list->getAllUser(),
			'viewReject' => $this->m_dashboard->getReject(),
			'getProses' => $this->m_dashboard->getApprove(),
			'getSukses' => $this->m_result->getSukses(),
			'getGagal' => $this->m_result->getGagal()
		);

		ob_start('ob_gzhandler');
		$this->load->view('layout/_header');
		$this->load->view('layout/_content', $data);
		$this->load->view('layout/_footer');
		
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

		if(isset($_POST['approve'])){
			if($this->session->userdata('akses_user') == 'Reviewer'){
				$data = array(
					'no_fos' => $key,
					'nip_reviewer' => $this->session->userdata('nip'),
					'approve' => input($this->input->post('approve'))
				);
			} else{
				$data = array(
					'no_fos' => $key,
					'nip_approval' => $this->session->userdata('nip'),
					'approve' => input($this->input->post('approve'))
				);
			}
			$log['detail'] = $data['no_fos'].' berhasil di '.$data['approve'];
		} else {
			if($this->session->userdata('akses_user') == 'Reviewer'){
				$data = array(
					'no_fos' => $key,
					'nip_reviewer' => $this->session->userdata('nip'),
					'approve' => input($this->input->post('reject'))
				);
			} else{
				$data = array(
					'no_fos' => $key,
					'nip_approval' => $this->session->userdata('nip'),
					'approve' => input($this->input->post('reject'))
				);
			}
			$log['detail'] = $data['no_fos'].' berhasil di kembalikan ke '.$data['approve'];
		}
		
		$query = $this->m_input->getData($key);
		if($query->num_rows() > 0){
			$this->m_input->updateData($key, $data);
			$this->m_log->insert($log);
			$this->session->set_flashdata('Info', "<b>\"".$key."\"</b> Berhasil di kirim ke ".$data['approve']);
			redirect(ucfirst('approval/dashboard'));
		}
	}
}