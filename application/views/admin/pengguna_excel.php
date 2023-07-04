<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
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
<table border="1" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Status</th>
      <th>Dokumen</th>
      <th>Alamat</th>
      <th>User Sejak</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach($users as $us): ?>
    <tr>
      <td><?php echo $i; ?>.</td>
      <td><?php echo $us['user_nama']; ?></td>
      <td><?php echo $us['user_email']; ?></td>
      <td>
        <?php if($us['user_status'] == 1) { ?>
          <span class="badge badge-pill bg-success-light">Aktif</span>
        <?php }else if($us['user_status'] == 0) { ?>
          <span class="badge badge-pill bg-warning-light">Belum Aktif</span>
        <?php }else { ?>
          <span class="badge badge-pill bg-danger-light">Diblokir</span>
        <?php } ?>
      </td>
      <td>
        <?php if($us['user_dokumen'] == '') { ?>
          <i>Tidak ada dokumen</i>
        <?php }else { ?>
          <i>Ada</i>
        <?php } ?>
      </td>
      <td><?php echo $us['user_alamat']; ?></td>
      <td><?php echo waktu_lalu($us['user_since']); ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>