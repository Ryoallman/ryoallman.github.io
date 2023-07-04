<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function data_galang_dana() {
		$this->db->select('gd_tgl as tglpost, gd_dana as dana, gd_tgl_selesai as tglend, gd_judul as judul, gd_status as status, SUM(donasi_jml) as terkumpul, gd_id as id');
		$this->db->from('tb_galang_dana');
		$this->db->join('tb_donasi', 'tb_donasi.donasi_gdid = tb_galang_dana.gd_id','left');
		$this->db->order_by('gd_tgl', 'DESC');
		$this->db->group_by('gd_id');
		$this->db->where('gd_userid', $this->session->userdata('uid'));
		return $this->db->get()->result_array();
	}

	public function simpan_galang_dana() {
	    $url = url_title(strtolower($this->input->post('judul')), 'dash', TRUE);
	
	    // get foto
	    $config['upload_path'] = './assets/home/img/causes/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array (
					'gd_id'				=>   md5(rand()),
					'gd_url'			=>   $url,
					'gd_tgl_selesai'	=>   $this->input->post('tgl'),
					'gd_userid'			=>   $this->session->userdata('uid'),
					'gd_judul'			=>   ucwords($this->input->post('judul')),
					'gd_isi'			=>   $this->input->post('isi'),
					'gd_dana'			=>   $this->input->post('jml'),
					'gd_time'			=>   date('Y-m-d'),
					'gd_status'			=>   0,
					'gd_foto'			=>   $gambar['file_name'],
				);
           }
	    }else {
	    	$this->session->set_flashdata('error', 'Kolom foto tidak boleh kosong');
			redirect('user/galang-dana/new');
	    }
	
		$this->db->insert('tb_galang_dana', $data);
	}
	
	public function edit_galang_dana($id) {
	    $url = url_title(strtolower($this->input->post('judul')), 'dash', TRUE);
	
	    // get foto
	    $config['upload_path'] = './assets/home/img/causes/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'gd_url'			=>   $url,
					'gd_tgl_selesai'	=>   $this->input->post('tgl'),
					'gd_judul'			=>   ucwords($this->input->post('judul')),
					'gd_isi'			=>   $this->input->post('isi'),
					'gd_dana'			=>   $this->input->post('jml'),
					'gd_status'			=>   0,
					'gd_foto'			=>   $gambar['file_name'],
                );
           }
	    }else {
	    	$data = array(
	            'gd_url'			=>   $url,
				'gd_tgl_selesai'	=>   $this->input->post('tgl'),
				'gd_judul'			=>   ucwords($this->input->post('judul')),
				'gd_isi'			=>   $this->input->post('isi'),
				'gd_dana'			=>   $this->input->post('jml'),
				'gd_status'			=>   0,
				'gd_foto'			=>	 $this->input->post('gambar_old'),
	        );
	    }
	
		$this->db->where('gd_id', $id);
		$this->db->update('tb_galang_dana', $data);
	}

	public function data_donasi() {
		$this->db->select('*');
		$this->db->from('tb_donasi');
		$this->db->join('tb_galang_dana', 'tb_galang_dana.gd_id = tb_donasi.donasi_gdid');
		$this->db->order_by('donasi_tgl', 'DESC');
		$this->db->where('donasi_userid', $this->session->userdata('uid'));
		return $this->db->get()->result_array();
	}

	public function simpan_dokumen() {
	
	    // get foto
	    $config['upload_path'] = './assets/user/dokumen/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array (
					'user_dokumen'			=>   $gambar['file_name'],
				);
           }
	    }else {
	    	$this->session->set_flashdata('error', 'Kolom dokumen tidak boleh kosong');
			redirect('user/dokumen');
	    }
	
		$this->db->where('user_id', $this->session->userdata('uid'));
		$this->db->update('tb_users', $data);
	}

	public function simpan_password() {
		$sandi = $this->input->post('password');
		$sandi2 = password_hash($this->input->post('password2'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array();

		if(password_verify($sandi, $cek['user_password'])) {
			$this->db->set('user_password', $sandi2);
			$this->db->where('user_id', $this->session->userdata('uid'));
			$this->db->update('tb_users');
			$this->session->set_flashdata('flash', 'Password anda berhasil diperbaharui');
			redirect('user/pengaturan/password');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password lama salah');
			redirect('user/pengaturan/password');
		}
	}

	public function simpan_profil() {
		$sandi = $this->input->post('password');
		$cek = $this->db->get_where('tb_users',['user_id' => $this->session->userdata('uid')])->row_array();

		if(password_verify($sandi, $cek['user_password'])) {

			// get foto
		    $config['upload_path'] = 'assets/user/images/avatar/';
		    $config['allowed_types'] = 'jpg|png|jpeg|gif';
		    $config['encrypt_name'] = TRUE;
		
		    $this->upload->initialize($config);
		    if (!empty($_FILES['gambar']['name'])) {
		        if ( $this->upload->do_upload('gambar') ) {
		            $gambar = $this->upload->data();
		                
		            $data = array(
	                    'user_nama'				=>	ucwords($this->input->post('nama')),
	                    'user_email'			=>	strtolower($this->input->post('email')),
	                    'user_telp'				=>	$this->input->post('telp'),
	                    'user_alamat'			=>	$this->input->post('alamat'),
						'user_foto'				=>	$gambar['file_name'],
	                );
	           }
		    }else {
		    	$data = array(
	                'user_nama'				=>	ucwords($this->input->post('nama')),
                    'user_email'			=>	strtolower($this->input->post('email')),
                    'user_telp'				=>	$this->input->post('telp'),
                    'user_alamat'			=>	$this->input->post('alamat'),
					'user_foto'				=>	$this->input->post('gambar_old'),
		        );
		    }

			$this->db->where('user_id', $this->session->userdata('uid'));
			$this->db->update('tb_users', $data);
			$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
			redirect('user/pengaturan/profil');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password salah');
			redirect('user/pengaturan/profil');
		}
	}

	public function donasisaya() {
		$this->db->select('SUM(donasi_jml) as donasisaya');
		$this->db->where('donasi_userid', $this->session->userdata('uid'));
		$this->db->from('tb_donasi');
		return $this->db->get()->row()->donasisaya;
	}

	public function gdbyid($id) {
		$this->db->select('gd_judul as judul, SUM(donasi_jml) as terkumpul, gd_id as id');
		$this->db->from('tb_galang_dana');
		$this->db->join('tb_donasi', 'tb_donasi.donasi_gdid = tb_galang_dana.gd_id','left');
		$this->db->group_by('gd_id');
		$this->db->where('gd_id', $id);
		return $this->db->get()->row_array();
	}

	public function wdgdbyid($id) {
		$this->db->select('SUM(wd_jumlah) as ditarik');
		$this->db->where('wd_gdid', $id);
		$this->db->where('wd_status', 1);
		$this->db->from('tb_withdrawal');
		return $this->db->get()->row()->ditarik;
	}

	public function kirim_request($id) {
		$data = array (
			'wd_id'			=>   md5(rand()),
			'wd_tgl'		=>   date('Y-m-d'),
			'wd_dari'		=>   $this->session->userdata('uid'),
			'wd_gdid'		=>   $id,
			'wd_jumlah'		=>   $this->input->post('jml'),
			'wd_tujuan'		=>   $this->input->post('tujuan'),
			'wd_status'		=>   0,
		);
	
		$this->db->insert('tb_withdrawal', $data);
	}

	public function data_pencairan() {
		$this->db->select('*');
		$this->db->from('tb_withdrawal');
		$this->db->join('tb_galang_dana', 'tb_galang_dana.gd_id = tb_withdrawal.wd_gdid');
		$this->db->where('wd_dari', $this->session->userdata('uid'));
		$this->db->order_by('wd_tgl', 'DESC');
		return $this->db->get()->result_array();
	}
}