<?php $this->load->view('admin/menu'); ?>

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title"><?php echo $title; ?></h3>
				</div>
				<div class="col-auto">
					<a href="admin/laporan/top-donatur/excel" class="btn btn-primary me-1">
						<i class="fas fa-file-excel"></i>
					</a>
					<a class="btn btn-primary filter-btn" href="admin/laporan/top-donatur/print" target="_blank">
						<i class="fas fa-print"></i>
					</a>
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
										<th>Nama</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach($donatur as $don): ?>
										<tr>
											<td><?php echo $i; ?>.</td>
											<td><h2 class="table-avatar"><a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/user/images/avatar/<?php echo $don['foto']; ?>" alt="<?php echo $don['foto']; ?>"></a><a href="profile.html"><?php echo $don['nama']; ?> <span><?php echo $don['telp']; ?></span></a></h2></td>
											<td><?php echo number_format($don['terkumpul'],0,',','.'); ?></td>
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