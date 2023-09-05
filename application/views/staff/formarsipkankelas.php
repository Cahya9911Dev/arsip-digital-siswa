<div class="content-wrapper">

<section class="content-header">
    <h1>
        <?php echo $title ?>
        <div class="pull-right">
        <a class="btn btn-info btn-sm" href="<?= base_url('staff/kelas/')?>">Kembali</a>
        </div>
    </h1>
</section>

<section class="content">
    <div class="row">
    <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Kelas</h3>
                </div>
                
                <?php foreach ($kelas as $kls) : ?>
                <form method="POST" action="<?=base_url('staff/kelas/arsipkankelasaksi')?>">
                    <div class="box-body">
                        <input type="hidden" class="form-control" name="kelas_id" value="<?= $kls->kelas_id ?>" required>
                        <div class="form-group">
                            <label>Nama Kelas</label>
                            <input type="text" class="form-control" name="kelas_nama" placeholder="Nama Kelas"
                            value="Arsip <?= $kls->kelas_nama, date(' Y ') ?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Nama Wali Kelas</label>
                            <input type="text" class="form-control" name="kelas_wali" placeholder="Nama Wali Kelas"
                            value="<?= $kls->kelas_wali ?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Link Grup WhatsApp</label>
                            <input type="text" class="form-control" name="kelas_grupwa" placeholder="Link Grup WhatsApp"
                            value="<?= $kls->kelas_grupwa ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button onclick="return confirm('Yakin akan mengarsipkan data ?')" type="submit" class="btn btn-danger">Arsipkan</button>
                    </div>
                </form>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>