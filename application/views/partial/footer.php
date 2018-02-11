    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; 2017-2018 JBC. All rights reserved</small>
          <small class="pull-right"><strong>Powered By</strong> &nbsp;Besongn Rawlings</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url('index.php/login/logout');?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    
    <script src="<?php echo base_url('resources/dashboard_resources/vendor/jquery/moment.js');?>"></script>
    <script src="<?php echo base_url('resources/dashboard_resources/vendor/popper/popper.min.js');?>"></script>
    <script src="<?php echo base_url('resources/dashboard_resources/vendor/bootstrap/js/bootstrap.min.js');?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url('resources/dashboard_resources/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
    <script src="<?php echo base_url('resources/dashboard_resources/vendor/datatables/jquery.dataTables.js');?>"></script>
    <script src="<?php echo base_url('resources/dashboard_resources/vendor/datatables/dataTables.bootstrap4.js');?>"></script>

    <!-- Full calendar scripts.   Source: www.patchesoft.com  -->
    <script src="<?php echo base_url('resources/dashboard_resources/vendor/bootstrap/js/fullcalendar.min.js');?>"></script>

    <!-- including the print.js file -->
    <script src="<?php echo base_url('resources/dashboard_resources/vendor/josephPrintCommand.js');?>"></script>

    <!--<script src="<?php //echo base_url('resources/dashboard_resources/js/angular.min.js');?>"></script>-->
    <!--<script src="<?php// echo base_url('resources/dashboard_resources/js/angular-route.js');?>"></script>-->
   <!-- Angular scripts -->
    <script src="<?php echo base_url('resources/dashboard_resources/js/josephPrintCommand.js');?>"></script>
  <!-- Including library for print command -->
  <!-- Including chart script -->
  <script type="text/javascript" src="<?php echo base_url('resources/dashboard_resources/js/Chart.js');?>"></script>
  <!-- Dashboard script file -->
    <script src="<?php echo base_url('resources/dashboard_resources/js/sb-admin.js');?>"></script>
  <!-- Including scripts responsible for exporting data to excel and other file type -->
  
  <script type="text/javascript" src="<?php echo base_url('resources/dashboard_resources/js/FileSaver.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('resources/dashboard_resources/js/tableexport.min.js');?>"></script>
  
  <script type="text/javascript">
  $('.table').tableExport();
  </script>
  </body>
</html>
