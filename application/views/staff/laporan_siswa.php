<table width="100%">
<tr>
<td width="15%" align="left">
    <?php
    $path = 'assets/image/logoslmn.jpg';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    <img src="<?php echo $base64?>" width="120px"/>
</td>
<td width="85%" align="left">
    <h4><center>PEMERINTAH KABUPATEN SLEMAN</center></h4>
    <h4><center>DINAS PENDIDIKAN</center></h4>
    <h3><center>SMP NEGERI 2 GODEAN</center></h3>
    <h6><center>Sidomoyo, Godean, Sleman, D.I.Yogyakarta. Kode Pos 55564 Telp. (0274) 7114120</h6>
</td>
</tr>
</table>
<hr/>

<h4><center>LAPORAN KELENGKAPAN BERKAS SISWA</h4>

<table border="1" width="100%" style="text-align:center;">
<thead>
        <tr>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>               
            <th>Status Berkas</th>
        </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach($tampilsiswa as $ts) : ?>
        <tr>
            <td><?= $ts['siswa_nis']; ?></td>
            <td><?= $ts['siswa_nama']; ?></td>
            <td><?= $ts['kelas_nama']; ?></td>
            <td><?= $ts['siswa_statusarsip']; ?></td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>
<br>
<table width="100%">
<tr>
<td width="25" align="center"></td>
<td width="50" align="center"></td>
<td width="25" align="center">
    <p>Telah Diperiksa</p>
    <p>Sleman, 
    <?php
        function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
 
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }
    ?>
    <?php
        echo tgl_indo(date('Y-m-d'));
    ?>
    </p>
    <br><br><br>
    <p>( <?= $staff['staff_nama']; ?> )</p>
</td>
</tr>
</table>
