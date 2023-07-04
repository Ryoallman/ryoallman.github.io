<?php $this->load->view('admin/menu'); ?>
<?php 
        function waktu_lalu($timestamp) {
    $selisih = time() - strtotime($timestamp) ;
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    return $waktu;
}
         ?>
<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title"><?php echo $title; ?></h3>
				</div>
				<div class="col-auto">
					<?php if($status == '') { ?>
					<a href="admin/laporan/pengguna/excel" class="btn btn-primary me-1">
						<i class="fas fa-file-excel"></i>
					</a>
					<a class="btn btn-primary filter-btn" href="admin/laporan/pengguna/print" target="_blank">
						<i class="fas fa-print"></i>
					</a>
					<?php }else { ?>
						<a href="admin/laporan/pengguna/excel/<?php echo $status; ?>" class="btn btn-primary me-1">
							<i class="fas fa-file-excel"></i>
						</a>
						<a class="btn btn-primary filter-btn" href="admin/laporan/pengguna/print/<?php echo $status; ?>" target="_blank">
							<i class="fas fa-print"></i>
						</a>
					<?php } ?>
					<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						<i class="fas fa-filter"></i>
					</button>
				</div>
			</div>
		</div>

		<div class="collapse" id="collapseExample">
		  <div class="card card-body">
		  	<form action="" method="post">
		  		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
		  		<div class="row">
		  			<div class="form-group col-md-3">
		  				<label>Status</label>
		  				<select name="status" class="form-control form-control-sm" required="">
		  					<option value="">-Pilih-</option>
		  					<option value="1">Aktif</option>
		  					<option value="0">Belum Aktif</option>
		  					<option value="2">Diblokir</option>
		  				</select>
		  			</div>
		  			<div class="form-group col-md-3">
		  				<button type="submit" class="btn btn-success btn-sm mt-4">Lihat</button>
		  			</div>
		  		</div>
		  	</form>
		  </div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card card-table">
					<div class="card-body">
						<div class="table-responsive">
						<?php if($this->session->flashdata('flash')): ?>
						<div class="alert alert-success m-2"><i class="fa fa-check"></i> <?php echo $this->session->flashdata('flash'); ?></div>
						<?php endif; ?>
							<table class="table table-center table-hover" id="myTable">
								<thead class="thead-light">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Status</th>
										<th>Dokumen</th>
										<th>Alamat</th>
										<th>User Sejak</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach($users as $us): ?>
									<tr>
										<td><?php echo $i; ?>.</td>
										<td><h2 class="table-avatar"><a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/user/images/avatar/<?php echo $us['user_foto']; ?>" alt="<?php echo $us['user_foto']; ?>"></a><a href="profile.html"><?php echo $us['user_nama']; ?> <span><?php echo $us['user_telp']; ?></span></a></h2></td>
										<td><?php echo $us['user_email']; ?></td>
										<td>
											<?php if($us['user_status'] == 1) { ?>
												<span class="badge badge-pill bg-success-light">Aktif</span>
											<?php }else if($us['user_status'] == 0) { ?>
												<span class="badge badge-pill bg-warning-light">Belum Aktif</span>
											<?php }else { ?>
												<span class="badge badge-pill bg-danger-light">Diblokir</span>
											<?php } ?>
										</td>
										<td>
											<?php if($us['user_dokumen'] == '') { ?>
												<i>Tidak ada dokumen</i>
											<?php }else { ?>
												<i>Ada</i>
											<?php } ?>
										</td>
										<td><?php echo $us['user_alamat']; ?></td>
										<td><?php echo waktu_lalu($us['user_since']); ?></td>
									</tr>
									<?php $i++; ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




</div>