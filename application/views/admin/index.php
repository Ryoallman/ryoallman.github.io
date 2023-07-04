

		<?php $this->load->view('admin/menu'); ?>

<?php $angka1 = $profit * 10 / 100; ?>
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="row">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-1"><i class="fas fa-dollar-sign"></i></span>
									<div class="dash-count">
										<div class="dash-title">Profit</div>
										<div class="dash-counts"><p><?php echo number_format($angka1,0,',','.'); ?></p></div>
									</div>
								</div>
								<div class="progress progress-sm mt-3">
									<div class="progress-bar bg-5" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-2"><i class="fas fa-users"></i></span>
									<div class="dash-count">
										<div class="dash-title">Pengguna</div>
										<div class="dash-counts"><p><?php echo $pengguna; ?></p></div>
									</div>
								</div>
								<div class="progress progress-sm mt-3">
									<div class="progress-bar bg-6" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-3">
										<i class="fas fa-credit-card"></i>
									</span>
									<div class="dash-count">
										<div class="dash-title">Transaksi</div>
										<div class="dash-counts">
											<p><?php echo $trx; ?></p>
										</div>
									</div>
								</div>
								<div class="progress progress-sm mt-3">
									<div class="progress-bar bg-7" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-4">
										<i class="fa fa-box"></i>
									</span>
									<div class="dash-count">
										<div class="dash-title">Galang Dana</div>
										<div class="dash-counts">
											<p><?php echo $galang; ?></p>
										</div>
									</div>
								</div>
								<div class="progress progress-sm mt-3">
									<div class="progress-bar bg-8" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col">
										<h5 class="card-title">Donasi terbaru</h5>
									</div>
									<div class="col-auto">
										<a href="admin/donasi" class="btn-right btn btn-sm btn-outline-primary">View All</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="mb-3">
									<div class="progress progress-md rounded-pill mb-3">
										<div class="progress-bar bg-success" role="progressbar" style="width: 47%" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
										<div class="progress-bar bg-warning" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
										<div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="row">
										<div class="col-auto">
											<i class="fas fa-circle text-success me-1"></i> Masuk
										</div>
										<div class="col-auto">
											<i class="fas fa-circle text-warning me-1"></i> Pending
										</div>
										<div class="col-auto">
											<i class="fas fa-circle text-danger me-1"></i> Gagal
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-stripped table-hover">
										<thead class="thead-light">
											<tr>
												<th>Dari</th>
												<th>Jumlah</th>
												<th>Tgl</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($listdonasi as $ld): ?>
											<tr>
												<td>
													<h2 class="table-avatar">
														<a href="profile.html"><img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="assets/user/images/avatar/<?php echo $ld['user_foto']; ?>" alt="User Image"><?php echo $ld['user_nama']; ?></a>
													</h2>
												</td>
												<td><?php echo number_format($ld['donasi_jml'],0,',','.'); ?></td>
												<td><?php echo date('d-m-Y', strtotime($ld['donasi_tgl'])); ?></td>
												<td>
													<?php if($ld['donasi_status'] == 1) { ?>
														<span class="badge badge-pill bg-warning-light">Pending</span>
													<?php }else if($ld['donasi_status'] == 2) { ?>
														<span class="badge badge-pill bg-success-light">Masuk</span>
													<?php }else { ?>
														<span class="badge badge-pill bg-danger-light">Gagal</span>
													<?php } ?>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col">
										<h5 class="card-title">Top Donatur</h5>
									</div>
									<div class="col-auto">
										<a href="admin/laporan/top-donatur" class="btn-right btn btn-sm btn-outline-primary">View All</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="mb-3">
									<div class="progress progress-md rounded-pill mb-3">
										<div class="progress-bar bg-success" role="progressbar" style="width: 39%" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
										<div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
										<div class="progress-bar bg-warning" role="progressbar" style="width: 26%" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="row">
										<div class="col-auto">
											<i class="fas fa-circle text-success me-1"></i> Aktif
										</div>
										<div class="col-auto">
											<i class="fas fa-circle text-warning me-1"></i> Pending
										</div>
										<div class="col-auto">
											<i class="fas fa-circle text-danger me-1"></i> Diblokir
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-hover">
										<thead class="thead-light">
											<tr>
												<th>Nama</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($topdonatur as $td): ?>
											<tr>
												<td>
													<h2 class="table-avatar">
														<a href="profile.html"><img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="assets/user/images/avatar/<?php echo $td['foto']; ?>" alt="User Image"> <?php echo $td['nama']; ?></a>
													</h2>
												</td>
												<td><?php echo number_format($td['terkumpul'],0,',','.'); ?></td>
											</tr>
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


