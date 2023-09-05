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

                <form method="POST" action="<?=base_url('staff/siswa/tambahsiswaaksi')?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" name="siswa_id" id="siswa_id" class="form-control" readonly="" value="<?= $IdSiswa ; ?>">
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="number" class="form-control" name="siswa_nis" placeholder="NISN" required is_unique>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" class="form-control" name="siswa_nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="siswa_pass" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="siswa_alamat" placeholder="Alamat" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="number" class="form-control" name="siswa_nomorhp" placeholder="Nomor HP (Contoh : 62855555555) " required>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="siswa_tempatlahir" placeholder="Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="siswa_tgllahir" placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="siswa_jenkel" class="form-control" required>
                            <option value="">---Pilih Jenis Kelamin---</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="siswa_kelas" class="form-control" required>
                                <option value="">---Pilih Kelas---</option>
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
                            <input type="file" name="siswa_akta" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan KTP Ayah</label>
                            <input type="file" name="siswa_ktpayah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan KTP Ibu</label>
                            <input type="file" name="siswa_ktpibu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan SKTM</label>
                            <input type="file" name="siswa_sktm" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Foto KIPS</label>
                            <input type="file" name="siswa_kips" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan Ijazah</label>
                            <input type="file" name="siswa_ijazah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Scan SKHUN</label>
                            <input type="file" name="siswa_skhun" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Status Berkas Siswa</label>
                            <select name="siswa_statusarsip" class="form-control" required>
                                <option value="">---Pilih Status Kelengkapan Berkas---</option>
                                <option value="Lengkap">Lengkap</option>
                                <option value="Kurang">Kurang</option>
                                <option value="Belum Ada Berkas">Belum Ada Berkas</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>