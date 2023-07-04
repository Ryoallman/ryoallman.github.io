<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index() {
		if($this->session->userdata('status') == 'oklog') {
			redirect('admin/dashboard');
		}
		$data = array (
			'title'			=>	'Login',
		);
		$this->form_validation->set_rules('email', 'email', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login', $data);
		}else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$cek = $this->db->get_where('tb_admin',['admin_email' => $email])->row_array();
			if($cek) {
				if(password_verify($password, $cek['admin_password'])) {
					$sesi = array (
						'id'			=>	$cek['admin_id'],
						'status'		=>	'oklog',
					);
					$this->session->set_userdata($sesi);
					redirect('admin/dashboard');
				}else {
					$this->session->set_flashdata('error', 'Password Anda salah');
					redirect('auth');
				}
			}else {
				$this->session->set_flashdata('error', 'Email Anda tidak terdaftar');
				redirect('auth');
			}
		}
	}

	public function sep() {
		$data = array (
			'admin_id'		=>   md5(time()),
			'admin_nama'		=>   'Wahiyo Puji',
			'admin_email'		=>   'wahiyo.puji@gmail.com',
			'admin_password'		=>   password_hash('admin', PASSWORD_DEFAULT),
			'admin_foto'		=>   'avatar-01.jpg',
		);
	
		$this->db->insert('tb_admin', $data);
		redirect('auth');
	}

	public function keluar() {
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function fopas() {
		$data = array (
			'title'				=>	'Lupa Password',
		);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
					'required'	=>	'Kolom email tidak boleh kosong',
					'valid_email'=>	'Email tidak valid']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login', $data);
		}else {
			$this->_cek_lupa_password();
		}
	}

	private function _cek_lupa_password() {
		$email = strtolower($this->input->post('email'));
		$pengguna = $this->db->get_where('tb_admin',['admin_email' => $email])->row_array();

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
			redirect('auth/lupa-password');
		}else {
			$this->session->set_flashdata('error', 'Maaf, email Anda tidak terdaftar');
			redirect('auth/lupa-password');
		}
	}

	private function _sendemail($token) {
		$cekmail = $this->db->get_where('tb_email',['email_id' => 1])->row_array();

		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'RESET PASSWORD ADMIN';
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

		$this->email->from($cekmail['email'], 'RESET PASSWORD ADMIN'); //email anda di sini
		$this->email->to($this->input->post('email'));
        $this->email->subject('RESET PASSWORD ADMIN');
		$this->email->message('Klik tombol di bawah ini untuk mengatur ulang password anda. <p><a href="' . base_url() . 'auth/change?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" style="background-color:#44c767;border-radius:28px;border:1px solid #18ab29;display:inline-block;cursor:pointer;color:#ffffff;font-family:Times New Roman;font-size:17px;font-weight:bold;padding:9px 17px;text-decoration:none;text-shadow:0px 1px 0px #2f6627;" target="_blank">Ganti Password</a></p>');

		$this->email->send();
	}

	public function ganti() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$pengguna = $this->db->get_where('tb_admin',['admin_email' => $email])->row_array();

		if($pengguna) {
			$token_pengguna = $this->db->get_where('tb_token',['token' => $token])->row_array();
			if($token_pengguna) {
				if(time() - $token_pengguna['created'] < (60*60*60)) {
					$this->session->set_userdata('reset_email', $email);
					$this->ubah_password();
				}else {
					$this->db->delete('tb_token', ['email' => $email]);
					$this->session->set_flashdata('error', 'Token kadaluarsa !');
					redirect('auth');
				}
			}else {
				$this->session->set_flashdata('error', 'Token salah');
				redirect('auth');
			}
		}else {
			$this->session->set_flashdata('error', 'Email salah');
			redirect('auth');
		}
	}

	public function ubah_password() {
		if(!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		$data = array (
			'title'				=>	'Atur Ulang Password',
		);
		$this->form_validation->set_rules('password1', 'password1', 'required|min_length[5]', [
					'required'	=>	'Kolom password baru tidak boleh kosong',
					'min_length'=>	'Minimal 5 karakter']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom konfirmasi password baru tidak boleh kosong',
					'matches'	=> 'Konfirmasi password baru salah']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login', $data);
		}else {
			$password = password_hash($this->input->post('password2'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('admin_password', $password);
			$this->db->where('admin_email', $email);
			$this->db->update('tb_admin');
			$this->db->where('email', $email);
			$this->db->delete('tb_token');

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('flash', 'Password berhasil diperbaharui');
			redirect('auth');
		}
	}
}