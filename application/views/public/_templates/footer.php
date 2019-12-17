<!--Footer-->
<footer class="page-footer text-center font-small mt-4 wow fadeIn">

  <!--Copyright-->
  <div class="footer-copyright py-3">
    &#xA9; 2018 Copyright:
    <a href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank"> MDBootstrap.com </a>
  </div>
  <!--/.Copyright-->

</footer>
<!--/.Footer-->

<!-- JQuery -->
<script type="text/javascript" src="<?php echo base_url($assets_public_dir . '/js/jquery-3.3.1.min.js'); ?>"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url($assets_public_dir . '/js/popper.min.js'); ?>"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url($assets_public_dir . '/js/bootstrap.min.js'); ?>"></script>
<!-- MDB dataTable JavaScript -->
<script type="text/javascript" src="<?php echo base_url($assets_public_dir . '/js/addons/datatables.min.js'); ?>"></script>
<!-- MDB dataTable JavaScript -->
<script type="text/javascript" src="<?php echo base_url($assets_public_dir . '/js/addons/dataTables.bootstrap4.min.js'); ?>"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url($assets_public_dir . '/js/mdb.min.js'); ?>"></script>
<script>
  $(document).ready(function() {
    $('#example1').DataTable();
} );
</script>
</body>

</html>