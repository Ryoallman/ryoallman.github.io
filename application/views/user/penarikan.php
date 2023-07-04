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
                        <li class="breadcrumb-item active" aria-current="page"><?php echo str_replace("-", " ", ucwords($this->uri->segment(2))); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <?php if($this->session->flashdata('flash')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('flash'); ?>
                </div>
                <?php endif; ?>
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl</th>
                            <th>Subjek</th>
                            <th>Jumlah</th>
                            <th>Tujuan</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($pencairan as $wd): ?>
                        <tr>
                            <td><?php echo $i; ?>.</td>
                            <td><?php echo date('d-m-Y', strtotime($wd['wd_tgl'])); ?></td>
                            <td><?php echo $wd['gd_judul']; ?></td>
                            <td><?php echo number_format($wd['wd_jumlah'],0,',','.'); ?></td>
                            <td><?php echo $wd['wd_tujuan']; ?></td>
                            <td>
                                <?php if($wd['wd_status'] == 0) { ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php }else if($wd['wd_status'] == 1) { ?>
                                    <span class="badge bg-info">Diterima</span>
                                <?php }else { ?>
                                    <span class="badge bg-danger">Ditolak</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($wd['wd_status'] == 1) { ?>
                                <?php }else { ?>
                                <a href="user/penarikan/hapus/<?php echo $wd['wd_id']; ?>" class="btn icon btn-danger btn-sm" onclick="return confirm('Yakin data ini akan dihapus?')"><i data-feather="trash"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>