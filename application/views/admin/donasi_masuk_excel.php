<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Tgl</th>
      <th>Dari</th>
      <th>Jumlah</th>
      <th>Pembayaran</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach($donasi as $don): ?>
      <tr>
        <td><?php echo $i; ?>.</td>
        <td><?php echo date('d-m-Y', strtotime($don['donasi_tgl'])); ?></td>
        <td><?php echo $don['user_nama']; ?></td>
        <td><?php echo number_format($don['donasi_jml'],0,',','.'); ?></td>
        <td><?php echo $don['donasi_bank']; ?></td>
        <td>
          <?php if($don['donasi_status'] == 1) { ?>
            <span class="badge badge-pill bg-warning-light">Pending</span>
          <?php }else if($don['donasi_status'] == 2) { ?>
            <span class="badge badge-pill bg-success-light">Masuk</span>
          <?php }else { ?>
            <span class="badge badge-pill bg-danger-light">Gagal</span>
          <?php } ?>
        </td>
      </tr> 
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>