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
						<form action="" method="post">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="form-group">
								<label>Alasan dan solusi</label>
								<textarea class="form-control" name="alasan" cols="30" rows="5" autofocus=""><?php echo set_value('alasan'); ?></textarea>
								<small class="text-danger"><?php echo form_error('alasan'); ?></small>
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