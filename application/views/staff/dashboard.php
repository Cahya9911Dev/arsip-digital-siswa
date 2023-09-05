<div class="content-wrapper">

    <section class="content-header">
        <h1>
        <?php echo $title ?>
        </h1>

        <?php echo $this->session->flashdata('msg');?>
    </section>

    <section class="content">
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?=$total?> Siswa</h3>
                    <p>Total Siswa Aktif</p>
                </div>
                <a style="margin-top: 10px;" href="<?= base_url('staff/siswa')?>" class="small-box-footer">Tampilkan data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-xs-12">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=$totall?> Siswa</h3>
                    <p>Berkas Lengkap</p>
                </div>
                <a style="margin-top: 10px;" href="<?= base_url('staff/siswa/siswalengkap')?>" class="small-box-footer">Tampilkan data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-xs-12">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=$totalk?> Siswa</h3>
                    <p>Berkas Kurang</p>
                </div>
                <a style="margin-top: 10px;" href="<?= base_url('staff/siswa/siswakurang')?>" class="small-box-footer">Tampilkan data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-xs-12">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?=$totalb?> Siswa</h3>
                    <p>Belum Ada Berkas</p>
                </div>
                <a style="margin-top: 10px;" href="<?= base_url('staff/siswa/siswabelumada')?>" class="small-box-footer">Tampilkan data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>




