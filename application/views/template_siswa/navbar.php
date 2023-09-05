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
                            <li><a href="<?= base_url('siswa/dashboard')?>">Data Siswa</a></li>
                            <li><a href="<?= base_url('siswa/berkassiswa')?>">Data Berkas Siswa</a></li>
                        </ul>
                    </div>
                    
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-fw fa-user"></i>
                                    <span><?= $siswa['siswa_nama'];?></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('siswa/ubahpassword')?>"><i class="fa fa-fw fa-unlock-alt"></i>Ubah Password</a></li>
                                    <li><a onclick="return confirm('Yakin untuk meninggalkan halaman ini ?')" href="<?php echo base_url()?>loginsiswa/logout"><i class="fa fa-fw fa-sign-out"></i>Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
            </nav>
        </header>

        <div class="content-wrapper">
        <div class="container">