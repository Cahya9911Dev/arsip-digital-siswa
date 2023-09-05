<div class="content-wrapper">

<section class="content-header">
<h1>
<?php echo $title ?>
<div class="pull-right">
<?php if($this->session->userdata('akses') == 'Administrator'):?>
<a class="btn btn-success btn-sm" href="<?php echo base_url('staff/kelas/tambahkelas')?>">+ Tambah Data Kelas</a>
<?php endif;?>
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
            <th width="5%">No</th>
            <th width="10%">Kode Kelas</th>
            <th width="15%">Nama Kelas</th>
            <th width="15%">Wali Kelas</th>
            <th width="20%">Link Grup WhatsApp</th>
            <th width="5%">Status</th>
            <th width="40%">Aksi</th>
        </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach($kelas as $kls) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $kls->kelas_id ?></td>
            <td><?= $kls->kelas_nama ?></td>
            <td><?= $kls->kelas_wali ?></td>
            <td><a href="https://<?= $kls->kelas_grupwa ?>" target="_blank"><?= $kls->kelas_grupwa ?></a></td>
            <td><?= $kls->kelas_status ?></td>
            <td class="text-center">
                <?= anchor('staff/kelas/detailkelas/'.$kls->kelas_id,'<div class="btn btn-primary btn-sm">Daftar Siswa</div>') ?>
                <a class="btn btn-success btn-sm" href="<?= base_url('staff/kelas/cetaklaporan/'.$kls->kelas_id)?>" target="_blank">Cetak</a>
                <?php if($this->session->userdata('akses') == 'Administrator'):?>
                <a class="btn btn-warning btn-sm" href="<?= base_url('staff/kelas/updatekelas/'.$kls->kelas_id)?>">Edit Kelas</a>
                <?php endif;?>
                <a class="btn btn-danger btn-sm" href="<?= base_url('staff/kelas/arsipkankelas/'.$kls->kelas_id)?>">Arsipkan</a>
            </td>
            
        </tr>
        <?php endforeach ?>
</tbody>
</table>
</div>

</div>

</section>

