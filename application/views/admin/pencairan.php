<?php $this->load->view('admin/menu'); ?>

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title"><?php echo $title; ?></h3>
				</div>
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
										<th>Galang Dana</th>
										<th>Tujuan</th>
										<th>Status</th>
										<th class="text-right">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach($pencairan as $wd): ?>
										<tr>
											<td><?php echo $i; ?>.</td>
											<td><?php echo date('d-m-Y', strtotime($wd['wd_tgl'])); ?></td>
											<td><?php echo $wd['user_nama']; ?></td>
											<td><?php echo number_format($wd['wd_jumlah'],0,',','.'); ?></td>
											<td><?php echo $wd['gd_judul']; ?></td>
											<td><?php echo $wd['wd_tujuan']; ?></td>
											<td>
												<?php if($wd['wd_status'] == 0) { ?>
													<span class="badge badge-pill bg-warning-light">Pending</span>
												<?php }else if($wd['wd_status'] == 1) { ?>
													<span class="badge badge-pill bg-success-light">Diterima</span>
												<?php }else { ?>
													<span class="badge badge-pill bg-danger-light">Ditolak</span>
												<?php } ?>
											</td>
											<td>
												<a href="admin/pencairan/terima/<?php echo $wd['wd_id']; ?>" class="btn btn-sm btn-white text-warning me-2"><i class="fa fa-check me-1"></i> Terima</a>
												<a href="admin/pencairan/tolak/<?php echo $wd['wd_id']; ?>" class="btn btn-sm btn-white text-danger me-2"><i class="fa fa-times me-1"></i> Tolak</a>
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