<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		if($this->session->userdata('ustatus') != 'sudahlogin') {
			redirect('login');
		}
	}

	public function index() {
		$data = array (
			'title'			=>	'Dashboard',
			'me'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'donasiku'		=>	$this->User_model->donasisaya(),
			'donasix'		=>	$this->db->get_where('tb_donasi',['donasi_userid' => $this->session->userdata('uid')])->num_rows(),
			'galangdana'	=>	$this->db->get_where('tb_galang_dana',['gd_userid' => $this->session->userdata('uid')])->num_rows(),
		);
		$this->load->view('user/header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('user/footer');
	}

	public function galang_dana() {
		$data = array (
			'title'			=>	'Galang Dana',
			'me'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'galang'		=>	$this->User_model->data_galang_dana(),
		);
		$this->load->view('user/header', $data);
		$this->load->view('user/galang_dana', $data);
		$this->load->view('user/footer');
	}

	public function galang_dana_add() {
		$cek = $this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array();
		if($cek['user_dokumen'] == '' AND $cek['user_alamat'] == '') {
			redirect('user/galang-dana');
		}
		$data = array (
			'title'			=>	'Mulai Galang Dana',
			'me'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'galang'		=>	$this->User_model->data_galang_dana(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required|is_unique[tb_galang_dana.gd_judul]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'is_unique'	=>	'Judul ini sudah digunakan']);
		$this->form_validation->set_rules('isi', 'isi', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('jml', 'jml', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tgl', 'tgl', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('user/header', $data);
			$this->load->view('user/galang_dana_add', $data);
			$this->load->view('user/footer');
		}else {
			$this->User_model->simpan_galang_dana();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('user/galang-dana');
		}
	}

	public function galang_dana_edit($id) {
		$cek = $this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array();
		if($cek['user_dokumen'] == '' AND $cek['user_alamat'] == '') {
			redirect('user/galang-dana');
		}
		$data = array (
			'title'			=>	'Edit Galang Dana',
			'me'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'galang'		=>	$this->db->get_where('tb_galang_dana',['gd_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('isi', 'isi', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('jml', 'jml', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tgl', 'tgl', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('user/header', $data);
			$this->load->view('user/galang_dana_edit', $data);
			$this->load->view('user/footer');
		}else {
			$this->User_model->edit_galang_dana($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('user/galang-dana');
		}
	}

	public function galang_dana_del($id) {
		$this->db->where('gd_id', $id);
		$this->db->delete('tb_galang_dana');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('user/galang-dana');
	}

	public function galang_dana_tarik($id) {
		$cek = $this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array();
		if($cek['user_dokumen'] == '' AND $cek['user_alamat'] == '') {
			redirect('user/galang-dana');
		}
		$cekseharusnya = $this->User_model->gdbyid($id);
		$cekseharusnya1 = $cekseharusnya['terkumpul'];
		$potongan10 = $cekseharusnya1 * 10 / 100;
		$sisa = $cekseharusnya['terkumpul'] - $potongan10;
		$cekwd = $this->User_model->wdgdbyid($id);
		if($cekwd > $sisa) {
			redirect('user/galang-dana');
		}
		$data = array (
			'title'			=>	'Tarik Dana',
			'me'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'galang'		=>	$this->User_model->gdbyid($id),
			'sisa'			=>	$this->User_model->wdgdbyid($id),
		);
		$this->form_validation->set_rules('gdid', 'gdid', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('jml', 'jml', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tujuan', 'tujuan', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('user/header', $data);
			$this->load->view('user/tarik_dana', $data);
			$this->load->view('user/footer');
		}else {
			$cekcr = $this->db->get_where('tb_withdrawal',['wd_gdid' => $this->input->post('gdid'),'wd_status' => 0])->row_array();
			if($cekcr) {
				$this->session->set_flashdata('error', 'Anda masih memiliki pengajuan yang sedang di proses.');
				redirect('user/galang-dana/tarik-dana/'.$id);
			}
			$sandi = $this->input->post('password');
			$cek = $this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array();
			if(password_verify($sandi, $cek['user_password'])) {
				$this->User_model->kirim_request($id);
				$this->session->set_flashdata('flash', 'Permintaan pencairan dana terkirim');
				redirect('user/penarikan');
			}else {
				$this->session->set_flashdata('error', 'Konfirmasi password salah');
				redirect('user/galang-dana/tarik-dana/'.$id);
			}
		}
	}

	public function penarikan() {
		$data = array (
			'title'			=>	'Permintaan Pencairan Dana',
			'me'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'pencairan'		=>	$this->User_model->data_pencairan(),
		);
		$this->load->view('user/header', $data);
		$this->load->view('user/penarikan', $data);
		$this->load->view('user/footer');
	}

	public function penarikan_del($id) {
		$cek = $this->db->get_where('tb_withdrawal',['wd_id' => $id, 'wd_status' => 1])->row_array();
		if($cek) {
			redirect('user/penarikan');
		}
		$this->db->where('wd_id', $id);
		$this->db->delete('tb_withdrawal');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('user/penarikan');
	}

	public function donasi() {
		$data = array (
			'title'			=>	'Donasi Saya',
			'me'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
			'donasi'		=>	$this->User_model->data_donasi(),
		);
		$this->load->view('user/header', $data);
		$this->load->view('user/donasi', $data);
		$this->load->view('user/footer');
	}

	public function dokumen() {
		$data = array (
			'title'			=>	'Tambahkan Dokumen',
			'me'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
		);
		$this->form_validation->set_rules('id', 'id', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('user/header', $data);
			$this->load->view('user/dokumen', $data);
			$this->load->view('user/footer');
		}else {
			$this->User_model->simpan_dokumen();
			$this->session->set_flashdata('flash', 'Dokumen berhasil diupload');
			redirect('user/dokumen');
		}
	}

	public function set_password() {
		$data = array (
			'title'			=>	'Atur Password',
			'me'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
		);
		$this->form_validation->set_rules('password1', 'password1', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'matches'	=>	'Konfirmasi password baru salah']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('user/header', $data);
			$this->load->view('user/password', $data);
			$this->load->view('user/footer');
		}else {
			$this->User_model->simpan_password();
		}
	}

	public function set_profil() {
		$data = array (
			'title'			=>	'Atur Profil',
			'me'			=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'valid_email'=>	'Email harus valid']);
		$this->form_validation->set_rules('telp', 'telp', 'required|numeric', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Harus angka']);
		$this->form_validation->set_rules('alamat', 'alamat', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('user/header', $data);
			$this->load->view('user/profil', $data);
			$this->load->view('user/footer');
		}else {
			$this->User_model->simpan_profil();
		}
	}
}