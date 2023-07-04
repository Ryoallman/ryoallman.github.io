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
                <?php if($me['user_dokumen'] == '') { ?>
                    <div class="alert alert-danger">
                        Untuk mulai menggalang dana, silahkan lengkapi dokumen Anda dan data lainnya.
                    </div>
                <?php }else { ?>
                    <?php if($me['user_alamat'] == '') { ?>
                        <div class="alert alert-danger">
                            Untuk mulai menggalang dana, silahkan lengkapi dokumen Anda dan data lainnya.
                        </div>
                    <?php }else { ?>
                        <a href="user/galang-dana/new" class="btn btn-primary btn-sm">Baru</a>
                    <?php } ?>
                <?php } ?>
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
                            <th>Judul</th>
                            <th>Dana dibutuhkan</th>
                            <th>Dana terkumpul</th>
                            <th>Dana kurang</th>
                            <th>Batas waktu</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($galang as $gal): ?>
                            <?php $sisa = $gal['dana'] - $gal['terkumpul']; ?>
                        <tr>
                            <td><?php echo $i;?>.</td>
                            <td><?php echo date('d-m-Y', strtotime($gal['tglpost'])); ?></td>
                            <td><?php echo $gal['judul']; ?></td>
                            <td><?php echo number_format($gal['dana'],0,',','.'); ?></td>
                            <td>
                                <?php if($gal['terkumpul'] == $gal['dana']) { ?>
                                    <span class="badge bg-success"><?php echo number_format($gal['terkumpul'],0,',','.'); ?></span>
                                <?php }else { ?>
                                    <?php echo number_format($gal['terkumpul'],0,',','.'); ?>
                                <?php } ?>
                            </td>
                            <td><?php echo number_format($sisa,0,',','.'); ?></td>
                            <td><?php echo date('d-m-Y', strtotime($gal['tglend'])); ?></td>
                            <td>
                                <?php if($gal['status'] == 0) { ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php }else if($gal['status'] == 1) { ?>
                                    <span class="badge bg-info">Aktif</span>
                                <?php }else  if($gal['status'] == 2) { ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php }else { ?>
                                    <span class="badge bg-danger">Ditolak</span>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="user/galang-dana/edit/<?php echo $gal['id']; ?>" class="btn icon btn-info btn-sm"><i data-feather="edit"></i></a>
                                <a href="user/galang-dana/hapus/<?php echo $gal['id']; ?>" class="btn icon btn-danger btn-sm" onclick="return confirm('Yakin data ini akan dihapus?')"><i data-feather="trash"></i></a>
                                <a href="user/galang-dana/tarik-dana/<?php echo $gal['id']; ?>" class="btn icon btn-primary btn-sm"><i data-feather="log-out"></i></a>
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