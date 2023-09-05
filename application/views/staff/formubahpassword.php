<div class="content-wrapper">

<section class="content-header">
    <h1>
        <?php echo $title ?>
        <div class="pull-right">
        <a class="btn btn-info btn-sm" href="<?= base_url('staff/siswa/')?>">Kembali</a>
        </div>
    </h1>
</section>

<section class="content">
    <div class="row">
    <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Siswa</h3>
                </div>
                <form method="POST" action="<?=base_url('staff/siswa/ubahpasswordaksi')?>">
                    <div class="box-body">
                        <input type="hidden" class="form-control" name="siswa_id" value="<?= $siswa->siswa_id ?>" required>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" name="siswa_nis"
                            value="<?= $siswa->siswa_nis ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="siswa_nama"
                            value="<?= $siswa->siswa_nama ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Masukkan Password Baru</label>
                            <input type="password" class="form-control" name="siswa_pass" placeholder="Password Baru">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>