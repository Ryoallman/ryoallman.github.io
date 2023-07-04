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
            <div class="card-header">
                <!-- <?php if($me['user_dokumen'] == '') { ?>
                    <div class="alert alert-danger">
                        Untuk mulai menggalang dana, silahkan lengkapi dokumen Anda dan data lainnya.
                    </div>
                <?php }else { ?>
                    <a href="user/galang-dana/new" class="btn btn-primary btn-sm">Baru</a>
                <?php } ?> -->
            </div>
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
                            <th>Tujuan</th>
                            <th>Jumlah</th>
                            <th>Pembayaran</th>
                            <th>Do'a</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($donasi as $don): ?>
                        <tr>
                            <td><?php echo $i;?>.</td>
                            <td><?php echo date('d-m-Y', strtotime($don['donasi_tgl'])); ?></td>
                            <td><?php echo $don['gd_judul']; ?></td>
                            <td><?php echo number_format($don['donasi_jml'],0,',','.'); ?></td>
                            <td>Bank <?php echo $don['donasi_bank']; ?></td>
                            <td><?php echo $don['donasi_doa']; ?></td>
                            <td>
                                <?php if($don['donasi_status'] == 1) { ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php }else { ?>
                                    <span class="badge bg-success">Masuk</span>
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