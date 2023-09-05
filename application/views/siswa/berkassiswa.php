<div class="content-wrapper">

    <section class="content-header">
        <h1>
        <?php echo $title ?>
        <div class="pull-right">
        <a class="btn btn-success btn-sm" href="<?= base_url('siswa/berkassiswa/uploadberkas/'.$siswa['siswa_id'])?>"><i class="fa fa-fw fa-folder-open"></i> Upload Berkas</a>
        </div>
        </h1>
    </section>

    <section class="content">
    <?=$this->session->flashdata('msg');?>
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Berkas Siswa</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Kartu Keluarga</th>
                            <td><img src="<?= base_url('assets/berkas_siswa/').$siswa['siswa_kk']; ?>" width="180px" alt=""></td>
                        </tr>
                        <tr>
                            <th th width="30%">Akta Kelahiran</th>
                            <td><img src="<?= base_url('assets/berkas_siswa/').$siswa['siswa_akta']; ?>" width="180px" alt=""></td>
                        </tr>
                        <tr>
                            <th th width="30%">KTP Ayah</th>
                            <td><img src="<?= base_url('assets/berkas_siswa/').$siswa['siswa_ktpayah']; ?>" width="180px" alt=""></td>
                        </tr>
                        <tr>
                            <th th width="30%">KTP Ibu</th>
                            <td><img src="<?= base_url('assets/berkas_siswa/').$siswa['siswa_ktpibu']; ?>" width="180px" alt=""></td>
                        </tr>
                        <tr>
                            <th th width="30%">KIPS</th>
                            <td><img src="<?= base_url('assets/berkas_siswa/').$siswa['siswa_kips']; ?>" width="180px" alt=""></td>
                        </tr>
                        <tr>
                            <th th width="30%">SKTM</th>
                            <td><img src="<?= base_url('assets/berkas_siswa/').$siswa['siswa_sktm']; ?>" width="180px" alt=""></td>
                        </tr>
                        <tr>
                            <th th width="30%">Ijazah</th>
                            <td><img src="<?= base_url('assets/berkas_siswa/').$siswa['siswa_ijazah']; ?>" width="180px" alt=""></td>
                        </tr>
                        <tr>
                            <th th width="30%">SKHUN</th>
                            <td><img src="<?= base_url('assets/berkas_siswa/').$siswa['siswa_skhun']; ?>" width="180px" alt=""></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>

</div>