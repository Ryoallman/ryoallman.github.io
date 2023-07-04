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
      <th>Judul</th>
      <th>Dibutuhkan</th>
      <th>Terkumpul</th>
      <th>Laba</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php $untung = 0; ?>
    <?php foreach($galang as $gdan): ?>
      <?php $laba = $gdan['terkumpul'] * 10 / 100; ?>
    <?php $untung += $laba; ?>
    <tr>
      <td><?php echo $i; ?>.</td> 
      <td><?php echo date('d-m-Y', strtotime($gdan['tglpost'])); ?></td>
      <td><?php echo $gdan['judul']; ?></td>
      <td><?php echo number_format($gdan['dana'],0,',','.'); ?></td>
      <td>
        <?php if($gdan['terkumpul'] == $gdan['dana']) { ?>
          <span class="badge badge-pill bg-success-light"><?php echo number_format($gdan['terkumpul'],0,',','.'); ?></span>
        <?php }else { ?>
          <?php echo number_format($gdan['terkumpul'],0,',','.'); ?>
        <?php } ?>
      </td>
      <td><?php echo number_format($laba,0,',','.'); ?></td>
      <td>
        <?php if($gdan['status'] == 0) { ?>
          <span class="badge badge-pill bg-warning-light">Pending</span>
        <?php }else if($gdan['status'] == 1) { ?>
          <span class="badge badge-pill bg-info-light">Aktif</span>
        <?php }else if($gdan['status'] == 2) { ?>
          <span class="badge badge-pill bg-success-light">Selesai</span>
        <?php }else { ?>
          <span class="badge badge-pill bg-danger-light">Ditolak</span>
        <?php } ?>
      </td>
    </tr>
    <?php $i++; ?>
  <?php endforeach; ?>
  <tr>
    <th colspan="5">Total</th>
    <th colspan="2"><?php echo number_format($untung,0,',','.'); ?></th>
  </tr>
  </tbody>
</table>