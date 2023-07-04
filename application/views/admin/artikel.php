<?php $this->load->view('admin/menu'); ?>

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title"><?php echo $title; ?></h3>
				</div>
				<div class="col-auto">
					<a href="admin/postingan/artikel/new" class="btn btn-primary me-1">
						<i class="fas fa-plus"></i>
					</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card card-table">
					<div class="card-body">
						<?php if($this->session->flashdata('flash')): ?>
						<div style="margin-right: 20px;margin-left: 20px;" class="alert alert-success mt-3"><?php echo $this->session->flashdata('flash'); ?></div>
						<?php endif; ?>
						<div class="table-responsive">
							<table class="table table-center table-hover" id="myTable">
								<thead class="thead-light">
									<tr>
										<th>No</th>
										<th>Tgl</th>
										<th>Judul</th>
										<th>Foto</th>
										<th>Kategori</th>
										<th class="text-right">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach($artikel as $art): ?>
									<tr>
										<td><?php echo $i; ?>.</td>
										<td><?php echo date('d-m-Y', strtotime($art['post_tgl'])); ?></td>
										<td><?php echo $art['post_judul']; ?></td>
										<td><img src="assets/home/img/post/<?php echo $art['post_foto']; ?>" width="50" alt="<?php echo $art['post_foto']; ?>"></td>
										<td><?php echo $art['kat_nama']; ?></td>
										<td class="text-right">
											<a href="admin/postingan/artikel/edit/<?php echo $art['post_id']; ?>" class="btn btn-sm btn-white text-warning me-2"><i class="fa fa-edit me-1"></i> Edit</a>
											<a href="admin/postingan/artikel/hapus/<?php echo $art['post_id']; ?>" class="btn btn-sm btn-white text-danger me-2" onclick="return confirm('Yakin data ini akan dihapus?');"><i class="fa fa-trash me-1"></i> Hapus</a>
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