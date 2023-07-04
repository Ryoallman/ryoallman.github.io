<aside class="single_sidebar_widget search_widget">
	<form action="search" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
		<div class="form-group">
			<div class="input-group mb-3">
				<input type="text" name="cari" class="form-control" placeholder='Search Keyword'>
				<div class="input-group-append">
					<button class="btn" type="submit"><i class="ti-search"></i></button>
				</div>
			</div>
		</div>
		<button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
	</form>
</aside>