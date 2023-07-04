<?php $this->load->view('admin/menu'); ?>

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title"><?php echo $title; ?></h3>
				</div>
				<div class="col-auto">
					<?php if($mulai == '' AND $sampai == '') { ?>
					<a href="admin/laporan/donasi-masuk/excel" class="btn btn-primary me-1">
						<i class="fas fa-file-excel"></i>
					</a>
					<a class="btn btn-primary filter-btn" href="admin/laporan/donasi-masuk/print" target="_blank">
						<i class="fas fa-print"></i>
					</a>
					<?php }else { ?>
						<a href="admin/laporan/donasi-masuk/excel/<?php echo $mulai; ?>/<?php echo $sampai; ?>" class="btn btn-primary me-1">
							<i class="fas fa-file-excel"></i>
						</a>
						<a class="btn btn-primary filter-btn" href="admin/laporan/donasi-masuk/print/<?php echo $mulai; ?>/<?php echo $sampai; ?>" target="_blank">
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
		  				<label>Dari</label>
		  				<input type="date" class="form-control form-control-sm" name="start" required="">
		  			</div>
		  			<div class="form-group col-md-3">
		  				<label>Sampai</label>
		  				<input type="date" class="form-control form-control-sm" name="end" required="">
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
										<th>Dari</th>
										<th>Jumlah</th>
										<th>Pembayaran</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach($donasi as $don): ?>
										<tr>
											<td><?php echo $i; ?>.</td>
											<td><?php echo date('d-m-Y', strtotime($don['donasi_tgl'])); ?></td>
											<td><?php echo $don['user_nama']; ?></td>
											<td><?php echo number_format($don['donasi_jml'],0,',','.'); ?></td>
											<td><?php echo $don['donasi_bank']; ?></td>
											<td>
												<?php if($don['donasi_status'] == 1) { ?>
													<span class="badge badge-pill bg-warning-light">Pending</span>
												<?php }else if($don['donasi_status'] == 2) { ?>
													<span class="badge badge-pill bg-success-light">Masuk</span>
												<?php }else { ?>
													<span class="badge badge-pill bg-danger-light">Gagal</span>
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