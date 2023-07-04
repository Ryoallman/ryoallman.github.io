<aside class="single_sidebar_widget post_category_widget">
	<?php $listkategori = $this->db->get('tb_kategori')->result_array(); ?>
	<h4 class="widget_title">Category</h4>
	<ul class="list cat-list">
		<?php foreach($listkategori as $lk): ?>
			<?php $jmlpost = $this->db->get_where('tb_blog',['post_kategori' => $lk['kat_id']])->num_rows(); ?>
		<li>
			<a href="tag/<?php echo $lk['kat_url']; ?>" class="d-flex">
				<p><?php echo $lk['kat_nama']; ?></p><p> (<?php echo $jmlpost; ?>)</p>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
</aside>