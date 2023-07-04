<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="bradcam_text text-center">
					<h3>Blog</h3>
				</div>
			</div>
		</div>
	</div>
</div>


<section class="blog_area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<div class="blog_left_sidebar">
					<?php foreach($bloglist as $bl): ?>
					<article class="blog_item">
						<div class="blog_item_img">
							<img class="card-img rounded-0" src="assets/home/img/blog/<?php echo $bl['post_foto']; ?>" alt="">
							<a class="blog_item_date"><h3><?php echo date('d', strtotime($bl['post_tgl'])); ?></h3><p><?php echo date('M', strtotime($bl['post_tgl'])); ?></p></a>
						</div>
						<div class="blog_details">
							<a class="d-inline-block" href="blog/<?php echo $bl['post_url']; ?>"><h2><?php echo $bl['post_judul']; ?></h2></a>
							<p><?php echo word_limiter($bl['post_isi'],20); ?></p>
							<ul class="blog-info-link">
								<li><a href="tag/<?php echo $bl['kat_url']; ?>"><i class="fa fa-user"></i> <?php echo $bl['kat_nama']; ?></a></li>
							</ul>
						</div>
					</article>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<?php $this->load->view('home/search_blog'); ?>
					<?php $this->load->view('home/category_blog'); ?>
					<?php $this->load->view('home/popular_blog', $blogside); ?>
				</div>
			</div>
		</div>
	</div>
</section>