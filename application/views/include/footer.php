<div class="page-footer">
    <div class="page-footer-inner">
         2014 &copy; Metronic by keenthemes.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!-- ./wrapper -->

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js');?>"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>


<script type="text/javascript" src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/daterangepicker.js'); ?>"></script>

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.form-validator.min.js');?>"></script>

<!-- SlimScroll -->
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/js/fastclick.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/js/icheck.min.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/adapters/jquery.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/js/demo.js');?>"></script>
<script src="<?php echo base_url('assets/js/custom.js');?>"></script>
<script>
    function validate_fileType(fileName,Nameid,arrayValu)
    {
        var string = arrayValu;
        var tempArray = new Array();
        var tempArray = string.split(',');                  
        var allowed_extensions =tempArray;
        var file_extension = fileName.split(".").pop(); 
        for(var i = 0; i <= allowed_extensions.length; i++)
        {
            if(allowed_extensions[i]==file_extension)
            {   
                $("#error_"+Nameid).html("");
                return true; // valid file extension
            }
        }
        $("#"+Nameid).val("");
        $("#error_"+Nameid).css("color","red").html("File formate not suport To uploade");
        return false;
    }
</script>


  <!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url('assets/global/scripts/metronic.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/pages/scripts/inbox.js'); ?>"></script>
<script>
jQuery(document).ready(function() { 



    $('.datatable').DataTable();
    $('#sample_1').DataTable();
});
</script>
</body>
</html>
<!-- modal -->
<div id="cnfrm_delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content col-md-6">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete </p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-small  yes-btn btn-danger" href="">yes</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">no</button>
            </div>
        </div> 
    </div>
</div>