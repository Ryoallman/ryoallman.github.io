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
				<div class="card">
					<div class="card-body">
						<?php if($this->session->flashdata('error')): ?>
						<div style="margin-right: 3px;margin-left: 3px;" class="alert alert-danger mt-3"><?php echo $this->session->flashdata('error'); ?></div>
						<?php endif; ?>
						<?php if($this->session->flashdata('flash')): ?>
						<div style="margin-right: 20px;margin-left: 20px;" class="alert alert-success mt-3"><?php echo $this->session->flashdata('flash'); ?></div>
						<?php endif; ?>
						<form action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="row">
								<div class="form-group col-md-6">
									<label>Nama</label>
									<input type="text" class="form-control" name="nama" value="<?php echo $me['admin_nama']; ?>" autofocus>
									<small class="text-danger"><?php echo form_error('nama'); ?></small>
								</div>
								<div class="form-group col-md-6">
									<label>Email</label>
									<input type="text" class="form-control" name="email" value="<?php echo $me['admin_email']; ?>">
									<small class="text-danger"><?php echo form_error('email'); ?></small>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Foto</label>
									<input type="file" class="form-control" name="gambar">
									<input type="hidden" name="gambar_old" value="<?php echo $me['admin_foto']; ?>">
								</div>
								<div class="form-group col-md-6">
									<label>Konfirmasi Password</label>
									<input type="password" class="form-control" name="password">
									<small class="text-danger"><?php echo form_error('password'); ?></small>
								</div>
							</div>
							<div class="form-group">
								<button type="button" onclick="goBack();" class="btn btn-warning">Batal</button>
								<button type="submit" class="btn btn-success">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




</div>