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
						<form action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="form-group">
								<label>Judul</label>
								<input type="text" class="form-control" name="judul" value="<?php echo $blog['post_judul']; ?>" autofocus>
								<small class="text-danger"><?php echo form_error('judul'); ?></small>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Kategori</label>
									<select name="kategori" class="form-control">
										<?php foreach($kategori as $kat): ?>
										<option <?php if($blog['post_kategori'] == $kat['kat_id']) {echo 'selected="selected"'; } ?> value="<?php echo $kat['kat_id']; ?>"><?php echo $kat['kat_nama']; ?></option>
										<?php endforeach; ?>
									</select>
									<small class="text-danger"><?php echo form_error('kategori'); ?></small>
								</div>
								<div class="form-group col-md-6">
									<label>Foto</label>
									<input type="file" class="form-control" name="gambar">
									<input type="hidden" name="gambar_old" value="<?php echo $blog['post_foto']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Artikel</label>
								<textarea name="isi" class="form-control" cols="30" rows="17"><?php echo $blog['post_isi']; ?></textarea>
								<small class="text-danger"><?php echo form_error('isi'); ?></small>
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