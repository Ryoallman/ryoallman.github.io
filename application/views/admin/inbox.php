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
										<th>Email</th>
										<th>Subjek</th>
										<th>Isi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach($inbox as $in): ?>
										<tr>
											<td><?php echo $i; ?>.</td>
											<td><?php echo date('d-m-Y', strtotime($in['tgl'])); ?></td>
											<td><?php echo $in['nama']; ?></td>
											<td><?php echo $in['email']; ?></td>
											<td><?php echo $in['subjek']; ?></td>
											<td><?php echo $in['isi']; ?></td>
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