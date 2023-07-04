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
      <th>Nama</th>
      <th>Jumlah</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach($donatur as $don): ?>
      <tr>
        <td><?php echo $i; ?>.</td>
        <td><?php echo $don['nama']; ?></td>
        <td><?php echo number_format($don['terkumpul'],0,',','.'); ?></td>
      </tr> 
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>