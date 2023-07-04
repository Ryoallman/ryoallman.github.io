<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Welcome_model');
	}

	public function index() {
		$data = array (
			'title'			=>	'Beranda',
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'bloglist'		=>	$this->Welcome_model->data_artikel_index(),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'volunteer'		=>	$this->Welcome_model->data_volunteer(),
			'galang'		=>	$this->Welcome_model->data_galang_dana_index(),
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('home/footer');
	}

	public function about_me() {
		$data = array (
			'title'			=>	'Tentang Kami',
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/about', $data);
		$this->load->view('home/footer');
	}

	public function contact_me() {
		$data = array (
			'title'			=>	'Hubungi Kami',
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
		);
		$this->form_validation->set_rules('pesan', 'pesan', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('email', 'email', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('subjek', 'subjek', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('home/header', $data);
			$this->load->view('home/contact', $data);
			$this->load->view('home/footer');
		}else {
			$isipes = array (
				'id'				=>	md5(time()),
				'nama'				=>	ucwords($this->input->post('nama')),
				'email'				=>	strtolower($this->input->post('email')),
				'subjek'			=>	$this->input->post('subjek'),
				'isi'				=>	$this->input->post('pesan'),
				'tgl'				=>	date('Y-m-d'),
			);
			$this->db->insert('tb_inbox', $isipes);
			$this->session->set_flashdata('flash', 'Pesan anda berhasil dikirim');
			redirect('hubungi-kami');
		}
	}

	public function donate() {
		$data = array (
			'title'			=>	'Donasi',
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'galang'		=>	$this->Welcome_model->data_galang_dana(),
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/donasi', $data);
		$this->load->view('home/footer');
	}

	public function donate_show($url) {
		$cek = $this->db->get_where('tb_galang_dana',['gd_url' => $url])->row_array();
		$data = array (
			'title'			=>	$cek['gd_judul'],
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'galang'		=>	$this->Welcome_model->data_galang_by($url),
		);
		$this->form_validation->set_rules('url', 'url', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('jml', 'jml', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('home/header', $data);
			$this->load->view('home/detail', $data);
			$this->load->view('home/footer');
		}else {
			if($this->session->userdata('uid') == '') {
				redirect('login');
			}
			$sesiin = array (
				'jumlah'		=>	$this->input->post('jml'),
				'url'			=>	$this->input->post('url'),
			);
			$this->session->set_userdata($sesiin);
			$this->session->set_flashdata('flash', 'Silahkan pilih salah satu rekening kami di bawah ini');
			redirect('konfirmasi-donasi');
		}
	}

	public function donate_konfirm() {
		$data = array (
			'title'			=>	'Pilih Rekening',
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'banklist'		=>	$this->db->get('tb_bank')->result_array(),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
		);
		$this->form_validation->set_rules('jml', 'jml', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('bank', 'bank', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('home/header', $data);
			$this->load->view('home/show_bank', $data);
			$this->load->view('home/footer');
		}else {
			$id = md5(rand());
			$simpdon = array (
				'donasi_id'					=>	$id,
				'donasi_userid'				=>	$this->session->userdata('uid'),
				'donasi_gdid'				=>	$this->session->userdata('url'),
				'donasi_jml'				=>	$this->session->userdata('jumlah'),
				'donasi_bank'				=>	$this->input->post('bank'),
				'donasi_time'				=>	date('Y-m-d'),
				'donasi_status'				=>	1,
				'donasi_doa'				=>	$this->input->post('doa'),
			);
			$this->db->insert('tb_donasi', $simpdon);
			redirect('tagihan-donasi/'.$id);
		}
	}

	public function donate_invoice($id) {
		$data = array (
			'title'			=>	'Tagihan',
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'banklist'		=>	$this->db->get('tb_bank')->result_array(),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'donasi'		=>	$this->db->get_where('tb_donasi',['donasi_id' => $id])->row_array(),
		);
		$this->load->view('home/tagihan', $data);
	}

	public function artikel() {
		$data = array (
			'title'			=>	'Blog',
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'bloglist'		=>	$this->Welcome_model->data_artikel(),
			'blogside'		=>	$this->Welcome_model->data_artikel(),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/blog', $data);
		$this->load->view('home/footer');
	}

	public function artikel_single($url) {
		$cek = $this->db->get_where('tb_blog',['post_url' => $url])->row_array();
		$data = array (
			'title'			=>	$cek['post_judul'],
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'blogid'		=>	$this->Welcome_model->data_artikelby($url),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'blogside'		=>	$this->Welcome_model->data_artikel(),
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/single_blog', $data);
		$this->load->view('home/footer');
	}

	public function kategori($kategori) {
		$cek = $this->db->get_where('tb_kategori',['kat_url' => $kategori])->row_array();
		$ini = $cek['kat_id'];
		$data = array (
			'title'			=>	$cek['kat_nama'],
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'bloglist'		=>	$this->Welcome_model->blog_by($ini),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'blogside'		=>	$this->Welcome_model->data_artikel(),
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/blog', $data);
		$this->load->view('home/footer');
	}

	public function pencarian() {
		$key = $this->input->post('cari');
		$data = array (
			'title'			=>	$key,
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
			'bloglist'		=>	$this->Welcome_model->blog_cari($key),
			'meu'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'blogside'		=>	$this->Welcome_model->data_artikel(),
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/blog', $data);
		$this->load->view('home/footer');
	}
}
