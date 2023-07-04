<aside class="single_sidebar_widget popular_post_widget">
	<h3 class="widget_title">Recent Post</h3>
	<?php foreach($blogside as $bl): ?>
	<div class="media post_item">
		<img style="width: 80px;height: 80px;" src="assets/home/img/blog/<?php echo $bl['post_foto']; ?>" alt="post">
		<div class="media-body">
			<a href="blog/<?php echo $bl['post_url']; ?>">
				<h3><?php echo word_limiter($bl['post_judul'],5); ?></h3>
			</a>
			<p><?php echo date('F d, Y', strtotime($bl['post_tgl'])); ?></p>
		</div>
	</div>
	<?php endforeach; ?>
</aside>
<?php $listkategori = $this->db->get('tb_kategori')->result_array(); ?>
<aside class="single_sidebar_widget tag_cloud_widget">
	<h4 class="widget_title">Tag Clouds</h4>
	<ul class="list">
		<?php foreach($listkategori as $lk): ?>
		<li><a href="tag/<?php echo $lk['kat_url']; ?>"><?php echo $lk['kat_nama']; ?></a></li>
		<?php endforeach; ?>
	</ul>
</aside>