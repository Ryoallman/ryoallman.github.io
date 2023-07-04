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
						<?php if($this->session->flashdata('flash')): ?>
						<div style="margin-right: 5px;margin-left: 5px;" class="alert alert-success mt-2"><?php echo $this->session->flashdata('flash'); ?></div>
						<?php endif; ?>
						<form action="" method="post">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="form-group row">
								<div class="col-md-4">
									<label>Nama</label>
									<input type="text" class="form-control" name="nama" value="<?php echo $profil['nama']; ?>" autofocus>
									<small class="text-danger"><?php echo form_error('nama'); ?></small>
								</div>
								<div class="col-md-4">
									<label>No telepon</label>
									<input type="number" class="form-control" name="telp" value="<?php echo $profil['telp']; ?>">
									<small class="text-danger"><?php echo form_error('telp'); ?></small>
								</div>
								<div class="col-md-4">
									<label>Email</label>
									<input type="text" class="form-control" name="email" value="<?php echo $profil['email']; ?>">
									<small class="text-danger"><?php echo form_error('email'); ?></small>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-4">
									<label>Facebook</label>
									<input type="text" class="form-control" name="fb" value="<?php echo $profil['facebook']; ?>">
									<small class="text-danger"><?php echo form_error('fb'); ?></small>
								</div>
								<div class="col-md-4">
									<label>Instagram</label>
									<input type="text" class="form-control" name="ig" value="<?php echo $profil['instagram']; ?>">
									<small class="text-danger"><?php echo form_error('ig'); ?></small>
								</div>
								<div class="col-md-4">
									<label>Twitter</label>
									<input type="text" class="form-control" name="tw" value="<?php echo $profil['twitter']; ?>">
									<small class="text-danger"><?php echo form_error('tw'); ?></small>
								</div>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="text" class="form-control" name="alamat" value="<?php echo $profil['alamat']; ?>">
								<small class="text-danger"><?php echo form_error('alamat'); ?></small>
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