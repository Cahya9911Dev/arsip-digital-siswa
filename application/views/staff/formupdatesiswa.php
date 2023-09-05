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
                <form method="POST" action="<?=base_url('staff/siswa/updatesiswaaksi')?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" class="form-control" name="siswa_id" value="<?= $siswa->siswa_id ?>" required>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" name="siswa_nis" placeholder="NISN"
                            value="<?= $siswa->siswa_nis ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" class="form-control" name="siswa_nama" placeholder="Nama"
                            value="<?= $siswa->siswa_nama ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="siswa_alamat" placeholder="Alamat"
                            value="<?= $siswa->siswa_alamat ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="number" class="form-control" name="siswa_nomorhp" placeholder="Nomor HP (Contoh : 62855555555)"
                            value="<?= $siswa->siswa_nomorhp ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="siswa_tempatlahir" placeholder="Tempat Lahir"
                            value="<?= $siswa->siswa_tempatlahir ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="siswa_tgllahir" placeholder="Tanggal Lahir"
                            value="<?= $siswa->siswa_tgllahir ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="siswa_jenkel" class="form-control" required>
                                <option value="<?= $siswa->siswa_jenkel ?>"><?= $siswa->siswa_jenkel ?></option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="siswa_kelas" class="form-control" required>
                                <option value="<?= $siswa->kelas_id ?>"><?= $siswa->kelas_id ?></option>
                                <?php foreach($kelas as $kls) : ?>
                                    <option value="<?php echo $kls->kelas_id ?>">
                                    <?php echo $kls->kelas_id?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="box-header with-border">
                            <strong><h1 class="box-title">Data Berkas</h1></strong>
                        </div>
                        <div class="form-group">
                            <label>Foto Siswa</label>
                            <input type="file" name="siswa_foto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan Kartu Keluarga</label>
                            <input type="file" name="siswa_kk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan Akta Kelahiran</label>
                            <input type="file" name="siswa_akta" class="form-control" value="<?= $siswa->siswa_akta ?>">
                        </div>
                        <div class="form-group">
                            <label>Scan KTP Ayah</label>
                            <input type="file" name="siswa_ktpayah" class="form-control" value="<?= $siswa->siswa_ktpayah ?>">
                        </div>
                        <div class="form-group">
                            <label>Scan KTP Ibu</label>
                            <input type="file" name="siswa_ktpibu" class="form-control" value="<?= $siswa->siswa_ktpibu ?>">
                        </div>
                        <div class="form-group">
                            <label>Scan SKTM</label>
                            <input type="file" name="siswa_sktm" class="form-control" value="<?= $siswa->siswa_sktm ?>">
                        </div>
                        <div class="form-group">
                            <label>Foto KIPS</label>
                            <input type="file" name="siswa_kips" class="form-control" value="<?= $siswa->siswa_kips ?>">
                        </div>
                        <div class="form-group">
                            <label>Scan Ijazah</label>
                            <input type="file" name="siswa_ijazah" class="form-control" value="<?= $siswa->siswa_ijazah ?>">
                        </div>
                        <div class="form-group">
                            <label>Scan SKHUN</label>
                            <input type="file" name="siswa_skhun" class="form-control" value="<?= $siswa->siswa_skhun ?>">
                        </div>
                        <div class="form-group">
                            <label>Status Berkas Siswa</label>
                            <select name="siswa_statusarsip" class="form-control" required>
                                <option value="<?= $siswa->siswa_statusarsip ?>"><?= $siswa->siswa_statusarsip ?></option>
                                <option value="Lengkap">Lengkap</option>
                                <option value="Kurang">Kurang</option>
                                <option value="Belum Ada Berkas">Belum Ada Berkas</option>
                            </select>
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