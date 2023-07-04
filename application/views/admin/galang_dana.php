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
										<th>Penggalang</th>
										<th>Foto</th>
										<th>Dibutuhkan</th>
										<th>Terkumpul</th>
										<th>Sisa</th>
										<th>Waktu</th>
										<th>Judul</th>
										<th>Status</th>
										<th class="text-right">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach($galangdana as $gdan): ?>
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
										<td class="text-right">
											<a href="admin/galang-dana/acc/<?php echo $gdan['id']; ?>" class="btn btn-sm btn-white text-success me-2"><i class="fa fa-check me-1"></i> Acc</a>
											<a href="admin/galang-dana/selesai/<?php echo $gdan['id']; ?>" class="btn btn-sm btn-white text-primary me-2"><i class="fa fa-check me-1"></i> Selesai</a>
											<a href="admin/galang-dana/tolak/<?php echo $gdan['id']; ?>" class="btn btn-sm btn-white text-danger me-2"><i class="fa fa-times me-1"></i>Tolak</a>
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