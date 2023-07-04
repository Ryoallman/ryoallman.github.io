<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <base href="<?php echo base_url(); ?>"/>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 5px;
}

th {
  background-color: #4CAF50;
  font-weight: bold;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid grey;
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border: 1px solid black;
}

.responsive {
  width: 100%;
  height: auto;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body onload="printCetak()">
<h2 style="text-align: center;"><?php echo $title; ?></h2>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>No</th>
      <th>Tgl</th>
      <th>Dari</th>
      <th>Jumlah</th>
      <th>Galang Dana</th>
      <th>Tujuan</th>
      <th>Status</th>
    </tr>
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
  </table>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
