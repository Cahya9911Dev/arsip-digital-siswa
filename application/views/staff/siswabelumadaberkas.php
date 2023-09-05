<div class="content-wrapper">

<section class="content-header">
<h1>
<?php echo $title ?>
<div class="pull-right">
<a class="btn btn-success btn-sm" href="<?php echo base_url('staff/siswa/tambahsiswa')?>">+ Tambah Data Siswa</a>
</div>
</h1>
</section>

<section class="content">
<?php echo $this->session->flashdata('pesan');?>

<div class="box">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
        <tr>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Alamat</th>
            <th>Nomor HP</th>
            <th>Kelas</th>                
            <th>Status Berkas</th>
            <th width="27%">Aksi</th>
        </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach($siswa as $sw) : ?>
        <tr>
            <td><?= $sw->siswa_nis ?></td>
            <td><?= $sw->siswa_nama ?></td>
            <td><?= $sw->siswa_alamat ?></td>
            <td><a href="https://wa.me/<?= $sw->siswa_nomorhp ?>" target="_blank"><?= $sw->siswa_nomorhp ?></a></td>
            <td><?= $sw->kelas_nama ?></td>
            <td><?= $sw->siswa_statusarsip ?></td>
            
            <td class="text-center">
                <?= anchor('staff/siswa/detail/'.$sw->siswa_id,
                '<div class="btn btn-primary btn-sm">Detail</div>') ?>
                <a class="btn btn-warning btn-sm" href="<?= base_url('staff/siswa/updatesiswa/'.$sw->siswa_id)?>">Edit</a>
                <a class="btn btn-info btn-sm" href="<?= base_url('staff/siswa/ubahpassword/'.$sw->siswa_id)?>">Ubah Password</a>
                <a onclick="return confirm('Yakin akan mengarsipkan data ?')" 
                class="btn btn-danger btn-sm"
                href="<?= base_url('staff/siswa/hapus_siswaaktif/'.$sw->siswa_id)?>">Arsipkan</a>
            </td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>
</div>

</div>

</section>

