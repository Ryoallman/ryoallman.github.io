<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function data_donasi_index() {
		$this->db->select('*');
		$this->db->from('tb_donasi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_donasi.donasi_userid');
		$this->db->order_by('donasi_tgl', 'DESC');
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}

	public function data_donasi() {
		$this->db->select('*');
		$this->db->from('tb_donasi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_donasi.donasi_userid');
		$this->db->order_by('donasi_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function data_galdan() {
		$this->db->select('gd_tgl as tglpost, user_foto as ufoto, user_nama as unama, user_telp as utelp, gd_dana as dana, gd_tgl_selesai as tglend, gd_judul as judul, gd_status as status, SUM(donasi_jml) as terkumpul, gd_id as id, gd_foto as fotogd');
		$this->db->from('tb_galang_dana');
		$this->db->join('tb_donasi', 'tb_donasi.donasi_gdid = tb_galang_dana.gd_id','left');
		$this->db->join('tb_users', 'tb_users.user_id = tb_galang_dana.gd_userid');
		$this->db->order_by('gd_tgl', 'DESC');
		$this->db->group_by('gd_id');
		return $this->db->get()->result_array();
	}

	public function data_pengguna() {
		$this->db->order_by('user_nama', 'ASC');
		return $this->db->get('tb_users')->result_array();
	}

	public function data_rekening() {
		return $this->db->get('tb_bank')->result_array();
	}

	public function simpan_rekening() {
		$data = array (
			'bank_nama'			=>   strtoupper($this->input->post('nama')),
			'bank_no'			=>   $this->input->post('no'),
			'bank_an'			=>   $this->input->post('an'),
			'bank_kode'			=>   $this->input->post('kode'),
			'bank_status'		=>   $this->input->post('status'),
		);
	
		$this->db->insert('tb_bank', $data);
	}

	public function edit_rekening($id) {
		$data = array (
			'bank_nama'			=>   strtoupper($this->input->post('nama')),
			'bank_no'			=>   $this->input->post('no'),
			'bank_an'			=>   $this->input->post('an'),
			'bank_kode'			=>   $this->input->post('kode'),
			'bank_status'		=>   $this->input->post('status'),
		);
	
		$this->db->where('bank_id', $id);
		$this->db->update('tb_bank', $data);
	}

	public function data_pencairan() {
		$this->db->select('*');
		$this->db->from('tb_withdrawal');
		$this->db->join('tb_users', 'tb_users.user_id = tb_withdrawal.wd_dari');
		$this->db->join('tb_galang_dana', 'tb_galang_dana.gd_id = tb_withdrawal.wd_gdid');
		$this->db->order_by('wd_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function data_pencairan_sortirtgl($daterange) {
		$this->db->select('*');
		$this->db->from('tb_withdrawal');
		$this->db->join('tb_users', 'tb_users.user_id = tb_withdrawal.wd_dari');
		$this->db->join('tb_galang_dana', 'tb_galang_dana.gd_id = tb_withdrawal.wd_gdid');
		$this->db->where('wd_tgl >=', $daterange[0]);
		$this->db->where('wd_tgl <=', $daterange[1]);
		$this->db->order_by('wd_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function data_pencairan_sortirtglstatus($daterange,$status) {
		$this->db->select('*');
		$this->db->from('tb_withdrawal');
		$this->db->join('tb_users', 'tb_users.user_id = tb_withdrawal.wd_dari');
		$this->db->join('tb_galang_dana', 'tb_galang_dana.gd_id = tb_withdrawal.wd_gdid');
		$this->db->where('wd_tgl >=', $daterange[0]);
		$this->db->where('wd_tgl <=', $daterange[1]);
		$this->db->where('wd_status', $status);
		$this->db->order_by('wd_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function data_pencairan_sortirbystatus($status) {
		$this->db->select('*');
		$this->db->from('tb_withdrawal');
		$this->db->join('tb_users', 'tb_users.user_id = tb_withdrawal.wd_dari');
		$this->db->join('tb_galang_dana', 'tb_galang_dana.gd_id = tb_withdrawal.wd_gdid');
		$this->db->where('wd_status', $status);
		$this->db->order_by('wd_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function profit() {
		$this->db->select('SUM(donasi_jml) as profitus');
		$this->db->where('donasi_status', 2);
		$this->db->from('tb_donasi');
		return $this->db->get()->row()->profitus;
	}

	public function data_volunteer_index() {
		$this->db->select('SUM(donasi_jml) as terkumpul, user_foto as foto, user_nama as nama');
		$this->db->from('tb_donasi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_donasi.donasi_userid');
		$this->db->group_by('user_id');
		$this->db->order_by('donasi_jml', 'DESC');
		$this->db->where('donasi_status', 2);
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}

	public function data_volunteer() {
		$this->db->select('SUM(donasi_jml) as terkumpul, user_foto as foto, user_nama as nama, user_telp as telp');
		$this->db->from('tb_donasi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_donasi.donasi_userid');
		$this->db->group_by('user_id');
		$this->db->order_by('donasi_jml', 'DESC');
		$this->db->where('donasi_status', 2);
		return $this->db->get()->result_array();
	}

	public function laporan_donasi_sortir($daterange) {
		$this->db->select('*');
		$this->db->from('tb_donasi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_donasi.donasi_userid');
		$this->db->where('donasi_time >=', $daterange[0]);
		$this->db->where('donasi_time <=', $daterange[1]);
		$this->db->order_by('donasi_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function data_galdan_sortir($status) {
		$this->db->select('gd_tgl as tglpost, user_foto as ufoto, user_nama as unama, user_telp as utelp, gd_dana as dana, gd_tgl_selesai as tglend, gd_judul as judul, gd_status as status, SUM(donasi_jml) as terkumpul, gd_id as id, gd_foto as fotogd');
		$this->db->from('tb_galang_dana');
		$this->db->join('tb_donasi', 'tb_donasi.donasi_gdid = tb_galang_dana.gd_id','left');
		$this->db->join('tb_users', 'tb_users.user_id = tb_galang_dana.gd_userid');
		$this->db->where('gd_status', $status);
		$this->db->order_by('gd_tgl', 'DESC');
		$this->db->group_by('gd_id');
		return $this->db->get()->result_array();
	}

	public function data_pengguna_sortir($status) {
		$this->db->where('user_status', $status);
		$this->db->order_by('user_nama', 'ASC');
		return $this->db->get('tb_users')->result_array();
	}

	public function simpan_about() {
		$data = array (
			'nama'			=>   $this->input->post('nama'),
			'email'			=>   strtolower($this->input->post('email')),
			'telp'			=>   $this->input->post('telp'),
			'facebook'		=>   $this->input->post('fb'),
			'instagram'		=>   $this->input->post('ig'),
			'twitter'		=>   $this->input->post('tw'),
			'alamat'		=>   $this->input->post('alamat'),
		);
	
		$this->db->where('id', 1);
		$this->db->update('tb_profil', $data);
	}

	public function data_inbox() {
		$this->db->order_by('tgl', 'DESC');
		return $this->db->get('tb_inbox')->result_array();
	}

	public function data_kategori() {
		return $this->db->get('tb_kategori')->result_array();
	}

	public function simpan_kategori() {
		$url = url_title(strtolower($this->input->post('kategori')), 'dash', TRUE);
		$data = array (
			'kat_id'		=>   md5(time()),
			'kat_nama'		=>   ucwords($this->input->post('kategori')),
			'kat_url'		=>   $url,
		);
	
		$this->db->insert('tb_kategori', $data);
	}

	public function data_blog() {
		$this->db->select('*');
		$this->db->from('tb_blog');
		$this->db->join('tb_kategori', 'tb_kategori.kat_id = tb_blog.post_kategori');
		$this->db->order_by('post_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function simpan_artikel() {
	    $url = url_title(strtolower($this->input->post('judul')), 'dash', TRUE);
	
	    // get foto
	    $config['upload_path'] = './assets/home/img/blog/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'post_id'			=>	md5(rand()),
                    'post_kategori'		=>	$this->input->post('kategori'),
                    'post_judul'		=>	ucwords($this->input->post('judul')),
                    'post_isi'			=>	$this->input->post('isi'),
					'post_foto'			=>	$gambar['file_name'],
                    'post_url'			=>	$url,
                );
           }
	    }else {
	    	$this->session->set_flashdata('error', 'Kolom gambar masih kosong');
			redirect('admin/postingan/artikel/new');
	    }
	
		$this->db->insert('tb_blog', $data);
	}
	
	public function edit_artikel($id) {
	    $url = url_title(strtolower($this->input->post('judul')), 'dash', TRUE);
	
	    // get foto
	    $config['upload_path'] = './assets/home/img/blog/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'post_kategori'		=>	$this->input->post('kategori'),
                    'post_judul'		=>	ucwords($this->input->post('judul')),
                    'post_isi'			=>	$this->input->post('isi'),
					'post_foto'			=>	$gambar['file_name'],
                    'post_url'			=>	$url,
                );
           }
	    }else {
	    	$data = array(
	            'post_kategori'		=>	$this->input->post('kategori'),
                'post_judul'		=>	ucwords($this->input->post('judul')),
                'post_isi'			=>	$this->input->post('isi'),
				'post_foto'			=>	$this->input->post('gambar_old'),
                'post_url'			=>	$url,
	        );
	    }
	
		$this->db->where('post_id', $id);
		$this->db->update('tb_blog', $data);
	}

	public function update_password() {
		$sandi = $this->input->post('password');
		$sandi2 = password_hash($this->input->post('password2'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array();

		if(password_verify($sandi, $cek['admin_password'])) {
			$this->db->set('admin_password', $sandi2);
			$this->db->where('admin_id', $this->session->userdata('id'));
			$this->db->update('tb_admin');
			$this->session->set_flashdata('flash', 'Password anda berhasil diperbaharui');
			redirect('admin/atur/password');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password lama salah');
			redirect('admin/atur/password');
		}
	}

	public function update_profil() {
		$sandi = $this->input->post('password');
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array();

		if(password_verify($sandi, $cek['admin_password'])) {

			// get foto
		    $config['upload_path'] = 'assets/admin/img/profiles/';
		    $config['allowed_types'] = 'jpg|png|jpeg|gif';
		    $config['encrypt_name'] = TRUE;
		
		    $this->upload->initialize($config);
		    if (!empty($_FILES['gambar']['name'])) {
		        if ( $this->upload->do_upload('gambar') ) {
		            $gambar = $this->upload->data();
		                
		            $data = array(
	                    'admin_nama'			=>	ucwords($this->input->post('nama')),
	                    'admin_email'			=>	strtolower($this->input->post('email')),
						'admin_foto'			=>	$gambar['file_name'],
	                );
	           }
		    }else {
		    	$data = array(
	                'admin_nama'			=>	ucwords($this->input->post('nama')),
                    'admin_email'			=>	strtolower($this->input->post('email')),
					'admin_foto'			=>	$this->input->post('gambar_old'),
		        );
		    }

			$this->db->where('admin_id', $this->session->userdata('id'));
			$this->db->update('tb_admin', $data);
			$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
			redirect('admin/atur/profil');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password salah');
			redirect('admin/atur/profil');
		}
	}

	public function simpan_email() {
		$data = array (
			'email'					=>   strtolower($this->input->post('email')),
			'email_password'		=>   $this->input->post('password'),
		);
	
		$this->db->where('email_id', 1);
		$this->db->update('tb_email', $data);
	}
}