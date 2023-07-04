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
<?php 
        function waktu_lalu($timestamp) {
    $selisih = time() - strtotime($timestamp) ;
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    return $waktu;
}
         ?>
<h2 style="text-align: center;"><?php echo $title; ?></h2>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>No</th>
      <th>Tgl</th>
      <th>Penggalang</th>
      <th>Foto</th>
      <th>Dibutuhkan</th>
      <th>Terkumpul</th>
      <th>Sisa</th>
      <th>Waktu</th>
      <th>Judul</th>
      <th>Status</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($galang as $gdan): ?>
      <?php $sisa = $gdan['dana'] - $gdan['terkumpul']; ?>
    <tr>
      <td><?php echo $i; ?>.</td> 
      <td><?php echo date('d-m-Y', strtotime($gdan['tglpost'])); ?></td>
      <td><?php echo $gdan['unama']; ?></td>
      <td><a href="assets/home/img/causes/<?php echo $gdan['fotogd']; ?>" target="_blank"><img src="assets/home/img/causes/<?php echo $gdan['fotogd']; ?>" alt="<?php echo $gdan['fotogd']; ?>" width="50"></a></td>
      <td><?php echo number_format($gdan['dana'],0,',','.'); ?></td>
      <td>
        <?php if($gdan['terkumpul'] == $gdan['dana']) { ?>
          <span class="badge badge-pill bg-success-light"><?php echo number_format($gdan['terkumpul'],0,',','.'); ?></span>
        <?php }else { ?>
          <?php echo number_format($gdan['terkumpul'],0,',','.'); ?>
        <?php } ?>
      </td>
      <td><?php echo number_format($sisa,0,',','.'); ?></td>
      <td><?php echo date('d-m-Y', strtotime($gdan['tglend'])); ?></td>
      <td><?php echo $gdan['judul']; ?></td>
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
  </table>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
