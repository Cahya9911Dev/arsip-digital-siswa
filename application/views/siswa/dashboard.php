<div class="content-wrapper">

    <section class="content-header">
        <h1>
        <?php echo $title ?>
        </h1>
        <?php echo $this->session->flashdata('msg');?>
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
                                <?php if (!empty($siswa['siswa_foto'])) { ?>
                                <img class="siswa_foto" src="<?= base_url('assets/berkas_siswa/').$siswa['siswa_foto']; ?>" width="180px" height="240px" alt="Foto Siswa">
                                <?php } else { ?>
                                <img class="siswa_foto" src="<?=base_url('assets/image/avatar.png')?>"
                                width="180px" alt="Foto Siswa">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>NIS</th>
                            <td>: <?= $siswa['siswa_nis']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>: <?= $siswa['siswa_nama']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: <?= $siswa['siswa_alamat']; ?></td>
                        </tr>
                        <tr>
                            <th>Nomor HP</th>
                            <td>: <?= $siswa['siswa_nomorhp']; ?></td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td>: <?= $siswa['siswa_tempatlahir']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>: <?=  $siswa['siswa_tgllahir'] = date('d-m-Y', strtotime($siswa['siswa_tgllahir']));?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>: <?= $siswa['siswa_jenkel'];?></td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>: <?= $siswa['kelas_nama']; ?></td>
                        </tr>
                        <tr>
                            <th>Wali Kelas</th>
                            <td>: <?= $siswa['kelas_wali']; ?></td>
                        </tr>
                        <tr>
                            <th>Grup WhatsApp Kelas</th>
                            <td>: <a href="https://<?= $siswa['kelas_grupwa']; ?>" target="_blank"><?= $siswa['kelas_grupwa']; ?></a></td>
                        </tr>
                        <tr>
                            <th>Status Siswa</th>
                            <td>: <?= $siswa['siswa_status']; ?></td>
                        </tr>
                        <tr>
                            <th>Status Berkas</th>
                            <td>: <?= $siswa['siswa_statusarsip']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>

</div>