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
								<label>Kategori</label>
								<input type="text" class="form-control" name="kategori" value="<?php echo set_value('kategori'); ?>" autofocus>
								<small class="text-danger"><?php echo form_error('kategori'); ?></small>
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