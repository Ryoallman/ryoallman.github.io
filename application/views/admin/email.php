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
									<label>Email</label>
									<input type="text" class="form-control" name="email" value="<?php echo $email['email']; ?>" autofocus>
									<small class="text-danger"><?php echo form_error('email'); ?></small>
								</div>
								<div class="col-md-4">
									<label>Password</label>
									<input type="password" class="form-control" name="password" value="<?php echo $email['email_password']; ?>">
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