<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="bradcam_text text-center">
					<h3>Yuk Bantu Mereka</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if($galang['terkumpul'] == 0) { ?>
<?php }else { ?>
<?php $progres = $galang['dana'] / $galang['terkumpul']; ?>
<?php $progres1 = 100 / $progres; ?>
<?php } ?>

<div class="popular_causes_area pt-120 cause_details ">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="single_cause">
					<div class="thumb">
						<img src="assets/home/img/causes/<?php echo $galang['foto']; ?>" alt="<?php echo $galang['foto']; ?>">
					</div>
					<div class="causes_content">
						<div class="custom_progress_bar">
							<div class="progress">
								<?php if($galang['terkumpul'] == 0) { ?>
									<div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><span class="progres_count">0%</span></div>
								<?php }else { ?>
									<div class="progress-bar" role="progressbar" style="width: <?php echo round($progres1); ?>%;" aria-valuenow="<?php echo round($progres1); ?>" aria-valuemin="0" aria-valuemax="100"><span class="progres_count"><?php echo round($progres1); ?>%</span></div>
								<?php } ?>
							</div>
						</div>
						<div class="balance d-flex justify-content-between align-items-center">
							<span>Dibutuhkan: <?php echo number_format($galang['dana'],0,',','.'); ?> </span>
							<span>Terkumpul: <?php echo number_format($galang['terkumpul'],0,',','.'); ?> </span>
						</div>
						<h4><?php echo $galang['judul']; ?></h4>
						<p><?php echo $galang['isi']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="make_donation_area section_padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section_title text-center mb-55">
					<h3><span>Donasi sekarang</span></h3>
				</div>
			</div>
		</div>
		<?php $sisa = $galang['dana'] - $galang['terkumpul']; ?>
		<?php if($sisa != 0) { ?>
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<form action="" method="post" class="donation_form">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<input type="hidden" name="url" value="<?php echo $galang['id']; ?>">
					<div class="row align-items-center">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="single_amount">
								<div class="input_field">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Rp</span>
										</div>
										<input type="number" min="10000" max="<?php echo $sisa; ?>" class="form-control" placeholder="10000" name="jml" aria-label="Username" aria-describedby="basic-addon1" required="">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="donate_now_btn text-center">
					<button type="submit" class="boxed-btn4">Donasi</button>
				</div>
				</form>
			</div>
		</div>
		<?php }else { ?>
			<div class="row justify-content-center">
				<h5><i>Donasi sudah terpenuhi</i></h5>
			</div>
		<?php } ?>
	</div>
</div>