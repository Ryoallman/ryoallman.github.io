<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Welcome_model');
	}

	public function index() {
		if($this->session->userdata('uid')) {
			redirect('user/dashboard');
		}
		$data = array (
			'title'			=>	'Login pengguna',
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('email', 'email', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('home/header', $data);
			$this->load->view('home/login', $data);
			$this->load->view('home/footer', $data);
		}else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$cek = $this->db->get_where('tb_users',['user_email' => $email])->row_array();
			if($cek) {
				if($cek['user_status'] == 1) {
					if(password_verify($password,$cek['user_password'])) {
						$sesiuser = array (
							'uid'				=>	$cek['user_id'],
							'ustatus'			=>	'sudahlogin',
						);
						$this->session->set_userdata($sesiuser);
						redirect('user/dashboard');
					}else {
						$this->session->set_flashdata('error', 'Password Anda salah');
						redirect('login');
					}
				}else {
					$this->session->set_flashdata('error', 'Akun Anda belum aktif, silahkan cek email verifikasi email dari kami.');
					redirect('login');
				}
			}else {
				$this->session->set_flashdata('error', 'Email Anda tidak terdaftar');
				redirect('login');
			}
		}
	}

	public function keluar() {
		$this->session->sess_destroy();
		redirect('login');
	}

	public function regis() {
		$data = array (
			'title'			=>	'Daftar',
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[tb_users.user_email]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'valid_email'=>	'Email harus valid',
					'is_unique'	=>	'Email sudah terdaftar']);
		$this->form_validation->set_rules('telp', 'telp', 'required|is_unique[tb_users.user_telp]|numeric', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'is_unique'	=>	'Nomor telepon sudah terdaftar',
					'numeric'	=>	'Harus angka']);
		$this->form_validation->set_rules('password1', 'password1', 'required|min_length[5]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'min_length'=>	'Minimal 5 katakter']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'matches'	=>	'Konfirmasi password harus sama']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('home/header', $data);
			$this->load->view('home/daftar', $data);
			$this->load->view('home/footer', $data);
		}else {
			$this->Welcome_model->simpan_regis();
			$this->session->set_flashdata('flash','Berhasil, silahkan cek email anda untuk mengaktifkan akun anda.');
			redirect('login');
		}
	}

	public function verify() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$cek_member = $this->db->get_where('tb_users', ['user_email' =>	$email])->row_array();
		$usid = $cek_member['user_id'];
		if($cek_member) {
			$member_token = $this->db->get_where('tb_token', ['token' => $token])->row_array();
			if($member_token) {
				if(time() - $member_token['created'] < (60*60*60)) {
					$this->db->set('user_status', 1);
					$this->db->where('user_email', $email);
					$this->db->update('tb_users');
					$this->db->delete('tb_token', ['email' => $email]);
					$this->session->set_flashdata('flash', 'Verifikasi email berhasil, silahkan login.');
					redirect('login');
				}else {
					$this->db->delete('tb_users', ['user_email' => $email]);
					$this->db->delete('tb_token', ['email' => $email]);
					$this->session->set_flashdata('error', 'Verifikasi email gagal, token kadaluarsa !');
					redirect('login');
				}
			}else {
				$this->session->set_flashdata('error', 'Verifikasi email gagal, token tidak valid !');
				redirect('login');
			}
		}else {
			$this->session->set_flashdata('error', 'Verifikasi email gagal, email tidak valid !');
			redirect('login');
		}
	}

	public function fopas() {
		$data = array (
			'title'				=>	'Lupa Password',
			'profil'			=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
					'required'	=>	'Kolom email tidak boleh kosong',
					'valid_email'=>	'Email tidak valid']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('home/header', $data);
			$this->load->view('home/login', $data);
			$this->load->view('home/footer', $data);
		}else {
			$this->_cek_lupa_password();
		}
	}

	private function _cek_lupa_password() {
		$email = strtolower($this->input->post('email'));
		$pengguna = $this->db->get_where('tb_users',['user_email' => $email])->row_array();

		if($pengguna) {
			$token = base64_encode(openssl_random_pseudo_bytes(32));
			$token_pengguna = array (
				'email'		=>	$email,
				'token'		=>	$token,
				'created'	=>	time()
			);

			$this->db->insert('tb_token', $token_pengguna);
			$this->_sendemail($token);
			$this->session->set_flashdata('flash', 'Silahkan periksa email anda untuk mengganti password');
			redirect('user/lupa-password');
		}else {
			$this->session->set_flashdata('error', 'Maaf, email Anda tidak terdaftar');
			redirect('user/lupa-password');
		}
	}

	private function _sendemail($token) {
		$cekmail = $this->db->get_where('tb_email',['email_id' => 1])->row_array();

		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'RESET PASSWORD AKUN YUK BANTU INDONESIA';
		$config['protocol'] = 'smtp';
		$config['mailtype'] = 'html';
		$config['smtp_host'] = 'ssl://yukbantu.ahmadadha.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '5';
		$config['smtp_user'] = $cekmail['email']; //email anda di sini
		$config['smtp_pass'] = $cekmail['email_password']; // password email anda di sini
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);

		$this->email->from($cekmail['email'], 'RESET PASSWORD AKUN YUK BANTU INDONESIA'); //email anda di sini
		$this->email->to($this->input->post('email'));
        $this->email->subject('RESET PASSWORD AKUN YUK BANTU INDONESIA');
		$this->email->message('Klik tombol di bawah ini untuk mengatur ulang password anda. <p><a href="' . base_url() . 'user/change?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" style="background-color:#44c767;border-radius:28px;border:1px solid #18ab29;display:inline-block;cursor:pointer;color:#ffffff;font-family:Times New Roman;font-size:17px;font-weight:bold;padding:9px 17px;text-decoration:none;text-shadow:0px 1px 0px #2f6627;" target="_blank">Ganti Password</a></p>');

		$this->email->send();
	}

	public function ganti() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$pengguna = $this->db->get_where('tb_users',['user_email' => $email])->row_array();

		if($pengguna) {
			$token_pengguna = $this->db->get_where('tb_token',['token' => $token])->row_array();
			if($token_pengguna) {
				if(time() - $token_pengguna['created'] < (60*60*60)) {
					$this->session->set_userdata('reset_email', $email);
					$this->ubah_password();
				}else {
					$this->db->delete('tb_token', ['email' => $email]);
					$this->session->set_flashdata('error', 'Token kadaluarsa !');
					redirect('login');
				}
			}else {
				$this->session->set_flashdata('error', 'Token salah');
				redirect('login');
			}
		}else {
			$this->session->set_flashdata('error', 'Email salah');
			redirect('login');
		}
	}

	public function ubah_password() {
		if(!$this->session->userdata('reset_email')) {
			redirect('login');
		}
		$data = array (
			'title'				=>	'Atur Ulang Password',
			'profil'			=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('password1', 'password1', 'required|min_length[5]', [
					'required'	=>	'Kolom password baru tidak boleh kosong',
					'min_length'=>	'Minimal 5 karakter']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom konfirmasi password baru tidak boleh kosong',
					'matches'	=> 'Konfirmasi password baru salah']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('home/header', $data);
			$this->load->view('home/login', $data);
			$this->load->view('home/footer', $data);
		}else {
			$password = password_hash($this->input->post('password2'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('user_password', $password);
			$this->db->where('user_email', $email);
			$this->db->update('tb_users');
			$this->db->where('email', $email);
			$this->db->delete('tb_token');

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('flash', 'Password berhasil diperbaharui');
			redirect('login');
		}
	}
}