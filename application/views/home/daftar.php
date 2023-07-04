
<section class="blog_area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 mb-5 mb-lg-0">
				<h3><?php echo $title; ?></h3>
				<?php if($this->session->flashdata('flash')): ?>
				<div style="background-color: #3CC78F;color: white;" class="alert alert-success">
					<?php echo $this->session->flashdata('flash'); ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('error')): ?>
				<div style="background-color: #ff6666;color: white;" class="alert alert-danger">
					<?php echo $this->session->flashdata('error'); ?>
				</div>
				<?php endif; ?>
				<form action="" method="post">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" autofocus="">
						<small class="text-danger"><?php echo form_error('nama'); ?></small>
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input type="text" class="form-control" value="<?php echo set_value('telp'); ?>" name="telp">
						<small class="text-danger"><?php echo form_error('telp'); ?></small>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" value="<?php echo set_value('email'); ?>" name="email">
						<small class="text-danger"><?php echo form_error('email'); ?></small>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password1">
						<small class="text-danger"><?php echo form_error('password1'); ?></small>
					</div>
					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" class="form-control" name="password2">
						<small class="text-danger"><?php echo form_error('password2'); ?></small>
					</div>
					<div class="form-group">
						<button style="background-color: #3CC78F;color: white;" type="submit" class="btn btn-primary">Daftar</button> Sudah punya akun? <a href="login">Login</a>
					</div>
				</form>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
</section>