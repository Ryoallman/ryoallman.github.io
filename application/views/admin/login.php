<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url(); ?>"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title><?php echo $title; ?> - Yayasan Ar-Ruhama</title>
	<link rel="shortcut icon" href="assets/home/img/logo_arruhama.png">
	<link rel="stylesheet" href="assets/admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/admin/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/admin/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/admin/css/style.css">
<!--[if lt IE 9]>
			<script src="assets/admin/js/html5shiv.min.js"></script>
			<script src="assets/admin/js/respond.min.js"></script>
		<![endif]-->
</head>
<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<img class="img-fluid logo-dark mb-2" src="assets/home/img/logo_arruhama.png" alt="Logo">
				<div class="loginbox">
					<div class="login-right">
						<div class="login-right-wrap">
							<h1><?php echo $title; ?></h1>
							<?php if($this->uri->segment(1) == 'auth' AND $this->uri->segment(2) == '') { ?>
							
							<?php if($this->session->flashdata('error')): ?>
							<div class="alert alert-danger">
								<b><i class="fa fa-times-circle"></i></b> <?php echo $this->session->flashdata('error'); ?>
							</div>
							<?php endif; ?>
							<?php if($this->session->flashdata('flash')): ?>
								<div class="alert alert-success">
									<b><i class="fa fa-check-circle"></i></b> <?php echo $this->session->flashdata('flash'); ?>
								</div>
								<?php endif; ?>
							<form action="" method="post">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<div class="form-group">
									<label class="form-control-label">Email</label>
									<input type="text" class="form-control" name="email" value="wahiyo.puji@gmail.com" autofocus="">
									<small class="text-danger"><?php echo form_error('email'); ?></small>
								</div>
								<div class="form-group">
									<label class="form-control-label">Password</label>
									<div class="pass-group">
										<input type="password" class="form-control pass-input" name="password" value="admin">
										<span class="fas fa-eye toggle-password"></span>
									</div>
									<small class="text-danger"><?php echo form_error('password'); ?></small>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
										</div>
										<div class="col-6 text-end">
											<a class="forgot-link" href="auth/lupa-password">Lupa Password ?</a>
										</div>
									</div>
								</div>
								<button class="btn btn-lg btn-block btn-primary w-100" type="submit">Login</button>
							</form>
							<?php }else if($this->uri->segment(1) == 'auth' AND $this->uri->segment(2) == 'lupa-password') { ?>
								<?php if($this->session->flashdata('error')): ?>
								<div class="alert alert-danger">
									<b><i class="fa fa-times-circle"></i></b> <?php echo $this->session->flashdata('error'); ?>
								</div>
								<?php endif; ?>
								<?php if($this->session->flashdata('flash')): ?>
								<div class="alert alert-success">
									<b><i class="fa fa-check-circle"></i></b> <?php echo $this->session->flashdata('flash'); ?>
								</div>
								<?php endif; ?>
								<form action="" method="post">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
									<div class="form-group">
										<label class="form-control-label">Email</label>
										<input type="text" class="form-control" name="email" autofocus="">
										<small class="text-danger"><?php echo form_error('email'); ?></small>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-6">
											</div>
											<div class="col-6 text-end">
												<a class="forgot-link" href="auth">Ingat Password ?</a>
											</div>
										</div>
									</div>
									<button class="btn btn-lg btn-block btn-primary w-100" type="submit">Submit</button>
								</form>
							<?php }else { ?>
								<?php if($this->session->flashdata('error')): ?>
								<div class="alert alert-danger">
									<b><i class="fa fa-times-circle"></i></b> <?php echo $this->session->flashdata('error'); ?>
								</div>
								<?php endif; ?>
								<?php if($this->session->flashdata('flash')): ?>
								<div class="alert alert-success">
									<b><i class="fa fa-check-circle"></i></b> <?php echo $this->session->flashdata('flash'); ?>
								</div>
								<?php endif; ?>
								<form action="" method="post">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
									<div class="form-group">
										<label class="form-control-label">Password Baru</label>
										<input type="password" class="form-control" name="password1" autofocus>
										<small class="text-danger"><?php echo form_error('password1'); ?></small>
									</div>
									<div class="form-group">
										<label class="form-control-label">Konfirmasi Password Baru</label>
										<input type="password" class="form-control" name="password2">
										<small class="text-danger"><?php echo form_error('password2'); ?></small>
									</div>
									<button class="btn btn-lg btn-block btn-primary w-100" type="submit">Reset</button>
								</form>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="assets/admin/js/jquery-3.6.0.min.js"></script>
<script src="assets/admin/js/bootstrap.bundle.min.js"></script>
<script src="assets/admin/js/feather.min.js"></script>
<script src="assets/admin/js/script.js"></script>
</body>
</html>