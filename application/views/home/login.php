
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

					<?php if($this->uri->segment(1) == 'login') { ?>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" autofocus="">
						<small class="text-danger"><?php echo form_error('email'); ?></small>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password">
						<small class="text-danger"><?php echo form_error('password'); ?></small>
						<div class="row">
							<div class="col-md-6"></div>
							<div style="text-align: right;" class="col-md-6">
								<a href="user/lupa-password">Lupa password?</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<button style="background-color: #3CC78F;color: white;" type="submit" class="btn btn-primary">Login</button> Belum punya akun? <a href="registrasi">Daftar</a>
					</div>
					<?php }else if($this->uri->segment(1) == 'user' AND $this->uri->segment(2) == 'lupa-password') { ?>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" name="email" autofocus="">
							<small class="text-danger"><?php echo form_error('email'); ?></small>
						</div>
						<div class="form-group">
							<button style="background-color: #3CC78F;color: white;" type="submit" class="btn btn-primary">Submit</button> Ingat Passsword? <a href="login">Login</a>
						</div>
					<?php }else { ?>
						<div class="form-group">
							<label>Password Baru</label>
							<input type="password" class="form-control" name="password1" autofocus="">
							<small class="text-danger"><?php echo form_error('password1'); ?></small>
						</div>
						<div class="form-group">
							<label>Konfirmasi Password Baru</label>
							<input type="password" class="form-control" name="password2">
							<small class="text-danger"><?php echo form_error('password2'); ?></small>
						</div>
						<div class="form-group">
							<button style="background-color: #3CC78F;color: white;" type="submit" class="btn btn-primary">Reset</button>
						</div>
					<?php } ?>
				</form>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
</section>