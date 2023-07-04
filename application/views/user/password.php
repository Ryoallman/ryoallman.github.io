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
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Password baru</label>
                            <input type="password" class="form-control" name="password1" autofocus="">
                            <small class="text-danger"><?php echo form_error('password1'); ?></small>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Konfirmasi password baru</label>
                            <input type="password" class="form-control" name="password2">
                            <small class="text-danger"><?php echo form_error('password2'); ?></small>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Konfirmasi password lama</label>
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