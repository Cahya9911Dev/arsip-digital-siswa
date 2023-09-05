<div class="content-wrapper">

<section class="content-header">
<h1>
<?php echo $title ?>
<div class="pull-right">
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
            <th width="20%">Status Kelas</th>
            <th width="25%">Aksi</th>
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
                <?= anchor('staff/kelas/detailarsipkelas/'.$kls->kelas_id,'<div class="btn btn-primary btn-sm">Daftar Siswa</div>') ?>
                <a class="btn btn-success btn-sm" href="<?= base_url('staff/kelas/cetaklaporan/'.$kls->kelas_id)?>" target="_blank">Cetak</a>
            </td>
            
        </tr>
        <?php endforeach ?>
</tbody>
</table>
</div>

</div>

</section>

