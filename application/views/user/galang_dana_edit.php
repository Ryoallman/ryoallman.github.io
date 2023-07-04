<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page"><?php echo str_replace("-", " ", ucwords($this->uri->segment(2))); ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $this->uri->segment(3); ?></li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="card">
            
            <div class="card-body">
                <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php endif; ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo $galang['gd_judul']; ?>" autofocus>
                        <small class="text-danger"><?php echo form_error('judul'); ?></small>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="isi" class="form-control" cols="30" rows="10"><?php echo $galang['gd_isi']; ?></textarea>
                        <small class="text-danger"><?php echo form_error('isi'); ?></small>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Dana yang dibutuhkan</label>
                            <input type="number" class="form-control" min="1" name="jml" value="<?php echo $galang['gd_dana']; ?>">
                            <small class="text-danger"><?php echo form_error('jml'); ?></small>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Batas waktu</label>
                            <input type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" name="tgl" value="<?php echo $galang['gd_tgl_selesai']; ?>">
                            <small class="text-danger"><?php echo form_error('tgl'); ?></small>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="gambar">
                            <input type="hidden" name="gambar_old" value="<?php echo $galang['gd_foto']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="goBack();" class="btn btn-warning btn-sm">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>
    <!-- Basic Inputs end -->
    
    
  
</div>