<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {
	public function data_artikel_index() {
		$this->db->limit(2);
		$this->db->order_by('post_tgl', 'DESC');
		return $this->db->get('tb_blog')->result_array();
	}

	public function data_artikel() {
		$this->db->select('*');
		$this->db->from('tb_blog');
		$this->db->join('tb_kategori', 'tb_kategori.kat_id = tb_blog.post_kategori');
		$this->db->order_by('post_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function data_artikelby($url) {
		$this->db->select('*');
		$this->db->from('tb_blog');
		$this->db->join('tb_kategori', 'tb_kategori.kat_id = tb_blog.post_kategori');
		$this->db->where('post_url', $url);
		return $this->db->get()->row_array();
	}

	public function blog_by($ini) {
		$this->db->select('*');
		$this->db->from('tb_blog');
		$this->db->join('tb_kategori', 'tb_kategori.kat_id = tb_blog.post_kategori');
		$this->db->where('post_kategori', $ini);
		return $this->db->get()->result_array();
	}

	public function blog_cari($key) {
		$this->db->select('*');
		$this->db->from('tb_blog');
		$this->db->join('tb_kategori', 'tb_kategori.kat_id = tb_blog.post_kategori');
		$this->db->like('post_judul', $key);
		$this->db->or_like('post_isi', $key);
		return $this->db->get()->result_array();
	}

	public function simpan_regis() {
		$data = array (
			'user_id'			=>   md5(rand()),
			'user_nama'			=>   ucwords($this->input->post('nama')),
			'user_telp'			=>   $this->input->post('telp'),
			'user_email'		=>   strtolower($this->input->post('email')),
			'user_password'		=>   password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
			'user_foto'			=>   'default_avatar.jpg',
			'user_status'		=>   0,
		);
	
		$token = base64_encode(openssl_random_pseudo_bytes(32));
		$member_token = array (
			'email'					=>	strtolower($this->input->post('email')),
			'token'					=>	$token,
			'created'				=>	time()
		);
		$this->db->insert('tb_users', $data);
		$this->db->insert('tb_token', $member_token);
		$this->_sendemail($token);
	}

	private function _sendemail($token) {
		$cekmail = $this->db->get_where('tb_email',['email_id' => 1])->row_array();

		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'AKTIVASI AKUN YUK BANTU INDONESIA';
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

		$this->email->from($cekmail['email'], 'AKTIVASI AKUN YUK BANTU INDONESIA');  //email anda di sini
		$this->email->to($this->input->post('email'));
        $this->email->subject('AKTIVASI AKUN YUK BANTU INDONESIA');
		$this->email->message('<h4>Hi, ' .ucwords($this->input->post('nama')) . '</h4>Klik tombol di bawah ini untuk memverifikasi email anda. <p><a href="' . base_url() . 'verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" style="background-color:#44c767;border-radius:28px;border:1px solid #18ab29;display:inline-block;cursor:pointer;color:#ffffff;font-family:Times New Roman;font-size:17px;font-weight:bold;padding:9px 17px;text-decoration:none;text-shadow:0px 1px 0px #2f6627;" target="_blank">Verifikasi</a></p>');

		$this->email->send();
	}

	public function data_galang_dana() {
		$this->db->select('SUM(donasi_jml) as terkumpul, gd_foto as foto, gd_dana as dana, gd_judul as judul, gd_isi as isi, gd_url as url');
		$this->db->from('tb_galang_dana');
		$this->db->join('tb_donasi', 'tb_donasi.donasi_gdid = tb_galang_dana.gd_id','left');
		$this->db->order_by('gd_tgl', 'DESC');
		$this->db->group_by('gd_id');
		$this->db->where('gd_status', 1);
		return $this->db->get()->result_array();
	}

	public function data_galang_dana_index() {
		$this->db->select('SUM(donasi_jml) as terkumpul, gd_foto as foto, gd_dana as dana, gd_judul as judul, gd_isi as isi, gd_url as url');
		$this->db->from('tb_galang_dana');
		$this->db->join('tb_donasi', 'tb_donasi.donasi_gdid = tb_galang_dana.gd_id','left');
		$this->db->order_by('gd_tgl', 'DESC');
		$this->db->group_by('gd_id');
		$this->db->where('gd_status', 1);
		$this->db->limit(3);
		return $this->db->get()->result_array();
	}

	public function data_galang_by($url) {
		$this->db->select('SUM(donasi_jml) as terkumpul, gd_foto as foto, gd_dana as dana, gd_judul as judul, gd_isi as isi, gd_url as url, gd_id as id');
		$this->db->from('tb_galang_dana');
		$this->db->join('tb_donasi', 'tb_donasi.donasi_gdid = tb_galang_dana.gd_id','left');
		$this->db->where('gd_url', $url);
		$this->db->group_by('gd_id');
		return $this->db->get()->row_array();
	}

	public function data_volunteer() {
		$this->db->select('SUM(donasi_jml) as terkumpul, user_foto as foto, user_nama as nama');
		$this->db->from('tb_donasi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_donasi.donasi_userid');
		$this->db->group_by('user_id');
		$this->db->order_by('donasi_jml', 'DESC');
		$this->db->where('donasi_status', 2);
		$this->db->limit(3);
		return $this->db->get()->result_array();
	}
}