<div class="content-wrapper">

<section class="content-header">
    <h1>
    <?php echo $title ?>
    <div class="pull-right">
    <?php if ($detail->siswa_status == "Aktif") { ?>
    <a class="btn btn-warning btn-sm" href="<?= base_url('staff/siswa/updatesiswa/'.$detail->siswa_id)?>">Edit</a>
    <?php } ?> 
    <?php if ($detail->siswa_status == "Aktif") { ?>
        <a class="btn btn-info btn-sm" href="<?= base_url('staff/siswa/')?>">Kembali</a>
    <?php } else { ?>
        <a class="btn btn-info btn-sm" href="<?= base_url('staff/arsipsiswa/')?>">Kembali</a>
    <?php } ?> 
    </div>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Siswa</h3>
                </div>
                <div class="box-body">
                    <table class="table">
                        <tr>
                            <td colspan="2" class="text-center">
                                <?php if (!empty($detail->siswa_foto)) { ?>
                                <a href="<?=base_url('assets/berkas_siswa/'
                                .$detail->siswa_foto )?>" target="_blank">
                                <img class="siswa_foto" src="<?= base_url().'assets/berkas_siswa/'
                                .$detail->siswa_foto ?>" width="180px" alt="Foto Siswa">
                                </a>
                                <?php } else { ?>
                                <img class="siswa_foto" src="<?=base_url('assets/image/avatar.png')?>"
                                width="180px" alt="Foto Siswa">
                                
                                <?php } ?>
                                
                            </td>
                        </tr>
                        <tr>
                            <th>NIS</th>
                            <td>: <?= $detail->siswa_nis ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>: <?= $detail->siswa_nama ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: <?= $detail->siswa_alamat ?></td>
                        </tr>
                        <tr>
                            <th>Nomor HP</th>
                            <td>: <a href="https://wa.me/<?= $detail->siswa_nomorhp ?>" target="_blank"><?= $detail->siswa_nomorhp ?></a></td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td>: <?= $detail->siswa_tempatlahir ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>: <?=  $detail->siswa_tgllahir = date('d-m-Y', strtotime($detail->siswa_tgllahir));?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>: <?= $detail->siswa_jenkel?></td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>: <?= $detail->kelas_nama ?></td>
                        </tr>
                        <tr>
                            <th>Wali Kelas</th>
                            <td>: <?= $detail->kelas_wali ?></td>
                        </tr>
                        <tr>
                            <th>Status Siswa</th>
                            <td>: <?= $detail->siswa_status ?></td>
                        </tr>

                        <?php if ($detail->siswa_status == "Aktif") { ?>
                        <tr>
                            <th>Tahun Keluar</th>
                            <td>: &minus;</td>
                        </tr>
                        <?php } else { ?>
                        <tr>
                            <th>Tahun Keluar</th>
                            <td>: <?=$detail->siswa_tahunkeluar?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th>Status Berkas</th>
                            <td>: <?= $detail->siswa_statusarsip ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
                            <td>
                                <a href="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_kk ?>" target="_blank">
                                    <img src="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_kk ?>" width="180px" alt="">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th th width="30%">Akta Kelahiran</th>
                            <td>
                                <a href="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_akta ?>" target="_blank">
                                    <img src="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_akta ?>" width="180px" alt="">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th th width="30%">KTP Ayah</th>
                            <td>
                                <a href="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_ktpayah ?>" target="_blank">
                                    <img src="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_ktpayah ?>" width="180px" alt="">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th th width="30%">KTP Ibu</th>
                            <td>
                                <a href="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_ktpibu ?>" target="_blank">
                                    <img src="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_ktpibu ?>" width="180px" alt="">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th th width="30%">KIPS</th>
                            <td>
                                <a href="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_kips ?>" target="_blank">
                                    <img src="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_kips ?>" width="180px" alt="">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th th width="30%">SKTM</th>
                            <td>
                                <a href="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_sktm ?>" target="_blank">
                                    <img src="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_sktm ?>" width="180px" alt="">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th th width="30%">Ijazah</th>
                            <td>
                                <a href="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_ijazah ?>" target="_blank">
                                    <img src="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_ijazah ?>" width="180px" alt="">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th th width="30%">SKHUN</th>
                            <td>
                                <a href="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_skhun ?>" target="_blank">
                                    <img src="<?= base_url().'assets/berkas_siswa/'
                                    .$detail->siswa_skhun ?>" width="180px" alt="">
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>