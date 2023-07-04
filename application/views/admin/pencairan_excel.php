<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<base href="<?php echo base_url(); ?>"/>
<table border="1" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Tgl</th>
      <th>Dari</th>
      <th>Jumlah</th>
      <th>Galang Dana</th>
      <th>Tujuan</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach($pencairan as $wd): ?>
      <tr>
        <td><?php echo $i; ?>.</td>
        <td><?php echo date('d-m-Y', strtotime($wd['wd_tgl'])); ?></td>
        <td><?php echo $wd['user_nama']; ?></td>
        <td><?php echo number_format($wd['wd_jumlah'],0,',','.'); ?></td>
        <td><?php echo $wd['gd_judul']; ?></td>
        <td><?php echo $wd['wd_tujuan']; ?></td>
        <td>
          <?php if($wd['wd_status'] == 0) { ?>
            <span class="badge badge-pill bg-warning-light">Pending</span>
          <?php }else if($wd['wd_status'] == 1) { ?>
            <span class="badge badge-pill bg-success-light">Diterima</span>
          <?php }else { ?>
            <span class="badge badge-pill bg-danger-light">Ditolak</span>
          <?php } ?>
        </td>
      </tr> 
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>