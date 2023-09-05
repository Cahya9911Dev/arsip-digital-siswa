<div class="content-wrapper">

<section class="content-header">
    <h1>
        <?php echo $title ?>
        <div class="pull-right">
        <a class="btn btn-info btn-sm" href="<?= base_url('staff/staff/')?>">Kembali</a>
        </div>
    </h1>
</section>

<section class="content">
    <div class="row">
    <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Staff</h3>
                </div>       
                <form method="POST" action="<?=base_url('staff/staff/tambahstaffaksi')?>">
                    <div class="box-body">
                        <div class="form-group">
                        <input type="hidden" name="staff_id" id="staff_id" class="form-control" readonly="" value="<?= $IdStaff ; ?>">
                            <label>NIP Staff</label>
                            <input type="text" class="form-control" name="staff_nip" placeholder="NIP Staff" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Staff</label>
                            <input type="text" class="form-control" name="staff_nama" placeholder="Nama Staff" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="staff_pass" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label>Level Staff</label>
                            <select name="staff_role" class="form-control" required>
                            <option value="">---Pilih Level Staff---</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Staff Biasa">Staff Biasa</option>
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