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
				<!-- <div class="col-auto">
					<a href="add-customer.html" class="btn btn-primary me-1">
						<i class="fas fa-plus"></i>
					</a>
					<a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
						<i class="fas fa-filter"></i>
					</a>
				</div> -->
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
										<th class="text-right">Opsi</th>
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
												<a href="assets/user/dokumen/<?php echo $us['user_dokumen']; ?>" target="_blank">Lihat</a>
											<?php } ?>
										</td>
										<td><?php echo $us['user_alamat']; ?></td>
										<td><?php echo waktu_lalu($us['user_since']); ?></td>
										<td class="text-right">
											<a href="admin/pengguna/aktifkan/<?php echo $us['user_id']; ?>" class="btn btn-sm btn-white text-success me-2"><i class="fa fa-check me-1"></i> Aktifkan</a>
											<a href="admin/pengguna/blokir/<?php echo $us['user_id']; ?>" class="btn btn-sm btn-white text-danger me-2"><i class="fa fa-ban me-1"></i>Blokir</a>
										</td>
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