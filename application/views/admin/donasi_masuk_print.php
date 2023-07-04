<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
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
      <th>Pembayaran</th>
      <th>Status</th>
    </tr>
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
  </table>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
