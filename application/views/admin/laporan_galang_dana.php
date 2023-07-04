<?php $this->load->view('admin/menu'); ?>

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title"><?php echo $title; ?></h3>
				</div>
				<div class="col-auto">
					<?php if($status == '') { ?>
					<a href="admin/laporan/galang-dana/excel" class="btn btn-primary me-1">
						<i class="fas fa-file-excel"></i>
					</a>
					<a class="btn btn-primary filter-btn" href="admin/laporan/galang-dana/print" target="_blank">
						<i class="fas fa-print"></i>
					</a>
					<?php }else { ?>
						<a href="admin/laporan/galang-dana/excel/<?php echo $status; ?>" class="btn btn-primary me-1">
							<i class="fas fa-file-excel"></i>
						</a>
						<a class="btn btn-primary filter-btn" href="admin/laporan/galang-dana/print/<?php echo $status; ?>" target="_blank">
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
		  					<option value="0">Pending</option>
		  					<option value="1">Aktif</option>
		  					<option value="2">Selesai</option>
		  					<option value="3">Ditolak</option>
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
							<table class="table table-center table-hover" id="myTable">
								<thead class="thead-light">
									<tr>
										<th>No</th>
										<th>Tgl</th>
										<th>Penggalang</th>
										<th>Foto</th>
										<th>Dibutuhkan</th>
										<th>Terkumpul</th>
										<th>Sisa</th>
										<th>Waktu</th>
										<th>Judul</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach($galang as $gdan): ?>
										<?php $sisa = $gdan['dana'] - $gdan['terkumpul']; ?>
									<tr>
										<td><?php echo $i; ?>.</td>	
										<td><?php echo date('d-m-Y', strtotime($gdan['tglpost'])); ?></td>
										<td><h2 class="table-avatar"><a class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/user/images/avatar/<?php echo $gdan['ufoto']; ?>" alt="<?php echo $gdan['ufoto']; ?>"></a><a><?php echo $gdan['unama']; ?> <span><?php echo $gdan['utelp']; ?></span></a></h2></td>
										<td><a href="assets/home/img/causes/<?php echo $gdan['fotogd']; ?>" target="_blank"><img src="assets/home/img/causes/<?php echo $gdan['fotogd']; ?>" alt="<?php echo $gdan['fotogd']; ?>" width="50"></a></td>
										<td><?php echo number_format($gdan['dana'],0,',','.'); ?></td>
										<td>
											<?php if($gdan['terkumpul'] == $gdan['dana']) { ?>
												<span class="badge badge-pill bg-success-light"><?php echo number_format($gdan['terkumpul'],0,',','.'); ?></span>
											<?php }else { ?>
												<?php echo number_format($gdan['terkumpul'],0,',','.'); ?>
											<?php } ?>
										</td>
										<td><?php echo number_format($sisa,0,',','.'); ?></td>
										<td><?php echo date('d-m-Y', strtotime($gdan['tglend'])); ?></td>
										<td><?php echo $gdan['judul']; ?></td>
										<td>
											<?php if($gdan['status'] == 0) { ?>
												<span class="badge badge-pill bg-warning-light">Pending</span>
											<?php }else if($gdan['status'] == 1) { ?>
												<span class="badge badge-pill bg-info-light">Aktif</span>
											<?php }else if($gdan['status'] == 2) { ?>
												<span class="badge badge-pill bg-success-light">Selesai</span>
											<?php }else { ?>
												<span class="badge badge-pill bg-danger-light">Ditolak</span>
											<?php } ?>
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