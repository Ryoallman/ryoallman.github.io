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
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $me['user_nama']; ?>" autofocus="">
                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>No telepon</label>
                            <input type="text" class="form-control" name="telp" value="<?php echo $me['user_telp']; ?>">
                            <small class="text-danger"><?php echo form_error('telp'); ?></small>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $me['user_email']; ?>">
                            <small class="text-danger"><?php echo form_error('email'); ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Foto profil (foto asli)</label>
                            <input type="file" class="form-control" name="gambar">
                            <input type="hidden" name="gambar_old" value="<?php echo $me['user_foto']; ?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Alamat lengkap</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $me['user_alamat']; ?>">
                            <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                        </div>
                        <div class="col-md-4 form-group">
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