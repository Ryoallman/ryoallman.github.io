<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		if($this->session->userdata('status') != 'oklog') {
			redirect('auth');
		}
	}

	public function index() {
		$data = array (
			'title'			=>	'Dashboard',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'trx'			=>	$this->db->get('tb_donasi')->num_rows(),
			'profit'		=>	$this->Admin_model->profit(),
			'pengguna'		=>	$this->db->get('tb_users')->num_rows(),
			'galang'		=>	$this->db->get('tb_galang_dana')->num_rows(),
			'listdonasi'	=>	$this->Admin_model->data_donasi_index(),
			'topdonatur'	=>	$this->Admin_model->data_volunteer_index(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('admin/footer');
	}

	public function donasi() {
		$data = array (
			'title'			=>	'Donasi',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'donasi'		=>	$this->Admin_model->data_donasi(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/donasi', $data);
		$this->load->view('admin/footer');
	}

	public function donasi_masuk($id) {
		$this->db->set('donasi_status', 2);
		$this->db->where('donasi_id', $id);
		$this->db->update('tb_donasi');
		redirect('admin/donasi');
	}

	public function donasi_tolak($id) {
		$this->db->set('donasi_status', 3);
		$this->db->where('donasi_id', $id);
		$this->db->update('tb_donasi');
		redirect('admin/donasi');
	}

	public function galdan() {
		$data = array (
			'title'			=>	'Galang Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'galangdana'	=>	$this->Admin_model->data_galdan(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/galang_dana', $data);
		$this->load->view('admin/footer');
	}

	public function galdan_acc($id) {
		$this->db->set('gd_status', 1);
		$this->db->where('gd_id', $id);
		$this->db->update('tb_galang_dana');
		redirect('admin/galang-dana');
	}

	public function galdan_end($id) {
		$this->db->set('gd_status', 2);
		$this->db->where('gd_id', $id);
		$this->db->update('tb_galang_dana');
		redirect('admin/galang-dana');
	}

	public function galdan_tolak($id) {
		$this->db->set('gd_status', 3);
		$this->db->where('gd_id', $id);
		$this->db->update('tb_galang_dana');
		redirect('admin/galang-dana/alasan-penolakan/'.$id);
	}

	public function galdan_alasantolak($id) {
		$data = array (
			'title'			=>	'Alasan Penolakan',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'galangdana'	=>	$this->Admin_model->data_galdan(),
		);
		$this->form_validation->set_rules('alasan', 'alasan', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/galang_dana_tolak', $data);
			$this->load->view('admin/footer');
		}else {
			$this->db->set('gd_alasan', $this->input->post('alasan'));
			$this->db->where('gd_id', $id);
			$this->db->update('tb_galang_dana');
			redirect('admin/galang-dana');
		}
	}

	public function pengguna() {
		$data = array (
			'title'			=>	'Pengguna',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'users'			=>	$this->Admin_model->data_pengguna(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/users', $data);
		$this->load->view('admin/footer');
	}

	public function user_aktif($id) {
		$this->db->set('user_status', 1);
		$this->db->where('user_id', $id);
		$this->db->update('tb_users');
		$this->session->set_flashdata('flash','Pengguna berhasil di aktifkan');
		redirect('admin/pengguna');
	}

	public function user_blok($id) {
		$this->db->set('user_status', 2);
		$this->db->where('user_id', $id);
		$this->db->update('tb_users');
		$this->session->set_flashdata('flash','Pengguna berhasil di blokir');
		redirect('admin/pengguna');
	}

	public function pencairan() {
		$data = array (
			'title'			=>	'Permintaan Pencairan Donasi',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'pencairan'		=>	$this->Admin_model->data_pencairan(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/pencairan', $data);
		$this->load->view('admin/footer');
	}

	public function wd_ok($id) {
		$this->db->set('wd_status', 1);
		$this->db->where('wd_id', $id);
		$this->db->update('tb_withdrawal');
		redirect('admin/pencairan');
	}

	public function wd_no($id) {
		$this->db->set('wd_status', 2);
		$this->db->where('wd_id', $id);
		$this->db->update('tb_withdrawal');
		redirect('admin/pencairan');
	}

	public function laporan_top_donatur() {
		$data = array (
			'title'			=>	'Laporan Top Donatur',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'donatur'		=>	$this->Admin_model->data_volunteer(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/donatur', $data);
		$this->load->view('admin/footer');
	}

	public function laporan_top_donatur_excel() {
		$data = array (
			'title'			=>	'Laporan Top Donatur',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'donatur'		=>	$this->Admin_model->data_volunteer(),
		);
		$this->load->view('admin/topdon_excel', $data);
	}

	public function laporan_top_donatur_print() {
		$data = array (
			'title'			=>	'Laporan Top Donatur',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'donatur'		=>	$this->Admin_model->data_volunteer(),
		);
		$this->load->view('admin/topdon_print', $data);
	}

	public function laporan_donasi_masuk() {
		$mulai = $this->input->post('start');
		$sampai = $this->input->post('end');
		if($mulai == '' AND $sampai == '') {
			$data = array (
				'title'			=>	'Laporan Donasi Masuk',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'donasi'		=>	$this->Admin_model->data_donasi(),
				'mulai'			=>	$mulai,
				'sampai'		=>	$sampai,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_donasi_masuk', $data);
			$this->load->view('admin/footer');
		}else {
			$data = array (
				'title'			=>	'Laporan Donasi Masuk',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'donasi'		=>	$this->Admin_model->laporan_donasi_sortir(array($mulai,$sampai)),
				'mulai'			=>	$mulai,
				'sampai'		=>	$sampai,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_donasi_masuk', $data);
			$this->load->view('admin/footer');
		}
	}

	public function laporan_donasi_excel() {
		$data = array (
			'title'			=>	'Laporan Donasi Masuk',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'donasi'		=>	$this->Admin_model->data_donasi(),
		);
		$this->load->view('admin/donasi_masuk_excel', $data);
	}

	public function laporan_donasi_print() {
		$data = array (
			'title'			=>	'Laporan Donasi Masuk',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'donasi'		=>	$this->Admin_model->data_donasi(),
		);
		$this->load->view('admin/donasi_masuk_print', $data);
	}

	public function laporan_donasi_excel_by($mulai,$sampai) {
		$data = array (
			'title'			=>	'Laporan Donasi Masuk',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'donasi'		=>	$this->Admin_model->laporan_donasi_sortir(array($mulai,$sampai)),
		);
		$this->load->view('admin/donasi_masuk_excel', $data);
	}

	public function laporan_donasi_print_by($mulai,$sampai) {
		$data = array (
			'title'			=>	'Laporan Donasi Masuk',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'donasi'		=>	$this->Admin_model->laporan_donasi_sortir(array($mulai,$sampai)),
		);
		$this->load->view('admin/donasi_masuk_print', $data);
	}

	public function laporan_galang_dana() {
		$status = $this->input->post('status');
		if($status == '') {
			$data = array (
				'title'			=>	'Laporan Galang Dana',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'galang'		=>	$this->Admin_model->data_galdan(),
				'status'		=>	$status,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_galang_dana', $data);
			$this->load->view('admin/footer');
		}else {
			$data = array (
				'title'			=>	'Laporan Galang Dana',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'galang'		=>	$this->Admin_model->data_galdan_sortir($status),
				'status'		=>	$status,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_galang_dana', $data);
			$this->load->view('admin/footer');
		}
	}

	public function laporan_galang_dana_print() {
		$data = array (
			'title'			=>	'Laporan Galang Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'galang'		=>	$this->Admin_model->data_galdan(),
		);
		$this->load->view('admin/galang_dana_print', $data);
	}

	public function laporan_galang_dana_excel() {
		$data = array (
			'title'			=>	'Laporan Galang Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'galang'		=>	$this->Admin_model->data_galdan(),
		);
		$this->load->view('admin/galang_dana_excel', $data);
	}

	public function laporan_galang_dana_print_by($status) {
		$data = array (
			'title'			=>	'Laporan Galang Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'galang'		=>	$this->Admin_model->data_galdan_sortir($status),
		);
		$this->load->view('admin/galang_dana_print', $data);
	}

	public function laporan_galang_dana_excel_by($status) {
		$data = array (
			'title'			=>	'Laporan Galang Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'galang'		=>	$this->Admin_model->data_galdan_sortir($status),
		);
		$this->load->view('admin/galang_dana_excel', $data);
	}

	public function laporan_pengguna() {
		$status = $this->input->post('status');
		if($status == '') {
			$data = array (
				'title'			=>	'Laporan Pengguna',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'users'			=>	$this->Admin_model->data_pengguna(),
				'status'		=>	$status,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_pengguna', $data);
			$this->load->view('admin/footer');
		}else {
			$data = array (
				'title'			=>	'Laporan Pengguna',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'users'			=>	$this->Admin_model->data_pengguna_sortir($status),
				'status'		=>	$status,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_pengguna', $data);
			$this->load->view('admin/footer');
		}
	}

	public function laporan_pengguna_print() {
		$data = array (
			'title'			=>	'Laporan Pengguna',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'users'			=>	$this->Admin_model->data_pengguna(),
		);
		$this->load->view('admin/pengguna_print', $data);
	}

	public function laporan_pengguna_excel() {
		$data = array (
			'title'			=>	'Laporan Pengguna',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'users'			=>	$this->Admin_model->data_pengguna(),
		);
		$this->load->view('admin/pengguna_excel', $data);
	}

	public function laporan_pengguna_print_by($status) {
		$data = array (
			'title'			=>	'Laporan Pengguna',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'users'			=>	$this->Admin_model->data_pengguna_sortir($status),
		);
		$this->load->view('admin/pengguna_print', $data);
	}

	public function laporan_pengguna_excel_by($status) {
		$data = array (
			'title'			=>	'Laporan Pengguna',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'users'			=>	$this->Admin_model->data_pengguna_sortir($status),
		);
		$this->load->view('admin/pengguna_excel', $data);
	}

	public function laporan_pencairan() {
		$mulai = $this->input->post('start');
		$sampai = $this->input->post('end');
		$status = $this->input->post('status');
		if($mulai == '' AND $sampai == '' AND $status == '') {
			$data = array (
				'title'			=>	'Laporan Permintaan Pencairan Dana',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'pencairan'		=>	$this->Admin_model->data_pencairan(),
				'mulai'			=>	$mulai,
				'sampai'		=>	$sampai,
				'status'		=>	$status,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_pencairan', $data);
			$this->load->view('admin/footer');
		}else if($mulai == '' AND $sampai == '' AND $status != '') {
			$data = array (
				'title'			=>	'Laporan Permintaan Pencairan Dana',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'pencairan'		=>	$this->Admin_model->data_pencairan_sortirbystatus($status),
				'mulai'			=>	$mulai,
				'sampai'		=>	$sampai,
				'status'		=>	$status,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_pencairan', $data);
			$this->load->view('admin/footer');
		}else if($status == '' AND $mulai != '' AND $sampai != '') {
			$data = array (
				'title'			=>	'Laporan Permintaan Pencairan Dana',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'pencairan'		=>	$this->Admin_model->data_pencairan_sortirtgl(array($mulai,$sampai)),
				'mulai'			=>	$mulai,
				'sampai'		=>	$sampai,
				'status'		=>	$status,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_pencairan', $data);
			$this->load->view('admin/footer');
		}else {
			$data = array (
				'title'			=>	'Laporan Permintaan Pencairan Dana',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'pencairan'		=>	$this->Admin_model->data_pencairan_sortirtglstatus(array($mulai,$sampai),$status),
				'mulai'			=>	$mulai,
				'sampai'		=>	$sampai,
				'status'		=>	$status,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_pencairan', $data);
			$this->load->view('admin/footer');
		}
	}

	public function laporan_pencairan_excel() {
		$data = array (
			'title'			=>	'Laporan Permintaan Pencairan Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'pencairan'		=>	$this->Admin_model->data_pencairan(),
		);
		$this->load->view('admin/pencairan_excel', $data);
	}

	public function laporan_pencairan_print() {
		$data = array (
			'title'			=>	'Laporan Permintaan Pencairan Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'pencairan'		=>	$this->Admin_model->data_pencairan(),
		);
		$this->load->view('admin/pencairan_print', $data);
	}

	public function laporan_pencairan_excel_status($status) {
		$data = array (
			'title'			=>	'Laporan Permintaan Pencairan Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'pencairan'		=>	$this->Admin_model->data_pencairan_sortirbystatus($status),
		);
		$this->load->view('admin/pencairan_excel', $data);
	}

	public function laporan_pencairan_print_status($status) {
		$data = array (
			'title'			=>	'Laporan Permintaan Pencairan Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'pencairan'		=>	$this->Admin_model->data_pencairan_sortirbystatus($status),
		);
		$this->load->view('admin/pencairan_print', $data);
	}

	public function laporan_pencairan_excel_date($mulai,$sampai) {
		$data = array (
			'title'			=>	'Laporan Permintaan Pencairan Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'pencairan'		=>	$this->Admin_model->data_pencairan_sortirtgl(array($mulai,$sampai)),
		);
		$this->load->view('admin/pencairan_excel', $data);
	}

	public function laporan_pencairan_print_date($mulai,$sampai) {
		$data = array (
			'title'			=>	'Laporan Permintaan Pencairan Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'pencairan'		=>	$this->Admin_model->data_pencairan_sortirtgl(array($mulai,$sampai)),
		);
		$this->load->view('admin/pencairan_print', $data);
	}

	public function laporan_pencairan_excel_datestatus($mulai,$sampai,$status) {
		$data = array (
			'title'			=>	'Laporan Permintaan Pencairan Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'pencairan'		=>	$this->Admin_model->data_pencairan_sortirtglstatus(array($mulai,$sampai),$status),
		);
		$this->load->view('admin/pencairan_excel', $data);
	}

	public function laporan_pencairan_print_datestatus($mulai,$sampai,$status) {
		$data = array (
			'title'			=>	'Laporan Permintaan Pencairan Dana',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'pencairan'		=>	$this->Admin_model->data_pencairan_sortirtglstatus(array($mulai,$sampai),$status),
		);
		$this->load->view('admin/pencairan_print', $data);
	}

	public function laporan_laba() {
		$status = $this->input->post('status');
		if($status == '') {
			$data = array (
				'title'			=>	'Laporan Keuntungan',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'galang'		=>	$this->Admin_model->data_galdan(),
				'status'		=>	$status,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_keuntungan', $data);
			$this->load->view('admin/footer');
		}else {
			$data = array (
				'title'			=>	'Laporan Keuntungan',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'galang'		=>	$this->Admin_model->data_galdan_sortir($status),
				'status'		=>	$status,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan_keuntungan', $data);
			$this->load->view('admin/footer');
		}
	}

	public function laporan_keuntungan_print() {
		$data = array (
			'title'			=>	'Laporan Keuntungan',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'galang'		=>	$this->Admin_model->data_galdan(),
		);
		$this->load->view('admin/keuntungan_print', $data);
	}

	public function laporan_keuntungan_excel() {
		$data = array (
			'title'			=>	'Laporan Keuntungan',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'galang'		=>	$this->Admin_model->data_galdan(),
		);
		$this->load->view('admin/keuntungan_excel', $data);
	}

	public function laporan_keuntungan_print_by($status) {
		$data = array (
			'title'			=>	'Laporan Keuntungan',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'galang'		=>	$this->Admin_model->data_galdan_sortir($status),
		);
		$this->load->view('admin/keuntungan_print', $data);
	}

	public function laporan_keuntungan_excel_by($status) {
		$data = array (
			'title'			=>	'Laporan Keuntungan',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'galang'		=>	$this->Admin_model->data_galdan_sortir($status),
		);
		$this->load->view('admin/keuntungan_excel', $data);
	}

	public function set_about() {
		$data = array (
			'title'			=>	'Pengaturan Profil Perusahaan',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'profil'		=>	$this->db->get_where('tb_profil',['id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/about', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_about();
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/pengaturan/profil');
		}
	}

	public function set_rekening() {
		$data = array (
			'title'			=>	'Rekening',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'rekening'		=>	$this->Admin_model->data_rekening(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/rekening', $data);
		$this->load->view('admin/footer');
	}

	public function set_rekening_add() {
		$data = array (
			'title'			=>	'Input Rekening',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('no', 'no', 'required|is_unique[tb_bank.bank_no]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'is_unique'	=>	'Nomor rekening sudah ada']);
		$this->form_validation->set_rules('an', 'an', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kode', 'kode', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('status', 'status', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/rekening_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_rekening();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/pengaturan/rekening');
		}
	}

	public function set_rekening_edit($id) {
		$data = array (
			'title'			=>	'Edit Rekening',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'bank'			=>	$this->db->get_where('tb_bank',['bank_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('no', 'no', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('an', 'an', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kode', 'kode', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('status', 'status', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/rekening_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_rekening($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/pengaturan/rekening');
		}
	}

	public function set_rekening_del($id) {
		$this->db->where('bank_id', $id);
		$this->db->delete('tb_bank');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/pengaturan/rekening');
	}

	public function set_email() {
		$data = array (
			'title'			=>	'Pengaturan Email Aktivasi',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'email'			=>	$this->db->get_where('tb_email',['email_id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('email', 'email', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/email', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_email();
			$this->session->set_flashdata('flash', 'Email berhasil diperbaharui');
			redirect('admin/pengaturan/email');
		}
	}

	public function inbox() {
		$data = array (
			'title'			=>	'Pesan Masuk',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'inbox'			=>	$this->Admin_model->data_inbox(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/inbox', $data);
		$this->load->view('admin/footer');
	}

	public function pos_kategori() {
		$data = array (
			'title'			=>	'Kategori',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kategori'		=>	$this->Admin_model->data_kategori(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('admin/footer');
	}

	public function pos_kategori_add() {
		$data = array (
			'title'			=>	'Input Kategori',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/kategori_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_kategori();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/postingan/kategori');
		}
	}

	public function pos_kategori_del($id) {
		$this->db->where('kat_id', $id);
		$this->db->delete('tb_kategori');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/postingan/kategori');
	}

	public function pos_artikel() {
		$data = array (
			'title'			=>	'Artikel',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'artikel'		=>	$this->Admin_model->data_blog(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/artikel', $data);
		$this->load->view('admin/footer');
	}

	public function pos_artikel_add() {
		$data = array (
			'title'			=>	'Buat Artikel',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kategori'		=>	$this->Admin_model->data_kategori(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('isi', 'isi', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/artikel_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_artikel();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/postingan/artikel');
		}
	}

	public function pos_artikel_edit($id) {
		$data = array (
			'title'			=>	'Edit Artikel',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kategori'		=>	$this->Admin_model->data_kategori(),
			'blog'			=>	$this->db->get_where('tb_blog',['post_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('isi', 'isi', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/artikel_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_artikel($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/postingan/artikel');
		}
	}

	public function pos_artikel_del($id) {
		$this->db->where('post_id', $id);
		$this->db->delete('tb_blog');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/postingan/artikel');
	}

	public function atur_profil() {
		$data = array (
			'title'			=>	'Atur Profil',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'valid_email'=>	'Email harus valid']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/profil', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->update_profil();
		}
	}

	public function atur_pass() {
		$data = array (
			'title'			=>	'Atur Password',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('password1', 'password1', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'matches'	=>	'Konfirmasi password baru salah']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/password', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->update_password();
		}
	}
}