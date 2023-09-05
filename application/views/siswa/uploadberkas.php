<div class="content-wrapper">

<section class="content-header">
    <h1>
        <?php echo $title ?>
        <div class="pull-right">
        <a class="btn btn-info btn-sm" href="<?= base_url('siswa/berkassiswa/')?>">Kembali</a>
        </div>
    </h1>
</section>

<section class="content">
    <div class="row">
    <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Berkas Siswa</h3>
                </div>

                <form method="POST" action="<?=base_url('siswa/berkassiswa/uploadberkas')?>" enctype="multipart/form-data">
                    <div class="box-body">
                    <input type="hidden" class="form-control" name="siswa_id" value="<?= $siswa['siswa_id']; ?>">
                    <input type="hidden" class="form-control" name="siswa_nis" value="<?= $siswa['siswa_nis']; ?>">
                        <div class="form-group">
                            <label>Foto Siswa</label>
                            <input type="file" id="siswa_foto" name="siswa_foto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan Kartu Keluarga</label>
                            <input type="file" id="siswa_kk" name="siswa_kk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan Akta Kelahiran</label>
                            <input type="file" id="siswa_akta" name="siswa_akta" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan KTP Ayah</label>
                            <input type="file" id="siswa_ktpayah" name="siswa_ktpayah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan KTP Ibu</label>
                            <input type="file" id="siswa_ktpibu" name="siswa_ktpibu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan SKTM</label>
                            <input type="file" id="siswa_sktm" name="siswa_sktm" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Foto KIPS</label>
                            <input type="file" id="siswa_kips" name="siswa_kips" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan Ijazah</label>
                            <input type="file" id="siswa_ijazah"  name="siswa_ijazah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan SKHUN</label>
                            <input type="file" id="siswa_skhun" name="siswa_skhun" class="form-control">
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