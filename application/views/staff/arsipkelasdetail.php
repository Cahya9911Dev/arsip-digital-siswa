<div class="content-wrapper">

<section class="content-header">
<h1>
<?php echo $title ?>
<div class="pull-right">
<a class="btn btn-info btn-sm" href="<?= base_url('staff/kelas/arsipkelas/')?>">Kembali</a>
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
            <th>Status Siswa</th>             
            <th>Status Berkas</th>
            <th width="27%">Aksi</th>
        </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach($tampilsiswa as $ts) : ?>
        <tr>
            <td><?= $ts['siswa_nis']; ?></td>
            <td><?= $ts['siswa_nama']; ?></td>
            <td><?= $ts['siswa_alamat']; ?></td>
            <td><a href="https://wa.me/<?= $ts['siswa_nomorhp']; ?>" target="_blank"><?= $ts['siswa_nomorhp']; ?></a></td>
            <td><?= $ts['kelas_nama']; ?></td>
            <td><?= $ts['siswa_status']; ?></td>
            <td><?= $ts['siswa_statusarsip']; ?></td>
            <td class="text-center">
                <?= anchor('staff/siswa/detail/'.$ts['siswa_id'],
                '<div class="btn btn-primary btn-sm">Detail</div>') ?>
                <?php if ($ts['siswa_status'] == "Aktif") { ?>
                    <a class="btn btn-warning btn-sm" href="<?= base_url('staff/siswa/updatesiswa/'.$ts['siswa_id'])?>">Edit</a>
                    <a class="btn btn-default btn-sm" href="<?= base_url('staff/siswa/ubahpassword/'.$ts['siswa_id'])?>">Ubah Password</a>
                    <a onclick="return confirm('Yakin akan mengarsipkan data ?')" 
                    class="btn btn-danger btn-sm"
                    href="<?= base_url('staff/siswa/hapus_siswaaktif/'.$ts['siswa_id'])?>">Arsipkan</a>
                <?php } elseif ($ts['siswa_status'] == "Tidak Aktif") { ?> 
                    <a onclick="return confirm('Yakin akan menghapus data ?')" 
                    class="btn btn-danger btn-sm"
                    href="<?= base_url('staff/siswa/hapus_siswa/'.$ts['siswa_id'])?>">Hapus</a>
                    
                <?php }?>
            </td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>
</div>

</div>

</section>

