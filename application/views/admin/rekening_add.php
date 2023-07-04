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
							<div class="form-group row">
								<div class="col-md-6">
									<label>Bank</label>
									<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" autofocus>
									<small class="text-danger"><?php echo form_error('nama'); ?></small>
								</div>
								<div class="col-md-6">
									<label>No rekening</label>
									<input type="number" class="form-control" name="no" value="<?php echo set_value('no'); ?>">
									<small class="text-danger"><?php echo form_error('no'); ?></small>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-4">
									<label>Kode bank</label>
									<input type="text" class="form-control" name="kode" value="<?php echo set_value('kode'); ?>">
									<small class="text-danger"><?php echo form_error('kode'); ?></small>
								</div>
								<div class="col-md-4">
									<label>Atas nama</label>
									<input type="text" class="form-control" name="an" value="<?php echo set_value('an'); ?>">
									<small class="text-danger"><?php echo form_error('an'); ?></small>
								</div>
								<div class="col-md-4">
									<label>Status</label>
									<select name="status" class="form-select">
										<option value="">-Pilih-</option>
										<option value="Lancar" <?php echo set_select('status', 'Lancar') ?>>Lancar</option>
										<option value="Gangguan" <?php echo set_select('status', 'Gangguan') ?>>Gangguan</option>
									</select>
									<small class="text-danger"><?php echo form_error('status'); ?></small>
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