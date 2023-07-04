<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="bradcam_text text-center">
					<h3><?php echo $title; ?></h3>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="popular_causes_area pt-120">
	<div class="container">
		<div class="row">
			<?php foreach($galang as $gal): ?>
				<?php if($gal['terkumpul'] == 0) { ?>
				<?php }else { ?>
				<?php $progres = $gal['dana'] / $gal['terkumpul']; ?>
				<?php $progres1 = 100 / $progres; ?>
				<?php } ?>
			<div class="col-lg-4 col-md-6">
				<div class="single_cause">
					<div class="thumb">
						<img src="assets/home/img/causes/<?php echo $gal['foto']; ?>" alt="<?php echo $gal['foto']; ?>">
					</div>
					<div class="causes_content">
						<div class="custom_progress_bar">
							<div class="progress">
								<?php if($gal['terkumpul'] == 0) { ?>
									<div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><span class="progres_count">0%</span></div>
								<?php }else { ?>
									<div class="progress-bar" role="progressbar" style="width: <?php echo round($progres1); ?>%;" aria-valuenow="<?php echo round($progres1); ?>" aria-valuemin="0" aria-valuemax="100"><span class="progres_count"><?php echo round($progres1); ?>%</span></div>
								<?php } ?>
							</div>
						</div>
						<div class="balance d-flex justify-content-between align-items-center">
							<span>Dibutuhkan: <?php echo number_format($gal['dana'],0,',','.'); ?> </span>
							<span>Terkumpul: <?php echo number_format($gal['terkumpul'],0,',','.'); ?> </span>
						</div>
						<a href="donasi/<?php echo $gal['url']; ?>"><h4><?php echo $gal['judul']; ?></h4></a>
						<p><?php echo word_limiter($gal['isi'], 14); ?></p>
						<a class="read_more" href="donasi/<?php echo $gal['url']; ?>">Selengkapnya</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>