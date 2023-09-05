<div class="content-wrapper">

<section class="content-header">
<h1>
<?php echo $title ?> 
</h1>
</section>

<section class="content">

<?php echo $this->session->flashdata('pesan');?>

<div class="box">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Alamat</th>
            <th>Nomor HP</th>
            <th>Kelas</th>                
            <th>Status Berkas</th>
            <th>Tahun Lulus</th>
            <th width="17%">Aksi</th>
        </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach($siswa as $sw) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $sw->siswa_nis ?></td>
            <td><?= $sw->siswa_nama ?></td>
            <td><?= $sw->siswa_alamat ?></td>
            <td><?= $sw->siswa_nomorhp?></td>
            <td><?= $sw->kelas_nama ?></td>
            <td><?= $sw->siswa_statusarsip ?></td>
            <td><?= $sw->siswa_tahunkeluar ?></td>
            <td class="text-center">
                <?= anchor('staff/siswa/detail/'.$sw->siswa_id,
                '<div class="btn btn-primary btn-sm">Detail</div>') ?>
                
                <a onclick="return confirm('Yakin akan menghapus data ?')" 
                class="btn btn-danger btn-sm"
                href="<?= base_url('staff/siswa/hapus_siswa/'.$sw->siswa_id)?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>
</div>

</div>

</section>

