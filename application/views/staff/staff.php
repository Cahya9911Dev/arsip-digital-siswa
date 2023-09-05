<div class="content-wrapper">

<section class="content-header">
<h1>
<?php echo $title ?>
<div class="pull-right">
<a class="btn btn-success btn-sm" href="<?php echo base_url('staff/staff/tambahstaff')?>">+ Tambah Data Staff</a>
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
            <th>NIP</th>
            <th>Nama Staff</th>
            <th>Level</th>
            <th width="27%">Aksi</th>
        </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach($staf as $st) : ?>
        <tr>
            <td><?= $st->staff_nip ?></td>
            <td><?= $st->staff_nama ?></td>
            <td><?= $st->staff_role ?></td>
            
            <td class="text-center">
                <?php if($st->staff_id == 'ST-11101'):?>
                    <?php if($this->session->userdata('staff_nip') != '20401303'):?>
                        <a class="btn btn-warning btn-sm disabled" href="<?= base_url('staff/staff/updatestaff/'.$st->staff_id)?>">Edit</a>
                    <?php else :?>
                        <a class="btn btn-warning btn-sm" href="<?= base_url('staff/staff/updatestaff/'.$st->staff_id)?>">Edit</a>
                    <?php endif ?> 
                <a onclick="return confirm('Yakin akan menghapus data ?')" 
                class="btn btn-danger btn-sm disabled"
                href="<?= base_url('staff/staff/hapus_staff/'.$st->staff_id)?>">Hapus</a>
                    

                <?php else :?>
                <a class="btn btn-warning btn-sm" href="<?= base_url('staff/staff/updatestaff/'.$st->staff_id)?>">Edit</a>
                <a class="btn btn-danger btn-sm"
                href="<?= base_url('staff/staff/hapus_staff/'.$st->staff_id)?>">Hapus</a>
                <?php endif ?>
            </td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>
</div>

</div>

</section>