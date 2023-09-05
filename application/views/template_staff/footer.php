      </div>

      </div>
<footer class="main-footer">
  <div class="container">
  <strong>Copyright &copy; 2022 <a href="smpn2godean.sch.id">SMP NEGERI 2 GODEAN</a>.</strong> All rights
  reserved.
  </div>

</footer>
</div>


<script src="<?= base_url('assets/template')?>/bower_components/jquery/dist/jquery.min.js"></script>

<script src="<?= base_url('assets/template')?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?= base_url('assets/template')?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="<?= base_url('assets/template')?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="<?= base_url('assets/template')?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="<?= base_url('assets/template')?>/bower_components/fastclick/lib/fastclick.js"></script>

<script src="<?= base_url('assets/template')?>/dist/js/adminlte.min.js"></script>

<script src="<?= base_url('assets/template')?>/dist/js/demo.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
</body>
</html>
