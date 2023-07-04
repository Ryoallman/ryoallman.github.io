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
                <?php if($this->session->flashdata('flash')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('flash'); ?>
                </div>
                <?php endif; ?>
                <form action="" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <?php $bisaditarik1 = $galang['terkumpul'] - $sisa; ?>
                    <?php $bisaditarik2 = $bisaditarik1 * 10 / 100; ?>
                    <?php $bisaditarik = $bisaditarik1 - $bisaditarik2; ?>
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label>Subjek</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $galang['judul']; ?>" readonly>
                            <input type="hidden" name="gdid" value="<?php echo $galang['id']; ?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" min="10000" max="<?php echo $bisaditarik; ?>" name="jml" value="<?php echo set_value('jml'); ?>">
                            <small class="text-danger"><?php echo form_error('jml'); ?></small>
                            <small class="text-danger">10% untuk biaya operasional</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>No rekening</label>
                            <input type="text" class="form-control" name="tujuan" value="<?php echo set_value('tujuan'); ?>">
                            <small class="text-danger"><?php echo form_error('tujuan'); ?></small>
                            <small class="text-muted">Contoh: 710487492 BRI An. Eka</small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Konfirmasi password</label>
                            <input type="password" class="form-control" name="password">
                            <small class="text-danger"><?php echo form_error('password'); ?></small>
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