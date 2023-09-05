<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="../../index2.html" class="navbar-brand"><b>SIARSIS </b>SMP NEGERI 2 GODEAN</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= base_url('staff/dashboard')?>">Dashboard</a></li>
                            
                            <?php if($this->session->userdata('akses') == 'Administrator'):?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Siswa<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= base_url('staff/siswa')?>">Semua Data Siswa</a></li>
                                        <li><a href="<?= base_url('staff/siswa/siswalengkap')?>">Siswa | Berkas Lengkap</a></li>
                                        <li><a href="<?= base_url('staff/siswa/siswakurang')?>">Siswa | Berkas Kurang</a></li>
                                        <li><a href="<?= base_url('staff/siswa/siswabelumada')?>">Siswa | Belum Ada Berkas </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Kelas<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= base_url('staff/kelas')?>">Kelas Aktif</a></li>
                                        <li><a href="<?= base_url('staff/kelas/arsipkelas')?>">Arsip Kelas</a></li>
                                    </ul>
                                </li>
                            <li><a href="<?= base_url('staff/arsipsiswa')?>">Arsip Siswa</a></li>
                            <li><a href="<?= base_url('staff/staff')?>">Data Staff</a></li>
                        </ul>
                    </div>

                    <?php elseif($this->session->userdata('akses') == 'Staff Biasa'):?>   
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Siswa<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('staff/siswa')?>">Semua Data Siswa</a></li>
                                    <li><a href="<?= base_url('staff/siswa/siswalengkap')?>">Siswa | Berkas Lengkap</a></li>
                                    <li><a href="<?= base_url('staff/siswa/siswakurang')?>">Siswa | Berkas Kurang</a></li>
                                    <li><a href="<?= base_url('staff/siswa/siswabelumada')?>">Siswa | Belum Ada Berkas </a></li>
                                </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Kelas<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('staff/kelas')?>">Kelas Aktif</a></li>
                                    <li><a href="<?= base_url('staff/kelas/arsipkelas')?>">Arsip Kelas</a></li>
                                </ul>
                            </li>
                        <li><a href="<?= base_url('staff/arsipsiswa')?>">Arsip Siswa</a></li>
                        </ul>
                    </div>
                    <?php endif;?>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-fw fa-user"></i>
                                    <span><?= $staff['staff_nama']; ?></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a onclick="return confirm('Yakin untuk meninggalkan halaman ini ?')" href="<?php echo base_url()?>loginstaff/logout"><i class="fa fa-fw fa-sign-out"></i>Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

            </nav>
        </header>

        <div class="content-wrapper">
        <div class="container">