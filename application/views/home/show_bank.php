
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
						<label>Total Donasi</label>
						<input type="number" class="form-control" name="jml" value="<?php echo $this->session->userdata('jumlah'); ?>" readonly>
						<small class="text-danger"><?php echo form_error('jml'); ?></small>
					</div>
					<div class="form-group">
						<label>Pilih Bank</label>
						<select name="bank" class="form-control">
							<option value="">-Pilih-</option>
							<?php foreach($banklist as $bl): ?>
								<option value="<?php if($bl['bank_status'] == 'Lancar') { ?><?php echo $bl['bank_nama']; ?><?php }else { ?><?php } ?>"><?php echo $bl['bank_nama']; ?> <?php if($bl['bank_status'] == 'Lancar') { ?><?php }else { ?>(Gangguan)<?php } ?></option>
							<?php endforeach; ?>
						</select>
						<small class="text-danger"><?php echo form_error('bank'); ?></small>
					</div>
					<div class="form-group">
						<label>Do'a (optional)</label>
						<textarea name="doa" class="form-control" cols="10" rows="10"></textarea>
						<small class="text-danger"><?php echo form_error('doa'); ?></small>
					</div>
					<div class="form-group">
						<button style="background-color: #3CC78F;color: white;" type="submit" class="btn btn-primary">Konfirmasi</button>
					</div>
				</form>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
</section>