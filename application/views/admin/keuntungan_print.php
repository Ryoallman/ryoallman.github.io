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
      <th>Judul</th>
      <th>Dibutuhkan</th>
      <th>Terkumpul</th>
      <th>Laba</th>
      <th>Status</th>
    </tr>
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
  </table>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
