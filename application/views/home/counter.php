<div class="counter_area">
	<div class="container">
		<div class="counter_bg overlay">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="single_counter d-flex align-items-center justify-content-center">
						<div class="icon"><i class="flaticon-calendar"></i></div>
						<div class="events">
							<h3 class="counter">120</h3><p>Finished Event</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_counter d-flex align-items-center justify-content-center">
						<div class="icon"><i class="flaticon-heart-beat"></i></div>
						<div class="events">
							<h3 class="counter">120</h3><p>Finished Event</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_counter d-flex align-items-center justify-content-center">
						<div class="icon"><i class="flaticon-in-love"></i></div>
						<div class="events">
							<h3 class="counter">120</h3><p>Finished Event</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_counter d-flex align-items-center justify-content-center">
						<div class="icon"><i class="flaticon-hug"></i></div>
						<div class="events">
							<h3 class="counter">120</h3><p>Finished Event</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="our_volunteer_area section_padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section_title text-center mb-55">
					<h3><span>Sukarelawan dengan donasi terbanyak</span></h3>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php foreach($volunteer as $vol): ?>
			<div class="col-lg-4 col-md-6">
				<div class="single_volenteer">
					<div class="volenteer_thumb">
						<img src="assets/user/images/avatar/<?php echo $vol['foto']; ?>" alt="<?php echo $vol['foto']; ?>">
					</div>
					<div class="voolenteer_info d-flex align-items-end">
						<div class="social_links">
							<ul>
								<li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
								<li><a href="#"> <i class="fa fa-pinterest"></i> </a></li>
								<li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
								<li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
							</ul>
						</div>
						<div class="info_inner">
							<h4><?php echo $vol['nama']; ?></h4>
							<p><?php echo number_format($vol['terkumpul'],0,',','.'); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>