<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SIARSIS | LOGIN</title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="stylesheet" href="<?= base_url('assets/template')?>/bower_components/bootstrap/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="<?= base_url('assets/template')?>/bower_components/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="<?= base_url('assets/template')?>/bower_components/Ionicons/css/ionicons.min.css">

<link rel="stylesheet" href="<?= base_url('assets/template')?>/dist/css/AdminLTE.min.css">

<link rel="stylesheet" href="<?= base_url('assets/template')?>/dist/css/skins/_all-skins.min.css">

</head>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- <script nonce="81649bd9-7894-4b7b-8bce-a392f74565ed">
(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}}}});
for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);
</script> -->
</head>
<body class="hold-transition login-page skin-blue layout-top-nav">
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>SIARSIS </b>SMP NEGERI 2 GODEAN</a>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">                
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li><a href="<?= base_url('loginstaff')?>">Login Staff</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</div>

    <div class="login-box">
    <div class="login-logo">
      <img src="<?= base_url('assets')?>/image/logo.png" alt="Logo Sekolah"><br>
      <a href="#"><b>SIARSIS Login</b></a>
    </div>

    <div class="login-box-body">
      <?= $this->session->flashdata('msg'); ?>

      <form class="siswa" action="<?= base_url('loginsiswa'); ?>" method="post">
      
      <div class="form-group has-feedback">
        <input type="text" id="nis" name="nis" class="form-control" placeholder="NIS" required value="<?= set_value('nis');?>" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        <?= form_error('nis', '<small class="text-danger pl-3">','</small>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>      
      </div>
    <div class="row">
  <div class="col-xs-12">
<button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
</div>


</div>
</form>
</div>
</div>

<script src="<?= base_url('assets/template')?>/bower_components/jquery/dist/jquery.min.js"></script>

<script src="<?= base_url('assets/template')?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?= base_url('assets/template')?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="<?= base_url('assets/template')?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="<?= base_url('assets/template')?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="<?= base_url('assets/template')?>/bower_components/fastclick/lib/fastclick.js"></script>

<script src="<?= base_url('assets/template')?>/dist/js/adminlte.min.js"></script>

<script src="<?= base_url('assets/template')?>/dist/js/demo.js"></script>

</body>
</html>