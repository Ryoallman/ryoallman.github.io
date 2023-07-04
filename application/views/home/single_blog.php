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


<section class="blog_area single-post-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post">
					<div class="feature-img">
						<img class="img-fluid" src="assets/home/img/blog/<?php echo $blogid['post_foto']; ?>" alt="">
					</div>
					<div class="blog_details">
						<h2><?php echo $blogid['post_judul']; ?></h2>
						<ul class="blog-info-link mt-3 mb-4">
							<li><a><i class="fa fa-user"></i> <?php echo $blogid['kat_nama']; ?></a></li>
						</ul>
						<p style="text-align: justify;" class="excert"><?php echo $blogid['post_isi']; ?></p>
					</div>
				</div>
				
			</div>
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<?php $this->load->view('home/search_blog'); ?>
					<?php $this->load->view('home/category_blog'); ?>
					<?php $this->load->view('home/popular_blog'); ?>
				</div>
			</div>
		</div>
	</div>
</section>