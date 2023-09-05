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
                <form method="POST" action="<?=base_url('staff/kelas/tambahkelasaksi')?>">
                    <div class="box-body">
                        <div class="form-group">
                        <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" readonly="" value="<?= $IdKelas ; ?>">
                            <label>Nama Kelas</label>
                            <input type="text" class="form-control" name="kelas_nama" placeholder="Nama Kelas" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Wali Kelas</label>
                            <input type="text" class="form-control" name="kelas_wali" placeholder="Nama Wali Kelas" required>
                        </div>
                        <div class="form-group">
                            <label>Link Grup WhatsApp</label>
                            <input type="text" class="form-control" name="kelas_grupwa" placeholder="Link Grup WhatsApp" required>
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